<?php

/*
 * @property $email
 * @property $password
 *
*/
class Sao_Yves_Customer_Component_Form_Login extends Sao_Yves_Library_Form_Model
{

    public function init()
    {
        $email = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'email', $this);
        $email->setAttribute('class', 'textInput');
        $email->setAttribute('type', 'email');
        $email->setAttribute('required', 'required');
        $email->setLabel(t(Sao_Yves_Library_L::EMAIL));
        //$email->addValidatorEmail();
        $email->setRequired();

        $password = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_passwordField, 'password', $this);
        $password->setAttribute('class', 'textInput');
        $password->setAttribute('required', 'required');
        $password->setLabel(t(Sao_Yves_Library_L::PASSWORD));
        $password->setRequired();

        $remember = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'remember', $this);
        $remember->setLabel(t(Sao_Yves_Library_L::LOGIN_REMEMBER));


        $this->addElements(array($email, $password, $remember));
    }

}
