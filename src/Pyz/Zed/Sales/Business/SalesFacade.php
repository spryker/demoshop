<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesInterface;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface as SpySalesCheckoutConnectorToSalesInterface;
use Pyz\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class SalesFacade extends SprykerSalesFacade implements SpySalesCheckoutConnectorToSalesInterface, OrderExporterToSalesInterface, SalesCheckoutConnectorToSalesInterface
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

}
