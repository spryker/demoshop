<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Product\Persistence\Map\SpyProductAbstractLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class AttributeMapCollectorQuery extends AbstractPropelCollectorQuery
{
    const ID_PRODUCT_ABSTRACT = 'id_product_abstract';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addAnd(
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_LOCALE,
            $this->getLocale()->getIdLocale(),
            Criteria::EQUAL
        );

        $this->touchQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, static::ID_PRODUCT_ABSTRACT);
    }
}
