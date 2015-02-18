<?php



/**
 * This class defines the structure of the 'pac_sales_order_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map
 */
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesOrderItemTableMap';

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
        $this->setName('pac_sales_order_item');
        $this->setPhpName('PacSalesOrderItem');

        $method = 'loadPacSalesOrderItem';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_item', 'IdSalesOrderItem', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addForeignKey('fk_oms_order_item_status', 'FkOmsOrderItemStatus', 'INTEGER', 'pac_oms_order_item_status', 'id_oms_order_item_status', true, null, null);
        $this->addForeignKey('fk_oms_order_process', 'FkOmsOrderProcess', 'INTEGER', 'pac_oms_order_process', 'id_oms_order_process', false, null, null);
        $this->addForeignKey('fk_sales_order_item_bundle', 'FkSalesOrderItemBundle', 'INTEGER', 'pac_sales_order_item_bundle', 'id_sales_order_item_bundle', false, null, null);
        $this->addColumn('last_status_change', 'LastStatusChange', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
        $this->addColumn('variety', 'Variety', 'CHAR', true, null, null);
        $this->getColumn('variety', false)->setValueSet(array (
  0 => 'Single',
  1 => 'Config',
  2 => 'Simple',
  3 => 'Bundle',
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
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('Status', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus', RelationMap::MANY_TO_ONE, array('fk_oms_order_item_status' => 'id_oms_order_item_status', ), null, null);
        $this->addRelation('Process', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess', RelationMap::MANY_TO_ONE, array('fk_oms_order_process' => 'id_oms_order_process', ), null, null);
        $this->addRelation('SalesOrderItemBundle', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle', RelationMap::MANY_TO_ONE, array('fk_sales_order_item_bundle' => 'id_sales_order_item_bundle', ), null, null);
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'TransitionLogs');
        $this->addRelation('StatusHistory', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'StatusHistories');
        $this->addRelation('EventTimeout', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'EventTimeouts');
        $this->addRelation('Option', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Options');
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Expenses');
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Discounts');
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

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemTableMap
