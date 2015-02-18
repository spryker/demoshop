<?php



/**
 * This class defines the structure of the 'pac_document_template' table.
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
class Generated_Zed_Document_Persistence_Propel_Map_PacDocumentTemplateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Document/Persistence/Propel.Map.PacDocumentTemplateTableMap';

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
        $this->setName('pac_document_template');
        $this->setPhpName('PacDocumentTemplate');

        $method = 'loadPacDocumentTemplate';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_document_template', 'IdDocumentTemplate', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DocumentConfiguration', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration', RelationMap::ONE_TO_MANY, array('id_document_template' => 'fk_document_template', ), null, null, 'DocumentConfigurations');
        $this->addRelation('PacDocumentTemplateVersion', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplateVersion', RelationMap::ONE_TO_MANY, array('id_document_template' => 'id_document_template', ), 'CASCADE', null, 'PacDocumentTemplateVersions');
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
            'versionable' =>  array (
  'version_column' => 'version',
  'version_table' => '',
  'log_created_at' => 'false',
  'log_created_by' => 'false',
  'log_comment' => 'false',
  'version_created_at_column' => 'version_created_at',
  'version_created_by_column' => 'version_created_by',
  'version_comment_column' => 'version_comment',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Document_Persistence_Propel_Map_PacDocumentTemplateTableMap
