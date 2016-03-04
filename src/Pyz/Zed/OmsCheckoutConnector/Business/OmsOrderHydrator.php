<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\Oms\OmsConfig;
use Spryker\Zed\OmsCheckoutConnector\Business\OmsOrderHydrator as BaseOmsOrderHydrator;

class OmsOrderHydrator extends BaseOmsOrderHydrator
{

    /**
     * @var array
     */
    protected static $paymentMethodStateMachineMapper = [
        'invoice' => OmsConfig::ORDER_PROCESS_INVOICE_01,
        'payolution_invoice' => OmsConfig::ORDER_PROCESS_PAYOLUTION_PAYMENT_01,
        'payolution_installment' => OmsConfig::ORDER_PROCESS_PAYOLUTION_PAYMENT_01,
    ];

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $order
     * @param \Generated\Shared\Transfer\QuoteTransfer $request
     *
     * @throws \Spryker\Zed\OmsCheckoutConnector\Business\Exception\NoStatemachineProcessException
     *
     * @return void
     */
    public function hydrateOrderTransfer(OrderTransfer $order, QuoteTransfer $request)
    {
        $paymentMethod = $request->getPaymentMethod();

        if (array_key_exists($paymentMethod, self::$paymentMethodStateMachineMapper)) {
            $order->setProcess(self::$paymentMethodStateMachineMapper[$paymentMethod]);
        } else {
            parent::hydrateOrderTransfer($order, $request);
        }
    }

}
