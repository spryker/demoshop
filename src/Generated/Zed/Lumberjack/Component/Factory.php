<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Lumberjack_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_ActiveMq_Collector
     */
    public function getModelActiveMqCollector()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_ActiveMq_Collector');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_Behaviour_Lumberjack
     */
    public function getModelBehaviourLumberjack()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_Behaviour_Lumberjack');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Export_Csv
     */
    public function getModelElasticSearchExportCsv()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Export_Csv');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Proxy
     */
    public function getModelElasticSearchProxy()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Proxy');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Storage
     */
    public function getModelElasticSearchStorage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_Storage');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_StorageDummy
     */
    public function getModelElasticSearchStorageDummy()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_ElasticSearch_StorageDummy');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Model_FileDumper
     */
    public function getModelFileDumper()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Model_FileDumper');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Lumberjack_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
