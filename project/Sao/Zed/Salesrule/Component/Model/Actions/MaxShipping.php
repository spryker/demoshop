<?php

class Sao_Zed_Salesrule_Component_Model_Actions_MaxShipping extends ProjectA_Zed_Salesrule_Component_Model_Actions_MaxShipping
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Salesrule_Component_Factory
     */
    protected $factory;

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