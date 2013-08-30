<?php
/**
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_HasPayment extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $payment = $transferOrder->getPayment();
        if (!$payment) {
            $this->addError(Sao_Shared_Library_Messages::CHECKOUT_ERROR_PAYMENT_MISSING);
        }
    }
}
