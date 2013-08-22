<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Yves_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

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
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Brands
     */
    public function getModelExportExporterMemcacheBrands()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Brands');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Categories
     */
    public function getModelExportExporterMemcacheCategories()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Categories');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Cms
     */
    public function getModelExportExporterMemcacheCms()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Cms');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Country
     */
    public function getModelExportExporterMemcacheCountry()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Country');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Glossary
     */
    public function getModelExportExporterMemcacheGlossary()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Glossary');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_ProductOptions
     */
    public function getModelExportExporterMemcacheProductOptions()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_ProductOptions');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Redirection
     */
    public function getModelExportExporterMemcacheRedirection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Exporter_Memcache_Redirection');
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
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task_Empty
     */
    public function getModelExportTaskEmpty()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Task_Empty');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task_Entity
     */
    public function getModelExportTaskEntity()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Task_Entity');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task_Raw
     */
    public function getModelExportTaskRaw()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Component_Model_Export_Task_Raw');
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
