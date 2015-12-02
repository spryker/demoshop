<?php

namespace Pyz\Zed\Adyen\Persistence;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyenQuery;
use PavFeature\Zed\Adyen\Persistence\AdyenQueryContainer as PavAdyenQueryContainer;

class AdyenQueryContainer extends PavAdyenQueryContainer implements AdyenQueryContainerInterface
{
    /**
     * @param int $idSalesOrder
     * @return PavPaymentAdyenQuery
     */
    public function queryPaymentBySalesOrderId($idSalesOrder)
    {
        return PavPaymentAdyenQuery::create()
            ->filterByFkSalesOrder($idSalesOrder);
    }

}
