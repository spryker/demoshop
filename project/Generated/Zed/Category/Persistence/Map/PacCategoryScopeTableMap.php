<?php



/**
 * This class defines the structure of the 'pac_category_scope' table.
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
class Generated_Zed_Category_Persistence_Map_PacCategoryScopeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Category/Persistence.Map.PacCategoryScopeTableMap';

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
        $this->setName('pac_category_scope');
        $this->setPhpName('PacCategoryScope');
        $this->setClassname('ProjectA_Zed_Category_Persistence_PacCategoryScope');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category_scope', 'IdCategoryScope', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'ProjectA_Zed_Category_Persistence_PacCategory', RelationMap::ONE_TO_MANY, array('id_category_scope' => 'fk_category_scope', ), null, null, 'Categories');
        $this->addRelation('AttributeKey', 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeKey', RelationMap::ONE_TO_MANY, array('id_category_scope' => 'fk_category_scope', ), null, null, 'AttributeKeys');
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
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Category_Persistence_Map_PacCategoryScopeTableMap
