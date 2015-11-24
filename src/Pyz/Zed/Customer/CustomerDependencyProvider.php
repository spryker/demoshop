<?php

namespace Pyz\Zed\Customer;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;

class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{

    const FACADE_COUNTRY = 'facade country';


    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_COUNTRY] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        return $container;
    }


    /**
     * @param Container $container
     *
     * @return mixed[]
     */
    protected function getSenderPlugins(Container $container)
    {
        return [
            SprykerCustomerDependencyProvider::REGISTRATION_TOKEN_SENDERS => [
                $container->getLocator()->customerMailQueueConnector()->pluginRegistrationTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORE_TOKEN_SENDERS => [
                $container->getLocator()->customerMailQueueConnector()->pluginPasswordRestoreTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORED_CONFIRMATION_SENDERS => [
                $container->getLocator()->customerMailQueueConnector()->pluginPasswordRestoredConfirmationSender(),
            ],
        ];
    }

}
