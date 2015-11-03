<?php

namespace Pyz\Zed\OrderExporter\Persistence;

interface OrderExporterQueryContainerInterface
{
    /**
     * @param int $salesOrderItemId
     * @return $this|Propel\PdSalesOrderItemAfterbuyExportQuery
     */
    public function queryOrderItemAfterbuyExportByItemId($salesOrderItemId);
}
