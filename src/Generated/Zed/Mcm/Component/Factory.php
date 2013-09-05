<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Mcm_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Mcm_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Mcm_Component_Gui_Form_Edit
     */
    public function getGuiFormEdit($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Gui_Form_Edit');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Mcm_Component_Gui_Form_Selector
     */
    public function getGuiFormSelector($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Gui_Form_Selector');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Mcm_Component_Gui_Grid_RelationIndex
     */
    public function getGuiGridRelationIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Gui_Grid_RelationIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Mcm_Component_Model_AnalyticsUrlSnippet
     */
    public function getModelAnalyticsUrlSnippet()
    {
        $class = $this->transformClassName('Sao_Zed_Mcm_Component_Model_AnalyticsUrlSnippet');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Campaign
     */
    public function getModelCampaign()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Campaign');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Channel
     */
    public function getModelChannel()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Channel');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Edit
     */
    public function getModelEdit()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Edit');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Export
     */
    public function getModelExport()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Export');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Import
     */
    public function getModelImport()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Import');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Partner
     */
    public function getModelPartner()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Partner');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Publication
     */
    public function getModelPublication()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Publication');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Model_Relation
     */
    public function getModelRelation()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Model_Relation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Mcm_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Mcm_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
