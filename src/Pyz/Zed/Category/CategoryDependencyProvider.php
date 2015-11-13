<?php

/**
 * (c) Spryker Systems GmbH copyright protected.
 */
namespace Pyz\Zed\Category;

use SprykerFeature\Zed\Category\CategoryDependencyProvider as SprykerDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class CategoryDependencyProvider extends SprykerDependencyProvider
{
    const QUERY_CONTAINER_LOCALE = 'locale query container';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::QUERY_CONTAINER_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        return $container;
    }
}
