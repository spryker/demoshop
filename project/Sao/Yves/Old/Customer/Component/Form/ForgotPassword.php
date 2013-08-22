<?php

/*
 * @property $emailaddress
*/
class Sao_Yves_Customer_Component_Form_ForgotPassword extends Sao_Yves_Library_Form_Model
{
    public function init()
    {
        // Email address
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'emailaddress', $this);
        $element->setValue('')
            ->setLabel(' ')
            ->setRequired()
            ->addValidatorEmail()
            ->setAttributes(array(
            'placeholder' => t(Sao_Yves_Library_L::YOUR_EMAIL),
            'class' => 'textinput',
            'tabindex' => 1
        ));

        $this->addElement($element);
    }
}
