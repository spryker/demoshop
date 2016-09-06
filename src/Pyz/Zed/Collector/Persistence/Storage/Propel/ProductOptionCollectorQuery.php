<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\ProductOption\Persistence\Map\SpyProductAbstractProductOptionGroupTableMap;
use Orm\Zed\ProductOption\Persistence\Map\SpyProductOptionGroupTableMap;
use Orm\Zed\ProductOption\Persistence\Map\SpyProductOptionValueTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class ProductOptionCollectorQuery extends AbstractPropelCollectorQuery
{

    const GROUP_NAME = 'name';
    const ACTIVE = 'active';
    const SKU = 'sku';
    const PRICE = 'price';
    const VALUE = 'value';
    const ID_PRODUCT_OPTION_VALUE = 'idProductOptionValue';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductAbstractProductOptionGroupTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyProductAbstractProductOptionGroupTableMap::COL_FK_PRODUCT_OPTION_GROUP,
            SpyProductOptionGroupTableMap::COL_ID_PRODUCT_OPTION_GROUP,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyProductOptionGroupTableMap::COL_ID_PRODUCT_OPTION_GROUP,
            SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_GROUP,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->withColumn(SpyProductOptionGroupTableMap::COL_NAME, self::GROUP_NAME);
        $this->touchQuery->withColumn(SpyProductOptionGroupTableMap::COL_ACTIVE, self::ACTIVE);
        $this->touchQuery->withColumn(SpyProductOptionValueTableMap::COL_SKU, self::SKU);
        $this->touchQuery->withColumn(SpyProductOptionValueTableMap::COL_PRICE, self::PRICE);
        $this->touchQuery->withColumn(SpyProductOptionValueTableMap::COL_VALUE, self::VALUE);
        $this->touchQuery->withColumn(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, self::ID_PRODUCT_OPTION_VALUE);

        $this->touchQuery->addAnd(
            SpyProductOptionGroupTableMap::COL_ACTIVE,
            true,
            Criteria::EQUAL
        );
    }

}
