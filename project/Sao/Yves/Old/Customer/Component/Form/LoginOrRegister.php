<?php

/**
 * Class Sao_Yves_Customer_Component_Form_LoginOrRegister
 *
 * @author Stefan Sorge
 *
 * @property string $context
 */
class Sao_Yves_Customer_Component_Form_LoginOrRegister extends Sao_Yves_Library_Form_Model
{
    /**
     * @const
     */
    const CONTEXT_LOGIN = 'Sao_Yves_Customer_Component_Form_Login';

    /**
     * @const
     */
    const CONTEXT_REGISTER = 'Sao_Yves_Customer_Component_Form_CreateAccount';

    /**
     * @see CFormModel::init
     */
    public function init()
    {
        $this->addElements(
            array(
                $this->getElementEmail(),
                $this->getElementContext(),
                $this->getElementCaptcha()
            )
        );

        return;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementEmail()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'email', $this);
        $element->setRequired(true);

        return $element;
    }

    public function validateCaptcha($attribute, $params)
    {
        $value = $this->getElement($attribute)->getValue();
        if ($value !== '') {
            $this->addError($attribute, 'internal error');
        }
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementContext()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_dropDownList, 'context', $this);
        $element->setData(array(static::CONTEXT_LOGIN, static::CONTEXT_REGISTER));
        $element->setRequired(true);

        return $element;
    }


    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementCaptcha()
    {
        // some standard name
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'fullname_asavt', $this);
        $element->addValidatorEmail();

        $element->addValidator(
            array(
                0 => 'validateCaptcha',
                1 => array(
                    'message' => '',
                    'allowEmpty' => true,
                )
            )
        );

        return $element;
    }
}
