<?php



/**
 * This class defines the structure of the 'pac_product_to_bundle' table.
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
class Generated_Zed_Product_Persistence_Propel_Map_PacProductToBundleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacProductToBundleTableMap';

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
        $this->setName('pac_product_to_bundle');
        $this->setPhpName('PacProductToBundle');

        $method = 'loadPacProductToBundle';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('product_id', 'ProductId', 'INTEGER' , 'pac_product', 'product_id', true, null, null);
        $this->addForeignPrimaryKey('related_product_id', 'RelatedProductId', 'INTEGER' , 'pac_product', 'product_id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProductRelatedByProductId', 'ProjectA_Zed_Product_Persistence_Propel_PacProduct', RelationMap::MANY_TO_ONE, array('product_id' => 'product_id', ), null, null);
        $this->addRelation('BundleProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProduct', RelationMap::MANY_TO_ONE, array('related_product_id' => 'product_id', ), null, null);
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

} // Generated_Zed_Product_Persistence_Propel_Map_PacProductToBundleTableMap
