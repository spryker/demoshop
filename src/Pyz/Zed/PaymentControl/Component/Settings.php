<?php
namespace Pyz\Zed\PaymentControl\Component;

use ProjectA\Shared\DemoPayment\Code\PaymentProviderConstants;
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
            PaymentProviderConstants::METHOD_DEMOMETHOD
        ];
    }

}
