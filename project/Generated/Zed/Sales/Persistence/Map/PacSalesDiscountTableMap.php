<?php



/**
 * This class defines the structure of the 'pac_sales_discount' table.
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
class Generated_Zed_Sales_Persistence_Map_PacSalesDiscountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesDiscountTableMap';

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
        $this->setName('pac_sales_discount');
        $this->setPhpName('PacSalesDiscount');
        $this->setClassname('ProjectA_Zed_Sales_Persistence_PacSalesDiscount');
        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_discount', 'IdSalesDiscount', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', false, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', false, null, null);
        $this->addForeignKey('fk_sales_expense', 'FkSalesExpense', 'INTEGER', 'pac_sales_expense', 'id_sales_expense', false, null, null);
        $this->addForeignKey('fk_sales_order_item_option', 'FkSalesOrderItemOption', 'INTEGER', 'pac_sales_order_item_option', 'id_sales_order_item_option', false, null, null);
        $this->addColumn('is_refundable', 'IsRefundable', 'TINYINT', false, null, 0);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('OrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_PacSalesExpense', RelationMap::MANY_TO_ONE, array('fk_sales_expense' => 'id_sales_expense', ), null, null);
        $this->addRelation('Option', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption', RelationMap::MANY_TO_ONE, array('fk_sales_order_item_option' => 'id_sales_order_item_option', ), null, null);
        $this->addRelation('SalesDiscount', 'Sao_Zed_Sales_Persistence_SaoSalesDiscount', RelationMap::ONE_TO_ONE, array('id_sales_discount' => 'id_sales_discount', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Map_PacSalesDiscountTableMap
