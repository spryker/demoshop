<?php



/**
 * This class defines the structure of the 'pac_catalog_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.map
 */
class Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Catalog/Persistence/Propel.Map.PacCatalogProductTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pac_catalog_product');
        $this->setPhpName('PacCatalogProduct');

        $method = 'loadPacCatalogProduct';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_product', 'IdCatalogProduct', 'INTEGER', true, null, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('is_item', 'IsItem', 'BOOLEAN', true, 1, null);
        $this->addColumn('status', 'Status', 'CHAR', true, null, 'new');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'new',
  1 => 'approved',
  2 => 'changed',
  3 => 'deleted',
));
        $this->addColumn('variety', 'Variety', 'CHAR', true, null, null);
        $this->getColumn('variety', false)->setValueSet(array (
  0 => 'Single',
  1 => 'Config',
  2 => 'Simple',
  3 => 'Bundle',
));
        $this->addForeignKey('fk_catalog_attribute_set', 'FkCatalogAttributeSet', 'INTEGER', 'pac_catalog_attribute_set', 'id_catalog_attribute_set', true, null, null);
        $this->addColumn('cache', 'Cache', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AttributeSet', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeSet', RelationMap::MANY_TO_ONE, array('fk_catalog_attribute_set' => 'id_catalog_attribute_set', ), null, null);
        $this->addRelation('Bundle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle', RelationMap::ONE_TO_ONE, array('id_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('BundleProduct', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundleProduct', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'BundleProducts');
        $this->addRelation('SingleEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSingle', RelationMap::ONE_TO_ONE, array('id_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('ConfigEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductConfig', RelationMap::ONE_TO_ONE, array('id_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('SimpleEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductSimple', RelationMap::ONE_TO_ONE, array('id_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('OptionMulti', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'OptionMultis');
        $this->addRelation('OptionSingle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'OptionSingles');
        $this->addRelation('Integer', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueInteger', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'Integers');
        $this->addRelation('Timestamp', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTimestamp', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'Timestamps');
        $this->addRelation('Decimal', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueDecimal', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'Decimals');
        $this->addRelation('Text', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueText', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'Texts');
        $this->addRelation('Boolean', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueBoolean', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'Booleans');
        $this->addRelation('ProductCategory', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductCategory', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'ProductCategories');
        $this->addRelation('ProductOption', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductOption', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'ProductOptions');
        $this->addRelation('PacCmsBlockProduct', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'PacCmsBlockProducts');
        $this->addRelation('ProductImage', 'ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImage', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product', ), null, null, 'ProductImages');
        $this->addRelation('BundleProductBundle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductBundle', RelationMap::MANY_TO_MANY, array(), null, null, 'BundleProductBundles');
        $this->addRelation('Option', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption', RelationMap::MANY_TO_MANY, array(), null, null, 'Options');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogProductTableMap
