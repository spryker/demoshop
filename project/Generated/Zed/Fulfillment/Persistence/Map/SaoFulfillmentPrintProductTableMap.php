<?php



/**
 * This class defines the structure of the 'sao_fulfillment_print_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.map
 */
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentPrintProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentPrintProductTableMap';

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
        $this->setName('sao_fulfillment_print_product');
        $this->setPhpName('SaoFulfillmentPrintProduct');
        $this->setClassname('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct');
        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_print_product', 'IdPrintProduct', 'INTEGER', true, null, null);
        $this->addColumn('legacy_product_id', 'LegacyProductId', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_option', 'FkOption', 'INTEGER', 'pac_catalog_option', 'id_catalog_option', false, null, null);
        $this->addForeignKey('fk_provider', 'FkProvider', 'INTEGER', 'sao_fulfillment_provider', 'id_provider', true, null, null);
        $this->addColumn('provider_product_id', 'ProviderProductId', 'INTEGER', true, null, null);
        $this->addColumn('vendor_price', 'VendorPrice', 'INTEGER', true, null, 0);
        $this->addColumn('artist_cost', 'ArtistCost', 'INTEGER', true, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('FulfillmentProvider', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider', RelationMap::MANY_TO_ONE, array('fk_provider' => 'id_provider', ), null, null);
        $this->addRelation('Option', 'ProjectA_Zed_Catalog_Persistence_PacCatalogOption', RelationMap::MANY_TO_ONE, array('fk_option' => 'id_catalog_option', ), null, null);
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentPrintProductTableMap
