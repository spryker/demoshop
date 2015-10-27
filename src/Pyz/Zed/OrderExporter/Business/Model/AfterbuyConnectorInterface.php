<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

interface AfterbuyConnectorInterface
{
    /**
     * @param $postVariables
     * @param $orderId
     */
    public function sendToAfterBuy($postVariables, $orderId);
}
