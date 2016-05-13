<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductSearch;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductSearch\ProductSearchDependencyProvider as SprykerProductSearchDependencyProvider;

class ProductSearchDependencyProvider extends SprykerProductSearchDependencyProvider
{

    const FACADE_PRODUCT_SEARCH = 'product search facade';
    const FACADE_PRICE = 'price facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container[self::FACADE_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->facade();
        };

        $container[self::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        return $container;
    }

}
