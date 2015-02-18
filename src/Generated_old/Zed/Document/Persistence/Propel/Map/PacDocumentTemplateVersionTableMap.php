<?php



/**
 * This class defines the structure of the 'pac_document_template_version' table.
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
class Generated_Zed_Document_Persistence_Propel_Map_PacDocumentTemplateVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Document/Persistence/Propel.Map.PacDocumentTemplateVersionTableMap';

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
        $this->setName('pac_document_template_version');
        $this->setPhpName('PacDocumentTemplateVersion');

        $method = 'loadPacDocumentTemplateVersion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Document/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_document_template', 'IdDocumentTemplate', 'INTEGER' , 'pac_document_template', 'id_document_template', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacDocumentTemplate', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentTemplate', RelationMap::MANY_TO_ONE, array('id_document_template' => 'id_document_template', ), 'CASCADE', null);
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
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Document_Persistence_Propel_Map_PacDocumentTemplateVersionTableMap
