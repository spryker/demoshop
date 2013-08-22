<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Checkout_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Checkout_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Checkout_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param array $array (optional) default: array()
     * @return ProjectA_Zed_Checkout_Component_Model_Workflow_Context
     */
    public function getModelWorkflowContext($array = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Context');
        $model = new $class($array);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder
     */
    public function getModelWorkflowDefinitionSaveOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder');
        $model = new $class($transferOrder);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_AssignCountryToAddress
     */
    public function getModelWorkflowTaskAssignCountryToAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_AssignCountryToAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_EnsureNewSalesOrderAddresses
     */
    public function getModelWorkflowTaskEnsureNewSalesOrderAddresses()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_EnsureNewSalesOrderAddresses');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_PrepareBillingAddress
     */
    public function getModelWorkflowTaskPrepareBillingAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_PrepareBillingAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_PrepareShippingAddress
     */
    public function getModelWorkflowTaskPrepareShippingAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_PrepareShippingAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Propel_BeginTransaction
     */
    public function getModelWorkflowTaskPropelBeginTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Propel_BeginTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Propel_CommitTransaction
     */
    public function getModelWorkflowTaskPropelCommitTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Propel_CommitTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Checkout_Component_Model_Workflow_Task_SaveCustomerIfNew
     */
    public function getModelWorkflowTaskSaveCustomerIfNew()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_SaveCustomerIfNew');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_SaveOrder
     */
    public function getModelWorkflowTaskSaveOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_SaveOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_CreatePaymentContext
     */
    public function getModelWorkflowTaskStateMachineCreatePaymentContext()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_CreatePaymentContext');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_SavePayment
     */
    public function getModelWorkflowTaskStateMachineSavePayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_SavePayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_SetPaymentRedirectUrl
     */
    public function getModelWorkflowTaskStateMachineSetPaymentRedirectUrl()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_SetPaymentRedirectUrl');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_StartStateMachine
     */
    public function getModelWorkflowTaskStateMachineStartStateMachine()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_StartStateMachine');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_ValidatePaymentResult
     */
    public function getModelWorkflowTaskStateMachineValidatePaymentResult()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_StateMachine_ValidatePaymentResult');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Checkout_Component_Model_Workflow_Task_SubscribeNewsletter
     */
    public function getModelWorkflowTaskSubscribeNewsletter()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_Task_SubscribeNewsletter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Checkout_Component_Model_Workflow_TaskInvoker
     */
    public function getModelWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA_Zed_Checkout_Component_Model_Workflow_TaskInvoker');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @return Sao_Zed_Checkout_Component_Model_Rules_AllowedShippingCountry
     */
    public function getModelRulesAllowedShippingCountry(Sao_Shared_Sales_Transfer_Order $order)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Rules_AllowedShippingCountry');
        $model = new $class($order);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @return Sao_Zed_Checkout_Component_Model_Rules_GrandTotal
     */
    public function getModelRulesGrandTotal(Sao_Shared_Sales_Transfer_Order $order)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Rules_GrandTotal');
        $model = new $class($order);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @param bool $executePreMatchAction (optional) default: true
     * @return Sao_Zed_Checkout_Component_Model_Rules_Quotes
     */
    public function getModelRulesQuotes(Sao_Shared_Sales_Transfer_Order $order, $executePreMatchAction = true)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Rules_Quotes');
        $model = new $class($order, $executePreMatchAction);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order 
     * @return Sao_Zed_Checkout_Component_Model_Rules_SubtotalWithoutItemExpenses
     */
    public function getModelRulesSubtotalWithoutItemExpenses(Sao_Shared_Sales_Transfer_Order $order)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Rules_SubtotalWithoutItemExpenses');
        $model = new $class($order);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Selector
     */
    public function getModelSelector()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Selector');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder_ManualCheckout
     */
    public function getModelWorkflowDefinitionSaveOrderManualCheckout(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Definition_SaveOrder_ManualCheckout');
        $model = new $class($transferOrder);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Dispatcher
     */
    public function getModelWorkflowDispatcher()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Dispatcher');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_AssignIdsToTransferObjects
     */
    public function getModelWorkflowTaskAssignIdsToTransferObjects()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_AssignIdsToTransferObjects');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Cart_Clear
     */
    public function getModelWorkflowTaskCartClear()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Cart_Clear');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Fulfillment_SaveQuotes
     */
    public function getModelWorkflowTaskFulfillmentSaveQuotes()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Fulfillment_SaveQuotes');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Legacy_SaveOrder
     */
    public function getModelWorkflowTaskLegacySaveOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Legacy_SaveOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_CheckStock
     */
    public function getModelWorkflowTaskValidationCheckStock()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_CheckStock');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_CreditCard
     */
    public function getModelWorkflowTaskValidationCreditCard()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_CreditCard');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_HasPayment
     */
    public function getModelWorkflowTaskValidationHasPayment()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_HasPayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsManualCheckout
     */
    public function getModelWorkflowTaskValidationIsManualCheckout()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsManualCheckout');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsNotManualCheckout
     */
    public function getModelWorkflowTaskValidationIsNotManualCheckout()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_IsNotManualCheckout');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Checkout_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Checkout_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
