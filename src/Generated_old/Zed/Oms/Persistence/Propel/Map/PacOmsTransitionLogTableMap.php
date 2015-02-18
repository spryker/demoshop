<?php



/**
 * This class defines the structure of the 'pac_oms_transition_log' table.
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
class Generated_Zed_Oms_Persistence_Propel_Map_PacOmsTransitionLogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Oms/Persistence/Propel.Map.PacOmsTransitionLogTableMap';

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
        $this->setName('pac_oms_transition_log');
        $this->setPhpName('PacOmsTransitionLog');

        $method = 'loadPacOmsTransitionLog';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_oms_transition_log', 'IdOmsTransitionLog', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addForeignKey('fk_acl_user', 'FkAclUser', 'INTEGER', 'pac_acl_user', 'id_acl_user', false, null, null);
        $this->addColumn('locked', 'Locked', 'BOOLEAN', false, 1, null);
        $this->addForeignKey('fk_oms_order_process', 'FkOmsOrderProcess', 'INTEGER', 'pac_oms_order_process', 'id_oms_order_process', false, null, null);
        $this->addColumn('event', 'Event', 'VARCHAR', false, 100, null);
        $this->addColumn('hostname', 'Hostname', 'VARCHAR', true, 128, null);
        $this->addColumn('module', 'Module', 'VARCHAR', true, 128, null);
        $this->addColumn('controller', 'Controller', 'VARCHAR', true, 128, null);
        $this->addColumn('action', 'Action', 'VARCHAR', true, 128, null);
        $this->addColumn('params', 'Params', 'ARRAY', true, null, null);
        $this->addColumn('source_state', 'SourceState', 'VARCHAR', false, 128, null);
        $this->addColumn('target_state', 'TargetState', 'VARCHAR', false, 128, null);
        $this->addColumn('commands', 'Commands', 'ARRAY', false, null, null);
        $this->addColumn('conditions', 'Conditions', 'ARRAY', false, null, null);
        $this->addColumn('error', 'Error', 'BOOLEAN', false, 1, null);
        $this->addColumn('error_message', 'ErrorMessage', 'VARCHAR', false, 1024, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('AclUser', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclUser', RelationMap::MANY_TO_ONE, array('fk_acl_user' => 'id_acl_user', ), null, null);
        $this->addRelation('Process', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess', RelationMap::MANY_TO_ONE, array('fk_oms_order_process' => 'id_oms_order_process', ), null, null);
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

} // Generated_Zed_Oms_Persistence_Propel_Map_PacOmsTransitionLogTableMap
