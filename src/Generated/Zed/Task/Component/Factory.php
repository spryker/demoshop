<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Task_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Task_Component_Facade_Repository
     */
    public function getFacadeRepository()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Facade_Repository');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Task_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Task_Component_Gui_Grid_Task
     */
    public function getGuiGridTask($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Gui_Grid_Task');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Task_Component_Gui_Grid_TaskType
     */
    public function getGuiGridTaskType($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Gui_Grid_TaskType');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Task_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return ProjectA_Zed_Task_Component_Model_CreateInvoice
     */
    public function getModelCreateInvoice(ProjectA_Zed_Sales_Persistence_PacSalesOrder $order)
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Model_CreateInvoice');
        $model = new $class($order);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Task_Component_Model_Migration
     */
    public function getModelMigration()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Model_Migration');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Task_Component_Model_Repository_Propel
     */
    public function getModelRepositoryPropel()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Model_Repository_Propel');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Task_Component_Model_TestModel_Task
     */
    public function getModelTestModelTask()
    {
        $class = $this->transformClassName('ProjectA_Zed_Task_Component_Model_TestModel_Task');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
