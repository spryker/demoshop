<?php

namespace Pyz\Zed\ShipmentCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;
use Pyz\Zed\ShipmentCheckoutConnector\Business\ShipmentCheckoutConnectorFacade;

/**
 * @method ShipmentCheckoutConnectorFacade getFacade()
 */
class OrderShipmentMethodByCountryHydrationPlugin extends AbstractPlugin implements CheckoutOrderHydrationInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     */
    public function hydrateOrder(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $this->getFacade()->hydrateOrder($orderTransfer, $checkoutRequest);
    }
}
