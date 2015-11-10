<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoreTokenSenderPluginInterface;

class PasswordRestoreTokenSender extends AbstractPlugin implements PasswordRestoreTokenSenderPluginInterface
{
    public function send($email, $token)
    {
        return $this->getFacade()->sendRestoreToken($email, $token);
    }
}
