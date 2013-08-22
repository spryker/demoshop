<?php

/**
 * Class Sao_Yves_Monitoring_Component_Form_Logging
 *
 * @author Stefan Sorge
 */
class Sao_Yves_Monitoring_Component_Form_Logging extends Sao_Yves_Library_Form_Model
{
    /**
     * @see CFormModel::init
     */
    public function init()
    {
        $this->addElements(
            array(
                 $this->getElementIncomplete(),
                 $this->getElementMessage(),
                 $this->getElementMode(),
                 $this->getElementName(),
                 $this->getElementStack(),
                 $this->getElementUrl(),
                 $this->getElementUserAgent(),
            )
        );

        return;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementIncomplete()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'incomplete', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementMessage()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'message', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementMode()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'mode', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementName()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'name', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementStack()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textArea, 'stack', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementUrl()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'url', $this);
        $element->setRequired(false);
        return $element;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    protected function getElementUserAgent()
    {
        $element = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_textField, 'useragent', $this);
        $element->setRequired(false);
        return $element;
    }
}