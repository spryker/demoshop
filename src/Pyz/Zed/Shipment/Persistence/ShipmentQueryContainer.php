<?php

namespace Pyz\Zed\Shipment\Persistence;

use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Shipment\Persistence\Map\SpyShipmentMethodTableMap;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainer as SpyShipmentQueryContainer;

class ShipmentQueryContainer extends SpyShipmentQueryContainer implements ShipmentQueryContainerInterface
{

    /**
     * @param $countryIso2
     * @return $this|SpyShipmentMethodQuery
     */
    public function queryShipmentMethodByCountryIso2($countryIso2)
    {
        return SpyShipmentMethodQuery::create('shipmentMethod')->joinSpyCountry()
            ->useSpyCountryQuery()
            ->filterByIso2Code($countryIso2)
            ->endUse();
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
