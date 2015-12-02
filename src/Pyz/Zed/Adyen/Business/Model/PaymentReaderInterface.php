<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Generated\Shared\Adyen\AdyenPaymentInterface;

interface PaymentReaderInterface
{
    /**
     * @param int $idSalesOrder
     * @return AdyenPaymentInterface
     */
    public function getPaymentBySalesOrderId($idSalesOrder);
}
