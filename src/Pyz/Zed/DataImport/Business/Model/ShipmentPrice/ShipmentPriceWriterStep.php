<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ShipmentPrice;

use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodPriceQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ShipmentPriceWriterStep implements DataImportStepInterface
{

    const COL_STORE = 'store';
    const COL_CURRENCY = 'currency';
    const COL_SHIPMENT_METHOD_KEY = 'shipment_method_key';
    const COL_NET_AMOUNT = 'value_net';
    const COL_GROSS_AMOUNT = 'value_gross';

    /**
     * @var int[] Keys are shipment method keys, values are shipment method ids.
     */
    protected static $idShipmentMethodCache = [];

    /**
     * @var int[] Keys are currency iso codes, values are currency ids.
     */
    protected static $idCurrencyCache = [];

    /**
     * @var int[] Keys are store names, values are store ids.
     */
    protected static $idStoreCache = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $shipmentMethodPriceEntity = SpyShipmentMethodPriceQuery::create()
            ->filterByFkShipmentMethod($this->getIdShipmentMethodByShipmentMethodKey($dataSet[static::COL_SHIPMENT_METHOD_KEY]))
            ->filterByFkCurrency($this->getIdCurrencyByIsoCode($dataSet[static::COL_CURRENCY]))
            ->filterByFkStore($this->getIdStoreByStoreName($dataSet[static::COL_STORE]))
            ->findOneOrCreate();

        $shipmentMethodPriceEntity->setDefaultNetPrice($dataSet[static::COL_NET_AMOUNT]);
        $shipmentMethodPriceEntity->setDefaultGrossPrice($dataSet[static::COL_GROSS_AMOUNT]);
        $shipmentMethodPriceEntity->save();
    }

    /**
     * @param string $shipmentMethodKey
     *
     * @return int
     */
    protected function getIdShipmentMethodByShipmentMethodKey($shipmentMethodKey)
    {
        if (!isset(static::$idShipmentMethodCache[$shipmentMethodKey])) {
            static::$idShipmentMethodCache[$shipmentMethodKey] = SpyShipmentMethodQuery::create()
                ->findOneByShipmentMethodKey($shipmentMethodKey)
                ->getIdShipmentMethod();
        }

        return static::$idShipmentMethodCache[$shipmentMethodKey];
    }

    /**
     * @param string $currencyIsoCode
     *
     * @return int
     */
    protected function getIdCurrencyByIsoCode($currencyIsoCode)
    {
        if (!isset(static::$idCurrencyCache[$currencyIsoCode])) {
            static::$idCurrencyCache[$currencyIsoCode] = SpyCurrencyQuery::create()
                ->findOneByCode(strtoupper($currencyIsoCode))
                ->getIdCurrency();
        }

        return static::$idCurrencyCache[$currencyIsoCode];
    }

    /**
     * @param string $storeName
     *
     * @return int
     */
    protected function getIdStoreByStoreName($storeName)
    {
        if (!isset(static::$idStoreCache[$storeName])) {
            static::$idStoreCache[$storeName] = SpyStoreQuery::create()
                ->findOneByName(strtoupper($storeName))
                ->getIdStore();
        }

        return static::$idStoreCache[$storeName];
    }

}
