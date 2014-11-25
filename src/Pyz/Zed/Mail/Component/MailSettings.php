<?php


namespace Pyz\Zed\Mail\Component;

use ProjectA\Zed\Mail\Component\MailSettings As CoreMailSettings;
use Pyz\Zed\Mail\Component\Model\Provider\MandrillMailProvider;

class MailSettings extends CoreMailSettings
{
    public function getMailProviderConfig()
    {
        return [
            'customer_registration' => MandrillMailProvider::getName(),
        ];
    }
}
 