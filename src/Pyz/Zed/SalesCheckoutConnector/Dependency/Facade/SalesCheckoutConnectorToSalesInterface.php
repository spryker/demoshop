<?php

namespace Pyz\Zed\SalesCheckoutConnector\Dependency\Facade;

interface SalesCheckoutConnectorToSalesInterface
{

    /**
     * @param $salesOrderId
     * @return \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);
}
