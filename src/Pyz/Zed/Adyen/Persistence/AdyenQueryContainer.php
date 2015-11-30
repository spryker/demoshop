<?php

namespace Pyz\Zed\Adyen\Persistence;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyenQuery;
use PavFeature\Zed\Adyen\Persistence\AdyenQueryContainer as PavAdyenQueryContainer;

class AdyenQueryContainer extends PavAdyenQueryContainer implements AdyenQueryContainerInterface
{
    /**
     * @param int $salesOrderId
     * @return PavPaymentAdyenQuery
     */
    public function queryPaymentBySalesOrderId($salesOrderId)
    {
        return PavPaymentAdyenQuery::create()
            ->filterByFkSalesOrder($salesOrderId);
    }

}
