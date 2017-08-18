<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAttributeKey;

use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductAttributeKeyWriter implements DataImportStepInterface
{

    const ATTRIBUTE_KEY = 'attribute_key';
    const IS_SUPER = 'is_super';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyProductAttributeKeyQuery::create();
        $productAttributeKeyEntity = $query
            ->filterByKey($dataSet[static::ATTRIBUTE_KEY])
            ->findOneOrCreate();

        $productAttributeKeyEntity->setIsSuper($dataSet[static::IS_SUPER]);
        $productAttributeKeyEntity->save();
    }

}
