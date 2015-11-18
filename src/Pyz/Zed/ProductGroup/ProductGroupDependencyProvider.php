<?php

namespace Pyz\Zed\ProductGroup;
use PavFeature\Zed\ProductGroup\ProductGroupDependencyProvider as PavProductGroupDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductGroupDependencyProvider extends PavProductGroupDependencyProvider
{

    const FACADE_PRODUCT_GROUP = 'facade product group';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_PRODUCT_GROUP] = function (Container $container) {
            return $container->getLocator()->productGroup()->facade();
        };

        return $container;
    }
}