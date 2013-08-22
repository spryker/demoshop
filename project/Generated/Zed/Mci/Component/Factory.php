<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Mci_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Mci_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Gui_CostEntries
     */
    public function getGuiCostEntries()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Gui_CostEntries');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Model_Cost
     */
    public function getModelCost()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Cost');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit 
     * @param DateTime $date 
     * @return ProjectA_Zed_Mci_Component_Model_CostUnitData
     */
    public function getModelCostUnitData(Iterator $costEntries, ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit, DateTime $date)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_CostUnitData');
        $model = new $class($costEntries, $costUnit, $date);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param DateTime $start 
     * @param DateTime $end 
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit 
     * @param string $format (optional) default: 'Ymd'
     * @return ProjectA_Zed_Mci_Component_Model_CostUnitDataIterator
     */
    public function getModelCostUnitDataIterator(DateTime $start, DateTime $end, Iterator $costEntries, ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit, $format = 'Ymd')
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_CostUnitDataIterator');
        $model = new $class($start, $end, $costEntries, $costUnit, $format);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Model_DwhClick
     */
    public function getModelDwhClick()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_DwhClick');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Persistence_PacMciCostType $costType 
     * @return ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByCostType
     */
    public function getModelFilterCostEntriesByCostType(Iterator $costEntries, ProjectA_Zed_Mci_Persistence_PacMciCostType $costType)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByCostType');
        $model = new $class($costEntries, $costType);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit 
     * @return ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByCostUnit
     */
    public function getModelFilterCostEntriesByCostUnit(Iterator $costEntries, ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByCostUnit');
        $model = new $class($costEntries, $costUnit);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param DateTime $date 
     * @return ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByDate
     */
    public function getModelFilterCostEntriesByDate(Iterator $costEntries, DateTime $date)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByDate');
        $model = new $class($costEntries, $date);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit 
     * @return ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByLevel
     */
    public function getModelFilterCostEntriesByLevel(Iterator $costEntries, ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesByLevel');
        $model = new $class($costEntries, $costUnit);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $costEntries 
     * @param ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit 
     * @return ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesBySubLevel
     */
    public function getModelFilterCostEntriesBySubLevel(Iterator $costEntries, ProjectA_Zed_Mci_Component_Interface_CostUnit $costUnit)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_Filter_CostEntriesBySubLevel');
        $model = new $class($costEntries, $costUnit);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Model_TopLevel
     */
    public function getModelTopLevel()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Model_TopLevel');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mci_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mci_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
