<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CartDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CALCULATION = 'calculation client';
    const CLIENT_CART = 'cart client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        return $container;
    }

}
