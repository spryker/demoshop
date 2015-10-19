<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesInterface;
use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrder;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class SalesFacade extends SprykerSalesFacade implements SalesCheckoutConnectorToSalesInterface, OrderExporterToSalesInterface
{
    /**
     * @param int $orderId
     * @return SpySalesOrder
     */
    public function getOrderBySalesOrderId($orderId)
    {
        return $this->getDependencyContainer()
            ->createSalesManager()
            ->getOrderDetailsBySalesId($orderId);
    }

}
