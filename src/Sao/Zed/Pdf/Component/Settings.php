<?php

/**
 * @author Vladislav Ciobanu
 */
class Sao_Zed_Pdf_Component_Settings implements ProjectA_Zed_Library_Component_Interface_SettingsInterface
{
    const PAYMENT_METHOD_DEBIT = 'debit';

    const PAYMENT_METHOD_INVOICE = 'invoice';

    /**
     * @return array
     */
    public function getAllowedPaymentMethodsFor2PR()
    {
        return array(static::PAYMENT_METHOD_DEBIT, static::PAYMENT_METHOD_INVOICE);
    }
}