<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

interface AfterbuyConnectorInterface
{
    public function sendToAfterBuy();
}