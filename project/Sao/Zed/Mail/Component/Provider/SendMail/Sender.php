<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Provider_SendMail_Sender extends ProjectA_Zed_Mail_Component_Provider_SendMail_Sender
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param ProjectA_Shared_Mail_Transfer_Mail $transferObject
     * @return mixed
     * @throws ProjectA_Zed_Library_Exception
     */
    public function getSenderAddress(ProjectA_Shared_Mail_Transfer_Mail $transferObject)
    {
        $type = $transferObject->getType();
        $templateEntity = $this->factory->getFacade()->getTemplateByName($type);
        if (!$templateEntity) {
            throw new ProjectA_Zed_Library_Exception('Template "' . $type . '" not found.');
        }

        $senderAddress = $templateEntity->getSender();
        if (!$senderAddress) {
            $senderAddress = $this->getDefaultSenderAddress();
        }

        return $senderAddress;
    }

    /**
     * @return mixed
     */
    protected function getDefaultSenderAddress()
    {
        $settings = $this->factory->getSettings()->getSendMail();
        return $settings->getSenderAddress();
    }
}
