<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;

interface PaymentReaderInterface
{
    /**
     * @param $salesOrderId
     * @return PavPaymentAdyen
     */
    public function getPaymentBySalesOrderId($salesOrderId);
}
