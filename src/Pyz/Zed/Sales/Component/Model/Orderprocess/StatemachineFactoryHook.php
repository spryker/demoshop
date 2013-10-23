<?php

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_StatemachineFactoryHook implements
    \ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook,
    \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface
{

    use \ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

    protected function getRules ()
    {
        $rules = new \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection();
        return $rules;
    }

    /**
     * @param \ProjectA_Zed_Library_StateMachine $stateMachine
     * @return \ProjectA_Zed_Library_StateMachine
     */
    public function onStatemachineWasCreated(\ProjectA_Zed_Library_StateMachine $stateMachine)
    {
        $guards = new \ProjectA_Zed_Library_StateMachine_Transition_Guard_Composite();
        $guards->addGuard($this->getRules());
        $guards->addGuard($stateMachine->getGuard());
        $stateMachine->setGuard($guards);
    }
}
