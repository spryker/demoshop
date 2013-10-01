<?php

/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer extends ProjectA_Zed_Library_StateMachine_Definition_Container_Simple implements
    ProjectA_Zed_Library_StateMachine_Definition_Container,
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    public function initAfterDependencyInjection()
    {
        $this->initDefinitions();
    }

    protected function initDefinitions()
    {
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionDemo());
    }
}
