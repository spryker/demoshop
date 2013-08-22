<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsOriginal
    extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule
    implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_IS_ORIGINAL_PRODUCT;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     *  @see ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        //FIXME FIXME FIXME
        return true;
    }

}