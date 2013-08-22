<?php



/**
 * This class defines the structure of the 'pac_cms_page_type' table.
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
class Generated_Zed_Cms_Persistence_Map_PacCmsPageTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cms/Persistence.Map.PacCmsPageTypeTableMap';

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
        $this->setName('pac_cms_page_type');
        $this->setPhpName('PacCmsPageType');
        $this->setClassname('ProjectA_Zed_Cms_Persistence_PacCmsPageType');
        $this->setPackage('vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_page_type', 'IdCmsPageType', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('layout', 'Layout', 'VARCHAR', true, 32, null);
        $this->addColumn('view', 'View', 'VARCHAR', true, 32, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        // validators
        $this->addValidator('name', 'unique', 'propel.validator.UniqueValidator', '', 'This name already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Page', 'ProjectA_Zed_Cms_Persistence_PacCmsPage', RelationMap::ONE_TO_MANY, array('id_cms_page_type' => 'fk_cms_page_type', ), null, null, 'Pages');
        $this->addRelation('ElementTypePageTypeConstraint', 'ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint', RelationMap::ONE_TO_MANY, array('id_cms_page_type' => 'fk_cms_page_type', ), null, null, 'ElementTypePageTypeConstraints');
        $this->addRelation('ElementType', 'ProjectA_Zed_Cms_Persistence_PacCmsElementType', RelationMap::MANY_TO_MANY, array(), null, null, 'ElementTypes');
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

} // Generated_Zed_Cms_Persistence_Map_PacCmsPageTypeTableMap
