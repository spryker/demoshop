<?php



/**
 * This class defines the structure of the 'pac_glossary_key_version' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryKeyVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryKeyVersionTableMap';

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
        $this->setName('pac_glossary_key_version');
        $this->setPhpName('PacGlossaryKeyVersion');

        $method = 'getPacGlossaryKeyVersion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_glossary_key', 'IdGlossaryKey', 'INTEGER' , 'pac_glossary_key', 'id_glossary_key', true, null, null);
        $this->addColumn('fk_glossary_group', 'FkGlossaryGroup', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('is_global', 'IsGlobal', 'BOOLEAN', true, 1, false);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', true, 1, false);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('pac_glossary_explanation_ids', 'PacGlossaryExplanationIds', 'ARRAY', false, null, null);
        $this->addColumn('pac_glossary_explanation_versions', 'PacGlossaryExplanationVersions', 'ARRAY', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacGlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKey', RelationMap::MANY_TO_ONE, array('id_glossary_key' => 'id_glossary_key', ), 'CASCADE', null);
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryKeyVersionTableMap
