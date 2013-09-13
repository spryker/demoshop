<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer implements ProjectA_Zed_Library_StateMachine_Definition_Container
{
    /**
     * @param string $processName
     * @return ProjectA_Zed_Library_StateMachine_Definition
     */
    public function getProcessDefinition($processName)
    {
        return new ProjectA_Zed_Library_StateMachine_Definition('demo');
    }

    /**
     * @param string $processName
     * @return boolean
     */
    public function hasProcessDefinition($processName)
    {
        if ($processName === 'demo') {
            return true;
        }
        return false;
    }

    /**
     * @return string[]
     */
    public function getProcessNameList()
    {
        return ['demo'];
    }
}
