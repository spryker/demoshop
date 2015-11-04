<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesInterface;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface as SpySalesCheckoutConnectorToSalesInterface;
use Pyz\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrderItem;

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
     * @param $salesOrderId
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($salesOrderId);
    }

}
