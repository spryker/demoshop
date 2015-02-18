<?php



/**
 * This class defines the structure of the 'pac_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map
 */
class Generated_Zed_Product_Persistence_Propel_Map_PacProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacProductTableMap';

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
        $this->setName('pac_product');
        $this->setPhpName('PacProduct');

        $method = 'loadPacProduct';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        $this->addForeignKey('abstract_product_id', 'AbstractProductId', 'INTEGER', 'pac_abstract_product', 'abstract_product_id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacAbstractProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct', RelationMap::MANY_TO_ONE, array('abstract_product_id' => 'abstract_product_id', ), null, null);
        $this->addRelation('PacLocalizedProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes', RelationMap::ONE_TO_MANY, array('product_id' => 'product_id', ), 'CASCADE', 'CASCADE', 'PacLocalizedProductAttributess');
        $this->addRelation('PacProductToBundleRelatedByProductId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle', RelationMap::ONE_TO_MANY, array('product_id' => 'product_id', ), null, null, 'PacProductToBundlesRelatedByProductId');
        $this->addRelation('BundleProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle', RelationMap::ONE_TO_MANY, array('product_id' => 'related_product_id', ), null, null, 'BundleProducts');
        $this->addRelation('PacProductCategory', 'ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory', RelationMap::ONE_TO_MANY, array('product_id' => 'fk_product', ), null, null, 'PacProductCategories');
        $this->addRelation('PacSearchableProducts', 'ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts', RelationMap::ONE_TO_MANY, array('product_id' => 'fk_product', ), null, null, 'PacSearchableProductss');
        $this->addRelation('StockProduct', 'ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct', RelationMap::ONE_TO_MANY, array('product_id' => 'fk_product', ), null, null, 'StockProducts');
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
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Product_Persistence_Propel_Map_PacProductTableMap
