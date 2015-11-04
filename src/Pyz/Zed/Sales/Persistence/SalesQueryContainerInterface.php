<?php

namespace Pyz\Zed\Sales\Persistence;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrderQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;

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
}