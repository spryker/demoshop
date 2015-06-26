<?php

namespace Pyz\Zed\Customer;

use SprykerFeature\Zed\Customer\CustomerConfig as SprykerCustomerConfig;
use SprykerFeature\Zed\Customer\CustomerDependencyProvider;

class CustomerConfig extends SprykerCustomerConfig
{

    /**
     * @return array
     */
    public function getPasswordRestoredConfirmationSenders()
    {
        return [
            CustomerDependencyProvider::PASSWORD_RESTORED_CONFIRMATION_SENDER
        ];
    }

    /**
     * @return array
     */
    public function getPasswordRestoreTokenSenders()
    {
        return [
            CustomerDependencyProvider::PASSWORD_RESTORE_TOKEN_SENDER
        ];
    }

    /**
     * @return array
     */
    public function getRegistrationTokenSenders()
    {
        return [
            CustomerDependencyProvider::REGISTRATION_TOKEN_SENDER
        ];
    }

}
