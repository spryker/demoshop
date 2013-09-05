<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Catalog_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Catalog_Component_Exporter_Memcache_Brands
     */
    public function getExporterMemcacheBrands()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Exporter_Memcache_Brands');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Exporter_Memcache_ProductOptions
     */
    public function getExporterMemcacheProductOptions()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Exporter_Memcache_ProductOptions');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Facade_Gui');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Facade_GuiProduct
     */
    public function getFacadeGuiProduct()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Facade_GuiProduct');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_Attribute
     */
    public function getGuiCrudAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_Attribute');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $groupId
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeGroup
     */
    public function getGuiCrudAttributeGroup($groupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeGroup');
        $model = new $class($groupId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeSet
     */
    public function getGuiCrudAttributeSet()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeSet');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $attributeSetId
     * @param mixed $groupId
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeSetGroup
     */
    public function getGuiCrudAttributeSetGroup($attributeSetId, $groupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_AttributeSetGroup');
        $model = new $class($attributeSetId, $groupId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_Group
     */
    public function getGuiCrudGroup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_Group');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_Image
     */
    public function getGuiCrudImage()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_Image');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_NewProduct
     */
    public function getGuiCrudNewProduct()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_NewProduct');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_Product
     */
    public function getGuiCrudProduct()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_Product');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_ValueOptionSingle
     */
    public function getGuiCrudValueOptionSingle()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_ValueOptionSingle');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Crud_ValueType
     */
    public function getGuiCrudValueType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Crud_ValueType');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_Attribute
     */
    public function getGuiFormAttribute($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_Attribute');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options
     * @param mixed $crud
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_AttributeGroup
     */
    public function getGuiFormAttributeGroup($options, $crud)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_AttributeGroup');
        $model = new $class($options, $crud);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_AttributeSet
     */
    public function getGuiFormAttributeSet($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_AttributeSet');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options
     * @param mixed $crud
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_AttributeSetGroup
     */
    public function getGuiFormAttributeSetGroup($options, $crud)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_AttributeSetGroup');
        $model = new $class($options, $crud);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_Group
     */
    public function getGuiFormGroup($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_Group');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_Image
     */
    public function getGuiFormImage($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_Image');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_NewProduct
     */
    public function getGuiFormNewProduct($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_NewProduct');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $crud
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_Product
     */
    public function getGuiFormProduct($crud, $options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_Product');
        $model = new $class($crud, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_Renderer_Tabs
     */
    public function getGuiFormRendererTabs()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_Renderer_Tabs');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $crud
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_ValueOptionSingle
     */
    public function getGuiFormValueOptionSingle($crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_ValueOptionSingle');
        $model = new $class($crud, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $crud
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Form_ValueType
     */
    public function getGuiFormValueType($crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Form_ValueType');
        $model = new $class($crud, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config
     * @param mixed $selectedGroupId
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeGroups
     */
    public function getGuiGridAttributeGroups($config, $selectedGroupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeGroups');
        $model = new $class($config, $selectedGroupId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_Attributes
     */
    public function getGuiGridAttributes($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_Attributes');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config
     * @param mixed $selectedAttributeSetId
     * @param mixed $selectedGroupId
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeSetGroups
     */
    public function getGuiGridAttributeSetGroups($config, $selectedAttributeSetId, $selectedGroupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeSetGroups');
        $model = new $class($config, $selectedAttributeSetId, $selectedGroupId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeSets
     */
    public function getGuiGridAttributeSets($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_AttributeSets');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_Groups
     */
    public function getGuiGridGroups($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_Groups');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Grid_Product
     */
    public function getGuiGridProduct($config = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Grid_Product');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_ValueOptionSingle
     */
    public function getGuiGridValueOptionSingle($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_ValueOptionSingle');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Catalog_Component_Gui_Grid_ValueType
     */
    public function getGuiGridValueType($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Gui_Grid_ValueType');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Bundle
     */
    public function getModelBundle()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Bundle');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Cache
     */
    public function getModelCache()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Cache');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Cart
     */
    public function getModelCart()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Cart');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Category
     */
    public function getModelCategory()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Category');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Creator
     */
    public function getModelCreator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Creator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Crud
     */
    public function getModelCrud()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Crud');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Exporter_Query_AllOptions
     */
    public function getModelExporterQueryAllOptions()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Exporter_Query_AllOptions');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param mixed $filterParameter
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ByAttribute
     */
    public function getModelFilterByAttribute(Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ByAttribute');
        $model = new $class($iterator, $filterParameter);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param mixed $filterParameter
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ByAttributeSet
     */
    public function getModelFilterByAttributeSet(Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ByAttributeSet');
        $model = new $class($iterator, $filterParameter);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param mixed $filterParameter
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ByGroup
     */
    public function getModelFilterByGroup(Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ByGroup');
        $model = new $class($iterator, $filterParameter);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param mixed $filterParameter
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ByProduct
     */
    public function getModelFilterByProduct(Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ByProduct');
        $model = new $class($iterator, $filterParameter);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $group
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ValueTypeByGroup
     */
    public function getModelFilterValueTypeByGroup(Iterator $iterator, ProjectA_Zed_Catalog_Persistence_PacCatalogGroup $group)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ValueTypeByGroup');
        $model = new $class($iterator, $group);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $iterator
     * @param mixed $groupName
     * @return ProjectA_Zed_Catalog_Component_Model_Filter_ValueTypeByGroupName
     */
    public function getModelFilterValueTypeByGroupName(Iterator $iterator, $groupName)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Filter_ValueTypeByGroupName');
        $model = new $class($iterator, $groupName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Finder
     */
    public function getModelFinder()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Model_Finder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Price_Component_Interface_Pricing $price
     * @return ProjectA_Zed_Catalog_Component_Model_Price_Loader
     */
    public function getModelPriceLoader(ProjectA_Zed_Price_Component_Interface_Pricing $price)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Price_Loader');
        $model = new $class($price);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity
     * @return ProjectA_Zed_Catalog_Component_Model_Product
     */
    public function getModelProduct(ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Product');
        $model = new $class($productEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_ProductAttributeCollection
     */
    public function getModelProductAttributeCollection()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ProductAttributeCollection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute $attribute
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product
     * @return ProjectA_Zed_Catalog_Component_Model_ProductAttributeMulti
     */
    public function getModelProductAttributeMulti(ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute $attribute, ProjectA_Zed_Catalog_Component_Interface_ProductEntity $product)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ProductAttributeMulti');
        $model = new $class($attribute, $product);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $valueTypes
     * @param bool $isReadyOnly (optional) default: true
     * @return Sao_Zed_Catalog_Component_Model_ProductCollection
     */
    public function getModelProductCollection(Iterator $valueTypes, $isReadyOnly = true)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Model_ProductCollection');
        $model = new $class($valueTypes, $isReadyOnly);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Iterator $valueTypes
     * @param bool $isReadyOnly (optional) default: true
     * @return ProjectA_Zed_Catalog_Component_Model_ProductCollectionLazy
     */
    public function getModelProductCollectionLazy(Iterator $valueTypes, $isReadyOnly = true)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ProductCollectionLazy');
        $model = new $class($valueTypes, $isReadyOnly);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_ProductGroup
     */
    public function getModelProductGroup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ProductGroup');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity
     * @param mixed $attributes
     * @return ProjectA_Zed_Catalog_Component_Model_ProductReadOnly
     */
    public function getModelProductReadOnly(ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity, $attributes)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ProductReadOnly');
        $model = new $class($productEntity, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_RecreateProductCache
     */
    public function getModelRecreateProductCache()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_RecreateProductCache');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Stock_Component_Interface_Stock $stock
     * @return ProjectA_Zed_Catalog_Component_Model_Stock_Loader
     */
    public function getModelStockLoader(ProjectA_Zed_Stock_Component_Interface_Stock $stock)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Stock_Loader');
        $model = new $class($stock);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $name
     * @return ProjectA_Zed_Catalog_Component_Model_Value
     */
    public function getModelValue($name)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Value');
        $model = new $class($name);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_FindOrCreate
     */
    public function getModelValueTypeLoaderFindOrCreate()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_FindOrCreate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_NewProduct
     */
    public function getModelValueTypeLoaderNewProduct()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_NewProduct');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_Query
     */
    public function getModelValueTypeLoaderQuery()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ValueType_Loader_Query');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $valueType
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity
     * @return ProjectA_Zed_Catalog_Component_Model_ValueType
     */
    public function getModelValueType(ProjectA_Zed_Catalog_Persistence_PacCatalogValueType $valueType, ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ValueType');
        $model = new $class($valueType, $productEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity
     * @param mixed $attributeName
     * @return ProjectA_Zed_Catalog_Component_Model_ValueTypeProduct
     */
    public function getModelValueTypeProduct(ProjectA_Zed_Catalog_Component_Interface_ProductEntity $productEntity, $attributeName)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_ValueTypeProduct');
        $model = new $class($productEntity, $attributeName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $filterAttributes
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @return ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Attribute
     */
    public function getModelYvesQueryBuilderPartialAttribute($externalJoinAlias, $filterAttributes, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Attribute');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Bundle
     */
    public function getModelYvesQueryBuilderPartialBundle()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Bundle');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $filterAttributes
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @return
     * ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_BundleAttribute
     */
    public function getModelYvesQueryBuilderPartialBundleAttribute($externalJoinAlias, $filterAttributes, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_BundleAttribute');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet
     * @param mixed $column
     * @return
     * ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_BundleProductColumn
     */
    public function getModelYvesQueryBuilderPartialBundleProductColumn($externalJoinAlias, ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet $attributeSet, $column)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_BundleProductColumn');
        $model = new $class($externalJoinAlias, $attributeSet, $column);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $externalJoinColumn
     * @param string $joinType (optional) default: 'INNER'
     * @param array $selectColumns (optional) default: array()
     * @return ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Image
     */
    public function getModelYvesQueryBuilderPartialImage($externalJoinAlias, $externalJoinColumn, $joinType = 'INNER', $selectColumns = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Image');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $joinType, $selectColumns);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $externalJoinColumn
     * @param mixed $internalJoinColumn
     * @param string $joinType (optional) default: 'INNER'
     * @param array $selectColumns (optional) default: array()
     * @param array $whereColumns (optional) default: array()
     * @return
     * ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_PhysicalStock
     */
    public function getModelYvesQueryBuilderPartialPhysicalStock($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType = 'INNER', $selectColumns = array(), $whereColumns = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_PhysicalStock');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType, $selectColumns, $whereColumns);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $externalJoinColumn
     * @param mixed $internalJoinColumn
     * @param string $joinType (optional) default: 'INNER'
     * @param array $selectColumns (optional) default: array()
     * @param array $whereColumns (optional) default: array()
     * @return ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Price
     */
    public function getModelYvesQueryBuilderPartialPrice($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType = 'INNER', $selectColumns = array(), $whereColumns = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_Price');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType, $selectColumns, $whereColumns);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $externalJoinAlias
     * @param mixed $externalJoinColumn
     * @param string $joinType (optional) default: 'INNER'
     * @param array $selectColumns (optional) default: array()
     * @param array $whereColumns (optional) default: array()
     * @return
     * ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_YvesKvUpdate
     */
    public function getModelYvesQueryBuilderPartialYvesKvUpdate($externalJoinAlias, $externalJoinColumn, $joinType = 'INNER', $selectColumns = array(), $whereColumns = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilderPartial_YvesKvUpdate');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $joinType, $selectColumns, $whereColumns);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_Export
     */
    public function getGuiCrudExport()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_Export');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_Import
     */
    public function getGuiCrudImport()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_Import');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Gui_Crud_Supplier
     */
    public function getGuiCrudSupplier()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Crud_Supplier');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_Export
     */
    public function getGuiFormExport($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_Export');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_Import
     */
    public function getGuiFormImport($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_Import');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Catalog_Component_Gui_Form_Supplier
     */
    public function getGuiFormSupplier($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Gui_Form_Supplier');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Internal_AttributeToAttributeGroupMapping
     */
    public function getInternalAttributeToAttributeGroupMapping()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_AttributeToAttributeGroupMapping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping
     */
    public function getInternalAttributeToVarietyMapping()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Catalog_Component_Internal_AttributeValueTypeToAttributeSetGroupMapping
     */
    public function getInternalAttributeValueTypeToAttributeSetGroupMapping()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_AttributeValueTypeToAttributeSetGroupMapping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Internal_ImportOptionsForAttributes
     */
    public function getInternalImportOptionsForAttributes()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_ImportOptionsForAttributes');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Internal_ReverseInstall
     */
    public function getInternalReverseInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Internal_ReverseInstall');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Memcache_Artwork
     */
    public function getModelYvesQueryBuilderMemcacheArtwork()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Memcache_Artwork');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Manufacture
     */
    public function getModelYvesQueryBuilderSolrManufacture()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Manufacture');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Marketplace
     */
    public function getModelYvesQueryBuilderSolrMarketplace()
    {
        $class = $this->transformClassName('Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Marketplace');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
