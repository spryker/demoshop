<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Generated\Shared\Transfer\SalesOrderItemTransfer;
use Orm\Zed\OrderExporter\Persistence\PdSalesOrderItemAfterbuyExport;

abstract class AbstractAfterbuyResponseWriter
{
    /**
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function saveOrderItemExport(AfterbuyExportTransfer $afterbuyExportTransfer)
    {
        $orderItemAfterbuyResponseEntities = array();

        /** @var SalesOrderItemTransfer $orderItem */
        foreach ($afterbuyExportTransfer->getOrderItems() as $orderItem) {
            $orderItemAfterbuyResponseEntity = new PdSalesOrderItemAfterbuyExport();
            $orderItemAfterbuyResponseEntity
                ->setFkOrder($afterbuyExportTransfer->getOrderId())
                ->setFkOrderItem($orderItem->getOrderItemId())
                ->setFkAfterbuyResponse($afterbuyExportTransfer->getAfterbuyResponseId())
                ->setSuccess($afterbuyExportTransfer->getSuccess());
            $orderItemAfterbuyResponseEntity->save();

            $orderItemAfterbuyResponseEntities[] = $orderItemAfterbuyResponseEntity;
        }

        return $orderItemAfterbuyResponseEntities;
    }

    /**
     * @param AfterbuyExportTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     */
    abstract public function saveAfterbuyResponse(AfterbuyExportTransfer $afterbuyTransfer, $afterbuyResponse);
}
