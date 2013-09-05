<?php



/**
 * This class defines the structure of the 'sao_fulfillment_shipping_tracking' table.
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
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingTrackingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentShippingTrackingTableMap';

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
        $this->setName('sao_fulfillment_shipping_tracking');
        $this->setPhpName('SaoFulfillmentShippingTracking');

        $method = 'getSaoFulfillmentShippingTracking';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_shipping_tracking', 'IdShippingTracking', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_shipping_agent', 'FkShippingAgent', 'INTEGER', 'sao_fulfillment_shipping_agent', 'id_shipping_agent', true, null, null);
        $this->addForeignKey('fk_quote', 'FkQuote', 'INTEGER', 'sao_fulfillment_quote', 'id_quote', true, null, null);
        $this->addColumn('tracking_number', 'TrackingNumber', 'VARCHAR', false, 50, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', RelationMap::MANY_TO_ONE, array('fk_quote' => 'id_quote', ), null, null);
        $this->addRelation('ShippingAgent', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent', RelationMap::MANY_TO_ONE, array('fk_shipping_agent' => 'id_shipping_agent', ), null, null);
        $this->addRelation('TrackingStatus', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory', RelationMap::ONE_TO_MANY, array('id_shipping_tracking' => 'fk_shipping_tracking', ), null, null, 'TrackingStatuses');
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingTrackingTableMap
