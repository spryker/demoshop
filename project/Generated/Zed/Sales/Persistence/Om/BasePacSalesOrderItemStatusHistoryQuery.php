<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item_status_history' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery orderByIdSalesOrderItemStatusHistory($order = Criteria::ASC) Order by the id_sales_order_item_status_history column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery orderByFkSalesOrderItemStatus($order = Criteria::ASC) Order by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery groupByIdSalesOrderItemStatusHistory() Group by the id_sales_order_item_status_history column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery groupByFkSalesOrderItemStatus() Group by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory matching the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory matching the query, or a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOneByFkSalesOrderItemStatus(int $fk_sales_order_item_status) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory filtered by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItemStatusHistory(int $id_sales_order_item_status_history) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory objects filtered by the id_sales_order_item_status_history column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory objects filtered by the fk_sales_order_item column
 * @method array findByFkSalesOrderItemStatus(int $fk_sales_order_item_status) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory objects filtered by the fk_sales_order_item_status column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemStatusHistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemStatusHistoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery();
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItemStatusHistory($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item_status_history`, `fk_sales_order_item`, `fk_sales_order_item_status`, `created_at`, `updated_at` FROM `pac_sales_order_item_status_history` WHERE `id_sales_order_item_status_history` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_status_history column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemStatusHistory(1234); // WHERE id_sales_order_item_status_history = 1234
     * $query->filterByIdSalesOrderItemStatusHistory(array(12, 34)); // WHERE id_sales_order_item_status_history IN (12, 34)
     * $query->filterByIdSalesOrderItemStatusHistory(array('min' => 12)); // WHERE id_sales_order_item_status_history >= 12
     * $query->filterByIdSalesOrderItemStatusHistory(array('max' => 12)); // WHERE id_sales_order_item_status_history <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemStatusHistory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemStatusHistory($idSalesOrderItemStatusHistory = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemStatusHistory)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemStatusHistory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $idSalesOrderItemStatusHistory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemStatusHistory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $idSalesOrderItemStatusHistory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $idSalesOrderItemStatusHistory, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemStatus(1234); // WHERE fk_sales_order_item_status = 1234
     * $query->filterByFkSalesOrderItemStatus(array(12, 34)); // WHERE fk_sales_order_item_status IN (12, 34)
     * $query->filterByFkSalesOrderItemStatus(array('min' => 12)); // WHERE fk_sales_order_item_status >= 12
     * $query->filterByFkSalesOrderItemStatus(array('max' => 12)); // WHERE fk_sales_order_item_status <= 12
     * </code>
     *
     * @see       filterByStatus()
     *
     * @param     mixed $fkSalesOrderItemStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemStatus($fkSalesOrderItemStatus = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemStatus)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus|PropelObjectCollection $pacSalesOrderItemStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacSalesOrderItemStatus, $comparison = null)
    {
        if ($pacSalesOrderItemStatus instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM_STATUS, $pacSalesOrderItemStatus->getIdSalesOrderItemStatus(), $comparison);
        } elseif ($pacSalesOrderItemStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::FK_SALES_ORDER_ITEM_STATUS, $pacSalesOrderItemStatus->toKeyValue('PrimaryKey', 'IdSalesOrderItemStatus'), $comparison);
        } else {
            throw new PropelException('filterByStatus() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Status relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
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
     * Use the Status relation PacSalesOrderItemStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery A secondary query class using the current class as primary query
     */
    public function useStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Status', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory $pacSalesOrderItemStatusHistory Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItemStatusHistory = null)
    {
        if ($pacSalesOrderItemStatusHistory) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::ID_SALES_ORDER_ITEM_STATUS_HISTORY, $pacSalesOrderItemStatusHistory->getIdSalesOrderItemStatusHistory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryPeer::CREATED_AT);
    }
}
