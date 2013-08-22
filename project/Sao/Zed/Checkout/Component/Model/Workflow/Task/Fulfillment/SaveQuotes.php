<?php

class Sao_Zed_Checkout_Component_Model_Workflow_Task_Fulfillment_SaveQuotes extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract
    implements Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $this->facadeFulfillment->saveQuotesInTransferOrderToDatabase($transferOrder, $context->getOrderEntity());
    }

}
