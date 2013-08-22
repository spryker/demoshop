<?php
/**
 * @property Sao_Zed_Checkout_Component_Factory $factory
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsNotManualCheckout extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        if ($transferOrder->getManualCheckoutForced()) {
            return;
        }

        if (!$this->factory->getModelSelector()->isManualCheckout($transferOrder, false)) {
            $this->addError(Sao_Shared_Library_Messages::CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_NOT_MANUAL_CHECKOUT);
        }
    }
}
