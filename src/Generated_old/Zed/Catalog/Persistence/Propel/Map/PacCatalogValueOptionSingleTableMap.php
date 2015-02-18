<?php



/**
 * This class defines the structure of the 'pac_catalog_value_option_single' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.map
 */
class Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogValueOptionSingleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Catalog/Persistence/Propel.Map.PacCatalogValueOptionSingleTableMap';

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
        $this->setName('pac_catalog_value_option_single');
        $this->setPhpName('PacCatalogValueOptionSingle');

        $method = 'loadPacCatalogValueOptionSingle';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_value_option_single', 'IdCatalogValueOptionSingle', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_catalog_value_option', 'FkCatalogValueOption', 'INTEGER', 'pac_catalog_value_option', 'id_catalog_value_option', true, null, null);
        $this->addForeignKey('fk_catalog_attribute', 'FkCatalogAttribute', 'INTEGER', 'pac_catalog_attribute', 'id_catalog_attribute', true, null, null);
        $this->addForeignKey('fk_catalog_product', 'FkCatalogProduct', 'INTEGER', 'pac_catalog_product', 'id_catalog_product', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Option', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption', RelationMap::MANY_TO_ONE, array('fk_catalog_value_option' => 'id_catalog_value_option', ), null, null);
        $this->addRelation('Attribute', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute', RelationMap::MANY_TO_ONE, array('fk_catalog_attribute' => 'id_catalog_attribute', ), null, null);
        $this->addRelation('ProductEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct', RelationMap::MANY_TO_ONE, array('fk_catalog_product' => 'id_catalog_product', ), null, null);
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

} // Generated_Zed_Catalog_Persistence_Propel_Map_PacCatalogValueOptionSingleTableMap
