<?php



/**
 * This class defines the structure of the 'pac_glossary_language' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryLanguageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryLanguageTableMap';

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
        $this->setName('pac_glossary_language');
        $this->setPhpName('PacGlossaryLanguage');

        $method = 'getPacGlossaryLanguage';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_language', 'IdGlossaryLanguage', 'INTEGER', true, null, null);
        $this->addColumn('locale', 'Locale', 'VARCHAR', true, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
        $this->addValidator('locale', 'unique', 'propel.validator.UniqueValidator', '', 'This glossary locale already exists!');
        $this->addValidator('name', 'unique', 'propel.validator.UniqueValidator', '', 'This glossary language already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation', RelationMap::ONE_TO_MANY, array('id_glossary_language' => 'fk_glossary_language', ), 'CASCADE', null, 'GlossaryExplanations');
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryLanguageTableMap
