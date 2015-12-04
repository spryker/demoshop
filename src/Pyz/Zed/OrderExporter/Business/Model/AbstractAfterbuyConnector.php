<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\SalesOrderItemTransfer;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrderItem;

abstract class AbstractAfterbuyConnector
{
    /**
     * @param SpySalesOrderItem [] $orderItems
     * @return array
     */
    protected function createOrderItemsTransfer(array $orderItems)
    {
        $orderItemTransfers = new \ArrayObject();

        foreach ($orderItems as $orderItem) {
            $orderItemTransfer = new SalesOrderItemTransfer();
            $orderItemTransfer->setOrderItemId($orderItem->getIdSalesOrderItem());
            $orderItemTransfers[] = $orderItemTransfer;
        }

        return $orderItemTransfers;
    }

    /**
     * @param $postVariables
     * @param SpySalesOrderItem[] $orderItems
     * @param int $idOrder
     */
    abstract public function sendToAfterbuy($postVariables, array $orderItems, $idOrder);
}
