<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAclUserHasGroup as ChildSpyAclUserHasGroup;
use Propel\SpyAclUserHasGroupQuery as ChildSpyAclUserHasGroupQuery;
use Propel\Map\SpyAclUserHasGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_acl_user_has_group' table.
 *
 *
 *
 * @method     ChildSpyAclUserHasGroupQuery orderByFkUser($order = Criteria::ASC) Order by the fk_user column
 * @method     ChildSpyAclUserHasGroupQuery orderByFkAclGroup($order = Criteria::ASC) Order by the fk_acl_group column
 *
 * @method     ChildSpyAclUserHasGroupQuery groupByFkUser() Group by the fk_user column
 * @method     ChildSpyAclUserHasGroupQuery groupByFkAclGroup() Group by the fk_acl_group column
 *
 * @method     ChildSpyAclUserHasGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAclUserHasGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAclUserHasGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAclUserHasGroupQuery leftJoinSpyUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUser relation
 * @method     ChildSpyAclUserHasGroupQuery rightJoinSpyUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUser relation
 * @method     ChildSpyAclUserHasGroupQuery innerJoinSpyUser($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUser relation
 *
 * @method     ChildSpyAclUserHasGroupQuery leftJoinSpyAclGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAclGroup relation
 * @method     ChildSpyAclUserHasGroupQuery rightJoinSpyAclGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAclGroup relation
 * @method     ChildSpyAclUserHasGroupQuery innerJoinSpyAclGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAclGroup relation
 *
 * @method     \Propel\SpyUserQuery|\Propel\SpyAclGroupQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyAclUserHasGroup findOne(ConnectionInterface $con = null) Return the first ChildSpyAclUserHasGroup matching the query
 * @method     ChildSpyAclUserHasGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAclUserHasGroup matching the query, or a new ChildSpyAclUserHasGroup object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAclUserHasGroup findOneByFkUser(int $fk_user) Return the first ChildSpyAclUserHasGroup filtered by the fk_user column
 * @method     ChildSpyAclUserHasGroup findOneByFkAclGroup(int $fk_acl_group) Return the first ChildSpyAclUserHasGroup filtered by the fk_acl_group column *

 * @method     ChildSpyAclUserHasGroup requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAclUserHasGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclUserHasGroup requireOne(ConnectionInterface $con = null) Return the first ChildSpyAclUserHasGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclUserHasGroup requireOneByFkUser(int $fk_user) Return the first ChildSpyAclUserHasGroup filtered by the fk_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAclUserHasGroup requireOneByFkAclGroup(int $fk_acl_group) Return the first ChildSpyAclUserHasGroup filtered by the fk_acl_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAclUserHasGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAclUserHasGroup objects based on current ModelCriteria
 * @method     ChildSpyAclUserHasGroup[]|ObjectCollection findByFkUser(int $fk_user) Return ChildSpyAclUserHasGroup objects filtered by the fk_user column
 * @method     ChildSpyAclUserHasGroup[]|ObjectCollection findByFkAclGroup(int $fk_acl_group) Return ChildSpyAclUserHasGroup objects filtered by the fk_acl_group column
 * @method     ChildSpyAclUserHasGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAclUserHasGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAclUserHasGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAclUserHasGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAclUserHasGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAclUserHasGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAclUserHasGroupQuery) {
            return $criteria;
        }
        $query = new ChildSpyAclUserHasGroupQuery();
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
     * @param array[$fk_user, $fk_acl_group] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyAclUserHasGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAclUserHasGroupTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAclUserHasGroupTableMap::DATABASE_NAME);
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
     * @return ChildSpyAclUserHasGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_user, fk_acl_group FROM spy_acl_user_has_group WHERE fk_user = :p0 AND fk_acl_group = :p1';
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
            /** @var ChildSpyAclUserHasGroup $obj */
            $obj = new ChildSpyAclUserHasGroup();
            $obj->hydrate($row);
            SpyAclUserHasGroupTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyAclUserHasGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyAclUserHasGroupTableMap::COL_FK_USER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterBySpyUser()
     *
     * @param     mixed $fkUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterByFkUser($fkUser = null, $comparison = null)
    {
        if (is_array($fkUser)) {
            $useMinMax = false;
            if (isset($fkUser['min'])) {
                $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $fkUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkUser['max'])) {
                $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $fkUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $fkUser, $comparison);
    }

    /**
     * Filter the query on the fk_acl_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclGroup(1234); // WHERE fk_acl_group = 1234
     * $query->filterByFkAclGroup(array(12, 34)); // WHERE fk_acl_group IN (12, 34)
     * $query->filterByFkAclGroup(array('min' => 12)); // WHERE fk_acl_group > 12
     * </code>
     *
     * @see       filterBySpyAclGroup()
     *
     * @param     mixed $fkAclGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterByFkAclGroup($fkAclGroup = null, $comparison = null)
    {
        if (is_array($fkAclGroup)) {
            $useMinMax = false;
            if (isset($fkAclGroup['min'])) {
                $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $fkAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclGroup['max'])) {
                $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $fkAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $fkAclGroup, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyUser object
     *
     * @param \Propel\SpyUser|ObjectCollection $spyUser The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterBySpyUser($spyUser, $comparison = null)
    {
        if ($spyUser instanceof \Propel\SpyUser) {
            return $this
                ->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $spyUser->getIdUser(), $comparison);
        } elseif ($spyUser instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_USER, $spyUser->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterBySpyUser() only accepts arguments of type \Propel\SpyUser or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function joinSpyUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUser');

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
            $this->addJoinObject($join, 'SpyUser');
        }

        return $this;
    }

    /**
     * Use the SpyUser relation SpyUser object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUserQuery A secondary query class using the current class as primary query
     */
    public function useSpyUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUser', '\Propel\SpyUserQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAclGroup object
     *
     * @param \Propel\SpyAclGroup|ObjectCollection $spyAclGroup The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function filterBySpyAclGroup($spyAclGroup, $comparison = null)
    {
        if ($spyAclGroup instanceof \Propel\SpyAclGroup) {
            return $this
                ->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $spyAclGroup->getIdAclGroup(), $comparison);
        } elseif ($spyAclGroup instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP, $spyAclGroup->toKeyValue('PrimaryKey', 'IdAclGroup'), $comparison);
        } else {
            throw new PropelException('filterBySpyAclGroup() only accepts arguments of type \Propel\SpyAclGroup or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAclGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function joinSpyAclGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAclGroup');

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
            $this->addJoinObject($join, 'SpyAclGroup');
        }

        return $this;
    }

    /**
     * Use the SpyAclGroup relation SpyAclGroup object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAclGroupQuery A secondary query class using the current class as primary query
     */
    public function useSpyAclGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAclGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAclGroup', '\Propel\SpyAclGroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAclUserHasGroup $spyAclUserHasGroup Object to remove from the list of results
     *
     * @return $this|ChildSpyAclUserHasGroupQuery The current query, for fluid interface
     */
    public function prune($spyAclUserHasGroup = null)
    {
        if ($spyAclUserHasGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyAclUserHasGroupTableMap::COL_FK_USER), $spyAclUserHasGroup->getFkUser(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyAclUserHasGroupTableMap::COL_FK_ACL_GROUP), $spyAclUserHasGroup->getFkAclGroup(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_acl_user_has_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclUserHasGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAclUserHasGroupTableMap::clearInstancePool();
            SpyAclUserHasGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclUserHasGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAclUserHasGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAclUserHasGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAclUserHasGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyAclUserHasGroupQuery
