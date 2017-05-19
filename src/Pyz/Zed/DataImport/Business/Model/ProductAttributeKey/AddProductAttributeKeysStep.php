<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAttributeKey;

use Orm\Zed\Product\Persistence\Map\SpyProductAttributeKeyTableMap;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Propel\Runtime\Formatter\SimpleArrayFormatter;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AddProductAttributeKeysStep implements DataImportStepInterface
{

    const KEY_TARGET = 'attributeKeys';

    /**
     * @var array
     */
    protected $productAttributeKeys = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (empty($this->productAttributeKeys)) {
            $query = SpyProductAttributeKeyQuery::create()
                ->select([
                    SpyProductAttributeKeyTableMap::COL_ID_PRODUCT_ATTRIBUTE_KEY,
                    SpyProductAttributeKeyTableMap::COL_KEY,
                ])
                ->setFormatter(new SimpleArrayFormatter());

            foreach ($query->find() as $productAttributeKey) {
                $key = $productAttributeKey[SpyProductAttributeKeyTableMap::COL_KEY];
                $value = $productAttributeKey[SpyProductAttributeKeyTableMap::COL_ID_PRODUCT_ATTRIBUTE_KEY];

                $this->productAttributeKeys[$key] = $value;
            }
        }

        $dataSet[static::KEY_TARGET] = $this->productAttributeKeys;
    }

}
