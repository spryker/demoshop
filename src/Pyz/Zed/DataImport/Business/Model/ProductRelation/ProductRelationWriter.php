<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductRelation;

use Orm\Zed\ProductRelation\Persistence\SpyProductRelationQuery;
use Orm\Zed\ProductRelation\Persistence\SpyProductRelationTypeQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductRelationWriter implements DataImportStepInterface
{

    const KEY_RELATION_TYPE = 'relation_type';
    const KEY_RULE = 'rule';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_IS_REBUILD_SCHEDULED = 'is_rebuild_scheduled';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyProductRelationTypeQuery::create();
        $productRelationTypeEntity = $query
            ->filterByKey($dataSet[static::KEY_RELATION_TYPE])
            ->findOneOrCreate();

        $productRelationTypeEntity->save();

        $query = SpyProductRelationQuery::create();
        $productRelationEntity = $query
            ->filterByFkProductAbstract($dataSet['productAbstractSkus'][$dataSet['product']])
            ->filterByFkProductRelationType($productRelationTypeEntity->getIdProductRelationType())
            ->findOneOrCreate();

        $productRelationEntity
            ->setQuerySetData($dataSet[static::KEY_RULE])
            ->setIsActive((isset($dataSet[static::KEY_IS_ACTIVE])) ? $dataSet[static::KEY_IS_ACTIVE] : true)
            ->setIsRebuildScheduled((isset($dataSet[static::KEY_IS_REBUILD_SCHEDULED])) ? $dataSet[static::KEY_IS_REBUILD_SCHEDULED] : true);

        $productRelationEntity->save();
    }

}
