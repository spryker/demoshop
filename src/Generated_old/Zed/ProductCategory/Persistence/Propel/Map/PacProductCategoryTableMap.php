<?php



/**
 * This class defines the structure of the 'pac_product_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductCategory/Persistence/Propel.map
 */
class Generated_Zed_ProductCategory_Persistence_Propel_Map_PacProductCategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/ProductCategory/Persistence/Propel.Map.PacProductCategoryTableMap';

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
        $this->setName('pac_product_category');
        $this->setPhpName('PacProductCategory');

        $method = 'loadPacProductCategory';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/ProductCategory/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('fk_product', 'FkProduct', 'INTEGER' , 'pac_product', 'product_id', true, null, null);
        $this->addForeignPrimaryKey('fk_category_node', 'FkCategoryNode', 'INTEGER' , 'pac_category_node', 'id_category_node', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCategoryNode', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode', RelationMap::MANY_TO_ONE, array('fk_category_node' => 'id_category_node', ), null, null);
        $this->addRelation('PacProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProduct', RelationMap::MANY_TO_ONE, array('fk_product' => 'product_id', ), null, null);
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

} // Generated_Zed_ProductCategory_Persistence_Propel_Map_PacProductCategoryTableMap
