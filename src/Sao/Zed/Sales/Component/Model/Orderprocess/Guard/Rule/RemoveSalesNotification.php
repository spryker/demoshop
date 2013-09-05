<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_RemoveSalesNotification extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_REMOVE_SALES_NOTIFICATION_SUCCESSFUL;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if (isset($context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_RemoveSalesNotification::WAS_REMOVED_SUCCESSFULLY])) {
            return $context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_RemoveSalesNotification::WAS_REMOVED_SUCCESSFULLY];
        } else {
            return false;
        }
    }
}
