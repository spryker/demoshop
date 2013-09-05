<?php



/**
 * This class defines the structure of the 'sao_fulfillment_quote' table.
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
class Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Fulfillment/Persistence.Map.SaoFulfillmentQuoteTableMap';

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
        $this->setName('sao_fulfillment_quote');
        $this->setPhpName('SaoFulfillmentQuote');

        $method = 'getSaoFulfillmentQuote';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Fulfillment/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_quote', 'IdQuote', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addForeignKey('fk_fulfillment_provider', 'FkFulfillmentProvider', 'INTEGER', 'sao_fulfillment_provider', 'id_provider', true, null, null);
        $this->addColumn('quote_id', 'QuoteId', 'VARCHAR', true, 255, null);
        $this->addForeignKey('fk_shipping_agent', 'FkShippingAgent', 'INTEGER', 'sao_fulfillment_shipping_agent', 'id_shipping_agent', true, null, null);
        $this->addColumn('shipping_product', 'ShippingProduct', 'VARCHAR', false, 255, null);
        $this->addColumn('shipping_price', 'ShippingPrice', 'INTEGER', false, null, null);
        $this->addColumn('shipping_freight', 'ShippingFreight', 'INTEGER', false, null, null);
        $this->addColumn('shipping_tax_duties', 'ShippingTaxDuties', 'INTEGER', false, null, null);
        $this->addColumn('shipping_currency_code', 'ShippingCurrencyCode', 'VARCHAR', false, 20, null);
        $this->addColumn('packing_slip_url_front', 'PackingSlipUrlFront', 'VARCHAR', false, 255, null);
        $this->addColumn('packing_slip_url_back', 'PackingSlipUrlBack', 'VARCHAR', false, 255, null);
        $this->addColumn('provider_order_number', 'ProviderOrderNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('internal_order_number', 'InternalOrderNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('order_timestamp', 'OrderTimestamp', 'TIMESTAMP', false, null, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ShippingAgent', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent', RelationMap::MANY_TO_ONE, array('fk_shipping_agent' => 'id_shipping_agent', ), null, null);
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::MANY_TO_ONE, array('fk_sales_order' => 'id_sales_order', ), null, null);
        $this->addRelation('Provider', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider', RelationMap::MANY_TO_ONE, array('fk_fulfillment_provider' => 'id_provider', ), null, null);
        $this->addRelation('QuoteItem', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem', RelationMap::ONE_TO_MANY, array('id_quote' => 'fk_fulfillment_quote', ), null, null, 'QuoteItems');
        $this->addRelation('Tracking', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking', RelationMap::ONE_TO_MANY, array('id_quote' => 'fk_quote', ), null, null, 'Trackings');
        $this->addRelation('Item', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', RelationMap::MANY_TO_MANY, array(), null, null, 'Items');
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

} // Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteTableMap
