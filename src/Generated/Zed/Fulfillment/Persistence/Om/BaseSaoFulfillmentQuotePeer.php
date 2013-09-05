<?php


/**
 * Base static class for performing query and update operations on the 'sao_fulfillment_quote' table.
 *
 *
 *
 * @package propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuotePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'sao_fulfillment_quote';

    /** the related Propel class for this table */
    const OM_CLASS = 'SaoFulfillmentQuote';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the id_quote field */
    const ID_QUOTE = 'sao_fulfillment_quote.id_quote';

    /** the column name for the fk_sales_order field */
    const FK_SALES_ORDER = 'sao_fulfillment_quote.fk_sales_order';

    /** the column name for the fk_fulfillment_provider field */
    const FK_FULFILLMENT_PROVIDER = 'sao_fulfillment_quote.fk_fulfillment_provider';

    /** the column name for the quote_id field */
    const QUOTE_ID = 'sao_fulfillment_quote.quote_id';

    /** the column name for the fk_shipping_agent field */
    const FK_SHIPPING_AGENT = 'sao_fulfillment_quote.fk_shipping_agent';

    /** the column name for the shipping_product field */
    const SHIPPING_PRODUCT = 'sao_fulfillment_quote.shipping_product';

    /** the column name for the shipping_price field */
    const SHIPPING_PRICE = 'sao_fulfillment_quote.shipping_price';

    /** the column name for the shipping_freight field */
    const SHIPPING_FREIGHT = 'sao_fulfillment_quote.shipping_freight';

    /** the column name for the shipping_tax_duties field */
    const SHIPPING_TAX_DUTIES = 'sao_fulfillment_quote.shipping_tax_duties';

    /** the column name for the shipping_currency_code field */
    const SHIPPING_CURRENCY_CODE = 'sao_fulfillment_quote.shipping_currency_code';

    /** the column name for the packing_slip_url_front field */
    const PACKING_SLIP_URL_FRONT = 'sao_fulfillment_quote.packing_slip_url_front';

    /** the column name for the packing_slip_url_back field */
    const PACKING_SLIP_URL_BACK = 'sao_fulfillment_quote.packing_slip_url_back';

    /** the column name for the provider_order_number field */
    const PROVIDER_ORDER_NUMBER = 'sao_fulfillment_quote.provider_order_number';

    /** the column name for the internal_order_number field */
    const INTERNAL_ORDER_NUMBER = 'sao_fulfillment_quote.internal_order_number';

    /** the column name for the order_timestamp field */
    const ORDER_TIMESTAMP = 'sao_fulfillment_quote.order_timestamp';

    /** the column name for the is_deleted field */
    const IS_DELETED = 'sao_fulfillment_quote.is_deleted';

    /** the column name for the created_at field */
    const CREATED_AT = 'sao_fulfillment_quote.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'sao_fulfillment_quote.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldNames[Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdQuote', 'FkSalesOrder', 'FkFulfillmentProvider', 'QuoteId', 'FkShippingAgent', 'ShippingProduct', 'ShippingPrice', 'ShippingFreight', 'ShippingTaxDuties', 'ShippingCurrencyCode', 'PackingSlipUrlFront', 'PackingSlipUrlBack', 'ProviderOrderNumber', 'InternalOrderNumber', 'OrderTimestamp', 'IsDeleted', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idQuote', 'fkSalesOrder', 'fkFulfillmentProvider', 'quoteId', 'fkShippingAgent', 'shippingProduct', 'shippingPrice', 'shippingFreight', 'shippingTaxDuties', 'shippingCurrencyCode', 'packingSlipUrlFront', 'packingSlipUrlBack', 'providerOrderNumber', 'internalOrderNumber', 'orderTimestamp', 'isDeleted', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_QUOTE', 'FK_SALES_ORDER', 'FK_FULFILLMENT_PROVIDER', 'QUOTE_ID', 'FK_SHIPPING_AGENT', 'SHIPPING_PRODUCT', 'SHIPPING_PRICE', 'SHIPPING_FREIGHT', 'SHIPPING_TAX_DUTIES', 'SHIPPING_CURRENCY_CODE', 'PACKING_SLIP_URL_FRONT', 'PACKING_SLIP_URL_BACK', 'PROVIDER_ORDER_NUMBER', 'INTERNAL_ORDER_NUMBER', 'ORDER_TIMESTAMP', 'IS_DELETED', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_quote', 'fk_sales_order', 'fk_fulfillment_provider', 'quote_id', 'fk_shipping_agent', 'shipping_product', 'shipping_price', 'shipping_freight', 'shipping_tax_duties', 'shipping_currency_code', 'packing_slip_url_front', 'packing_slip_url_back', 'provider_order_number', 'internal_order_number', 'order_timestamp', 'is_deleted', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdQuote' => 0, 'FkSalesOrder' => 1, 'FkFulfillmentProvider' => 2, 'QuoteId' => 3, 'FkShippingAgent' => 4, 'ShippingProduct' => 5, 'ShippingPrice' => 6, 'ShippingFreight' => 7, 'ShippingTaxDuties' => 8, 'ShippingCurrencyCode' => 9, 'PackingSlipUrlFront' => 10, 'PackingSlipUrlBack' => 11, 'ProviderOrderNumber' => 12, 'InternalOrderNumber' => 13, 'OrderTimestamp' => 14, 'IsDeleted' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idQuote' => 0, 'fkSalesOrder' => 1, 'fkFulfillmentProvider' => 2, 'quoteId' => 3, 'fkShippingAgent' => 4, 'shippingProduct' => 5, 'shippingPrice' => 6, 'shippingFreight' => 7, 'shippingTaxDuties' => 8, 'shippingCurrencyCode' => 9, 'packingSlipUrlFront' => 10, 'packingSlipUrlBack' => 11, 'providerOrderNumber' => 12, 'internalOrderNumber' => 13, 'orderTimestamp' => 14, 'isDeleted' => 15, 'createdAt' => 16, 'updatedAt' => 17, ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE => 0, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER => 1, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER => 2, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID => 3, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT => 4, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT => 5, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE => 6, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT => 7, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES => 8, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE => 9, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT => 10, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK => 11, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER => 12, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER => 13, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP => 14, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED => 15, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT => 16, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_QUOTE' => 0, 'FK_SALES_ORDER' => 1, 'FK_FULFILLMENT_PROVIDER' => 2, 'QUOTE_ID' => 3, 'FK_SHIPPING_AGENT' => 4, 'SHIPPING_PRODUCT' => 5, 'SHIPPING_PRICE' => 6, 'SHIPPING_FREIGHT' => 7, 'SHIPPING_TAX_DUTIES' => 8, 'SHIPPING_CURRENCY_CODE' => 9, 'PACKING_SLIP_URL_FRONT' => 10, 'PACKING_SLIP_URL_BACK' => 11, 'PROVIDER_ORDER_NUMBER' => 12, 'INTERNAL_ORDER_NUMBER' => 13, 'ORDER_TIMESTAMP' => 14, 'IS_DELETED' => 15, 'CREATED_AT' => 16, 'UPDATED_AT' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('id_quote' => 0, 'fk_sales_order' => 1, 'fk_fulfillment_provider' => 2, 'quote_id' => 3, 'fk_shipping_agent' => 4, 'shipping_product' => 5, 'shipping_price' => 6, 'shipping_freight' => 7, 'shipping_tax_duties' => 8, 'shipping_currency_code' => 9, 'packing_slip_url_front' => 10, 'packing_slip_url_back' => 11, 'provider_order_number' => 12, 'internal_order_number' => 13, 'order_timestamp' => 14, 'is_deleted' => 15, 'created_at' => 16, 'updated_at' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getFieldNames($toType);
        $key = isset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldKeys[$fromType][$name]) ? Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_quote');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.fk_fulfillment_provider');
            $criteria->addSelectColumn($alias . '.quote_id');
            $criteria->addSelectColumn($alias . '.fk_shipping_agent');
            $criteria->addSelectColumn($alias . '.shipping_product');
            $criteria->addSelectColumn($alias . '.shipping_price');
            $criteria->addSelectColumn($alias . '.shipping_freight');
            $criteria->addSelectColumn($alias . '.shipping_tax_duties');
            $criteria->addSelectColumn($alias . '.shipping_currency_code');
            $criteria->addSelectColumn($alias . '.packing_slip_url_front');
            $criteria->addSelectColumn($alias . '.packing_slip_url_back');
            $criteria->addSelectColumn($alias . '.provider_order_number');
            $criteria->addSelectColumn($alias . '.internal_order_number');
            $criteria->addSelectColumn($alias . '.order_timestamp');
            $criteria->addSelectColumn($alias . '.is_deleted');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::populateObjects(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $obj A Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdQuote();
            } // if key === null
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) {
                $key = (string) $value->getIdQuote();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances[$key])) {
                return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to sao_fulfillment_quote
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::OM_CLASS;
            $method = 'get' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAgent table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinShippingAgent(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Order table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Provider table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProvider(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with their Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinShippingAgent(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;
        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent)
                $obj2->addQuote($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with their ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrder)
                $obj2->addQuote($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with their Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProvider(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;
        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj2->addQuote($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent rows

            $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent)
                $obj2->addQuote($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrder rows

            $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrder)
                $obj3->addQuote($obj1);
            } // if joined row not null

            // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider rows

            $key4 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj4 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj4->addQuote($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAgent table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptShippingAgent(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Order table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Provider table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProvider(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with all related objects except ShippingAgent.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptShippingAgent(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrder rows

                $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrder)
                $obj2->addQuote($obj1);

            } // if joined row is not null

                // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider rows

                $key3 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj3 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj3->addQuote($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with all related objects except Order.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent rows

                $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent)
                $obj2->addQuote($obj1);

            } // if joined row is not null

                // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider rows

                $key3 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj3 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj3->addQuote($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects pre-filled with all related objects except Provider.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProvider(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent rows

                $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent)
                $obj2->addQuote($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrder rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrder)
                $obj3->addQuote($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME)->getTable(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuotePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuotePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentQuoteTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        $className = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::OM_CLASS;
        $method = 'get' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }




    /**
     * Performs an INSERT on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object
        }

        if ($criteria->containsKey(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE) && $criteria->keyContainsValue(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE.')');
        }


        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE);
            $value = $criteria->remove(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE);
            if ($value) {
                $selectCriteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);
            }

        } else { // $values is Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sao_fulfillment_quote table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME, $con, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::clearInstancePool();
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) { // it's a model object
            // invalidate the cache for this single object
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $pk);

        $v = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $pks, Criteria::IN);
            $objs = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuotePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuotePeer::buildTableMap();

