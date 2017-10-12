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
    const BULK_SIZE = 100;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $shipmentCarrier = SpyShipmentCarrierQuery::create()
            ->filterByName($dataSet['carrier'])
            ->findOneOrCreate();

        $shipmentCarrier->save();

        $shipmentMethod = SpyShipmentMethodQuery::create()
            ->filterByName($dataSet['name'])
            ->filterByFkShipmentCarrier($shipmentCarrier->getIdShipmentCarrier())
            ->findOneOrCreate();

        $shipmentMethod
            ->setDefaultPrice($dataSet['price'])
            ->setFkTaxSet($dataSet['idTaxSet'])
            ->save();
    }
}
