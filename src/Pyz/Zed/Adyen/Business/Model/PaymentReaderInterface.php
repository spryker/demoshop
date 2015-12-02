<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;

interface PaymentReaderInterface
{
    /**
     * @param int $idSalesOrder
     * @return PavPaymentAdyen
     */
    public function getPaymentBySalesOrderId($idSalesOrder);
}
