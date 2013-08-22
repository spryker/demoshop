<?php

/**
 * @property $billing_address
 *
 */
class Sao_Yves_Checkout_Component_Form_Billing extends Sao_Yves_Library_Form_Model
{
    public function init()
    {
        $paymentMethod = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_radioButton, 'billing_address', $this);
        $paymentMethod->setLabel(t(Sao_Yves_Library_L::ADDRESS_NOT_FOUND));
        $paymentMethod->setAttribute('uncheckValue', null);
        $this->addElement($paymentMethod);
    }
}
