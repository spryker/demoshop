<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_quote' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByIdQuote($order = Criteria::ASC) Order by the id_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByFkFulfillmentProvider($order = Criteria::ASC) Order by the fk_fulfillment_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByQuoteId($order = Criteria::ASC) Order by the quote_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByFkShippingAgent($order = Criteria::ASC) Order by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByShippingProduct($order = Criteria::ASC) Order by the shipping_product column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByShippingPrice($order = Criteria::ASC) Order by the shipping_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByShippingFreight($order = Criteria::ASC) Order by the shipping_freight column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByShippingTaxDuties($order = Criteria::ASC) Order by the shipping_tax_duties column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByShippingCurrencyCode($order = Criteria::ASC) Order by the shipping_currency_code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByPackingSlipUrlFront($order = Criteria::ASC) Order by the packing_slip_url_front column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByPackingSlipUrlBack($order = Criteria::ASC) Order by the packing_slip_url_back column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByProviderOrderNumber($order = Criteria::ASC) Order by the provider_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByInternalOrderNumber($order = Criteria::ASC) Order by the internal_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByOrderTimestamp($order = Criteria::ASC) Order by the order_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByIdQuote() Group by the id_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByFkFulfillmentProvider() Group by the fk_fulfillment_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByQuoteId() Group by the quote_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByFkShippingAgent() Group by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByShippingProduct() Group by the shipping_product column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByShippingPrice() Group by the shipping_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByShippingFreight() Group by the shipping_freight column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByShippingTaxDuties() Group by the shipping_tax_duties column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByShippingCurrencyCode() Group by the shipping_currency_code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByPackingSlipUrlFront() Group by the packing_slip_url_front column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByPackingSlipUrlBack() Group by the packing_slip_url_back column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByProviderOrderNumber() Group by the provider_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByInternalOrderNumber() Group by the internal_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByOrderTimestamp() Group by the order_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByIsDeleted() Group by the is_deleted column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoinShippingAgent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAgent relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoinShippingAgent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAgent relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoinShippingAgent($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAgent relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoinProvider($relationAlias = null) Adds a LEFT JOIN clause to the query using the Provider relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoinProvider($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Provider relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoinProvider($relationAlias = null) Adds a INNER JOIN clause to the query using the Provider relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoinQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the QuoteItem relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoinQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the QuoteItem relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoinQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the QuoteItem relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery leftJoinTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery rightJoinTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery innerJoinTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the Tracking relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByFkSalesOrder(int $fk_sales_order) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the fk_sales_order column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByFkFulfillmentProvider(int $fk_fulfillment_provider) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the fk_fulfillment_provider column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByQuoteId(string $quote_id) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the quote_id column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByFkShippingAgent(int $fk_shipping_agent) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByShippingProduct(string $shipping_product) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the shipping_product column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByShippingPrice(int $shipping_price) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the shipping_price column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByShippingFreight(int $shipping_freight) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the shipping_freight column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByShippingTaxDuties(int $shipping_tax_duties) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the shipping_tax_duties column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByShippingCurrencyCode(string $shipping_currency_code) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the shipping_currency_code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByPackingSlipUrlFront(string $packing_slip_url_front) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the packing_slip_url_front column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByPackingSlipUrlBack(string $packing_slip_url_back) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the packing_slip_url_back column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByProviderOrderNumber(string $provider_order_number) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the provider_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByInternalOrderNumber(string $internal_order_number) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the internal_order_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByOrderTimestamp(string $order_timestamp) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the order_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByIsDeleted(boolean $is_deleted) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the is_deleted column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote filtered by the updated_at column
 *
 * @method array findByIdQuote(int $id_quote) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the id_quote column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the fk_sales_order column
 * @method array findByFkFulfillmentProvider(int $fk_fulfillment_provider) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the fk_fulfillment_provider column
 * @method array findByQuoteId(string $quote_id) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the quote_id column
 * @method array findByFkShippingAgent(int $fk_shipping_agent) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the fk_shipping_agent column
 * @method array findByShippingProduct(string $shipping_product) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the shipping_product column
 * @method array findByShippingPrice(int $shipping_price) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the shipping_price column
 * @method array findByShippingFreight(int $shipping_freight) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the shipping_freight column
 * @method array findByShippingTaxDuties(int $shipping_tax_duties) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the shipping_tax_duties column
 * @method array findByShippingCurrencyCode(string $shipping_currency_code) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the shipping_currency_code column
 * @method array findByPackingSlipUrlFront(string $packing_slip_url_front) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the packing_slip_url_front column
 * @method array findByPackingSlipUrlBack(string $packing_slip_url_back) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the packing_slip_url_back column
 * @method array findByProviderOrderNumber(string $provider_order_number) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the provider_order_number column
 * @method array findByInternalOrderNumber(string $internal_order_number) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the internal_order_number column
 * @method array findByOrderTimestamp(string $order_timestamp) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the order_timestamp column
 * @method array findByIsDeleted(boolean $is_deleted) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuoteQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdQuote($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_quote`, `fk_sales_order`, `fk_fulfillment_provider`, `quote_id`, `fk_shipping_agent`, `shipping_product`, `shipping_price`, `shipping_freight`, `shipping_tax_duties`, `shipping_currency_code`, `packing_slip_url_front`, `packing_slip_url_back`, `provider_order_number`, `internal_order_number`, `order_timestamp`, `is_deleted`, `created_at`, `updated_at` FROM `sao_fulfillment_quote` WHERE `id_quote` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_quote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdQuote(1234); // WHERE id_quote = 1234
     * $query->filterByIdQuote(array(12, 34)); // WHERE id_quote IN (12, 34)
     * $query->filterByIdQuote(array('min' => 12)); // WHERE id_quote >= 12
     * $query->filterByIdQuote(array('max' => 12)); // WHERE id_quote <= 12
     * </code>
     *
     * @param     mixed $idQuote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByIdQuote($idQuote = null, $comparison = null)
    {
        if (is_array($idQuote)) {
            $useMinMax = false;
            if (isset($idQuote['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $idQuote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idQuote['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $idQuote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $idQuote, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order >= 12
     * $query->filterByFkSalesOrder(array('max' => 12)); // WHERE fk_sales_order <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_fulfillment_provider column
     *
     * Example usage:
     * <code>
     * $query->filterByFkFulfillmentProvider(1234); // WHERE fk_fulfillment_provider = 1234
     * $query->filterByFkFulfillmentProvider(array(12, 34)); // WHERE fk_fulfillment_provider IN (12, 34)
     * $query->filterByFkFulfillmentProvider(array('min' => 12)); // WHERE fk_fulfillment_provider >= 12
     * $query->filterByFkFulfillmentProvider(array('max' => 12)); // WHERE fk_fulfillment_provider <= 12
     * </code>
     *
     * @see       filterByProvider()
     *
     * @param     mixed $fkFulfillmentProvider The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByFkFulfillmentProvider($fkFulfillmentProvider = null, $comparison = null)
    {
        if (is_array($fkFulfillmentProvider)) {
            $useMinMax = false;
            if (isset($fkFulfillmentProvider['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $fkFulfillmentProvider['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkFulfillmentProvider['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $fkFulfillmentProvider['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $fkFulfillmentProvider, $comparison);
    }

    /**
     * Filter the query on the quote_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuoteId('fooValue');   // WHERE quote_id = 'fooValue'
     * $query->filterByQuoteId('%fooValue%'); // WHERE quote_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quoteId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByQuoteId($quoteId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quoteId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quoteId)) {
                $quoteId = str_replace('*', '%', $quoteId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::QUOTE_ID, $quoteId, $comparison);
    }

    /**
     * Filter the query on the fk_shipping_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByFkShippingAgent(1234); // WHERE fk_shipping_agent = 1234
     * $query->filterByFkShippingAgent(array(12, 34)); // WHERE fk_shipping_agent IN (12, 34)
     * $query->filterByFkShippingAgent(array('min' => 12)); // WHERE fk_shipping_agent >= 12
     * $query->filterByFkShippingAgent(array('max' => 12)); // WHERE fk_shipping_agent <= 12
     * </code>
     *
     * @see       filterByShippingAgent()
     *
     * @param     mixed $fkShippingAgent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByFkShippingAgent($fkShippingAgent = null, $comparison = null)
    {
        if (is_array($fkShippingAgent)) {
            $useMinMax = false;
            if (isset($fkShippingAgent['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $fkShippingAgent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkShippingAgent['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $fkShippingAgent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $fkShippingAgent, $comparison);
    }

    /**
     * Filter the query on the shipping_product column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingProduct('fooValue');   // WHERE shipping_product = 'fooValue'
     * $query->filterByShippingProduct('%fooValue%'); // WHERE shipping_product LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingProduct The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByShippingProduct($shippingProduct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingProduct)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingProduct)) {
                $shippingProduct = str_replace('*', '%', $shippingProduct);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRODUCT, $shippingProduct, $comparison);
    }

    /**
     * Filter the query on the shipping_price column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingPrice(1234); // WHERE shipping_price = 1234
     * $query->filterByShippingPrice(array(12, 34)); // WHERE shipping_price IN (12, 34)
     * $query->filterByShippingPrice(array('min' => 12)); // WHERE shipping_price >= 12
     * $query->filterByShippingPrice(array('max' => 12)); // WHERE shipping_price <= 12
     * </code>
     *
     * @param     mixed $shippingPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByShippingPrice($shippingPrice = null, $comparison = null)
    {
        if (is_array($shippingPrice)) {
            $useMinMax = false;
            if (isset($shippingPrice['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE, $shippingPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingPrice['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE, $shippingPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_PRICE, $shippingPrice, $comparison);
    }

    /**
     * Filter the query on the shipping_freight column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingFreight(1234); // WHERE shipping_freight = 1234
     * $query->filterByShippingFreight(array(12, 34)); // WHERE shipping_freight IN (12, 34)
     * $query->filterByShippingFreight(array('min' => 12)); // WHERE shipping_freight >= 12
     * $query->filterByShippingFreight(array('max' => 12)); // WHERE shipping_freight <= 12
     * </code>
     *
     * @param     mixed $shippingFreight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByShippingFreight($shippingFreight = null, $comparison = null)
    {
        if (is_array($shippingFreight)) {
            $useMinMax = false;
            if (isset($shippingFreight['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT, $shippingFreight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingFreight['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT, $shippingFreight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_FREIGHT, $shippingFreight, $comparison);
    }

    /**
     * Filter the query on the shipping_tax_duties column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingTaxDuties(1234); // WHERE shipping_tax_duties = 1234
     * $query->filterByShippingTaxDuties(array(12, 34)); // WHERE shipping_tax_duties IN (12, 34)
     * $query->filterByShippingTaxDuties(array('min' => 12)); // WHERE shipping_tax_duties >= 12
     * $query->filterByShippingTaxDuties(array('max' => 12)); // WHERE shipping_tax_duties <= 12
     * </code>
     *
     * @param     mixed $shippingTaxDuties The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByShippingTaxDuties($shippingTaxDuties = null, $comparison = null)
    {
        if (is_array($shippingTaxDuties)) {
            $useMinMax = false;
            if (isset($shippingTaxDuties['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES, $shippingTaxDuties['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingTaxDuties['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES, $shippingTaxDuties['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_TAX_DUTIES, $shippingTaxDuties, $comparison);
    }

    /**
     * Filter the query on the shipping_currency_code column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCurrencyCode('fooValue');   // WHERE shipping_currency_code = 'fooValue'
     * $query->filterByShippingCurrencyCode('%fooValue%'); // WHERE shipping_currency_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCurrencyCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByShippingCurrencyCode($shippingCurrencyCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCurrencyCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingCurrencyCode)) {
                $shippingCurrencyCode = str_replace('*', '%', $shippingCurrencyCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::SHIPPING_CURRENCY_CODE, $shippingCurrencyCode, $comparison);
    }

    /**
     * Filter the query on the packing_slip_url_front column
     *
     * Example usage:
     * <code>
     * $query->filterByPackingSlipUrlFront('fooValue');   // WHERE packing_slip_url_front = 'fooValue'
     * $query->filterByPackingSlipUrlFront('%fooValue%'); // WHERE packing_slip_url_front LIKE '%fooValue%'
     * </code>
     *
     * @param     string $packingSlipUrlFront The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByPackingSlipUrlFront($packingSlipUrlFront = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($packingSlipUrlFront)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $packingSlipUrlFront)) {
                $packingSlipUrlFront = str_replace('*', '%', $packingSlipUrlFront);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_FRONT, $packingSlipUrlFront, $comparison);
    }

    /**
     * Filter the query on the packing_slip_url_back column
     *
     * Example usage:
     * <code>
     * $query->filterByPackingSlipUrlBack('fooValue');   // WHERE packing_slip_url_back = 'fooValue'
     * $query->filterByPackingSlipUrlBack('%fooValue%'); // WHERE packing_slip_url_back LIKE '%fooValue%'
     * </code>
     *
     * @param     string $packingSlipUrlBack The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByPackingSlipUrlBack($packingSlipUrlBack = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($packingSlipUrlBack)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $packingSlipUrlBack)) {
                $packingSlipUrlBack = str_replace('*', '%', $packingSlipUrlBack);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PACKING_SLIP_URL_BACK, $packingSlipUrlBack, $comparison);
    }

    /**
     * Filter the query on the provider_order_number column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderOrderNumber('fooValue');   // WHERE provider_order_number = 'fooValue'
     * $query->filterByProviderOrderNumber('%fooValue%'); // WHERE provider_order_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $providerOrderNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByProviderOrderNumber($providerOrderNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($providerOrderNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $providerOrderNumber)) {
                $providerOrderNumber = str_replace('*', '%', $providerOrderNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::PROVIDER_ORDER_NUMBER, $providerOrderNumber, $comparison);
    }

    /**
     * Filter the query on the internal_order_number column
     *
     * Example usage:
     * <code>
     * $query->filterByInternalOrderNumber('fooValue');   // WHERE internal_order_number = 'fooValue'
     * $query->filterByInternalOrderNumber('%fooValue%'); // WHERE internal_order_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $internalOrderNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByInternalOrderNumber($internalOrderNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($internalOrderNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $internalOrderNumber)) {
                $internalOrderNumber = str_replace('*', '%', $internalOrderNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::INTERNAL_ORDER_NUMBER, $internalOrderNumber, $comparison);
    }

    /**
     * Filter the query on the order_timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderTimestamp('2011-03-14'); // WHERE order_timestamp = '2011-03-14'
     * $query->filterByOrderTimestamp('now'); // WHERE order_timestamp = '2011-03-14'
     * $query->filterByOrderTimestamp(array('max' => 'yesterday')); // WHERE order_timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $orderTimestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByOrderTimestamp($orderTimestamp = null, $comparison = null)
    {
        if (is_array($orderTimestamp)) {
            $useMinMax = false;
            if (isset($orderTimestamp['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP, $orderTimestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderTimestamp['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP, $orderTimestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ORDER_TIMESTAMP, $orderTimestamp, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent|PropelObjectCollection $saoFulfillmentShippingAgent The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShippingAgent($saoFulfillmentShippingAgent, $comparison = null)
    {
        if ($saoFulfillmentShippingAgent instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $saoFulfillmentShippingAgent->getIdShippingAgent(), $comparison);
        } elseif ($saoFulfillmentShippingAgent instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SHIPPING_AGENT, $saoFulfillmentShippingAgent->toKeyValue('PrimaryKey', 'IdShippingAgent'), $comparison);
        } else {
            throw new PropelException('filterByShippingAgent() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAgent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function joinShippingAgent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShippingAgent');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ShippingAgent');
        }

        return $this;
    }

    /**
     * Use the ShippingAgent relation SaoFulfillmentShippingAgent object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery A secondary query class using the current class as primary query
     */
    public function useShippingAgentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShippingAgent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAgent', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider|PropelObjectCollection $saoFulfillmentProvider The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProvider($saoFulfillmentProvider, $comparison = null)
    {
        if ($saoFulfillmentProvider instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $saoFulfillmentProvider->getIdProvider(), $comparison);
        } elseif ($saoFulfillmentProvider instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::FK_FULFILLMENT_PROVIDER, $saoFulfillmentProvider->toKeyValue('PrimaryKey', 'IdProvider'), $comparison);
        } else {
            throw new PropelException('filterByProvider() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Provider relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function joinProvider($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Provider');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Provider');
        }

        return $this;
    }

    /**
     * Use the Provider relation SaoFulfillmentProvider object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery A secondary query class using the current class as primary query
     */
    public function useProviderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProvider($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Provider', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem|PropelObjectCollection $saoFulfillmentQuoteItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuoteItem($saoFulfillmentQuoteItem, $comparison = null)
    {
        if ($saoFulfillmentQuoteItem instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $saoFulfillmentQuoteItem->getFkFulfillmentQuote(), $comparison);
        } elseif ($saoFulfillmentQuoteItem instanceof PropelObjectCollection) {
            return $this
                ->useQuoteItemQuery()
                ->filterByPrimaryKeys($saoFulfillmentQuoteItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuoteItem() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the QuoteItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function joinQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('QuoteItem');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'QuoteItem');
        }

        return $this;
    }

    /**
     * Use the QuoteItem relation SaoFulfillmentQuoteItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery A secondary query class using the current class as primary query
     */
    public function useQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuoteItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'QuoteItem', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking|PropelObjectCollection $saoFulfillmentShippingTracking  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracking($saoFulfillmentShippingTracking, $comparison = null)
    {
        if ($saoFulfillmentShippingTracking instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $saoFulfillmentShippingTracking->getFkQuote(), $comparison);
        } elseif ($saoFulfillmentShippingTracking instanceof PropelObjectCollection) {
            return $this
                ->useTrackingQuery()
                ->filterByPrimaryKeys($saoFulfillmentShippingTracking->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTracking() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tracking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function joinTracking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tracking');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tracking');
        }

        return $this;
    }

    /**
     * Use the Tracking relation SaoFulfillmentShippingTracking object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery A secondary query class using the current class as primary query
     */
    public function useTrackingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTracking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tracking', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery');
    }

    /**
     * Filter the query by a related PacSalesOrderItem object
     * using the sao_fulfillment_quote_item table as cross reference
     *
     * @param   PacSalesOrderItem $pacSalesOrderItem the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function filterByItem($pacSalesOrderItem, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useQuoteItemQuery()
            ->filterByItem($pacSalesOrderItem, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $saoFulfillmentQuote Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentQuote = null)
    {
        if ($saoFulfillmentQuote) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::ID_QUOTE, $saoFulfillmentQuote->getIdQuote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuotePeer::CREATED_AT);
    }
}
