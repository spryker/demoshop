<?php

namespace Pyz\Zed\SalesCheckoutConnector\Dependency\Facade;

use Generated\Shared\Sales\OrderInterface;

interface SalesCheckoutConnectorToSalesInterface
{

    /**
     * @param int $salesOrderId
     * @return OrderInterface
     */
    public function getSalesOrderById($salesOrderId);
}
