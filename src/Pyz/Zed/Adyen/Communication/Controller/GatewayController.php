<?php

namespace Pyz\Zed\Adyen\Communication\Controller;

use PavFeature\Zed\Adyen\Business\AdyenFacade;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckInterface;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;
use PavFeature\Zed\Adyen\Communication\Controller\GatewayController as PavGatewayController;
use PavFeature\Zed\Adyen\Communication\AdyenDependencyContainer;

/**
 * @method AdyenFacade getFacade()
 * @method AdyenDependencyContainer getDependencyContainer()
 */
class GatewayController extends PavGatewayController
{

    /**
     * @param AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck
     * @return AdyenHppPaymentReturnCheckResponseInterface
     */
    public function checkHppPaymentReturnAction(AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck)
    {

        //$container->createSalesFacade(); $hppPaymentReturnCheck->get
        return $this->getFacade()
            ->checkHppPaymentReturn($hppPaymentReturnCheck);
    }

    protected function triggerStateMachineEvent(AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck)
    {
        //$this->getFacade()->get
    }

}
