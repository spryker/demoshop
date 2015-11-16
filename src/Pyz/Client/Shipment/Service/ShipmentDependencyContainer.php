<?php

namespace Pyz\Client\Shipment\Service;

use SprykerFeature\Client\Shipment\Service\ShipmentDependencyContainer as SpyShipmentDependencyContainer;
use Pyz\Client\Shipment\Service\Zed\ShipmentStubInterface;
use SprykerFeature\Client\Shipment\ShipmentDependencyProvider;

class ShipmentDependencyContainer extends SpyShipmentDependencyContainer
{
    /**
     * @return ShipmentStubInterface
     */
    public function createZedStub()
    {
        $zedStub = $this->getProvidedDependency(ShipmentDependencyProvider::SERVICE_ZED);
        $cartStub = $this->getFactory()->createZedShipmentStub(
            $zedStub
        );

        return $cartStub;
    }

}
