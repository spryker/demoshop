<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySequenceNumber as ChildSpySequenceNumber;
use Propel\SpySequenceNumberQuery as ChildSpySequenceNumberQuery;
use Propel\Map\SpySequenceNumberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sequence_number' table.
 *
 *
 *
 * @method     ChildSpySequenceNumberQuery orderByIdSequenceNumber($order = Criteria::ASC) Order by the id_sequence_number column
 * @method     ChildSpySequenceNumberQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpySequenceNumberQuery orderByCurrentId($order = Criteria::ASC) Order by the current_id column
 *
 * @method     ChildSpySequenceNumberQuery groupByIdSequenceNumber() Group by the id_sequence_number column
 * @method     ChildSpySequenceNumberQuery groupByName() Group by the name column
 * @method     ChildSpySequenceNumberQuery groupByCurrentId() Group by the current_id column
 *
 * @method     ChildSpySequenceNumberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySequenceNumberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySequenceNumberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySequenceNumber findOne(ConnectionInterface $con = null) Return the first ChildSpySequenceNumber matching the query
 * @method     ChildSpySequenceNumber findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySequenceNumber matching the query, or a new ChildSpySequenceNumber object populated from the query conditions when no match is found
 *
 * @method     ChildSpySequenceNumber findOneByIdSequenceNumber(int $id_sequence_number) Return the first ChildSpySequenceNumber filtered by the id_sequence_number column
 * @method     ChildSpySequenceNumber findOneByName(string $name) Return the first ChildSpySequenceNumber filtered by the name column
 * @method     ChildSpySequenceNumber findOneByCurrentId(int $current_id) Return the first ChildSpySequenceNumber filtered by the current_id column *

 * @method     ChildSpySequenceNumber requirePk($key, ConnectionInterface $con = null) Return the ChildSpySequenceNumber by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySequenceNumber requireOne(ConnectionInterface $con = null) Return the first ChildSpySequenceNumber matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySequenceNumber requireOneByIdSequenceNumber(int $id_sequence_number) Return the first ChildSpySequenceNumber filtered by the id_sequence_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySequenceNumber requireOneByName(string $name) Return the first ChildSpySequenceNumber filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySequenceNumber requireOneByCurrentId(int $current_id) Return the first ChildSpySequenceNumber filtered by the current_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySequenceNumber[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySequenceNumber objects based on current ModelCriteria
 * @method     ChildSpySequenceNumber[]|ObjectCollection findByIdSequenceNumber(int $id_sequence_number) Return ChildSpySequenceNumber objects filtered by the id_sequence_number column
 * @method     ChildSpySequenceNumber[]|ObjectCollection findByName(string $name) Return ChildSpySequenceNumber objects filtered by the name column
 * @method     ChildSpySequenceNumber[]|ObjectCollection findByCurrentId(int $current_id) Return ChildSpySequenceNumber objects filtered by the current_id column
 * @method     ChildSpySequenceNumber[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySequenceNumberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySequenceNumberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySequenceNumber', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySequenceNumberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySequenceNumberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySequenceNumberQuery) {
            return $criteria;
        }
        $query = new ChildSpySequenceNumberQuery();
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
     * @return ChildSpySequenceNumber|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySequenceNumberTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySequenceNumberTableMap::DATABASE_NAME);
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
     * @return ChildSpySequenceNumber A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sequence_number, name, current_id FROM spy_sequence_number WHERE id_sequence_number = :p0';
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
            /** @var ChildSpySequenceNumber $obj */
            $obj = new ChildSpySequenceNumber();
            $obj->hydrate($row);
            SpySequenceNumberTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySequenceNumber|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sequence_number column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSequenceNumber(1234); // WHERE id_sequence_number = 1234
     * $query->filterByIdSequenceNumber(array(12, 34)); // WHERE id_sequence_number IN (12, 34)
     * $query->filterByIdSequenceNumber(array('min' => 12)); // WHERE id_sequence_number > 12
     * </code>
     *
     * @param     mixed $idSequenceNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
     */
    public function filterByIdSequenceNumber($idSequenceNumber = null, $comparison = null)
    {
        if (is_array($idSequenceNumber)) {
            $useMinMax = false;
            if (isset($idSequenceNumber['min'])) {
                $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $idSequenceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSequenceNumber['max'])) {
                $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $idSequenceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $idSequenceNumber, $comparison);
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
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySequenceNumberTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the current_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentId(1234); // WHERE current_id = 1234
     * $query->filterByCurrentId(array(12, 34)); // WHERE current_id IN (12, 34)
     * $query->filterByCurrentId(array('min' => 12)); // WHERE current_id > 12
     * </code>
     *
     * @param     mixed $currentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
     */
    public function filterByCurrentId($currentId = null, $comparison = null)
    {
        if (is_array($currentId)) {
            $useMinMax = false;
            if (isset($currentId['min'])) {
                $this->addUsingAlias(SpySequenceNumberTableMap::COL_CURRENT_ID, $currentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentId['max'])) {
                $this->addUsingAlias(SpySequenceNumberTableMap::COL_CURRENT_ID, $currentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySequenceNumberTableMap::COL_CURRENT_ID, $currentId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySequenceNumber $spySequenceNumber Object to remove from the list of results
     *
     * @return $this|ChildSpySequenceNumberQuery The current query, for fluid interface
     */
    public function prune($spySequenceNumber = null)
    {
        if ($spySequenceNumber) {
            $this->addUsingAlias(SpySequenceNumberTableMap::COL_ID_SEQUENCE_NUMBER, $spySequenceNumber->getIdSequenceNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sequence_number table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySequenceNumberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySequenceNumberTableMap::clearInstancePool();
            SpySequenceNumberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySequenceNumberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySequenceNumberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySequenceNumberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySequenceNumberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpySequenceNumberQuery
