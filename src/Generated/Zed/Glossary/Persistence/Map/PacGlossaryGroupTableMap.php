<?php



/**
 * This class defines the structure of the 'pac_glossary_group' table.
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
class Generated_Zed_Glossary_Persistence_Map_PacGlossaryGroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Glossary/Persistence.Map.PacGlossaryGroupTableMap';

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
        $this->setName('pac_glossary_group');
        $this->setPhpName('PacGlossaryGroup');

        $method = 'getPacGlossaryGroup';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_group', 'IdGlossaryGroup', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
        $this->addValidator('name', 'unique', 'propel.validator.UniqueValidator', '', 'This glossary group already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKey', RelationMap::ONE_TO_MANY, array('id_glossary_group' => 'fk_glossary_group', ), 'SET NULL', null, 'GlossaryKeys');
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

} // Generated_Zed_Glossary_Persistence_Map_PacGlossaryGroupTableMap
