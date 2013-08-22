<?php



/**
 * This class defines the structure of the 'sao_fulfillment_quote_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.map
 */
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentQuoteItemTableMap';

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
        $this->setName('sao_fulfillment_quote_item');
        $this->setPhpName('SaoFulfillmentQuoteItem');
        $this->setClassname('Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem');
        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addForeignPrimaryKey('fk_fulfillment_quote', 'FkFulfillmentQuote', 'INTEGER' , 'sao_fulfillment_quote', 'id_quote', true, null, null);
        $this->addForeignPrimaryKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER' , 'pac_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', RelationMap::MANY_TO_ONE, array('fk_fulfillment_quote' => 'id_quote', ), null, null);
        $this->addRelation('Item', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::MANY_TO_ONE, array('fk_sales_order_item' => 'id_sales_order_item', ), null, null);
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteItemTableMap
