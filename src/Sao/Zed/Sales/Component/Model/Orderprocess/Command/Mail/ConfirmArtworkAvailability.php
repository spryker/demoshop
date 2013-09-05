<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ConfirmArtworkAvailability
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_Mail_Abstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderItemCommand, ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{

    /**
     * @return string
     */
    public function getMailRepresentationName()
    {
        return Sao_Zed_Mail_Component_Model_Constants::CONFIRM_ARTWORK_AVAILABILTY;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $mailTransfer = $this->facadeMail->getConfirmArtworkAvailabilityMailTransfer($orderItemEntity);
        $result = $this->facadeMail->sendMail($mailTransfer);
        $this->handleResponse($result, $mailTransfer, $orderItemEntity->getOrder());
    }

}