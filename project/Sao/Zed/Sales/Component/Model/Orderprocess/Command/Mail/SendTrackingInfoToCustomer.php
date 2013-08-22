<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SendTrackingInfoToCustomer
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_Mail_Abstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderCommand, ProjectA_Zed_Mail_Component_Dependency_Facade_Interface
{

    /**
     * @return string
     */
    public function getMailRepresentationName()
    {
        return 'tracking info to customer';
    }

    /**
     * @param Pac_Payment_Interface_Method $paymentMethod
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     * @return null
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        /*
        $mailTransfer = $this->facadeMail->getXXX($orderEntity, $context);
        $result = $this->mailFacade->sendMail($mailTransfer);
        $this->handleResponse($result, $mailTransfer, $orderEntity);
        */
        $this->addNote('tracking info to customer - implementation missing!', $orderEntity, false);
    }

}