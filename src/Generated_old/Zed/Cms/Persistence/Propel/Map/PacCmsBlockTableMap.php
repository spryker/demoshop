<?php



/**
 * This class defines the structure of the 'pac_cms_block' table.
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
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsBlockTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsBlockTableMap';

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
        $this->setName('pac_cms_block');
        $this->setPhpName('PacCmsBlock');

        $method = 'loadPacCmsBlock';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_block', 'IdCmsBlock', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_block_type', 'FkCmsBlockType', 'INTEGER', 'pac_cms_block_type', 'id_cms_block_type', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsBlockType', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType', RelationMap::MANY_TO_ONE, array('fk_cms_block_type' => 'id_cms_block_type', ), null, null);
        $this->addRelation('PacCmsPageBlockBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock', RelationMap::ONE_TO_MANY, array('id_cms_block' => 'fk_cms_block', ), null, null, 'PacCmsPageBlockBlocks');
        $this->addRelation('PacCmsBlockText', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText', RelationMap::ONE_TO_MANY, array('id_cms_block' => 'fk_cms_block', ), null, null, 'PacCmsBlockTexts');
        $this->addRelation('PacCmsBlockProduct', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct', RelationMap::ONE_TO_MANY, array('id_cms_block' => 'fk_cms_block', ), null, null, 'PacCmsBlockProducts');
        $this->addRelation('PacCmsBlockGlossary', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary', RelationMap::ONE_TO_MANY, array('id_cms_block' => 'fk_cms_block', ), null, null, 'PacCmsBlockGlossaries');
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsBlockTableMap
