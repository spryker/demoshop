<?php

class Pyz_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer extends \ProjectA_Zed_Library_StateMachine_Definition_Container_Simple implements
    \ProjectA\Zed\Library\Dependency\Factory\FactoryInterface,
    \ProjectA_Zed_Library_Dependency_InitInterface
{

    use \ProjectA\Zed\Library\Dependency\FactoryTrait;

    public function initAfterDependencyInjection()
    {
        $this->initDefinitions();
    }

    /**
     * Overwrite for store specific definitions
     */
    public function initDefinitions()
    {
        $this->addProcessDefinition($this->factory->createModelOrderprocessDefinitionDemo());
    }

}
