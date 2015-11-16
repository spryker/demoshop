<?php

namespace Pyz\Zed\Cart;

use SprykerFeature\Zed\Cart\CartDependencyProvider as SpyCartDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class CartDependencyProvider extends SpyCartDependencyProvider
{
    CONST PLUGIN_CART_SHIPMENT = 'plugin shipment cart';

    /**
    * @param Container $container
    *
    * @return Container
    */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->facade();
        };

        $container[self::FACADE_ITEM_GROUPER] = function (Container $container) {
            return $container->getLocator()->itemGrouper()->facade();
        };

        $container[self::PLUGIN_CART_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipmentCartConnector()->pluginOrderShipmentMethodPlugin();
        };

        return $container;
    }
}
