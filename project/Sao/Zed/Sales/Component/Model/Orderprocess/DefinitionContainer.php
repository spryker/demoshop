<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer extends ProjectA_Zed_Library_StateMachine_Definition_Container_Simple implements ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Library_Dependency_InitInterface
{

    /**
     *
     * @var Generated_Zed_Sales_Component_Factory
     */
    protected $factory;

    /**
     *
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function initAfterDependencyInjection()
    {
        $this->initDefinitions();
    }

    /**
     * Overwrite for store specific definitions
     */
    public function initDefinitions()
    {
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionCreditcardManufactured());
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionCreditcardMarketplace());
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionManualManufactured());
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionManualMarketplace());
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionPayPalManufactured());
        $this->addProcessDefinition($this->factory->getModelOrderprocessDefinitionPayPalMarketplace());
    }

}
