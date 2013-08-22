<?php



/**
 * This class defines the structure of the 'sao_catalog_product_category_boost' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Catalog/Persistence.map
 */
class Generated_Zed_Catalog_Persistence_Map_SaoCatalogProductCategoryBoostTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.SaoCatalogProductCategoryBoostTableMap';

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
        $this->setName('sao_catalog_product_category_boost');
        $this->setPhpName('SaoCatalogProductCategoryBoost');
        $this->setClassname('Sao_Zed_Catalog_Persistence_SaoCatalogProductCategoryBoost');
        $this->setPackage('project/Sao/Zed/Catalog/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_product_category_boost', 'IdCatalogProductCategoryBoost', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_catalog_product_category', 'FkCatalogProductCategory', 'INTEGER', 'pac_catalog_product_category', 'id_catalog_product_category', true, null, null);
        $this->addColumn('boost', 'Boost', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductCategory', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductCategory', RelationMap::MANY_TO_ONE, array('fk_catalog_product_category' => 'id_catalog_product_category', ), 'CASCADE', null);
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

} // Generated_Zed_Catalog_Persistence_Map_SaoCatalogProductCategoryBoostTableMap
