<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Sales_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Sales_Component_Facade_Address
     */
    public function getFacadeAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Facade_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Facade_Command
     */
    public function getFacadeCommand()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Facade_Command');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Facade_Item
     */
    public function getFacadeItem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Facade_Item');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Facade_StateMachine
     */
    public function getFacadeStateMachine()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Facade_StateMachine');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Crud_Address
     */
    public function getGuiCrudAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Crud_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Crud_Comment
     */
    public function getGuiCrudComment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Crud_Comment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Crud_Order
     */
    public function getGuiCrudOrder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Crud_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_Form_OrderAddress
     */
    public function getGuiFormOrderAddress($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Form_OrderAddress');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_Form_OrderComment
     */
    public function getGuiFormOrderComment($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Form_OrderComment');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_Form_OrderEmail
     */
    public function getGuiFormOrderEmail($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Form_OrderEmail');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $transactionTypeOptions
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_Form_TransactionPayone
     */
    public function getGuiFormTransactionPayone($transactionTypeOptions, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Form_TransactionPayone');
        $model = new $class($transactionTypeOptions, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_Grid_ItemStatusHistory
     */
    public function getGuiGridItemStatusHistory($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Grid_ItemStatusHistory');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Html_Helper
     */
    public function getGuiHtmlHelper()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Html_Helper');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Html_ProcessDetails
     */
    public function getGuiHtmlProcessDetails()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Html_ProcessDetails');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Html_StateMachineOverview
     */
    public function getGuiHtmlStateMachineOverview()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Html_StateMachineOverview');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Gui_Html_StatusItemOverview
     */
    public function getGuiHtmlStatusItemOverview()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_Html_StatusItemOverview');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $statusId
     * @param mixed $processId (optional) default: null
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Sales_Component_Gui_OrdersGridByStatus
     */
    public function getGuiOrdersGridByStatus($statusId, $processId = null, $config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Gui_OrdersGridByStatus');
        $model = new $class($statusId, $processId, $config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Address_History
     */
    public function getModelAddressHistory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Address_History');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Address
     */
    public function getModelAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Address');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Comment
     */
    public function getModelComment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Comment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Expense
     */
    public function getModelExpense()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Expense');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_History
     */
    public function getModelHistory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_History');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_IdentifierGenerator
     */
    public function getModelIdentifierGenerator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_IdentifierGenerator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Item
     */
    public function getModelItem()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Item');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Order
     */
    public function getModelOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Zend_View $view
     * @return Sao_Zed_Sales_Component_Model_OrderDetails
     */
    public function getModelOrderDetails(Zend_View $view)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_OrderDetails');
        $model = new $class($view);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_OrderNote
     */
    public function getModelOrderNote()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_OrderNote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_CreateInvoice
     */
    public function getModelOrderprocessCommandCreateInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_CreateInvoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_CreateReverseInvoice
     */
    public function getModelOrderprocessCommandCreateReverseInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Command_CreateReverseInvoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Context_Collection
     */
    public function getModelOrderprocessContextCollection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Context_Collection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $orderItems
     * @param ProjectA_Zed_Library_StateMachine_Definition_Factory $factory
     * @param ProjectA_Zed_Library_StateMachine_CurrentState $currentState
     * @param mixed $metaInfoConditionMap
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfo
     */
    public function getModelOrderprocessFilterMetaInfo(Iterator $orderItems, ProjectA_Zed_Library_StateMachine_Definition_Factory $factory, ProjectA_Zed_Library_StateMachine_CurrentState $currentState, $metaInfoConditionMap)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfo');
        $model = new $class($orderItems, $factory, $currentState, $metaInfoConditionMap);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $orderItems
     * @param ProjectA_Zed_Library_StateMachine_Definition_Factory $factory
     * @param ProjectA_Zed_Library_StateMachine_CurrentState $currentState
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_ReservedItems
     */
    public function getModelOrderprocessFilterReservedItems(Iterator $orderItems, ProjectA_Zed_Library_StateMachine_Definition_Factory $factory, ProjectA_Zed_Library_StateMachine_CurrentState $currentState)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_ReservedItems');
        $model = new $class($orderItems, $factory, $currentState);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Finder
     */
    public function getModelOrderprocessFinder()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Finder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Data
     */
    public function getModelOrderprocessInfoData()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Data');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Detail
     */
    public function getModelOrderprocessInfoDetail()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Detail');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $knownRules
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Graph_Condition
     */
    public function getModelOrderprocessInfoGraphCondition($knownRules)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Graph_Condition');
        $model = new $class($knownRules);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Graph
     */
    public function getModelOrderprocessInfoGraph()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_Info_Graph');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_ActivityLog
     */
    public function getModelOrderprocessStateMachineActivityLog()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_ActivityLog');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_CurrentState
     */
    public function getModelOrderprocessStateMachineCurrentState()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_CurrentState');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $eventName
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Dispatcher
     */
    public function getModelOrderprocessStateMachineDispatcher($eventName)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Dispatcher');
        $model = new $class($eventName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Library_StateMachine_Definition_Container $definitions
     * @param ProjectA_Zed_Library_StateMachine_Definition_Matcher $matcher
     * @param ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook $hook
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Factory
     */
    public function getModelOrderprocessStateMachineFactory(ProjectA_Zed_Library_StateMachine_Definition_Container $definitions, ProjectA_Zed_Library_StateMachine_Definition_Matcher $matcher, ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook $hook)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Factory');
        $model = new $class($definitions, $matcher, $hook);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_IsCodeRefundable
     */
    public function getModelOrderprocessStateMachineGuardRuleIsCodeRefundable()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_IsCodeRefundable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_IsInvoiceCreationPossible
     */
    public function getModelOrderprocessStateMachineGuardRuleIsInvoiceCreationPossible()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_IsInvoiceCreationPossible');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_OrderUsedCode
     */
    public function getModelOrderprocessStateMachineGuardRuleOrderUsedCode()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule_OrderUsedCode');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule
     */
    public function getModelOrderprocessStateMachineGuardRule()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Timeout
     */
    public function getModelOrderprocessStateMachineGuardTimeout()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Timeout');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher_Order
     */
    public function getModelOrderprocessStateMachineMatcherOrder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher_OrderItem
     */
    public function getModelOrderprocessStateMachineMatcherOrderItem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher_OrderItem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher
     */
    public function getModelOrderprocessStateMachineMatcher()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Matcher');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Observer
     */
    public function getModelOrderprocessStateMachineObserver()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Observer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Library_StateMachine_Definition $definition
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    public function getModelOrderprocessStateMachineSetup(ProjectA_Zed_Library_StateMachine_Definition $definition)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup');
        $model = new $class($definition);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Factory
     * $stateMachineFactory
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerEvent
     */
    public function getModelOrderprocessStateMachineTriggerEvent(ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Factory $stateMachineFactory)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerEvent');
        $model = new $class($stateMachineFactory);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Zend_Queue_Message $message
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Browser_Decorator
     */
    public function getModelOrderprocessStateMachineTriggerQueueBrowserDecorator(Zend_Queue_Message $message)
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Browser_Decorator');
        $model = new $class($message);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Browser
     */
    public function getModelOrderprocessStateMachineTriggerQueueBrowser()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Browser');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Processor
     */
    public function getModelOrderprocessStateMachineTriggerQueueProcessor()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue_Processor');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue
     */
    public function getModelOrderprocessStateMachineTriggerQueue()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_TriggerQueue');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_Orderprocess
     */
    public function getModelOrderprocess()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_Orderprocess');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Sales_Component_Model_ProcessSwitcher
     */
    public function getModelProcessSwitcher()
    {
        $class = $this->transformClassName('ProjectA_Zed_Sales_Component_Model_ProcessSwitcher');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Gui_Html_FlaggedStatusItemOverview
     */
    public function getGuiHtmlFlaggedStatusItemOverview()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Gui_Html_FlaggedStatusItemOverview');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_CCValidation
     */
    public function getModelCCValidation()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_CCValidation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Communication_Sns_NewOrder
     */
    public function getModelCommunicationSnsNewOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Sns_NewOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Communication_Sns_PayoutNote
     */
    public function getModelCommunicationSnsPayoutNote()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Sns_PayoutNote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtist
     */
    public function getModelCommunicationWebserviceBlockArtist(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtist');
        $model = new $class($orderItemEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param mixed $availability
     * @return Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtwork
     */
    public function getModelCommunicationWebserviceBlockArtwork(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $availability)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtwork');
        $model = new $class($orderItemEntity, $availability);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $userId (optional) default: null
     * @return
     * Sao_Zed_Sales_Component_Model_Communication_Webservice_CustomerInformation
     */
    public function getModelCommunicationWebserviceCustomerInformation($userId = null)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Webservice_CustomerInformation');
        $model = new $class($userId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemCanceled
     */
    public function getModelCommunicationWebserviceItemCanceled(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemCanceled');
        $model = new $class($orderItemEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemPaid
     */
    public function getModelCommunicationWebserviceItemPaid(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemPaid');
        $model = new $class($orderItemEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_AppointShipping
     */
    public function getModelOrderprocessCommandAppointShipping()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_AppointShipping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_GetUserInformation
     */
    public function getModelOrderprocessCommandArtPortalGetUserInformation()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_GetUserInformation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_RemoveSalesNotification
     */
    public function getModelOrderprocessCommandArtPortalRemoveSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_RemoveSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_SendSalesNotification
     */
    public function getModelOrderprocessCommandArtPortalSendSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_SendSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_BlockArtist
     */
    public function getModelOrderprocessCommandBlockArtist()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_BlockArtist');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_BlockArtwork
     */
    public function getModelOrderprocessCommandBlockArtwork()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_BlockArtwork');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_ClearAbandonedMailRelatedItems
     */
    public function getModelOrderprocessCommandClearAbandonedMailRelatedItems()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_ClearAbandonedMailRelatedItems');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_CreatePackingSlip
     */
    public function getModelOrderprocessCommandCreatePackingSlip()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_CreatePackingSlip');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_FetchFulfillmentCosts
     */
    public function getModelOrderprocessCommandFetchFulfillmentCosts()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_FetchFulfillmentCosts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_AccountingAwaitingRefund
     */
    public function getModelOrderprocessCommandMailAccountingAwaitingRefund()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_AccountingAwaitingRefund');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ArtistSalesNotificationManufactured
     */
    public function getModelOrderprocessCommandMailArtistSalesNotificationManufactured()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ArtistSalesNotificationManufactured');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ArtistSalesNotificationMarketplace
     */
    public function getModelOrderprocessCommandMailArtistSalesNotificationMarketplace()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ArtistSalesNotificationMarketplace');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_BlockArtist
     */
    public function getModelOrderprocessCommandMailBlockArtist()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_BlockArtist');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ConfirmArtworkAvailability
     */
    public function getModelOrderprocessCommandMailConfirmArtworkAvailability()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ConfirmArtworkAvailability');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_FirstArtistArtworkAvailabilityReminder
     */
    public function getModelOrderprocessCommandMailFirstArtistArtworkAvailabilityReminder()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_FirstArtistArtworkAvailabilityReminder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_FirstPrintFileUploadNotification
     */
    public function getModelOrderprocessCommandMailFirstPrintFileUploadNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_FirstPrintFileUploadNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsClarifyArtworkAvailability
     */
    public function getModelOrderprocessCommandMailOpsClarifyArtworkAvailability()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsClarifyArtworkAvailability');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsClarifyHandpicked
     */
    public function getModelOrderprocessCommandMailOpsClarifyHandpicked()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsClarifyHandpicked');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsItemNotDelivered
     */
    public function getModelOrderprocessCommandMailOpsItemNotDelivered()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsItemNotDelivered');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsManualProcess
     */
    public function getModelOrderprocessCommandMailOpsManualProcess()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OpsManualProcess');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OrderConfirmation
     */
    public function getModelOrderprocessCommandMailOrderConfirmation()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_OrderConfirmation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PayoutRequestPossible
     */
    public function getModelOrderprocessCommandMailPayoutRequestPossible()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PayoutRequestPossible');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PreShippingInfoOriginal
     */
    public function getModelOrderprocessCommandMailPreShippingInfoOriginal()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PreShippingInfoOriginal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PrintFileCheckFailure
     */
    public function getModelOrderprocessCommandMailPrintFileCheckFailure()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_PrintFileCheckFailure');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SecondArtistArtworkAvailabilityReminder
     */
    public function getModelOrderprocessCommandMailSecondArtistArtworkAvailabilityReminder()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SecondArtistArtworkAvailabilityReminder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SecondPrintFileUploadNotification
     */
    public function getModelOrderprocessCommandMailSecondPrintFileUploadNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SecondPrintFileUploadNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SendTrackingInfoToCustomer
     */
    public function getModelOrderprocessCommandMailSendTrackingInfoToCustomer()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_SendTrackingInfoToCustomer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ShippingInfoOriginal
     */
    public function getModelOrderprocessCommandMailShippingInfoOriginal()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ShippingInfoOriginal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ShippingInfoPrint
     */
    public function getModelOrderprocessCommandMailShippingInfoPrint()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Mail_ShippingInfoPrint');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkAsInvalid
     */
    public function getModelOrderprocessCommandMarkAsInvalid()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkAsInvalid');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkProductNotAvailable
     */
    public function getModelOrderprocessCommandMarkProductNotAvailable()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkProductNotAvailable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_Payment_SetCCisValid
     */
    public function getModelOrderprocessCommandPaymentSetCCisValid()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_Payment_SetCCisValid');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_ResetItemSalesNotification
     */
    public function getModelOrderprocessCommandResetItemSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_ResetItemSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_SendPayoutToSns
     */
    public function getModelOrderprocessCommandSendPayoutToSns()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_SendPayoutToSns');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Command_SetItemSalesNotification
     */
    public function getModelOrderprocessCommandSetItemSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_SetItemSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Command_UnblockArtwork
     */
    public function getModelOrderprocessCommandUnblockArtwork()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Command_UnblockArtwork');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'creditcard-manufactured'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_Creditcard_Manufactured
     */
    public function getModelOrderprocessDefinitionCreditcardManufactured($processName = 'creditcard-manufactured')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_Creditcard_Manufactured');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'creditcard-marketplace'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_Creditcard_Marketplace
     */
    public function getModelOrderprocessDefinitionCreditcardMarketplace($processName = 'creditcard-marketplace')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_Creditcard_Marketplace');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'manual-manufactured'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_ManualManufactured
     */
    public function getModelOrderprocessDefinitionManualManufactured($processName = 'manual-manufactured')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_ManualManufactured');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'manual-marketplace'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_ManualMarketplace
     */
    public function getModelOrderprocessDefinitionManualMarketplace($processName = 'manual-marketplace')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_ManualMarketplace');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'paypal-manufactured'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_PayPal_Manufactured
     */
    public function getModelOrderprocessDefinitionPayPalManufactured($processName = 'paypal-manufactured')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_PayPal_Manufactured');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'paypal-marketplace'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_PayPal_Marketplace
     */
    public function getModelOrderprocessDefinitionPayPalMarketplace($processName = 'paypal-marketplace')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_PayPal_Marketplace');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Artwork Availability Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ArtworkAvailability
     */
    public function getModelOrderprocessDefinitionSubProcessArtworkAvailability($processName = 'Artwork Availability Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ArtworkAvailability');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Cancellation Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Cancellation
     */
    public function getModelOrderprocessDefinitionSubProcessCancellation($processName = 'Cancellation Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Cancellation');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Cancellation with Refund
     * Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_CancellationWithRefund
     */
    public function getModelOrderprocessDefinitionSubProcessCancellationWithRefund($processName = 'Cancellation with Refund Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_CancellationWithRefund');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Capture Process'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Capture
     */
    public function getModelOrderprocessDefinitionSubProcessCapture($processName = 'Capture Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Capture');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'creditcard'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Creditcard
     */
    public function getModelOrderprocessDefinitionSubProcessCreditcard($processName = 'creditcard')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Creditcard');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Shipment and Delivery Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Delivery
     */
    public function getModelOrderprocessDefinitionSubProcessDelivery($processName = 'Shipment and Delivery Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Delivery');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Get Legacy User Information'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_GetLegacyUserInformation
     */
    public function getModelOrderprocessDefinitionSubProcessGetLegacyUserInformation($processName = 'Get Legacy User Information')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_GetLegacyUserInformation');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Handpicked Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Handpicked
     */
    public function getModelOrderprocessDefinitionSubProcessHandpicked($processName = 'Handpicked Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Handpicked');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'original product'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_OriginalProduct
     */
    public function getModelOrderprocessDefinitionSubProcessOriginalProduct($processName = 'original product')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_OriginalProduct');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Payout Process'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Payout
     */
    public function getModelOrderprocessDefinitionSubProcessPayout($processName = 'Payout Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Payout');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'paypal'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PayPal
     */
    public function getModelOrderprocessDefinitionSubProcessPayPal($processName = 'paypal')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PayPal');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Printer Export Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrinterExport
     */
    public function getModelOrderprocessDefinitionSubProcessPrinterExport($processName = 'Printer Export Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrinterExport');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Print File Check Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintFileCheck
     */
    public function getModelOrderprocessDefinitionSubProcessPrintFileCheck($processName = 'Print File Check Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintFileCheck');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'print product'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintProduct
     */
    public function getModelOrderprocessDefinitionSubProcessPrintProduct($processName = 'print product')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintProduct');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Product Type Switch'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ProductTypeSwitch
     */
    public function getModelOrderprocessDefinitionSubProcessProductTypeSwitch($processName = 'Product Type Switch')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ProductTypeSwitch');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Refund Process'
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Refund
     */
    public function getModelOrderprocessDefinitionSubProcessRefund($processName = 'Refund Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Refund');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Repeat Quote Call'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_RepeatQuoteCall
     */
    public function getModelOrderprocessDefinitionSubProcessRepeatQuoteCall($processName = 'Repeat Quote Call')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_RepeatQuoteCall');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Send Order Confirmation Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_SendOrderConfirmation
     */
    public function getModelOrderprocessDefinitionSubProcessSendOrderConfirmation($processName = 'Send Order Confirmation Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_SendOrderConfirmation');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $processName (optional) default: 'Stock Update Process'
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_StockUpdate
     */
    public function getModelOrderprocessDefinitionSubProcessStockUpdate($processName = 'Stock Update Process')
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_StockUpdate');
        $model = new $class($processName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer
     */
    public function getModelOrderprocessDefinitionContainer()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $orderItems
     * @param ProjectA_Zed_Library_StateMachine_Definition_Factory $factory
     * @param ProjectA_Zed_Library_StateMachine_CurrentState $currentState
     * @param mixed $metaInfoConditionMap
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfoNot
     */
    public function getModelOrderprocessFilterMetaInfoNot(Iterator $orderItems, ProjectA_Zed_Library_StateMachine_Definition_Factory $factory, ProjectA_Zed_Library_StateMachine_CurrentState $currentState, $metaInfoConditionMap)
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfoNot');
        $model = new $class($orderItems, $factory, $currentState, $metaInfoConditionMap);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Finder_Status
     */
    public function getModelOrderprocessFinderStatus()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Finder_Status');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_AllItemsOfQuotePrintable
     */
    public function getModelOrderprocessGuardRuleAllItemsOfQuotePrintable()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_AllItemsOfQuotePrintable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ExportSuccessful
     */
    public function getModelOrderprocessGuardRuleExportSuccessful()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ExportSuccessful');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_GetCustomerInformation
     */
    public function getModelOrderprocessGuardRuleGetCustomerInformation()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_GetCustomerInformation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsArtworkAvailable
     */
    public function getModelOrderprocessGuardRuleIsArtworkAvailable()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsArtworkAvailable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsArtworkBlockNeeded
     */
    public function getModelOrderprocessGuardRuleIsArtworkBlockNeeded()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsArtworkBlockNeeded');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsMarkedForRefund
     */
    public function getModelOrderprocessGuardRuleIsMarkedForRefund()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsMarkedForRefund');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsNationalShipment
     */
    public function getModelOrderprocessGuardRuleIsNationalShipment()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_IsNationalShipment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ItemHasQuote
     */
    public function getModelOrderprocessGuardRuleItemHasQuote()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ItemHasQuote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ItemPriceGreaterThan1500
     */
    public function getModelOrderprocessGuardRuleItemPriceGreaterThan1500()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_ItemPriceGreaterThan1500');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_LessThanThirtyUniqueItems
     */
    public function getModelOrderprocessGuardRuleLessThanThirtyUniqueItems()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_LessThanThirtyUniqueItems');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_PaymentTransactionApproved
     */
    public function getModelOrderprocessGuardRulePaymentTransactionApproved()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_PaymentTransactionApproved');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_PrintFileApproved
     */
    public function getModelOrderprocessGuardRulePrintFileApproved()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_PrintFileApproved');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsLimitedEdition
     */
    public function getModelOrderprocessGuardRuleProductIsLimitedEdition()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsLimitedEdition');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsOriginal
     */
    public function getModelOrderprocessGuardRuleProductIsOriginal()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsOriginal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsPrint
     */
    public function getModelOrderprocessGuardRuleProductIsPrint()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Product_IsPrint');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_RemoveSalesNotification
     */
    public function getModelOrderprocessGuardRuleRemoveSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_RemoveSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_SendSalesNotification
     */
    public function getModelOrderprocessGuardRuleSendSalesNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_SendSalesNotification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedBookInfo
     */
    public function getModelOrderprocessGuardRuleTrackingHasReceivedBookInfo()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedBookInfo');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedDeliveryInfo
     */
    public function getModelOrderprocessGuardRuleTrackingHasReceivedDeliveryInfo()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedDeliveryInfo');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedPickupInfo
     */
    public function getModelOrderprocessGuardRuleTrackingHasReceivedPickupInfo()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedPickupInfo');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedTrackingNumber
     */
    public function getModelOrderprocessGuardRuleTrackingHasReceivedTrackingNumber()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedTrackingNumber');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_WatchdogObserver
     */
    public function getModelOrderprocessStateMachineWatchdogObserver()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_WatchdogObserver');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Sales_Component_Model_Orderprocess_StateMachineFactoryHook
     */
    public function getModelOrderprocessStateMachineFactoryHook()
    {
        $class = $this->transformClassName('Sao_Zed_Sales_Component_Model_Orderprocess_StateMachineFactoryHook');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
