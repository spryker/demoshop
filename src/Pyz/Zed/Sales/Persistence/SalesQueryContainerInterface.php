<?php

namespace Pyz\Zed\Sales\Persistence;

use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrderQuery;

interface SalesQueryContainerInterface
{
    /**
     * @param $idSalesOrder
     * @return SpySalesOrderQuery
     */
    public function querySalesOrderDetailsById($idSalesOrder);
}