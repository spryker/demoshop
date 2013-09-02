<?php
/**
 * @author otischlinger
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Creditcard extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
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

    protected $adyenStateMachineFacade;

    /**
     *
     * @param string $processName
     */
    public function __construct($processName = 'creditcard')
    {
        parent::__construct($processName);
    }

    /**
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->setInitialState(self::STATE_NEW);

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addDefinitions();
        $this->addSubProcessConnections();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_NEW, self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_STRIPE_PAYMENT_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_NEW, self::STATE_INVALID, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::STATE_APPOINTED, self::EVENT_ON_ENTER);
    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessCapture());
    }

    protected function addCommands()
    {
        $stripeChargeCommand = $this->facadeStripe->getFacadeStateMachine()->getCommandChargeGrandTotal();
        $this->setup->addCommand(self::STATE_NEW, self::EVENT_ON_ENTER, $stripeChargeCommand);

        $adyenSetCCValid = $this->factory->getModelOrderprocessCommandPaymentSetCCisValid();
        $this->setup->addCommand(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::EVENT_ON_ENTER, $adyenSetCCValid);

        $this->setup->addCommand(self::STATE_INVALID, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandMarkAsInvalid());

        $clearAbandonedCommand = $this->factory->getModelOrderprocessCommandClearAbandonedMailRelatedItems();
        $this->setup->addCommand(self::STATE_APPOINTED, self::EVENT_ON_ENTER, $clearAbandonedCommand);

    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_NEW,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT,
            self::STATE_INVALID,
            self::STATE_APPOINTED,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-Start');
        }

        $states = array(
            self::STATE_CLOSED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-End');
        }

        $states = array(
            self::STATE_NEW,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT,
            self::STATE_APPOINTED,
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup = $this->getNewSetup();
        $states = array(
            self::STATE_NEW,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT,
            self::STATE_APPOINTED,
            self::STATE_LEGACY_GET_USER_INFORMATION
        );
        foreach ($states as $stateName) {
            $setup->setReserved($stateName);
        }

        $states = array(
            self::STATE_INVALID
        );
        foreach ($states as $state) {
            $setup->addStateMetaInfo($state, self::FLAG_HIDDEN_FROM_USER, true);
        }
    }

    protected function addSubProcessConnections()
    {
        $this->setup->addTransitionManual(self::STATE_CLARIFY_CAPTURE_FAILED, self::STATE_INIT_CANCELLATION_PROCESS, self::EVENT_CANCEL);
    }
}
