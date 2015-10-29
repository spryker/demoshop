<?php

namespace Pyz\Zed\SalesCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\SalesCheckoutConnector\Business\SalesCheckoutConnectorFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

/**
 * @method SalesCheckoutConnectorFacade getFacade()
 */
class AddOnLinkCustomerToOrderPlugin extends AbstractPlugin implements CheckoutSaveOrderInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function saveOrder(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        $this->getFacade()->hydrateOrderTransferAddOnLink($orderTransfer, $checkoutResponse);
    }
}
