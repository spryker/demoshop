<?php

namespace Pyz\Shared\Mail;

use SprykerFeature\Shared\Mail\MailConfig as CoreMailConfig;

interface MailConfig extends CoreMailConfig
{
    const MAIL_PROVIDER_MANDRILL = 'mandrill';
}
 