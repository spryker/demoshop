<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductOptionPrice;

use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValuePriceQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Pyz\Zed\DataImport\Business\Exception\InvalidDataException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionPriceWriterStep extends TouchAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_PRODUCT_OPTION_SKU = 'product_option_sku';
    const KEY_STORE = 'store';
    const KEY_CURRENCY = 'currency';
    const KEY_NET_AMOUNT = 'value_net';
    const KEY_GROSS_AMOUNT = 'value_gross';

    /**
     * @var int[] Keys are store names
     */
    protected static $idStoreBuffer = [];

    /**
     * @var int[] Keys are currency codes.
     */
    protected static $idCurrencyBuffer = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\InvalidDataException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productOptionValueEntity = SpyProductOptionValueQuery::create()
            ->findOneBySku($dataSet[static::KEY_PRODUCT_OPTION_SKU]);

        if ($productOptionValueEntity === null) {
            throw new InvalidDataException('Product option SKU (%s) not found in permanent storage.', $dataSet[static::KEY_PRODUCT_OPTION_SKU]);
        }

        $priceEntity = SpyProductOptionValuePriceQuery::create()
            ->filterByFkStore($this->getIdStore($dataSet[static::KEY_STORE]))
            ->filterByFkCurrency($this->getIdCurrency($dataSet[static::KEY_CURRENCY]))
            ->filterByFkProductOptionValue($productOptionValueEntity->getIdProductOptionValue())
            ->findOneOrCreate();

        $priceEntity
            ->setGrossPrice($this->formatPrice($dataSet[static::KEY_GROSS_AMOUNT]))
            ->setNetPrice($this->formatPrice($dataSet[static::KEY_NET_AMOUNT]))
            ->save();

        $this->touchRelatedProductAbstracts($priceEntity->getFkProductOptionValue());
    }

    /**
     * @param int $idProductOptionValue
     *
     * @return void
     */
    protected function touchRelatedProductAbstracts($idProductOptionValue)
    {
        $productAbstractCollection = SpyProductAbstractQuery::create()
            ->joinSpyProductAbstractProductOptionGroup()
            ->useSpyProductAbstractProductOptionGroupQuery()
                ->joinSpyProductOptionGroup()
                ->useSpyProductOptionGroupQuery()
                    ->joinSpyProductOptionValue()
                    ->useSpyProductOptionValueQuery()
                        ->filterByIdProductOptionValue($idProductOptionValue)
                    ->endUse()
                ->endUse()
            ->endUse()
            ->find();

        foreach ($productAbstractCollection as $productAbstractEntity) {
            $this->addSubTouchable(ProductOptionConfig::RESOURCE_TYPE_PRODUCT_OPTION, $productAbstractEntity->getIdProductAbstract());
        }
    }

    /**
     * @param string $storeName
     *
     * @return int|null
     */
    protected function getIdStore($storeName)
    {
        if ($storeName === '' || $storeName === null) {
            return null;
        }

        if (!isset(static::$idStoreBuffer[$storeName])) {
            $storeEntity = SpyStoreQuery::create()->findOneByName($storeName);
            static::$idStoreBuffer[$storeName] = $storeEntity === null ? null : $storeEntity->getIdStore();
        }

        return static::$idStoreBuffer[$storeName];
    }

    /**
     * @param string $currencyIsoCode
     *
     * @return int
     */
    protected function getIdCurrency($currencyIsoCode)
    {
        if (!isset(static::$idCurrencyBuffer[$currencyIsoCode])) {
            static::$idCurrencyBuffer[$currencyIsoCode] = SpyCurrencyQuery::create()
                ->findOneByCode($currencyIsoCode)
                ->getIdCurrency();
        }

        return static::$idCurrencyBuffer[$currencyIsoCode];
    }

    /**
     * @param int $price
     *
     * @return int|null
     */
    protected function formatPrice($price)
    {
        if ($price === '' || $price === null) {
            return null;
        }

        return (int)$price;
    }
}
