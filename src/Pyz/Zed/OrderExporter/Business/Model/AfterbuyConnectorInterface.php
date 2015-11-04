<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

interface AfterbuyConnectorInterface
{
    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $orderId
     */
    public function sendToAfterbuy($postVariables, array $orderItems, $orderId);
}
