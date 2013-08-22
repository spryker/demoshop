<?php



/**
 * This class defines the structure of the 'pac_catalog_option' table.
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
class Generated_Zed_Catalog_Persistence_Map_PacCatalogOptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.PacCatalogOptionTableMap';

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
        $this->setName('pac_catalog_option');
        $this->setPhpName('PacCatalogOption');
        $this->setClassname('ProjectA_Zed_Catalog_Persistence_PacCatalogOption');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_option', 'IdCatalogOption', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_catalog_option_type', 'FkCatalogOptionType', 'INTEGER', 'pac_catalog_option_type', 'id_catalog_option_type', true, null, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', false, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'INTEGER', false, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OptionType', 'ProjectA_Zed_Catalog_Persistence_PacCatalogOptionType', RelationMap::MANY_TO_ONE, array('fk_catalog_option_type' => 'id_catalog_option_type', ), null, null);
        $this->addRelation('ProductOption', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption', RelationMap::ONE_TO_MANY, array('id_catalog_option' => 'fk_catalog_option', ), null, null, 'ProductOptions');
        $this->addRelation('PrintProduct', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct', RelationMap::ONE_TO_MANY, array('id_catalog_option' => 'fk_option', ), null, null, 'PrintProducts');
        $this->addRelation('Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProduct', RelationMap::MANY_TO_MANY, array(), null, null, 'Products');
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

} // Generated_Zed_Catalog_Persistence_Map_PacCatalogOptionTableMap
