<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_ValidatePaymentResult extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract
{

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        /* @var $paymentResponse ProjectA_Zed_Payment_Component_Interface_Response */
        $paymentResponse = $context->getPaymentResponse();
        if (!isset($paymentResponse) || !$paymentResponse->isSuccess()) {
            $this->addError(ProjectA_Shared_Library_Messages::CHECKOUT_ERROR_PAYMENT_FAILED);
            if (isset($paymentResponse)) {
                $this->addError($paymentResponse->getErrorMessageInternal());
            }
        }
    }
}
