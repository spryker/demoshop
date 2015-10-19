<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAuthResetPasswordArchive as ChildSpyAuthResetPasswordArchive;
use Propel\SpyAuthResetPasswordArchiveQuery as ChildSpyAuthResetPasswordArchiveQuery;
use Propel\Map\SpyAuthResetPasswordArchiveTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_auth_reset_password_archive' table.
 *
 *
 *
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByIdAuthResetPassword($order = Criteria::ASC) Order by the id_auth_reset_password column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByFkUser($order = Criteria::ASC) Order by the fk_user column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildSpyAuthResetPasswordArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByIdAuthResetPassword() Group by the id_auth_reset_password column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByFkUser() Group by the fk_user column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByCode() Group by the code column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByStatus() Group by the status column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildSpyAuthResetPasswordArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method     ChildSpyAuthResetPasswordArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAuthResetPasswordArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAuthResetPasswordArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAuthResetPasswordArchive findOne(ConnectionInterface $con = null) Return the first ChildSpyAuthResetPasswordArchive matching the query
 * @method     ChildSpyAuthResetPasswordArchive findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAuthResetPasswordArchive matching the query, or a new ChildSpyAuthResetPasswordArchive object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAuthResetPasswordArchive findOneByIdAuthResetPassword(int $id_auth_reset_password) Return the first ChildSpyAuthResetPasswordArchive filtered by the id_auth_reset_password column
 * @method     ChildSpyAuthResetPasswordArchive findOneByFkUser(int $fk_user) Return the first ChildSpyAuthResetPasswordArchive filtered by the fk_user column
 * @method     ChildSpyAuthResetPasswordArchive findOneByCode(string $code) Return the first ChildSpyAuthResetPasswordArchive filtered by the code column
 * @method     ChildSpyAuthResetPasswordArchive findOneByStatus(int $status) Return the first ChildSpyAuthResetPasswordArchive filtered by the status column
 * @method     ChildSpyAuthResetPasswordArchive findOneByCreatedAt(string $created_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the created_at column
 * @method     ChildSpyAuthResetPasswordArchive findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the updated_at column
 * @method     ChildSpyAuthResetPasswordArchive findOneByArchivedAt(string $archived_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the archived_at column *

 * @method     ChildSpyAuthResetPasswordArchive requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAuthResetPasswordArchive by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOne(ConnectionInterface $con = null) Return the first ChildSpyAuthResetPasswordArchive matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAuthResetPasswordArchive requireOneByIdAuthResetPassword(int $id_auth_reset_password) Return the first ChildSpyAuthResetPasswordArchive filtered by the id_auth_reset_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByFkUser(int $fk_user) Return the first ChildSpyAuthResetPasswordArchive filtered by the fk_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByCode(string $code) Return the first ChildSpyAuthResetPasswordArchive filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByStatus(int $status) Return the first ChildSpyAuthResetPasswordArchive filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByCreatedAt(string $created_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAuthResetPasswordArchive requireOneByArchivedAt(string $archived_at) Return the first ChildSpyAuthResetPasswordArchive filtered by the archived_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAuthResetPasswordArchive objects based on current ModelCriteria
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByIdAuthResetPassword(int $id_auth_reset_password) Return ChildSpyAuthResetPasswordArchive objects filtered by the id_auth_reset_password column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByFkUser(int $fk_user) Return ChildSpyAuthResetPasswordArchive objects filtered by the fk_user column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByCode(string $code) Return ChildSpyAuthResetPasswordArchive objects filtered by the code column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByStatus(int $status) Return ChildSpyAuthResetPasswordArchive objects filtered by the status column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAuthResetPasswordArchive objects filtered by the created_at column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAuthResetPasswordArchive objects filtered by the updated_at column
 * @method     ChildSpyAuthResetPasswordArchive[]|ObjectCollection findByArchivedAt(string $archived_at) Return ChildSpyAuthResetPasswordArchive objects filtered by the archived_at column
 * @method     ChildSpyAuthResetPasswordArchive[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAuthResetPasswordArchiveQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAuthResetPasswordArchiveQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAuthResetPasswordArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAuthResetPasswordArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAuthResetPasswordArchiveQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAuthResetPasswordArchiveQuery) {
            return $criteria;
        }
        $query = new ChildSpyAuthResetPasswordArchiveQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$id_auth_reset_password, $fk_user] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyAuthResetPasswordArchive|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAuthResetPasswordArchiveTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
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
     * @return ChildSpyAuthResetPasswordArchive A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_auth_reset_password, fk_user, code, status, created_at, updated_at, archived_at FROM spy_auth_reset_password_archive WHERE id_auth_reset_password = :p0 AND fk_user = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyAuthResetPasswordArchive $obj */
            $obj = new ChildSpyAuthResetPasswordArchive();
            $obj->hydrate($row);
            SpyAuthResetPasswordArchiveTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyAuthResetPasswordArchive|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_auth_reset_password column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAuthResetPassword(1234); // WHERE id_auth_reset_password = 1234
     * $query->filterByIdAuthResetPassword(array(12, 34)); // WHERE id_auth_reset_password IN (12, 34)
     * $query->filterByIdAuthResetPassword(array('min' => 12)); // WHERE id_auth_reset_password > 12
     * </code>
     *
     * @param     mixed $idAuthResetPassword The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByIdAuthResetPassword($idAuthResetPassword = null, $comparison = null)
    {
        if (is_array($idAuthResetPassword)) {
            $useMinMax = false;
            if (isset($idAuthResetPassword['min'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAuthResetPassword['max'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword, $comparison);
    }

    /**
     * Filter the query on the fk_user column
     *
     * Example usage:
     * <code>
     * $query->filterByFkUser(1234); // WHERE fk_user = 1234
     * $query->filterByFkUser(array(12, 34)); // WHERE fk_user IN (12, 34)
     * $query->filterByFkUser(array('min' => 12)); // WHERE fk_user > 12
     * </code>
     *
     * @param     mixed $fkUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByFkUser($fkUser = null, $comparison = null)
    {
        if (is_array($fkUser)) {
            $useMinMax = false;
            if (isset($fkUser['min'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $fkUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkUser['max'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $fkUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $fkUser, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        $valueSet = SpyAuthResetPasswordArchiveTableMap::getValueSet(SpyAuthResetPasswordArchiveTableMap::COL_STATUS);
        if (is_scalar($status)) {
            if (!in_array($status, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $status));
            }
            $status = array_search($status, $valueSet);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAuthResetPasswordArchive $spyAuthResetPasswordArchive Object to remove from the list of results
     *
     * @return $this|ChildSpyAuthResetPasswordArchiveQuery The current query, for fluid interface
     */
    public function prune($spyAuthResetPasswordArchive = null)
    {
        if ($spyAuthResetPasswordArchive) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD), $spyAuthResetPasswordArchive->getIdAuthResetPassword(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER), $spyAuthResetPasswordArchive->getFkUser(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_auth_reset_password_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAuthResetPasswordArchiveTableMap::clearInstancePool();
            SpyAuthResetPasswordArchiveTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAuthResetPasswordArchiveTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAuthResetPasswordArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyAuthResetPasswordArchiveQuery
