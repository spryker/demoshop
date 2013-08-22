<?php



/**
 * This class defines the structure of the 'sao_mail_template_version' table.
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
class Generated_Zed_Mail_Persistence_Map_SaoMailTemplateVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailTemplateVersionTableMap';

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
        $this->setName('sao_mail_template_version');
        $this->setPhpName('SaoMailTemplateVersion');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailTemplateVersion');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_mail_template', 'IdMailTemplate', 'INTEGER' , 'sao_mail_template', 'id_mail_template', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('sender', 'Sender', 'VARCHAR', false, 255, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addColumn('html', 'Html', 'LONGVARCHAR', false, null, null);
        $this->addColumn('wrap', 'Wrap', 'INTEGER', false, null, null);
        $this->addColumn('deleted', 'Deleted', 'BOOLEAN', false, 1, false);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('version_created_at', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version_created_by', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('wrap_version', 'WrapVersion', 'INTEGER', false, null, 0);
        $this->addColumn('sao_mail_template_ids', 'SaoMailTemplateIds', 'ARRAY', false, null, null);
        $this->addColumn('sao_mail_template_versions', 'SaoMailTemplateVersions', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SaoMailTemplate', 'Sao_Zed_Mail_Persistence_SaoMailTemplate', RelationMap::MANY_TO_ONE, array('id_mail_template' => 'id_mail_template', ), 'CASCADE', null);
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailTemplateVersionTableMap
