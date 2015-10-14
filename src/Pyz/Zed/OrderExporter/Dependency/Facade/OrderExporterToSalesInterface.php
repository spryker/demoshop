<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

interface OrderExporterToSalesInterface
{
    /**
     * @param int $orderId
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function getOrderBySalesOrderId($orderId);
}