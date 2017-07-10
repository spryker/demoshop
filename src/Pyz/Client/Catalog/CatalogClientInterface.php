<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Spryker\Client\Catalog\CatalogClientInterface as SprykerCatalogClientInterface;

interface CatalogClientInterface extends SprykerCatalogClientInterface
{

    /**
     * Specification:
     * - Returns a list of featured products.
     *
     * @api
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function getFeaturedProducts($limit);

    /**
     * Specification:
     * - A query based on the request parameters will be executed.
     * - The result contains only products with both DEFAULT and ORIGINAL prices.
     * - The query will also create facet aggregations, pagination and sorting based on the request parameters
     * - The result is a formatted associative array where the used result formatters' name are the keys and their results are the values
     *
     * @api
     *
     * @param array $requestParameters
     *
     * @return array
     */
    public function saleSearch(array $requestParameters);

    /**
     * Specification:
     * - A query based on the request parameters will be executed.
     * - The result contains only products which created_at date is no older than the provided days.
     * - The query will also create facet aggregations, pagination and sorting based on the request parameters
     * - The result is a formatted associative array where the used result formatters' name are the keys and their results are the values
     *
     * @api
     *
     * @param array $requestParameters
     *
     * @return mixed
     */
    public function getNewProducts(array $requestParameters = []);

}
