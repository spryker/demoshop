<?php
/**
 * @author otischlinger
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PayPal extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Adyen_Component_Interface_StatemachineConstants,
    ProjectA_Zed_Adyen_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Adyen_Component_Dependency_Facade_Trait;

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
    public function __construct($processName = 'paypal')
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
        $setup = $this->getNewSetup();
        $setup->addTransition(self::STATE_NEW, self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_ADYEN_PAYMENT_TRANSACTION_APPROVED);
        $setup->addTransition(self::STATE_NEW, self::STATE_INVALID, self::EVENT_ON_ENTER);
        $setup->addTransition(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::STATE_APPOINTED, self::EVENT_ADYEN_NOTIFICATION_AUTHORISATION_RECEIVED);
        $setup->setTimeout(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::STATE_INVALID, '3 hours');
    }

    protected function addDefinitions()
    {
    }

    protected function addCommands()
    {
        $command = $this->facadeAdyen->getFacadeStateMachine()->getCommandPaypalHpp();
        $this->setup->addCommand(self::STATE_NEW, self::EVENT_ON_ENTER, $command);

        $clearAbandonedCommand = $this->factory->getModelOrderprocessCommandClearAbandonedMailRelatedItems();
        $this->setup->addCommand(self::STATE_APPOINTED, self::EVENT_ON_ENTER, $clearAbandonedCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_NEW,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT,
            self::STATE_INVALID,
            self::STATE_APPOINTED
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
            self::STATE_APPOINTED
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup = $this->getNewSetup();
        $states = array(
            self::STATE_NEW,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT,
            self::STATE_APPOINTED
        );
        foreach ($states as $stateName) {
            $setup->setReserved($stateName);
        }

        // hide items from displaying in customer profile
        $states = array(
            self::STATE_INVALID,
            self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT
        );
        foreach ($states as $state) {
            $setup->addStateMetaInfo($state, self::FLAG_HIDDEN_FROM_USER, true);
        }
    }

    protected function addSubProcessConnections()
    {
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::STATE_INIT_CANCELLATION_PROCESS, self::EVENT_CANCEL);
    }
}
