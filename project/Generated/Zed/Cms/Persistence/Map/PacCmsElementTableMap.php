<?php



/**
 * This class defines the structure of the 'pac_cms_element' table.
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
class Generated_Zed_Cms_Persistence_Map_PacCmsElementTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cms/Persistence.Map.PacCmsElementTableMap';

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
        $this->setName('pac_cms_element');
        $this->setPhpName('PacCmsElement');
        $this->setClassname('ProjectA_Zed_Cms_Persistence_PacCmsElement');
        $this->setPackage('vendor/project-a/content-package/ProjectA/Zed/Cms/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_element', 'IdCmsElement', 'INTEGER', true, null, null);
        $this->addColumn('element_key', 'ElementKey', 'VARCHAR', true, 255, '');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('fk_cms_element_type', 'FkCmsElementType', 'INTEGER', 'pac_cms_element_type', 'id_cms_element_type', true, null, null);
        $this->addColumn('updated_from', 'UpdatedFrom', 'INTEGER', false, null, null);
        $this->addColumn('version', 'Version', 'SMALLINT', false, null, 1);
        $this->addColumn('status', 'Status', 'ENUM', true, null, 'In progress');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'Active',
  1 => 'Disabled',
  2 => 'In progress',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
        $this->addValidator('name', 'unique', 'propel.validator.UniqueValidator', '', 'This name already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ElementType', 'ProjectA_Zed_Cms_Persistence_PacCmsElementType', RelationMap::MANY_TO_ONE, array('fk_cms_element_type' => 'id_cms_element_type', ), null, null);
        $this->addRelation('ElementPage', 'ProjectA_Zed_Cms_Persistence_PacCmsElementPage', RelationMap::ONE_TO_MANY, array('id_cms_element' => 'fk_cms_element', ), null, null, 'ElementPages');
        $this->addRelation('Page', 'ProjectA_Zed_Cms_Persistence_PacCmsPage', RelationMap::MANY_TO_MANY, array(), null, null, 'Pages');
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

} // Generated_Zed_Cms_Persistence_Map_PacCmsElementTableMap
