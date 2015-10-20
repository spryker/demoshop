<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

interface AfterbuyConnectorInterface
{
    /**
     * @param array $postVariables
     * @return mixed
     */
    public function sendToAfterBuy(array $postVariables);
}