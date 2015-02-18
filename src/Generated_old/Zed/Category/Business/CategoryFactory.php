<?php 

namespace Generated\Zed\Category\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CategoryFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Category\Business\CategoryFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\CategoryFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Category\Business\CategorySettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\CategorySettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Category\Business\Exporter\KeyValue\CategoriesExporter
     */
    public function createExporterKeyValueCategoriesExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Exporter\KeyValue\CategoriesExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Facade_Attribute
     */
    public function createFacadeAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Facade_Attribute');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Facade_AttributeKey
     */
    public function createFacadeAttributeKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Facade_AttributeKey');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Facade_Name
     */
    public function createFacadeName()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Facade_Name');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Facade_Scope
     */
    public function createFacadeScope()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Facade_Scope');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $categoryId
     * @param $availableCategoryTypeOptions
     * @param $options (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\Attribute
     */
    public function createGuiFormAttribute($categoryId, $availableCategoryTypeOptions, $options = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\Attribute');
        $model = new $class($categoryId, $availableCategoryTypeOptions, $options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $attributeTypeOptions
     * @param $scopeOptions
     * @param $options (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\AttributeKey
     */
    public function createGuiFormAttributeKey($attributeTypeOptions, $scopeOptions, $options = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\AttributeKey');
        $model = new $class($attributeTypeOptions, $scopeOptions, $options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource (optional) default: null
     * @param \Symfony\Component\HttpFoundation\Request $request (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\CategoryName
     */
    public function createGuiFormCategoryName(\ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource = null, \Symfony\Component\HttpFoundation\Request $request = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\CategoryName');
        $model = new $class($dataSource, $request);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource (optional) default: null
     * @param \Symfony\Component\HttpFoundation\Request $request (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\Move
     */
    public function createGuiFormMove(\ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource = null, \Symfony\Component\HttpFoundation\Request $request = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\Move');
        $model = new $class($dataSource, $request);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource (optional) default: null
     * @param \Symfony\Component\HttpFoundation\Request $request (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\Node
     */
    public function createGuiFormNode(\ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource = null, \Symfony\Component\HttpFoundation\Request $request = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\Node');
        $model = new $class($dataSource, $request);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource (optional) default: null
     * @param \Symfony\Component\HttpFoundation\Request $request (optional) default: null
     * @return \ProjectA\Zed\Category\Business\Gui\Form\Scope
     */
    public function createGuiFormScope(\ProjectA_Zed_Library_Gui_Form_DataSource_Interface $dataSource = null, \Symfony\Component\HttpFoundation\Request $request = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Gui\Form\Scope');
        $model = new $class($dataSource, $request);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Category\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Category\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Model_Attribute
     */
    public function createModelAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Model_Attribute');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Model_AttributeKey
     */
    public function createModelAttributeKey()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Model_AttributeKey');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Category\Business\Model\Category
     */
    public function createModelCategory()
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Model\Category');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Category\Business\Model\Name
     */
    public function createModelName()
    {
        $class = $this->transformClassName('ProjectA\Zed\Category\Business\Model\Name');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Category_Business_Model_Scope
     */
    public function createModelScope()
    {
        $class = $this->transformClassName('ProjectA_Zed_Category_Business_Model_Scope');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
