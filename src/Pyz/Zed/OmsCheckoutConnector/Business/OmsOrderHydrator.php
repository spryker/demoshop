<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\Oms\OmsConfig;
use SprykerFeature\Zed\OmsCheckoutConnector\Business\Exception\NoStatemachineProcessException;
use SprykerFeature\Zed\OmsCheckoutConnector\Business\OmsOrderHydrator as BaseOmsOrderHydrator;

class OmsOrderHydrator extends BaseOmsOrderHydrator
{

    const PAYMENT_METHOD_INVOICE = 'invoice';

    /**
     * @param OrderTransfer $order
     * @param CheckoutRequestTransfer $request
     *
     * @throws NoStatemachineProcessException
     */
    public function hydrateOrderTransfer(OrderTransfer $order, CheckoutRequestTransfer $request)
    {
        $paymentMethod = $request->getPaymentMethod();

        switch ($paymentMethod) {
            case self::PAYMENT_METHOD_INVOICE:
                $order->setProcess(OmsConfig::ORDER_PROCESS_INVOICE_01);
                break;
            default:
                parent::hydrateOrderTransfer($order, $request);
        }
    }

}
