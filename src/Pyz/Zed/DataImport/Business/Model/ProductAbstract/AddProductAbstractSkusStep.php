<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAbstract;

use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Propel\Runtime\Formatter\SimpleArrayFormatter;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AddProductAbstractSkusStep implements DataImportStepInterface
{

    const KEY_PRODUCT_ABSTRACT_SKUS = 'productAbstractSkus';

    /**
     * @var array
     */
    protected $productAbstractSkus = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        if (empty($this->productAbstractSkus)) {
            $query = SpyProductAbstractQuery::create();
            $query->select([
                SpyProductAbstractTableMap::COL_SKU,
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            ])->setFormatter(new SimpleArrayFormatter());

            foreach ($query->find() as $productAbstract) {
                $key = $productAbstract[SpyProductAbstractTableMap::COL_SKU];
                $value = $productAbstract[SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT];
                $this->productAbstractSkus[$key] = $value;
            }
        }

        $dataSet[static::KEY_PRODUCT_ABSTRACT_SKUS] = $this->productAbstractSkus;
    }

}
