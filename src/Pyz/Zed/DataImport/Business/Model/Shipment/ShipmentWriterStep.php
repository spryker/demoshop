<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\Shipment;

use Orm\Zed\Shipment\Persistence\SpyShipmentCarrierQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ShipmentWriterStep implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyShipmentCarrierQuery::create();
        $shipmentCarrier = $query
            ->filterByName($dataSet['carrier'])
            ->findOneOrCreate();

        $shipmentCarrier->save();

        $query = SpyShipmentMethodQuery::create();
        $shipmentMethod = $query
            ->filterByName($dataSet['name'])
            ->filterByFkShipmentCarrier($shipmentCarrier->getIdShipmentCarrier())
            ->findOneOrCreate();

        $shipmentMethod->setDefaultPrice($dataSet['price']);
        $shipmentMethod->setFkTaxSet($dataSet['idTaxSet']);
        $shipmentMethod->save();
    }


}
