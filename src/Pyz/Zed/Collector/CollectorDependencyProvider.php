<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Collector;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const QUERY_CONTAINER_PRODUCT = 'product_query_container';

    /**
     * @var Container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        return $container;
    }

}
