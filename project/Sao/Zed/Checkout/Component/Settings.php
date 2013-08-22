<?php

class Sao_Zed_Checkout_Component_Settings implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Checkout_Component_Factory
     */
    protected $factory;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param bool $fullCheck
     * @return array
     */
    public function getRuleStack(Sao_Shared_Sales_Transfer_Order $order, $fullCheck = true)
    {
        return array(
            $this->factory->getModelRulesGrandTotal($order),
            $this->factory->getModelRulesAllowedShippingCountry($order),
            $this->factory->getModelRulesQuotes($order, $fullCheck),
        );
    }

    /**
     * @return string
     */
    public function getDefaultWorkflowCheckout()
    {
       return Sao_Zed_Checkout_Component_Interface_WorkflowConstants::DEFAULT_WORKFLOW_CHECKOUT;
    }

}
