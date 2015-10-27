<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesInterface;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrderItem;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class SalesFacade extends SprykerSalesFacade implements SalesCheckoutConnectorToSalesInterface, OrderExporterToSalesInterface
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
     * @return \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($salesOrderId);
    }

}
