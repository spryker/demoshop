<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Refund extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Refund Process')
    {
        parent::__construct($processName);
    }

    /**
     *
     */
    protected function createDefinition ()
    {
        $setup = $this->getNewSetup();

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_INIT_REFUND_PROCESS, self::STATE_AWAITING_REFUND);
        $this->setup->addTransitionManual(self::STATE_AWAITING_REFUND, self::STATE_REFUNDED, self::EVENT_MANUAL_REFUND);
    }

    protected function addCommands()
    {
        $sendEmailToAccountingCommand = $this->factory->getModelOrderprocessCommandMailAccountingAwaitingRefund();
        $this->setup->addCommand(self::STATE_AWAITING_REFUND, self::EVENT_ON_ENTER, $sendEmailToAccountingCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_REFUND_PROCESS,
            self::STATE_AWAITING_REFUND,
            self::STATE_REFUNDED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_AWAITING_REFUND,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }

}
