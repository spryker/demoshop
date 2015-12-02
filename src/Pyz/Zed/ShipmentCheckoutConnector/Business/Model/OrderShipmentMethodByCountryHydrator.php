<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Business\Model;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\ShipmentCheckoutConnector\Dependency\Facade\ShipmentCheckoutConnectorToShipmentInterface;

class OrderShipmentMethodByCountryHydrator implements OrderShipmentMethodByCountryHydratorInterface
{
    /**
     * @var ShipmentCheckoutConnectorToShipmentInterface
     */
    protected $shipmentFacade;

    public function __construct(ShipmentCheckoutConnectorToShipmentInterface $shipmentFacade)
    {
        $this->shipmentFacade = $shipmentFacade;
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     */
    public function hydrateOrder(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $countryIso2 = $checkoutRequest->getShippingAddress()->getIso2Code();
        $shipmentMethod = $this->shipmentFacade->getShipmentMethodByCountryIso2($countryIso2);
        $orderTransfer->setFkShipmentMethod($shipmentMethod->getIdShipmentMethod());
    }
}
