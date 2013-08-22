<?php



/**
 * This class defines the structure of the 'pac_price_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Price/Persistence.map
 */
class Generated_Zed_Price_Persistence_Map_PacPriceProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Price/Persistence.Map.PacPriceProductTableMap';

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
        $this->setName('pac_price_product');
        $this->setPhpName('PacPriceProduct');
        $this->setClassname('ProjectA_Zed_Price_Persistence_PacPriceProduct');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Price/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_price_product', 'IdPriceProduct', 'INTEGER', true, null, null);
        $this->addColumn('price', 'Price', 'BIGINT', true, null, 0);
        $this->addColumn('valid_from', 'ValidFrom', 'TIMESTAMP', true, null, null);
        $this->addColumn('valid_to', 'ValidTo', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('fk_catalog_product', 'FkCatalogProduct', 'INTEGER', 'pac_catalog_product', 'id_catalog_product', true, null, null);
        $this->addForeignKey('fk_price_type', 'FkPriceType', 'INTEGER', 'pac_price_type', 'id_price_type', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('fk_catalog_product' => 'id_catalog_product', ), null, null);
        $this->addRelation('PriceType', 'ProjectA_Zed_Price_Persistence_PacPriceType', RelationMap::MANY_TO_ONE, array('fk_price_type' => 'id_price_type', ), null, null);
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

} // Generated_Zed_Price_Persistence_Map_PacPriceProductTableMap
