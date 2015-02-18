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
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map
 */
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesDiscountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesDiscountTableMap';

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

        $method = 'loadPacSalesDiscount';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_discount', 'IdSalesDiscount', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', false, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', false, null, null);
        $this->addForeignKey('fk_sales_expense', 'FkSalesExpense', 'INTEGER', 'pac_sales_expense', 'id_sales_expense', false, null, null);
        $this->addForeignKey('fk_sales_order_item_option', 'FkSalesOrderItemOption', 'INTEGER', 'pac_sales_order_item_option', 'id_sales_order_item_option', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 510, null);
        $this->addColumn('display_name', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->addColumn('scope', 'Scope', 'ENUM', false, null, null);
        $this->getColumn('scope', false)->setValueSet(array (
  0 => 'global',
  1 => 'local',
));
        $this->addColumn('action', 'Action', 'VARCHAR', true, 255, null);
        $this->addColumn('conditions', 'Conditions', 'VARCHAR', false, 1000, null);
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
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense', RelationMap::MANY_TO_ONE, array('fk_sales_expense' => 'id_sales_expense', ), null, null);
        $this->addRelation('Option', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption', RelationMap::MANY_TO_ONE, array('fk_sales_order_item_option' => 'id_sales_order_item_option', ), null, null);
        $this->addRelation('DiscountCode', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode', RelationMap::ONE_TO_MANY, array('id_sales_discount' => 'fk_sales_discount', ), null, null, 'DiscountCodes');
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

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesDiscountTableMap
