<?php



/**
 * This class defines the structure of the 'pac_stock_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Stock/Persistence/Propel.map
 */
class Generated_Zed_Stock_Persistence_Propel_Map_PacStockProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Stock/Persistence/Propel.Map.PacStockProductTableMap';

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
        $this->setName('pac_stock_product');
        $this->setPhpName('PacStockProduct');

        $method = 'loadPacStockProduct';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Stock/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_stock_product', 'IdStockProduct', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_product', 'FkProduct', 'INTEGER', 'pac_product', 'product_id', true, null, null);
        $this->addForeignKey('fk_stock', 'FkStock', 'INTEGER', 'pac_stock', 'id_stock', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, 0);
        $this->addColumn('is_never_out_of_stock', 'IsNeverOutOfStock', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProduct', RelationMap::MANY_TO_ONE, array('fk_product' => 'product_id', ), null, null);
        $this->addRelation('Stock', 'ProjectA_Zed_Stock_Persistence_Propel_PacStock', RelationMap::MANY_TO_ONE, array('fk_stock' => 'id_stock', ), null, null);
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

} // Generated_Zed_Stock_Persistence_Propel_Map_PacStockProductTableMap
