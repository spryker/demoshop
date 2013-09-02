<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Provider_SendMail_Recipient extends ProjectA_Zed_Mail_Component_Provider_SendMail_Recipient implements
    Sao_Zed_Mail_Component_Interface_MailConstants,
    Sao_Zed_Mail_Component_Model_Constants
{
    /**
     * @param ProjectA_Shared_Mail_Transfer_Mail $mailTransfer
     * @return null
     */
    public function getRecipientAddress(ProjectA_Shared_Mail_Transfer_Mail $mailTransfer)
    {
        if (ProjectA_Shared_Library_Environment::isNotProduction()) {
            if ($this->isCustomerMail($mailTransfer)) {
                //Non-Production Customer email, use origin address
                return $mailTransfer->getRecipientAddress();
            } else {
                //Non-Production Non-Customer email, use fake address
                return $this->getFakeRecipientAddress();
            }
        } else {
            if ($mailTransfer->getIsOrderMail() && $mailTransfer->getIsTestOrder()) {
                //Production Test-Order email, use fake address
                return $this->getFakeRecipientAddress();
            } else {
                //Production Non-Order Mail or No-Test-Order email, use origin address
                return $mailTransfer->getRecipientAddress();
            }
        }
    }

    /**
     * @param ProjectA_Shared_Mail_Transfer_Mail $mailTransfer
     * @return bool
     */
    protected function isCustomerMail(ProjectA_Shared_Mail_Transfer_Mail $mailTransfer)
    {
        return $mailTransfer->getSubType() == self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return mixed
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function getFakeRecipientAddress()
    {
        $mailConfig = ProjectA_Shared_Library_Config::get(self::KEY_MAIL_CONFIG);
        if ($mailConfig) {
            $overrideData = isset($mailConfig[self::KEY_OVERRIDE_DATA]) ? $mailConfig[self::KEY_OVERRIDE_DATA] : null;
            if ($overrideData && isset($overrideData[self::KEY_EMAIL])) {
                return $overrideData[self::KEY_EMAIL];
            }
        }
        throw new ProjectA_Zed_Library_Exception("missing configuration entry, check your \$config['mail']['overrideOrderData']");
    }
}
