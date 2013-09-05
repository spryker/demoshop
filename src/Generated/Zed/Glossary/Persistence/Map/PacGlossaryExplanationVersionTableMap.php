<?php



/**
 * This class defines the structure of the 'pac_glossary_explanation_version' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryExplanationVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryExplanationVersionTableMap';

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
        $this->setName('pac_glossary_explanation_version');
        $this->setPhpName('PacGlossaryExplanationVersion');

        $method = 'getPacGlossaryExplanationVersion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_glossary_explanation', 'IdGlossaryExplanation', 'INTEGER' , 'pac_glossary_explanation', 'id_glossary_explanation', true, null, null);
        $this->addColumn('fk_glossary_language', 'FkGlossaryLanguage', 'INTEGER', true, null, null);
        $this->addColumn('fk_glossary_key', 'FkGlossaryKey', 'INTEGER', true, null, null);
        $this->addColumn('text', 'Text', 'CLOB', true, null, null);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('fk_glossary_key_version', 'FkGlossaryKeyVersion', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacGlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation', RelationMap::MANY_TO_ONE, array('id_glossary_explanation' => 'id_glossary_explanation', ), 'CASCADE', null);
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryExplanationVersionTableMap
