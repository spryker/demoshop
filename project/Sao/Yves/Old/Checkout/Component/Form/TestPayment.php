<?php

class Sao_Yves_Checkout_Component_Form_TestPayment extends Sao_Yves_Library_Form_Model
{

    public function init()
    {
        $name = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_hiddenField, 'name', $this);
        $name->setAttribute('value', 'creditcard');
        $this->addElement($name);

        $type = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_label, t(Sao_Yves_Library_L::PAYMENT_TESTPAYMENT_INFO), $this);
        $this->addElement($type);
    }
}
