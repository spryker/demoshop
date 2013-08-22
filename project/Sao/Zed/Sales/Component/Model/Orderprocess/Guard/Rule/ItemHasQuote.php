<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ItemHasQuote
    extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule
    implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_ITEM_HAS_QUOTE;
    }

    /**
     * @param $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @see ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $orderItem->reload(true);
        return $orderItem->getQuotes()->count() > 0;
    }

}
