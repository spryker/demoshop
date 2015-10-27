<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\CustomerCheckoutConnector\Business\CustomerCheckoutConnectorFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;

/**
 * @method CustomerCheckoutConnectorFacade getFacade()
 */
class AddOnOrderCustomerHydrationPlugin extends AbstractPlugin implements CheckoutOrderHydrationInterface
{

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     */
    public function hydrateOrder(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $this->getFacade()->hydrateOrderTransferAddOn($orderTransfer, $checkoutRequest);
    }
}
