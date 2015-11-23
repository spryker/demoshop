<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\ProductCountry\Persistence\Map\SpyProductCountryTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;

class ProductCollector extends BaseProductCollector
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery = parent::createQuery($baseQuery, $locale);

        $baseQuery->addJoinObject(
            (new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyProductCountryTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ))->setRightTableAlias('productsCountries'),
            'productsCountriesJoin'
        );

        $baseQuery->addJoinObject(
            (new Join(
                'productsCountries.fk_country',
                SpyCountryTableMap::COL_ID_COUNTRY,
                Criteria::INNER_JOIN
            ))
        );

        $baseQuery->withColumn(
            SpyCountryTableMap::COL_NAME,
            'country_name'
        );

        return $baseQuery;
    }

}
