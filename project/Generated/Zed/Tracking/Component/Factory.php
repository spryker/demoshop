<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Tracking_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Tracking_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreateExclusivity
     */
    public function getGuiFormCreateExclusivity($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreateExclusivity');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreateExclusivityGroup
     */
    public function getGuiFormCreateExclusivityGroup($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreateExclusivityGroup');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreatePageType
     */
    public function getGuiFormCreatePageType($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreatePageType');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreatePixel
     */
    public function getGuiFormCreatePixel($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreatePixel');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreateRelation
     */
    public function getGuiFormCreateRelation($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreateRelation');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_CreateSetting
     */
    public function getGuiFormCreateSetting($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_CreateSetting');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Form_SelectLibrary
     */
    public function getGuiFormSelectLibrary($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Form_SelectLibrary');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Grid_ExclusivityGroupIndex
     */
    public function getGuiGridExclusivityGroupIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Grid_ExclusivityGroupIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Grid_InstanceIndex
     */
    public function getGuiGridInstanceIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Grid_InstanceIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Grid_PageTypeIndex
     */
    public function getGuiGridPageTypeIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Grid_PageTypeIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Grid_RelationIndex
     */
    public function getGuiGridRelationIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Grid_RelationIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Tracking_Component_Gui_Grid_SettingIndex
     */
    public function getGuiGridSettingIndex($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Gui_Grid_SettingIndex');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_Exclusivity
     */
    public function getModelExclusivity()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_Exclusivity');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_ExclusivityGroup
     */
    public function getModelExclusivityGroup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_ExclusivityGroup');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_File_StaticHelper
     */
    public function getModelFileStaticHelper()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_File_StaticHelper');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_File
     */
    public function getModelFile()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_File');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_Instance
     */
    public function getModelInstance()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_Instance');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_Library
     */
    public function getModelLibrary()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_Library');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Model_PageType
     */
    public function getModelPageType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Model_PageType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Tracking_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Tracking_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
