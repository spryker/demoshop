<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Fulfillment extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess
{

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Fulfillment Subprocess')
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
        $this->setup->addTransition(self::STATE_INIT_FULFILLMENT_PROCESS, self::STATE_FULFILLED, self::EVENT_START_FULFILLMENT_EXPORT);
    }

    protected function addCommands()
    {
        $fulfillmentExportCommand = $this->factory->createModelOrderprocessCommandFulfillmentFulfillmentExportCommand();
        $this->setup->addCommand(self::STATE_INIT_FULFILLMENT_PROCESS, self::EVENT_START_FULFILLMENT_EXPORT, $fulfillmentExportCommand);
    }

    protected function addFlags()
    {

    }

    protected function addMetaInfo()
    {
        $states =[
            self::STATE_INIT_FULFILLMENT_PROCESS,
            self::STATE_FULFILLED
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }
}
