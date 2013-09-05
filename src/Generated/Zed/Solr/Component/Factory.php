<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Solr_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Solr_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Score_Builder_Random
     */
    public function getModelScoreBuilderRandom()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Builder_Random');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param array $options (optional) default: array()
     * @return ProjectA_Zed_Solr_Component_Model_Score_Cache_Variable
     */
    public function getModelScoreCacheVariable($options = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Cache_Variable');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Score_Cache
     */
    public function getModelScoreCache()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Cache');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Score_Config
     */
    public function getModelScoreConfig()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Config');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Score_Creator
     */
    public function getModelScoreCreator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Creator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Solr_Component_Model_Score_Interface_Builder $scoreBuilder
     * @return ProjectA_Zed_Solr_Component_Model_Score_Data
     */
    public function getModelScoreData(ProjectA_Zed_Solr_Component_Model_Score_Interface_Builder $scoreBuilder)
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Score_Data');
        $model = new $class($scoreBuilder);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Setup_MetaData
     */
    public function getModelSetupMetaData()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Setup_MetaData');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Setup_Store
     */
    public function getModelSetupStore()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Setup_Store');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Model_Setup
     */
    public function getModelSetup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Model_Setup');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Solr_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Solr_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
