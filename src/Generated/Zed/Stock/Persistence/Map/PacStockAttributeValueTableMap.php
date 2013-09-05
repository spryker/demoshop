<?php



/**
 * This class defines the structure of the 'pac_stock_attribute_value' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.map
 */
class Generated_Zed_Stock_Persistence_Map_PacStockAttributeValueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Stock/Persistence.Map.PacStockAttributeValueTableMap';

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
        $this->setName('pac_stock_attribute_value');
        $this->setPhpName('PacStockAttributeValue');

        $method = 'getPacStockAttributeValue';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_stock_attribute_value', 'IdStockAttributeValue', 'INTEGER', true, null, null);
        $this->addColumn('value', 'Value', 'VARCHAR', true, 20000, null);
        $this->addForeignKey('fk_stock_attribute', 'FkStockAttribute', 'INTEGER', 'pac_stock_attribute', 'id_stock_attribute', true, null, null);
        $this->addForeignKey('fk_stock', 'FkStock', 'INTEGER', 'pac_stock', 'id_stock', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Attribute', 'ProjectA_Zed_Stock_Persistence_PacStockAttribute', RelationMap::MANY_TO_ONE, array('fk_stock_attribute' => 'id_stock_attribute', ), null, null);
        $this->addRelation('Stock', 'ProjectA_Zed_Stock_Persistence_PacStock', RelationMap::MANY_TO_ONE, array('fk_stock' => 'id_stock', ), null, null);
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

} // Generated_Zed_Stock_Persistence_Map_PacStockAttributeValueTableMap
