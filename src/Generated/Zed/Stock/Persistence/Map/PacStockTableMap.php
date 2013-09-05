<?php



/**
 * This class defines the structure of the 'pac_stock' table.
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
class Generated_Zed_Stock_Persistence_Map_PacStockTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Stock/Persistence.Map.PacStockTableMap';

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
        $this->setName('pac_stock');
        $this->setPhpName('PacStock');

        $method = 'getPacStock';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_stock', 'IdStock', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('is_never_out_of_stock', 'IsNeverOutOfStock', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AttributeValue', 'ProjectA_Zed_Stock_Persistence_PacStockAttributeValue', RelationMap::ONE_TO_MANY, array('id_stock' => 'fk_stock', ), null, null, 'AttributeValues');
        $this->addRelation('StockProduct', 'ProjectA_Zed_Stock_Persistence_PacStockProduct', RelationMap::ONE_TO_MANY, array('id_stock' => 'fk_stock', ), null, null, 'StockProducts');
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

} // Generated_Zed_Stock_Persistence_Map_PacStockTableMap
