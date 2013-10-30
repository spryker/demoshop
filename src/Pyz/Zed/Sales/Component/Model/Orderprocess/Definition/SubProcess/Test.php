<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Test extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess
{

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Test Subprocess')
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
        $this->setup->addTransitionManual(self::STATE_DEMO_A, self::STATE_DEMO_B, self::EVENT_DEMO_AB);
        $this->setup->addTransitionManual(self::STATE_DEMO_B, self::STATE_DEMO_C, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_DEMO_C, self::STATE_DEMO_D, null, 'timeout 1 minute');

        $this->setup->addTransitionManual(self::STATE_DEMO_D, self::STATE_DEMO_E, self::EVENT_ON_ENTER, self::RULE_DEMO_ORDER_GRAND_TOTAL_GREATER_THAN_1000);
        $this->setup->addTransitionManual(self::STATE_DEMO_D, self::STATE_DEMO_F, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_DEMO_E, self::STATE_DEMO_G);
        $this->setup->addTransitionManual(self::STATE_DEMO_F, self::STATE_DEMO_G);
        $this->setup->addTransitionManual(self::STATE_DEMO_G, self::STATE_DEMO_H, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_DEMO_H, self::STATE_DEMO_I, self::EVENT_DEMO_CHECK_FLAG, self::RULE_DEMO_ALL_ITEMS_ARE_IN_THE_FLAGGED_TEST_STATE);

    }

    protected function addCommands()
    {
        $this->setup->addCommand(self::STATE_DEMO_D, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandDemoTestOrderCommandOne());
        $this->setup->addCommand(self::STATE_DEMO_G, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandDemoTestItemCommandOne());
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_DEMO_H, self::FLAG_DEMO_TEST_FLAG, true);
        $this->setup->addStateMetaInfo(self::STATE_DEMO_I, self::FLAG_DEMO_TEST_FLAG, true);
    }

    protected function addMetaInfo()
    {
        $states =[
            self::STATE_DEMO_A,
            self::STATE_DEMO_B,
            self::STATE_DEMO_C,
            self::STATE_DEMO_D,
            self::STATE_DEMO_E,
            self::STATE_DEMO_F,
            self::STATE_DEMO_G,
            self::STATE_DEMO_H,
            self::STATE_DEMO_I,
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $this->setup->setHappyCaseStates($states);
    }
}
