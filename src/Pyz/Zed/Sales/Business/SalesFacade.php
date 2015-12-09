<?php

namespace Pyz\Zed\Sales\Business;

use Generated\Shared\Sales\ItemInterface;
use Generated\Shared\Sales\OrderInterface;
use Generated\Shared\Sales\SalesDiscountCodeInterface;
use Generated\Shared\Sales\SalesDiscountInterface;
use Generated\Shared\Sales\SalesItemConfigurationInterface;
use Generated\Shared\Sales\SalesOrderItemInterface;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesFacade;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface as SpySalesCheckoutConnectorToSalesInterface;
use Pyz\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class SalesFacade extends SprykerSalesFacade implements SpySalesCheckoutConnectorToSalesInterface, OrderExporterToSalesFacade, SalesCheckoutConnectorToSalesInterface
{
    /**
     * @param int $idOrderItem
     * @return ItemInterface
     */
    public function getOrderItemById($idOrderItem)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderItemById($idOrderItem);
    }

    /**
     * @param $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemEntityById($orderItemId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderItemEntityById($orderItemId);
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesOrder
     */
    public function getSalesOrderEntityById($idSalesOrder)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesOrderEntityById($idSalesOrder);
    }

    /**
     * @param int $idSalesOrder
     * @return OrderInterface
     */
    public function getSalesOrderById($idSalesOrder)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($idSalesOrder);
    }

    /**
     * @param int $idSalesOrder
     * @return SalesDiscountInterface[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesDiscountsByOrderId($idSalesOrder);
    }

    /**
     * @param int $idSalesOrderItem
     * @return SalesItemConfigurationInterface[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesOrderItemConfigurationByItemId($idSalesOrderItem);
    }

    /**
     * @param int $idSalesDiscount
     * @return SalesDiscountCodeInterface
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesDiscountCodeBySalesDiscountId($idSalesDiscount);
    }

    /**
     * @param int $idSalesDiscount
     * @return bool
     */
    public function hasDiscountCodeByDiscountId($idSalesDiscount)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->hasDiscountCodeByDiscountId($idSalesDiscount);
    }
}
