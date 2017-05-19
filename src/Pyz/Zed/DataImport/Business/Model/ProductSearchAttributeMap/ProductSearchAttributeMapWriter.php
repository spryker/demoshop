<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductSearchAttributeMap;

use Generated\Shared\Search\PageIndexMap;
use InvalidArgumentException;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchAttributeMapQuery;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductSearchAttributeMapWriter implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $pageIndexMap = new PageIndexMap();

        $validTargetFields = $pageIndexMap->getProperties();
        if (!in_array($dataSet['target_field'], $validTargetFields)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid target field "%s" for attribute "%s"',
                $dataSet['target_field'],
                $dataSet['attribute_key']
            ));
        }

        $query = SpyProductSearchAttributeMapQuery::create();
        $productSearchAttributeMapEntity = $query
            ->filterByFkProductAttributeKey($dataSet[AddProductAttributeKeysStep::KEY_TARGET][$dataSet['attribute_key']])
            ->filterByTargetField($dataSet['attribute_key'])
            ->findOneOrCreate();

        $productSearchAttributeMapEntity->setSynced((isset($dataSet['synced'])) ? $dataSet['synced'] : true);
        $productSearchAttributeMapEntity->save();
    }

}
