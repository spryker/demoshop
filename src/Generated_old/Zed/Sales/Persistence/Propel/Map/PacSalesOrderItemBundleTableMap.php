<?php



/**
 * This class defines the structure of the 'pac_sales_order_item_bundle' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map
 */
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemBundleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesOrderItemBundleTableMap';

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
        $this->setName('pac_sales_order_item_bundle');
        $this->setPhpName('PacSalesOrderItemBundle');

        $method = 'loadPacSalesOrderItemBundle';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_item_bundle', 'IdSalesOrderItemBundle', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
        $this->addColumn('bundle_type', 'BundleType', 'CHAR', true, null, null);
        $this->getColumn('bundle_type', false)->setValueSet(array (
  0 => 'NonSplitBundle',
  1 => 'SplitBundle',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesOrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_sales_order_item_bundle' => 'fk_sales_order_item_bundle', ), null, null, 'SalesOrderItems');
        $this->addRelation('SalesOrderItemBundleItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem', RelationMap::ONE_TO_MANY, array('id_sales_order_item_bundle' => 'fk_sales_order_item_bundle', ), null, null, 'SalesOrderItemBundleItems');
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
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemBundleTableMap
