<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSale;

use Pyz\Yves\Category\Plugin\CategoryReaderPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ProductSaleDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const PLUGIN_CATEGORY_READER = 'PLUGIN_CATEGORY_READER';
    const CLIENT_CATALOG = 'CLIENT_CATALOG';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addSearchClient($container);
        $container = $this->addCatalogClient($container);
        $container = $this->addCategoryReaderPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addSearchClient(Container $container)
    {
        $container[self::CLIENT_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCategoryReaderPlugin(Container $container)
    {
        $container[self::PLUGIN_CATEGORY_READER] = function (Container $container) {
            return new CategoryReaderPlugin();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCatalogClient(Container $container)
    {
        $container[static::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        return $container;
    }
}
