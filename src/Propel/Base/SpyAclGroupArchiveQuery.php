<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclGroupArchive as ChildSpyAclGroupArchive;
use Propel\SpyAclGroupArchiveQuery as ChildSpyAclGroupArchiveQuery;
use Propel\Map\SpyAclGroupArchiveTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_group_archive' table.
 *
 *
 *
 * @method     ChildSpyAclGroupArchiveQuery orderByIdAclGroup($order = Criteria::ASC) Order by the id_acl_group column
 * @method     ChildSpyAclGroupArchiveQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyAclGroupArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAclGroupArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildSpyAclGroupArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method     ChildSpyAclGroupArchiveQuery groupByIdAclGroup() Group by the id_acl_group column
 * @method     ChildSpyAclGroupArchiveQuery groupByName() Group by the name column
 * @method     ChildSpyAclGroupArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAclGroupArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildSpyAclGroupArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method     ChildSpyAclGroupArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclGroupArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclGroupArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclGroupArchive findOne(ConnectionInterface $con = null) Return the first ChildSpyAclGroupArchive matching the query
 * @method     ChildSpyAclGroupArchive findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclGroupArchive matching the query, or a new ChildSpyAclGroupArchive object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclGroupArchive findOneByIdAclGroup(int $id_acl_group) Return the first ChildSpyAclGroupArchive filtered by the id_acl_group column
 * @method     ChildSpyAclGroupArchive findOneByName(string $name) Return the first ChildSpyAclGroupArchive filtered by the name column
 * @method     ChildSpyAclGroupArchive findOneByCreatedAt(string $created_at) Return the first ChildSpyAclGroupArchive filtered by the created_at column
 * @method     ChildSpyAclGroupArchive findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclGroupArchive filtered by the updated_at column
 * @method     ChildSpyAclGroupArchive findOneByArchivedAt(string $archived_at) Return the first ChildSpyAclGroupArchive filtered by the archived_at column *

 * @method     ChildSpyAclGroupArchive requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclGroupArchive by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroupArchive requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclGroupArchive matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclGroupArchive requireOneByIdAclGroup(int $id_acl_group) Return the first ChildSpyAclGroupArchive filtered by the id_acl_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroupArchive requireOneByName(string $name) Return the first ChildSpyAclGroupArchive filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroupArchive requireOneByCreatedAt(string $created_at) Return the first ChildSpyAclGroupArchive filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroupArchive requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclGroupArchive filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroupArchive requireOneByArchivedAt(string $archived_at) Return the first ChildSpyAclGroupArchive filtered by the archived_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclGroupArchive objects based on current ModelCriteria
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection findByIdAclGroup(int $id_acl_group) Return ChildSpyAclGroupArchive objects filtered by the id_acl_group column
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection findByName(string $name) Return ChildSpyAclGroupArchive objects filtered by the name column
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAclGroupArchive objects filtered by the created_at column
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAclGroupArchive objects filtered by the updated_at column
 * @method     ChildSpyAclGroupArchive[]|ObjectCollection findByArchivedAt(string $archived_at) Return ChildSpyAclGroupArchive objects filtered by the archived_at column
 * @method     ChildSpyAclGroupArchive[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclGroupArchiveQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclGroupArchiveQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclGroupArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclGroupArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclGroupArchiveQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclGroupArchiveQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclGroupArchiveQuery();
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
     * @return ChildSpyAclGroupArchive|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclGroupArchiveTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclGroupArchiveTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclGroupArchive A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_acl_group, name, created_at, updated_at, archived_at FROM spy_acl_group_archive WHERE id_acl_group = :p0';
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
            /** @var ChildSpyAclGroupArchive $obj */
            $obj = new ChildSpyAclGroupArchive();
            $obj->hydrate($row);
            SpyAclGroupArchiveTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAclGroupArchive|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_group column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclGroup(1234); // WHERE id_acl_group = 1234
     * $query->filterByIdAclGroup(array(12, 34)); // WHERE id_acl_group IN (12, 34)
     * $query->filterByIdAclGroup(array('min' => 12)); // WHERE id_acl_group > 12
     * </code>
     *
     * @param     mixed $idAclGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByIdAclGroup($idAclGroup = null, $comparison = null)
    {
        if (is_array($idAclGroup)) {
            $useMinMax = false;
            if (isset($idAclGroup['min'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $idAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclGroup['max'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $idAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $idAclGroup, $comparison);
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
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the archived_at column
     *
     * Example usage:
     * <code>
     * $query->filterByArchivedAt('2011-03-14'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt('now'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt(array('max' => 'yesterday')); // WHERE archived_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $archivedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclGroupArchive $spyAclGroupArchive Object to remove from the list of results
     *
     * @return $this|ChildSpyAclGroupArchiveQuery The current query, for fluid interface
     */
    public function prune($spyAclGroupArchive = null)
    {
        if ($spyAclGroupArchive) {
            $this->addUsingAlias(SpyAclGroupArchiveTableMap::COL_ID_ACL_GROUP, $spyAclGroupArchive->getIdAclGroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_acl_group_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupArchiveTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclGroupArchiveTableMap::clearInstancePool();
            SpyAclGroupArchiveTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupArchiveTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclGroupArchiveTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclGroupArchiveTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclGroupArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyAclGroupArchiveQuery
