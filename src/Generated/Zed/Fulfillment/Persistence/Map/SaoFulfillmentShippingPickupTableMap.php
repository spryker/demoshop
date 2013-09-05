<?php



/**
 * This class defines the structure of the 'sao_fulfillment_shipping_pickup' table.
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
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingPickupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentShippingPickupTableMap';

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
        $this->setName('sao_fulfillment_shipping_pickup');
        $this->setPhpName('SaoFulfillmentShippingPickup');

        $method = 'getSaoFulfillmentShippingPickup';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_sales_order_item', 'IdSalesOrderItem', 'INTEGER' , 'sao_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('ready_time', 'ReadyTime', 'TIME', true, null, null);
        $this->addColumn('close_time', 'CloseTime', 'TIME', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItem', RelationMap::MANY_TO_ONE, array('id_sales_order_item' => 'id_sales_order_item', ), null, null);
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentShippingPickupTableMap
