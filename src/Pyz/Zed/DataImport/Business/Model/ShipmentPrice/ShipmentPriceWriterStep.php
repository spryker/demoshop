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
     * @var array
     */
    protected $currencyCache = [];

    /**
     * @var array
     */
    protected $storeCache = [];

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
        return SpyShipmentMethodQuery::create()
            ->findOneByShipmentMethodKey($shipmentMethodKey)
            ->getIdShipmentMethod();
    }

    /**
     * @param string $currencyIsoCode
     *
     * @return int
     */
    protected function getIdCurrencyByIsoCode($currencyIsoCode)
    {
        if (!array_key_exists($currencyIsoCode, $this->currencyCache)) {
            $this->currencyCache[$currencyIsoCode] = SpyCurrencyQuery::create()
                ->findOneByCode(strtoupper($currencyIsoCode))
                ->getIdCurrency();
        }

        return $this->currencyCache[$currencyIsoCode];
    }

    /**
     * @param string $storeName
     *
     * @return int
     */
    protected function getIdStoreByStoreName($storeName)
    {
        if (!array_key_exists($storeName, $this->storeCache)) {
            $this->storeCache[$storeName] = SpyStoreQuery::create()
                ->findOneByName(strtoupper($storeName))
                ->getIdStore();
        }

        return $this->storeCache[$storeName];
    }

}
