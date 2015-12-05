<?php

namespace Pyz\Zed\Adyen\Business;

use Generated\Shared\Adyen\AdyenPaymentInterface;
use PavFeature\Zed\Adyen\Business\AdyenFacade as PavAdyenFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckInterface;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;

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
        return $this->getDependencyContainer()
            ->createPaymentReader()
            ->getPaymentBySalesOrderId($idSalesOrder);
    }

    /**
     * @param AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck
     * @param AdyenHppPaymentReturnCheckResponseInterface $hppPaymentReturnCheckResponse
     * @return void
     */
    public function triggerStateMachineEventOnHppPaymentReturn(
        AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck,
        AdyenHppPaymentReturnCheckResponseInterface $hppPaymentReturnCheckResponse
    ){
        $this->getDependencyContainer()
            ->createHppPaymentReturnStateMachineManager()
            ->triggerStateMachineEventOnHppPaymentReturn(
                $hppPaymentReturnCheck,
                $hppPaymentReturnCheckResponse
            );
    }

}
