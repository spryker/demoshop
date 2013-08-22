<?php

/**
 * @property $method
 *
 */
class Sao_Yves_Checkout_Component_Form_Payment extends Sao_Yves_Library_Form_Model
{
    public function init()
    {
        $paymentMethod = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_radioButton, 'method', $this);
        $paymentMethod->setLabel(t(Sao_Yves_Library_L::PAYMENT_METHOD));
        $paymentMethod->setRequired(true);
        $paymentMethod->setAttribute('uncheckValue', null);
        $this->addElement($paymentMethod);
    }
}
