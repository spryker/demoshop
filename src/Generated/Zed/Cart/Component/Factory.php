<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Cart_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Cart_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_Cart
     */
    public function getModelCart()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_Cart');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_CartStep
     */
    public function getModelCartStep()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_CartStep');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_CartStorage
     */
    public function getModelCartStorage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_CartStorage');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_ClearStrategyDelete
     */
    public function getModelClearStrategyDelete()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_ClearStrategyDelete');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_ClearStrategyMarkDeleted
     */
    public function getModelClearStrategyMarkDeleted()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_ClearStrategyMarkDeleted');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_MergeItemStrategyAdd
     */
    public function getModelMergeItemStrategyAdd()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_MergeItemStrategyAdd');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Model_MergeItemStrategyMax
     */
    public function getModelMergeItemStrategyMax()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Model_MergeItemStrategyMax');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cart_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
