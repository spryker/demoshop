<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Oms\OmsConfig as SprykerOmsConfig;

class OmsConfig extends SprykerOmsConfig
{

    const ORDER_PROCESS_BRAINTREE_PAYMENT_01 = 'BraintreePayment01';
    const ORDER_PROCESS_BRAINTREE_PAY_PAL_01 = 'BraintreePayPal01';
    const ORDER_PROCESS_BRAINTREE_CREDIT_CARD_01 = 'BraintreeCreditCard01';

    /**
     * @return array
     */
    public function getActiveProcesses()
    {
        return [
            self::ORDER_PROCESS_BRAINTREE_PAYMENT_01,
            self::ORDER_PROCESS_BRAINTREE_PAY_PAL_01,
            self::ORDER_PROCESS_BRAINTREE_CREDIT_CARD_01,
        ];
    }

}
