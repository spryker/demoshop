<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Legacy_SaveOrder extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    Sao_Zed_Legacy_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Legacy_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $this->facadeLegacy->outboundSaveOrder($transferOrder);
    }
}
