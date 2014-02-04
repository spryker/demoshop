<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess\Example;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class ExampleSubprocessA
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Example Subprocess A')
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
        $this->setup->addTransition(self::STATE_D, self::STATE_E, self::EVENT_ON_ENTER);
    }

    protected function addCommands()
    {

    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_D,
            self::STATE_E

        ];

        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }
    }

}
