<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Payone\Persistence\SpyPaymentPayone;

interface OrderExporterToAdyenFacade
{
    /**
     * @param int $salesOrderId
     * @return SpyPaymentPayone
     */
    public function getPaymentBySalesOrderId($salesOrderId);
}
