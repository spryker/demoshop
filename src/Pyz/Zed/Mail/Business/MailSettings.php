<?php


namespace Pyz\Zed\Mail\Business;

use ProjectA\Zed\Mail\Business\MailSettings As CoreMailSettings;
use Pyz\Zed\Mail\Business\Model\Provider\MandrillMailProvider;

class MailSettings extends CoreMailSettings
{
    public function getMailProviderConfig()
    {
        return [
            'customer_registration' => MandrillMailProvider::getName(),
        ];
    }
}
 