<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form\DataProvider;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\AddressForm;

class AddressFormDataProvider extends AbstractAddressFormDataProvider
{
    /**
     * @param int|null $idCustomerAddress
     *
     * @return array
     */
    public function getData($idCustomerAddress = null)
    {
        $customerTransfer = $this->customerClient->getCustomer();

        if ($idCustomerAddress === null) {
            return $this->getDefaultAddressData($customerTransfer);
        }

        $addressTransfer = $this->loadAddressTransfer($customerTransfer, $idCustomerAddress);
        if ($addressTransfer !== null) {
            return $addressTransfer->modifiedToArray();
        }

        return [];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            AddressForm::OPTION_COUNTRY_CHOICES => $this->getAvailableCountries(),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param int|null $idCustomerAddress
     *
     * @return \Generated\Shared\Transfer\AddressTransfer|null
     */
    protected function loadAddressTransfer(CustomerTransfer $customerTransfer, $idCustomerAddress = null)
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer
            ->setIdCustomerAddress($idCustomerAddress)
            ->setFkCustomer($customerTransfer->getIdCustomer());

        return $this->customerClient->getAddress($addressTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getDefaultAddressData(CustomerTransfer $customerTransfer)
    {
        return [
            AddressForm::FIELD_FIRST_NAME => $customerTransfer->getFirstName(),
            AddressForm::FIELD_LAST_NAME => $customerTransfer->getLastName(),
        ];
    }

    /**
     * @return array
     */
    protected function getAvailableCountries()
    {
        $countries = [];

        foreach ($this->store->getCountries() as $iso2Code) {
            $countries[$iso2Code] = self::COUNTRY_GLOSSARY_PREFIX . $iso2Code . 'FOoBar';
        }

        return $countries;
    }
}
