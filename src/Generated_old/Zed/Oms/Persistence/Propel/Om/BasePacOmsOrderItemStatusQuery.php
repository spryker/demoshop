<?php


/**
 * Base class that represents a query for the 'pac_oms_order_item_status' table.
 *
 *
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery orderByIdOmsOrderItemStatus($order = Criteria::ASC) Order by the id_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery groupByIdOmsOrderItemStatus() Group by the id_oms_order_item_status column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery groupByDescription() Group by the description column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery leftJoinStatusHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery rightJoinStatusHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery innerJoinStatusHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusHistory relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery leftJoinEventTimeout($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventTimeout relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery rightJoinEventTimeout($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventTimeout relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery innerJoinEventTimeout($relationAlias = null) Adds a INNER JOIN clause to the query using the EventTimeout relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus matching the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus matching the query, or a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus findOneByName(string $name) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus filtered by the name column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus findOneByDescription(string $description) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus filtered by the description column
 *
 * @method array findByIdOmsOrderItemStatus(int $id_oms_order_item_status) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus objects filtered by the id_oms_order_item_status column
 * @method array findByName(string $name) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus objects filtered by the name column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus objects filtered by the description column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.om
 */
abstract class Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsOrderItemStatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsOrderItemStatusQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacOmsOrderItemStatus']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdOmsOrderItemStatus($key, $con = null)
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_oms_order_item_status`, `name`, `description` FROM `pac_oms_order_item_status` WHERE `id_oms_order_item_status` = :p0';
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
            $obj = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus();
            $obj->hydrate($row);
            ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_order_item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsOrderItemStatus(1234); // WHERE id_oms_order_item_status = 1234
     * $query->filterByIdOmsOrderItemStatus(array(12, 34)); // WHERE id_oms_order_item_status IN (12, 34)
     * $query->filterByIdOmsOrderItemStatus(array('min' => 12)); // WHERE id_oms_order_item_status >= 12
     * $query->filterByIdOmsOrderItemStatus(array('max' => 12)); // WHERE id_oms_order_item_status <= 12
     * </code>
     *
     * @param     mixed $idOmsOrderItemStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function filterByIdOmsOrderItemStatus($idOmsOrderItemStatus = null, $comparison = null)
    {
        if (is_array($idOmsOrderItemStatus)) {
            $useMinMax = false;
            if (isset($idOmsOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $idOmsOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $idOmsOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $idOmsOrderItemStatus, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory|PropelObjectCollection $pacOmsOrderItemStatusHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusHistory($pacOmsOrderItemStatusHistory, $comparison = null)
    {
        if ($pacOmsOrderItemStatusHistory instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatusHistory->getFkOmsOrderItemStatus(), $comparison);
        } elseif ($pacOmsOrderItemStatusHistory instanceof PropelObjectCollection) {
            return $this
                ->useStatusHistoryQuery()
                ->filterByPrimaryKeys($pacOmsOrderItemStatusHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStatusHistory() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function joinStatusHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusHistory');

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
            $this->addJoinObject($join, 'StatusHistory');
        }

        return $this;
    }

    /**
     * Use the StatusHistory relation PacOmsOrderItemStatusHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery A secondary query class using the current class as primary query
     */
    public function useStatusHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusHistory', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout|PropelObjectCollection $pacOmsEventTimeout  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventTimeout($pacOmsEventTimeout, $comparison = null)
    {
        if ($pacOmsEventTimeout instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $pacOmsEventTimeout->getFkOmsOrderItemStatus(), $comparison);
        } elseif ($pacOmsEventTimeout instanceof PropelObjectCollection) {
            return $this
                ->useEventTimeoutQuery()
                ->filterByPrimaryKeys($pacOmsEventTimeout->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventTimeout() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventTimeout relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function joinEventTimeout($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventTimeout');

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
            $this->addJoinObject($join, 'EventTimeout');
        }

        return $this;
    }

    /**
     * Use the EventTimeout relation PacOmsEventTimeout object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery A secondary query class using the current class as primary query
     */
    public function useEventTimeoutQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventTimeout($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventTimeout', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $pacSalesOrderItem->getFkOmsOrderItemStatus(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($pacSalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
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
     * Use the Order relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus $pacOmsOrderItemStatus Object to remove from the list of results
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery The current query, for fluid interface
     */
    public function prune($pacOmsOrderItemStatus = null)
    {
        if ($pacOmsOrderItemStatus) {
            $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusPeer::ID_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->getIdOmsOrderItemStatus(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
