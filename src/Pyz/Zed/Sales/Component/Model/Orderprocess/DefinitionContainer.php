<?php

use Generated\Zed\Sales\Component\SalesFactory;
use ProjectA\Zed\Library\Dependency\DependencyInitInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;

/**
 * @property SalesFactory $factory
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_DefinitionContainer extends \ProjectA_Zed_Library_StateMachine_Definition_Container_Simple implements
    DependencyFactoryInterface,
    DependencyInitInterface
{

    use DependencyFactoryTrait;

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
        $this->addProcessDefinition($this->factory->createModelOrderprocessDefinitionPayoneCreditCard());
        $this->addProcessDefinition($this->factory->createModelOrderprocessDefinitionPayonePaypal());
    }
}
