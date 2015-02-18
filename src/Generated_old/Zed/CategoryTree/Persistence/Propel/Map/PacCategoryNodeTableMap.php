<?php



/**
 * This class defines the structure of the 'pac_category_node' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.map
 */
class Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryNodeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/CategoryTree/Persistence/Propel.Map.PacCategoryNodeTableMap';

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
        $this->setName('pac_category_node');
        $this->setPhpName('PacCategoryNode');

        $method = 'loadPacCategoryNode';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category_node', 'IdCategoryNode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category', 'FkCategory', 'INTEGER', 'pac_category_tree', 'id_category', true, null, null);
        $this->addForeignKey('fk_parent_category_node', 'FkParentCategoryNode', 'INTEGER', 'pac_category_node', 'id_category_node', false, null, null);
        $this->addColumn('is_root', 'IsRoot', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CategoryNode', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode', RelationMap::MANY_TO_ONE, array('fk_parent_category_node' => 'id_category_node', ), null, null);
        $this->addRelation('Category', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree', RelationMap::MANY_TO_ONE, array('fk_category' => 'id_category', ), null, null);
        $this->addRelation('Node', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode', RelationMap::ONE_TO_MANY, array('id_category_node' => 'fk_parent_category_node', ), null, null, 'Nodes');
        $this->addRelation('ClosureTable', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable', RelationMap::ONE_TO_MANY, array('id_category_node' => 'fk_category_node', ), null, null, 'ClosureTables');
        $this->addRelation('Descendant', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable', RelationMap::ONE_TO_MANY, array('id_category_node' => 'fk_category_node_descendant', ), null, null, 'Descendants');
        $this->addRelation('PacProductCategory', 'ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory', RelationMap::ONE_TO_MANY, array('id_category_node' => 'fk_category_node', ), null, null, 'PacProductCategories');
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

} // Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryNodeTableMap
