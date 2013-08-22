<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_SetItemSalesNotification
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $this->facadeSales->createSalesOrderItemNotification($orderItemEntity, Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_ARTWORK_IS_AVAILABLE);
    }

}