<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesDiscountCode;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\Base\PavSalesOrderItemConfiguration;

interface OrderExporterToSalesFacade
{
    /**
     * @param int $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId);

    /**
     * @param int $salesOrderId
     * @return SpySalesOrder
     */
    public function getSalesOrderById($salesOrderId);

    /**
     * @param int $salesOrderId
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($salesOrderId);

    /**
     * @param int $salesOrderItemId
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($salesOrderItemId);

    /**
     * @param int $salesDiscountId
     * @return SpySalesDiscountCode
     */
    public function getSalesDiscountCodeBySalesDiscountId($salesDiscountId);
}
