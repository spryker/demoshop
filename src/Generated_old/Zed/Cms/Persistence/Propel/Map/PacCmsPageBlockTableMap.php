<?php



/**
 * This class defines the structure of the 'pac_cms_page_block' table.
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
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsPageBlockTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsPageBlockTableMap';

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
        $this->setName('pac_cms_page_block');
        $this->setPhpName('PacCmsPageBlock');

        $method = 'loadPacCmsPageBlock';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_page_block', 'IdCmsPageBlock', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_page', 'FkCmsPage', 'INTEGER', 'pac_cms_page', 'id_cms_page', true, null, null);
        $this->addForeignKey('fk_cms_block', 'FkCmsBlock', 'INTEGER', 'pac_cms_block', 'id_cms_block', true, null, null);
        $this->addForeignKey('fk_cms_template_partial', 'FkCmsTemplatePartial', 'INTEGER', 'pac_cms_template_partial', 'id_cms_template_partial', true, null, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsPage', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage', RelationMap::MANY_TO_ONE, array('fk_cms_page' => 'id_cms_page', ), null, null);
        $this->addRelation('PacCmsBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock', RelationMap::MANY_TO_ONE, array('fk_cms_block' => 'id_cms_block', ), null, null);
        $this->addRelation('PacCmsTemplatePartial', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplatePartial', RelationMap::MANY_TO_ONE, array('fk_cms_template_partial' => 'id_cms_template_partial', ), null, null);
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsPageBlockTableMap
