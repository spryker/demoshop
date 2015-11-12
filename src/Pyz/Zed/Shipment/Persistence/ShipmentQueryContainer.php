<?php

namespace Pyz\Zed\Shipment\Persistence;

use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainer as SpyShipmentQueryContainer;

class ShipmentQueryContainer extends SpyShipmentQueryContainer implements ShipmentQueryContainerInterface
{

    /**
     * @param $countryId
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryShipmentMethodByCountryId($countryId)
    {
        return SpyShipmentMethodQuery::create('shipmentMethod')
            ->filterByFkCountry($countryId);
    }

    /**
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryDefaultShipmentMethod()
    {
        return SpyShipmentMethodQuery::create('shipmentMethod')
            ->filterByFkCountry(null);
    }
}
