<?php
/**
 * @property Sao_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Handpicked extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Handpicked Process')
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
        $this->setup->addTransitionManual(self::STATE_CLARIFY_HANDPICKED, self::STATE_INIT_PAYOUT_PROCESS, self::EVENT_LEAVE_HANDPICKED_PROCESS);
        $this->setup->addTransition(self::STATE_INIT_HANDPICKED_PROCESS, self::STATE_CANCELLATION_NO_HANDPICKED, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_INIT_HANDPICKED_PROCESS, self::STATE_CLARIFY_HANDPICKED, self::EVENT_ON_ENTER, self::RULE_ITEM_PRICE_GREATER_THAN_1500);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_HANDPICKED, self::STATE_SET_SALES_NOTIFICATION, self::EVENT_MANUAL_RE_INIT_ARTWORK_AVAILABILITY);
    }

    protected function addCommands()
    {
        $clarifyHandpickedMailCommand = $this->factory->getModelOrderprocessCommandMailOpsClarifyHandpicked();
        $this->setup->addCommand(self::STATE_CLARIFY_HANDPICKED, self::EVENT_ON_ENTER, $clarifyHandpickedMailCommand);

        $resetItemSalesNotificationCommand = $this->factory->getModelOrderprocessCommandResetItemSalesNotification();
        $this->setup->addCommand(self::STATE_CLARIFY_HANDPICKED, self::EVENT_MANUAL_RE_INIT_ARTWORK_AVAILABILITY, $resetItemSalesNotificationCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_HANDPICKED_PROCESS,
            self::STATE_CANCELLATION_NO_HANDPICKED,
            self::STATE_CLARIFY_HANDPICKED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_CLARIFY_HANDPICKED,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }
}
