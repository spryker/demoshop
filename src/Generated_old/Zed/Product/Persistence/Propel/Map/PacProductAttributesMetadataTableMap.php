<?php



/**
 * This class defines the structure of the 'pac_attributes_metadata' table.
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
class Generated_Zed_Product_Persistence_Propel_Map_PacProductAttributesMetadataTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacProductAttributesMetadataTableMap';

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
        $this->setName('pac_attributes_metadata');
        $this->setPhpName('PacProductAttributesMetadata');

        $method = 'loadPacProductAttributesMetadata';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('attribute_id', 'AttributeId', 'INTEGER', true, null, null);
        $this->addColumn('key', 'Key', 'VARCHAR', true, 255, null);
        $this->addColumn('is_editable', 'IsEditable', 'BOOLEAN', true, 1, true);
        $this->addForeignKey('type_id', 'TypeId', 'INTEGER', 'pac_attribute_type', 'type_id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProductAttributeType', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType', RelationMap::MANY_TO_ONE, array('type_id' => 'type_id', ), null, null);
        $this->addRelation('PacProductSearchAttributesOperation', 'ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation', RelationMap::ONE_TO_MANY, array('attribute_id' => 'source_attribute_id', ), 'CASCADE', null, 'PacProductSearchAttributesOperations');
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

} // Generated_Zed_Product_Persistence_Propel_Map_PacProductAttributesMetadataTableMap
