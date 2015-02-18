<?php



/**
 * This class defines the structure of the 'pac_invoice_configuration' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Invoice/Persistence/Propel.map
 */
class Generated_Zed_Invoice_Persistence_Propel_Map_PacInvoiceConfigurationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Invoice/Persistence/Propel.Map.PacInvoiceConfigurationTableMap';

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
        $this->setName('pac_invoice_configuration');
        $this->setPhpName('PacInvoiceConfiguration');

        $method = 'loadPacInvoiceConfiguration';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Invoice/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_invoice_configuration', 'IdInvoiceConfiguration', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_document_configuration', 'FkDocumentConfiguration', 'INTEGER', 'pac_document_configuration', 'id_document_configuration', true, null, null);
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
        $this->addRelation('DocumentConfiguration', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration', RelationMap::MANY_TO_ONE, array('fk_document_configuration' => 'id_document_configuration', ), null, null);
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

} // Generated_Zed_Invoice_Persistence_Propel_Map_PacInvoiceConfigurationTableMap
