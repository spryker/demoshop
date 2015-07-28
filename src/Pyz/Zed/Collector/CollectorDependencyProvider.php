<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Collector;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const FACADE_PRICE = 'price_facade';

    const QUERY_CONTAINER_PRICE = 'price_query_container';

    const FACADE_CATEGORY_EXPORTER = 'category_exporter_facade';

    const QUERY_CONTAINER_CATEGORY = 'category_query_container';

    /**
     * @var Container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->facade();
        };

        $container[self::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        $container[self::FACADE_CATEGORY_EXPORTER] = function (Container $container) {
            return $container->getLocator()->categoryExporter()->facade();
        };

        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        return $container;
    }


}
