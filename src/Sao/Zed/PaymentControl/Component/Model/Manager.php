<?php
/**
 * Class Sao_Zed_PaymentControl_Component_Model_Manager
 */
class Sao_Zed_PaymentControl_Component_Model_Manager extends ProjectA_Zed_PaymentControl_Component_Model_Manager
{
    /**
     * @return array
     */
    protected function getAvailablePaymentMethods()
    {
        return Sao_Shared_Library_PaymentMethods::getPaymentMethods();
    }
}