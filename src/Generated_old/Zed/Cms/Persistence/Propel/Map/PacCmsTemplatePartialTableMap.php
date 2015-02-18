<?php



/**
 * This class defines the structure of the 'pac_cms_template_partial' table.
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
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsTemplatePartialTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsTemplatePartialTableMap';

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
        $this->setName('pac_cms_template_partial');
        $this->setPhpName('PacCmsTemplatePartial');

        $method = 'loadPacCmsTemplatePartial';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_template_partial', 'IdCmsTemplatePartial', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_template', 'FkCmsTemplate', 'INTEGER', 'pac_cms_template', 'id_cms_template', true, null, null);
        $this->addForeignKey('fk_cms_partial', 'FkCmsPartial', 'INTEGER', 'pac_cms_partial', 'id_cms_partial', true, null, null);
        $this->addColumn('row', 'Row', 'INTEGER', false, null, null);
        $this->addColumn('column', 'Column', 'INTEGER', false, null, null);
        $this->addColumn('position', 'Position', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsTemplate', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsTemplate', RelationMap::MANY_TO_ONE, array('fk_cms_template' => 'id_cms_template', ), null, null);
        $this->addRelation('PacCmsPartial', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPartial', RelationMap::MANY_TO_ONE, array('fk_cms_partial' => 'id_cms_partial', ), null, null);
        $this->addRelation('PacCmsPageBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock', RelationMap::ONE_TO_MANY, array('id_cms_template_partial' => 'fk_cms_template_partial', ), null, null, 'PacCmsPageBlocks');
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsTemplatePartialTableMap
