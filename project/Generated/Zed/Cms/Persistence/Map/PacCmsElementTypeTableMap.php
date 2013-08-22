<?php



/**
 * This class defines the structure of the 'pac_cms_element_type' table.
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
class Generated_Zed_Cms_Persistence_Map_PacCmsElementTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cms/Persistence.Map.PacCmsElementTypeTableMap';

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
        $this->setName('pac_cms_element_type');
        $this->setPhpName('PacCmsElementType');
        $this->setClassname('ProjectA_Zed_Cms_Persistence_PacCmsElementType');
        $this->setPackage('vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_element_type', 'IdCmsElementType', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('element_type_key', 'ElementTypeKey', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('input', 'Input', 'VARCHAR', true, 255, null);
        $this->addColumn('tab', 'Tab', 'VARCHAR', true, 255, null);
        // validators
        $this->addValidator('name', 'unique', 'propel.validator.UniqueValidator', '', 'This name already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Element', 'ProjectA_Zed_Cms_Persistence_PacCmsElement', RelationMap::ONE_TO_MANY, array('id_cms_element_type' => 'fk_cms_element_type', ), null, null, 'Elements');
        $this->addRelation('ElementTypePageTypeConstraint', 'ProjectA_Zed_Cms_Persistence_PacElementTypePageTypeConstraint', RelationMap::ONE_TO_MANY, array('id_cms_element_type' => 'fk_cms_element_type', ), null, null, 'ElementTypePageTypeConstraints');
        $this->addRelation('PageType', 'ProjectA_Zed_Cms_Persistence_PacCmsPageType', RelationMap::MANY_TO_MANY, array(), null, null, 'PageTypes');
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

} // Generated_Zed_Cms_Persistence_Map_PacCmsElementTypeTableMap
