<?php



/**
 * This class defines the structure of the 'pac_sales_order_process' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_PacSalesOrderProcessTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesOrderProcessTableMap';

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
        $this->setName('pac_sales_order_process');
        $this->setPhpName('PacSalesOrderProcess');
        $this->setClassname('ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess');
        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_process', 'IdSalesOrderProcess', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog', RelationMap::ONE_TO_MANY, array('id_sales_order_process' => 'fk_sales_order_process', ), null, null, 'TransitionLogs');
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::ONE_TO_MANY, array('id_sales_order_process' => 'fk_sales_order_process', ), null, null, 'Orders');
        $this->addRelation('Item', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_sales_order_process' => 'fk_sales_order_process', ), null, null, 'Items');
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

} // Generated_Zed_Sales_Persistence_Map_PacSalesOrderProcessTableMap
