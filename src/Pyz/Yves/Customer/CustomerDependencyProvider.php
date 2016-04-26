<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Customer\Plugin\AuthenticationHandler;
use Pyz\Yves\Customer\Plugin\GuestCheckoutAuthenticationHandlerPlugin;
use Pyz\Yves\Customer\Plugin\LoginCheckoutAuthenticationHandlerPlugin;
use Pyz\Yves\Customer\Plugin\RegistrationCheckoutAuthenticationHandlerPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CustomerDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CUSTOMER = 'customer client';
    const CLIENT_NEWSLETTER = 'collector client';
    const CLIENT_SALES = 'client client';
    const PLUGIN_APPLICATION = 'application plugin';
    const PLUGIN_AUTHENTICATION_HANDLER = 'authentication plugin';
    const PLUGIN_LOGIN_AUTHENTICATION_HANDLER = 'login authentication plugin';
    const PLUGIN_GUEST_AUTHENTICATION_HANDLER = 'guest authentication plugin';
    const PLUGIN_REGISTRATION_AUTHENTICATION_HANDLER = 'registration authentication plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        $container[self::CLIENT_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->client();
        };

        $container[self::CLIENT_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->client();
        };

        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[self::PLUGIN_AUTHENTICATION_HANDLER] = function () {
            return new AuthenticationHandler();
        };

        $container[self::PLUGIN_LOGIN_AUTHENTICATION_HANDLER] = function () {
            return new LoginCheckoutAuthenticationHandlerPlugin();
        };

        $container[self::PLUGIN_GUEST_AUTHENTICATION_HANDLER] = function () {
            return new GuestCheckoutAuthenticationHandlerPlugin();
        };

        $container[self::PLUGIN_REGISTRATION_AUTHENTICATION_HANDLER] = function (Container $container) {
            $flashMessenger = $container[self::PLUGIN_APPLICATION]['flash_messenger'];

            return new RegistrationCheckoutAuthenticationHandlerPlugin($flashMessenger);
        };

        return $container;
    }

}
