<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Search;

use Pyz\Client\Catalog\Plugin\Config\CatalogSearchConfigBuilder;
use Spryker\Client\Kernel\Container;
use Spryker\Client\ProductSearch\Plugin\Config\ProductSearchConfigExpanderPlugin;
use Spryker\Client\Search\SearchDependencyProvider as SprykerSearchDependencyProvider;

class SearchDependencyProvider extends SprykerSearchDependencyProvider
{
    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\SearchConfigBuilderInterface
     */
    protected function createSearchConfigBuilderPlugin(Container $container)
    {
        return new CatalogSearchConfigBuilder();
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\SearchConfigExpanderPluginInterface[]
     */
    protected function createSearchConfigExpanderPlugins(Container $container)
    {
        $searchConfigExpanderPlugins = parent::createSearchConfigExpanderPlugins($container);

        $searchConfigExpanderPlugins[] = new ProductSearchConfigExpanderPlugin();

        return $searchConfigExpanderPlugins;
    }
}
