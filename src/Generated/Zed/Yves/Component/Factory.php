<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Yves_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Yves_Component_Exporter_Task_Empty
     */
    public function getExporterTaskEmpty()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Exporter_Task_Empty');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Exporter_Task_Entity
     */
    public function getExporterTaskEntity()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Exporter_Task_Entity');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Exporter_Task_Raw
     */
    public function getExporterTaskRaw()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Exporter_Task_Raw');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Yves_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Yves_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Control
     */
    public function getModelControl()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Control');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Memcached
     */
    public function getModelExportMemcached()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Memcached');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Solr
     */
    public function getModelExportSolr()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Solr');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Touch
     */
    public function getModelTouch()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Touch');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Yves_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Yves_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Products_Artwork
     */
    public function getModelExportExporterMemcacheProductsArtwork()
    {
        $class = $this->transformClassName('Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Products_Artwork');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Regions
     */
    public function getModelExportExporterMemcacheRegions()
    {
        $class = $this->transformClassName('Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Regions');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Yves_Component_Model_Export_Exporter_Solr_Products
     */
    public function getModelExportExporterSolrProducts()
    {
        $class = $this->transformClassName('Sao_Zed_Yves_Component_Model_Export_Exporter_Solr_Products');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
