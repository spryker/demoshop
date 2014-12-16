<?php

namespace Pyz\Zed\PaymentControl\Business;

use ProjectA\Zed\PaymentControl\Business\PaymentControlSettings as ProjectAPaymentControlSettings;

class PaymentControlSettings extends ProjectAPaymentControlSettings
{

    /**
     * @return \ProjectA_Zed_PaymentControl_Business_Model_Engine_PaymentMethodFilter[]
     */
    public function getPaymentMethodFilter()
    {
        return [];
    }

    /**
     * @return \ProjectA_Zed_PaymentControl_Business_Model_Attribute_Extractor[]
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

    /**
     * @return PaymentControlEngine
     */
    public function getEngine()
    {
        return $this->factoryPaymentControl->createModelEngineAllowAllMethods();
    }
}
