<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CustomerDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CUSTOMER = 'customer client';
    const CLIENT_NEWSLETTER = 'collector client';
    const CLIENT_SALES = 'client client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        $container[self::CLIENT_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->client();
        };

        $container[self::CLIENT_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->client();
        };

        return $container;
    }

}
