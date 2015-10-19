<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclGroup as ChildSpyAclGroup;
use Propel\SpyAclGroupArchive as ChildSpyAclGroupArchive;
use Propel\SpyAclGroupQuery as ChildSpyAclGroupQuery;
use Propel\Map\SpyAclGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_group' table.
 *
 *
 *
 * @method     ChildSpyAclGroupQuery orderByIdAclGroup($order = Criteria::ASC) Order by the id_acl_group column
 * @method     ChildSpyAclGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyAclGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAclGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyAclGroupQuery groupByIdAclGroup() Group by the id_acl_group column
 * @method     ChildSpyAclGroupQuery groupByName() Group by the name column
 * @method     ChildSpyAclGroupQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAclGroupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyAclGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclGroupQuery leftJoinSpyAclUserHasGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAclUserHasGroup relation
 * @method     ChildSpyAclGroupQuery rightJoinSpyAclUserHasGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAclUserHasGroup relation
 * @method     ChildSpyAclGroupQuery innerJoinSpyAclUserHasGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAclUserHasGroup relation
 *
 * @method     ChildSpyAclGroupQuery leftJoinSpyAclGroupsHasRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAclGroupsHasRoles relation
 * @method     ChildSpyAclGroupQuery rightJoinSpyAclGroupsHasRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAclGroupsHasRoles relation
 * @method     ChildSpyAclGroupQuery innerJoinSpyAclGroupsHasRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAclGroupsHasRoles relation
 *
 * @method     \Propel\SpyAclUserHasGroupQuery|\Propel\SpyAclGroupsHasRolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyAclGroup findOne(ConnectionInterface $con = null) Return the first ChildSpyAclGroup matching the query
 * @method     ChildSpyAclGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclGroup matching the query, or a new ChildSpyAclGroup object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclGroup findOneByIdAclGroup(int $id_acl_group) Return the first ChildSpyAclGroup filtered by the id_acl_group column
 * @method     ChildSpyAclGroup findOneByName(string $name) Return the first ChildSpyAclGroup filtered by the name column
 * @method     ChildSpyAclGroup findOneByCreatedAt(string $created_at) Return the first ChildSpyAclGroup filtered by the created_at column
 * @method     ChildSpyAclGroup findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclGroup filtered by the updated_at column *

 * @method     ChildSpyAclGroup requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroup requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclGroup requireOneByIdAclGroup(int $id_acl_group) Return the first ChildSpyAclGroup filtered by the id_acl_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroup requireOneByName(string $name) Return the first ChildSpyAclGroup filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroup requireOneByCreatedAt(string $created_at) Return the first ChildSpyAclGroup filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclGroup requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAclGroup filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclGroup objects based on current ModelCriteria
 * @method     ChildSpyAclGroup[]|ObjectCollection findByIdAclGroup(int $id_acl_group) Return ChildSpyAclGroup objects filtered by the id_acl_group column
 * @method     ChildSpyAclGroup[]|ObjectCollection findByName(string $name) Return ChildSpyAclGroup objects filtered by the name column
 * @method     ChildSpyAclGroup[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAclGroup objects filtered by the created_at column
 * @method     ChildSpyAclGroup[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAclGroup objects filtered by the updated_at column
 * @method     ChildSpyAclGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclGroupQuery extends ModelCriteria
{

    // archivable behavior
    protected $archiveOnDelete = true;
protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclGroupQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclGroupQuery();
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
     * @return ChildSpyAclGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclGroupTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclGroupTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_acl_group, name, created_at, updated_at FROM spy_acl_group WHERE id_acl_group = :p0';
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
            /** @var ChildSpyAclGroup $obj */
            $obj = new ChildSpyAclGroup();
            $obj->hydrate($row);
            SpyAclGroupTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAclGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $keys, Criteria::IN);
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
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterByIdAclGroup($idAclGroup = null, $comparison = null)
    {
        if (is_array($idAclGroup)) {
            $useMinMax = false;
            if (isset($idAclGroup['min'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $idAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclGroup['max'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $idAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $idAclGroup, $comparison);
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
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAclGroupTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclGroupTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyAclUserHasGroup object
     *
     * @param \Propel\SpyAclUserHasGroup|ObjectCollection $spyAclUserHasGroup the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterBySpyAclUserHasGroup($spyAclUserHasGroup, $comparison = null)
    {
        if ($spyAclUserHasGroup instanceof \Propel\SpyAclUserHasGroup) {
            return $this
                ->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $spyAclUserHasGroup->getFkAclGroup(), $comparison);
        } elseif ($spyAclUserHasGroup instanceof ObjectCollection) {
            return $this
                ->useSpyAclUserHasGroupQuery()
                ->filterByPrimaryKeys($spyAclUserHasGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyAclUserHasGroup() only accepts arguments of type \Propel\SpyAclUserHasGroup or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAclUserHasGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function joinSpyAclUserHasGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAclUserHasGroup');

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
            $this->addJoinObject($join, 'SpyAclUserHasGroup');
        }

        return $this;
    }

    /**
     * Use the SpyAclUserHasGroup relation SpyAclUserHasGroup object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAclUserHasGroupQuery A secondary query class using the current class as primary query
     */
    public function useSpyAclUserHasGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAclUserHasGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAclUserHasGroup', '\Propel\SpyAclUserHasGroupQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAclGroupsHasRoles object
     *
     * @param \Propel\SpyAclGroupsHasRoles|ObjectCollection $spyAclGroupsHasRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterBySpyAclGroupsHasRoles($spyAclGroupsHasRoles, $comparison = null)
    {
        if ($spyAclGroupsHasRoles instanceof \Propel\SpyAclGroupsHasRoles) {
            return $this
                ->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $spyAclGroupsHasRoles->getFkAclGroup(), $comparison);
        } elseif ($spyAclGroupsHasRoles instanceof ObjectCollection) {
            return $this
                ->useSpyAclGroupsHasRolesQuery()
                ->filterByPrimaryKeys($spyAclGroupsHasRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyAclGroupsHasRoles() only accepts arguments of type \Propel\SpyAclGroupsHasRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAclGroupsHasRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function joinSpyAclGroupsHasRoles($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAclGroupsHasRoles');

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
            $this->addJoinObject($join, 'SpyAclGroupsHasRoles');
        }

        return $this;
    }

    /**
     * Use the SpyAclGroupsHasRoles relation SpyAclGroupsHasRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAclGroupsHasRolesQuery A secondary query class using the current class as primary query
     */
    public function useSpyAclGroupsHasRolesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAclGroupsHasRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAclGroupsHasRoles', '\Propel\SpyAclGroupsHasRolesQuery');
    }

    /**
     * Filter the query by a related SpyUser object
     * using the spy_acl_user_has_group table as cross reference
     *
     * @param SpyUser $spyUser the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterBySpyUser($spyUser, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSpyAclUserHasGroupQuery()
            ->filterBySpyUser($spyUser, $comparison)
            ->endUse();
    }

    /**
     * Filter the query by a related SpyAclRole object
     * using the spy_acl_groups_has_roles table as cross reference
     *
     * @param SpyAclRole $spyAclRole the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function filterBySpyAclRole($spyAclRole, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSpyAclGroupsHasRolesQuery()
            ->filterBySpyAclRole($spyAclRole, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclGroup $spyAclGroup Object to remove from the list of results
     *
     * @return $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function prune($spyAclGroup = null)
    {
        if ($spyAclGroup) {
            $this->addUsingAlias(SpyAclGroupTableMap::COL_ID_ACL_GROUP, $spyAclGroup->getIdAclGroup(), Criteria::NOT_EQUAL);
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
     * Deletes all rows from the spy_acl_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclGroupTableMap::clearInstancePool();
            SpyAclGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAclGroupTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAclGroupTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAclGroupTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAclGroupTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAclGroupTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyAclGroupQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAclGroupTableMap::COL_CREATED_AT);
    }

    // archivable behavior

    /**
     * Copy the data of the objects satisfying the query into ChildSpyAclGroupArchive archive objects.
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclGroupTableMap::DATABASE_NAME);
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

} // SpyAclGroupQuery
