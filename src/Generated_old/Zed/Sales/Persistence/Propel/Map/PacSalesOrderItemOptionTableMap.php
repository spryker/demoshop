<?php



/**
 * This class defines the structure of the 'pac_sales_order_item_option' table.
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
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemOptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesOrderItemOptionTableMap';

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
        $this->setName('pac_sales_order_item_option');
        $this->setPhpName('PacSalesOrderItemOption');

        $method = 'loadPacSalesOrderItemOption';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_item_option', 'IdSalesOrderItemOption', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'pac_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', false, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, 0);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, 0);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'INTEGER', true, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount', RelationMap::ONE_TO_MANY, array('id_sales_order_item_option' => 'fk_sales_order_item_option', ), null, null, 'Discounts');
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

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemOptionTableMap
