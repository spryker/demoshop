<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyOmsOrderItemState as ChildSpyOmsOrderItemState;
use Propel\SpyOmsOrderItemStateQuery as ChildSpyOmsOrderItemStateQuery;
use Propel\Map\SpyOmsOrderItemStateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_oms_order_item_state' table.
 *
 *
 *
 * @method     ChildSpyOmsOrderItemStateQuery orderByIdOmsOrderItemState($order = Criteria::ASC) Order by the id_oms_order_item_state column
 * @method     ChildSpyOmsOrderItemStateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyOmsOrderItemStateQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildSpyOmsOrderItemStateQuery groupByIdOmsOrderItemState() Group by the id_oms_order_item_state column
 * @method     ChildSpyOmsOrderItemStateQuery groupByName() Group by the name column
 * @method     ChildSpyOmsOrderItemStateQuery groupByDescription() Group by the description column
 *
 * @method     ChildSpyOmsOrderItemStateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyOmsOrderItemStateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyOmsOrderItemStateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyOmsOrderItemStateQuery leftJoinStateHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StateHistory relation
 * @method     ChildSpyOmsOrderItemStateQuery rightJoinStateHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StateHistory relation
 * @method     ChildSpyOmsOrderItemStateQuery innerJoinStateHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the StateHistory relation
 *
 * @method     ChildSpyOmsOrderItemStateQuery leftJoinEventTimeout($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventTimeout relation
 * @method     ChildSpyOmsOrderItemStateQuery rightJoinEventTimeout($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventTimeout relation
 * @method     ChildSpyOmsOrderItemStateQuery innerJoinEventTimeout($relationAlias = null) Adds a INNER JOIN clause to the query using the EventTimeout relation
 *
 * @method     ChildSpyOmsOrderItemStateQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpyOmsOrderItemStateQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpyOmsOrderItemStateQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     \Propel\SpyOmsOrderItemStateHistoryQuery|\Propel\SpyOmsEventTimeoutQuery|\Propel\SpySalesOrderItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyOmsOrderItemState findOne(ConnectionInterface $con = null) Return the first ChildSpyOmsOrderItemState matching the query
 * @method     ChildSpyOmsOrderItemState findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyOmsOrderItemState matching the query, or a new ChildSpyOmsOrderItemState object populated from the query conditions when no match is found
 *
 * @method     ChildSpyOmsOrderItemState findOneByIdOmsOrderItemState(int $id_oms_order_item_state) Return the first ChildSpyOmsOrderItemState filtered by the id_oms_order_item_state column
 * @method     ChildSpyOmsOrderItemState findOneByName(string $name) Return the first ChildSpyOmsOrderItemState filtered by the name column
 * @method     ChildSpyOmsOrderItemState findOneByDescription(string $description) Return the first ChildSpyOmsOrderItemState filtered by the description column *

 * @method     ChildSpyOmsOrderItemState requirePk($key, ConnectionInterface $con = null) Return the ChildSpyOmsOrderItemState by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsOrderItemState requireOne(ConnectionInterface $con = null) Return the first ChildSpyOmsOrderItemState matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyOmsOrderItemState requireOneByIdOmsOrderItemState(int $id_oms_order_item_state) Return the first ChildSpyOmsOrderItemState filtered by the id_oms_order_item_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsOrderItemState requireOneByName(string $name) Return the first ChildSpyOmsOrderItemState filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsOrderItemState requireOneByDescription(string $description) Return the first ChildSpyOmsOrderItemState filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyOmsOrderItemState[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyOmsOrderItemState objects based on current ModelCriteria
 * @method     ChildSpyOmsOrderItemState[]|ObjectCollection findByIdOmsOrderItemState(int $id_oms_order_item_state) Return ChildSpyOmsOrderItemState objects filtered by the id_oms_order_item_state column
 * @method     ChildSpyOmsOrderItemState[]|ObjectCollection findByName(string $name) Return ChildSpyOmsOrderItemState objects filtered by the name column
 * @method     ChildSpyOmsOrderItemState[]|ObjectCollection findByDescription(string $description) Return ChildSpyOmsOrderItemState objects filtered by the description column
 * @method     ChildSpyOmsOrderItemState[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyOmsOrderItemStateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyOmsOrderItemStateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyOmsOrderItemState', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyOmsOrderItemStateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyOmsOrderItemStateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyOmsOrderItemStateQuery) {
            return $criteria;
        }
        $query = new ChildSpyOmsOrderItemStateQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyOmsOrderItemState|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyOmsOrderItemStateTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyOmsOrderItemStateTableMap::DATABASE_NAME);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyOmsOrderItemState A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_oms_order_item_state, name, description FROM spy_oms_order_item_state WHERE id_oms_order_item_state = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyOmsOrderItemState $obj */
            $obj = new ChildSpyOmsOrderItemState();
            $obj->hydrate($row);
            SpyOmsOrderItemStateTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpyOmsOrderItemState|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_order_item_state column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsOrderItemState(1234); // WHERE id_oms_order_item_state = 1234
     * $query->filterByIdOmsOrderItemState(array(12, 34)); // WHERE id_oms_order_item_state IN (12, 34)
     * $query->filterByIdOmsOrderItemState(array('min' => 12)); // WHERE id_oms_order_item_state > 12
     * </code>
     *
     * @param     mixed $idOmsOrderItemState The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByIdOmsOrderItemState($idOmsOrderItemState = null, $comparison = null)
    {
        if (is_array($idOmsOrderItemState)) {
            $useMinMax = false;
            if (isset($idOmsOrderItemState['min'])) {
                $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $idOmsOrderItemState['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsOrderItemState['max'])) {
                $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $idOmsOrderItemState['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $idOmsOrderItemState, $comparison);
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
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyOmsOrderItemStateHistory object
     *
     * @param \Propel\SpyOmsOrderItemStateHistory|ObjectCollection $spyOmsOrderItemStateHistory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByStateHistory($spyOmsOrderItemStateHistory, $comparison = null)
    {
        if ($spyOmsOrderItemStateHistory instanceof \Propel\SpyOmsOrderItemStateHistory) {
            return $this
                ->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $spyOmsOrderItemStateHistory->getFkOmsOrderItemState(), $comparison);
        } elseif ($spyOmsOrderItemStateHistory instanceof ObjectCollection) {
            return $this
                ->useStateHistoryQuery()
                ->filterByPrimaryKeys($spyOmsOrderItemStateHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStateHistory() only accepts arguments of type \Propel\SpyOmsOrderItemStateHistory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StateHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function joinStateHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StateHistory');

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
            $this->addJoinObject($join, 'StateHistory');
        }

        return $this;
    }

    /**
     * Use the StateHistory relation SpyOmsOrderItemStateHistory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsOrderItemStateHistoryQuery A secondary query class using the current class as primary query
     */
    public function useStateHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStateHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StateHistory', '\Propel\SpyOmsOrderItemStateHistoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsEventTimeout object
     *
     * @param \Propel\SpyOmsEventTimeout|ObjectCollection $spyOmsEventTimeout the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByEventTimeout($spyOmsEventTimeout, $comparison = null)
    {
        if ($spyOmsEventTimeout instanceof \Propel\SpyOmsEventTimeout) {
            return $this
                ->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $spyOmsEventTimeout->getFkOmsOrderItemState(), $comparison);
        } elseif ($spyOmsEventTimeout instanceof ObjectCollection) {
            return $this
                ->useEventTimeoutQuery()
                ->filterByPrimaryKeys($spyOmsEventTimeout->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventTimeout() only accepts arguments of type \Propel\SpyOmsEventTimeout or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventTimeout relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
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
     * Use the EventTimeout relation SpyOmsEventTimeout object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsEventTimeoutQuery A secondary query class using the current class as primary query
     */
    public function useEventTimeoutQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventTimeout($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventTimeout', '\Propel\SpyOmsEventTimeoutQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $spySalesOrderItem->getFkOmsOrderItemState(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($spySalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type \Propel\SpySalesOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
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
     * Use the Order relation SpySalesOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyOmsOrderItemState $spyOmsOrderItemState Object to remove from the list of results
     *
     * @return $this|ChildSpyOmsOrderItemStateQuery The current query, for fluid interface
     */
    public function prune($spyOmsOrderItemState = null)
    {
        if ($spyOmsOrderItemState) {
            $this->addUsingAlias(SpyOmsOrderItemStateTableMap::COL_ID_OMS_ORDER_ITEM_STATE, $spyOmsOrderItemState->getIdOmsOrderItemState(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_oms_order_item_state table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsOrderItemStateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyOmsOrderItemStateTableMap::clearInstancePool();
            SpyOmsOrderItemStateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsOrderItemStateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyOmsOrderItemStateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyOmsOrderItemStateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyOmsOrderItemStateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyOmsOrderItemStateQuery
