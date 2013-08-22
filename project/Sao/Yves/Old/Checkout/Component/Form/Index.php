<?php

/**
 * Class Sao_Yves_Checkout_Component_Form_Index
 *
 * @author Stefan Sorge
 * @see    https://project-a.codebasehq.com/projects/saatchi/tickets/107
 */
class Sao_Yves_Checkout_Component_Form_Index extends Sao_Yves_Library_Form_Model
{
    /**
     * @see CFormModel::init
     */
    public function init()
    {
        $this->addElements(array($this->getElementType()));

        return;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementType()
    {
        $type = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_dropDownList, 'type', $this);
        $type->setData(array('option1' => 'option1', 'option2' => 'option2'));
        $type->setRequired(false);

        return $type;
    }
}