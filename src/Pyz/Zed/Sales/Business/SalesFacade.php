<?php

namespace Pyz\Zed\Sales\Business;

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
     * @param int $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderItemById($orderItemId);
    }

    /**
     * @param int $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($salesOrderId);
    }

    /**
     * @param int $salesOrderId
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesDiscountsByOrderId($salesOrderId);
    }

    /**
     * @param int $salesOrderItemId
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($salesOrderItemId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getSalesOrderItemConfigurationByItemId($salesOrderItemId);
    }

}
