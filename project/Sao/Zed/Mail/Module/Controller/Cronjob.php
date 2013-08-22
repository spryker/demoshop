<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Mail_Module_Controller_Cronjob extends ProjectA_Zed_Mail_Module_Controller_Cronjob
{

    public function sendCartAbandonedMailsAction()
    {
        $result = $this->facadeMail->sendCartAbandonedMails();
        $this->addResultDataAndSetReturnCode($result, self::RETURN_CODE_SUCCESS);
    }
}
