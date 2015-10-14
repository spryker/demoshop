<?php

namespace Pyz\Zed\Sales\Business\Model;

use SprykerFeature\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

class SalesManager extends SprykerOrderManager
{
    /**
     * @return SpySalesOrder[]
     */
    public function getListOrders()
    {
        return $this->queryContainer->querySalesOrder()
            ->find();
    }
}
