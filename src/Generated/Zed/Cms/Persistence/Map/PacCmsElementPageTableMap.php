<?php



/**
 * This class defines the structure of the 'pac_cms_element_page' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.map
 */
class Generated_Zed_Cms_Persistence_Map_PacCmsElementPageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cms/Persistence.Map.PacCmsElementPageTableMap';

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
        $this->setName('pac_cms_element_page');
        $this->setPhpName('PacCmsElementPage');

        $method = 'getPacCmsElementPage';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence.map');
        $this->setUseIdGenerator(true);
        $this->setIsCrossRef(true);
        // columns
        $this->addPrimaryKey('id_cms_element_page', 'IdCmsElementPage', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cms_element', 'FkCmsElement', 'INTEGER', 'pac_cms_element', 'id_cms_element', true, null, null);
        $this->addForeignKey('fk_cms_page', 'FkCmsPage', 'INTEGER', 'pac_cms_page', 'id_cms_page', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Page', 'ProjectA_Zed_Cms_Persistence_PacCmsPage', RelationMap::MANY_TO_ONE, array('fk_cms_page' => 'id_cms_page', ), null, null);
        $this->addRelation('Element', 'ProjectA_Zed_Cms_Persistence_PacCmsElement', RelationMap::MANY_TO_ONE, array('fk_cms_element' => 'id_cms_element', ), null, null);
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

} // Generated_Zed_Cms_Persistence_Map_PacCmsElementPageTableMap
