<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Customer;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;

/**
 * Class CustomerDependencyProvider
 * @package Pyz\Zed\Customer
 */
class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{
    /**
     * @param Container $container
     *
     * @return mixed[]
     */
    protected function getSenderPlugins(Container $container)
    {
        return [
            SprykerCustomerDependencyProvider::REGISTRATION_TOKEN_SENDERS => [
                $container->getLocator()->customerMailConnector()->pluginRegistrationTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORE_TOKEN_SENDERS => [
                $container->getLocator()->customerMailConnector()->pluginPasswordRestoreTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORED_CONFIRMATION_SENDERS => [
                $container->getLocator()->customerMailConnector()->pluginPasswordRestoredConfirmationSender(),
            ],
        ];
    }

}
