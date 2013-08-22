<?php


class Sao_Yves_Customer_Component_Form_CreateAccount extends Sao_Yves_Application_Component_Form_BasicAccount
{
    public function init()
    {
        $this->addAllBasicElements();
    }

    public function addAllBasicElements()
    {
        $this->addElements(
            array(
                 // $this->getElementSalutation(),
                 $this->getElementFistName(),
                 $this->getElementLastName(),
                 $this->getElementEmail(),
                 $this->getElementPassword(),
                 // $this->getElementPassword2(),
                 // $this->getElementBirthday(),
                 // $this->getElementCustomerType(),
                 // $this->getElementCustomerTaxnumber(),
                 // $this->getElementStateRegistration(),
                 // $this->getElementOfficialName(),
                 // $this->getElementAllowDifferentBillingAddress(),
                 // $this->getElementPassword(),
                 // $this->getElementPassword2(),
                 // $this->getElementNewsletter(),
            )
        );
    }

}