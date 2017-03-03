<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Navigation;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class NavigationDependencyProvider extends AbstractDependencyProvider
{

    const CLIENT_STORAGE = 'CLIENT_STORAGE';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->provideStorageClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return void
     */
    protected function provideStorageClient(Container $container)
    {
        $container[self::CLIENT_STORAGE] = function (Container $container) {
            return $container->getLocator()->storage()->client();
        };
    }

}
