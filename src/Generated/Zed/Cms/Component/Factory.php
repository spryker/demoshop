<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Cms_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Cms_Component_Exporter_Memcache_Cms
     */
    public function getExporterMemcacheCms()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Exporter_Memcache_Cms');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Exporter_Memcache_Redirection
     */
    public function getExporterMemcacheRedirection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Exporter_Memcache_Redirection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_CatalogPage
     */
    public function getFacadeCatalogPage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_CatalogPage');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_Element
     */
    public function getFacadeElement()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_Element');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_ElementType
     */
    public function getFacadeElementType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_ElementType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_Media
     */
    public function getFacadeMedia()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_Media');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_PageType
     */
    public function getFacadePageType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_PageType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade_Redirection
     */
    public function getFacadeRedirection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade_Redirection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Crud_Element
     */
    public function getGuiCrudElement()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Crud_Element');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Crud_ElementType
     */
    public function getGuiCrudElementType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Crud_ElementType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Crud_Media
     */
    public function getGuiCrudMedia()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Crud_Media');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Crud_PageType
     */
    public function getGuiCrudPageType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Crud_PageType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Crud_Redirection
     */
    public function getGuiCrudRedirection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Crud_Redirection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_AllowedPageTypes
     */
    public function getGuiFormAllowedPageTypes($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_AllowedPageTypes');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_CreatePage
     */
    public function getGuiFormCreatePage($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_CreatePage');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_EditPage
     */
    public function getGuiFormEditPage($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_EditPage');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Element
     */
    public function getGuiFormElement($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Element');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Library_Crud $crud
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementType
     */
    public function getGuiFormElementType(ProjectA_Zed_Library_Crud $crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementType');
        $model = new $class($crud, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Code
     */
    public function getGuiFormElementTypesCode($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Code');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @param mixed $label
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_CSS
     */
    public function getGuiFormElementTypesCSS($name, $label)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_CSS');
        $model = new $class($name, $label);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @param mixed $label
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Html
     */
    public function getGuiFormElementTypesHtml($name, $label)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Html');
        $model = new $class($name, $label);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @param mixed $label
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Input
     */
    public function getGuiFormElementTypesInput($name, $label)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Input');
        $model = new $class($name, $label);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @param mixed $label
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_JS
     */
    public function getGuiFormElementTypesJS($name, $label)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_JS');
        $model = new $class($name, $label);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @param mixed $label
     * @return ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Textarea
     */
    public function getGuiFormElementTypesTextarea($name, $label)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_ElementTypes_Textarea');
        $model = new $class($name, $label);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Media
     */
    public function getGuiFormMedia($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Media');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_PageType
     */
    public function getGuiFormPageType($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_PageType');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Redirection
     */
    public function getGuiFormRedirection($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Redirection');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Renderer_Tabs
     */
    public function getGuiFormRendererTabs()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Renderer_Tabs');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Validator_AdditionalUrlPathParameter
     */
    public function getGuiFormValidatorAdditionalUrlPathParameter()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Validator_AdditionalUrlPathParameter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Validator_PageUrlPath
     */
    public function getGuiFormValidatorPageUrlPath()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Validator_PageUrlPath');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Gui_Form_Validator_UrlPath
     */
    public function getGuiFormValidatorUrlPath()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Validator_UrlPath');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Cms_Component_Gui_Form_Validator_UrlPathNotARedirectionSource
     */
    public function getGuiFormValidatorUrlPathNotARedirectionSource()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Form_Validator_UrlPathNotARedirectionSource');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_Element
     */
    public function getGuiGridElement($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_Element');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_ElementType
     */
    public function getGuiGridElementType($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_ElementType');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_Media
     */
    public function getGuiGridMedia($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_Media');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_Page
     */
    public function getGuiGridPage($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_Page');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_PageType
     */
    public function getGuiGridPageType($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_PageType');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Cms_Component_Gui_Grid_Redirection
     */
    public function getGuiGridRedirection($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Gui_Grid_Redirection');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_CatalogPage
     */
    public function getModelCatalogPage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_CatalogPage');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Element_Renderer_Css
     */
    public function getModelElementRendererCss()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Element_Renderer_Css');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Element_Renderer_Factory
     */
    public function getModelElementRendererFactory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Element_Renderer_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Element_Renderer_Javascript
     */
    public function getModelElementRendererJavascript()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Element_Renderer_Javascript');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Element
     */
    public function getModelElement()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Element');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_ElementType
     */
    public function getModelElementType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_ElementType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Media
     */
    public function getModelMedia()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Media');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Page
     */
    public function getModelPage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Page');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_PageType
     */
    public function getModelPageType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_PageType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Cms_Component_Model_Redirection
     */
    public function getModelRedirection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cms_Component_Model_Redirection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
