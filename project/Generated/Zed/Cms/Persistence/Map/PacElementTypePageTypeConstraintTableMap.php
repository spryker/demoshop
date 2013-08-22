<?php



/**
 * This class defines the structure of the 'pac_cms_elementtype_pagetype_constraint' table.
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
class Generated_Zed_Cms_Persistence_Map_PacElementTypePageTypeConstraintTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cms/Persistence.Map.PacElementTypePageTypeConstraintTableMap';

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
        $this->setName('pac_cms_elementtype_pagetype_constraint');
        $this->setPhpName('PacElementTypePageTypeConstraint');
        $this->setClassname('ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint');
        $this->setPackage('vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('fk_cms_page_type', 'FkCmsPageType', 'INTEGER' , 'pac_cms_page_type', 'id_cms_page_type', true, null, null);
        $this->addForeignPrimaryKey('fk_cms_element_type', 'FkCmsElementType', 'INTEGER' , 'pac_cms_element_type', 'id_cms_element_type', true, null, null);
        $this->addColumn('is_default', 'IsDefault', 'TINYINT', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ElementType', 'ProjectA_Zed_Cms_Persistence_PacCmsElementType', RelationMap::MANY_TO_ONE, array('fk_cms_element_type' => 'id_cms_element_type', ), null, null);
        $this->addRelation('PageType', 'ProjectA_Zed_Cms_Persistence_PacCmsPageType', RelationMap::MANY_TO_ONE, array('fk_cms_page_type' => 'id_cms_page_type', ), null, null);
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

} // Generated_Zed_Cms_Persistence_Map_PacElementTypePageTypeConstraintTableMap
