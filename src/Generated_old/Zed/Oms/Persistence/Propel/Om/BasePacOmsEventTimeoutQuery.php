<?php


/**
 * Base class that represents a query for the 'pac_oms_event_timeout' table.
 *
 *
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByIdOmsEventTimeout($order = Criteria::ASC) Order by the id_oms_event_timeout column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByFkOmsOrderItemStatus($order = Criteria::ASC) Order by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByTimeout($order = Criteria::ASC) Order by the timeout column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByIdOmsEventTimeout() Group by the id_oms_event_timeout column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByFkOmsOrderItemStatus() Group by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByTimeout() Group by the timeout column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByEvent() Group by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout matching the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout matching the query, or a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByTimeout(string $timeout) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the timeout column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByEvent(string $event) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout filtered by the updated_at column
 *
 * @method array findByIdOmsEventTimeout(int $id_oms_event_timeout) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the id_oms_event_timeout column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the fk_sales_order_item column
 * @method array findByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the fk_oms_order_item_status column
 * @method array findByTimeout(string $timeout) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the timeout column
 * @method array findByEvent(string $event) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the event column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.om
 */
abstract class Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsEventTimeoutQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsEventTimeoutQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacOmsEventTimeout']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdOmsEventTimeout($key, $con = null)
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_oms_event_timeout`, `fk_sales_order_item`, `fk_oms_order_item_status`, `timeout`, `event`, `created_at`, `updated_at` FROM `pac_oms_event_timeout` WHERE `id_oms_event_timeout` = :p0';
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
            $obj = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout();
            $obj->hydrate($row);
            ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_event_timeout column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsEventTimeout(1234); // WHERE id_oms_event_timeout = 1234
     * $query->filterByIdOmsEventTimeout(array(12, 34)); // WHERE id_oms_event_timeout IN (12, 34)
     * $query->filterByIdOmsEventTimeout(array('min' => 12)); // WHERE id_oms_event_timeout >= 12
     * $query->filterByIdOmsEventTimeout(array('max' => 12)); // WHERE id_oms_event_timeout <= 12
     * </code>
     *
     * @param     mixed $idOmsEventTimeout The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByIdOmsEventTimeout($idOmsEventTimeout = null, $comparison = null)
    {
        if (is_array($idOmsEventTimeout)) {
            $useMinMax = false;
            if (isset($idOmsEventTimeout['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $idOmsEventTimeout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsEventTimeout['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $idOmsEventTimeout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $idOmsEventTimeout, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item >= 12
     * $query->filterByFkSalesOrderItem(array('max' => 12)); // WHERE fk_sales_order_item <= 12
     * </code>
     *
     * @see       filterByOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderItemStatus(1234); // WHERE fk_oms_order_item_status = 1234
     * $query->filterByFkOmsOrderItemStatus(array(12, 34)); // WHERE fk_oms_order_item_status IN (12, 34)
     * $query->filterByFkOmsOrderItemStatus(array('min' => 12)); // WHERE fk_oms_order_item_status >= 12
     * $query->filterByFkOmsOrderItemStatus(array('max' => 12)); // WHERE fk_oms_order_item_status <= 12
     * </code>
     *
     * @see       filterByStatus()
     *
     * @param     mixed $fkOmsOrderItemStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderItemStatus($fkOmsOrderItemStatus = null, $comparison = null)
    {
        if (is_array($fkOmsOrderItemStatus)) {
            $useMinMax = false;
            if (isset($fkOmsOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus, $comparison);
    }

    /**
     * Filter the query on the timeout column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeout('2011-03-14'); // WHERE timeout = '2011-03-14'
     * $query->filterByTimeout('now'); // WHERE timeout = '2011-03-14'
     * $query->filterByTimeout(array('max' => 'yesterday')); // WHERE timeout < '2011-03-13'
     * </code>
     *
     * @param     mixed $timeout The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByTimeout($timeout = null, $comparison = null)
    {
        if (is_array($timeout)) {
            $useMinMax = false;
            if (isset($timeout['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::TIMEOUT, $timeout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeout['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::TIMEOUT, $timeout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::TIMEOUT, $timeout, $comparison);
    }

    /**
     * Filter the query on the event column
     *
     * Example usage:
     * <code>
     * $query->filterByEvent('fooValue');   // WHERE event = 'fooValue'
     * $query->filterByEvent('%fooValue%'); // WHERE event LIKE '%fooValue%'
     * </code>
     *
     * @param     string $event The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($event)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $event)) {
                $event = str_replace('*', '%', $event);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function joinOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderItem');

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
            $this->addJoinObject($join, 'OrderItem');
        }

        return $this;
    }

    /**
     * Use the OrderItem relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus|PropelObjectCollection $pacOmsOrderItemStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacOmsOrderItemStatus, $comparison = null)
    {
        if ($pacOmsOrderItemStatus instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->getIdOmsOrderItemStatus(), $comparison);
        } elseif ($pacOmsOrderItemStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->toKeyValue('PrimaryKey', 'IdOmsOrderItemStatus'), $comparison);
        } else {
            throw new PropelException('filterByStatus() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Status relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function joinStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Status');

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
            $this->addJoinObject($join, 'Status');
        }

        return $this;
    }

    /**
     * Use the Status relation PacOmsOrderItemStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery A secondary query class using the current class as primary query
     */
    public function useStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Status', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout $pacOmsEventTimeout Object to remove from the list of results
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function prune($pacOmsEventTimeout = null)
    {
        if ($pacOmsEventTimeout) {
            $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::ID_OMS_EVENT_TIMEOUT, $pacOmsEventTimeout->getIdOmsEventTimeout(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutPeer::CREATED_AT);
    }
}
