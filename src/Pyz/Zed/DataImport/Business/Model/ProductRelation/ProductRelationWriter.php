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

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyProductRelationTypeQuery::create();
        $productRelationTypeEntity = $query
            ->filterByKey($dataSet['relation_type'])
            ->findOneOrCreate();

        $query = SpyProductRelationQuery::create();
        $productRelationEntity = $query
            ->filterByFkProductAbstract($dataSet['productAbstractSkus'][$dataSet['product']])
            ->filterByFkProductRelationType($productRelationTypeEntity->getIdProductRelationType())
            ->findOneOrCreate();

        $productRelationEntity->setQuerySetData($dataSet['rule']);
        $productRelationEntity->setIsActive((isset($dataSet['is_active'])) ? $dataSet['is_active'] : true);
        $productRelationEntity->setIsRebuildScheduled((isset($dataSet['is_rebuild_scheduled'])) ? $dataSet['is_rebuild_scheduled'] : true);

        $productRelationEntity->save();
    }

}
