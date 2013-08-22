<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @property Sao_Zed_Checkout_Component_Factory $factory
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder_ManualCheckout extends ProjectA_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder
{
    /**
     * @return array
     */
    protected function getTasks()
    {
        return [
            $this->factory->getModelWorkflowTaskValidationIsNotManualCheckout(),
            //$this->factory->getModelWorkflowTaskSubscribeNewsletter(),
            $this->factory->getModelWorkflowTaskPropelBeginTransaction(),
            //$this->factory->getModelWorkflowTaskSaveCustomerIfNew(),
            //$this->factory->getModelWorkflowTaskPrepareBillingAddress(),
            //$this->factory->getModelWorkflowTaskPrepareShippingAddress(),
            $this->factory->getModelWorkflowTaskEnsureNewSalesOrderAddresses(),
            $this->factory->getModelWorkflowTaskAssignCountryToAddress(),
            $this->factory->getModelWorkflowTaskSaveOrder(),
            $this->factory->getModelWorkflowTaskLegacySaveOrder(),
            $this->factory->getModelWorkflowTaskAssignIdsToTransferObjects(),
            $this->factory->getModelWorkflowTaskFulfillmentSaveQuotes(),
            $this->factory->getModelWorkflowTaskPropelCommitTransaction(),
//            $this->factory->getModelWorkflowTaskValidationCreditCard(),
//            $this->factory->getModelWorkflowTaskStateMachineCreatePaymentContext(),
            $this->factory->getModelWorkflowTaskStateMachineStartStateMachine(),
//            $this->factory->getModelWorkflowTaskStateMachineValidatePaymentResult(),
//            $this->factory->getModelWorkflowTaskStateMachineSetPaymentRedirectUrl(),
            $this->factory->getModelWorkflowTaskCartClear()
        ];
    }

}
