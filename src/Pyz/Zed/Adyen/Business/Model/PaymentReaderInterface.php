<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Orm\Zed\Payone\Persistence\SpyPaymentPayone;

interface PaymentReaderInterface
{
    /**
     * @param $salesOrderId
     * @return SpyPaymentPayone
     */
    public function getPaymentBySalesOrderId($salesOrderId);
}
