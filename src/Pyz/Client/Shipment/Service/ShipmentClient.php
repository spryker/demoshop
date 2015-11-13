<?php

namespace Pyz\Client\Shipment\Service;

use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Client\Shipment\Service\ShipmentClient as SpyShipmentClient;
use Pyz\Client\Shipment\Service\Zed\ShipmentStubInterface;
use Generated\Shared\Transfer\ExpenseTransfer;

class ShipmentClient extends SpyShipmentClient
{
    /**
     * @param CountryTransfer $countryTransfer
     * @return ExpenseTransfer
     */
    public function getShipmentMethod(CountryTransfer $countryTransfer)
    {
        return $this->getZedStub()->getShipmentMethod($countryTransfer);
    }

    /**
     * @return ShipmentStubInterface
     */
    protected function getZedStub()
    {
        return $this->getDependencyContainer()->createZedStub();
    }

}
