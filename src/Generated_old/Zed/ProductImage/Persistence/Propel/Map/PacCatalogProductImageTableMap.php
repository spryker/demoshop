<?php



/**
 * This class defines the structure of the 'pac_catalog_product_image' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductImage/Persistence/Propel.map
 */
class Generated_Zed_ProductImage_Persistence_Propel_Map_PacCatalogProductImageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/ProductImage/Persistence/Propel.Map.PacCatalogProductImageTableMap';

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
        $this->setName('pac_catalog_product_image');
        $this->setPhpName('PacCatalogProductImage');

        $method = 'loadPacCatalogProductImage';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/ProductImage/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_product_image', 'IdCatalogProductImage', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_catalog_product', 'FkCatalogProduct', 'INTEGER', 'pac_catalog_product', 'id_catalog_product', true, null, null);
        $this->addForeignKey('fk_catalog_product_image_size', 'FkCatalogProductImageSize', 'INTEGER', 'pac_catalog_product_image_size', 'id_catalog_product_image_size', true, null, null);
        $this->addColumn('seo_title', 'SeoTitle', 'VARCHAR', false, 255, null);
        $this->addColumn('seo_filename', 'SeoFilename', 'VARCHAR', true, 255, null);
        $this->addColumn('weight', 'Weight', 'VARCHAR', true, 255, '0');
        $this->addColumn('original_image_path', 'OriginalImagePath', 'VARCHAR', true, 255, null);
        $this->addColumn('processed_image_path', 'ProcessedImagePath', 'VARCHAR', true, 255, null);
        $this->addColumn('image_hash', 'ImageHash', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductImageSize', 'ProjectA_Zed_ProductImage_Persistence_Propel_PacCatalogProductImageSize', RelationMap::MANY_TO_ONE, array('fk_catalog_product_image_size' => 'id_catalog_product_image_size', ), null, null);
        $this->addRelation('Product', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('fk_catalog_product' => 'id_catalog_product', ), null, null);
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

} // Generated_Zed_ProductImage_Persistence_Propel_Map_PacCatalogProductImageTableMap
