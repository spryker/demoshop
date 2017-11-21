<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\FeaturedProductsQueryPlugin;
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
     * @return \Spryker\Client\CatalogPriceProductConnector\CatalogPriceProductConnectorClientInterface
     */
    public function getCatalogPriceProductConnectorClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_PRICE_PRODUCT_CONNECTOR_CLIENT);
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
}
