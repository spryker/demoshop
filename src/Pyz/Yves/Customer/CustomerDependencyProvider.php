<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer;

use Pyz\Yves\Customer\Plugin\AuthenticationHandler;
use Pyz\Yves\Customer\Plugin\GuestCheckoutAuthenticationHandlerPlugin;
use Pyz\Yves\Customer\Plugin\LoginCheckoutAuthenticationHandlerPlugin;
use Pyz\Yves\Customer\Plugin\RegistrationCheckoutAuthenticationHandlerPlugin;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;

class CustomerDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CUSTOMER = 'customer client';
    public const CLIENT_NEWSLETTER = 'newsletter client';
    public const CLIENT_SALES = 'client client';
    public const CLIENT_OFFER = 'client offer';
    public const CLIENT_QUOTE = 'client quote';
    public const CLIENT_PRODUCT_BUNDLE = 'client product bundle';
    public const CLIENT_CART = 'client cart';
    public const PLUGIN_APPLICATION = 'application plugin';
    public const PLUGIN_AUTHENTICATION_HANDLER = 'authentication plugin';
    public const PLUGIN_LOGIN_AUTHENTICATION_HANDLER = 'login authentication plugin';
    public const PLUGIN_GUEST_AUTHENTICATION_HANDLER = 'guest authentication plugin';
    public const PLUGIN_REGISTRATION_AUTHENTICATION_HANDLER = 'registration authentication plugin';
    public const SERVICE_UTIL_VALIDATE = 'validate service';
    public const FLASH_MESSENGER = 'flash messenger';
    public const STORE = 'store';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);
        $container = $this->provideStore($container);
        $container = $this->provideUtilValidateService($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[static::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        $container[static::CLIENT_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->client();
        };

        $container[static::CLIENT_NEWSLETTER] = function (Container $container) {
            return $container->getLocator()->newsletter()->client();
        };

        $container[static::CLIENT_OFFER] = function (Container $container) {
            return $container->getLocator()->offer()->client();
        };

        $container[static::CLIENT_QUOTE] = function (Container $container) {
            return $container->getLocator()->quote()->client();
        };

        $container[static::CLIENT_PRODUCT_BUNDLE] = function (Container $container) {
            return $container->getLocator()->productBundle()->client();
        };

        $container[static::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function providePlugins(Container $container)
    {
        $container[static::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[static::PLUGIN_AUTHENTICATION_HANDLER] = function () {
            return new AuthenticationHandler();
        };

        $container[static::PLUGIN_LOGIN_AUTHENTICATION_HANDLER] = function () {
            return new LoginCheckoutAuthenticationHandlerPlugin();
        };

        $container[static::PLUGIN_GUEST_AUTHENTICATION_HANDLER] = function () {
            return new GuestCheckoutAuthenticationHandlerPlugin();
        };

        $container[static::PLUGIN_REGISTRATION_AUTHENTICATION_HANDLER] = function () {
            return new RegistrationCheckoutAuthenticationHandlerPlugin();
        };

        $container[static::FLASH_MESSENGER] = function (Container $container) {
            return $container[static::PLUGIN_APPLICATION]['flash_messenger'];
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideStore(Container $container)
    {
        $container[static::STORE] = function () {
            return Store::getInstance();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideUtilValidateService(Container $container)
    {
        $container[static::SERVICE_UTIL_VALIDATE] = function () use ($container) {
            return $container->getLocator()->utilValidate()->service();
        };

        return $container;
    }
}
