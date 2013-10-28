<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Closed extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess
{

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Closed Subprocess')
    {
        parent::__construct($processName);
    }

    protected function createDefinition ()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
    }

    protected function addCommands()
    {
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $states =[
            self::STATE_CLOSED,
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }
}
