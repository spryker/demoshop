<?php
/**
 * @version
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Provider_SendMail_TemplateGenerator extends ProjectA_Zed_Mail_Component_Provider_SendMail_TemplateGenerator
{
    /**
     * @param ProjectA_Shared_Mail_Transfer_Mail $transferObject
     * @return string
     */
    public function createHtmlTemplate(ProjectA_Shared_Mail_Transfer_Mail $transferObject)
    {
        return $this->getRenderedTemplateContent($transferObject, Sao_Zed_Mail_Component_Model_Template::RENDER_HTML);
    }

    /**
     * @param ProjectA_Shared_Mail_Transfer_Mail $transferObject
     * @return string
     */
    public function createTextTemplate(ProjectA_Shared_Mail_Transfer_Mail $transferObject)
    {
        return $this->getRenderedTemplateContent($transferObject, Sao_Zed_Mail_Component_Model_Template::RENDER_TEXT);
    }

    public function getRenderedTemplateContent(ProjectA_Shared_Mail_Transfer_Mail $transferObject, $element)
    {
        $type = $transferObject->getType();
        $data = $transferObject->toArray();

        $templateEntity = $this->factory->getFacade()->getTemplateByName($type);
        if (!$templateEntity) {
            throw new ProjectA_Zed_Library_Exception('Template "' . $type . '" not found.');
        }

        return
            $this->factory->getFacade()->renderTemplate(
                $templateEntity,
                $data,
                $element
            );
    }
}
