<?php

namespace Pyz\Zed\ProductCountry\Persistence;

use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
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

    /**
     * @return SpyProductCountryQuery
     */
    public function queryProductsWithCountries()
    {
        $query = SpyProductCountryQuery::create();
        $query
            ->leftJoinCountry()
            ->leftJoinSpyAbstractProduct()
            ->withColumn(SpyAbstractProductTableMap::COL_SKU, 'sku')
            ->withColumn(SpyCountryTableMap::COL_NAME, 'country')
        ;

        return $query;
    }

}
