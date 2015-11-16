<?php

namespace Pyz\Zed\ShipmentCartConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ShipmentCartConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const SHIPMENT_FACADE = 'shipment facade';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[ShipmentCartConnectorDependencyProvider::SHIPMENT_FACADE] = function (Container $container) {
            return $container->getLocator()->shipment()->facade();
        };

        return $container;
    }
}
