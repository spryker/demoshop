<?php

namespace Pyz\Zed\Adyen\Persistence;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyenQuery;

interface AdyenQueryContainerInterface
{
    /**
     * @param int $idSalesOrder
     * @return PavPaymentAdyenQuery
     */
    public function queryPaymentBySalesOrderId($idSalesOrder);
}
