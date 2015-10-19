<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDistributorReceiver as ChildSpyDistributorReceiver;
use Propel\SpyDistributorReceiverQuery as ChildSpyDistributorReceiverQuery;
use Propel\Map\SpyDistributorReceiverTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_distributor_receiver' table.
 *
 *
 *
 * @method     ChildSpyDistributorReceiverQuery orderByIdDistributorReceiver($order = Criteria::ASC) Order by the id_distributor_receiver column
 * @method     ChildSpyDistributorReceiverQuery orderByReceiverKey($order = Criteria::ASC) Order by the receiver_key column
 *
 * @method     ChildSpyDistributorReceiverQuery groupByIdDistributorReceiver() Group by the id_distributor_receiver column
 * @method     ChildSpyDistributorReceiverQuery groupByReceiverKey() Group by the receiver_key column
 *
 * @method     ChildSpyDistributorReceiverQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDistributorReceiverQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDistributorReceiverQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDistributorReceiver findOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorReceiver matching the query
 * @method     ChildSpyDistributorReceiver findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDistributorReceiver matching the query, or a new ChildSpyDistributorReceiver object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDistributorReceiver findOneByIdDistributorReceiver(int $id_distributor_receiver) Return the first ChildSpyDistributorReceiver filtered by the id_distributor_receiver column
 * @method     ChildSpyDistributorReceiver findOneByReceiverKey(string $receiver_key) Return the first ChildSpyDistributorReceiver filtered by the receiver_key column *

 * @method     ChildSpyDistributorReceiver requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDistributorReceiver by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorReceiver requireOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorReceiver matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorReceiver requireOneByIdDistributorReceiver(int $id_distributor_receiver) Return the first ChildSpyDistributorReceiver filtered by the id_distributor_receiver column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorReceiver requireOneByReceiverKey(string $receiver_key) Return the first ChildSpyDistributorReceiver filtered by the receiver_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorReceiver[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDistributorReceiver objects based on current ModelCriteria
 * @method     ChildSpyDistributorReceiver[]|ObjectCollection findByIdDistributorReceiver(int $id_distributor_receiver) Return ChildSpyDistributorReceiver objects filtered by the id_distributor_receiver column
 * @method     ChildSpyDistributorReceiver[]|ObjectCollection findByReceiverKey(string $receiver_key) Return ChildSpyDistributorReceiver objects filtered by the receiver_key column
 * @method     ChildSpyDistributorReceiver[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDistributorReceiverQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDistributorReceiverQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDistributorReceiver', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDistributorReceiverQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDistributorReceiverQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDistributorReceiverQuery) {
            return $criteria;
        }
        $query = new ChildSpyDistributorReceiverQuery();
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
     * @return ChildSpyDistributorReceiver|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDistributorReceiverTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDistributorReceiverTableMap::DATABASE_NAME);
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
     * @return ChildSpyDistributorReceiver A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_distributor_receiver, receiver_key FROM spy_distributor_receiver WHERE id_distributor_receiver = :p0';
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
            /** @var ChildSpyDistributorReceiver $obj */
            $obj = new ChildSpyDistributorReceiver();
            $obj->hydrate($row);
            SpyDistributorReceiverTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDistributorReceiver|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDistributorReceiverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDistributorReceiverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_distributor_receiver column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDistributorReceiver(1234); // WHERE id_distributor_receiver = 1234
     * $query->filterByIdDistributorReceiver(array(12, 34)); // WHERE id_distributor_receiver IN (12, 34)
     * $query->filterByIdDistributorReceiver(array('min' => 12)); // WHERE id_distributor_receiver > 12
     * </code>
     *
     * @param     mixed $idDistributorReceiver The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorReceiverQuery The current query, for fluid interface
     */
    public function filterByIdDistributorReceiver($idDistributorReceiver = null, $comparison = null)
    {
        if (is_array($idDistributorReceiver)) {
            $useMinMax = false;
            if (isset($idDistributorReceiver['min'])) {
                $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $idDistributorReceiver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDistributorReceiver['max'])) {
                $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $idDistributorReceiver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $idDistributorReceiver, $comparison);
    }

    /**
     * Filter the query on the receiver_key column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiverKey('fooValue');   // WHERE receiver_key = 'fooValue'
     * $query->filterByReceiverKey('%fooValue%'); // WHERE receiver_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $receiverKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorReceiverQuery The current query, for fluid interface
     */
    public function filterByReceiverKey($receiverKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($receiverKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $receiverKey)) {
                $receiverKey = str_replace('*', '%', $receiverKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_RECEIVER_KEY, $receiverKey, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDistributorReceiver $spyDistributorReceiver Object to remove from the list of results
     *
     * @return $this|ChildSpyDistributorReceiverQuery The current query, for fluid interface
     */
    public function prune($spyDistributorReceiver = null)
    {
        if ($spyDistributorReceiver) {
            $this->addUsingAlias(SpyDistributorReceiverTableMap::COL_ID_DISTRIBUTOR_RECEIVER, $spyDistributorReceiver->getIdDistributorReceiver(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_distributor_receiver table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorReceiverTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDistributorReceiverTableMap::clearInstancePool();
            SpyDistributorReceiverTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorReceiverTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDistributorReceiverTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDistributorReceiverTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDistributorReceiverTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyDistributorReceiverQuery
