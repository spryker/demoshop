<?php

namespace Pyz\Zed\Customer\Business;

use ProjectA\Zed\Customer\Business\CustomerSettings as SprykerCustomerSettings;
use ProjectA\Zed\Customer\Dependency\Plugin\PasswordRestoredConfirmationSenderPluginInterface;
use ProjectA\Zed\Customer\Dependency\Plugin\PasswordRestoreTokenSenderPluginInterface;
use ProjectA\Zed\Customer\Dependency\Plugin\RegistrationTokenSenderPluginInterface;

class CustomerSettings extends SprykerCustomerSettings
{
    /**
     * @return PasswordRestoredConfirmationSenderPluginInterface[]
     */
    public function getPasswordRestoredConfirmationSenders()
    {
        return [
        //    $this->locator->customerMailConnector()->pluginPasswordRestoredConfirmationSender(),
        ];
    }

    /**
     * @return PasswordRestoreTokenSenderPluginInterface[]
     */
    public function getPasswordRestoreTokenSenders()
    {
        return [
        //    $this->locator->customerMailConnector()->pluginPasswordRestoreTokenSender(),
        ];
    }

    /**
     * @return RegistrationTokenSenderPluginInterface[]
     */
    public function getRegistrationTokenSenders()
    {
        return [
        //    $this->locator->customerMailConnector()->pluginRegistrationTokenSender(),
        ];
    }
}
