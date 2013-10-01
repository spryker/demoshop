<?php

class Pyz_Zed_Sales_Component_Model_Orderprocess_StatemachineFactoryHook implements
    ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook
{

    /**
     * @return ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection
     */
    protected function getRules()
    {
        return new ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection();
    }

    /**
     * @param ProjectA_Zed_Library_StateMachine $stateMachine
     * @return ProjectA_Zed_Library_StateMachine
     */
    public function onStatemachineWasCreated(ProjectA_Zed_Library_StateMachine $stateMachine)
    {
        // @todo think about it
    }
}
