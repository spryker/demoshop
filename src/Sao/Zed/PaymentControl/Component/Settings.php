<?php

class Sao_Zed_PaymentControl_Component_Settings extends ProjectA_Zed_PaymentControl_Component_Settings
{



    /**
     * @return array
     */
    public function getAttributeExtractors()
    {
        return array(
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_CartValue::ORDER_GRAND_TOTAL => $this->factory->getModelAttributeExtractorCartValue(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_Hour::CURRENT_HOUR => $this->factory->getModelAttributeExtractorHour(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailDomain::EMAIL_DOMAIN => $this->factory->getModelAttributeExtractorEmailDomain(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailTopLevelDomain::EMAIL_TOP_LEVEL_DOMAIN => $this->factory->getModelAttributeExtractorEmailTopLevelDomain(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_BillingSameAsShipping::BILLING_SAME_AS_SHIPPING => $this->factory->getModelAttributeExtractorBillingSameAsShipping(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_ShippingAddress::SHIPPING_ADDRESS => $this->factory->getModelAttributeExtractorShippingAddress(),
            ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_OperatingSystem::OPERATING_SYSTEM => $this->factory->getModelAttributeExtractorOperatingSystem()
        );
    }

    /**
     * @return array
     */
    public function getPaymentMethodFilter()
    {
        return array();
    }
}
