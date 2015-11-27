<?php

namespace Pyz\Zed\ProductGroupCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\ProductGroupCheckoutConnector\Business\ProductGroupCheckoutConnectorFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

/**
 * @method ProductGroupCheckoutConnectorFacade getFacade()
 */
class OrderProductGroupSavePlugin extends AbstractPlugin implements CheckoutSaveOrderInterface
{

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function saveOrder(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        $this->getFacade()->saveOrderProductGroups($orderTransfer);
    }
}
