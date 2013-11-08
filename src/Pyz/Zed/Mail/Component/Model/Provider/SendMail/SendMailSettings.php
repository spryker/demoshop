<?php
namespace Pyz\Zed\Mail\Component\Model\Provider\SendMail;

use ProjectA\Zed\Mail\Component\Model\Provider\SendMail\SendMailSettings as CoreSendMailSettings;

class SendMailSettings extends CoreSendMailSettings
{
    /**
     * !this is the default sender address,
     * each templates define a sender address in the pac_mail_template table
     * @return string
     */
    public function getSenderAddress()
    {
        return 'shop@project-yz.com';
    }

    /**
     * @return string
     */
    public function getBounceAddressDomain()
    {
        return 'project-yz.com';
    }
}
