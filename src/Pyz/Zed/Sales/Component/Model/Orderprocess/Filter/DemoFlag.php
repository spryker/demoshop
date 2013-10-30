<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Filter;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

class DemoFlag extends \FilterIterator implements Orderprocess
{

    /**
     * @var \ProjectA_Zed_Library_StateMachine_Definition_Factory
     */
    private $factory;

    /**
     * @var \ProjectA_Zed_Library_StateMachine_CurrentState
     */
    private $currentState;

    /**
     * @param \Iterator $orderItems
     * @param \ProjectA_Zed_Library_StateMachine_Definition_Factory $factory
     * @param \ProjectA_Zed_Library_StateMachine_CurrentState $currentState
     */
    public function __construct (\Iterator $orderItems, \ProjectA_Zed_Library_StateMachine_Definition_Factory $factory, \ProjectA_Zed_Library_StateMachine_CurrentState $currentState)
    {
        parent::__construct($orderItems);
        $this->factory = $factory;
        $this->currentState = $currentState;
    }

    /**
     * @see FilterIterator::accept()
     */
    public function accept ()
    {
        /* @var $orderItem \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $orderItem = $this->current();
        $definition = $this->factory->getDefintion($orderItem);
        $stateName = $this->currentState->getCurrentStateName($orderItem);
        $state = $definition->getState($stateName);
        return (boolean) $state->getInfo(self::FLAG_DEMO_TEST_FLAG);
    }
}
