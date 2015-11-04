<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;

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
