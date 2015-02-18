<?php


/**
 * Base class that represents a query for the 'pac_oms_order_item_status_history' table.
 *
 *
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery orderByIdOmsOrderItemStatusHistory($order = Criteria::ASC) Order by the id_oms_order_item_status_history column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery orderByFkOmsOrderItemStatus($order = Criteria::ASC) Order by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery groupByIdOmsOrderItemStatusHistory() Group by the id_oms_order_item_status_history column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery groupByFkOmsOrderItemStatus() Group by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory matching the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory matching the query, or a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOneByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory filtered by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory filtered by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory filtered by the updated_at column
 *
 * @method array findByIdOmsOrderItemStatusHistory(int $id_oms_order_item_status_history) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects filtered by the id_oms_order_item_status_history column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects filtered by the fk_sales_order_item column
 * @method array findByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects filtered by the fk_oms_order_item_status column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.om
 */
abstract class Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsOrderItemStatusHistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsOrderItemStatusHistoryQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacOmsOrderItemStatusHistory']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdOmsOrderItemStatusHistory($key, $con = null)
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_oms_order_item_status_history`, `fk_sales_order_item`, `fk_oms_order_item_status`, `created_at`, `updated_at` FROM `pac_oms_order_item_status_history` WHERE `id_oms_order_item_status_history` = :p0';
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
            $obj = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory();
            $obj->hydrate($row);
            ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_order_item_status_history column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsOrderItemStatusHistory(1234); // WHERE id_oms_order_item_status_history = 1234
     * $query->filterByIdOmsOrderItemStatusHistory(array(12, 34)); // WHERE id_oms_order_item_status_history IN (12, 34)
     * $query->filterByIdOmsOrderItemStatusHistory(array('min' => 12)); // WHERE id_oms_order_item_status_history >= 12
     * $query->filterByIdOmsOrderItemStatusHistory(array('max' => 12)); // WHERE id_oms_order_item_status_history <= 12
     * </code>
     *
     * @param     mixed $idOmsOrderItemStatusHistory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByIdOmsOrderItemStatusHistory($idOmsOrderItemStatusHistory = null, $comparison = null)
    {
        if (is_array($idOmsOrderItemStatusHistory)) {
            $useMinMax = false;
            if (isset($idOmsOrderItemStatusHistory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $idOmsOrderItemStatusHistory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsOrderItemStatusHistory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $idOmsOrderItemStatusHistory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $idOmsOrderItemStatusHistory, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderItemStatus($fkOmsOrderItemStatus = null, $comparison = null)
    {
        if (is_array($fkOmsOrderItemStatus)) {
            $useMinMax = false;
            if (isset($fkOmsOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacOmsOrderItemStatus, $comparison = null)
    {
        if ($pacOmsOrderItemStatus instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->getIdOmsOrderItemStatus(), $comparison);
        } elseif ($pacOmsOrderItemStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->toKeyValue('PrimaryKey', 'IdOmsOrderItemStatus'), $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory $pacOmsOrderItemStatusHistory Object to remove from the list of results
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function prune($pacOmsOrderItemStatusHistory = null)
    {
        if ($pacOmsOrderItemStatusHistory) {
            $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::ID_OMS_ORDER_ITEM_STATUS_HISTORY, $pacOmsOrderItemStatusHistory->getIdOmsOrderItemStatusHistory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryPeer::CREATED_AT);
    }
}
