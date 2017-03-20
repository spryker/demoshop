<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Customer\Plugin\CustomerStepHandler;
use Pyz\Yves\Shipment\Plugin\ShipmentFormDataProviderPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    const CLIENT_CALCULATION = 'CLIENT_CALCULATION';
    const CLIENT_CHECKOUT = 'CLIENT_CHECKOUT';
    const CLIENT_CUSTOMER = 'CLIENT_CUSTOMER';
    const CLIENT_CART = 'CLIENT_CART';
    const STORE = 'STORE';

    const PLUGIN_APPLICATION = 'PLUGIN_APPLICATION';
    const PLUGIN_CUSTOMER_STEP_HANDLER = 'PLUGIN_CUSTOMER_STEP_HANDLER';
    const PLUGIN_SHIPMENT_STEP_HANDLER = 'PLUGIN_SHIPMENT_STEP_HANDLER';
    const PLUGIN_SHIPMENT_HANDLER = 'PLUGIN_SHIPMENT_HANDLER';
    const PLUGIN_SHIPMENT_FORM_DATA_PROVIDER = 'PLUGIN_SHIPMENT_FORM_DATA_PROVIDER';

    const PAYMENT_METHOD_HANDLER = 'PAYMENT_METHOD_HANDLER';
    const PAYMENT_SUB_FORMS = 'PAYMENT_SUB_FORMS';

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

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        parent::provideClients($container);

        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        $container[self::CLIENT_CHECKOUT] = function (Container $container) {
            return $container->getLocator()->checkout()->client();
        };

        $container[self::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        $container[self::CLIENT_CART] = function (Container $container) {
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
        parent::providePlugins($container);

        $container[self::PLUGIN_CUSTOMER_STEP_HANDLER] = function () {
            return new CustomerStepHandler();
        };

        $container[self::PLUGIN_SHIPMENT_HANDLER] = function () {
            $shipmentHandlerPlugins = new StepHandlerPluginCollection();
            $shipmentHandlerPlugins->add(new ShipmentHandlerPlugin(), self::PLUGIN_SHIPMENT_STEP_HANDLER);

            return $shipmentHandlerPlugins;
        };

        $container[self::PLUGIN_SHIPMENT_FORM_DATA_PROVIDER] = function () {
            return new ShipmentFormDataProviderPlugin();
        };

        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
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

}
