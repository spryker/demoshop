<?php

/**
 * @author jsticks
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup extends ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
{

    /**
     * @param array $states
     */
    public function setReservedStates (array $states)
    {
        foreach($states as $state) {
            $this->setReserved($state);
        }
    }

    /**
     * @param array $states
     */
    public function setExportableStates(array $states)
    {
        foreach($states as $state) {
            $this->addStateMetaInfo($state, ProjectA_Zed_Sales_Component_Interface_StateInfoConstant::EXPORTABLE, true);
        }
    }

    /**
     * @param string $stateName
     * @param boolean $isReserved
     */
    public function setHappyCaseStates (array $states)
    {
        foreach($states as $state) {
            $this->addStateMetaInfo($state, 'color', '#70ab28');
            $this->addStateMetaInfo($state, 'Happy Case', true);
        }
    }

    public function addTransitionManual ($sourceStateName, $targetStateName, $event = null, $condition = null)
    {
        parent::addTransition($sourceStateName, $targetStateName, $event, $condition);
        $this->setManuallyExecuteable($sourceStateName, $event);
    }

}