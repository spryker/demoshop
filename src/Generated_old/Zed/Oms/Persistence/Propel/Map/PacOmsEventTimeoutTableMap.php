<?php



/**
 * This class defines the structure of the 'pac_oms_event_timeout' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.map
 */
class Generated_Zed_Oms_Persistence_Propel_Map_PacOmsEventTimeoutTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Oms/Persistence/Propel.Map.PacOmsEventTimeoutTableMap';

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
        $this->setName('pac_oms_event_timeout');
        $this->setPhpName('PacOmsEventTimeout');

        $method = 'loadPacOmsEventTimeout';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_oms_event_timeout', 'IdOmsEventTimeout', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addForeignKey('fk_oms_order_item_status', 'FkOmsOrderItemStatus', 'INTEGER', 'pac_oms_order_item_status', 'id_oms_order_item_status', true, null, null);
        $this->addColumn('timeout', 'Timeout', 'TIMESTAMP', true, null, null);
        $this->addColumn('event', 'Event', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('Status', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus', RelationMap::MANY_TO_ONE, array('fk_oms_order_item_status' => 'id_oms_order_item_status', ), null, null);
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

} // Generated_Zed_Oms_Persistence_Propel_Map_PacOmsEventTimeoutTableMap
