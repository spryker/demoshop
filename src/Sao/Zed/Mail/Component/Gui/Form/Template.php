<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Gui_Form_Template extends Zend_Form
{
    const FORM_IDENTIFIER = 'mailTemplateForm';

    /**
     * @var Sao_Zed_Mail_Component_Gui_Crud_Template
     */
    protected $crud;

    /**
     * @param null $options
     * @param Sao_Zed_Mail_Component_Gui_Crud_Template $crud
     */
    public function __construct($options = null, Sao_Zed_Mail_Component_Gui_Crud_Template $crud = null)
    {
        $this->crud = $crud;
        parent::__construct($options);
    }

    public function init()
    {
        $this->addTextElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME, true);
        $this->addTextElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT, false);
        $this->addTextElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER, false);
        $this->addSelectElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP, false, $this->getWrapOptions());
        $this->addTextareaElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT);
        $this->addTextareaElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML);
        $this->addCheckboxElementToForm(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED);

        //set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        //that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER);
    }

    /**
     * @param $field
     * @param bool $required
     * @param bool $value
     */
    protected function addTextElementToForm($field, $required = false, $value = false)
    {
        $name = $this->getNameForField($field);
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
     * @param bool $required
     * @param bool $value
     */
    protected function addTextareaElementToForm($field, $required = false, $value = false)
    {
        $name = $this->getNameForField($field);
        $element = new ProjectA_Zed_Library_Form_Element_Textarea($name);
        $element->setLabel(__($name));
        $element->setRequired($required);
        if ($value) {
            $element->setValue($value);
        }
        $this->addElement($element);
    }

    /**
     * @param $field
     */
    protected function addCheckboxElementToForm($field)
    {
        $name = $this->getNameForField($field);
        $element = new ProjectA_Zed_Library_Form_Element_Checkbox($name);
        $element->setLabel(__($name));
        $this->addElement($element);
    }

    /**
     * @param $field
     * @param bool $required
     * @param array $options
     * @param null $selectedValue
     */
    protected function addSelectElementToForm($field, $required = false, array $options = null, $selectedValue = null)
    {
        $name = $this->getNameForField($field);
        $element = new ProjectA_Zed_Library_Form_Element_Select($name);
        $element->setLabel(__($name));
        $element->setRequired($required);
        if ($options) {
            $element->setMultiOptions($options);
        }
        if ($selectedValue) {
            $element->setValue($selectedValue);
        }
        $this->addElement($element);
    }

    /**
     * @param $field
     * @return string
     */
    protected function getNameForField($field)
    {
        return
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::translateFieldName(
                $field,
                BasePeer::TYPE_COLNAME,
                BasePeer::TYPE_FIELDNAME
            );
    }

    /**
     * @return array
     */
    protected function getWrapOptions()
    {
        $templates = array('' => '');

        $idFieldName = $this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::ID_MAIL_TEMPLATE);
        $nameFieldName = $this->getNameForField(Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME);

        $mailTemplateQuery = new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery();
        $mailTemplateQuery->select(array($idFieldName, $nameFieldName));
        $mailTemplateQuery->orderByName();
        $mailTemplateCollectionArray = $mailTemplateQuery->find()->toArray(null, false, BasePeer::TYPE_FIELDNAME);

        foreach ($mailTemplateCollectionArray as $mailTemplate) {
            //skip self-reference
            if ($this->crud->getId() == $mailTemplate[$idFieldName]) {
                continue;
            }
            $templates[$mailTemplate[$idFieldName]] = $mailTemplate[$nameFieldName];
        }
        return $templates;
    }

}
