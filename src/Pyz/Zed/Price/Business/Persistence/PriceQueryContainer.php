<?php

namespace Pyz\Zed\Price\Persistence;

use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Price\Persistence\PriceQueryContainer as SprykerPriceQueryContainer;

class PriceQueryContainer extends SprykerPriceQueryContainer
{
    /**
     * @param SpyPriceProductQuery $query
     * @param int $idPriceProduct
     *
     * @return SpyPriceProductQuery
     */
    public function addFilter($query, $idPriceProduct)
    {
        return $query->filterByIdPriceProduct($idPriceProduct, Criteria::EQUAL);
    }
}
