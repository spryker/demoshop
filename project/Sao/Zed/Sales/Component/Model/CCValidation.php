<?php

class Sao_Zed_Sales_Component_Model_CCValidation implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param null|bool $jsCheckResult
     * @param null|bool $paymentProviderResult
     * @return int
     */
    public function saveCCValidationResult(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, $jsCheckResult = null, $paymentProviderResult = null)
    {
        $entityResult = Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery::create()->filterByOrder($orderEntity)->findOneOrCreate();
        if (!empty($jsCheckResult)) {
            $entityResult->setValidJs((bool)$jsCheckResult);
        }
        if (!empty($paymentProviderResult)) {
            $entityResult->setValidPaymentProvider((bool)$paymentProviderResult);
        }

        return $entityResult->save();
    }

}
