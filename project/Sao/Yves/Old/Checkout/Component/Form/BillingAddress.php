<?php

/**
 * @property $salutation
 * @property $property
 * @property $first_name
 * @property $last_name
 * @property $address2
 * @property $address1
 * @property $zip_code
 * @property $city
 * @property $additional
 * @property $iso2_country
 * @property $email
 * @property $password
 *
 */
class Sao_Yves_Checkout_Component_Form_BillingAddress extends Sao_Yves_Application_Component_Form_BasicAddress
{
    /**
     *
     */
    public function init()
    {
        $this->addAllBasicElements();
    }

    /**
     *
     */
    public function addAllBasicElements()
    {
        $this->addElements(array(
            //$this->getElementSalutation(),
            $this->getElementFirstName(),
            $this->getElementLastName(),
//            $this->getElementCellPhone(),
            //$this->getElementPhone(),
            $this->getElementZipCode(),
            $this->getElementAddress1(),
            $this->getElementAddress2(),
//            $this->getElementQuarter(),
            $this->getElementAdditional(),
            $this->getElementState(),
            $this->getElementCity(),
            $this->getElementComment(),

            $this->getElementCountry(),
            $this->getElementIso2Country(),
        ));
    }

}