<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Symfony\Component\HttpFoundation\Request;

class AddressStep extends BaseStep
{

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        CustomerClientInterface $customerClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer$quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer$quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer$quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getShippingAddress()->getIdCustomerAddress() !== null) {
            $shippingAddressTransfer = $this->hydrateCustomerAddress(
                $quoteTransfer->getShippingAddress(),
                $this->customerClient->getCustomer()
            );

            $quoteTransfer->setShippingAddress($shippingAddressTransfer);
        }

        if ($quoteTransfer->getBillingSameAsShipping() === true) {
            $quoteTransfer->setBillingAddress($quoteTransfer->getShippingAddress());
        } elseif ($quoteTransfer->getBillingAddress()->getIdCustomerAddress() !== null) {
            $billingAddressTransfer = $this->hydrateCustomerAddress(
                $quoteTransfer->getBillingAddress(),
                $this->customerClient->getCustomer()
            );

            $quoteTransfer->setBillingAddress($billingAddressTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer$quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($this->isAddressEmpty($quoteTransfer->getShippingAddress()) || $this->isAddressEmpty($quoteTransfer->getBillingAddress())) {
            $this->flashMessenger->addErrorMessage('checkout.step.address.address_missing');

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
        if (
            $addressTransfer === null ||
            empty($addressTransfer->getFirstName()) ||
            empty($addressTransfer->getLastName())
        ) {
            return true;
        }

        return false;
    }

}
