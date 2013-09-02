<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 * @property Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_OriginalProduct extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @param string $processName
     */
    public function __construct($processName = 'original product')
    {
        parent::__construct($processName);
    }

    /**
     */
    protected function createDefinition()
    {
        $this->getNewSetup();
        $this->addCommands();
        $this->addDefinitions();
    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessStockUpdate());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessArtworkAvailability());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessDelivery());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessHandpicked());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPayout());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessCancellationWithRefund());

        $this->setup->addTransition(self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT, self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK);

        //$this->setup->addTransition(self::STATE_ARTWORK_AVAILABLE, self::STATE_INIT_SHIPMENT_PROCESS, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT, self::STATE_INIT_SHIPMENT_PROCESS, self::EVENT_ON_ENTER);

        $this->setup->addTransition(self::STATE_ARTWORK_NOT_AVAILABLE, self::STATE_INIT_HANDPICKED_PROCESS, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_ARTWORK_AVAILABLE, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_CANCEL);
        $this->setup->addTransition(self::STATE_ARTIST_NOT_REACHABLE, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_HANDPICKED, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_CANCEL);
        $this->setup->addTransition(self::STATE_CANCELLATION_NO_HANDPICKED, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS);
        $this->setup->addTransition(self::STATE_FULFILLED, self::STATE_INIT_PAYOUT_PROCESS, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_FULFILLED, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_ON_ENTER, self::RULE_IS_MARKED_FOR_REFUND);
    }

    /**
     *
     */
    protected function addCommands()
    {
        $fetchFulfillmentCostsCommand = $this->factory->getModelOrderprocessCommandFetchFulfillmentCosts();
        $this->setup->addCommand(self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT, self::EVENT_ON_ENTER, $fetchFulfillmentCostsCommand);

        $confirmArtworkAvailableMail = $this->factory->getModelOrderprocessCommandMailConfirmArtworkAvailability();
        $this->setup->addCommand(self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT, self::EVENT_ON_ENTER, $confirmArtworkAvailableMail);
    }

}
