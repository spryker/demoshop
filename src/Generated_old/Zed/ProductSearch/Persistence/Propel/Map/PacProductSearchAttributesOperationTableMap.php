<?php



/**
 * This class defines the structure of the 'pac_product_search_attributes_operation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductSearch/Persistence/Propel.map
 */
class Generated_Zed_ProductSearch_Persistence_Propel_Map_PacProductSearchAttributesOperationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/ProductSearch/Persistence/Propel.Map.PacProductSearchAttributesOperationTableMap';

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
        $this->setName('pac_product_search_attributes_operation');
        $this->setPhpName('PacProductSearchAttributesOperation');

        $method = 'loadPacProductSearchAttributesOperation';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/ProductSearch/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('source_attribute_id', 'SourceAttributeId', 'INTEGER' , 'pac_attributes_metadata', 'attribute_id', true, null, null);
        $this->addPrimaryKey('operation', 'Operation', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('target_field', 'TargetField', 'VARCHAR', true, 255, null);
        $this->addColumn('weighting', 'Weighting', 'INTEGER', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProductAttributesMetadata', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata', RelationMap::MANY_TO_ONE, array('source_attribute_id' => 'attribute_id', ), 'CASCADE', null);
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

} // Generated_Zed_ProductSearch_Persistence_Propel_Map_PacProductSearchAttributesOperationTableMap
