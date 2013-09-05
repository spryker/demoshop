<?php

class Sao_Yves_Library_Form_Model extends ProjectA_Yves_Library_Form_Model
{
    /**
     * Override this method if you want to post process form elements
     * before they are send to Generated_Yves_Zed (get rid of spaces, etc)
     */
    public function filterElementsBeforeSendOrder()
    {
        ;
    }

    /**
     * Deletes characters in Value of the element
     * @param string $element
     * @param array $charactersToFilterOut
     */
    protected function filterElementsValue($element, array $charactersToFilterOut)
    {
        $element = $this->getElement($element);
        $value = $element->getValue();
        $value = str_replace($charactersToFilterOut, '', $value);
        $element->setValue($value);
    }
}