<?php

/*
 * @property $password
 *
*/
class Sao_Yves_Customer_Component_Form_NewPassword extends Sao_Yves_Library_Form_Model
{

    public function init()
    {
        $password = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_passwordField, 'password', $this);
        $password->setAttribute('class', 'textInput');
        $password->setLabel('<strong>'.t(Sao_Yves_Library_L::PASSWORD).'</strong>');
        $password->setRequired();
        $password->setMinLength(6);

        $this->addElements(array($password));
    }

}