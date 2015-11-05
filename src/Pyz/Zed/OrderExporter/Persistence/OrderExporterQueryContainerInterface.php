<?php

namespace Pyz\Zed\OrderExporter\Persistence;

use Orm\Zed\OrderExporter\Persistence\PdSalesOrderItemAfterbuyExportQuery;

interface OrderExporterQueryContainerInterface
{
    /**
     * @param int $salesOrderItemId
     * @return PdSalesOrderItemAfterbuyExportQuery
     */
    public function queryOrderItemAfterbuyExportByItemId($salesOrderItemId);
}
