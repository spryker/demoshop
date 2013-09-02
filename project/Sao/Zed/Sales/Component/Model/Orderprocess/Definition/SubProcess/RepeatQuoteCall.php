<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_RepeatQuoteCall
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{


    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Repeat Quote Call')
    {
        parent::__construct($processName);
    }

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
        $this->setup->addTransitionManual(self::STATE_CLARIFY_ADDRESSES, self::STATE_QUOTE_CALL_SUCCESSFULLY_REPEATED, self::EVENT_MANUAL_REPEAT_QUOTE_CALL, self::RULE_ITEM_HAS_QUOTE);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_ADDRESSES, self::STATE_CLARIFY_ADDRESSES, self::EVENT_MANUAL_REPEAT_QUOTE_CALL);
    }

    protected function addCommands()
    {
        $fetchFulfillmentCostsCommand = $this->factory->getModelOrderprocessCommandFetchFulfillmentCosts();
        $this->setup->addCommand(self::STATE_CLARIFY_ADDRESSES, self::EVENT_MANUAL_REPEAT_QUOTE_CALL, $fetchFulfillmentCostsCommand);

        $clearAbandonedCommand = $this->factory->getModelOrderprocessCommandClearAbandonedMailRelatedItems();
        $this->setup->addCommand(self::STATE_CLARIFY_ADDRESSES, self::EVENT_ON_ENTER, $clearAbandonedCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_CLARIFY_ADDRESSES,
            self::STATE_QUOTE_CALL_SUCCESSFULLY_REPEATED,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_CLARIFY_ADDRESSES
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }


}
