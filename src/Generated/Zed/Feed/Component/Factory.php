<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Feed_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Feed_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Feed_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Feed_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Feed_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Feed_Component_Model_Generator
     */
    public function getModelGenerator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Feed_Component_Model_Generator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Feed_Component_Model_Writer_Csv
     */
    public function getModelWriterCsv()
    {
        $class = $this->transformClassName('ProjectA_Zed_Feed_Component_Model_Writer_Csv');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Feed_Component_Model_Writer_Xml
     */
    public function getModelWriterXml()
    {
        $class = $this->transformClassName('ProjectA_Zed_Feed_Component_Model_Writer_Xml');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
