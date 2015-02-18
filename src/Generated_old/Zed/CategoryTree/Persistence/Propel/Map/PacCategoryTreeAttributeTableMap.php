<?php



/**
 * This class defines the structure of the 'pac_category_tree_attribute' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.map
 */
class Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryTreeAttributeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/CategoryTree/Persistence/Propel.Map.PacCategoryTreeAttributeTableMap';

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
        $this->setName('pac_category_tree_attribute');
        $this->setPhpName('PacCategoryTreeAttribute');

        $method = 'loadPacCategoryTreeAttribute';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_category_attribute', 'IdCategoryAttribute', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category', 'FkCategory', 'INTEGER', 'pac_category_tree', 'id_category', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('locale_id', 'LocaleId', 'INTEGER', 'pac_locale', 'id_locale', true, 5, null);
        $this->addColumn('url_key', 'UrlKey', 'VARCHAR', false, 255, null);
        $this->addColumn('meta_title', 'MetaTitle', 'LONGVARCHAR', false, null, null);
        $this->addColumn('meta_description', 'MetaDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('meta_keywords', 'MetaKeywords', 'LONGVARCHAR', false, null, null);
        $this->addColumn('category_image_name', 'CategoryImageName', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocale', RelationMap::MANY_TO_ONE, array('locale_id' => 'id_locale', ), null, null);
        $this->addRelation('Category', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree', RelationMap::MANY_TO_ONE, array('fk_category' => 'id_category', ), null, null);
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

} // Generated_Zed_CategoryTree_Persistence_Propel_Map_PacCategoryTreeAttributeTableMap
