<?php

namespace Pyz\Zed\Shipment\Dependency\Facade;

interface ShipmentToCountryInterface
{
    /**
     * @param string $iso2Code
     *
     * @return int
     */
    public function getIdCountryByIso2Code($iso2Code);
}
