<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ResetItemSalesNotification extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{
    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $this->facadeSales->resetSalesOrderItemNotification(
            $orderItemEntity,
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED_FALSE,
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_UNKNOWN
        );
    }
}
