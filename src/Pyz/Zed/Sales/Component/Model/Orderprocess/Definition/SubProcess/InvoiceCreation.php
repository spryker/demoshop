<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class InvoiceCreation extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess
{

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Invoice Creation Subprocess')
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransitionManual(self::STATE_READY_FOR_INVOICE_CREATION, self::STATE_INVOICE_CREATED, self::EVENT_START_INVOICE_CREATION);
    }

    protected function addCommands()
    {
        $invoiceCreationCommand = $this->factory->createModelOrderprocessCommandCreateInvoice();
        $this->setup->addCommand(self::STATE_READY_FOR_INVOICE_CREATION, self::EVENT_START_INVOICE_CREATION, $invoiceCreationCommand);
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_READY_FOR_INVOICE_CREATION, self::FLAG_RESERVED, true);
        $this->setup->addStateMetaInfo(self::STATE_INVOICE_CREATED, self::FLAG_RESERVED, true);
    }

    protected function addMetaInfo()
    {
        $states =[
            self::STATE_READY_FOR_INVOICE_CREATION,
            self::STATE_INVOICE_CREATED
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }
}
