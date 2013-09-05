<?php

/**
 * @author jstick
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PrintFileCheckFailure extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_Mail_Abstract
    implements
        ProjectA_Zed_Sales_Component_Interface_OrderItemCommand,
        ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{

    /**
     * @return string
     */
    public function getMailRepresentationName()
    {
        return Sao_Zed_Mail_Component_Model_Constants::PRINT_FILE_CHECK_FAILURE;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $mailTransfer = $this->facadeMail->getPrintFileCheckFailureMailTransfer($orderItemEntity);
        $result = $this->facadeMail->sendMail($mailTransfer);
        $this->handleResponse($result, $mailTransfer, $orderItemEntity->getOrder());
    }

}