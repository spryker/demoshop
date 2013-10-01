<?php


class Pyz_Zed_Sales_Component_Model_Orderprocess_Definition_Demo
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements Pyz_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ()
    {
        parent::__construct('demo');
    }

    /**
     *
     */
    protected function createDefinition ()
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
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::EVENT_START_PAYMENT, self::RULE_PAYMENT_TRANSACTION_APPROVED);
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_INVALID, self::EVENT_START_PAYMENT);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_AUTHORISE_APPOINTMENT, self::STATE_APPOINTED, self::EVENT_PAYMENT_AUTHORISATION_APPOINTED);
    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubprocessShipment());
    }

    protected function addCommands()
    {
        $demoPaymentCommand = $this->factory->getModelOrderprocessCommandDemoPaymentAuthorise();
        $this->setup->addCommand(self::STATE_NEW, self::EVENT_START_PAYMENT, $demoPaymentCommand);
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
            $this->setup->addStateMetaInfo($state, 'group', $this->getName().'-Start');
        }

        $states = array(
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName().'-End');
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

    }

    protected function addSubProcessConnections()
    {
        $this->setup->addTransition(self::STATE_APPOINTED, self::STATE_INIT_SHIPMENT, self::EVENT_ON_ENTER);
    }
}
