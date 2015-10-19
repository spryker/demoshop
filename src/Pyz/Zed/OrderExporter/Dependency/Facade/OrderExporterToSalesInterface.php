<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrder;

interface OrderExporterToSalesInterface
{
    /**
     * @param int $orderId
     * @return SpySalesOrder
     */
    public function getOrderBySalesOrderId($orderId);
}