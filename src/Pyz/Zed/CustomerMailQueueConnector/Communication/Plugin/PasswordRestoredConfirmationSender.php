<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoredConfirmationSenderPluginInterface;

class PasswordRestoredConfirmationSender extends AbstractPlugin implements PasswordRestoredConfirmationSenderPluginInterface
{
    /**
     * @param string $email
     * @return void
     */
    public function send($email)
    {
        $this->getFacade()->sendPasswordRestored($email);
    }
}
