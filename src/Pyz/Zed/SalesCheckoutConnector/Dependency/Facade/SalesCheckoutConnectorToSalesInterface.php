<?php

namespace Pyz\Zed\SalesCheckoutConnector\Dependency\Facade;

use Orm\Zed\Sales\Persistence\SpySalesOrder;

interface SalesCheckoutConnectorToSalesInterface
{

    /**
     * @param $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);
}
