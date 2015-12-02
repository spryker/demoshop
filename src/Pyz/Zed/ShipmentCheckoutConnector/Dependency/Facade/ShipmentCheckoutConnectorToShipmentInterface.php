<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Dependency\Facade;

use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;

interface ShipmentCheckoutConnectorToShipmentInterface
{
    /**
     * @param $countryIso2
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryIso2($countryIso2);
}
