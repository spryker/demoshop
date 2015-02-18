<?php



/**
 * This class defines the structure of the 'pac_glossary_translation' table.
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
class Generated_Zed_Glossary_Persistence_Propel_Map_PacGlossaryTranslationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Glossary/Persistence/Propel.Map.PacGlossaryTranslationTableMap';

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
        $this->setName('pac_glossary_translation');
        $this->setPhpName('PacGlossaryTranslation');

        $method = 'loadPacGlossaryTranslation';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_glossary_translation', 'IdGlossaryTranslation', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_glossary_key', 'FkGlossaryKey', 'INTEGER', 'pac_glossary_key', 'id_glossary_key', true, null, null);
        $this->addForeignKey('fk_locale', 'FkLocale', 'INTEGER', 'pac_locale', 'id_locale', true, null, null);
        $this->addColumn('value', 'Value', 'LONGVARCHAR', true, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey', RelationMap::MANY_TO_ONE, array('fk_glossary_key' => 'id_glossary_key', ), 'CASCADE', null);
        $this->addRelation('GlossaryLocale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocale', RelationMap::MANY_TO_ONE, array('fk_locale' => 'id_locale', ), 'CASCADE', null);
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

} // Generated_Zed_Glossary_Persistence_Propel_Map_PacGlossaryTranslationTableMap
