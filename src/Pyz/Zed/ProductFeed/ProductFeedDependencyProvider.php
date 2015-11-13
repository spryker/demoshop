<?php

namespace Pyz\Zed\ProductFeed;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductFeedDependencyProvider extends AbstractBundleDependencyProvider
{
    const PRODUCT_FACADE = 'PRODUCT_FACADE';

    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::PRODUCT_FACADE] = function(Container $container){
            return $container->getLocator()->product()->facade();
        };

        return $container;
    }
}