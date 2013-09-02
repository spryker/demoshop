<?php

class Sao_Zed_Salesrule_Component_Model_Actions_PercentShipping extends ProjectA_Zed_Salesrule_Component_Model_Actions_PercentShipping
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /**
     * @see ProjectA_Zed_Salesrule_Component_Model_Actions_Abstract::getDiscount
     */
    protected function getDiscount($amount)
    {
        $discount = parent::getDiscount($amount);
        $this->factory->getModelSalesruleCostDistribution()->appendCostDistribution($this->salesrule, $discount);
        return $discount;
    }
}
