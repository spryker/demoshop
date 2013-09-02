<?php
/**
 * @property Generated_Zed_Checkout_Component_Factory $factory
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsManualCheckout extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        if ($this->factory->getModelSelector()->isManualCheckout($transferOrder, false)) {
            $this->addError(Sao_Shared_Library_Messages::CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_MANUAL_CHECKOUT);
        }
    }
}
