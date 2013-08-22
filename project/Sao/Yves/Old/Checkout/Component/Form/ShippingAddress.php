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
 * @property $iso2_country
 * @property $additional
 * @property $email
 * @property $password
 * @property $cell_phone
 */
class Sao_Yves_Checkout_Component_Form_ShippingAddress extends Sao_Yves_Application_Component_Form_BasicAddress
{
    /**
     *
     */
    public function init()
    {
        $this->addAllBasicElements();
    }
}