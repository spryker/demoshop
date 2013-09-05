<?php



/**
 * This class defines the structure of the 'pac_category_attribute' table.
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
class Generated_Zed_Category_Persistence_Map_PacCategoryAttributeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Category/Persistence.Map.PacCategoryAttributeTableMap';

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
        $this->setName('pac_category_attribute');
        $this->setPhpName('PacCategoryAttribute');

        $method = 'getPacCategoryAttribute';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category_attribute', 'IdCategoryAttribute', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category', 'FkCategory', 'INTEGER', 'pac_category', 'id_category', true, null, null);
        $this->addForeignKey('fk_category_attribute_key', 'FkCategoryAttributeKey', 'INTEGER', 'pac_category_attribute_key', 'id_category_attribute_key', true, null, null);
        $this->addColumn('value', 'Value', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'ProjectA_Zed_Category_Persistence_PacCategory', RelationMap::MANY_TO_ONE, array('fk_category' => 'id_category', ), null, null);
        $this->addRelation('AttributeKey', 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey', RelationMap::MANY_TO_ONE, array('fk_category_attribute_key' => 'id_category_attribute_key', ), null, null);
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

} // Generated_Zed_Category_Persistence_Map_PacCategoryAttributeTableMap
