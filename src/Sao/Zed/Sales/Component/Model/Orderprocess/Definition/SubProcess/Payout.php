<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Payout extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payout Process')
    {
        parent::__construct($processName);
    }

    /**
     *
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
        $this->setup->addTransition(self::STATE_INIT_PAYOUT_PROCESS, self::STATE_PAYOUT_PROCESS_FINISHED, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYOUT_PROCESS_FINISHED, self::STATE_CLOSED, self::EVENT_ON_ENTER);

    }

    protected function addCommands()
    {
        $this->setup->addCommand(
            self::STATE_INIT_PAYOUT_PROCESS,
            self::EVENT_ON_ENTER,
            $this->factory->getModelOrderprocessCommandSendPayoutToSns()
        );
        $this->setup->addCommand(
            self::STATE_INIT_PAYOUT_PROCESS,
            self::EVENT_ON_ENTER,
            $this->factory->getModelOrderprocessCommandMailPayoutRequestPossible()
        );
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_PAYOUT_PROCESS,
            self::STATE_PAYOUT_PROCESS_FINISHED,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $states = array(
            self::STATE_INIT_PAYOUT_PROCESS,
            self::STATE_PAYOUT_PROCESS_FINISHED,
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {

    }
}
