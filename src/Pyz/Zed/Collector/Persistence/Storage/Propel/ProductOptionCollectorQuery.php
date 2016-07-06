<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
    const GROUP_NAME = 'group_name';
    const ACTIVE = 'active';
    const SKU = 'sku';
    const PRICE = 'price';
    const VALUE = 'value';

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
    }
}
