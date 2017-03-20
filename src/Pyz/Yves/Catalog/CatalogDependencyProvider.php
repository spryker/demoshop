<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CatalogDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_SEARCH = 'CLIENT_SEARCH';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $this->provideSearchClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideSearchClient(Container $container)
    {
        $container[self::CLIENT_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->client();
        };
    }

}
