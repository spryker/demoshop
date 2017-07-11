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

    const KEY_TARGET_FIELD = 'target_field';
    const KEY_ATTRIBUTE_KEY = 'attribute_key';
    const KEY_SYNCED = 'synced';

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
        if (!in_array($dataSet[static::KEY_TARGET_FIELD], $validTargetFields)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid target field "%s" for attribute "%s"',
                $dataSet[static::KEY_TARGET_FIELD],
                $dataSet[static::KEY_ATTRIBUTE_KEY]
            ));
        }

        $fkProductAttributeKey = $dataSet[AddProductAttributeKeysStep::KEY_TARGET][$dataSet[static::KEY_ATTRIBUTE_KEY]];
        $targetKey = $dataSet[static::KEY_TARGET_FIELD];

        $productSearchAttributeMapEntity = SpyProductSearchAttributeMapQuery::create()
            ->filterByFkProductAttributeKey($fkProductAttributeKey)
            ->filterByTargetField($targetKey)
            ->findOneOrCreate();

        $productSearchAttributeMapEntity->setSynced((isset($dataSet[static::KEY_SYNCED])) ? $dataSet[static::KEY_SYNCED] : true);
        $productSearchAttributeMapEntity->save();
    }

}
