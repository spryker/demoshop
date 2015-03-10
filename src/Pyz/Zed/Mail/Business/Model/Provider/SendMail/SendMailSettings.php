<?php
namespace Pyz\Zed\Mail\Business\Model\Provider\SendMail;

use ProjectA\Zed\Mail\Business\Model\Provider\SendMail\SendMailSettings as CoreSendMailSettings;

class SendMailSettings extends CoreSendMailSettings
{
    /**
     * This is the default sender address, which can be overwritten by templates
     * @return string
     */
    public function getSenderAddress()
    {
        return 'shop@project-yz.com';
    }

    /**
     * This is the default sender name, which can be overwritten by templates
     * @return string
     */
    public function getSenderName()
    {
        return 'demoshop';
    }

    /**
     * @return string
     */
    public function getBounceAddressDomain()
    {
        return 'project-yz.com';
    }

    /**
     * @return bool
     */
    public function useBounceAddressDomain()
    {
        return false;
    }
}

