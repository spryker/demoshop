<?php

/**
 * Class Sao_Yves_Sales_Component_Form_OriginalNotification
 *
 * @author Stefan Sorge
 * @see    https://project-a.codebasehq.com/projects/saatchi/tickets/275
 */
class Sao_Yves_Sales_Component_Form_OriginalNotification extends Sao_Yves_Library_Form_Model
{

    /** @const string */
    const ELEMENT_HASH = 'hash';

    /** @const string */
    const ELEMENT_STATUS = 'status';

    /** @const string */
    const REGEX_MD5 = '/^[0-9a-f]{32}$/i';

    /**
     * @see CFormModel::init
     */
    public function init()
    {
        $this->addElements(array($this->getElementHash()));
        $this->addElements(array($this->getElementStatus()));
        return;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementHash()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, static::ELEMENT_HASH, $this);
        $element->addValidatorRegex(static::REGEX_MD5);
        $element->setRequired(true);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementStatus()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, static::ELEMENT_STATUS, $this);
        $element->setRequired(true);
        return $element;
    }

}