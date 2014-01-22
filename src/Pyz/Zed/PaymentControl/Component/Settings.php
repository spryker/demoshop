<?php
namespace Pyz\Zed\PaymentControl\Component;

use ProjectA\Zed\PaymentControl\Component\Settings as ProjectASettings;

class Settings extends ProjectASettings
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
     * @return array|\string[]
     */
    public function getAvailablePaymentMethods()
    {
        return [];
    }

}
