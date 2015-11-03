<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\Persistence\OrderExporterQueryContainerInterface;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;

class OrderExportManager
{
    /**
     * @var OrderExporterQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param OrderExporterQueryContainerInterface $queryContainer
     */
    public function __construct(OrderExporterQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param $salesOrderItemId
     * @return PdSalesOrderItemAfterbuyExport
     */
    public function findOrderItemAfterbuyExportByItemId($salesOrderItemId)
    {
        return $this->queryContainer->queryOrderItemAfterbuyExportByItemId($salesOrderItemId)
            ->findOne();
    }

    /**
     * @param SpySalesOrderItem $orderItem
     * @return bool
     */
    public function isOrderItemsAfterbuyExportSuccessful(SpySalesOrderItem $orderItem)
    {
        $afterbuyResponseEntity = $this->findOrderItemAfterbuyExportByItemId($orderItem->getIdSalesOrderItem());
        if ($afterbuyResponseEntity !== null) {
            return $afterbuyResponseEntity->getSuccess();
        }

        return false;
    }

}
