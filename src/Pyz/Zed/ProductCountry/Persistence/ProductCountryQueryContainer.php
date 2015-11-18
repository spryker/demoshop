<?php

namespace Pyz\Zed\ProductCountry\Persistence;

use Orm\Zed\ProductCountry\Persistence\SpyProductCountryQuery;
use SprykerEngine\Zed\Kernel\Persistence\AbstractQueryContainer;

class ProductCountryQueryContainer extends AbstractQueryContainer implements ProductCountryQueryContainerInterface
{

    /**
     * @param int $idCountry
     *
     * @return SpyProductCountryQuery
     */
    public function queryProductByCountry($idCountry)
    {
        $query = SpyProductCountryQuery::create();

        $query->filterByFkCountry($idCountry);

        return $query;
    }

    /**
     * @param int $idProduct
     *
     * @return SpyProductCountryQuery
     */
    public function queryCountryByProduct($idProduct)
    {
        $query = SpyProductCountryQuery::create();

        $query->filterByFkProduct($idProduct);

        return $query;
    }

}
