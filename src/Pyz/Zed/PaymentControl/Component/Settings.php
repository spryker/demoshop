<?php
namespace Pyz\Zed\PaymentControl\Component;

use ProjectA\Zed\PaymentControl\Component\Settings as BaseSettings;
use ProjectA\Zed\Payone\Component\Model\Api\ApiConstants as PayoneConstants;

class Settings extends BaseSettings
{
    /**
     * @return \ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter[]
     */
    public function getPaymentMethodFilter()
    {
        return [];
    }

    /**
     * @return \ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor[]
     */
    public function getAttributeExtractors()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAvailablePaymentMethods()
    {
        return [
            PayoneConstants::PAYMENT_METHOD_CREDITCARD,
            PayoneConstants::PAYMENT_METHOD_PREPAYMENT,
            PayoneConstants::PAYMENT_METHOD_INVOICE,
            PayoneConstants::PAYMENT_METHOD_DIRECT_DEBIT,
            PayoneConstants::PAYMENT_METHOD_PAYPAL_EXPRESS
        ];
    }
}
