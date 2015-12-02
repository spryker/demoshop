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
     * @param int $idSalesOrder
     * @return SpySalesOrderQuery
     */
    public function querySalesOrderDetailsById($idSalesOrder);

    /**
     * @param int $idOrderItem
     * @return SpySalesOrderItemQuery
     */
    public function querySalesOrderItemById($idOrderItem);

    /**
     * @param int $idSalesOrder
     * @return SpySalesDiscountQuery
     */
    public function querySalesDiscountByOrderId($idSalesOrder);

    /**
     * @param int $idSalesOrderItem
     * @return PavSalesOrderItemConfigurationQuery
     */
    public function querySalesOrderItemConfigurationByItemId($idSalesOrderItem);

    /**
     * @param int $idSalesDiscount
     * @return SpySalesDiscountCodeQuery
     */
    public function querySalesDiscountCodeBySalesDiscountId($idSalesDiscount);
}
