<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_StockUpdate extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     *
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     *
     * @param string $processName
     */
    public function __construct($processName = 'Stock Update Process')
    {
        parent::__construct($processName);
    }

    /**
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
        $this->setup->addTransition(self::STATE_INIT_STOCK_UPDATE, self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT, self::EVENT_ON_ENTER, self::RULE_SEND_SALES_NOTIFICATION_SUCCESSFUL);
        $this->setup->addTransition(self::STATE_INIT_STOCK_UPDATE, self::STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED, self::STATE_INIT_STOCK_UPDATE, self::EVENT_RETRY_SEND_SALES_NOTIFICATION);
    }

    protected function addCommands()
    {
        $sendSalesNotificationCommand = $this->factory->getModelOrderprocessCommandArtPortalSendSalesNotification();
        $this->setup->addCommand(self::STATE_INIT_STOCK_UPDATE, self::EVENT_ON_ENTER, $sendSalesNotificationCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_STOCK_UPDATE,
            self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT,
            self::STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $states = array(
            self::STATE_INIT_STOCK_UPDATE,
            self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup  = $this->getNewSetup();
        $states = array(
            self::STATE_INIT_STOCK_UPDATE,
            self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT,
            self::STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED
        );
        foreach ($states as $stateName) {
            $setup->setReserved($stateName);
        }

        $states = array(
            self::STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED
        );
        foreach ($states as $stateName) {
            $setup->addStateMetaInfo($stateName, self::FLAG_CLARIFY, true);
        }
    }
}
