<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintFileCheck extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Print File Check Process')
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
        $this->setup->addTransition(self::STATE_INIT_PRINT_FILE_CHECK, self::STATE_PRINT_FILE_CHECK_SUCCESS, self::EVENT_ON_ENTER, self::RULE_PRINT_FILE_APPROVED);
        $this->setup->addTransition(self::STATE_INIT_PRINT_FILE_CHECK, self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION, self::EVENT_ON_ENTER);

        $this->setup->setTimeout(self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION, self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED, '3 weekdays');

        $this->setup->addTransition(self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION, self::STATE_PRINT_FILE_CHECK_SUCCESS, null, self::RULE_PRINT_FILE_APPROVED);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION, self::STATE_PRINT_FILE_CHECK_SUCCESS, self::EVENT_MANUAL_APPROVE_PRINT_FILE_CHECK);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION, self::STATE_PRINT_FILE_CHECK_FAILURE, self::EVENT_MANUAL_DISAPPROVE_PRINT_FILE_CHECK);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED, self::STATE_PRINT_FILE_CHECK_SUCCESS, self::EVENT_MANUAL_APPROVE_PRINT_FILE_CHECK);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED, self::STATE_PRINT_FILE_CHECK_FAILURE, self::EVENT_MANUAL_DISAPPROVE_PRINT_FILE_CHECK);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED, self::STATE_PRINT_FILE_CHECK_SUCCESS, null, self::RULE_PRINT_FILE_APPROVED);
    }

    protected function addCommands()
    {
        $artistSalesMail = $this->factory->getModelOrderprocessCommandMailArtistSalesNotificationManufactured();
        $this->setup->addCommand(self::STATE_INIT_PRINT_FILE_CHECK, self::EVENT_ON_ENTER, $artistSalesMail);

        $printFileCheckMail = $this->factory->getModelOrderprocessCommandMailPrintFileCheckFailure();
        $this->setup->addCommand(self::STATE_PRINT_FILE_CHECK_FAILURE, self::EVENT_ON_ENTER, $printFileCheckMail);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_PRINT_FILE_CHECK,
            self::STATE_PRINT_FILE_CHECK_SUCCESS,
            self::STATE_PRINT_FILE_CHECK_FAILURE,
            self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION,
            self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
        $clarifyRefundStates = array(
            self::STATE_INIT_PRINT_FILE_CHECK,
            self::STATE_PRINT_FILE_CHECK_SUCCESS,
            self::STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION,
            self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED
        );
        foreach ($clarifyRefundStates as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY_REFUND, true);
        }

        $states = array(
            self::STATE_INIT_PRINT_FILE_CHECK,
            self::STATE_PRINT_FILE_CHECK_SUCCESS
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }

}
