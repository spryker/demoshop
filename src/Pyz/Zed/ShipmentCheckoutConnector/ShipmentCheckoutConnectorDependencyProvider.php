<?php

namespace Pyz\Zed\ShipmentCheckoutConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ShipmentCheckoutConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const SHIPMENT_FACADE = 'shipment facade';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::SHIPMENT_FACADE] = function (Container $container) {
            return $container->getLocator()->shipment()->facade();
        };

        return $container;
    }

}
