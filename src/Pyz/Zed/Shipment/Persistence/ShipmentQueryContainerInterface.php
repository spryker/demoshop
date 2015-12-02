<?php

namespace Pyz\Zed\Shipment\Persistence;

use Orm\Zed\Shipment\Persistence\Base\SpyShipmentMethodQuery;

interface ShipmentQueryContainerInterface
{
    /**
     * @param $countryIso2
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryShipmentMethodByCountryIso2($countryIso2);

    /**
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryDefaultShipmentMethod();
}
