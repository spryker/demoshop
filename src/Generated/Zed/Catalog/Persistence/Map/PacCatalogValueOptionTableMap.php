<?php



/**
 * This class defines the structure of the 'pac_catalog_value_option' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.map
 */
class Generated_Zed_Catalog_Persistence_Map_PacCatalogValueOptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.PacCatalogValueOptionTableMap';

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
        $this->setName('pac_catalog_value_option');
        $this->setPhpName('PacCatalogValueOption');

        $method = 'getPacCatalogValueOption';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_value_option', 'IdCatalogValueOption', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('fk_catalog_value_type', 'FkCatalogValueType', 'INTEGER', 'pac_catalog_value_type', 'id_catalog_value_type', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ValueType', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueType', RelationMap::MANY_TO_ONE, array('fk_catalog_value_type' => 'id_catalog_value_type', ), null, null);
        $this->addRelation('OptionMulti', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti', RelationMap::ONE_TO_MANY, array('id_catalog_value_option' => 'fk_catalog_value_option', ), null, null, 'OptionMultis');
        $this->addRelation('OptionSingle', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle', RelationMap::ONE_TO_MANY, array('id_catalog_value_option' => 'fk_catalog_value_option', ), null, null, 'OptionSingles');
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

} // Generated_Zed_Catalog_Persistence_Map_PacCatalogValueOptionTableMap
