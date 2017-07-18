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
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function getFeaturedProducts($limit)
    {
        $searchQuery = $this->getFactory()->createFeaturedProductsQueryPlugin($limit);
        $resultFormatters = $this->getFactory()->getFeaturedProductsResultFormatters();

        return $this->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $requestParameters
     *
     * @return mixed
     */
    public function getNewProducts(array $requestParameters = [])
    {
        $searchQuery = $this->getFactory()->createNewProductQuery($requestParameters);
        $resultFormatters = $this->getFactory()->createNewProductsResultFormatters();

        return $this
            ->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters, $requestParameters);
    }

}
