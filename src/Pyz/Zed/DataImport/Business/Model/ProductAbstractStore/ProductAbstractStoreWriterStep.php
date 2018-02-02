<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAbstractStore;

use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractStoreQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

/**
 */
class ProductAbstractStoreWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_PRODUCT_ABSTRACT_SKU = 'product_abstract_sku';
    const KEY_STORE_NAME = 'store_name';

    /**
     * @var int[] Keys are SKUs, values are product abstract ids.
     */
    protected static $idProductAbstractBuffer = [];

    /**
     * @var int[] Keys are store names, values are store ids.
     */
    protected static $idStoreBuffer = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        (new SpyProductAbstractStoreQuery())
            ->filterByFkProductAbstract($this->getIdProductAbstractBySku($dataSet[static::KEY_PRODUCT_ABSTRACT_SKU]))
            ->filterByFkStore($this->getIdStoreByName($dataSet[static::KEY_STORE_NAME]))
            ->findOneOrCreate()
            ->save();
    }

    /**
     * @param string $productAbstractSku
     *
     * @return int
     */
    protected function getIdProductAbstractBySku($productAbstractSku)
    {
        if (!isset(static::$idProductAbstractBuffer[$productAbstractSku])) {
            static::$idProductAbstractBuffer[$productAbstractSku] =
                SpyProductAbstractQuery::create()->findOneBySku($productAbstractSku)->getIdProductAbstract();
        }

        return static::$idProductAbstractBuffer[$productAbstractSku];
    }

    /**
     * @param string $storeName
     *
     * @return int
     */
    protected function getIdStoreByName($storeName)
    {
        if (!isset(static::$idStoreBuffer[$storeName])) {
            static::$idStoreBuffer[$storeName] =
                SpyStoreQuery::create()->findOneByName($storeName)->getIdStore();
        }

        return static::$idStoreBuffer[$storeName];
    }
}
