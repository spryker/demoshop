<?php

namespace Pyz\Zed\Customer;

use SprykerFeature\Zed\Customer\CustomerConfig as SprykerCustomerConfig;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoredConfirmationSenderPluginInterface;
use SprykerFeature\Zed\Customer\Dependency\Plugin\PasswordRestoreTokenSenderPluginInterface;
use SprykerFeature\Zed\Customer\Dependency\Plugin\RegistrationTokenSenderPluginInterface;

class CustomerConfig extends SprykerCustomerConfig
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
