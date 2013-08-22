<?php



/**
 * This class defines the structure of the 'pac_sales_order_item_status' table.
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
class Generated_Zed_Sales_Persistence_Map_PacSalesOrderItemStatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesOrderItemStatusTableMap';

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
        $this->setName('pac_sales_order_item_status');
        $this->setPhpName('PacSalesOrderItemStatus');
        $this->setClassname('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus');
        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_item_status', 'IdSalesOrderItemStatus', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('StatusHistory', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory', RelationMap::ONE_TO_MANY, array('id_sales_order_item_status' => 'fk_sales_order_item_status', ), null, null, 'StatusHistories');
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_sales_order_item_status' => 'fk_sales_order_item_status', ), null, null, 'Orders');
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

} // Generated_Zed_Sales_Persistence_Map_PacSalesOrderItemStatusTableMap
