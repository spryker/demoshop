<?php



/**
 * This class defines the structure of the 'pac_mail_template' table.
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
class Generated_Zed_Mail_Persistence_Propel_Map_PacMailTemplateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Mail/Persistence/Propel.Map.PacMailTemplateTableMap';

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
        $this->setName('pac_mail_template');
        $this->setPhpName('PacMailTemplate');

        $method = 'loadPacMailTemplate';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mail_template', 'IdMailTemplate', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('sender', 'Sender', 'VARCHAR', false, 255, null);
        $this->addColumn('sender_name', 'SenderName', 'VARCHAR', false, 255, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addColumn('html', 'Html', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date_interval', 'DateInterval', 'VARCHAR', false, 255, null);
        $this->addForeignKey('wrapper', 'Wrapper', 'INTEGER', 'pac_mail_template', 'id_mail_template', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', false, 1, false);
        $this->addColumn('version', 'Version', 'INTEGER', false, null, 0);
        $this->addColumn('version_created_at', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version_created_by', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MailTemplateWrapper', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate', RelationMap::MANY_TO_ONE, array('wrapper' => 'id_mail_template', ), null, null);
        $this->addRelation('MailTemplate', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate', RelationMap::ONE_TO_MANY, array('id_mail_template' => 'wrapper', ), null, null, 'MailTemplates');
        $this->addRelation('PacMailTemplateVersion', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion', RelationMap::ONE_TO_MANY, array('id_mail_template' => 'id_mail_template', ), 'CASCADE', null, 'PacMailTemplateVersions');
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
            'versionable' =>  array (
  'version_column' => 'version',
  'version_table' => 'pac_mail_template_version',
  'log_created_at' => 'true',
  'log_created_by' => 'true',
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

} // Generated_Zed_Mail_Persistence_Propel_Map_PacMailTemplateTableMap
