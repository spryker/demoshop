<?php



/**
 * This class defines the structure of the 'pac_sales_order' table.
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
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesOrderTableMap';

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
        $this->setName('pac_sales_order');
        $this->setPhpName('PacSalesOrder');

        $method = 'loadPacSalesOrder';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order', 'IdSalesOrder', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_address_billing', 'FkSalesOrderAddressBilling', 'INTEGER', 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_sales_order_address_shipping', 'FkSalesOrderAddressShipping', 'INTEGER', 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'pac_customer', 'id_customer', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation', false)->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('customer_session_id', 'CustomerSessionId', 'VARCHAR', false, 100, null);
        $this->addColumn('increment_id', 'IncrementId', 'VARCHAR', false, 45, null);
        $this->addColumn('grand_total', 'GrandTotal', 'INTEGER', true, null, null);
        $this->addColumn('subtotal', 'Subtotal', 'INTEGER', true, null, null);
        $this->addColumn('is_test', 'IsTest', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BillingAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('fk_sales_order_address_billing' => 'id_sales_order_address', ), null, null);
        $this->addRelation('ShippingAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('fk_sales_order_address_shipping' => 'id_sales_order_address', ), null, null);
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomer', RelationMap::MANY_TO_ONE, array('fk_customer' => 'id_customer', ), null, null);
        $this->addRelation('Document', 'ProjectA_Zed_Document_Persistence_Propel_PacDocument', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Documents');
        $this->addRelation('Invoice', 'ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Invoices');
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'TransitionLogs');
        $this->addRelation('Payment', 'ProjectA_Zed_Payment_Persistence_Propel_PacPayment', RelationMap::ONE_TO_ONE, array('id_sales_order' => 'id_payment', ), null, null);
        $this->addRelation('Item', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Items');
        $this->addRelation('Note', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Notes');
        $this->addRelation('OrderComment', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderComment', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'OrderComments');
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Expenses');
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Discounts');
        $this->addRelation('CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'CodeUsages');
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

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderTableMap
