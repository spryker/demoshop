<?php

namespace Pyz\Zed\OrderExporter\Persistence;

use Propel\Runtime\ActiveQuery\Criteria;
use Orm\Zed\OrderExporter\Persistence\Base\PdSalesOrderItemAfterbuyExportQuery;
use Orm\Zed\OrderExporter\Persistence\Map\PdAfterbuyResponseTableMap;
use SprykerFeature\Zed\Sales\Persistence\SalesQueryContainer as SprykerSalesQueryContainer;

class OrderExporterQueryContainer extends SprykerSalesQueryContainer implements OrderExporterQueryContainerInterface
{
    const GROUP_JOIN = 'groupJoin';

    /**
     * @param int $salesOrderItemId
     * @return $this|Propel\PdSalesOrderItemAfterbuyExportQuery
     */
    public function queryOrderItemAfterbuyExportByItemId($salesOrderItemId)
    {
        return PdSalesOrderItemAfterbuyExportQuery::create('orderItemAfterbuyExport')
            ->joinPdAfterbuyResponse()
            ->withColumn(PdAfterbuyResponseTableMap::COL_IS_TEST, 'isTest')
            ->withColumn(PdAfterbuyResponseTableMap::COL_REQUEST, 'request')
            ->withColumn(PdAfterbuyResponseTableMap::COL_FULL_RESPONSE, 'fullResponse')
            ->withColumn(PdAfterbuyResponseTableMap::COL_ERRORS_LIST, 'errorsList')
            ->filterByFkOrderItem($salesOrderItemId)
            ->orderByUpdatedAt(Criteria::DESC);
    }

}
