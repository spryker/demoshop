<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Dependency\Facade;

use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;

interface ShipmentCheckoutConnectorToShipmentInterface
{
    /**
     * @param $countryId
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryId($countryId);
}
