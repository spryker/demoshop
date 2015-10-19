<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDistributorItemType as ChildSpyDistributorItemType;
use Propel\SpyDistributorItemTypeQuery as ChildSpyDistributorItemTypeQuery;
use Propel\Map\SpyDistributorItemTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_distributor_item_type' table.
 *
 *
 *
 * @method     ChildSpyDistributorItemTypeQuery orderByIdDistributorItemType($order = Criteria::ASC) Order by the id_distributor_item_type column
 * @method     ChildSpyDistributorItemTypeQuery orderByTypeKey($order = Criteria::ASC) Order by the type_key column
 * @method     ChildSpyDistributorItemTypeQuery orderByLastDistribution($order = Criteria::ASC) Order by the last_distribution column
 *
 * @method     ChildSpyDistributorItemTypeQuery groupByIdDistributorItemType() Group by the id_distributor_item_type column
 * @method     ChildSpyDistributorItemTypeQuery groupByTypeKey() Group by the type_key column
 * @method     ChildSpyDistributorItemTypeQuery groupByLastDistribution() Group by the last_distribution column
 *
 * @method     ChildSpyDistributorItemTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDistributorItemTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDistributorItemTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDistributorItemTypeQuery leftJoinSpyDistributorItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyDistributorItem relation
 * @method     ChildSpyDistributorItemTypeQuery rightJoinSpyDistributorItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyDistributorItem relation
 * @method     ChildSpyDistributorItemTypeQuery innerJoinSpyDistributorItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyDistributorItem relation
 *
 * @method     \Propel\SpyDistributorItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDistributorItemType findOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorItemType matching the query
 * @method     ChildSpyDistributorItemType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDistributorItemType matching the query, or a new ChildSpyDistributorItemType object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDistributorItemType findOneByIdDistributorItemType(int $id_distributor_item_type) Return the first ChildSpyDistributorItemType filtered by the id_distributor_item_type column
 * @method     ChildSpyDistributorItemType findOneByTypeKey(string $type_key) Return the first ChildSpyDistributorItemType filtered by the type_key column
 * @method     ChildSpyDistributorItemType findOneByLastDistribution(string $last_distribution) Return the first ChildSpyDistributorItemType filtered by the last_distribution column *

 * @method     ChildSpyDistributorItemType requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDistributorItemType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItemType requireOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorItemType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorItemType requireOneByIdDistributorItemType(int $id_distributor_item_type) Return the first ChildSpyDistributorItemType filtered by the id_distributor_item_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItemType requireOneByTypeKey(string $type_key) Return the first ChildSpyDistributorItemType filtered by the type_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItemType requireOneByLastDistribution(string $last_distribution) Return the first ChildSpyDistributorItemType filtered by the last_distribution column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorItemType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDistributorItemType objects based on current ModelCriteria
 * @method     ChildSpyDistributorItemType[]|ObjectCollection findByIdDistributorItemType(int $id_distributor_item_type) Return ChildSpyDistributorItemType objects filtered by the id_distributor_item_type column
 * @method     ChildSpyDistributorItemType[]|ObjectCollection findByTypeKey(string $type_key) Return ChildSpyDistributorItemType objects filtered by the type_key column
 * @method     ChildSpyDistributorItemType[]|ObjectCollection findByLastDistribution(string $last_distribution) Return ChildSpyDistributorItemType objects filtered by the last_distribution column
 * @method     ChildSpyDistributorItemType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDistributorItemTypeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDistributorItemTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDistributorItemType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDistributorItemTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDistributorItemTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDistributorItemTypeQuery) {
            return $criteria;
        }
        $query = new ChildSpyDistributorItemTypeQuery();
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
     * @return ChildSpyDistributorItemType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDistributorItemTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
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
     * @return ChildSpyDistributorItemType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_distributor_item_type, type_key, last_distribution FROM spy_distributor_item_type WHERE id_distributor_item_type = :p0';
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
            /** @var ChildSpyDistributorItemType $obj */
            $obj = new ChildSpyDistributorItemType();
            $obj->hydrate($row);
            SpyDistributorItemTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDistributorItemType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_distributor_item_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDistributorItemType(1234); // WHERE id_distributor_item_type = 1234
     * $query->filterByIdDistributorItemType(array(12, 34)); // WHERE id_distributor_item_type IN (12, 34)
     * $query->filterByIdDistributorItemType(array('min' => 12)); // WHERE id_distributor_item_type > 12
     * </code>
     *
     * @param     mixed $idDistributorItemType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterByIdDistributorItemType($idDistributorItemType = null, $comparison = null)
    {
        if (is_array($idDistributorItemType)) {
            $useMinMax = false;
            if (isset($idDistributorItemType['min'])) {
                $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $idDistributorItemType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDistributorItemType['max'])) {
                $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $idDistributorItemType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $idDistributorItemType, $comparison);
    }

    /**
     * Filter the query on the type_key column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeKey('fooValue');   // WHERE type_key = 'fooValue'
     * $query->filterByTypeKey('%fooValue%'); // WHERE type_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterByTypeKey($typeKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $typeKey)) {
                $typeKey = str_replace('*', '%', $typeKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_TYPE_KEY, $typeKey, $comparison);
    }

    /**
     * Filter the query on the last_distribution column
     *
     * Example usage:
     * <code>
     * $query->filterByLastDistribution('2011-03-14'); // WHERE last_distribution = '2011-03-14'
     * $query->filterByLastDistribution('now'); // WHERE last_distribution = '2011-03-14'
     * $query->filterByLastDistribution(array('max' => 'yesterday')); // WHERE last_distribution > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastDistribution The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterByLastDistribution($lastDistribution = null, $comparison = null)
    {
        if (is_array($lastDistribution)) {
            $useMinMax = false;
            if (isset($lastDistribution['min'])) {
                $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION, $lastDistribution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastDistribution['max'])) {
                $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION, $lastDistribution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION, $lastDistribution, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDistributorItem object
     *
     * @param \Propel\SpyDistributorItem|ObjectCollection $spyDistributorItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function filterBySpyDistributorItem($spyDistributorItem, $comparison = null)
    {
        if ($spyDistributorItem instanceof \Propel\SpyDistributorItem) {
            return $this
                ->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $spyDistributorItem->getFkItemType(), $comparison);
        } elseif ($spyDistributorItem instanceof ObjectCollection) {
            return $this
                ->useSpyDistributorItemQuery()
                ->filterByPrimaryKeys($spyDistributorItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyDistributorItem() only accepts arguments of type \Propel\SpyDistributorItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyDistributorItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function joinSpyDistributorItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyDistributorItem');

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
            $this->addJoinObject($join, 'SpyDistributorItem');
        }

        return $this;
    }

    /**
     * Use the SpyDistributorItem relation SpyDistributorItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDistributorItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyDistributorItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyDistributorItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyDistributorItem', '\Propel\SpyDistributorItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDistributorItemType $spyDistributorItemType Object to remove from the list of results
     *
     * @return $this|ChildSpyDistributorItemTypeQuery The current query, for fluid interface
     */
    public function prune($spyDistributorItemType = null)
    {
        if ($spyDistributorItemType) {
            $this->addUsingAlias(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, $spyDistributorItemType->getIdDistributorItemType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_distributor_item_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDistributorItemTypeTableMap::clearInstancePool();
            SpyDistributorItemTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDistributorItemTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDistributorItemTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDistributorItemTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyDistributorItemTypeQuery
