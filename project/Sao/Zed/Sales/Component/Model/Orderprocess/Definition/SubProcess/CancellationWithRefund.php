<?php
/**
 * @property Sao_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_CancellationWithRefund extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Cancellation with Refund Process')
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
        $this->setup->addTransition(self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::STATE_REMOVED_SALE_IN_ARTPORTAL, self::EVENT_ON_ENTER, self::RULE_REMOVE_SALES_NOTIFICATION_SUCCESSFUL);
        $this->setup->addTransition(self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::STATE_CLARIFY_COULD_NOT_REMOVE_SALE_IN_ARTPORTAL, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_COULD_NOT_REMOVE_SALE_IN_ARTPORTAL, self::STATE_REMOVED_SALE_IN_ARTPORTAL, self::EVENT_MANUAL_REMOVED_SALE_FROM_ARTPORTAL);

        $this->setup->addTransition(self::STATE_REMOVED_SALE_IN_ARTPORTAL, self::STATE_BLOCKING_ARTWORK_IN_ARTPORTAL, self::EVENT_ON_ENTER, self::RULE_IS_ARTWORK_BLOCK_NEEDED);
        $this->setup->addTransition(self::STATE_REMOVED_SALE_IN_ARTPORTAL, self::STATE_EMAIL_SENT_TO_ACCOUNTING, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_BLOCKING_ARTWORK_IN_ARTPORTAL, self::STATE_EMAIL_SENT_TO_ACCOUNTING, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_EMAIL_SENT_TO_ACCOUNTING, self::STATE_AWAITING_REFUND, self::EVENT_MANUAL_REFUND_SENT_ACCOUNTING_MAIL);
        $this->setup->addTransitionManual(self::STATE_AWAITING_REFUND, self::STATE_REFUNDED, self::EVENT_MANUAL_REFUND);
    }

    protected function addCommands()
    {
        $sendEmailToAccountingCommand = $this->factory->getModelOrderprocessCommandMailAccountingAwaitingRefund();
        $this->setup->addCommand(self::STATE_AWAITING_REFUND, self::EVENT_ON_ENTER, $sendEmailToAccountingCommand);

        $this->setup->addCommand(self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandArtPortalRemoveSalesNotification());
        $this->setup->addCommand(self::STATE_BLOCKING_ARTWORK_IN_ARTPORTAL, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandBlockArtwork());
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS,
            self::STATE_AWAITING_REFUND,
            self::STATE_BLOCKING_ARTWORK_IN_ARTPORTAL,
            self::STATE_REFUNDED,
            self::STATE_EMAIL_SENT_TO_ACCOUNTING,
            self::STATE_REMOVED_SALE_IN_ARTPORTAL,
            self::STATE_CLARIFY_COULD_NOT_REMOVE_SALE_IN_ARTPORTAL
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_AWAITING_REFUND,
            self::STATE_EMAIL_SENT_TO_ACCOUNTING,
            self::STATE_CLARIFY_COULD_NOT_REMOVE_SALE_IN_ARTPORTAL
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }

}
