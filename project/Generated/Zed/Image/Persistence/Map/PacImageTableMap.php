<?php



/**
 * This class defines the structure of the 'pac_image' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Image/Persistence.map
 */
class Generated_Zed_Image_Persistence_Map_PacImageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Image/Persistence.Map.PacImageTableMap';

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
        $this->setName('pac_image');
        $this->setPhpName('PacImage');
        $this->setClassname('ProjectA_Zed_Image_Persistence_PacImage');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Image/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_image', 'IdImage', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_image_size', 'FkImageSize', 'INTEGER', 'pac_image_size', 'id_image_size', true, null, null);
        $this->addColumn('mapping_id', 'MappingId', 'INTEGER', true, null, null);
        $this->addColumn('priority', 'Priority', 'INTEGER', true, null, 50);
        $this->addColumn('type', 'Type', 'ENUM', true, null, null);
        $this->getColumn('type', false)->setValueSet(array (
  0 => 'product',
  1 => 'manufacturer',
  2 => 'brand',
  3 => 'cms',
));
        $this->addColumn('original_image_path', 'OriginalImagePath', 'VARCHAR', true, 255, null);
        $this->addColumn('base_url_key', 'BaseUrlKey', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ImageSize', 'ProjectA_Zed_Image_Persistence_PacImageSize', RelationMap::MANY_TO_ONE, array('fk_image_size' => 'id_image_size', ), null, null);
        $this->addRelation('ImageProduct', 'ProjectA_Zed_Image_Persistence_PacImageProduct', RelationMap::ONE_TO_MANY, array('id_image' => 'fk_image', ), 'CASCADE', null, 'ImageProducts');
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

} // Generated_Zed_Image_Persistence_Map_PacImageTableMap
