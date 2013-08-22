<?php



/**
 * This class defines the structure of the 'sao_mail_template' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.map
 */
class Generated_Zed_Mail_Persistence_Map_SaoMailTemplateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailTemplateTableMap';

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
        $this->setName('sao_mail_template');
        $this->setPhpName('SaoMailTemplate');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailTemplate');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mail_template', 'IdMailTemplate', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('sender', 'Sender', 'VARCHAR', false, 255, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addColumn('html', 'Html', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('wrap', 'Wrap', 'INTEGER', 'sao_mail_template', 'id_mail_template', false, null, null);
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
        $this->addRelation('MailTemplateWrap', 'Sao_Zed_Mail_Persistence_SaoMailTemplate', RelationMap::MANY_TO_ONE, array('wrap' => 'id_mail_template', ), null, null);
        $this->addRelation('MailTemplate', 'Sao_Zed_Mail_Persistence_SaoMailTemplate', RelationMap::ONE_TO_MANY, array('id_mail_template' => 'wrap', ), null, null, 'MailTemplates');
        $this->addRelation('SaoMailTemplateVersion', 'Sao_Zed_Mail_Persistence_SaoMailTemplateVersion', RelationMap::ONE_TO_MANY, array('id_mail_template' => 'id_mail_template', ), 'CASCADE', null, 'SaoMailTemplateVersions');
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
  'version_table' => 'sao_mail_template_version',
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailTemplateTableMap
