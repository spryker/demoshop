<?php

namespace Pyz\Zed\SalesCheckoutConnector;

use SprykerEngine\Zed\Kernel\Container;
use PavFeature\Zed\SalesCheckoutConnector\SalesCheckoutConnectorDependencyProvider as PavFeatureSalesCheckoutConnectorDependencyProvider;

class SalesCheckoutConnectorDependencyProvider extends PavFeatureSalesCheckoutConnectorDependencyProvider
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
