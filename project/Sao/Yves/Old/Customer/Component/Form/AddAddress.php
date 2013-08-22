<?php

/*
 * @property $salutation
 * @property $first_name
 * @property $last_name
 * @property $address1
 * @property $address2
 * @property $zip_code
 * @property $city
 * @property $phone
 * @property $iso2_country
 * @property $is_default_billing
 * @property $is_default_shipping
*/

class Sao_Yves_Customer_Component_Form_AddAddress extends Sao_Yves_Application_Component_Form_BasicAddress
{
    public function init()
    {
        $this->addAllBasicElements();

        $defaultBilling = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'is_default_billing', $this);
        $defaultBilling->setValue(1);
        $defaultBilling->setLabel(t(Sao_Yves_Library_L::IS_DEFAULT_BILLINGADDRESS));
        $defaultBilling->setLabelAttribute('class', 'cbLabel');

        $defaultShipping = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'is_default_shipping', $this);
        $defaultShipping->setValue(1);
        $defaultShipping->setLabel(t(Sao_Yves_Library_L::IS_DEFAULT_SHIPPINGADDRESS));
        $defaultShipping->setLabelAttribute('class', 'cbLabel');

        $this->addElements(array($defaultBilling, $defaultShipping));
    }

}