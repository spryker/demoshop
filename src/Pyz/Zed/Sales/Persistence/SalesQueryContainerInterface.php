<?php

namespace Pyz\Zed\Sales\Persistence;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrderQuery;
use Orm\Zed\Sales\Persistence\SpySalesDiscountCodeQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;
use Orm\Zed\Sales\Persistence\SpySalesDiscountQuery;
use Orm\Zed\Sales\Persistence\Base\PavSalesOrderItemConfigurationQuery;

interface SalesQueryContainerInterface
{
    /**
     * @param $idSalesOrder
     * @return SpySalesOrderQuery
     */
    public function querySalesOrderDetailsById($idSalesOrder);

    /**
     * @param $orderItemId
     * @return SpySalesOrderItemQuery
     */
    public function querySalesOrderItemById($orderItemId);

    /**
     * @param $salesOrderId
     * @return SpySalesDiscountQuery
     */
    public function querySalesDiscountByOrderId($salesOrderId);

    /**
     * @param int $salesOrderItemId
     * @return PavSalesOrderItemConfigurationQuery
     */
    public function querySalesOrderItemConfigurationByItemId($salesOrderItemId);

    /**
     * @param int $salesDiscountId
     * @return SpySalesDiscountCodeQuery
     */
    public function querySalesDiscountCodeBySalesDiscountId($salesDiscountId);
}
