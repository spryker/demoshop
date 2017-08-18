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

}
