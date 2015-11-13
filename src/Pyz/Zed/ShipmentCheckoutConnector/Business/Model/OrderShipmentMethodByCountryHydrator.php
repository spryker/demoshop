<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Business\Model;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
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
        $countryId = $checkoutRequest->getShippingAddress()->getAddress3();
        $shipmentMethod = $this->shipmentFacade->getShipmentMethodByCountryId($countryId);
//        $shipmentMethodTransfer = new ShipmentMethodTransfer();
//        $shipmentMethodTransfer->fromArray($shipmentMethod->toArray());
        $orderTransfer->setFkShipmentMethod($shipmentMethod->getIdShipmentMethod());
    }
}
