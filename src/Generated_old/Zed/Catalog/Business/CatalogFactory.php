<?php 

namespace Generated\Zed\Catalog\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CatalogFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \Pyz\Zed\Catalog\Business\CatalogFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\CatalogFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\CatalogSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\CatalogSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Exporter\KeyValue\BrandsExporter
     */
    public function createExporterKeyValueBrandsExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\KeyValue\BrandsExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Exporter\KeyValue\ProductOptionsExporter
     */
    public function createExporterKeyValueProductOptionsExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\KeyValue\ProductOptionsExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $filterAttributes
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundleAttributePartial
     */
    public function createExporterQueryBuilderPartialBundleAttributePartial($externalJoinAlias, $filterAttributes, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundleAttributePartial');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundlePartial
     */
    public function createExporterQueryBuilderPartialBundlePartial()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundlePartial');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet
     * @param $column
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundleProductColumnPartial
     */
    public function createExporterQueryBuilderPartialBundleProductColumnPartial($externalJoinAlias, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet, $column)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\BundleProductColumnPartial');
        $model = new $class($externalJoinAlias, $attributeSet, $column);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $filterAttributes
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigAttributePartial
     */
    public function createExporterQueryBuilderPartialConfigAttributePartial($externalJoinAlias, $filterAttributes, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigAttributePartial');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigPartial
     */
    public function createExporterQueryBuilderPartialConfigPartial()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigPartial');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $externalJoinColumn
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigPricePartial
     */
    public function createExporterQueryBuilderPartialConfigPricePartial($externalJoinAlias, $externalJoinColumn)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ConfigPricePartial');
        $model = new $class($externalJoinAlias, $externalJoinColumn);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $externalJoinColumn
     * @param $internalJoinColumn
     * @param $joinType (optional) default: 'INNER'
     * @param $selectColumns (optional) default: array(
     *     
     * )
     * @param $whereColumns (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\PhysicalStockPartial
     */
    public function createExporterQueryBuilderPartialPhysicalStockPartial($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType = 'INNER', $selectColumns = array(), $whereColumns = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\PhysicalStockPartial');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $internalJoinColumn, $joinType, $selectColumns, $whereColumns);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $externalJoinColumn
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\PricePartial
     */
    public function createExporterQueryBuilderPartialPricePartial($externalJoinAlias, $externalJoinColumn)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\PricePartial');
        $model = new $class($externalJoinAlias, $externalJoinColumn);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $externalJoinColumn
     * @param $columnNames (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ProductImagePartial
     */
    public function createExporterQueryBuilderPartialProductImagePartial($externalJoinAlias, $externalJoinColumn, $columnNames = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\ProductImagePartial');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $columnNames);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $filterAttributes
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\SimpleAttributePartial
     */
    public function createExporterQueryBuilderPartialSimpleAttributePartial($externalJoinAlias, $filterAttributes, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\SimpleAttributePartial');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $filterAttributes
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\SingleAttributePartial
     */
    public function createExporterQueryBuilderPartialSingleAttributePartial($externalJoinAlias, $filterAttributes, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\SingleAttributePartial');
        $model = new $class($externalJoinAlias, $filterAttributes, $attributeSet);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $externalJoinAlias
     * @param $externalJoinColumn
     * @param $joinType (optional) default: 'INNER'
     * @param $selectColumns (optional) default: array(
     *     
     * )
     * @param $whereColumns (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\YvesKvUpdatePartial
     */
    public function createExporterQueryBuilderPartialYvesKvUpdatePartial($externalJoinAlias, $externalJoinColumn, $joinType = 'INNER', $selectColumns = array(), $whereColumns = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Exporter\QueryBuilderPartial\YvesKvUpdatePartial');
        $model = new $class($externalJoinAlias, $externalJoinColumn, $joinType, $selectColumns, $whereColumns);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Facade\Attribute
     */
    public function createFacadeAttribute()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Facade\Attribute');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Facade_Gui
     */
    public function createFacadeGui()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Facade_Gui');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Facade_GuiProduct
     */
    public function createFacadeGuiProduct()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Facade_GuiProduct');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_Attribute
     */
    public function createGuiCrudAttribute()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_Attribute');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $groupId
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeGroup
     */
    public function createGuiCrudAttributeGroup($groupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeGroup');
        $model = new $class($groupId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeSet
     */
    public function createGuiCrudAttributeSet()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeSet');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $attributeSetId
     * @param $groupId
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeSetGroup
     */
    public function createGuiCrudAttributeSetGroup($attributeSetId, $groupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_AttributeSetGroup');
        $model = new $class($attributeSetId, $groupId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_Group
     */
    public function createGuiCrudGroup()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_Group');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_NewProduct
     */
    public function createGuiCrudNewProduct()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_NewProduct');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_ValueOptionSingle
     */
    public function createGuiCrudValueOptionSingle()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_ValueOptionSingle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Crud_ValueType
     */
    public function createGuiCrudValueType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Crud_ValueType');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_Attribute
     */
    public function createGuiFormAttribute($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_Attribute');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options
     * @param $crud
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_AttributeGroup
     */
    public function createGuiFormAttributeGroup($options, $crud)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_AttributeGroup');
        $model = new $class($options, $crud);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_AttributeSet
     */
    public function createGuiFormAttributeSet($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_AttributeSet');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options
     * @param $crud
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_AttributeSetGroup
     */
    public function createGuiFormAttributeSetGroup($options, $crud)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_AttributeSetGroup');
        $model = new $class($options, $crud);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_Group
     */
    public function createGuiFormGroup($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_Group');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_Image
     */
    public function createGuiFormImage($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_Image');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_NewProduct
     */
    public function createGuiFormNewProduct($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_NewProduct');
        $model = new $class($options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $crud
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_ValueOptionSingle
     */
    public function createGuiFormValueOptionSingle($crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_ValueOptionSingle');
        $model = new $class($crud, $options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $crud
     * @param $options (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Gui_Form_ValueType
     */
    public function createGuiFormValueType($crud, $options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Form_ValueType');
        $model = new $class($crud, $options);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $config
     * @param $selectedGroupId
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeGroups
     */
    public function createGuiGridAttributeGroups($config, $selectedGroupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeGroups');
        $model = new $class($config, $selectedGroupId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_Attributes
     */
    public function createGuiGridAttributes()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_Attributes');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $config
     * @param $selectedAttributeSetId
     * @param $selectedGroupId
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeSetGroups
     */
    public function createGuiGridAttributeSetGroups($config, $selectedAttributeSetId, $selectedGroupId)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeSetGroups');
        $model = new $class($config, $selectedAttributeSetId, $selectedGroupId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeSets
     */
    public function createGuiGridAttributeSets()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_AttributeSets');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_Groups
     */
    public function createGuiGridGroups()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_Groups');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_ValueOptionSingle
     */
    public function createGuiGridValueOptionSingle()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_ValueOptionSingle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Catalog_Business_Gui_Grid_ValueType
     */
    public function createGuiGridValueType()
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Gui_Grid_ValueType');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Internal\DemoData\CatalogInstall
     */
    public function createInternalDemoDataCatalogInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Internal\DemoData\CatalogInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeGroupNotFoundException
     */
    public function createModelAttributeExceptionAttributeGroupNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeGroupNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeNotFoundException
     */
    public function createModelAttributeExceptionAttributeNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeSetGroupNotFoundException
     */
    public function createModelAttributeExceptionAttributeSetGroupNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeSetGroupNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeSetNotFoundException
     */
    public function createModelAttributeExceptionAttributeSetNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\AttributeSetNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\GroupNotFoundException
     */
    public function createModelAttributeExceptionGroupNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\GroupNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $id
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\ValueTypeNotFoundException
     */
    public function createModelAttributeExceptionValueTypeNotFoundException($id)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Exception\ValueTypeNotFoundException');
        $model = new $class($id);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\AttributeManager
     */
    public function createModelAttributeManagerAttributeManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\AttributeManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\AttributeSetManager
     */
    public function createModelAttributeManagerAttributeSetManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\AttributeSetManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\GroupManager
     */
    public function createModelAttributeManagerGroupManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\GroupManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\ValueTypeManager
     */
    public function createModelAttributeManagerValueTypeManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\Manager\ValueTypeManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\ProductAttributeCollection
     */
    public function createModelAttributeProductAttributeCollection()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\ProductAttributeCollection');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $attribute
     * @param \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Attribute\ProductAttributeMulti
     */
    public function createModelAttributeProductAttributeMulti(\ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute $attribute, \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Attribute\ProductAttributeMulti');
        $model = new $class($attribute, $product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cache\Builder\BundleBuilder
     */
    public function createModelCacheBuilderBundleBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cache\Builder\BundleBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cache\Builder\ConfigBuilder
     */
    public function createModelCacheBuilderConfigBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cache\Builder\ConfigBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cache\Builder\SimpleBuilder
     */
    public function createModelCacheBuilderSimpleBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cache\Builder\SimpleBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cache\Builder\SingleBuilder
     */
    public function createModelCacheBuilderSingleBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cache\Builder\SingleBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cache\Builder
     */
    public function createModelCacheBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cache\Builder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Cart
     */
    public function createModelCart()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Cart');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Category
     */
    public function createModelCategory()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Category');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\Bundle\BundleProductComposite
     */
    public function createModelCompositeBundleBundleProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\Bundle\BundleProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\Bundle\BundleReadOnlyProductComposite
     */
    public function createModelCompositeBundleBundleReadOnlyProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\Bundle\BundleReadOnlyProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\CompositeBuilder
     */
    public function createModelCompositeCompositeBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\CompositeBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigProductComposite
     */
    public function createModelCompositeConfigSimpleConfigProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigReadOnlyProductComposite
     */
    public function createModelCompositeConfigSimpleConfigReadOnlyProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigReadOnlyProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $simpleProduct
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $configProduct
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigSimpleReadOnlyProductComposite
     */
    public function createModelCompositeConfigSimpleConfigSimpleReadOnlyProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $simpleProduct, \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $configProduct)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\ConfigSimpleReadOnlyProductComposite');
        $model = new $class($simpleProduct, $configProduct);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\SimpleProductComposite
     */
    public function createModelCompositeConfigSimpleSimpleProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\SimpleProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\SimpleReadOnlyProductComposite
     */
    public function createModelCompositeConfigSimpleSimpleReadOnlyProductComposite(\ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite $product)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ConfigSimple\SimpleReadOnlyProductComposite');
        $model = new $class($product);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite
     */
    public function createModelCompositeProductComposite(\ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite');
        $model = new $class($productEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity
     * @param $attributes
     * @return \ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite
     */
    public function createModelCompositeReadOnlyProductComposite(\ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity, $attributes)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Composite\ReadOnlyProductComposite');
        $model = new $class($productEntity, $attributes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Creator
     */
    public function createModelCreator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Creator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $code
     * @param \Exception $previous (optional) default: null
     * @return \ProjectA_Zed_Catalog_Business_Model_Exception_ExceptionAlreadyExist
     */
    public function createModelExceptionExceptionAlreadyExist($code = 0, \Exception $previous = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Catalog_Business_Model_Exception_ExceptionAlreadyExist');
        $model = new $class($code, $previous);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param $filterParameter
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\FkAttributeFilter
     */
    public function createModelFilterFkAttributeFilter(\Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\FkAttributeFilter');
        $model = new $class($iterator, $filterParameter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param $filterParameter
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\FkAttributeSetFilter
     */
    public function createModelFilterFkAttributeSetFilter(\Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\FkAttributeSetFilter');
        $model = new $class($iterator, $filterParameter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param $filterParameter
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\FkGroupFilter
     */
    public function createModelFilterFkGroupFilter(\Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\FkGroupFilter');
        $model = new $class($iterator, $filterParameter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param $filterParameter
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\FkProductFilter
     */
    public function createModelFilterFkProductFilter(\Iterator $iterator, $filterParameter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\FkProductFilter');
        $model = new $class($iterator, $filterParameter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup $group
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\ValueTypeByGroupFilter
     */
    public function createModelFilterValueTypeByGroupFilter(\Iterator $iterator, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogGroup $group)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\ValueTypeByGroupFilter');
        $model = new $class($iterator, $group);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $iterator
     * @param \PropelCollection $groups
     * @return \ProjectA\Zed\Catalog\Business\Model\Filter\ValueTypeByGroupsFilter
     */
    public function createModelFilterValueTypeByGroupsFilter(\Iterator $iterator, \PropelCollection $groups)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Filter\ValueTypeByGroupsFilter');
        $model = new $class($iterator, $groups);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Finder
     */
    public function createModelFinder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Finder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Filter
     */
    public function createModelImportProductFilter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Filter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Process
     */
    public function createModelImportProductProcess()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Process');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @param $fieldNames
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $productEntity (optional) default: null
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet (optional) default: null
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Context
     */
    public function createModelImportProductValidatorWorkflowContext($productData, $fieldNames, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct $productEntity = null, \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet $attributeSet = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Context');
        $model = new $class($productData, $fieldNames, $productEntity, $attributeSet);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewSingleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateNewSingleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewSingleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateSingleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateUpdateSingleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateSingleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Insert\ValidateBaseFieldsTask
     */
    public function createModelImportProductValidatorWorkflowTaskInsertValidateBaseFieldsTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Insert\ValidateBaseFieldsTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Insert\ValidateMandatoryGroupTask
     */
    public function createModelImportProductValidatorWorkflowTaskInsertValidateMandatoryGroupTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Insert\ValidateMandatoryGroupTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\SetAttributeSetToContextTask
     */
    public function createModelImportProductValidatorWorkflowTaskSetAttributeSetToContextTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\SetAttributeSetToContextTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Update\ValidateNoAttributeSetChangeTask
     */
    public function createModelImportProductValidatorWorkflowTaskUpdateValidateNoAttributeSetChangeTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\Update\ValidateNoAttributeSetChangeTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateAttributeOptionsExistTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateAttributeOptionsExistTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateAttributeOptionsExistTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateAttributeSetExistsTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateAttributeSetExistsTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateAttributeSetExistsTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $bundleProductReferenceFieldName
     * @param $delimiter (optional) default: '|'
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateBundleProductReferenceExistsTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateBundleProductReferenceExistsTask($bundleProductReferenceFieldName, $delimiter = '|')
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateBundleProductReferenceExistsTask');
        $model = new $class($bundleProductReferenceFieldName, $delimiter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateBundleTypeTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateBundleTypeTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateBundleTypeTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateCategoriesExistTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateCategoriesExistTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateCategoriesExistTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateProductOptionsExistTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateProductOptionsExistTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateProductOptionsExistTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateUnknownFieldsTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateUnknownFieldsTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateUnknownFieldsTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateVarietyExistsTask
     */
    public function createModelImportProductValidatorWorkflowTaskValidateVarietyExistsTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Task\ValidateVarietyExistsTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\TaskInvoker
     */
    public function createModelImportProductValidatorWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\TaskInvoker');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator
     */
    public function createModelImportProductValidator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Validator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product
     * @param $productData
     * @param $fieldNames
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Context
     */
    public function createModelImportProductWriterWorkflowContext(\ProjectA\Zed\Catalog\Business\Model\Composite\ProductComposite $product, $productData, $fieldNames)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Context');
        $model = new $class($product, $productData, $fieldNames);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteSingleProduct
     */
    public function createModelImportProductWriterWorkflowDefinitionWriteSingleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteSingleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddAttributesTask
     */
    public function createModelImportProductWriterWorkflowTaskAddAttributesTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddAttributesTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddCategoriesTask
     */
    public function createModelImportProductWriterWorkflowTaskAddCategoriesTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddCategoriesTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddFloatPriceTask
     */
    public function createModelImportProductWriterWorkflowTaskAddFloatPriceTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddFloatPriceTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddOptionsTask
     */
    public function createModelImportProductWriterWorkflowTaskAddOptionsTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddOptionsTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddStockTask
     */
    public function createModelImportProductWriterWorkflowTaskAddStockTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddStockTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddTouchEntryTask
     */
    public function createModelImportProductWriterWorkflowTaskAddTouchEntryTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddTouchEntryTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\EnsureUniqueUrlTask
     */
    public function createModelImportProductWriterWorkflowTaskEnsureUniqueUrlTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\EnsureUniqueUrlTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\SaveTask
     */
    public function createModelImportProductWriterWorkflowTaskSaveTask()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\SaveTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\UpdateBundleProducts
     */
    public function createModelImportProductWriterWorkflowTaskUpdateBundleProducts()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\UpdateBundleProducts');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\TaskInvoker
     */
    public function createModelImportProductWriterWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\TaskInvoker');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer
     */
    public function createModelImportProductWriter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\Product\Writer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Import\ProductImport
     */
    public function createModelImportProductImport()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Import\ProductImport');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Price_Business_Interface_Pricing $price
     * @return \ProjectA\Zed\Catalog\Business\Model\Loader\PriceLoader
     */
    public function createModelLoaderPriceLoader(\ProjectA_Zed_Price_Business_Interface_Pricing $price)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Loader\PriceLoader');
        $model = new $class($price);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Stock\Business\Model\PhysicalInterface $stock
     * @return \ProjectA\Zed\Catalog\Business\Model\Loader\StockLoader
     */
    public function createModelLoaderStockLoader(\ProjectA\Zed\Stock\Business\Model\PhysicalInterface $stock)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Loader\StockLoader');
        $model = new $class($stock);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\FindOrCreateLoader
     */
    public function createModelLoaderValueTypeFindOrCreateLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\FindOrCreateLoader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\NewProductLoader
     */
    public function createModelLoaderValueTypeNewProductLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\NewProductLoader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\QueryLoader
     */
    public function createModelLoaderValueTypeQueryLoader()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Loader\ValueType\QueryLoader');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $valueTypes
     * @param $isReadyOnly (optional) default: true
     * @return \ProjectA\Zed\Catalog\Business\Model\ProductCollection
     */
    public function createModelProductCollection(\Iterator $valueTypes, $isReadyOnly = true)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\ProductCollection');
        $model = new $class($valueTypes, $isReadyOnly);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Iterator $valueTypes
     * @param $isReadyOnly (optional) default: true
     * @return \ProjectA\Zed\Catalog\Business\Model\ProductCollectionLazy
     */
    public function createModelProductCollectionLazy(\Iterator $valueTypes, $isReadyOnly = true)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\ProductCollectionLazy');
        $model = new $class($valueTypes, $isReadyOnly);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Model\QueryBuilder\AllOptionsQueryBuilder
     */
    public function createModelQueryBuilderAllOptionsQueryBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\QueryBuilder\AllOptionsQueryBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $prefix (optional) default: null
     * @param $suffix (optional) default: null
     * @return \ProjectA\Zed\Catalog\Business\Model\UrlGenerator
     */
    public function createModelUrlGenerator($prefix = null, $suffix = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\UrlGenerator');
        $model = new $class($prefix, $suffix);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $name
     * @return \ProjectA\Zed\Catalog\Business\Model\Value
     */
    public function createModelValue($name)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\Value');
        $model = new $class($name);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $valueType
     * @param \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity
     * @return \ProjectA\Zed\Catalog\Business\Model\ValueType
     */
    public function createModelValueType(\ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType $valueType, \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\ValueType');
        $model = new $class($valueType, $productEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity
     * @param $attributeName
     * @return \ProjectA\Zed\Catalog\Business\Model\ValueTypeProduct
     */
    public function createModelValueTypeProduct(\ProjectA\Zed\Catalog\Business\Model\ProductEntityInterface $productEntity, $attributeName)
    {
        $class = $this->transformClassName('ProjectA\Zed\Catalog\Business\Model\ValueTypeProduct');
        $model = new $class($productEntity, $attributeName);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsBundleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsBundleExporter()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsBundleExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsConfigExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsConfigExporter()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsConfigExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsSimpleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsSimpleExporter()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsSimpleExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsSingleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsSingleExporter()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\KeyValue\ProductsWithoutElectronicsSingleExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsBundle
     */
    public function createExporterQueryBuilderKeyValueProductsWithoutElectronicsBundle()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsBundle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsConfig
     */
    public function createExporterQueryBuilderKeyValueProductsWithoutElectronicsConfig()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsConfig');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSimple
     */
    public function createExporterQueryBuilderKeyValueProductsWithoutElectronicsSimple()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSimple');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSingle
     */
    public function createExporterQueryBuilderKeyValueProductsWithoutElectronicsSingle()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSingle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsBundle
     */
    public function createExporterQueryBuilderSolrProductsWithoutElectronicsBundle()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsBundle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsConfig
     */
    public function createExporterQueryBuilderSolrProductsWithoutElectronicsConfig()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsConfig');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsSimple
     */
    public function createExporterQueryBuilderSolrProductsWithoutElectronicsSimple()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsSimple');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsSingle
     */
    public function createExporterQueryBuilderSolrProductsWithoutElectronicsSingle()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsSingle');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\AttributeToAttributeGroupMapping
     */
    public function createInternalAttributeToAttributeGroupMapping()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\AttributeToAttributeGroupMapping');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\AttributeToVarietyMapping
     */
    public function createInternalAttributeToVarietyMapping()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\AttributeToVarietyMapping');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\AttributeValueTypeToAttributeSetGroupMapping
     */
    public function createInternalAttributeValueTypeToAttributeSetGroupMapping()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\AttributeValueTypeToAttributeSetGroupMapping');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\ImportOptionsForAttributes
     */
    public function createInternalImportOptionsForAttributes()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\ImportOptionsForAttributes');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Internal\ImportProductOptions
     */
    public function createInternalImportProductOptions()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Internal\ImportProductOptions');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewBundleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateNewBundleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewBundleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewConfigProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateNewConfigProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewConfigProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewSimpleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateNewSimpleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateNewSimpleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateBundleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateUpdateBundleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateBundleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateConfigProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateUpdateConfigProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateConfigProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateSimpleProduct
     */
    public function createModelImportProductValidatorWorkflowDefinitionValidateUpdateSimpleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Validator\Workflow\Definition\ValidateUpdateSimpleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteBundleProduct
     */
    public function createModelImportProductWriterWorkflowDefinitionWriteBundleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteBundleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteConfigProduct
     */
    public function createModelImportProductWriterWorkflowDefinitionWriteConfigProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteConfigProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $productData
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteSimpleProduct
     */
    public function createModelImportProductWriterWorkflowDefinitionWriteSimpleProduct($productData)
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Definition\WriteSimpleProduct');
        $model = new $class($productData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddStatusTask
     */
    public function createModelImportProductWriterWorkflowTaskAddStatusTask()
    {
        $class = $this->transformClassName('Pyz\Zed\Catalog\Business\Model\Import\Product\Writer\Workflow\Task\AddStatusTask');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
