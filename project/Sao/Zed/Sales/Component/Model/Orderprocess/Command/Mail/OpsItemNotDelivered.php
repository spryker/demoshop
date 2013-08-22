<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsItemNotDelivered
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_Mail_Abstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{

    /**
     * @return string
     */
    public function getMailRepresentationName()
    {
        return Sao_Zed_Mail_Component_Model_Constants::ITEM_NOT_DELIVERED;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $mailTransfer = $this->facadeMail->getOpsItemNotDeliveredMailTransfer($orderItemEntity);
        $result = $this->facadeMail->sendMail($mailTransfer);
        $this->handleResponse($result, $mailTransfer, $orderItemEntity->getOrder());
    }

}