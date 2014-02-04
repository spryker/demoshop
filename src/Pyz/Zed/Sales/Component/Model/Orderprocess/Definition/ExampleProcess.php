<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * Class CreditCard
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class ExampleProcess extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    PayoneFacadeInterface
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_EXAMPLE)
    {
        parent::__construct($processName);
    }

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
    {
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_A, self::EVENT_SOME_DEFINED_EVENT);
        $this->setup->addTransition(self::STATE_A, self::STATE_B, self::EVENT_ON_ENTER);
    }

    protected function addDefinitions()
    {

    }

    protected function addCommands()
    {

    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_NEW,
                self::STATE_A,
                self::STATE_B,
                //self::STATE_C
            ], 'group', $this->getName() . '');

        $this->setup->setHappyCaseStates(
            [
                self::STATE_NEW,
            ]
        );
    }

    protected function addFlags()
    {
    }

    protected function addSubProcessConnections()
    {

    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
