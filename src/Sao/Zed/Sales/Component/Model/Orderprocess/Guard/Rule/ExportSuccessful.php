<?php

/**
 * 
 * @author otischlinger
 *
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ExportSuccessful extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_EXPORT_SUCCESSFUL;
    }

    /**
     *
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem            
     * @param ProjectA_Zed_Library_StateMachine_Context $context            
     * @see ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if (isset($context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_AppointShipping::WAS_SEND_SUCCESSFULLY])) {
            return $context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_AppointShipping::WAS_SEND_SUCCESSFULLY];
        } else {
            return false;
        }
    }
}