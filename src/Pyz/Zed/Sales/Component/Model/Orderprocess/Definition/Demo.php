<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\DemoPayment\Component\Constants\StatemachineConstants as PaymentConstants;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Demo extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements Orderprocess
{

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_DEMO)
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
        $this->setup->addTransitionManual(self::STATE_CLOSED, self::STATE_FINALLY_CLOSED, self::EVENT_CLOSE);
    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessNewOrder());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessPayment());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessClosed());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessTest());
    }

    protected function addCommands()
    {
    }

    protected function addMetaInfo()
    {
        $states = [
            self::STATE_FINALLY_CLOSED
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName() . '-End');
        }

        $states = [
            self::STATE_NEW,
            self::STATE_WAITING_FOR_PAYMENT,
            PaymentConstants::STATE_DEMO_AUTHORIZED,
            PaymentConstants::STATE_DEMO_CAPTURED,
            self::STATE_CLOSED,
            self::STATE_FINALLY_CLOSED
        ];

        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
    }

    protected function addSubProcessConnections()
    {
        $this->setup->addTransition(self::STATE_NEW, self::STATE_WAITING_FOR_PAYMENT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(PaymentConstants::STATE_DEMO_CAPTURED, self::STATE_CLOSED);
        $this->setup->addTransitionManual(self::STATE_FINALLY_CLOSED, self::STATE_DEMO_A, self::EVENT_DEMO_START_TEST);
    }
}
