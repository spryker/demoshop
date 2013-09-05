<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Category_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Category_Component_Exporter_Memcache_Categories
     */
    public function getExporterMemcacheCategories()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Exporter_Memcache_Categories');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Facade_Attribute
     */
    public function getFacadeAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Facade_Attribute');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Facade_AttributeKey
     */
    public function getFacadeAttributeKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Facade_AttributeKey');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Facade_Name
     */
    public function getFacadeName()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Facade_Name');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Facade_Scope
     */
    public function getFacadeScope()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Facade_Scope');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $categoryId
     * @param mixed $availableCategoryTypeOptions
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_Attribute
     */
    public function getGuiFormAttribute($categoryId, $availableCategoryTypeOptions, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_Attribute');
        $model = new $class($categoryId, $availableCategoryTypeOptions, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $attributeTypeOptions
     * @param mixed $scopeOptions
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_AttributeKey
     */
    public function getGuiFormAttributeKey($attributeTypeOptions, $scopeOptions, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_AttributeKey');
        $model = new $class($attributeTypeOptions, $scopeOptions, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_CategoryName
     */
    public function getGuiFormCategoryName($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_CategoryName');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_Move
     */
    public function getGuiFormMove($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_Move');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_Node
     */
    public function getGuiFormNode($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_Node');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Form_Scope
     */
    public function getGuiFormScope($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Form_Scope');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Category_Persistence_PacCategory $categoryEntity
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Grid_Attribute
     */
    public function getGuiGridAttribute(ProjectA_Zed_Category_Persistence_PacCategory $categoryEntity, $config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Grid_Attribute');
        $model = new $class($categoryEntity, $config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Grid_AttributeKey
     */
    public function getGuiGridAttributeKey($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Grid_AttributeKey');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Category_Component_Gui_Grid_Scope
     */
    public function getGuiGridScope($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Gui_Grid_Scope');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Model_Attribute
     */
    public function getModelAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Model_Attribute');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Model_AttributeKey
     */
    public function getModelAttributeKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Model_AttributeKey');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Model_Category
     */
    public function getModelCategory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Model_Category');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Model_Name
     */
    public function getModelName()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Model_Name');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Category_Component_Model_Scope
     */
    public function getModelScope()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Component_Model_Scope');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Category_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Category_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
