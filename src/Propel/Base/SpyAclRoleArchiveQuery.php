<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclRoleArchive as ChildSpyAclRoleArchive;
use Propel\SpyAclRoleArchiveQuery as ChildSpyAclRoleArchiveQuery;
use Propel\Map\SpyAclRoleArchiveTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_role_archive' table.
 *
 *
 *
 * @method     ChildSpyAclRoleArchiveQuery orderByIdAclRole($order = Criteria::ASC) Order by the id_acl_role column
 * @method     ChildSpyAclRoleArchiveQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyAclRoleArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAclRoleArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildSpyAclRoleArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method     ChildSpyAclRoleArchiveQuery groupByIdAclRole() Group by the id_acl_role column
 * @method     ChildSpyAclRoleArchiveQuery groupByName() Group by the name column
 * @method     ChildSpyAclRoleArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAclRoleArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildSpyAclRoleArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method     ChildSpyAclRoleArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclRoleArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclRoleArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclRoleArchive findOne(ConnectionInterface $con = null) Return the first ChildSpyAclRoleArchive matching the query
 * @method     ChildSpyAclRoleArchive findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclRoleArchive matching the query, or a new ChildSpyAclRoleArchive object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclRoleArchive findOneByIdAclRole(int $id_acl_role) Return the first ChildSpyAclRoleArchive filtered by the id_acl_role column
 * @method     ChildSpyAclRoleArchive findOneByName(string $name) Return the first ChildSpyAclRoleArchive filtered by the name column
 * @method     ChildSpyAclRoleArchive findOneByCreatedAt(string $created_at) Return the first ChildSpyAclRoleArchive filtered by the created_at column
 * @method     ChildSpyAclRoleArchive findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRoleArchive filtered by the updated_at column
 * @method     ChildSpyAclRoleArchive findOneByArchivedAt(string $archived_at) Return the first ChildSpyAclRoleArchive filtered by the archived_at column *

 * @method     ChildSpyAclRoleArchive requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclRoleArchive by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRoleArchive requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclRoleArchive matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRoleArchive requireOneByIdAclRole(int $id_acl_role) Return the first ChildSpyAclRoleArchive filtered by the id_acl_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRoleArchive requireOneByName(string $name) Return the first ChildSpyAclRoleArchive filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRoleArchive requireOneByCreatedAt(string $created_at) Return the first ChildSpyAclRoleArchive filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRoleArchive requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRoleArchive filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRoleArchive requireOneByArchivedAt(string $archived_at) Return the first ChildSpyAclRoleArchive filtered by the archived_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclRoleArchive objects based on current ModelCriteria
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection findByIdAclRole(int $id_acl_role) Return ChildSpyAclRoleArchive objects filtered by the id_acl_role column
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection findByName(string $name) Return ChildSpyAclRoleArchive objects filtered by the name column
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAclRoleArchive objects filtered by the created_at column
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAclRoleArchive objects filtered by the updated_at column
 * @method     ChildSpyAclRoleArchive[]|ObjectCollection findByArchivedAt(string $archived_at) Return ChildSpyAclRoleArchive objects filtered by the archived_at column
 * @method     ChildSpyAclRoleArchive[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclRoleArchiveQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclRoleArchiveQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclRoleArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclRoleArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclRoleArchiveQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclRoleArchiveQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclRoleArchiveQuery();
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
     * @return ChildSpyAclRoleArchive|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclRoleArchiveTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclRoleArchiveTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclRoleArchive A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_acl_role, name, created_at, updated_at, archived_at FROM spy_acl_role_archive WHERE id_acl_role = :p0';
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
            /** @var ChildSpyAclRoleArchive $obj */
            $obj = new ChildSpyAclRoleArchive();
            $obj->hydrate($row);
            SpyAclRoleArchiveTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAclRoleArchive|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclRole(1234); // WHERE id_acl_role = 1234
     * $query->filterByIdAclRole(array(12, 34)); // WHERE id_acl_role IN (12, 34)
     * $query->filterByIdAclRole(array('min' => 12)); // WHERE id_acl_role > 12
     * </code>
     *
     * @param     mixed $idAclRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByIdAclRole($idAclRole = null, $comparison = null)
    {
        if (is_array($idAclRole)) {
            $useMinMax = false;
            if (isset($idAclRole['min'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $idAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRole['max'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $idAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $idAclRole, $comparison);
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
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclRoleArchive $spyAclRoleArchive Object to remove from the list of results
     *
     * @return $this|ChildSpyAclRoleArchiveQuery The current query, for fluid interface
     */
    public function prune($spyAclRoleArchive = null)
    {
        if ($spyAclRoleArchive) {
            $this->addUsingAlias(SpyAclRoleArchiveTableMap::COL_ID_ACL_ROLE, $spyAclRoleArchive->getIdAclRole(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_acl_role_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRoleArchiveTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclRoleArchiveTableMap::clearInstancePool();
            SpyAclRoleArchiveTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRoleArchiveTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclRoleArchiveTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclRoleArchiveTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclRoleArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyAclRoleArchiveQuery
