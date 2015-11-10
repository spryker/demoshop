<?php

namespace Pyz\Zed\OmsCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;
use Pyz\Zed\OmsCheckoutConnector\Business\OmsCheckoutConnectorFacade;

/**
 * @method OmsCheckoutConnectorFacade getFacade()
 */
class OrderOmsHydrationPlugin extends AbstractPlugin implements CheckoutOrderHydrationInterface
{

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     */
    public function hydrateOrder(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $this->getFacade()->hydrateOrderTransfer($orderTransfer, $checkoutRequest);
    }

}
