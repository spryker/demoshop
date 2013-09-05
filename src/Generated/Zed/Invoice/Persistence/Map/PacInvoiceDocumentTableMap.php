<?php



/**
 * This class defines the structure of the 'pac_invoice_document' table.
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
class Generated_Zed_Invoice_Persistence_Map_PacInvoiceDocumentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Invoice/Persistence.Map.PacInvoiceDocumentTableMap';

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
        $this->setName('pac_invoice_document');
        $this->setPhpName('PacInvoiceDocument');

        $method = 'getPacInvoiceDocument';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Invoice/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_invoice_document', 'IdInvoiceDocument', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_invoice', 'FkInvoice', 'INTEGER', 'pac_invoice', 'id_invoice', true, null, null);
        $this->addColumn('content', 'Content', 'BLOB', false, null, null);
        $this->addColumn('layout_type', 'LayoutType', 'TINYINT', true, null, 0);
        $this->addColumn('content_type', 'ContentType', 'ENUM', true, null, 'pdf');
        $this->getColumn('content_type', false)->setValueSet(array (
  0 => 'text',
  1 => 'pdf',
));
        $this->addColumn('filename', 'Filename', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Invoice', 'ProjectA_Zed_Invoice_Persistence_PacInvoice', RelationMap::MANY_TO_ONE, array('fk_invoice' => 'id_invoice', ), null, null);
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

} // Generated_Zed_Invoice_Persistence_Map_PacInvoiceDocumentTableMap
