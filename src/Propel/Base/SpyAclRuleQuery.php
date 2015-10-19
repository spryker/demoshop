<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclRule as ChildSpyAclRule;
use Propel\SpyAclRuleArchive as ChildSpyAclRuleArchive;
use Propel\SpyAclRuleQuery as ChildSpyAclRuleQuery;
use Propel\Map\SpyAclRuleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_rule' table.
 *
 *
 *
 * @method     ChildSpyAclRuleQuery orderByIdAclRule($order = Criteria::ASC) Order by the id_acl_rule column
 * @method     ChildSpyAclRuleQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method     ChildSpyAclRuleQuery orderByBundle($order = Criteria::ASC) Order by the bundle column
 * @method     ChildSpyAclRuleQuery orderByController($order = Criteria::ASC) Order by the controller column
 * @method     ChildSpyAclRuleQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildSpyAclRuleQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpyAclRuleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAclRuleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyAclRuleQuery groupByIdAclRule() Group by the id_acl_rule column
 * @method     ChildSpyAclRuleQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method     ChildSpyAclRuleQuery groupByBundle() Group by the bundle column
 * @method     ChildSpyAclRuleQuery groupByController() Group by the controller column
 * @method     ChildSpyAclRuleQuery groupByAction() Group by the action column
 * @method     ChildSpyAclRuleQuery groupByType() Group by the type column
 * @method     ChildSpyAclRuleQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAclRuleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyAclRuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclRuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclRuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclRuleQuery leftJoinAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRole relation
 * @method     ChildSpyAclRuleQuery rightJoinAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRole relation
 * @method     ChildSpyAclRuleQuery innerJoinAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRole relation
 *
 * @method     \Propel\SpyAclRoleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyAclRule findOne(ConnectionInterface $con = null) Return the first ChildSpyAclRule matching the query
 * @method     ChildSpyAclRule findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclRule matching the query, or a new ChildSpyAclRule object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclRule findOneByIdAclRule(int $id_acl_rule) Return the first ChildSpyAclRule filtered by the id_acl_rule column
 * @method     ChildSpyAclRule findOneByFkAclRole(int $fk_acl_role) Return the first ChildSpyAclRule filtered by the fk_acl_role column
 * @method     ChildSpyAclRule findOneByBundle(string $bundle) Return the first ChildSpyAclRule filtered by the bundle column
 * @method     ChildSpyAclRule findOneByController(string $controller) Return the first ChildSpyAclRule filtered by the controller column
 * @method     ChildSpyAclRule findOneByAction(string $action) Return the first ChildSpyAclRule filtered by the action column
 * @method     ChildSpyAclRule findOneByType(int $type) Return the first ChildSpyAclRule filtered by the type column
 * @method     ChildSpyAclRule findOneByCreatedAt(string $created_at) Return the first ChildSpyAclRule filtered by the created_at column
 * @method     ChildSpyAclRule findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRule filtered by the updated_at column *

 * @method     ChildSpyAclRule requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclRule by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclRule matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRule requireOneByIdAclRule(int $id_acl_rule) Return the first ChildSpyAclRule filtered by the id_acl_rule column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByFkAclRole(int $fk_acl_role) Return the first ChildSpyAclRule filtered by the fk_acl_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByBundle(string $bundle) Return the first ChildSpyAclRule filtered by the bundle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByController(string $controller) Return the first ChildSpyAclRule filtered by the controller column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByAction(string $action) Return the first ChildSpyAclRule filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByType(int $type) Return the first ChildSpyAclRule filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByCreatedAt(string $created_at) Return the first ChildSpyAclRule filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclRule requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclRule filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclRule[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclRule objects based on current ModelCriteria
 * @method     ChildSpyAclRule[]|ObjectCollection findByIdAclRule(int $id_acl_rule) Return ChildSpyAclRule objects filtered by the id_acl_rule column
 * @method     ChildSpyAclRule[]|ObjectCollection findByFkAclRole(int $fk_acl_role) Return ChildSpyAclRule objects filtered by the fk_acl_role column
 * @method     ChildSpyAclRule[]|ObjectCollection findByBundle(string $bundle) Return ChildSpyAclRule objects filtered by the bundle column
 * @method     ChildSpyAclRule[]|ObjectCollection findByController(string $controller) Return ChildSpyAclRule objects filtered by the controller column
 * @method     ChildSpyAclRule[]|ObjectCollection findByAction(string $action) Return ChildSpyAclRule objects filtered by the action column
 * @method     ChildSpyAclRule[]|ObjectCollection findByType(int $type) Return ChildSpyAclRule objects filtered by the type column
 * @method     ChildSpyAclRule[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAclRule objects filtered by the created_at column
 * @method     ChildSpyAclRule[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAclRule objects filtered by the updated_at column
 * @method     ChildSpyAclRule[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclRuleQuery extends ModelCriteria
{

    // archivable behavior
    protected $archiveOnDelete = true;
protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclRuleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclRule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclRuleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclRuleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclRuleQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclRuleQuery();
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
     * @return ChildSpyAclRule|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclRuleTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclRuleTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclRule A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_acl_rule, fk_acl_role, bundle, controller, action, type, created_at, updated_at FROM spy_acl_rule WHERE id_acl_rule = :p0';
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
            /** @var ChildSpyAclRule $obj */
            $obj = new ChildSpyAclRule();
            $obj->hydrate($row);
            SpyAclRuleTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAclRule|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $keys, Criteria::IN);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByIdAclRule($idAclRule = null, $comparison = null)
    {
        if (is_array($idAclRule)) {
            $useMinMax = false;
            if (isset($idAclRule['min'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $idAclRule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRule['max'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $idAclRule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $idAclRule, $comparison);
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
     * @see       filterByAclRole()
     *
     * @param     mixed $fkAclRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_FK_ACL_ROLE, $fkAclRole, $comparison);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_BUNDLE, $bundle, $comparison);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_CONTROLLER, $controller, $comparison);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        $valueSet = SpyAclRuleTableMap::getValueSet(SpyAclRuleTableMap::COL_TYPE);
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

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAclRuleTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclRuleTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyAclRole object
     *
     * @param \Propel\SpyAclRole|ObjectCollection $spyAclRole The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function filterByAclRole($spyAclRole, $comparison = null)
    {
        if ($spyAclRole instanceof \Propel\SpyAclRole) {
            return $this
                ->addUsingAlias(SpyAclRuleTableMap::COL_FK_ACL_ROLE, $spyAclRole->getIdAclRole(), $comparison);
        } elseif ($spyAclRole instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyAclRuleTableMap::COL_FK_ACL_ROLE, $spyAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
        } else {
            throw new PropelException('filterByAclRole() only accepts arguments of type \Propel\SpyAclRole or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function joinAclRole($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclRole');

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
            $this->addJoinObject($join, 'AclRole');
        }

        return $this;
    }

    /**
     * Use the AclRole relation SpyAclRole object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAclRoleQuery A secondary query class using the current class as primary query
     */
    public function useAclRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclRole', '\Propel\SpyAclRoleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclRule $spyAclRule Object to remove from the list of results
     *
     * @return $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function prune($spyAclRule = null)
    {
        if ($spyAclRule) {
            $this->addUsingAlias(SpyAclRuleTableMap::COL_ID_ACL_RULE, $spyAclRule->getIdAclRule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Code to execute before every DELETE statement
     *
     * @param     ConnectionInterface $con The connection object used by the query
     */
    protected function basePreDelete(ConnectionInterface $con)
    {
        // archivable behavior

        if ($this->archiveOnDelete) {
            $this->archive($con);
        } else {
            $this->archiveOnDelete = true;
        }


        return $this->preDelete($con);
    }

    /**
     * Deletes all rows from the spy_acl_rule table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclRuleTableMap::clearInstancePool();
            SpyAclRuleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclRuleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclRuleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclRuleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAclRuleTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAclRuleTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAclRuleTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAclRuleTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAclRuleTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyAclRuleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAclRuleTableMap::COL_CREATED_AT);
    }

    // archivable behavior

    /**
     * Copy the data of the objects satisfying the query into ChildSpyAclRuleArchive archive objects.
     * The archived objects are then saved.
     * If any of the objects has already been archived, the archived object
     * is updated and not duplicated.
     * Warning: This termination methods issues 2n+1 queries.
     *
     * @param      ConnectionInterface $con    Connection to use.
     * @param      Boolean $useLittleMemory    Whether or not to use OnDemandFormatter to retrieve objects.
     *               Set to false if the identity map matters.
     *               Set to true (default) to use less memory.
     *
     * @return     int the number of archived objects
     */
    public function archive($con = null, $useLittleMemory = true)
    {
        $criteria = clone $this;
        // prepare the query
        $criteria->setWith(array());
        if ($useLittleMemory) {
            $criteria->setFormatter(ModelCriteria::FORMAT_ON_DEMAND);
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con, $criteria) {
            $totalArchivedObjects = 0;

            // archive all results one by one
            foreach ($criteria->find($con) as $object) {
                $object->archive($con);
                $totalArchivedObjects++;
            }

            return $totalArchivedObjects;
        });
    }

    /**
     * Enable/disable auto-archiving on delete for the next query.
     *
     * @param boolean True if the query must archive deleted objects, false otherwise.
     */
    public function setArchiveOnDelete($archiveOnDelete)
    {
        $this->archiveOnDelete = $archiveOnDelete;
    }

    /**
     * Delete records matching the current query without archiving them.
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return integer the number of deleted rows
     */
    public function deleteWithoutArchive($con = null)
    {
        $this->archiveOnDelete = false;

        return $this->delete($con);
    }

    /**
     * Delete all records without archiving them.
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return integer the number of deleted rows
     */
    public function deleteAllWithoutArchive($con = null)
    {
        $this->archiveOnDelete = false;

        return $this->deleteAll($con);
    }

} // SpyAclRuleQuery
