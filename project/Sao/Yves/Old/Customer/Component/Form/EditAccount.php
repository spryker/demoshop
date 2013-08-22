<?php


class Sao_Yves_Customer_Component_Form_EditAccount extends Sao_Yves_Application_Component_Form_BasicAccount
{
    public function init()
    {
        $elementPassword = $this->getElementPassword();
        $elementPassword->setLabel(t(Sao_Yves_Library_L::NEW_PASSWORD));
        $elementPassword->setRequired(false);
        $elementPassword->setAttribute('autocomplete', 'off');

        $this->addElements(array(
            $this->getElementFistName(),
            $this->getElementLastName(),
            $this->getElementBirthday(),
            $this->getElementEmail(),
            $elementPassword,
            $this->getElementOldPassword(),
            //$this->getElementPassword2(),
            $this->getElementNewsletter(),
        ));
    }

}
