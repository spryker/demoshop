<?php

namespace Pyz\Zed\OrderExporter\Persistence;

use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\OrderExporter\Persistence\Propel\Base\PdSalesOrderItemAfterbuyExportQuery;
use Pyz\Zed\OrderExporter\Persistence\Propel\Map\PdAfterbuyResponseTableMap;
use Pyz\Zed\OrderExporter\Persistence\Propel\Map\PdSalesOrderItemAfterbuyExportTableMap;
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
        $query = PdSalesOrderItemAfterbuyExportQuery::create('orderItemAfterbuyExport')
            ->filterByFkOrderItem($salesOrderItemId);

        $join = new Join();

        $join->addCondition(
            PdSalesOrderItemAfterbuyExportTableMap::COL_ID_SALES_AFTERBUY_EXPORT,
            PdAfterbuyResponseTableMap::COL_ID_AFTERBUY_RESPONSE
        );

        $query->addJoinObject($join,self::GROUP_JOIN);

        return $query;
    }

}
