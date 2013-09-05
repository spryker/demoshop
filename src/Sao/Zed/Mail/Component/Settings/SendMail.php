<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Settings_SendMail extends ProjectA_Zed_Mail_Component_Settings_SendMail
{
    /**
     * @return string
     */
    public function getCharset()
    {
        return 'utf-8';
    }

    /**
     * @return string
     */
    public function getEncoding()
    {
        return 'text/html';
    }

    /**
     * !this is the default sender address,
     * each templates define a sender address in the sao_mail_template table
     * @return string
     */
    public function getSenderAddress()
    {
        return 'orders@saatchionline.com';
    }

    /**
     * @return string
     */
    public function getBounceAddressDomain()
    {
        return 'saatchionline.com';
    }

    //they are not needed but interface expects them
    public function getTemplateBasePath() {}
    public function getSubjectsByType() {}
}
