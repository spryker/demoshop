<?php

namespace Pyz\Zed\ProductFeed;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductFeedDependencyProvider extends AbstractBundleDependencyProvider
{
    const PRODUCT_QUERY_CONTAINER = 'PRODUCT_QUERY_CONTAINER';

    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::PRODUCT_QUERY_CONTAINER] = function(Container $container){
            return $container->getLocator()->product()->queryContainer();
        };

        return $container;
    }
}