<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Mail_Module_Controller_Yves extends ProjectA_Zed_Library_Controller_Yves implements ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    public function cartAbandonedUnsubscribeAction(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $result = $this->facadeMail->cartAbandonedUnsubscribe($unsubscribeTransfer);

        /* @var Sao_Shared_Application_Transfer_Response_Message $message */
        foreach ($result->getMessages() as $message) {
            $this->addMessage($message->getMessage(), $message->getData());
        }
        $this->setSuccess($result->getSuccess());
        return $result->getTransfer();
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    public function cartAbandonedSubscribeAction(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $result = $this->facadeMail->cartAbandonedSubscribe($unsubscribeTransfer);

        /* @var Sao_Shared_Application_Transfer_Response_Message $message */
        foreach ($result->getMessages() as $message) {
            $this->addMessage($message->getMessage(), $message->getData());
        }
        $this->setSuccess($result->getSuccess());
        return $result->getTransfer();
    }
}
