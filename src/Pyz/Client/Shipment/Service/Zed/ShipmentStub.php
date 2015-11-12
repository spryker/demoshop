<?php

namespace Pyz\Client\Shipment\Service\Zed;

use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Client\Shipment\Service\Zed\ShipmentStub as SpyShipmentStub;
use Generated\Shared\Transfer\ExpenseTransfer;

class ShipmentStub extends SpyShipmentStub implements ShipmentStubInterface
{
    /**
     * @param CountryTransfer $countryTransfer
     * @return ExpenseTransfer
     */
    public function getShipmentMethod(CountryTransfer $countryTransfer)
    {
        return $this->zedStub->call('/shipment/gateway/get-shipment-method', $countryTransfer);
    }

}
