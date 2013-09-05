<?php

class Sao_Yves_Library_Form_Element extends ProjectA_Yves_Library_Form_Element
{
    /**
     * @return Sao_Yves_Library_Form_Element
     */
    public function addValidatorEmailsByComma()
    {
        $this->addValidator(array(0 => 'emailsByComma',
                                  1 => array('message' => $this->getLabel() . ' ' . t(Sao_Yves_Library_L::VALIDATOR_EMAILS_BY_COMMA))));
        return $this;
    }

    /**
     * @return Sao_Yves_Library_Form_Element
     */
    public function addValidatorDate($format = 'dd/MM/yyyy')
    {
        $this->addValidator(
            array(
                0 => 'date',
                1 => array('format' => $format, 'message' => $this->getLabel() . ' ' . t(Sao_Yves_Library_L::VALIDATOR_DATE))
            )
        );
        return $this;
    }
}