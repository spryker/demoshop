<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Library_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Library_Component_Model_Dependency
     */
    public function getModelDependency()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Component_Model_Dependency');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Graph_Dependency
     */
    public function getModelGraphDependency()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Component_Model_Graph_Dependency');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Library_Component_Model_Installer_Composite
     */
    public function getModelInstallerComposite()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Component_Model_Installer_Composite');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param BaseObject $entity (optional) default: null
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function getModelResult(BaseObject $entity = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Component_Model_Result');
        $model = new $class($entity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
