<?php

namespace Pyz\Zed\Customer;

use Spryker\Zed\CustomerMailConnector\Communication\Plugin\PasswordRestoredConfirmationSender;
use Spryker\Zed\CustomerMailConnector\Communication\Plugin\PasswordRestoreTokenSender;
use Spryker\Zed\CustomerMailConnector\Communication\Plugin\RegistrationTokenSender;
use Spryker\Zed\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{

    const SALES_FACADE = 'sales facade';
    const NEWSLETTER_FACADE = 'newsletter facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container[self::SALES_FACADE] = function (Container $container) {
            return $container->getLocator()->sales()->facade();
        };

        $container[self::NEWSLETTER_FACADE] = function (Container $container) {
            return $container->getLocator()->newsletter()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return mixed[]
     */
    protected function getSenderPlugins(Container $container)
    {
        return [
            SprykerCustomerDependencyProvider::REGISTRATION_TOKEN_SENDERS => [
                new RegistrationTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORE_TOKEN_SENDERS => [
                new PasswordRestoreTokenSender(),
            ],
            SprykerCustomerDependencyProvider::PASSWORD_RESTORED_CONFIRMATION_SENDERS => [
                new PasswordRestoredConfirmationSender(),
            ],
        ];
    }

}
