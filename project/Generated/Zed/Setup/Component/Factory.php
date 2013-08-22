<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Setup_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Setup_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Setup_Component_Model_Cronjobs
     */
    public function getModelCronjobs()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Component_Model_Cronjobs');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Setup_Component_Model_Git
     */
    public function getModelGit()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Component_Model_Git');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Setup_Component_Model_System
     */
    public function getModelSystem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Component_Model_System');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Setup_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
