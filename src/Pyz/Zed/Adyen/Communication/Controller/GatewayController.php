<?php

namespace Pyz\Zed\Adyen\Communication\Controller;

use PavFeature\Shared\Adyen\AdyenHppReturnResponseConstants;
use Pyz\Zed\Adyen\Business\AdyenFacade;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckInterface;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;
use PavFeature\Zed\Adyen\Communication\Controller\GatewayController as PavGatewayController;
use PavFeature\Zed\Adyen\Communication\AdyenDependencyContainer;
use Pyz\Shared\Adyen\Code\AdyenStateMachineEvents;

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
        $checkResponse = $this->getFacade()
            ->checkHppPaymentReturn($hppPaymentReturnCheck);

        $this->getFacade()
            ->triggerStateMachineEventOnHppPaymentReturn(
                $hppPaymentReturnCheck,
                $checkResponse
            );

        return $checkResponse;
    }


}
