<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Config\CatalogSearchConfigBuilder;
use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\CatalogSearchQueryPlugin;
use Spryker\Client\Catalog\CatalogDependencyProvider as SprykerCatalogDependencyProvider;
use Spryker\Client\Catalog\Plugin\Elasticsearch\ResultFormatter\RawCatalogSearchResultFormatterPlugin;
use Spryker\Client\CatalogPriceProductConnector\Plugin\CurrencyAwareCatalogSearchResultFormatterPlugin;
use Spryker\Client\CatalogPriceProductConnector\Plugin\CurrencyAwareSuggestionByTypeResultFormatter;
use Spryker\Client\CatalogPriceProductConnector\Plugin\ProductPriceQueryExpanderPlugin;
use Spryker\Client\Kernel\Container;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\CompletionQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\FacetQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\IsActiveInDateRangeQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\IsActiveQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\LocalizedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\PaginatedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SortedCategoryQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SortedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SpellingSuggestionQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\StoreQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SuggestionByTypeQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\CompletionResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\FacetResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\PaginatedResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\SortedResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\SpellingSuggestionResultFormatterPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\SuggestionByTypeResultFormatterPlugin;

class CatalogDependencyProvider extends SprykerCatalogDependencyProvider
{
    const FEATURED_PRODUCTS_RESULT_FORMATTER_PLUGINS = 'FEATURED_PRODUCTS_RESULT_FORMATTER_PLUGINS';
    const FEATURED_PRODUCTS_QUERY_EXPANDER_PLUGINS = 'FEATURED_PRODUCTS_QUERY_EXPANDER_PLUGINS';

    const CLIENT_CURRENCY = 'CLIENT_CURRENCY';
    const CLIENT_PRICE = 'CLIENT_PRICE';
    const CLIENT_PRICE_PRODUCT = 'CLIENT_PRICE_PRODUCT';
    const CLIENT_PRICE_PRODUCT_CONNECTOR_CLIENT = 'client price product connector client';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container = $this->provideFeatureProductsResultFormatterPlugins($container);
        $container = $this->provideFeatureProductsQueryExpanderPlugins($container);
        $container = $this->addCatalogPriceProductConnectorClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addPriceClient(Container $container)
    {
        $container[static::CLIENT_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCatalogPriceProductConnectorClient(Container $container)
    {
        $container[static::CLIENT_PRICE_PRODUCT_CONNECTOR_CLIENT] = function (Container $container) {
            return $container->getLocator()->catalogPriceProductConnector()->client();
        };

        return $container;
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    protected function createCatalogSearchQueryPlugin()
    {
        return new CatalogSearchQueryPlugin();
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function createCatalogSearchQueryExpanderPlugins()
    {
        return [
            new StoreQueryExpanderPlugin(),
            new LocalizedQueryExpanderPlugin(),
            new ProductPriceQueryExpanderPlugin(),
            new FacetQueryExpanderPlugin(),
            new SortedQueryExpanderPlugin(),
            new SortedCategoryQueryExpanderPlugin(CatalogSearchConfigBuilder::CATEGORY_FACET_PARAM_NAME),
            new PaginatedQueryExpanderPlugin(),
            new SpellingSuggestionQueryExpanderPlugin(),
            new IsActiveQueryExpanderPlugin(),
            new IsActiveInDateRangeQueryExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    protected function createCatalogSearchResultFormatterPlugins()
    {
        return [
            new FacetResultFormatterPlugin(),
            new SortedResultFormatterPlugin(),
            new PaginatedResultFormatterPlugin(),
            new CurrencyAwareCatalogSearchResultFormatterPlugin(
                new RawCatalogSearchResultFormatterPlugin()
            ),
            new SpellingSuggestionResultFormatterPlugin(),
        ];
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function createSuggestionQueryExpanderPlugins()
    {
        return [
            new StoreQueryExpanderPlugin(),
            new LocalizedQueryExpanderPlugin(),
            new CompletionQueryExpanderPlugin(),
            new SuggestionByTypeQueryExpanderPlugin(),
            new IsActiveQueryExpanderPlugin(),
            new IsActiveInDateRangeQueryExpanderPlugin(),
            new ProductPriceQueryExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    protected function createSuggestionResultFormatterPlugins()
    {
        return [
            new CompletionResultFormatterPlugin(),
            new CurrencyAwareSuggestionByTypeResultFormatter(
                new SuggestionByTypeResultFormatterPlugin()
            ),
        ];
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function provideFeatureProductsResultFormatterPlugins(Container $container)
    {
        $container[self::FEATURED_PRODUCTS_RESULT_FORMATTER_PLUGINS] = function () {
            return [
                new CurrencyAwareCatalogSearchResultFormatterPlugin(
                    new RawCatalogSearchResultFormatterPlugin()
                ),
            ];
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function provideFeatureProductsQueryExpanderPlugins(Container $container)
    {
        $container[self::FEATURED_PRODUCTS_QUERY_EXPANDER_PLUGINS] = function () {
            return [
                new StoreQueryExpanderPlugin(),
                new LocalizedQueryExpanderPlugin(),
                new ProductPriceQueryExpanderPlugin(),
            ];
        };

        return $container;
    }
}
