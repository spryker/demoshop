<?php

namespace Pyz\Shared\Sales\Transfer\Order;

use ProjectA\Shared\Sales\Transfer\Order\Payment as BasePayment;

class Payment extends BasePayment
{

    /**
     * @var bool
     */
    protected $ccValid = false;
}
