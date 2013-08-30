<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Finder_Status implements ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Library_Dependency_InitInterface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Generated_Zed_Sales_Component_Factory
     */
    protected $factory;

    /**
     * @var PropelObjectCollection
     */
    protected $states;

    /**
     * @var PropelObjectCollection
     */
    protected $processList;

    /**
     * @var array
     */
    protected $definitions;

    /**
     *
     */
    public function initAfterDependencyInjection()
    {
        $this->definitionContainer = $this->factory->getSettings()->getStatemachineDefinitionContainer();
        $this->states = $this->getStates();
        $this->processes = $this->getProcessList();
        $this->definitions = $this->prepareDefinitions();
    }

    /**
     * @return PropelObjectCollection
     */
    protected function getStates()
    {
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery::create()
            ->orderBy('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus.Name')
            ->find();
    }

    /**
     * @return array
     */
    protected function prepareDefinitions()
    {
        $definitions = array();
        foreach ($this->processes as $process) {
            /* @var $process ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess */
            $definitions[$process->getName()] = $this->definitionContainer->getProcessDefinition($process->getName());
        }
        return $definitions;
    }

    /**
     * @return PropelObjectCollection
     */
    protected function getProcessList()
    {
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery::create()->find();
    }

    /**
     * @param $filterFlag
     * @return PropelObjectCollection
     */
    public function getFlaggedStates($filterFlag)
    {
        $criteria = array(
            $filterFlag => true
        );
        $flaggedStates = array();
        /* @var $definition ProjectA_Zed_Library_StateMachine_Definition*/
        foreach ($this->definitions as $definition) {
            $flaggedStates = array_merge($flaggedStates, $definition->getStatesFilteredByCriteria($criteria));
        }
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery::create()
            ->filterByName($flaggedStates)
            ->orderBy('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus.Name')
            ->find();
    }

}
