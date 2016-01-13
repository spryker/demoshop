<?php

namespace Pyz\Zed\Customer;

use Spryker\Zed\CustomerMailConnector\Communication\Plugin\PasswordRestoredConfirmationSender;
use Spryker\Zed\CustomerMailConnector\Communication\Plugin\PasswordRestoreTokenSender;
use Spryker\Zed\CustomerMailConnector\Communication\Plugin\RegistrationTokenSender;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;

class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{

    const SALES_FACADE = 'sales facade';
    const NEWSLETTER_FACADE = 'newsletter facade';

    /**
     * @param Container $container
     *
     * @return Container
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
     * @param Container $container
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
