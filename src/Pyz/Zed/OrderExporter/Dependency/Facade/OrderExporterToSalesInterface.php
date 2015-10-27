<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrder;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;

interface OrderExporterToSalesInterface
{
    /**
     * @param $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId);

    /**
     * @param $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);
}
