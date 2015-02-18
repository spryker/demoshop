<?php



/**
 * This class defines the structure of the 'pac_sales_discount_code' table.
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
class Generated_Zed_Sales_Persistence_Propel_Map_PacSalesDiscountCodeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Sales/Persistence/Propel.Map.PacSalesDiscountCodeTableMap';

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
        $this->setName('pac_sales_discount_code');
        $this->setPhpName('PacSalesDiscountCode');

        $method = 'loadPacSalesDiscountCode';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_discount_code', 'IdSalesDiscountCode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_discount', 'FkSalesDiscount', 'INTEGER', 'pac_sales_discount', 'id_sales_discount', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('codepool_name', 'CodepoolName', 'VARCHAR', true, 255, null);
        $this->addColumn('is_reusable', 'IsReusable', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_once_per_customer', 'IsOncePerCustomer', 'BOOLEAN', false, 1, true);
        $this->addColumn('is_refundable', 'IsRefundable', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount', RelationMap::MANY_TO_ONE, array('fk_sales_discount' => 'id_sales_discount', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Propel_Map_PacSalesDiscountCodeTableMap
