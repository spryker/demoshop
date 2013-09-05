<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_shipping_pickup' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByReadyTime($order = Criteria::ASC) Order by the ready_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByCloseTime($order = Criteria::ASC) Order by the close_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByDate() Group by the date column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByReadyTime() Group by the ready_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByCloseTime() Group by the close_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery leftJoinSalesItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesItem relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery rightJoinSalesItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesItem relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery innerJoinSalesItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesItem relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneByDate(string $date) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup filtered by the date column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneByReadyTime(string $ready_time) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup filtered by the ready_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneByCloseTime(string $close_time) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup filtered by the close_time column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItem(int $id_sales_order_item) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the id_sales_order_item column
 * @method array findByDate(string $date) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the date column
 * @method array findByReadyTime(string $ready_time) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the ready_time column
 * @method array findByCloseTime(string $close_time) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the close_time column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingPickupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingPickupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery();
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
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItem($key, $con = null)
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item`, `date`, `ready_time`, `close_time`, `created_at`, `updated_at` FROM `sao_fulfillment_shipping_pickup` WHERE `id_sales_order_item` = :p0';
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
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItem(1234); // WHERE id_sales_order_item = 1234
     * $query->filterByIdSalesOrderItem(array(12, 34)); // WHERE id_sales_order_item IN (12, 34)
     * $query->filterByIdSalesOrderItem(array('min' => 12)); // WHERE id_sales_order_item >= 12
     * $query->filterByIdSalesOrderItem(array('max' => 12)); // WHERE id_sales_order_item <= 12
     * </code>
     *
     * @see       filterBySalesItem()
     *
     * @param     mixed $idSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the ready_time column
     *
     * Example usage:
     * <code>
     * $query->filterByReadyTime('2011-03-14'); // WHERE ready_time = '2011-03-14'
     * $query->filterByReadyTime('now'); // WHERE ready_time = '2011-03-14'
     * $query->filterByReadyTime(array('max' => 'yesterday')); // WHERE ready_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $readyTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByReadyTime($readyTime = null, $comparison = null)
    {
        if (is_array($readyTime)) {
            $useMinMax = false;
            if (isset($readyTime['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::READY_TIME, $readyTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($readyTime['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::READY_TIME, $readyTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::READY_TIME, $readyTime, $comparison);
    }

    /**
     * Filter the query on the close_time column
     *
     * Example usage:
     * <code>
     * $query->filterByCloseTime('2011-03-14'); // WHERE close_time = '2011-03-14'
     * $query->filterByCloseTime('now'); // WHERE close_time = '2011-03-14'
     * $query->filterByCloseTime(array('max' => 'yesterday')); // WHERE close_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $closeTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByCloseTime($closeTime = null, $comparison = null)
    {
        if (is_array($closeTime)) {
            $useMinMax = false;
            if (isset($closeTime['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CLOSE_TIME, $closeTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($closeTime['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CLOSE_TIME, $closeTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CLOSE_TIME, $closeTime, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItem|PropelObjectCollection $saoSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesItem($saoSalesOrderItem, $comparison = null)
    {
        if ($saoSalesOrderItem instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($saoSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterBySalesItem() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function joinSalesItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesItem');

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
            $this->addJoinObject($join, 'SalesItem');
        }

        return $this;
    }

    /**
     * Use the SalesItem relation SaoSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSalesItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup $saoFulfillmentShippingPickup Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentShippingPickup = null)
    {
        if ($saoFulfillmentShippingPickup) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::ID_SALES_ORDER_ITEM, $saoFulfillmentShippingPickup->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickupPeer::CREATED_AT);
    }
}
