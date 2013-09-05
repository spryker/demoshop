<?php



/**
 * This class defines the structure of the 'pac_category_attribute_key' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.map
 */
class Generated_Zed_Category_Persistence_Map_PacCategoryAttributeKeyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Category/Persistence.Map.PacCategoryAttributeKeyTableMap';

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
        $this->setName('pac_category_attribute_key');
        $this->setPhpName('PacCategoryAttributeKey');

        $method = 'getPacCategoryAttributeKey';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category_attribute_key', 'IdCategoryAttributeKey', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category_scope', 'FkCategoryScope', 'INTEGER', 'pac_category_scope', 'id_category_scope', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 25, null);
        $this->addColumn('config', 'Config', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Scope', 'ProjectA_Zed_Category_Persistence_PacCategoryScope', RelationMap::MANY_TO_ONE, array('fk_category_scope' => 'id_category_scope', ), null, null);
        $this->addRelation('Attribute', 'ProjectA_Zed_Category_Persistence_PacCategoryAttribute', RelationMap::ONE_TO_MANY, array('id_category_attribute_key' => 'fk_category_attribute_key', ), null, null, 'Attributes');
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

} // Generated_Zed_Category_Persistence_Map_PacCategoryAttributeKeyTableMap
