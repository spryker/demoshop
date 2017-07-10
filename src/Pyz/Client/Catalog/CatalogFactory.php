<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\FeaturedProductsQueryPlugin;
use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\NewProductsQueryPlugin;
use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\SaleSearchQueryPlugin;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;

class CatalogFactory extends SprykerCatalogFactory
{

    /**
     * @param int $limit
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createFeaturedProductsQueryPlugin($limit)
    {
        $featuredProductsQueryPlugin = new FeaturedProductsQueryPlugin($limit);

        return $this->getSearchClient()->expandQuery(
            $featuredProductsQueryPlugin,
            $this->getFeaturedProductsQueryExpanderPlugins()
        );
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function getFeaturedProductsQueryExpanderPlugins()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::FEATURED_PRODUCTS_QUERY_EXPANDER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function getFeaturedProductsResultFormatters()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::FEATURED_PRODUCTS_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createSaleSearchQueryPlugin(array $requestParameters = [])
    {
        $saleQueryPlugin = new SaleSearchQueryPlugin();

        return $this->getSearchClient()->expandQuery(
            $saleQueryPlugin,
            $this->getSaleSearchQueryExpanderPlugins(),
            $requestParameters
        );
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function getSaleSearchQueryExpanderPlugins()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::SALE_SEARCH_QUERY_EXPANDER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function getSaleSearchResultFormatterPlugins()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::SALE_SEARCH_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createNewProductQuery(array $requestParameters = [])
    {
        $searchQuery = $this->createNewProductsQueryPlugin();

        $searchQuery = $this
            ->getSearchClient()
            ->expandQuery($searchQuery, $this->getNewProductsQueryExpanderPlugins(), $requestParameters);

        return $searchQuery;
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createNewProductsQueryPlugin()
    {
        return new NewProductsQueryPlugin();
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function getNewProductsQueryExpanderPlugins()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::NEW_PRODUCTS_QUERY_EXPANDER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function createNewProductsResultFormatters()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::NEW_PRODUCTS_RESULT_FORMATTER_PLUGINS);
    }

}
