<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_RemoveSalesNotification extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{

    const WAS_REMOVED_SUCCESSFULLY = 'was removed from legacy successfully';

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if ($orderItemEntity->getOrder()->getIsTest()) {
            $context[self::WAS_REMOVED_SUCCESSFULLY] = true;
            $this->addNote('WOULD cancel sales notification to art portal', $orderItemEntity->getOrder(), true);
            return;
        }
        /* @var $result Sao_Shared_Legacy_Transfer_Response_Legacy */
        $result = $this->facadeSales->cancelSalesNotification($orderItemEntity);
        if ($result->getSuccess()) {
            $context[self::WAS_REMOVED_SUCCESSFULLY] = true;
            $this->addNote('cancel sales notification to art portal', $orderItemEntity->getOrder(), $result->getSuccess());
        } else {
            $this->addNote('cancel sales notification to art portal failed', $orderItemEntity->getOrder(), $result->getSuccess());
        }
    }
}
