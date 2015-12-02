<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Generated\Shared\Adyen\AdyenPaymentInterface;

interface OrderExporterToAdyenFacade
{
    /**
     * @param int $idSalesOrder
     * @return AdyenPaymentInterface
     */
    public function getPaymentBySalesOrderId($idSalesOrder);
}
