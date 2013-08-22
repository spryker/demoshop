<?php

/**
 * @author otischlinger
 * @property Sao_Zed_Sales_Component_Factory $factory
 * @property Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_Creditcard_Manufactured extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_CEDIT_CARD_MANUFACTURED)
    {
        parent::__construct($processName);
    }

    /**
     */
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
    {}

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessCreditCard());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPrintProduct());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessSendOrderConfirmation());
        $this->setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessCancellation());
    }

    protected function addCommands()
    {}

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_NEW
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-Start');
        }

        $states = array(
            self::STATE_CLOSED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-End');
        }

        $states = array();
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_INIT_PRINTER_EXPORT, self::FLAG_PRINTABLE, true);
    }

    protected function addSubProcessConnections()
    {
        $this->setup->setTimeout(self::STATE_APPOINTED, self::STATE_INIT_SEND_ORDER_CONFIRMATION, '10 seconds');
        $this->setup->addTransition(self::STATE_FETCHED_LEGACY_USER_INFORMATION, self::STATE_INIT_CAPTURE_PROCESS);
        $this->setup->addTransition(self::STATE_CAPTURED, self::STATE_INIT_STOCK_UPDATE);
    }
}
