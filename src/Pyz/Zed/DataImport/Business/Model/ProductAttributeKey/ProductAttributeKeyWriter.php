<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
