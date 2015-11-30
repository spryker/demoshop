<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;

interface OrderExporterToAdyenFacade
{
    /**
     * @param int $salesOrderId
     * @return PavPaymentAdyen
     */
    public function getPaymentBySalesOrderId($salesOrderId);
}
