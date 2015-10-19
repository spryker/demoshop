<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDiscountVoucherPoolCategory as ChildSpyDiscountVoucherPoolCategory;
use Propel\SpyDiscountVoucherPoolCategoryQuery as ChildSpyDiscountVoucherPoolCategoryQuery;
use Propel\Map\SpyDiscountVoucherPoolCategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_discount_voucher_pool_category' table.
 *
 *
 *
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery orderByIdDiscountVoucherPoolCategory($order = Criteria::ASC) Order by the id_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery groupByIdDiscountVoucherPoolCategory() Group by the id_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery groupByName() Group by the name column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery leftJoinDiscountVoucherPool($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscountVoucherPool relation
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery rightJoinDiscountVoucherPool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscountVoucherPool relation
 * @method     ChildSpyDiscountVoucherPoolCategoryQuery innerJoinDiscountVoucherPool($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscountVoucherPool relation
 *
 * @method     \Propel\SpyDiscountVoucherPoolQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDiscountVoucherPoolCategory findOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPoolCategory matching the query
 * @method     ChildSpyDiscountVoucherPoolCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPoolCategory matching the query, or a new ChildSpyDiscountVoucherPoolCategory object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDiscountVoucherPoolCategory findOneByIdDiscountVoucherPoolCategory(int $id_discount_voucher_pool_category) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the id_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolCategory findOneByName(string $name) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the name column
 * @method     ChildSpyDiscountVoucherPoolCategory findOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the created_at column
 * @method     ChildSpyDiscountVoucherPoolCategory findOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the updated_at column *

 * @method     ChildSpyDiscountVoucherPoolCategory requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDiscountVoucherPoolCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPoolCategory requireOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPoolCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountVoucherPoolCategory requireOneByIdDiscountVoucherPoolCategory(int $id_discount_voucher_pool_category) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the id_discount_voucher_pool_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPoolCategory requireOneByName(string $name) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPoolCategory requireOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPoolCategory requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountVoucherPoolCategory filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountVoucherPoolCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDiscountVoucherPoolCategory objects based on current ModelCriteria
 * @method     ChildSpyDiscountVoucherPoolCategory[]|ObjectCollection findByIdDiscountVoucherPoolCategory(int $id_discount_voucher_pool_category) Return ChildSpyDiscountVoucherPoolCategory objects filtered by the id_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolCategory[]|ObjectCollection findByName(string $name) Return ChildSpyDiscountVoucherPoolCategory objects filtered by the name column
 * @method     ChildSpyDiscountVoucherPoolCategory[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyDiscountVoucherPoolCategory objects filtered by the created_at column
 * @method     ChildSpyDiscountVoucherPoolCategory[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyDiscountVoucherPoolCategory objects filtered by the updated_at column
 * @method     ChildSpyDiscountVoucherPoolCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDiscountVoucherPoolCategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDiscountVoucherPoolCategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDiscountVoucherPoolCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDiscountVoucherPoolCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDiscountVoucherPoolCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDiscountVoucherPoolCategoryQuery) {
            return $criteria;
        }
        $query = new ChildSpyDiscountVoucherPoolCategoryQuery();
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
     * @return ChildSpyDiscountVoucherPoolCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDiscountVoucherPoolCategoryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountVoucherPoolCategoryTableMap::DATABASE_NAME);
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
     * @return ChildSpyDiscountVoucherPoolCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_discount_voucher_pool_category, name, created_at, updated_at FROM spy_discount_voucher_pool_category WHERE id_discount_voucher_pool_category = :p0';
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
            /** @var ChildSpyDiscountVoucherPoolCategory $obj */
            $obj = new ChildSpyDiscountVoucherPoolCategory();
            $obj->hydrate($row);
            SpyDiscountVoucherPoolCategoryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDiscountVoucherPoolCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_discount_voucher_pool_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDiscountVoucherPoolCategory(1234); // WHERE id_discount_voucher_pool_category = 1234
     * $query->filterByIdDiscountVoucherPoolCategory(array(12, 34)); // WHERE id_discount_voucher_pool_category IN (12, 34)
     * $query->filterByIdDiscountVoucherPoolCategory(array('min' => 12)); // WHERE id_discount_voucher_pool_category > 12
     * </code>
     *
     * @param     mixed $idDiscountVoucherPoolCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByIdDiscountVoucherPoolCategory($idDiscountVoucherPoolCategory = null, $comparison = null)
    {
        if (is_array($idDiscountVoucherPoolCategory)) {
            $useMinMax = false;
            if (isset($idDiscountVoucherPoolCategory['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $idDiscountVoucherPoolCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDiscountVoucherPoolCategory['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $idDiscountVoucherPoolCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $idDiscountVoucherPoolCategory, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountVoucherPool object
     *
     * @param \Propel\SpyDiscountVoucherPool|ObjectCollection $spyDiscountVoucherPool the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function filterByDiscountVoucherPool($spyDiscountVoucherPool, $comparison = null)
    {
        if ($spyDiscountVoucherPool instanceof \Propel\SpyDiscountVoucherPool) {
            return $this
                ->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $spyDiscountVoucherPool->getFkDiscountVoucherPoolCategory(), $comparison);
        } elseif ($spyDiscountVoucherPool instanceof ObjectCollection) {
            return $this
                ->useDiscountVoucherPoolQuery()
                ->filterByPrimaryKeys($spyDiscountVoucherPool->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscountVoucherPool() only accepts arguments of type \Propel\SpyDiscountVoucherPool or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiscountVoucherPool relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function joinDiscountVoucherPool($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiscountVoucherPool');

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
            $this->addJoinObject($join, 'DiscountVoucherPool');
        }

        return $this;
    }

    /**
     * Use the DiscountVoucherPool relation SpyDiscountVoucherPool object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountVoucherPoolQuery A secondary query class using the current class as primary query
     */
    public function useDiscountVoucherPoolQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscountVoucherPool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiscountVoucherPool', '\Propel\SpyDiscountVoucherPoolQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDiscountVoucherPoolCategory $spyDiscountVoucherPoolCategory Object to remove from the list of results
     *
     * @return $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function prune($spyDiscountVoucherPoolCategory = null)
    {
        if ($spyDiscountVoucherPoolCategory) {
            $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_ID_DISCOUNT_VOUCHER_POOL_CATEGORY, $spyDiscountVoucherPoolCategory->getIdDiscountVoucherPoolCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_discount_voucher_pool_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherPoolCategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDiscountVoucherPoolCategoryTableMap::clearInstancePool();
            SpyDiscountVoucherPoolCategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherPoolCategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDiscountVoucherPoolCategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDiscountVoucherPoolCategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDiscountVoucherPoolCategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountVoucherPoolCategoryTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolCategoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountVoucherPoolCategoryTableMap::COL_CREATED_AT);
    }

} // SpyDiscountVoucherPoolCategoryQuery
