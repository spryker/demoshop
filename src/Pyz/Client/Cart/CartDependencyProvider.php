<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\Cart;

use Spryker\Client\Cart\CartDependencyProvider as SprykerCartDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\ProductBundle\Plugin\Cart\ItemCountPlugin;

class CartDependencyProvider extends SprykerCartDependencyProvider
{

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addItemCountPlugin(Container $container)
    {
        $container[static::PLUGIN_ITEM_COUNT] = function (Container $container) {
            return new ItemCountPlugin();
        };

        return $container;
    }

}
