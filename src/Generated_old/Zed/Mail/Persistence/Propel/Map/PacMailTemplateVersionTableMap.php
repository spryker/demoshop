<?php



/**
 * This class defines the structure of the 'pac_mail_template_version' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.map
 */
class Generated_Zed_Mail_Persistence_Propel_Map_PacMailTemplateVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Mail/Persistence/Propel.Map.PacMailTemplateVersionTableMap';

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
        $this->setName('pac_mail_template_version');
        $this->setPhpName('PacMailTemplateVersion');

        $method = 'loadPacMailTemplateVersion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_mail_template', 'IdMailTemplate', 'INTEGER' , 'pac_mail_template', 'id_mail_template', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('sender', 'Sender', 'VARCHAR', false, 255, null);
        $this->addColumn('sender_name', 'SenderName', 'VARCHAR', false, 255, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addColumn('html', 'Html', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date_interval', 'DateInterval', 'VARCHAR', false, 255, null);
        $this->addColumn('wrapper', 'Wrapper', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', false, 1, false);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('version_created_at', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version_created_by', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('wrapper_version', 'WrapperVersion', 'INTEGER', false, null, 0);
        $this->addColumn('pac_mail_template_ids', 'PacMailTemplateIds', 'ARRAY', false, null, null);
        $this->addColumn('pac_mail_template_versions', 'PacMailTemplateVersions', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacMailTemplate', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate', RelationMap::MANY_TO_ONE, array('id_mail_template' => 'id_mail_template', ), 'CASCADE', null);
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

} // Generated_Zed_Mail_Persistence_Propel_Map_PacMailTemplateVersionTableMap
