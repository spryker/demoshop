<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Shipment;

use Orm\Zed\Shipment\Persistence\SpyShipmentCarrierQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ShipmentWriterStep implements DataImportStepInterface
{

    const COL_CARRIER = 'carrier';
    const COL_SHIPMENT_METHOD_KEY = 'shipment_method_key';
    const COL_NAME = 'name';
    const COL_ID_TAX_SET = 'idTaxSet';

    const BULK_SIZE = 100;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $shipmentCarrier = SpyShipmentCarrierQuery::create()
            ->filterByName($dataSet[static::COL_CARRIER])
            ->findOneOrCreate();

        $shipmentCarrier->save();

        $shipmentMethod = SpyShipmentMethodQuery::create()
            ->filterByShipmentMethodKey($dataSet[static::COL_SHIPMENT_METHOD_KEY])
            ->findOneOrCreate();

        $shipmentMethod
            ->setFkShipmentCarrier($shipmentCarrier->getIdShipmentCarrier())
            ->setName($dataSet[static::COL_NAME])
            ->setFkTaxSet($dataSet[static::COL_ID_TAX_SET])
            ->save();
    }

}
