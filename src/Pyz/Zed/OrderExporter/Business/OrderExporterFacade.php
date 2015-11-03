<?php

namespace Pyz\Zed\OrderExporter\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;

/**
 * @method OrderExporterDependencyContainer getDependencyContainer()
 */
class OrderExporterFacade extends AbstractFacade
{
    /**
     * @param $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getSalesOrderById($salesOrderId);
    }

    /**
     * @param SpySalesOrder[] $orderItems
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
     * @param $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getOrderItemById($orderItemId);
    }

    /**
     * @param array $orderItems
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
     * @param $salesOrderItemId
     * @return PdSalesOrderItemAfterbuyExport
     */
    public function findOrderItemAfterbuyExportByItemId($salesOrderItemId)
    {
        return $this->getDependencyContainer()
            ->createOrderExportManager()
            ->findOrderItemAfterbuyExportByItemId($salesOrderItemId);
    }

}
