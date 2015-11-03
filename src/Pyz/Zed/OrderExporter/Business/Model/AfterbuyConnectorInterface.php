<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

interface AfterbuyConnectorInterface
{
    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $orderId
     */
    public function sendToAfterBuy($postVariables, array $orderItems, $orderId);

    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $orderId
     */
    public function mockSendingToAfterbuy($postVariables, array $orderItems, $orderId);
}
