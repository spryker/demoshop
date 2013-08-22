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
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_PacSalesOrderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesOrderTableMap';

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
        $this->setClassname('ProjectA_Zed_Sales_Persistence_PacSalesOrder');
        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order', 'IdSalesOrder', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_address_billing', 'FkSalesOrderAddressBilling', 'INTEGER', 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_sales_order_address_shipping', 'FkSalesOrderAddressShipping', 'INTEGER', 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'pac_customer', 'id_customer', false, null, null);
        $this->addForeignKey('fk_sales_order_process', 'FkSalesOrderProcess', 'INTEGER', 'pac_sales_order_process', 'id_sales_order_process', false, null, null);
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
        $this->addColumn('invoice_number', 'InvoiceNumber', 'VARCHAR', false, 45, null);
        $this->addColumn('invoice_generated_at', 'InvoiceGeneratedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', false, 15, null);
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
        $this->addRelation('BillingAddress', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('fk_sales_order_address_billing' => 'id_sales_order_address', ), null, null);
        $this->addRelation('ShippingAddress', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('fk_sales_order_address_shipping' => 'id_sales_order_address', ), null, null);
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomer', RelationMap::MANY_TO_ONE, array('fk_customer' => 'id_customer', ), null, null);
        $this->addRelation('Process', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess', RelationMap::MANY_TO_ONE, array('fk_sales_order_process' => 'id_sales_order_process', ), null, null);
        $this->addRelation('Invoice', 'ProjectA_Zed_Invoice_Persistence_PacInvoice', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Invoices');
        $this->addRelation('Payment', 'ProjectA_Zed_Payment_Persistence_PacPayment', RelationMap::ONE_TO_ONE, array('id_sales_order' => 'id_payment', ), null, null);
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'TransitionLogs');
        $this->addRelation('Item', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Items');
        $this->addRelation('Note', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderNote', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Notes');
        $this->addRelation('OrderComment', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderComment', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'OrderComments');
        $this->addRelation('History', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderHistory', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Histories');
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_PacSalesExpense', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Expenses');
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_PacSalesDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Discounts');
        $this->addRelation('CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'CodeUsages');
        $this->addRelation('SalesruleLog', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleLog', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'SalesruleLogs');
        $this->addRelation('Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'Quotes');
        $this->addRelation('SaoOrder', 'Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder', RelationMap::ONE_TO_ONE, array('id_sales_order' => 'id_legacy_sales_order', ), null, null);
        $this->addRelation('CCValidation', 'Sao_Zed_Sales_Persistence_SaoSalesCCValidation', RelationMap::ONE_TO_MANY, array('id_sales_order' => 'fk_sales_order', ), null, null, 'CCValidations');
        $this->addRelation('SaoSalesOrder', 'Sao_Zed_Sales_Persistence_SaoSalesOrder', RelationMap::ONE_TO_ONE, array('id_sales_order' => 'id_sales_order', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Map_PacSalesOrderTableMap
