<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductNew;

use Pyz\Client\ProductNew\Plugin\Elasticsearch\Query\NewProductsQueryPlugin;
use Spryker\Client\Catalog\Plugin\Elasticsearch\ResultFormatter\RawCatalogSearchResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\ProductLabel\ProductLabelClient;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\FacetQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\LocalizedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\PaginatedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SortedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\StoreQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\FacetResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\PaginatedResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\SortedResultFormatterPlugin;
use Spryker\Client\Search\SearchClient;

class ProductNewDependencyProvider extends AbstractDependencyProvider
{

    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const CLIENT_PRODUCT_LABEL = 'CLIENT_PRODUCT_LABEL';
    const NEW_PRODUCTS_QUERY_PLUGIN = 'NEW_PRODUCTS_QUERY_PLUGIN';
    const NEW_PRODUCTS_QUERY_EXPANDER_PLUGINS = 'NEW_PRODUCTS_QUERY_EXPANDER_PLUGINS';
    const NEW_PRODUCTS_RESULT_FORMATTER_PLUGINS = 'NEW_PRODUCTS_RESULT_FORMATTER_PLUGINS';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addSearchClient($container);
        $container = $this->addProductLabelClient($container);
        $container = $this->addNewProductsQueryPlugin($container);
        $container = $this->addNewProductsQueryExpanderPlugins($container);
        $container = $this->addNewProductsResultFormatterPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addSearchClient(Container $container)
    {
        $container[self::CLIENT_SEARCH] = function () {
            return new SearchClient();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addProductLabelClient(Container $container)
    {
        $container[self::CLIENT_PRODUCT_LABEL] = function () {
            return new ProductLabelClient();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addNewProductsQueryPlugin(Container $container)
    {
        $container[self::NEW_PRODUCTS_QUERY_PLUGIN] = function () {
            return new NewProductsQueryPlugin();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addNewProductsQueryExpanderPlugins(Container $container)
    {
        $container[self::NEW_PRODUCTS_QUERY_EXPANDER_PLUGINS] = function () {
            return [
                new StoreQueryExpanderPlugin(),
                new LocalizedQueryExpanderPlugin(),
                new FacetQueryExpanderPlugin(),
                new SortedQueryExpanderPlugin(),
                new PaginatedQueryExpanderPlugin(),
            ];
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addNewProductsResultFormatterPlugins(Container$container)
    {
        $container[self::NEW_PRODUCTS_RESULT_FORMATTER_PLUGINS] = function () {
            return [
                new FacetResultFormatterPlugin(),
                new SortedResultFormatterPlugin(),
                new PaginatedResultFormatterPlugin(),
                new RawCatalogSearchResultFormatterPlugin(),
            ];
        };

        return $container;
    }

}
