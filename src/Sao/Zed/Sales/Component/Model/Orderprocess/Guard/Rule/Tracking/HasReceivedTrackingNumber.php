<?php

/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedTrackingNumber extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     * @return string
     */
    public function getName()
    {
        return self::RULE_HAS_RECEIVED_TRACKING_NUMBER;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $quote = $this->facadeFulfillment->getQuoteByOrderItem($orderItem);
        if (!empty($quote) && $quote->getTrackings()->count() > 0) {
            return true;
        }
        return false;
    }
}
