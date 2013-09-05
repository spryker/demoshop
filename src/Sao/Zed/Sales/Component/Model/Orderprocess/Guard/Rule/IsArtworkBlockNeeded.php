<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsArtworkBlockNeeded extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_IS_ARTWORK_BLOCK_NEEDED;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $notification = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterBySalesOrderItem($orderItem)
            ->findOne();

        if ($notification && $notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED) {
            return true;
        } else {
            return false;
        }
    }
}
