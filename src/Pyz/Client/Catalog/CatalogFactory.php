<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Elasticsearch\Query\FeaturedProductsQueryPlugin;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;
use Spryker\Client\ProductGroup\ProductGroupClient;

class CatalogFactory extends SprykerCatalogFactory
{

    /**
     * @param int $limit
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createFeaturedProductsQueryPlugin($limit)
    {
        return new FeaturedProductsQueryPlugin($limit);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function createFeaturedProductsResultFormatters()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::FEATURED_PRODUCTS_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    public function getFeaturedProductsQueryExpanderPlugins()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::FEATURED_PRODUCTS_QUERY_EXPANDER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\ProductGroup\ProductGroupClientInterface
     */
    public function getProductGroupClient()
    {
        return new ProductGroupClient();
    }

}
