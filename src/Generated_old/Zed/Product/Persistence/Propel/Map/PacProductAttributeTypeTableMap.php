<?php



/**
 * This class defines the structure of the 'pac_attribute_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map
 */
class Generated_Zed_Product_Persistence_Propel_Map_PacProductAttributeTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacProductAttributeTypeTableMap';

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
        $this->setName('pac_attribute_type');
        $this->setPhpName('PacProductAttributeType');

        $method = 'loadPacProductAttributeType';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('type_id', 'TypeId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('parent_type_id', 'ParentTypeId', 'INTEGER', 'pac_attribute_type', 'type_id', false, null, null);
        $this->addColumn('input_representation', 'InputRepresentation', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProductAttributeTypeRelatedByParentTypeId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType', RelationMap::MANY_TO_ONE, array('parent_type_id' => 'type_id', ), null, null);
        $this->addRelation('PacProductAttributesMetadata', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata', RelationMap::ONE_TO_MANY, array('type_id' => 'type_id', ), null, null, 'PacProductAttributesMetadatas');
        $this->addRelation('PacProductAttributeTypeRelatedByTypeId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType', RelationMap::ONE_TO_MANY, array('type_id' => 'parent_type_id', ), null, null, 'PacProductAttributeTypesRelatedByTypeId');
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

} // Generated_Zed_Product_Persistence_Propel_Map_PacProductAttributeTypeTableMap
