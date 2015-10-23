<?php

namespace Pyz\Zed\Sales\Persistence;

use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrderQuery;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItemQuery;

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