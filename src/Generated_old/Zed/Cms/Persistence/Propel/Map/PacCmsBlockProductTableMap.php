<?php



/**
 * This class defines the structure of the 'pac_cms_block_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map
 */
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsBlockProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsBlockProductTableMap';

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
        $this->setName('pac_cms_block_product');
        $this->setPhpName('PacCmsBlockProduct');

        $method = 'loadPacCmsBlockProduct';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_block_product', 'IdCmsBlockProduct', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_block', 'FkCmsBlock', 'INTEGER', 'pac_cms_block', 'id_cms_block', true, null, null);
        $this->addForeignKey('fk_catalog_product', 'FkCatalogProduct', 'INTEGER', 'pac_catalog_product', 'id_catalog_product', false, null, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock', RelationMap::MANY_TO_ONE, array('fk_cms_block' => 'id_cms_block', ), null, null);
        $this->addRelation('PacCatalogProduct', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('fk_catalog_product' => 'id_catalog_product', ), null, null);
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsBlockProductTableMap
