<?php

namespace Pyz\Yves\Customer\Form\DataProvider;

use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface;
use Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm;
use Spryker\Shared\Kernel\Store;

class CheckoutAddressFormDataProvider extends AbstractAddressFormDataProvider implements DataProviderInterface
{

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @var \Generated\Shared\Transfer\AddressesTransfer
     */
    protected $customerAddressesTransfer;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(CustomerClientInterface $customerClient, Store $store)
    {
        parent::__construct($customerClient, $store);

        $this->customerTransfer = $this->customerClient->getCustomer();
        if ($this->customerTransfer !== null) {
            $this->customerAddressesTransfer = $this->customerClient->getAddresses($this->customerTransfer);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->setShippingAddress($this->getShippingAddress($quoteTransfer));
        $quoteTransfer->setBillingAddress($this->getBillingAddress($quoteTransfer));

        if ($quoteTransfer->getBillingAddress()->getIdCustomerAddress() === $quoteTransfer->getShippingAddress()->getIdCustomerAddress()) {
            $quoteTransfer->setBillingSameAsShipping(true);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getOptions(QuoteTransfer $quoteTransfer)
    {
        return [
            CheckoutAddressCollectionForm::OPTION_ADDRESS_CHOICES => $this->getAddressChoices(),
            CheckoutAddressCollectionForm::OPTION_COUNTRY_CHOICES => $this->getAvailableCountries(),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\AddressTransfer
     */
    protected function getShippingAddress(QuoteTransfer $quoteTransfer)
    {
        $shippingAddressTransfer = new AddressTransfer();
        if ($quoteTransfer->getShippingAddress() !== null) {
            $shippingAddressTransfer = $quoteTransfer->getShippingAddress();
        }

        if ($this->customerTransfer !== null && $quoteTransfer->getShippingAddress() === null) {
            $shippingAddressTransfer->setIdCustomerAddress($this->customerTransfer->getDefaultShippingAddress());
        }

        return $shippingAddressTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\AddressTransfer
     */
    protected function getBillingAddress(QuoteTransfer $quoteTransfer)
    {
        $billingAddressTransfer = new AddressTransfer();
        if ($quoteTransfer->getBillingAddress() !== null) {
            $billingAddressTransfer = $quoteTransfer->getBillingAddress();
        }

        if ($this->customerTransfer !== null && $quoteTransfer->getBillingAddress() === null) {
            $billingAddressTransfer->setIdCustomerAddress($this->customerTransfer->getDefaultBillingAddress());
        }

        return $billingAddressTransfer;
    }

    /**
     * @return array
     */
    protected function getAddressChoices()
    {
        if ($this->customerAddressesTransfer === null) {
            return [];
        }

        $choices = [];
        foreach ($this->customerAddressesTransfer->getAddresses() as $address) {
            $choices[$address->getIdCustomerAddress()] = sprintf(
                '%s %s %s, %s %s, %s %s',
                $address->getSalutation(),
                $address->getFirstName(),
                $address->getLastName(),
                $address->getAddress1(),
                $address->getAddress2(),
                $address->getZipCode(),
                $address->getCity()
            );
        }

        return $choices;
    }

}
