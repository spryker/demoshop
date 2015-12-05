<?php

namespace Pyz\Zed\Adyen\Business\Hpp;

use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckInterface;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;


interface HppPaymentReturnStateMachineManagerInterface
{

    /**
     * @param AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck
     * @param AdyenHppPaymentReturnCheckResponseInterface $hppPaymentReturnCheckResponse
     * @return void
     */
    public function triggerStateMachineEventOnHppPaymentReturn(
        AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck,
        AdyenHppPaymentReturnCheckResponseInterface $hppPaymentReturnCheckResponse
    );

}
