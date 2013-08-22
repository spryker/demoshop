<?php

class Sao_Zed_Checkout_Component_Model_Selector implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Checkout_Component_Factory
     */
    protected $factory;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param bool $fullCheck A fullCheck should request the shipping costs for all order items. During order save this
     * external should not be executed again.
     * @return bool
     */
    public function isManualCheckout(Sao_Shared_Sales_Transfer_Order $order, $fullCheck = true)
    {
        $rules = $this->factory->getSettings()->getRuleStack($order, $fullCheck);
        /* @var Sao_Zed_Checkout_Component_Interface_Rule $rule */
        foreach ($rules as $rule) {
            if (!$rule->match()) {
                return true;
            }
        }
        return false;
    }

}
