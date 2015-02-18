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
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.map
 */
class Generated_Zed_Glossary_Persistence_Propel_Map_PacGlossaryKeyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Glossary/Persistence/Propel.Map.PacGlossaryKeyTableMap';

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

        $method = 'loadPacGlossaryKey';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_key', 'IdGlossaryKey', 'INTEGER', true, null, null);
        $this->addColumn('key', 'Key', 'VARCHAR', true, 255, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        // validators
        $this->addValidator('key', 'unique', 'propel.validator.UniqueValidator', '', 'This glossary key already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsBlockGlossary', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary', RelationMap::ONE_TO_MANY, array('id_glossary_key' => 'fk_glossary_key', ), null, null, 'PacCmsBlockGlossaries');
        $this->addRelation('PacGlossaryTranslation', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation', RelationMap::ONE_TO_MANY, array('id_glossary_key' => 'fk_glossary_key', ), 'CASCADE', null, 'PacGlossaryTranslations');
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

} // Generated_Zed_Glossary_Persistence_Propel_Map_PacGlossaryKeyTableMap
