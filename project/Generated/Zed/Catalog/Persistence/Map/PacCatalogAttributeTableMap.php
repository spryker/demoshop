<?php



/**
 * This class defines the structure of the 'pac_catalog_attribute' table.
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
class Generated_Zed_Catalog_Persistence_Map_PacCatalogAttributeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.PacCatalogAttributeTableMap';

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
        $this->setName('pac_catalog_attribute');
        $this->setPhpName('PacCatalogAttribute');
        $this->setClassname('ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_attribute', 'IdCatalogAttribute', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ValueType', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueType', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'ValueTypes');
        $this->addRelation('AttributeGroup', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeGroup', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'AttributeGroups');
        $this->addRelation('OptionMulti', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionMulti', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'OptionMultis');
        $this->addRelation('OptionSingle', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionSingle', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'OptionSingles');
        $this->addRelation('Integer', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueInteger', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'Integers');
        $this->addRelation('Timestamp', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueTimestamp', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'Timestamps');
        $this->addRelation('Decimal', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueDecimal', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'Decimals');
        $this->addRelation('Text', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueText', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'Texts');
        $this->addRelation('TextArea', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueTextArea', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'TextAreas');
        $this->addRelation('Boolean', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueBoolean', RelationMap::ONE_TO_MANY, array('id_catalog_attribute' => 'fk_catalog_attribute', ), null, null, 'Booleans');
        $this->addRelation('Group', 'ProjectA_Zed_Catalog_Persistence_PacCatalogGroup', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null, 'Groups');
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

} // Generated_Zed_Catalog_Persistence_Map_PacCatalogAttributeTableMap
