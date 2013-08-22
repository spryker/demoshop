<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Gui_Form_Sequence extends Zend_Form
{
    const FORM_IDENTIFIER = 'mailSequenceForm';

    public function init()
    {
        $this->addTextElementToForm(self::getNameForField(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME), true);
        $this->addTextElementToForm(self::getNameForFieldStep(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::STEP));
        $this->setName(self::FORM_IDENTIFIER);
    }

    /**
     * @param $name
     * @param bool $required
     * @param bool $value
     */
    protected function addTextElementToForm($name, $required = false, $value = false)
    {
        $element = new ProjectA_Zed_Library_Form_Element_Text($name);
        $element->setLabel(__($name));
        $element->setRequired($required);
        if ($value) {
            $element->setValue($value);
        }
        $this->addElement($element);
    }

    /**
     * @param $field
     * @return string
     */
    protected static function getNameForField($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailSequencePeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

    /**
     * @param $field
     * @return string
     */
    public static function getNameForFieldStep($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }
}
