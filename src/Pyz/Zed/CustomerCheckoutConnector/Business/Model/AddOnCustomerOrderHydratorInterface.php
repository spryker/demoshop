<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business\Model;

use Generated\Shared\CustomerCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\Transfer\OrderTransfer;

interface AddOnCustomerOrderHydratorInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestInterface $request
     */
    public function hydrateOrderTransfer(OrderTransfer $orderTransfer, CheckoutRequestInterface $request);
}