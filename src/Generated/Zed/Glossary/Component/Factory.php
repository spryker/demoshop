<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Glossary_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Glossary_Component_Exporter_Memcache_Glossary
     */
    public function getExporterMemcacheGlossary()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Exporter_Memcache_Glossary');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Facade_Gui');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Gui_Crud_Explanation
     */
    public function getGuiCrudExplanation()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Crud_Explanation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Gui_Crud_Group
     */
    public function getGuiCrudGroup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Crud_Group');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Gui_Crud_Key
     */
    public function getGuiCrudKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Crud_Key');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Gui_Crud_Language
     */
    public function getGuiCrudLanguage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Crud_Language');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Form_Explanation
     */
    public function getGuiFormExplanation($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Form_Explanation');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Library_Crud $crud
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Form_Group
     */
    public function getGuiFormGroup(ProjectA_Zed_Library_Crud $crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Form_Group');
        $model = new $class($crud, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Form_Key
     */
    public function getGuiFormKey($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Form_Key');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Form_Language
     */
    public function getGuiFormLanguage($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Form_Language');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Grid_Group
     */
    public function getGuiGridGroup($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Grid_Group');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Grid_Key
     */
    public function getGuiGridKey($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Grid_Key');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Glossary_Component_Gui_Grid_Language
     */
    public function getGuiGridLanguage($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Gui_Grid_Language');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_ActiveMq_Adapter
     */
    public function getModelActiveMqAdapter()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_ActiveMq_Adapter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_Explanation
     */
    public function getModelExplanation()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_Explanation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_Finder
     */
    public function getModelFinder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_Finder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_Key
     */
    public function getModelKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_Key');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_Language
     */
    public function getModelLanguage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_Language');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Model_Migration
     */
    public function getModelMigration()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Model_Migration');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Glossary_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Glossary_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Glossary_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Glossary_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
