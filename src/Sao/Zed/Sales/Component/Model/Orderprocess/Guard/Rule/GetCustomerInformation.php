<?php

/**
 * 
 * @author otischlinger
 *
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_GetCustomerInformation extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_LEGACY_GET_USER_INFORMATION_SUCCESSFUL;
    }

    /**
     *
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @see ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if (isset($context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_GetUserInformation::GET_USER_INFORMATION_SUCCESSFUL])) {
            return $context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_GetUserInformation::GET_USER_INFORMATION_SUCCESSFUL];
        } else {
            return false;
        }
    }
}