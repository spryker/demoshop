<?php



/**
 * This class defines the structure of the 'pac_cms_page_attribute_value' table.
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
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsPageAttributeValueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsPageAttributeValueTableMap';

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
        $this->setName('pac_cms_page_attribute_value');
        $this->setPhpName('PacCmsPageAttributeValue');

        $method = 'loadPacCmsPageAttributeValue';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_page_attribute_value', 'IdCmsPageAttributeValue', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_page_attribute', 'FkCmsPageAttribute', 'INTEGER', 'pac_cms_page_attribute', 'id_cms_page_attribute', true, null, null);
        $this->addForeignKey('fk_cms_page', 'FkCmsPage', 'INTEGER', 'pac_cms_page', 'id_cms_page', true, null, null);
        $this->addColumn('value', 'Value', 'LONGVARCHAR', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCmsPage', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPage', RelationMap::MANY_TO_ONE, array('fk_cms_page' => 'id_cms_page', ), null, null);
        $this->addRelation('PacCmsPageAttribute', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageAttribute', RelationMap::MANY_TO_ONE, array('fk_cms_page_attribute' => 'id_cms_page_attribute', ), null, null);
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsPageAttributeValueTableMap
