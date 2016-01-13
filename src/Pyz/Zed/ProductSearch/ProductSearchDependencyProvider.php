<?php

namespace Pyz\Zed\ProductSearch;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductSearch\ProductSearchDependencyProvider as SprykerProductSearchDependencyProvider;

class ProductSearchDependencyProvider extends SprykerProductSearchDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return void
     */
    protected function provideCollectorFacade(Container $container)
    {
        $container[self::FACADE_COLLECTOR] = function (Container $container) {
            return $container->getLocator()->collector()->facade();
        };
    }

}
