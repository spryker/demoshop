<?php
/**
 * @version $Id$
 */
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Gui_Form_Template_Version extends Sao_Zed_Mail_Component_Gui_Form_Template
{
    const FORM_IDENTIFIER = 'mailTemplateVersionForm';

    /**
     * @var Sao_Zed_Mail_Persistence_SaoMailTemplateVersion
     */
    protected $templateVersion;

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $templateVersion
     * @param null $options
     * @param Sao_Zed_Mail_Component_Gui_Crud_Template $crud
     */
    public function __construct(Sao_Zed_Mail_Persistence_SaoMailTemplateVersion $templateVersion, $options = null, Sao_Zed_Mail_Component_Gui_Crud_Template $crud = null)
    {
        $this->templateVersion = $templateVersion;
        parent::__construct($options, $crud);
    }

    public function init()
    {
        $this->addTextElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::NAME,
            true,
            $this->templateVersion->getName()
        );
        $this->addTextElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SUBJECT,
            false,
            $this->templateVersion->getSubject()
        );
        $this->addTextElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::SENDER,
            false,
            $this->templateVersion->getSender()
        );
        $this->addSelectElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::WRAP,
            false,
            $this->getWrapOptions(),
            $this->templateVersion->getWrap()
        );
        $this->addTextareaElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::TEXT,
            false,
            $this->templateVersion->getText()
        );
        $this->addTextareaElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::HTML,
            false,
            $this->templateVersion->getHtml()
        );
        $this->addCheckboxElementToForm(
            Sao_Zed_Mail_Persistence_SaoMailTemplatePeer::DELETED,
            false,
            $this->templateVersion->getDeleted()
        );

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');
        $submit->setLabel(__('Restore Version'));
        $this->addElement($submit);

        //set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        //that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER . $this->templateVersion->getIdMailTemplate());
    }

}
