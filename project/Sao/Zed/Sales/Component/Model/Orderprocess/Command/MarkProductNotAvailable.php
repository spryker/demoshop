<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkProductNotAvailable extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{
    /**
     *
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $entity = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterBySalesOrderItem($orderItemEntity)
            ->findOneOrCreate();

        $entity->setSalesOrderItem($orderItemEntity);
        $entity->setHash(md5('sm' . microtime()));
        $entity->setEvent(Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_ARTWORK_IS_AVAILABLE);
        $entity->setEventTriggered(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED_TRUE);
        $entity->setStatus(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED);
        $entity->save();
    }
}
