<?php

namespace Pyz\Zed\ProductCountry\Persistence;

use Orm\Zed\ProductCountry\Persistence\SpyProductCountryQuery;

interface ProductCountryQueryContainerInterface
{

    /**
     * @param int $idCountry
     *
     * @return SpyProductCountryQuery
     */
    public function queryProductByCountry($idCountry);

    /**
     * @param int $idProduct
     *
     * @return SpyProductCountryQuery
     */
    public function queryCountryByProduct($idProduct);

    /**
     * @return SpyProductCountryQuery
     */
    public function queryProductsWithCountries();

}
