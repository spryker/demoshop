<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\OmsCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\OmsCheckoutConnector\OrderInterface;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;
use Pyz\Shared\Oms\OmsConstants;
use Pyz\Zed\OmsCheckoutConnector\Business\Exception\NoStatemachineProcessException;

class OmsOrderHydrator implements OmsOrderHydratorInterface
{

    /**
     * @param OrderInterface $order
     * @param CheckoutRequestInterface $request
     *
     * @throws NoStatemachineProcessException
     */
    public function hydrateOrderTransfer(OrderInterface $order, CheckoutRequestInterface $request)
    {
        switch ($request->getPaymentMethod()) {
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GERMAN_BANK_TRANSFER :
                $order->setProcess(OmsConstants::ORDER_PROCESS_PREPAYMENT_01);
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA;
                $order->setProcess(OmsConstants::ORDER_PROCESS_SEPA_DIRECT_DEBIT_01);
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL;
                $order->setProcess(OmsConstants::ORDER_PROCESS_PAYPAL_01);
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SOFORTUEBERWEISUNG;
                $order->setProcess(OmsConstants::ORDER_PROCESS_SOFORTUEBERWEISUNG_01);
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE;
                $order->setProcess(OmsConstants::ORDER_PROCESS_CREDIT_CARD_01);
                break;
            default:
                throw new NoStatemachineProcessException();
        }
    }

}
