<?php



/**
 * This class defines the structure of the 'pac_invoice' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Invoice/Persistence.map
 */
class Generated_Zed_Invoice_Persistence_Map_PacInvoiceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Invoice/Persistence.Map.PacInvoiceTableMap';

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
        $this->setName('pac_invoice');
        $this->setPhpName('PacInvoice');
        $this->setClassname('ProjectA_Zed_Invoice_Persistence_PacInvoice');
        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Invoice/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_invoice', 'IdInvoice', 'INTEGER', true, null, null);
        $this->addColumn('invoice_number', 'InvoiceNumber', 'VARCHAR', false, 255, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', false, 255, null);
        $this->addColumn('currency_code', 'CurrencyCode', 'VARCHAR', false, 20, null);
        $this->addColumn('type', 'Type', 'ENUM', true, null, 'invoice');
        $this->getColumn('type', false)->setValueSet(array (
  0 => 'invoice',
  1 => 'reverse_invoice',
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
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('InvoiceItem', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceItem', RelationMap::ONE_TO_MANY, array('id_invoice' => 'fk_invoice', ), null, null, 'InvoiceItems');
        $this->addRelation('InvoiceDocument', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceDocument', RelationMap::ONE_TO_MANY, array('id_invoice' => 'fk_invoice', ), null, null, 'InvoiceDocuments');
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

} // Generated_Zed_Invoice_Persistence_Map_PacInvoiceTableMap
