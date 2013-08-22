<?php
/**
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Cart_Clear extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $clearCart = true;
        if (isset($context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkAsInvalid::KEY_IS_INVALID])) {
            if ($context[Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkAsInvalid::KEY_IS_INVALID] === true) {
                $clearCart = false;
            }
        }
        $transferOrder->setClearSessionCart($clearCart);
    }
}
