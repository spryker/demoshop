<?php

namespace Pyz\Zed\Adyen\Business\Hpp;

use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckInterface;
use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;
use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;
use PavFeature\Shared\Adyen\AdyenHppReturnResponseConstants;
use PavFeature\Zed\Adyen\Business\Exception\PaymentNotFoundException;
use Pyz\Shared\Adyen\Code\AdyenStateMachineEvents;
use Pyz\Zed\Adyen\Persistence\AdyenQueryContainerInterface;
use SprykerFeature\Zed\Oms\Business\OmsFacade;
use SprykerFeature\Shared\Library\Error\ErrorHandler;

class HppPaymentReturnStateMachineManager implements HppPaymentReturnStateMachineManagerInterface
{

    /**
     * @var AdyenQueryContainerInterface
     */
    protected $queryContainer;
    /**
     * @var OmsFacade
     */
    protected $omsFacade;

    /**
     * @param AdyenQueryContainerInterface $queryContainer
     * @param OmsFacade $omsFacade
     */
    public function __construct(
        AdyenQueryContainerInterface $queryContainer,
        OmsFacade $omsFacade
    ){
        $this->queryContainer = $queryContainer;
        $this->omsFacade = $omsFacade;
    }

    /**
     * @return AdyenQueryContainerInterface
     */
    protected function getQueryContainer()
    {
        return $this->queryContainer;
    }

    /**
     * @return OmsFacade
     */
    protected function getOmsFacade()
    {
        return $this->omsFacade;
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
        $event = $this->getStateMachineEventToTrigger($hppPaymentReturnCheckResponse);
        if ($event === null) {
            return;
        }
        $paymentEntity = $this->getPaymentEntity($hppPaymentReturnCheck);
        if ($paymentEntity === null) {
            $exception = new PaymentNotFoundException('Tried to trigger state machine for not successful hpp payment return');
            ErrorHandler::initialize()->handleException($exception, false, false);
            return;
        }
        $order = $paymentEntity->getSpySalesOrder();
        $items = $order->getItems();

        $this->getOmsFacade()->triggerEvent($event, $items, []);
    }

    /**
     * @param AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck
     * @return PavPaymentAdyen|null
     */
    protected function getPaymentEntity(AdyenHppPaymentReturnCheckInterface $hppPaymentReturnCheck)
    {
        return $this->getQueryContainer()
            ->getQueryPaymentByPspReference($hppPaymentReturnCheck->getPspReference())
            ->findOne();
    }

    /**
     * @param AdyenHppPaymentReturnCheckResponseInterface $checkResponse
     * @return null|string
     */
    protected function getStateMachineEventToTrigger(AdyenHppPaymentReturnCheckResponseInterface $checkResponse)
    {
        switch ($checkResponse->getInternalHppReturnCheckResponseKey()) {
            case AdyenHppReturnResponseConstants::ADYEN_HPP_RETURN_CHECK_RESPONSE_CANCELLED :
                return AdyenStateMachineEvents::ADYEN_REDIRECT_PAYMENT_CANCELLED;
            case AdyenHppReturnResponseConstants::ADYEN_HPP_RETURN_CHECK_RESPONSE_ERROR :
            case AdyenHppReturnResponseConstants::ADYEN_HPP_RETURN_CHECK_RESPONSE_FAILURE :
            case AdyenHppReturnResponseConstants::ADYEN_HPP_RETURN_CHECK_RESPONSE_INVALID :
                return AdyenStateMachineEvents::ADYEN_REDIRECT_PAYMENT_ERROR;
            default :
                return null;
        }
    }

}
