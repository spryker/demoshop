<?php

namespace Pyz\Zed\SalesCheckoutConnector\Dependency\Facade;

use Orm\Zed\Sales\Persistence\SpySalesOrder;

interface SalesCheckoutConnectorToSalesInterface
{

    /**
     * @param int $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderEntityById($salesOrderId);
}
