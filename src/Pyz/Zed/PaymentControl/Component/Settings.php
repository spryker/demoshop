<?php
namespace Pyz\Zed\PaymentControl\Component;

use ProjectA\Shared\DemoPayment\Code\PaymentProviderConstants as DemoPayment;
use ProjectA\Shared\Stripe\Code\PaymentProviderConstants as Stripe;
use Pyz\Shared\Payone\Code\PaymentProviderConstants as Paypal;
use ProjectA\Zed\PaymentControl\Component\Settings as BaseSettings;

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
            DemoPayment::METHOD_DEMOMETHOD,
            Stripe::METHOD_CREDIT_CARD,
            Paypal::METHOD_PAYPAL
        ];
    }
}
