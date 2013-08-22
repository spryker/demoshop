<?php



/**
 * This class defines the structure of the 'pac_category' table.
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
class Generated_Zed_Category_Persistence_Map_PacCategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Category/Persistence.Map.PacCategoryTableMap';

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
        $this->setName('pac_category');
        $this->setPhpName('PacCategory');
        $this->setClassname('ProjectA_Zed_Category_Persistence_PacCategory');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category', 'IdCategory', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category_name', 'FkCategoryName', 'INTEGER', 'pac_category_name', 'id_category_name', true, null, null);
        $this->addForeignKey('fk_category_scope', 'FkCategoryScope', 'INTEGER', 'pac_category_scope', 'id_category_scope', true, null, null);
        $this->addColumn('lft', 'Lft', 'INTEGER', true, null, null);
        $this->addColumn('rgt', 'Rgt', 'INTEGER', true, null, null);
        $this->addColumn('level', 'Level', 'INTEGER', false, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Scope', 'ProjectA_Zed_Category_Persistence_PacCategoryScope', RelationMap::MANY_TO_ONE, array('fk_category_scope' => 'id_category_scope', ), null, null);
        $this->addRelation('Name', 'ProjectA_Zed_Category_Persistence_PacCategoryName', RelationMap::MANY_TO_ONE, array('fk_category_name' => 'id_category_name', ), null, null);
        $this->addRelation('Attribute', 'ProjectA_Zed_Category_Persistence_PacCategoryAttribute', RelationMap::ONE_TO_MANY, array('id_category' => 'fk_category', ), null, null, 'Attributes');
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
            'nested_set' =>  array (
  'left_column' => 'lft',
  'right_column' => 'rgt',
  'level_column' => 'level',
  'use_scope' => 'true',
  'scope_column' => 'fk_category_scope',
  'method_proxies' => 'false',
),
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

} // Generated_Zed_Category_Persistence_Map_PacCategoryTableMap
