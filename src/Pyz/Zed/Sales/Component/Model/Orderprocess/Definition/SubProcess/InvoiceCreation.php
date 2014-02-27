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
        $this->setup->addTransitionManual(self::STATE_READY_FOR_INVOICE_CREATION, self::STATE_INVOICE_CREATED, self::EVENT_START_INVOICE_CREATION, self::RULE_INVOICE_CREATION_POSSIBLE);
    }

    protected function addCommands()
    {
        $invoiceCreationCommand = $this->factory->createModelOrderprocessCommandCreateInvoice();
        $this->setup->addCommand(self::STATE_READY_FOR_INVOICE_CREATION, self::EVENT_START_INVOICE_CREATION, $invoiceCreationCommand);
    }

    protected function addFlags()
    {
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
