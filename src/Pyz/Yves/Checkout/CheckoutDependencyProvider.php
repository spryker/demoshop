<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Customer\Plugin\CustomerStepHandler;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Spryker\Yves\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    const CLIENT_CALCULATION = 'calculation client';
    const CLIENT_CHECKOUT = 'checkout client';
    const CLIENT_CUSTOMER = 'customer client';
    const CLIENT_SHIPMENT = 'shipment client';
    const CLIENT_GLOSSARY = 'glossary client';

    const PLUGIN_APPLICATION = 'application plugin';

    const PLUGIN_CUSTOMER_STEP_HANDLER = 'customer step handler plugin';
    const PLUGIN_SHIPMENT_STEP_HANDLER = 'shipment step handler plugin';

    const PAYMENT_METHOD_HANDLER = 'payment method handler';
    const PAYMENT_SUB_FORMS = 'payment sub forms';

    const PLUGIN_SHIPMENT_HANDLER = 'shipment handler plugin';


    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);

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

        $container[self::CLIENT_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipment()->client();
        };

        $container[self::CLIENT_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->client();
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

        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        return $container;
    }

}
