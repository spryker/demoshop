<?php



/**
 * This class defines the structure of the 'pac_catalog_product_option' table.
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
class Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogProductOptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Catalog/Persistence/Propel.Map.PacCatalogProductOptionTableMap';

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
        $this->setName('pac_catalog_product_option');
        $this->setPhpName('PacCatalogProductOption');

        $method = 'loadPacCatalogProductOption';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('fk_catalog_product', 'FkCatalogProduct', 'INTEGER' , 'pac_catalog_product', 'id_catalog_product', true, null, null);
        $this->addForeignPrimaryKey('fk_catalog_option', 'FkCatalogOption', 'INTEGER' , 'pac_catalog_option', 'id_catalog_option', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('fk_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('Option', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogOption', RelationMap::MANY_TO_ONE, array('fk_catalog_option' => 'id_catalog_option', ), null, null);
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

} // Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogProductOptionTableMap
