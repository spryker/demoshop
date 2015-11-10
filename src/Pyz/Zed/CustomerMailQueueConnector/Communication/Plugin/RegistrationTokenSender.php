<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Customer\Dependency\Plugin\RegistrationTokenSenderPluginInterface;

class RegistrationTokenSender extends AbstractPlugin implements RegistrationTokenSenderPluginInterface
{
    /**
     * @param string $email
     * @param string $token
     * @return void
     */
    public function send($email, $token)
    {
        $this->getFacade()->sendRegistrationToken($email, $token);
    }
}
