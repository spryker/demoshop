<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Customer\Dependency\Plugin\RegistrationTokenSenderPluginInterface;

class RegistrationTokenSender extends AbstractPlugin implements RegistrationTokenSenderPluginInterface
{
    public function send($email, $token)
    {
        return $this->getFacade()->sendRegistrationToken($email, $token);
    }
}
