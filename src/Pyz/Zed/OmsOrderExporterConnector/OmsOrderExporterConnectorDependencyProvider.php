<?php

namespace Pyz\Zed\OmsOrderExporterConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class OmsOrderExporterConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_ORDER_EXPORTER = 'facade order exporter';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::FACADE_ORDER_EXPORTER] = function (Container $container) {
            return $container->getLocator()->orderExporter()->facade();
        };

        return $container;
    }
}
