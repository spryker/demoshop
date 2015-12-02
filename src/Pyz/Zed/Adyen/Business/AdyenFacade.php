<?php

namespace Pyz\Zed\Adyen\Business;

use PavFeature\Zed\Adyen\Business\AdyenFacade as PavAdyenFacade;
use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;

/**
 * @method AdyenDependencyContainer getDependencyContainer()
 */
class AdyenFacade extends PavAdyenFacade implements OrderExporterToAdyenFacade
{
    /**
     * @param int $idSalesOrder
     * @return PavPaymentAdyen
     */
    public function getPaymentBySalesOrderId($idSalesOrder)
    {
        return $this->getDependencyContainer()->createPaymentReader()->getPaymentBySalesOrderId($idSalesOrder);
    }

}
