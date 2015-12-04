<?php

namespace Pyz\Zed\OrderExporter\Business;

use Generated\Shared\Sales\ItemInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Generated\Shared\Sales\OrderInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\OrderExporter\Persistence\PdSalesOrderItemAfterbuyExport;

/**
 * @method OrderExporterDependencyContainer getDependencyContainer()
 */
class OrderExporterFacade extends AbstractFacade
{
    /**
     * @param int $salesOrderId
     * @return OrderInterface
     */
    public function getSalesOrderById($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getSalesOrderById($salesOrderId);
    }

    /**
     * @param SpySalesOrderItem[] $orderItems
     */
    public function exportOrderItems(array $orderItems)
    {
        $this->getDependencyContainer()
            ->createAfterbuyExportManager()
            ->exportOrderItems(
                $orderItems,
                $this->getSalesOrderById(
                    $this->getOrderIdFromOrderItems($orderItems)
                ));
    }

    /**
     * @param int $orderItemId
     * @return ItemInterface
     */
    public function getOrderItemById($orderItemId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getOrderItemById($orderItemId);
    }

    /**
     * @param SpySalesOrderItem[] $orderItems
     * @return int|null
     * @throws \Exception
     */
    public function getOrderIdFromOrderItems(array $orderItems)
    {
        return $this->getDependencyContainer()
            ->createAfterbuyExportManager()
            ->getOrderIdFromOrderItems($orderItems);
    }

    /**
     * @param SpySalesOrderItem $orderItem
     * @return bool
     */
    public function isOrderItemsAfterbuyExportSuccessful(SpySalesOrderItem $orderItem)
    {
        return $this->getDependencyContainer()
            ->createOrderExportManager()
            ->isOrderItemsAfterbuyExportSuccessful($orderItem);
    }

    /**
     * @param int $salesOrderItemId
     * @return PdSalesOrderItemAfterbuyExport
     */
    public function findOrderItemAfterbuyExportByItemId($salesOrderItemId)
    {
        return $this->getDependencyContainer()
            ->createOrderExportManager()
            ->findOrderItemAfterbuyExportByItemId($salesOrderItemId);
    }

}
