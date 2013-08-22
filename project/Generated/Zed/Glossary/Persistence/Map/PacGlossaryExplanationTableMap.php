<?php



/**
 * This class defines the structure of the 'pac_glossary_explanation' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryExplanationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryExplanationTableMap';

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
        $this->setName('pac_glossary_explanation');
        $this->setPhpName('PacGlossaryExplanation');
        $this->setClassname('ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation');
        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_explanation', 'IdGlossaryExplanation', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_glossary_language', 'FkGlossaryLanguage', 'INTEGER', 'pac_glossary_language', 'id_glossary_language', true, null, null);
        $this->addForeignKey('fk_glossary_key', 'FkGlossaryKey', 'INTEGER', 'pac_glossary_key', 'id_glossary_key', true, null, null);
        $this->addColumn('text', 'Text', 'CLOB', true, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryLanguage', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage', RelationMap::MANY_TO_ONE, array('fk_glossary_language' => 'id_glossary_language', ), 'CASCADE', null);
        $this->addRelation('GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKey', RelationMap::MANY_TO_ONE, array('fk_glossary_key' => 'id_glossary_key', ), 'CASCADE', null);
        $this->addRelation('PacGlossaryExplanationVersion', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion', RelationMap::ONE_TO_MANY, array('id_glossary_explanation' => 'id_glossary_explanation', ), 'CASCADE', null, 'PacGlossaryExplanationVersions');
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryExplanationTableMap
