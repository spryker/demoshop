<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use Symfony\Component\HttpFoundation\Request;

class AddressStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
{
    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var \Spryker\Client\Calculation\CalculationClientInterface
     */
    protected $calculationClient;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CustomerClientInterface $customerClient,
        CalculationClientInterface $calculationClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
        $this->customerClient = $customerClient;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $dataTransfer)
    {
        return true;
    }

    /**
     * Guest customer takes data from form directly mapped by symfony forms.
     * Logged in customer takes data by id from current CustomerTransfer stored in session.
     * If it's new address it's saved when order is created in CustomerOrderSaverPlugin.
     * The selected addresses will be updated to default billing and shipping address.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        $customerTransfer = $this->customerClient->getCustomer();

        $shippingAddressTransfer = $quoteTransfer->getShippingAddress();
        $billingAddressTransfer = $quoteTransfer->getBillingAddress();

        if ($shippingAddressTransfer !== null && $shippingAddressTransfer->getIdCustomerAddress() !== null) {
            $shippingAddressTransfer = $this->hydrateCustomerAddress(
                $shippingAddressTransfer,
                $customerTransfer
            );

            $quoteTransfer->setShippingAddress($shippingAddressTransfer);
        }

        if ($quoteTransfer->getBillingSameAsShipping() === true) {
            $quoteTransfer->setBillingAddress(clone $quoteTransfer->getShippingAddress());
        } elseif ($billingAddressTransfer !== null && $billingAddressTransfer->getIdCustomerAddress() !== null) {
            $billingAddressTransfer = $this->hydrateCustomerAddress(
                $billingAddressTransfer,
                $customerTransfer
            );

            $quoteTransfer->setBillingAddress($billingAddressTransfer);
        }
        $quoteTransfer->getShippingAddress()->setIsDefaultShipping(true);
        $quoteTransfer->getBillingAddress()->setIsDefaultBilling(true);

        return $this->calculationClient->recalculate($quoteTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getShippingAddress() === null || $quoteTransfer->getBillingAddress() === null) {
            return false;
        }

        $shippingIsEmpty = $this->isAddressEmpty($quoteTransfer->getShippingAddress());
        $billingIsEmpty = $quoteTransfer->getBillingSameAsShipping() === false && $this->isAddressEmpty($quoteTransfer->getBillingAddress());

        if ($shippingIsEmpty || $billingIsEmpty) {
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\AddressTransfer $addressTransfer
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\AddressTransfer
     */
    protected function hydrateCustomerAddress(AddressTransfer $addressTransfer, CustomerTransfer $customerTransfer)
    {
        if ($customerTransfer->getAddresses() === null) {
            return $addressTransfer;
        }

        foreach ($customerTransfer->getAddresses()->getAddresses() as $customerAddressTransfer) {
            if ($addressTransfer->getIdCustomerAddress() === $customerAddressTransfer->getIdCustomerAddress()) {
                $addressTransfer->fromArray($customerAddressTransfer->toArray());
                break;
            }
        }

        return $addressTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\AddressTransfer|null $addressTransfer
     *
     * @return bool
     */
    protected function isAddressEmpty(AddressTransfer $addressTransfer = null)
    {
        if ($addressTransfer === null) {
            return true;
        }

        $hasName = (!empty($addressTransfer->getFirstName()) && !empty($addressTransfer->getLastName()));
        if (!$addressTransfer->getIdCustomerAddress() && !$hasName) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getBreadcrumbItemTitle()
    {
        return 'checkout.step.address.title';
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $dataTransfer)
    {
        return $this->postCondition($dataTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $dataTransfer)
    {
        return !$this->requireInput($dataTransfer);
    }
}
