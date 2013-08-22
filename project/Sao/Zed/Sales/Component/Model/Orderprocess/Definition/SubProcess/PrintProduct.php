<?php
/**
 * @property Sao_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrintProduct extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     *
     * @param string $processName            
     */
    public function __construct($processName = 'print product')
    {
        parent::__construct($processName);
    }

    /**
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessStockUpdate());
        $setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPrinterExport());
        $setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPrintFileCheck());
        $setup->addDefinition($this->factory->getModelOrderprocessDefinitionSubProcessPayout());

        $setup->addTransition(self::STATE_ART_PORTAL_SALES_NOTIFICATION_SENT, self::STATE_INIT_PRINT_FILE_CHECK);
        $setup->addTransition(self::STATE_PRINT_FILE_CHECK_SUCCESS, self::STATE_INIT_PRINTER_EXPORT);
        $this->setup->addTransitionManual(self::STATE_FULFILLED, self::STATE_INIT_PAYOUT_PROCESS, self::EVENT_ON_ENTER);
    }
}
