<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Business;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ShipmentCheckoutConnectorDependencyContainer getDependencyContainer()
 */
class ShipmentCheckoutConnectorFacade extends AbstractFacade
{
    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     */
    public function hydrateOrder(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $this->getDependencyContainer()->createOrderShipmentHydrator()->hydrateOrder($orderTransfer, $checkoutRequest);
    }

}
