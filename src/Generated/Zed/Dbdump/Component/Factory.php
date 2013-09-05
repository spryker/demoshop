<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Dbdump_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Dbdump_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dbdump_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dbdump_Component_Model_Exporter
     */
    public function getModelExporter()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dbdump_Component_Model_Exporter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dbdump_Component_Model_Sanitizer
     */
    public function getModelSanitizer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dbdump_Component_Model_Sanitizer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Dbdump_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Dbdump_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
