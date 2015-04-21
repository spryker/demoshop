<?php

namespace Pyz\Zed\Customer\Business;

use SprykerFeature\Zed\Customer\Business\CustomerSettings as SprykerCustomerSettings;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoredConfirmationSenderPluginInterface;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoreTokenSenderPluginInterface;
use SprykerFeature\Zed\Customer\Dependency\Plugin\RegistrationTokenSenderPluginInterface;

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
