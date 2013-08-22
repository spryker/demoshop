<?php



/**
 * This class defines the structure of the 'sao_fulfillment_provider' table.
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
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentProviderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentProviderTableMap';

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
        $this->setName('sao_fulfillment_provider');
        $this->setPhpName('SaoFulfillmentProvider');
        $this->setClassname('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider');
        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_provider', 'IdProvider', 'INTEGER', true, null, null);
        $this->addColumn('legacy_id', 'LegacyId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('short_name', 'ShortName', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', RelationMap::ONE_TO_MANY, array('id_provider' => 'fk_fulfillment_provider', ), null, null, 'Quotes');
        $this->addRelation('PrintProduct', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct', RelationMap::ONE_TO_MANY, array('id_provider' => 'fk_provider', ), null, null, 'PrintProducts');
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentProviderTableMap
