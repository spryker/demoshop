<?php

class Sao_Shared_Library_PaymentMethods extends ProjectA_Shared_Library_PaymentMethods
{
    const PAYMENT_METHOD_TESTPAYMENT = 'testPayment';
    const PAYMENT_METHOD_PAYPAL = 'paypal';

    /**
     * @static
     * @return array
     */
    public static function getPaymentMethods()
    {
        return array(
            self::PAYMENT_METHOD_CC,
            self::PAYMENT_METHOD_PAYPAL,
            self::PAYMENT_METHOD_TESTPAYMENT
        );
    }
}
