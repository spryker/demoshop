<?php



/**
 * This class defines the structure of the 'sao_fulfillment_shipping_tracking_status_history' table.
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
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingTrackingStatusHistoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentShippingTrackingStatusHistoryTableMap';

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
        $this->setName('sao_fulfillment_shipping_tracking_status_history');
        $this->setPhpName('SaoFulfillmentShippingTrackingStatusHistory');
        $this->setClassname('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory');
        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_shipping_tracking_status_history', 'IdShippingTrackingStatusHistory', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_shipping_tracking', 'FkShippingTracking', 'INTEGER', 'sao_fulfillment_shipping_tracking', 'id_shipping_tracking', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 8, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 128, null);
        $this->addColumn('notification_timestamp', 'NotificationTimestamp', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tracking', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking', RelationMap::MANY_TO_ONE, array('fk_shipping_tracking' => 'id_shipping_tracking', ), null, null);
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingTrackingStatusHistoryTableMap
