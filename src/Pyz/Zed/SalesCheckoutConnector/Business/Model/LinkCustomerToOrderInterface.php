<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business\Model;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;

interface LinkCustomerToOrderInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function saveOrderCustomerLink(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse);
}
