<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business\Model;

use Generated\Shared\CustomerCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\CustomerCheckoutConnector\OrderInterface;

interface AddOnCustomerOrderHydratorInterface
{
    /**
     * @param OrderInterface $orderTransfer
     * @param CheckoutRequestInterface $request
     */
    public function hydrateOrderTransfer(OrderInterface $orderTransfer, CheckoutRequestInterface $request);
}