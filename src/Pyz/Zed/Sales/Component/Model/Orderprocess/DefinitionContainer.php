<?php

use Generated\Zed\Sales\Component\SalesFactory;

/**
 * @property SalesFactory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer extends \ProjectA_Zed_Library_StateMachine_Definition_Container_Simple implements
    \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface,
    \ProjectA_Zed_Library_Dependency_InitInterface
{

    use \ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

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
        $this->addProcessDefinition($this->factory->createModelOrderprocessDefinitionCreditCardStripe());
        $this->addProcessDefinition($this->factory->createModelOrderprocessDefinitionPaypalPayone());
    }
}
