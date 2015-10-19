<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyRedirect as ChildSpyRedirect;
use Propel\SpyRedirectQuery as ChildSpyRedirectQuery;
use Propel\Map\SpyRedirectTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_redirect' table.
 *
 *
 *
 * @method     ChildSpyRedirectQuery orderByIdRedirect($order = Criteria::ASC) Order by the id_redirect column
 * @method     ChildSpyRedirectQuery orderByToUrl($order = Criteria::ASC) Order by the to_url column
 * @method     ChildSpyRedirectQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildSpyRedirectQuery groupByIdRedirect() Group by the id_redirect column
 * @method     ChildSpyRedirectQuery groupByToUrl() Group by the to_url column
 * @method     ChildSpyRedirectQuery groupByStatus() Group by the status column
 *
 * @method     ChildSpyRedirectQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyRedirectQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyRedirectQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyRedirectQuery leftJoinSpyUrl($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyRedirectQuery rightJoinSpyUrl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyRedirectQuery innerJoinSpyUrl($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUrl relation
 *
 * @method     \Propel\SpyUrlQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyRedirect findOne(ConnectionInterface $con = null) Return the first ChildSpyRedirect matching the query
 * @method     ChildSpyRedirect findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyRedirect matching the query, or a new ChildSpyRedirect object populated from the query conditions when no match is found
 *
 * @method     ChildSpyRedirect findOneByIdRedirect(int $id_redirect) Return the first ChildSpyRedirect filtered by the id_redirect column
 * @method     ChildSpyRedirect findOneByToUrl(string $to_url) Return the first ChildSpyRedirect filtered by the to_url column
 * @method     ChildSpyRedirect findOneByStatus(int $status) Return the first ChildSpyRedirect filtered by the status column *

 * @method     ChildSpyRedirect requirePk($key, ConnectionInterface $con = null) Return the ChildSpyRedirect by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRedirect requireOne(ConnectionInterface $con = null) Return the first ChildSpyRedirect matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRedirect requireOneByIdRedirect(int $id_redirect) Return the first ChildSpyRedirect filtered by the id_redirect column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRedirect requireOneByToUrl(string $to_url) Return the first ChildSpyRedirect filtered by the to_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRedirect requireOneByStatus(int $status) Return the first ChildSpyRedirect filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRedirect[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyRedirect objects based on current ModelCriteria
 * @method     ChildSpyRedirect[]|ObjectCollection findByIdRedirect(int $id_redirect) Return ChildSpyRedirect objects filtered by the id_redirect column
 * @method     ChildSpyRedirect[]|ObjectCollection findByToUrl(string $to_url) Return ChildSpyRedirect objects filtered by the to_url column
 * @method     ChildSpyRedirect[]|ObjectCollection findByStatus(int $status) Return ChildSpyRedirect objects filtered by the status column
 * @method     ChildSpyRedirect[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyRedirectQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyRedirectQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyRedirect', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyRedirectQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyRedirectQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyRedirectQuery) {
            return $criteria;
        }
        $query = new ChildSpyRedirectQuery();
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
     * @return ChildSpyRedirect|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyRedirectTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyRedirectTableMap::DATABASE_NAME);
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
     * @return ChildSpyRedirect A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_redirect, to_url, status FROM spy_redirect WHERE id_redirect = :p0';
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
            /** @var ChildSpyRedirect $obj */
            $obj = new ChildSpyRedirect();
            $obj->hydrate($row);
            SpyRedirectTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyRedirect|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_redirect column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRedirect(1234); // WHERE id_redirect = 1234
     * $query->filterByIdRedirect(array(12, 34)); // WHERE id_redirect IN (12, 34)
     * $query->filterByIdRedirect(array('min' => 12)); // WHERE id_redirect > 12
     * </code>
     *
     * @param     mixed $idRedirect The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterByIdRedirect($idRedirect = null, $comparison = null)
    {
        if (is_array($idRedirect)) {
            $useMinMax = false;
            if (isset($idRedirect['min'])) {
                $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $idRedirect['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRedirect['max'])) {
                $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $idRedirect['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $idRedirect, $comparison);
    }

    /**
     * Filter the query on the to_url column
     *
     * Example usage:
     * <code>
     * $query->filterByToUrl('fooValue');   // WHERE to_url = 'fooValue'
     * $query->filterByToUrl('%fooValue%'); // WHERE to_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $toUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterByToUrl($toUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $toUrl)) {
                $toUrl = str_replace('*', '%', $toUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyRedirectTableMap::COL_TO_URL, $toUrl, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(SpyRedirectTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(SpyRedirectTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRedirectTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyUrl object
     *
     * @param \Propel\SpyUrl|ObjectCollection $spyUrl the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function filterBySpyUrl($spyUrl, $comparison = null)
    {
        if ($spyUrl instanceof \Propel\SpyUrl) {
            return $this
                ->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $spyUrl->getFkResourceRedirect(), $comparison);
        } elseif ($spyUrl instanceof ObjectCollection) {
            return $this
                ->useSpyUrlQuery()
                ->filterByPrimaryKeys($spyUrl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyUrl() only accepts arguments of type \Propel\SpyUrl or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUrl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function joinSpyUrl($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUrl');

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
            $this->addJoinObject($join, 'SpyUrl');
        }

        return $this;
    }

    /**
     * Use the SpyUrl relation SpyUrl object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUrlQuery A secondary query class using the current class as primary query
     */
    public function useSpyUrlQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyUrl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUrl', '\Propel\SpyUrlQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyRedirect $spyRedirect Object to remove from the list of results
     *
     * @return $this|ChildSpyRedirectQuery The current query, for fluid interface
     */
    public function prune($spyRedirect = null)
    {
        if ($spyRedirect) {
            $this->addUsingAlias(SpyRedirectTableMap::COL_ID_REDIRECT, $spyRedirect->getIdRedirect(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_redirect table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRedirectTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyRedirectTableMap::clearInstancePool();
            SpyRedirectTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRedirectTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyRedirectTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyRedirectTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyRedirectTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyRedirectQuery
