<?php
/**
 * @property Sao_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Capture extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Stripe_Component_Interface_StatemachineConstants,
    ProjectA_Zed_Stripe_Component_Dependency_Facade_Interface
{
    
    use ProjectA_Zed_Stripe_Component_Dependency_Facade_Trait;

    /**
     *
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     *
     * @param string $processName            
     */
    public function __construct($processName = 'Capture Process')
    {
        parent::__construct($processName);
    }

    /**
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_INIT_CAPTURE_PROCESS, self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_STRIPE_PAYMENT_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_INIT_CAPTURE_PROCESS, self::STATE_CLARIFY_CAPTURE_FAILED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_CAPTURED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_CAPTURE_FAILED, self::STATE_INIT_CAPTURE_PROCESS, self::EVENT_RETRY_CAPTURE);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_CAPTURE_FAILED, self::STATE_CAPTURED, self::EVENT_MARK_AS_CAPTURED);
    }

    protected function addCommands()
    {
        $captureCommand = $this->facadeStripe->getFacadeStateMachine()->getCommandCaptureGrandTotal();
        $this->setup->addCommand(self::STATE_INIT_CAPTURE_PROCESS, self::EVENT_ON_ENTER, $captureCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_CAPTURE_PROCESS,
            self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_CLARIFY_CAPTURE_FAILED,
            self::STATE_CAPTURED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
        
        $states = array(
            self::STATE_INIT_CAPTURE_PROCESS,
            self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_CAPTURED
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup = $this->getNewSetup();
        $states = $this->getStateNameList();
        foreach ($states as $stateName) {
            $setup->setReserved($stateName);
        }
        $states = array(
            self::STATE_CLARIFY_CAPTURE_FAILED
        );
        foreach ($states as $stateName) {
            $setup->addStateMetaInfo($stateName, self::FLAG_CLARIFY, true);
        }
    }
}
