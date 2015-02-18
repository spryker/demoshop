<?php



/**
 * This class defines the structure of the 'pac_category_tree' table.
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
class Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryTreeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/CategoryTree/Persistence/Propel.Map.PacCategoryTreeTableMap';

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
        $this->setName('pac_category_tree');
        $this->setPhpName('PacCategoryTree');

        $method = 'loadPacCategoryTree';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category', 'IdCategory', 'INTEGER', true, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Node', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode', RelationMap::ONE_TO_MANY, array('id_category' => 'fk_category', ), null, null, 'Nodes');
        $this->addRelation('Attribute', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute', RelationMap::ONE_TO_MANY, array('id_category' => 'fk_category', ), null, null, 'Attributes');
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

} // Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryTreeTableMap
