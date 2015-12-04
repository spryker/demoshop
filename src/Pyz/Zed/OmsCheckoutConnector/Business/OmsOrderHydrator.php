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

    protected static $paymentMethodStateMachineMapper = [
        'invoice' =>  OmsConfig::ORDER_PROCESS_INVOICE_01,
        'payolution_invoice' => OmsConfig::ORDER_PROCESS_PAYOLUTION_PAYMENT_01,
        'payolution_installment' => OmsConfig::ORDER_PROCESS_PAYOLUTION_PAYMENT_01,
    ];

    /**
     * @param OrderTransfer $order
     * @param CheckoutRequestTransfer $request
     *
     * @throws NoStatemachineProcessException
     */
    public function hydrateOrderTransfer(OrderTransfer $order, CheckoutRequestTransfer $request)
    {
        $paymentMethod = $request->getPaymentMethod();

        if (array_key_exists($paymentMethod, self::$paymentMethodStateMachineMapper)) {
            $order->setProcess(self::$paymentMethodStateMachineMapper[$paymentMethod]);
        } else {
            parent::hydrateOrderTransfer($order, $request);
        }
    }

}
