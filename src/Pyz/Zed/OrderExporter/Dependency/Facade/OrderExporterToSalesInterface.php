<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;

interface OrderExporterToSalesInterface
{
    /**
     * @param int $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId);

    /**
     * @param int $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);

    /**
     * @param int $salesOrderId
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($salesOrderId);
}
