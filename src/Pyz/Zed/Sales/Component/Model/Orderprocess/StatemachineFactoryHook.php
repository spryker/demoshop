<?php

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_StatemachineFactoryHook implements
    \ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook,
    DependencyFactoryInterface,
    PayoneFacadeInterface

{

    use DependencyFactoryTrait;
    use PayoneFacadeTrait;

    protected function getRules()
    {
        $rules = new \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection();
        $rules->addRule($this->factory->createModelOrderprocessGuardRulePaymentRedirected());
        $rules->addRule($this->factory->createModelOrderprocessGuardRuleIsGrandTotalGreaterThan1000());
        $rules->addRule($this->factory->createModelOrderprocessGuardRuleAreAllItemsInTheFlaggedTestState());
        $rules->addRule($this->facadePayone->createFacadeStateMachine()->getRulePaymentTransactionApproved());
        $rules->addRule($this->facadePayone->createFacadeStateMachine()->getRulePaymentTransactionIsRedirect());
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
