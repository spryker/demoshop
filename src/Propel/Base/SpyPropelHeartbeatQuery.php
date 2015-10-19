<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPropelHeartbeat as ChildSpyPropelHeartbeat;
use Propel\SpyPropelHeartbeatQuery as ChildSpyPropelHeartbeatQuery;
use Propel\Map\SpyPropelHeartbeatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_propel_heartbeat' table.
 *
 *
 *
 * @method     ChildSpyPropelHeartbeatQuery orderByHeartbeatCheck($order = Criteria::ASC) Order by the heartbeat_check column
 *
 * @method     ChildSpyPropelHeartbeatQuery groupByHeartbeatCheck() Group by the heartbeat_check column
 *
 * @method     ChildSpyPropelHeartbeatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPropelHeartbeatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPropelHeartbeatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPropelHeartbeat findOne(ConnectionInterface $con = null) Return the first ChildSpyPropelHeartbeat matching the query
 * @method     ChildSpyPropelHeartbeat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPropelHeartbeat matching the query, or a new ChildSpyPropelHeartbeat object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPropelHeartbeat findOneByHeartbeatCheck(string $heartbeat_check) Return the first ChildSpyPropelHeartbeat filtered by the heartbeat_check column *

 * @method     ChildSpyPropelHeartbeat requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPropelHeartbeat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPropelHeartbeat requireOne(ConnectionInterface $con = null) Return the first ChildSpyPropelHeartbeat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPropelHeartbeat requireOneByHeartbeatCheck(string $heartbeat_check) Return the first ChildSpyPropelHeartbeat filtered by the heartbeat_check column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPropelHeartbeat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPropelHeartbeat objects based on current ModelCriteria
 * @method     ChildSpyPropelHeartbeat[]|ObjectCollection findByHeartbeatCheck(string $heartbeat_check) Return ChildSpyPropelHeartbeat objects filtered by the heartbeat_check column
 * @method     ChildSpyPropelHeartbeat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPropelHeartbeatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPropelHeartbeatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPropelHeartbeat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPropelHeartbeatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPropelHeartbeatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPropelHeartbeatQuery) {
            return $criteria;
        }
        $query = new ChildSpyPropelHeartbeatQuery();
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
     * @return ChildSpyPropelHeartbeat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPropelHeartbeatTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPropelHeartbeatTableMap::DATABASE_NAME);
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
     * @return ChildSpyPropelHeartbeat A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT heartbeat_check FROM spy_propel_heartbeat WHERE heartbeat_check = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyPropelHeartbeat $obj */
            $obj = new ChildSpyPropelHeartbeat();
            $obj->hydrate($row);
            SpyPropelHeartbeatTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPropelHeartbeat|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPropelHeartbeatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPropelHeartbeatTableMap::COL_HEARTBEAT_CHECK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPropelHeartbeatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPropelHeartbeatTableMap::COL_HEARTBEAT_CHECK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the heartbeat_check column
     *
     * Example usage:
     * <code>
     * $query->filterByHeartbeatCheck('fooValue');   // WHERE heartbeat_check = 'fooValue'
     * $query->filterByHeartbeatCheck('%fooValue%'); // WHERE heartbeat_check LIKE '%fooValue%'
     * </code>
     *
     * @param     string $heartbeatCheck The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPropelHeartbeatQuery The current query, for fluid interface
     */
    public function filterByHeartbeatCheck($heartbeatCheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($heartbeatCheck)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $heartbeatCheck)) {
                $heartbeatCheck = str_replace('*', '%', $heartbeatCheck);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPropelHeartbeatTableMap::COL_HEARTBEAT_CHECK, $heartbeatCheck, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPropelHeartbeat $spyPropelHeartbeat Object to remove from the list of results
     *
     * @return $this|ChildSpyPropelHeartbeatQuery The current query, for fluid interface
     */
    public function prune($spyPropelHeartbeat = null)
    {
        if ($spyPropelHeartbeat) {
            $this->addUsingAlias(SpyPropelHeartbeatTableMap::COL_HEARTBEAT_CHECK, $spyPropelHeartbeat->getHeartbeatCheck(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_propel_heartbeat table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPropelHeartbeatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPropelHeartbeatTableMap::clearInstancePool();
            SpyPropelHeartbeatTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPropelHeartbeatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPropelHeartbeatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPropelHeartbeatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPropelHeartbeatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyPropelHeartbeatQuery
