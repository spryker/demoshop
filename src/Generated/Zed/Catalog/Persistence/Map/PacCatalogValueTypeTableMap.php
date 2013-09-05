<?php



/**
 * This class defines the structure of the 'pac_catalog_value_type' table.
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
class Generated_Zed_Catalog_Persistence_Map_PacCatalogValueTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Catalog/Persistence.Map.PacCatalogValueTypeTableMap';

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
        $this->setName('pac_catalog_value_type');
        $this->setPhpName('PacCatalogValueType');

        $method = 'getPacCatalogValueType';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_catalog_value_type', 'IdCatalogValueType', 'INTEGER', true, null, null);
        $this->addColumn('variety', 'Variety', 'CHAR', true, null, null);
        $this->getColumn('variety', false)->setValueSet(array (
  0 => 'Text',
  1 => 'Integer',
  2 => 'Boolean',
  3 => 'OptionSingle',
  4 => 'OptionMulti',
  5 => 'Decimal',
  6 => 'TextArea',
  7 => 'Timestamp',
));
        $this->addForeignKey('fk_catalog_attribute', 'FkCatalogAttribute', 'INTEGER', 'pac_catalog_attribute', 'id_catalog_attribute', true, null, null);
        $this->addForeignKey('fk_catalog_attribute_set', 'FkCatalogAttributeSet', 'INTEGER', 'pac_catalog_attribute_set', 'id_catalog_attribute_set', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Attribute', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute', RelationMap::MANY_TO_ONE, array('fk_catalog_attribute' => 'id_catalog_attribute', ), null, null);
        $this->addRelation('AttributeSet', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet', RelationMap::MANY_TO_ONE, array('fk_catalog_attribute_set' => 'id_catalog_attribute_set', ), 'CASCADE', null);
        $this->addRelation('AttributeSetGroup', 'ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup', RelationMap::ONE_TO_MANY, array('id_catalog_value_type' => 'fk_catalog_value_type', ), null, null, 'AttributeSetGroups');
        $this->addRelation('Option', 'ProjectA_Zed_Catalog_Persistence_PacCatalogValueOption', RelationMap::ONE_TO_MANY, array('id_catalog_value_type' => 'fk_catalog_value_type', ), null, null, 'Options');
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

} // Generated_Zed_Catalog_Persistence_Map_PacCatalogValueTypeTableMap
