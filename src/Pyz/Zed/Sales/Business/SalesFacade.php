<?php

namespace Pyz\Zed\Sales\Business;

use Orm\Zed\Sales\Persistence\SpySalesDiscountCode;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesFacade;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface as SpySalesCheckoutConnectorToSalesInterface;
use Pyz\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\Base\PavSalesOrderItemConfiguration;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class SalesFacade extends SprykerSalesFacade implements SpySalesCheckoutConnectorToSalesInterface, OrderExporterToSalesFacade, SalesCheckoutConnectorToSalesInterface
{
    /**
     * @param int $idOrderItem
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($idOrderItem)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderItemById($idOrderItem);
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesOrder
     */
    public function getSalesOrderById($idSalesOrder)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($idSalesOrder);
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesDiscountsByOrderId($idSalesOrder);
    }

    /**
     * @param int $idSalesOrderItem
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesOrderItemConfigurationByItemId($idSalesOrderItem);
    }

    /**
     * @param int $idSalesDiscount
     * @return SpySalesDiscountCode
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesDiscountCodeBySalesDiscountId($idSalesDiscount);
    }

}
