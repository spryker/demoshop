<?php



/**
 * This class defines the structure of the 'sao_sales_order_item_notification' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemNotificationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.SaoSalesOrderItemNotificationTableMap';

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
        $this->setName('sao_sales_order_item_notification');
        $this->setPhpName('SaoSalesOrderItemNotification');
        $this->setClassname('Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification');
        $this->setPackage('project/Sao/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sao_sales_order_item_notification', 'IdSaoSalesOrderItemNotification', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addColumn('hash', 'Hash', 'VARCHAR', true, 32, null);
        $this->addColumn('event', 'Event', 'VARCHAR', true, 255, null);
        $this->addColumn('event_triggered', 'EventTriggered', 'ENUM', true, null, 'False');
        $this->getColumn('event_triggered', false)->setValueSet(array (
  0 => 'False',
  1 => 'True',
));
        $this->addColumn('status', 'Status', 'ENUM', true, null, 'Unknown');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'Disabled',
  1 => 'Enabled',
  2 => 'Unknown',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesOrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemNotificationTableMap
