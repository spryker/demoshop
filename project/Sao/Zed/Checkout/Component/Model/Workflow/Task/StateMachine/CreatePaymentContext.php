<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_CreatePaymentContext extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Payment_Component_Interface_Constants
{

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $context[self::PAYMENT_DATA_CONTEXT_KEY] = $transferOrder->getPayment();
    }
}
