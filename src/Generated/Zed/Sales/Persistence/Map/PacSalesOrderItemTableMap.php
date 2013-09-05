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
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_PacSalesOrderItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesOrderItemTableMap';

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

        $method = 'getPacSalesOrderItem';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_item', 'IdSalesOrderItem', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addForeignKey('fk_sales_order_item_status', 'FkSalesOrderItemStatus', 'INTEGER', 'pac_sales_order_item_status', 'id_sales_order_item_status', true, null, null);
        $this->addForeignKey('fk_sales_order_process', 'FkSalesOrderProcess', 'INTEGER', 'pac_sales_order_process', 'id_sales_order_process', false, null, null);
        $this->addColumn('last_status_change', 'LastStatusChange', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('paid_amount', 'PaidAmount', 'INTEGER', false, null, 0);
        $this->addColumn('tax_amount', 'TaxAmount', 'INTEGER', false, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
        $this->addColumn('to_be_captured', 'ToBeCaptured', 'BOOLEAN', false, 1, null);
        $this->addColumn('to_be_billed', 'ToBeBilled', 'BOOLEAN', false, 1, null);
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
        $this->addRelation('Status', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus', RelationMap::MANY_TO_ONE, array('fk_sales_order_item_status' => 'id_sales_order_item_status', ), null, null);
        $this->addRelation('Process', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess', RelationMap::MANY_TO_ONE, array('fk_sales_order_process' => 'id_sales_order_process', ), null, null);
        $this->addRelation('InvoiceItem', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceItem', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'InvoiceItems');
        $this->addRelation('StatusHistory', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'StatusHistories');
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'TransitionLogs');
        $this->addRelation('Option', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Options');
        $this->addRelation('Expense', 'ProjectA_Zed_Sales_Persistence_PacSalesExpense', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Expenses');
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_PacSalesDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'Discounts');
        $this->addRelation('ItemDiscount', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'ItemDiscounts');
        $this->addRelation('QuoteItem', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'QuoteItems');
        $this->addRelation('SaoSalesOrderItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItem', RelationMap::ONE_TO_ONE, array('id_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('SaoSalesOrderItemNotification', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification', RelationMap::ONE_TO_MANY, array('id_sales_order_item' => 'fk_sales_order_item', ), null, null, 'SaoSalesOrderItemNotifications');
        $this->addRelation('Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', RelationMap::MANY_TO_MANY, array(), null, null, 'Quotes');
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

} // Generated_Zed_Sales_Persistence_Map_PacSalesOrderItemTableMap
