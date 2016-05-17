<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;

class AddressStep extends BaseStep
{

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CustomerClientInterface $customerClient,
        CartClientInterface $cartClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * Guest customer takes data from form directly mapped by symfony forms.
     * Logged in customer takes data by id from current CustomerTransfer stored in session.
     * If it's new address it's saved when order is created in CustomerOrderSaverPlugin.
     * The selected addresses will be updated to default billing and shipping address.
     *
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $customerTransfer = $this->customerClient->getCustomer();

        $shippingAddressTransfer = $updatedQuoteTransfer->getShippingAddress();
        $billingAddressTransfer = $updatedQuoteTransfer->getBillingAddress();

        if ($shippingAddressTransfer !== null && $shippingAddressTransfer->getIdCustomerAddress() !== null) {
            $shippingAddressTransfer = $this->hydrateCustomerAddress(
                $shippingAddressTransfer,
                $customerTransfer
            );

            $updatedQuoteTransfer->setShippingAddress($shippingAddressTransfer);
        }

        if ($updatedQuoteTransfer->getBillingSameAsShipping() === true) {
            $updatedQuoteTransfer->setBillingAddress(clone $updatedQuoteTransfer->getShippingAddress());
        } elseif ($billingAddressTransfer !== null && $billingAddressTransfer->getIdCustomerAddress() !== null) {
            $billingAddressTransfer = $this->hydrateCustomerAddress(
                $billingAddressTransfer,
                $customerTransfer
            );

            $updatedQuoteTransfer->setBillingAddress($billingAddressTransfer);
        }

        $quoteTransfer->getShippingAddress()->setIsDefaultShipping(true);
        $quoteTransfer->getBillingAddress()->setIsDefaultBilling(true);

        return $quoteTransfer;
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        $quoteTransfer = $this->getDataClass();
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

}
