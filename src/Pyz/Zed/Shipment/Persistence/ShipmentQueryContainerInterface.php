<?php

namespace Pyz\Zed\Shipment\Persistence;

use Orm\Zed\Shipment\Persistence\Base\SpyShipmentMethodQuery;

interface ShipmentQueryContainerInterface
{
    /**
     * @param $countryId
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryShipmentMethodByCountryId($countryId);

    /**
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryDefaultShipmentMethod();
}