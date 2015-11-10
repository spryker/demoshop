<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

class CustomerMailQueueConnectorFacade extends AbstractFacade
{
    public function sendRegistrationToken($email, $token)
    {
        return $this->getDependencyContainer()
            ->createRegistrationTokenSender()
            ->send($email, $token);
    }

    public function sendRestoreToken($email, $token)
    {
        return $this->getDependencyContainer()
            ->createRestoreTokenSender()
            ->send($email, $token);
    }

    public function sendPasswordRestored($email)
    {
        return $this->getDependencyContainer()
            ->createRestoreConfirmationSender()
            ->send($email);
    }
}
