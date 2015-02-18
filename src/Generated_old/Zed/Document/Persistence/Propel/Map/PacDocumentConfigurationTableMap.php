<?php



/**
 * This class defines the structure of the 'pac_document_configuration' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.map
 */
class Generated_Zed_Document_Persistence_Propel_Map_PacDocumentConfigurationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Document/Persistence/Propel.Map.PacDocumentConfigurationTableMap';

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
        $this->setName('pac_document_configuration');
        $this->setPhpName('PacDocumentConfiguration');

        $method = 'loadPacDocumentConfiguration';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_document_configuration', 'IdDocumentConfiguration', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_document_type', 'FkDocumentType', 'INTEGER', 'pac_document_type', 'id_document_type', true, null, null);
        $this->addForeignKey('fk_document_template', 'FkDocumentTemplate', 'INTEGER', 'pac_document_template', 'id_document_template', true, null, null);
        $this->addForeignKey('fk_document_render_engine', 'FkDocumentRenderEngine', 'INTEGER', 'pac_document_render_engine', 'id_document_render_engine', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Type', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentType', RelationMap::MANY_TO_ONE, array('fk_document_type' => 'id_document_type', ), null, null);
        $this->addRelation('Template', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate', RelationMap::MANY_TO_ONE, array('fk_document_template' => 'id_document_template', ), null, null);
        $this->addRelation('RenderEngine', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentRenderEngine', RelationMap::MANY_TO_ONE, array('fk_document_render_engine' => 'id_document_render_engine', ), null, null);
        $this->addRelation('Document', 'ProjectA_Zed_Document_Persistence_Propel_PacDocument', RelationMap::ONE_TO_MANY, array('id_document_configuration' => 'fk_document_configuration', ), null, null, 'Documents');
        $this->addRelation('Invoice', 'ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration', RelationMap::ONE_TO_MANY, array('id_document_configuration' => 'fk_document_configuration', ), null, null, 'Invoices');
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

} // Generated_Zed_Document_Persistence_Propel_Map_PacDocumentConfigurationTableMap
