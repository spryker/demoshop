<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\FeaturedProductsQueryPlugin;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Client\Sales\SalesClientInterface;

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
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CART_CLIENT);
    }

    /**
     * @return SalesClientInterface
     */
    public function getSalesClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::SALES_CLIENT);
    }

    /**
     * @return ProductClientInterface
     */
    public function getProductClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::PRODUCT_CLIENT);
    }
}
