<?php

namespace Pyz\Zed\OrderExporter\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;

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
            ->createOrderExporterManager()
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
            ->createOrderExporterManager()
            ->getOrderIdFromOrderItems($orderItems);
    }
}
