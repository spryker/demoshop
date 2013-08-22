<?php



/**
 * This class defines the structure of the 'pac_glossary_key' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.map
 */
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryKeyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryKeyTableMap';

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
        $this->setName('pac_glossary_key');
        $this->setPhpName('PacGlossaryKey');
        $this->setClassname('ProjectA_Zed_Glossary_Persistence_PacGlossaryKey');
        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_key', 'IdGlossaryKey', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_glossary_group', 'FkGlossaryGroup', 'INTEGER', 'pac_glossary_group', 'id_glossary_group', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('is_global', 'IsGlobal', 'BOOLEAN', true, 1, false);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('version', 'Version', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryGroup', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup', RelationMap::MANY_TO_ONE, array('fk_glossary_group' => 'id_glossary_group', ), 'SET NULL', null);
        $this->addRelation('GlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation', RelationMap::ONE_TO_MANY, array('id_glossary_key' => 'fk_glossary_key', ), 'CASCADE', null, 'GlossaryExplanations');
        $this->addRelation('GlossaryLookup', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup', RelationMap::ONE_TO_MANY, array('name' => 'name', ), null, null, 'GlossaryLookups');
        $this->addRelation('PacGlossaryKeyVersion', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion', RelationMap::ONE_TO_MANY, array('id_glossary_key' => 'id_glossary_key', ), 'CASCADE', null, 'PacGlossaryKeyVersions');
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryKeyTableMap
