<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Pyz\Yves\Category\Plugin\CategoryReaderPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CatalogDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const PLUGIN_CATEGORY_READER = 'PLUGIN_CATEGORY_READER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $this->provideSearchClient($container);
        $this->provideCategoryReaderPlugin($container);

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

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideCategoryReaderPlugin(Container $container)
    {
        $container[self::PLUGIN_CATEGORY_READER] = function (Container $container) {
            return new CategoryReaderPlugin();
        };
    }

}
