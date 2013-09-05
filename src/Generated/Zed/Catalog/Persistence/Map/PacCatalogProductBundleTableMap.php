<?php



/**
 * This class defines the structure of the 'pac_catalog_product_bundle' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.map
 */
class Generated_Zed_Catalog_Persistence_Map_PacCatalogProductBundleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.PacCatalogProductBundleTableMap';

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
        $this->setName('pac_catalog_product_bundle');
        $this->setPhpName('PacCatalogProductBundle');

        $method = 'getPacCatalogProductBundle';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_catalog_product', 'IdCatalogProduct', 'INTEGER' , 'pac_catalog_product', 'id_catalog_product', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('id_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('BundleProduct', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductBundleProduct', RelationMap::ONE_TO_MANY, array('id_catalog_product' => 'fk_catalog_product_bundle', ), null, null, 'BundleProducts');
        $this->addRelation('BundleProductProduct', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProduct', RelationMap::MANY_TO_MANY, array(), null, null, 'BundleProductProducts');
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

} // Generated_Zed_Catalog_Persistence_Map_PacCatalogProductBundleTableMap
