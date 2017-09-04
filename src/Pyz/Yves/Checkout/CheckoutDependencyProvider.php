<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Customer\Plugin\CustomerStepHandler;
use Pyz\Yves\Discount\Handler\VoucherCodeHandler;
use Pyz\Yves\GiftCard\Cart\Plugin\GiftCardCodeHandler;
use Pyz\Yves\Shipment\Plugin\ShipmentFormDataProviderPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;
use Spryker\Yves\Payment\Plugin\PaymentFormFilterPlugin;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    const CLIENT_CALCULATION = 'CLIENT_CALCULATION';
    const CLIENT_CHECKOUT = 'CLIENT_CHECKOUT';
    const CLIENT_CUSTOMER = 'CLIENT_CUSTOMER';
    const CLIENT_CART = 'CLIENT_CART';
    const CLIENT_PAYMENT = 'CLIENT_PAYMENT';
    const STORE = 'STORE';

    const PLUGIN_CUSTOMER_STEP_HANDLER = 'PLUGIN_CUSTOMER_STEP_HANDLER';
    const PLUGIN_SHIPMENT_STEP_HANDLER = 'PLUGIN_SHIPMENT_STEP_HANDLER';
    const PLUGIN_SHIPMENT_HANDLER = 'PLUGIN_SHIPMENT_HANDLER';
    const PLUGIN_SHIPMENT_FORM_DATA_PROVIDER = 'PLUGIN_SHIPMENT_FORM_DATA_PROVIDER';
    const CODE_HANDLER_PLUGINS = 'CODE_HANDLER_PLUGINS';

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
        $container = parent::provideClients($container);

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

        $container[self::CLIENT_PAYMENT] = function (Container $container) {
            return $container->getLocator()->payment()->client();
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
        $container = parent::providePlugins($container);

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

        $container[self::CODE_HANDLER_PLUGINS] = function () {
            return [
                new VoucherCodeHandler(),
                new GiftCardCodeHandler(),
            ];
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
     * @return \Spryker\Yves\Checkout\Dependency\Plugin\Form\SubFormFilterPluginInterface[]
     */
    protected function getPaymentFormFilterPlugins()
    {
        return [
            new PaymentFormFilterPlugin(),
        ];
    }

}
