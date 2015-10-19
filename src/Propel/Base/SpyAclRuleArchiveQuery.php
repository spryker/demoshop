<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclRuleArchive as ChildSpyAclRuleArchive;
use Propel\SpyAclRuleArchiveQuery as ChildSpyAclRuleArchiveQuery;
use Propel\Map\SpyAclRuleArchiveTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_rule_archive' table.
 *
 *
 *
 * @method     ChildSpyAclRuleArchiveQuery orderByIdAclRule($order = Criteria::ASC) Order by the id_acl_rule column
 * @method     ChildSpyAclRuleArchiveQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method     ChildSpyAclRuleArchiveQuery orderByBundle($order = Criteria::ASC) Order by the bundle column
 * @method     ChildSpyAclRuleArchiveQuery orderByController($order = Criteria::ASC) Order by the controller column
 * @method     ChildSpyAclRuleArchiveQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildSpyAclRuleArchiveQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpyAclRuleArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAclRuleArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildSpyAclRuleArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method     ChildSpyAclRuleArchiveQuery groupByIdAclRule() Group by the id_acl_rule column
 * @method     ChildSpyAclRuleArchiveQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method     ChildSpyAclRuleArchiveQuery groupByBundle() Group by the bundle column
 * @method     ChildSpyAclRuleArchiveQuery groupByController() Group by the controller column
 * @method     ChildSpyAclRuleArchiveQuery groupByAction() Group by the action column
 * @method     ChildSpyAclRuleArchiveQuery groupByType() Group by the type column
 * @method     ChildSpyAclRuleArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAclRuleArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildSpyAclRuleArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method     ChildSpyAclRuleArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclRuleArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclRuleArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclRuleArchive findOne(ConnectionInterface $con = null) Return the first ChildSpyAclRuleArchive matching the query
 * @method     ChildSpyAclRuleArchive findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclRuleArchive matching the query, or a new ChildSpyAclRuleArchive object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclRuleArchive findOneByIdAclRule(int $id_acl_rule) Return the first ChildSpyAclRuleArchive filtered by the id_acl_rule column
 * @method     ChildSpyAclRuleArchive findOneByFkAclRole(int $fk_acl_role) Return the first ChildSpyAclRuleArchive filtered by the fk_acl_role column
 * @method     ChildSpyAclRuleArchive findOneByBundle(string $bundle) Return the first ChildSpyAclRuleArchive filtered by the bundle column
 * @method     ChildSpyAclRuleArchive findOneByController(string $controller) Return the first ChildSpyAclRuleArchive filtered by the controller column
 * @method     ChildSpyAclRuleArchive findOneByAction(string $action) Return the first ChildSpyAclRuleArchive filtered by the action column
 * @method     ChildSpyAclRuleArchive findOneByType(int $type) Return the first ChildSpyAclRuleArchive filtered by the type column
 * @method     ChildSpyAclRuleArchive findOneByCreatedAt(string $created_at) Return the first ChildSpyAclRuleArchive filtered by the created_at column
 * @method     ChildSpyAclRuleArchive findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRuleArchive filtered by the updated_at column
 * @method     ChildSpyAclRuleArchive findOneByArchivedAt(string $archived_at) Return the first ChildSpyAclRuleArchive filtered by the archived_at column *

 * @method     ChildSpyAclRuleArchive requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclRuleArchive by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclRuleArchive matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRuleArchive requireOneByIdAclRule(int $id_acl_rule) Return the first ChildSpyAclRuleArchive filtered by the id_acl_rule column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByFkAclRole(int $fk_acl_role) Return the first ChildSpyAclRuleArchive filtered by the fk_acl_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByBundle(string $bundle) Return the first ChildSpyAclRuleArchive filtered by the bundle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByController(string $controller) Return the first ChildSpyAclRuleArchive filtered by the controller column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByAction(string $action) Return the first ChildSpyAclRuleArchive filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByType(int $type) Return the first ChildSpyAclRuleArchive filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByCreatedAt(string $created_at) Return the first ChildSpyAclRuleArchive filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRuleArchive filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRuleArchive requireOneByArchivedAt(string $archived_at) Return the first ChildSpyAclRuleArchive filtered by the archived_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclRuleArchive objects based on current ModelCriteria
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByIdAclRule(int $id_acl_rule) Return ChildSpyAclRuleArchive objects filtered by the id_acl_rule column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByFkAclRole(int $fk_acl_role) Return ChildSpyAclRuleArchive objects filtered by the fk_acl_role column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByBundle(string $bundle) Return ChildSpyAclRuleArchive objects filtered by the bundle column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByController(string $controller) Return ChildSpyAclRuleArchive objects filtered by the controller column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByAction(string $action) Return ChildSpyAclRuleArchive objects filtered by the action column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByType(int $type) Return ChildSpyAclRuleArchive objects filtered by the type column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAclRuleArchive objects filtered by the created_at column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAclRuleArchive objects filtered by the updated_at column
 * @method     ChildSpyAclRuleArchive[]|ObjectCollection findByArchivedAt(string $archived_at) Return ChildSpyAclRuleArchive objects filtered by the archived_at column
 * @method     ChildSpyAclRuleArchive[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclRuleArchiveQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclRuleArchiveQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclRuleArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclRuleArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclRuleArchiveQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclRuleArchiveQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclRuleArchiveQuery();
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
     * @return ChildSpyAclRuleArchive|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclRuleArchiveTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclRuleArchiveTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclRuleArchive A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_acl_rule, fk_acl_role, bundle, controller, action, type, created_at, updated_at, archived_at FROM spy_acl_rule_archive WHERE id_acl_rule = :p0';
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
            /** @var ChildSpyAclRuleArchive $obj */
            $obj = new ChildSpyAclRuleArchive();
            $obj->hydrate($row);
            SpyAclRuleArchiveTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAclRuleArchive|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_rule column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclRule(1234); // WHERE id_acl_rule = 1234
     * $query->filterByIdAclRule(array(12, 34)); // WHERE id_acl_rule IN (12, 34)
     * $query->filterByIdAclRule(array('min' => 12)); // WHERE id_acl_rule > 12
     * </code>
     *
     * @param     mixed $idAclRule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByIdAclRule($idAclRule = null, $comparison = null)
    {
        if (is_array($idAclRule)) {
            $useMinMax = false;
            if (isset($idAclRule['min'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $idAclRule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRule['max'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $idAclRule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $idAclRule, $comparison);
    }

    /**
     * Filter the query on the fk_acl_role column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclRole(1234); // WHERE fk_acl_role = 1234
     * $query->filterByFkAclRole(array(12, 34)); // WHERE fk_acl_role IN (12, 34)
     * $query->filterByFkAclRole(array('min' => 12)); // WHERE fk_acl_role > 12
     * </code>
     *
     * @param     mixed $fkAclRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE, $fkAclRole, $comparison);
    }

    /**
     * Filter the query on the bundle column
     *
     * Example usage:
     * <code>
     * $query->filterByBundle('fooValue');   // WHERE bundle = 'fooValue'
     * $query->filterByBundle('%fooValue%'); // WHERE bundle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bundle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByBundle($bundle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bundle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bundle)) {
                $bundle = str_replace('*', '%', $bundle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_BUNDLE, $bundle, $comparison);
    }

    /**
     * Filter the query on the controller column
     *
     * Example usage:
     * <code>
     * $query->filterByController('fooValue');   // WHERE controller = 'fooValue'
     * $query->filterByController('%fooValue%'); // WHERE controller LIKE '%fooValue%'
     * </code>
     *
     * @param     string $controller The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByController($controller = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($controller)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $controller)) {
                $controller = str_replace('*', '%', $controller);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_CONTROLLER, $controller, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%'); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $action)) {
                $action = str_replace('*', '%', $action);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        $valueSet = SpyAclRuleArchiveTableMap::getValueSet(SpyAclRuleArchiveTableMap::COL_TYPE);
        if (is_scalar($type)) {
            if (!in_array($type, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $type));
            }
            $type = array_search($type, $valueSet);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclRuleArchive $spyAclRuleArchive Object to remove from the list of results
     *
     * @return $this|ChildSpyAclRuleArchiveQuery The current query, for fluid interface
     */
    public function prune($spyAclRuleArchive = null)
    {
        if ($spyAclRuleArchive) {
            $this->addUsingAlias(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, $spyAclRuleArchive->getIdAclRule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_acl_rule_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleArchiveTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclRuleArchiveTableMap::clearInstancePool();
            SpyAclRuleArchiveTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleArchiveTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclRuleArchiveTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclRuleArchiveTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclRuleArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyAclRuleArchiveQuery
