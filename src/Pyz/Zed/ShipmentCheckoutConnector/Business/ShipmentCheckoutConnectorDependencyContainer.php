<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Business;

use Pyz\Zed\ShipmentCheckoutConnector\ShipmentCheckoutConnectorDependencyProvider;
use Generated\Zed\Ide\FactoryAutoCompletion\ShipmentCheckoutConnectorBusiness;
use Pyz\Zed\ShipmentCheckoutConnector\Business\Model\OrderShipmentMethodByCountryHydratorInterface;
use SprykerFeature\Zed\ShipmentCheckoutConnector\Business\ShipmentCheckoutConnectorDependencyContainer as SpyShipmentCheckoutConnectorDependencyContainer;

/**
 * @method ShipmentCheckoutConnectorBusiness getFactory()
 */
class ShipmentCheckoutConnectorDependencyContainer extends SpyShipmentCheckoutConnectorDependencyContainer
{
    /**
     * @return OrderShipmentMethodByCountryHydratorInterface
     * @throws \ErrorException
     */
    public function createOrderShipmentHydrator()
    {
        return $this->getFactory()->createModelOrderShipmentMethodByCountryHydrator(
            $this->getProvidedDependency(ShipmentCheckoutConnectorDependencyProvider::SHIPMENT_FACADE)
        );
    }

}
