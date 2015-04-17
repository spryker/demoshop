<?php

namespace Pyz\Zed\Customer\Business;

use ProjectA\Zed\Customer\Business\CustomerSettings as SprykerCustomerSettings;
use ProjectA\Zed\Customer\Dependency\Plugin\SendPasswordRestoredConfirmationPluginInterface;
use ProjectA\Zed\Customer\Dependency\Plugin\SendPasswordRestoreTokenPluginInterface;
use ProjectA\Zed\Customer\Dependency\Plugin\SendRegistrationTokenPluginInterface;

class CustomerSettings extends SprykerCustomerSettings
{
    /**
     * @return SendPasswordRestoredConfirmationPluginInterface[]
     */
    public function getPasswordRestoredConfirmationSenders()
    {
        return [
            $this->locator->customerMailConnector()->pluginRestoredConfirmationSender(),
        ];
    }

    /**
     * @return SendPasswordRestoreTokenPluginInterface[]
     */
    public function getPasswordRestoreTokenSenders()
    {
        return [];
    }

    /**
     * @return SendRegistrationTokenPluginInterface[]
     */
    public function getRegistrationTokenSenders()
    {
        return [];
    }
}
