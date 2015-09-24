<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\OmsCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\OmsCheckoutConnector\OrderInterface;
use Pyz\Zed\Oms\OmsConfig;
use SprykerFeature\Zed\OmsCheckoutConnector\Business\Exception\NoStatemachineProcessException;
use SprykerFeature\Zed\OmsCheckoutConnector\Business\OmsOrderHydrator as BaseOmsOrderHydrator;

class OmsOrderHydrator extends BaseOmsOrderHydrator
{

    const PAYMENT_METHOD_INVOICE = 'invoice';

    /**
     * @param OrderInterface $order
     * @param CheckoutRequestInterface $request
     *
     * @throws NoStatemachineProcessException
     */
    public function hydrateOrderTransfer(OrderInterface $order, CheckoutRequestInterface $request)
    {
        $paymentMethod = $request->getPaymentMethod();

        switch ($paymentMethod) {
            case self::PAYMENT_METHOD_INVOICE:
                $order->setProcess(OmsConfig::ORDER_PROCESS_PAYOLUTION_PAYMENT_01);
                break;
            default:
                parent::hydrateOrderTransfer($order, $request);
        }
    }

}
