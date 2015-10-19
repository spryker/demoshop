<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTouch as ChildSpyTouch;
use Propel\SpyTouchQuery as ChildSpyTouchQuery;
use Propel\Map\SpyTouchTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_touch' table.
 *
 *
 *
 * @method     ChildSpyTouchQuery orderByIdTouch($order = Criteria::ASC) Order by the id_touch column
 * @method     ChildSpyTouchQuery orderByItemType($order = Criteria::ASC) Order by the item_type column
 * @method     ChildSpyTouchQuery orderByItemEvent($order = Criteria::ASC) Order by the item_event column
 * @method     ChildSpyTouchQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 * @method     ChildSpyTouchQuery orderByTouched($order = Criteria::ASC) Order by the touched column
 *
 * @method     ChildSpyTouchQuery groupByIdTouch() Group by the id_touch column
 * @method     ChildSpyTouchQuery groupByItemType() Group by the item_type column
 * @method     ChildSpyTouchQuery groupByItemEvent() Group by the item_event column
 * @method     ChildSpyTouchQuery groupByItemId() Group by the item_id column
 * @method     ChildSpyTouchQuery groupByTouched() Group by the touched column
 *
 * @method     ChildSpyTouchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyTouchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyTouchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyTouchQuery leftJoinTouchStorage($relationAlias = null) Adds a LEFT JOIN clause to the query using the TouchStorage relation
 * @method     ChildSpyTouchQuery rightJoinTouchStorage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TouchStorage relation
 * @method     ChildSpyTouchQuery innerJoinTouchStorage($relationAlias = null) Adds a INNER JOIN clause to the query using the TouchStorage relation
 *
 * @method     ChildSpyTouchQuery leftJoinTouchSearch($relationAlias = null) Adds a LEFT JOIN clause to the query using the TouchSearch relation
 * @method     ChildSpyTouchQuery rightJoinTouchSearch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TouchSearch relation
 * @method     ChildSpyTouchQuery innerJoinTouchSearch($relationAlias = null) Adds a INNER JOIN clause to the query using the TouchSearch relation
 *
 * @method     \Propel\SpyTouchStorageQuery|\Propel\SpyTouchSearchQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyTouch findOne(ConnectionInterface $con = null) Return the first ChildSpyTouch matching the query
 * @method     ChildSpyTouch findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyTouch matching the query, or a new ChildSpyTouch object populated from the query conditions when no match is found
 *
 * @method     ChildSpyTouch findOneByIdTouch(int $id_touch) Return the first ChildSpyTouch filtered by the id_touch column
 * @method     ChildSpyTouch findOneByItemType(string $item_type) Return the first ChildSpyTouch filtered by the item_type column
 * @method     ChildSpyTouch findOneByItemEvent(int $item_event) Return the first ChildSpyTouch filtered by the item_event column
 * @method     ChildSpyTouch findOneByItemId(int $item_id) Return the first ChildSpyTouch filtered by the item_id column
 * @method     ChildSpyTouch findOneByTouched(string $touched) Return the first ChildSpyTouch filtered by the touched column *

 * @method     ChildSpyTouch requirePk($key, ConnectionInterface $con = null) Return the ChildSpyTouch by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouch requireOne(ConnectionInterface $con = null) Return the first ChildSpyTouch matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTouch requireOneByIdTouch(int $id_touch) Return the first ChildSpyTouch filtered by the id_touch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouch requireOneByItemType(string $item_type) Return the first ChildSpyTouch filtered by the item_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouch requireOneByItemEvent(int $item_event) Return the first ChildSpyTouch filtered by the item_event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouch requireOneByItemId(int $item_id) Return the first ChildSpyTouch filtered by the item_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouch requireOneByTouched(string $touched) Return the first ChildSpyTouch filtered by the touched column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTouch[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyTouch objects based on current ModelCriteria
 * @method     ChildSpyTouch[]|ObjectCollection findByIdTouch(int $id_touch) Return ChildSpyTouch objects filtered by the id_touch column
 * @method     ChildSpyTouch[]|ObjectCollection findByItemType(string $item_type) Return ChildSpyTouch objects filtered by the item_type column
 * @method     ChildSpyTouch[]|ObjectCollection findByItemEvent(int $item_event) Return ChildSpyTouch objects filtered by the item_event column
 * @method     ChildSpyTouch[]|ObjectCollection findByItemId(int $item_id) Return ChildSpyTouch objects filtered by the item_id column
 * @method     ChildSpyTouch[]|ObjectCollection findByTouched(string $touched) Return ChildSpyTouch objects filtered by the touched column
 * @method     ChildSpyTouch[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyTouchQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyTouchQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyTouch', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyTouchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyTouchQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyTouchQuery) {
            return $criteria;
        }
        $query = new ChildSpyTouchQuery();
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
     * @return ChildSpyTouch|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyTouchTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyTouchTableMap::DATABASE_NAME);
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
     * @return ChildSpyTouch A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_touch, item_type, item_event, item_id, touched FROM spy_touch WHERE id_touch = :p0';
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
            /** @var ChildSpyTouch $obj */
            $obj = new ChildSpyTouch();
            $obj->hydrate($row);
            SpyTouchTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyTouch|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_touch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTouch(1234); // WHERE id_touch = 1234
     * $query->filterByIdTouch(array(12, 34)); // WHERE id_touch IN (12, 34)
     * $query->filterByIdTouch(array('min' => 12)); // WHERE id_touch > 12
     * </code>
     *
     * @param     mixed $idTouch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByIdTouch($idTouch = null, $comparison = null)
    {
        if (is_array($idTouch)) {
            $useMinMax = false;
            if (isset($idTouch['min'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $idTouch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTouch['max'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $idTouch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $idTouch, $comparison);
    }

    /**
     * Filter the query on the item_type column
     *
     * Example usage:
     * <code>
     * $query->filterByItemType('fooValue');   // WHERE item_type = 'fooValue'
     * $query->filterByItemType('%fooValue%'); // WHERE item_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByItemType($itemType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemType)) {
                $itemType = str_replace('*', '%', $itemType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyTouchTableMap::COL_ITEM_TYPE, $itemType, $comparison);
    }

    /**
     * Filter the query on the item_event column
     *
     * @param     mixed $itemEvent The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByItemEvent($itemEvent = null, $comparison = null)
    {
        $valueSet = SpyTouchTableMap::getValueSet(SpyTouchTableMap::COL_ITEM_EVENT);
        if (is_scalar($itemEvent)) {
            if (!in_array($itemEvent, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $itemEvent));
            }
            $itemEvent = array_search($itemEvent, $valueSet);
        } elseif (is_array($itemEvent)) {
            $convertedValues = array();
            foreach ($itemEvent as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $itemEvent = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchTableMap::COL_ITEM_EVENT, $itemEvent, $comparison);
    }

    /**
     * Filter the query on the item_id column
     *
     * Example usage:
     * <code>
     * $query->filterByItemId(1234); // WHERE item_id = 1234
     * $query->filterByItemId(array(12, 34)); // WHERE item_id IN (12, 34)
     * $query->filterByItemId(array('min' => 12)); // WHERE item_id > 12
     * </code>
     *
     * @param     mixed $itemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (is_array($itemId)) {
            $useMinMax = false;
            if (isset($itemId['min'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_ITEM_ID, $itemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemId['max'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_ITEM_ID, $itemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchTableMap::COL_ITEM_ID, $itemId, $comparison);
    }

    /**
     * Filter the query on the touched column
     *
     * Example usage:
     * <code>
     * $query->filterByTouched('2011-03-14'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched('now'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched(array('max' => 'yesterday')); // WHERE touched > '2011-03-13'
     * </code>
     *
     * @param     mixed $touched The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByTouched($touched = null, $comparison = null)
    {
        if (is_array($touched)) {
            $useMinMax = false;
            if (isset($touched['min'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_TOUCHED, $touched['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($touched['max'])) {
                $this->addUsingAlias(SpyTouchTableMap::COL_TOUCHED, $touched['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchTableMap::COL_TOUCHED, $touched, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTouchStorage object
     *
     * @param \Propel\SpyTouchStorage|ObjectCollection $spyTouchStorage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByTouchStorage($spyTouchStorage, $comparison = null)
    {
        if ($spyTouchStorage instanceof \Propel\SpyTouchStorage) {
            return $this
                ->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $spyTouchStorage->getFkTouch(), $comparison);
        } elseif ($spyTouchStorage instanceof ObjectCollection) {
            return $this
                ->useTouchStorageQuery()
                ->filterByPrimaryKeys($spyTouchStorage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTouchStorage() only accepts arguments of type \Propel\SpyTouchStorage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TouchStorage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function joinTouchStorage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TouchStorage');

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
            $this->addJoinObject($join, 'TouchStorage');
        }

        return $this;
    }

    /**
     * Use the TouchStorage relation SpyTouchStorage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTouchStorageQuery A secondary query class using the current class as primary query
     */
    public function useTouchStorageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTouchStorage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TouchStorage', '\Propel\SpyTouchStorageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTouchSearch object
     *
     * @param \Propel\SpyTouchSearch|ObjectCollection $spyTouchSearch the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTouchQuery The current query, for fluid interface
     */
    public function filterByTouchSearch($spyTouchSearch, $comparison = null)
    {
        if ($spyTouchSearch instanceof \Propel\SpyTouchSearch) {
            return $this
                ->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $spyTouchSearch->getFkTouch(), $comparison);
        } elseif ($spyTouchSearch instanceof ObjectCollection) {
            return $this
                ->useTouchSearchQuery()
                ->filterByPrimaryKeys($spyTouchSearch->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTouchSearch() only accepts arguments of type \Propel\SpyTouchSearch or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TouchSearch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function joinTouchSearch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TouchSearch');

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
            $this->addJoinObject($join, 'TouchSearch');
        }

        return $this;
    }

    /**
     * Use the TouchSearch relation SpyTouchSearch object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTouchSearchQuery A secondary query class using the current class as primary query
     */
    public function useTouchSearchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTouchSearch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TouchSearch', '\Propel\SpyTouchSearchQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyTouch $spyTouch Object to remove from the list of results
     *
     * @return $this|ChildSpyTouchQuery The current query, for fluid interface
     */
    public function prune($spyTouch = null)
    {
        if ($spyTouch) {
            $this->addUsingAlias(SpyTouchTableMap::COL_ID_TOUCH, $spyTouch->getIdTouch(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_touch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyTouchTableMap::clearInstancePool();
            SpyTouchTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyTouchTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyTouchTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyTouchTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // query_cache behavior

    public function setQueryKey($key)
    {
        $this->queryKey = $key;

        return $this;
    }

    public function getQueryKey()
    {
        return $this->queryKey;
    }

    public function cacheContains($key)
    {
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function cacheFetch($key)
    {
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function cacheStore($key, $value, $lifetime = 3600)
    {
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function doSelect(ConnectionInterface $con = null)
    {
        // check that the columns of the main class are already added (if this is the primary ModelCriteria)
        if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
            $this->addSelfSelectColumns();
        }
        $this->configureSelectColumns();

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyTouchTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyTouchTableMap::DATABASE_NAME);

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            $params = array();
            $sql = $this->createSelectSql($params);
            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
            } catch (Exception $e) {
                Propel::log($e->getMessage(), Propel::LOG_ERR);
                throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
            }

        return $con->getDataFetcher($stmt);
    }

    public function doCount(ConnectionInterface $con = null)
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap($this->getDbName());
        $db = Propel::getServiceContainer()->getAdapter($this->getDbName());

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            // check that the columns of the main class are already added (if this is the primary ModelCriteria)
            if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
                $this->addSelfSelectColumns();
            }

            $this->configureSelectColumns();

            $needsComplexCount = $this->getGroupByColumns()
                || $this->getOffset()
                || $this->getLimit()
                || $this->getHaving()
                || in_array(Criteria::DISTINCT, $this->getSelectModifiers());

            $params = array();
            if ($needsComplexCount) {
                if ($this->needsSelectAliases()) {
                    if ($this->getHaving()) {
                        throw new PropelException('Propel cannot create a COUNT query when using HAVING and  duplicate column names in the SELECT part');
                    }
                    $db->turnSelectColumnsToAliases($this);
                }
                $selectSql = $this->createSelectSql($params);
                $sql = 'SELECT COUNT(*) FROM (' . $selectSql . ') propelmatch4cnt';
            } else {
                // Replace SELECT columns with COUNT(*)
                $this->clearSelectColumns()->addSelectColumn('COUNT(*)');
                $sql = $this->createSelectSql($params);
            }

            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute COUNT statement [%s]', $sql), 0, $e);
        }

        return $con->getDataFetcher($stmt);
    }

} // SpyTouchQuery
