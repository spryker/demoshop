<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;
use Generated\Shared\Transfer\SalesOrderItemTransfer;

class AfterbuyResponseWriter implements AfterbuyResponseWriterInterface
{
    /**
     * In not production environment (dev, staging) afterbuy response is saved as isTest TRUE and isSuccessful TRUE
     *
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @param $postVariables
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAfterbuyResponse(AfterbuyExportTransfer $afterbuyExportTransfer, $postVariables)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setRequest($postVariables)
            ->setSuccess(true)
            ->setIsTest(true);

        $afterbuyResponseEntity->save();

        $afterbuyExportTransfer
            ->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse())
            ->setSuccess(true);

        $this->saveOrderItemExport($afterbuyExportTransfer);
    }

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

}
