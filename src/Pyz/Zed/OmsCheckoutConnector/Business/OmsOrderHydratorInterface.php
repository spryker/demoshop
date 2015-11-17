<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\OmsCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\OmsCheckoutConnector\OrderInterface;

interface OmsOrderHydratorInterface
{

    /**
     * @param OrderInterface $order
     * @param CheckoutRequestInterface $request
     */
    public function hydrateOrderTransfer(OrderInterface $order, CheckoutRequestInterface $request);

}
