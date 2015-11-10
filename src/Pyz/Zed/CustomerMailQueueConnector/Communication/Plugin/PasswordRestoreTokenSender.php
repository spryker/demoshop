<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoreTokenSenderPluginInterface;

class PasswordRestoreTokenSender extends AbstractPlugin implements PasswordRestoreTokenSenderPluginInterface
{
    /**
     * @param string $email
     * @param string $token
     * @return void
     */
    public function send($email, $token)
    {
        $this->getFacade()->sendRestoreToken($email, $token);
    }
}
