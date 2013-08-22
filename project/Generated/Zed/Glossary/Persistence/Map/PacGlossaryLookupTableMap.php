<?php



/**
 * This class defines the structure of the 'pac_glossary_lookup' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryLookupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryLookupTableMap';

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
        $this->setName('pac_glossary_lookup');
        $this->setPhpName('PacGlossaryLookup');
        $this->setClassname('ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup');
        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_lookup', 'IdGlossaryLookup', 'INTEGER', true, null, null);
        $this->addColumn('store', 'Store', 'VARCHAR', true, 255, null);
        $this->addColumn('locale', 'Locale', 'VARCHAR', true, 255, null);
        $this->addForeignKey('name', 'Name', 'VARCHAR', 'pac_glossary_key', 'name', true, 255, null);
        $this->addColumn('text', 'Text', 'CLOB', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKey', RelationMap::MANY_TO_ONE, array('name' => 'name', ), null, null);
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryLookupTableMap
