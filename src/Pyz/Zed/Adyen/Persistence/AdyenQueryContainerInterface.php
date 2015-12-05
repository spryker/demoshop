<?php

namespace Pyz\Zed\Adyen\Persistence;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyenQuery;
use PavFeature\Zed\Adyen\Persistence\AdyenQueryContainerInterface as PavAdyenQueryContainerInterface;

interface AdyenQueryContainerInterface extends PavAdyenQueryContainerInterface
{
    /**
     * @param int $idSalesOrder
     * @return PavPaymentAdyenQuery
     */
    public function queryPaymentBySalesOrderId($idSalesOrder);
}
