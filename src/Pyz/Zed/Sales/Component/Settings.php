<?php
use ProjectA\Shared\Sales\Transfer\Order;

/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Pyz_Zed_Sales_Component_Settings extends ProjectA_Zed_Sales_Component_Settings
{
    /**
     * @throws ProjectA_Zed_Library_Exception
     * @return ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook
     */
    public function getStateMachineFactoryHook()
    {
        return $this->factory->getModelOrderprocessStatemachineFactoryHook();
    }

    /**
     * @throws ProjectA_Zed_Library_Exception
     * @return ProjectA_Zed_Library_StateMachine_Definition_Container
     */
    public function getStatemachineDefinitionContainer()
    {
        return $this->factory->getModelOrderprocessDefinitionContainer();
    }

    /**
     * @param Order $transferOrder
     * @return string
     */
    public function getProcessNameForNewOrder(Order $transferOrder)
    {
        return 'Demo';
    }
}
