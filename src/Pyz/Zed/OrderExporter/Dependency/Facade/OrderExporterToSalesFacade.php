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
     * @param int $idSalesOrder
     * @return SpySalesOrder
     */
    public function getSalesOrderById($idSalesOrder);

    /**
     * @param int $idSalesOrder
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder);

    /**
     * @param int $idSalesOrderItem
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem);

    /**
     * @param int $idSalesDiscount
     * @return SpySalesDiscountCode
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount);
}
