<?php

/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_StatemachineFactoryHook
    implements ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook,
               ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    protected function getRules ()
    {
        $rules = new ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection();
        $rules->addRule($this->factory->getModelOrderprocessRuleDemoPaymentTransactionApproved());
        return $rules;
    }

    /**
     * @param ProjectA_Zed_Library_StateMachine $stateMachine
     * @return ProjectA_Zed_Library_StateMachine
     */
    public function onStatemachineWasCreated(ProjectA_Zed_Library_StateMachine $stateMachine)
    {
        $guards = new ProjectA_Zed_Library_StateMachine_Transition_Guard_Composite();
        $guards->addGuard($this->getRules());
        $guards->addGuard($stateMachine->getGuard());
        $stateMachine->setGuard($guards);
        // @todo think about it
    }
}
