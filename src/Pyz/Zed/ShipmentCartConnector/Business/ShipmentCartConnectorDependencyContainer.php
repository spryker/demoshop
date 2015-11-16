<?php

namespace Pyz\Zed\ShipmentCartConnector\Business;

use Pyz\Zed\ShipmentCartConnector\ShipmentCartConnectorDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Pyz\Zed\Shipment\Business\ShipmentFacade;

class ShipmentCartConnectorDependencyContainer extends AbstractBusinessDependencyContainer
{
    /**
     * @return ShipmentFacade
     */
    public function createShipmentFacade()
    {
        return $this->getProvidedDependency(ShipmentCartConnectorDependencyProvider::SHIPMENT_FACADE);
    }
}
