<?php

namespace Pyz\Client\Checkout\Service\Session;

use Generated\Shared\Checkout\OrderInterface;

interface OrderSuccessSessionInterface
{

    /**
     * @return OrderInterface|null
     */
    public function getOrder();

    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order);

    /**
     *
     */
    public function clearOrder();

}
