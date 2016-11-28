<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Spryker\Client\Catalog\CatalogClient as SprykerCatalogClient;

/**
 * @method \Pyz\Client\Catalog\CatalogFactory getFactory()
 */
class CatalogClient extends SprykerCatalogClient implements CatalogClientInterface
{

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getFeaturedProducts($limit)
    {
        $searchQuery = $this->createFeaturedProductsQuery($limit);

        $resultFormatters = $this
            ->getFactory()
            ->createFeaturedProductsResultFormatters();

        return $this
            ->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters);
    }

    /**
     * @param int $limit
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    protected function createFeaturedProductsQuery($limit)
    {
        $searchQuery = $this
            ->getFactory()
            ->createFeaturedProductsQueryPlugin($limit);

        $searchQuery = $this
            ->getFactory()
            ->getSearchClient()
            ->expandQuery($searchQuery, $this->getFactory()->getFeaturedProductsQueryExpanderPlugins());

        return $searchQuery;
    }

}
