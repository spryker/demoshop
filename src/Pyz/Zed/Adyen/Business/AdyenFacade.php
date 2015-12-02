<?php

namespace Pyz\Zed\Adyen\Business;

use Generated\Shared\Adyen\AdyenPaymentInterface;
use PavFeature\Zed\Adyen\Business\AdyenFacade as PavAdyenFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;

/**
 * @method AdyenDependencyContainer getDependencyContainer()
 */
class AdyenFacade extends PavAdyenFacade implements OrderExporterToAdyenFacade
{
    /**
     * @param int $idSalesOrder
     * @return AdyenPaymentInterface
     */
    public function getPaymentBySalesOrderId($idSalesOrder)
    {
        return $this->getDependencyContainer()->createPaymentReader()->getPaymentBySalesOrderId($idSalesOrder);
    }

}
