<?php



/**
 * This class defines the structure of the 'pac_oms_order_item_status' table.
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
class Generated_Zed_Oms_Persistence_Propel_Map_PacOmsOrderItemStatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Oms/Persistence/Propel.Map.PacOmsOrderItemStatusTableMap';

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
        $this->setName('pac_oms_order_item_status');
        $this->setPhpName('PacOmsOrderItemStatus');

        $method = 'loadPacOmsOrderItemStatus';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_oms_order_item_status', 'IdOmsOrderItemStatus', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('StatusHistory', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory', RelationMap::ONE_TO_MANY, array('id_oms_order_item_status' => 'fk_oms_order_item_status', ), null, null, 'StatusHistories');
        $this->addRelation('EventTimeout', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout', RelationMap::ONE_TO_MANY, array('id_oms_order_item_status' => 'fk_oms_order_item_status', ), null, null, 'EventTimeouts');
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_oms_order_item_status' => 'fk_oms_order_item_status', ), null, null, 'Orders');
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

} // Generated_Zed_Oms_Persistence_Propel_Map_PacOmsOrderItemStatusTableMap
