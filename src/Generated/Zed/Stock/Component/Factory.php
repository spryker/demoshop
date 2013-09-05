<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Stock_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Stock_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Check
     */
    public function getModelCheck()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Check');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Displayable
     */
    public function getModelDisplayable()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Displayable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Finder
     */
    public function getModelFinder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Finder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Physical
     */
    public function getModelPhysical()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Physical');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Reserved
     */
    public function getModelReserved()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Reserved');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Saleable
     */
    public function getModelSaleable()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Saleable');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Model_Stock
     */
    public function getModelStock()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Model_Stock');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stock_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stock_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
