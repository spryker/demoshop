<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\ProductRelation\Persistence\Map\SpyProductRelationTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class ProductRelationCollectorQuery extends AbstractPropelCollectorQuery
{

    const ID_PRODUCT_ABSTRACT = 'id_product_abstract';
    const PRODUCT_RELATIONS = 'product_relations';
    const IS_ACTIVE = 'is_active';

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
            SpyProductRelationTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->withColumn(
            'GROUP_CONCAT(' . SpyProductRelationTableMap::COL_ID_PRODUCT_RELATION . ')',
            static::PRODUCT_RELATIONS
        );

        $this->touchQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, static::ID_PRODUCT_ABSTRACT);
        $this->touchQuery->withColumn(SpyProductRelationTableMap::COL_IS_ACTIVE, static::IS_ACTIVE);

        $this->touchQuery->addGroupByColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT);
    }

}
