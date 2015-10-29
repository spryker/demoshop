<?php

namespace Pyz\Zed\SalesCheckoutConnector;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\SalesCheckoutConnector\SalesCheckoutConnectorDependencyProvider as SpySalesCheckoutConnectorDependencyProvider;

class SalesCheckoutConnectorDependencyProvider extends SpySalesCheckoutConnectorDependencyProvider
{
    const FACADE_SALES = 'sales facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->facade();
        };

        return $container;
    }

}
