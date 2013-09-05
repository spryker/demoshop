<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_ManualManufactured extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_MANUAL_MANUFACTURED)
    {
        parent::__construct($processName, false);
    }

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
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_FETCHED_LEGACY_USER_INFORMATION, self::STATE_CLARIFY_ADDRESSES, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_QUOTE_CALL_SUCCESSFULLY_REPEATED, self::STATE_WAITING_FOR_PAYMENT, self::EVENT_ON_ENTER);
    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessGetLegacyUserInformation());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessRepeatQuoteCall());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPrintProduct());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessCancellation());
    }

    protected function addCommands()
    {
        $operationsMailCommand = $this->factory->getModelOrderprocessCommandMailOpsManualProcess();
        $this->setup->addCommand(self::STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT, self::EVENT_ON_ENTER, $operationsMailCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_NEW,
            self::STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-Start');
        }

        $this->setup->addStateMetaInfo(self::STATE_WAITING_FOR_PAYMENT, 'group', 'Waiting for Payment');

        $states = array(
            self::STATE_NEW,
            self::STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT,
            self::STATE_CLARIFY_ADDRESSES,
            self::STATE_QUOTE_CALL_SUCCESSFULLY_REPEATED,
            self::STATE_WAITING_FOR_PAYMENT,
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup = $this->getNewSetup();

        $states = array(
            self::STATE_WAITING_FOR_PAYMENT
        );
        foreach ($states as $state) {
            $setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }

    protected function addSubProcessConnections()
    {
        $this->setup->setTimeout(self::STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT, self::STATE_LEGACY_GET_USER_INFORMATION, '10 seconds');
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_PAYMENT, self::STATE_INIT_STOCK_UPDATE, self::EVENT_START_FULFILLMENT);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_PAYMENT, self::STATE_INIT_CANCELLATION_PROCESS, self::EVENT_CANCEL);
    }
}
