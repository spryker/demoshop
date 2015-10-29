<?php

namespace Pyz\Zed\SalesCheckoutConnector\Dependency\Facade;

use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

interface SalesCheckoutConnectorToSalesInterface
{

    /**
     * @param $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);
}
