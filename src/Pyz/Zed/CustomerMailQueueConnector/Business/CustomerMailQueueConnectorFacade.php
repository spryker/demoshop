<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

class CustomerMailQueueConnectorFacade extends AbstractFacade
{
    /**
     * @param string $email
     * @param string $token
     */
    public function sendRegistrationToken($email, $token)
    {
        $this->getDependencyContainer()
            ->createRegistrationTokenSender()
            ->send($email, $token);
    }

    /**
     * @param string $email
     * @param string $token
     */
    public function sendRestoreToken($email, $token)
    {
        $this->getDependencyContainer()
            ->createRestoreTokenSender()
            ->send($email, $token);
    }

    /**
     * @param string $email
     */
    public function sendPasswordRestored($email)
    {
        $this->getDependencyContainer()
            ->createRestoreConfirmationSender()
            ->send($email);
    }
}
