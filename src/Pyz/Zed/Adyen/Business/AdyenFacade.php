<?php

namespace Pyz\Zed\Adyen\Business;

use PavFeature\Zed\Adyen\Business\AdyenFacade as PavAdyenFacade;
use Pyz\Zed\Adyen\Business\AdyenDependencyContainer;
use Orm\Zed\Payone\Persistence\SpyPaymentPayone;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;

/**
 * @method AdyenDependencyContainer getDependencyContainer()
 */
class AdyenFacade extends PavAdyenFacade implements OrderExporterToAdyenFacade
{
    /**
     * @param int $salesOrderId
     * @return SpyPaymentPayone
     */
    public function getPaymentBySalesOrderId($salesOrderId)
    {
        return $this->getDependencyContainer()->createPaymentReader()->getPaymentBySalesOrderId($salesOrderId);
    }

}
