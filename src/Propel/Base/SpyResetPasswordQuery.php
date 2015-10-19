<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAuthResetPasswordArchive as ChildSpyAuthResetPasswordArchive;
use Propel\SpyResetPassword as ChildSpyResetPassword;
use Propel\SpyResetPasswordQuery as ChildSpyResetPasswordQuery;
use Propel\Map\SpyResetPasswordTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_auth_reset_password' table.
 *
 *
 *
 * @method     ChildSpyResetPasswordQuery orderByIdAuthResetPassword($order = Criteria::ASC) Order by the id_auth_reset_password column
 * @method     ChildSpyResetPasswordQuery orderByFkUser($order = Criteria::ASC) Order by the fk_user column
 * @method     ChildSpyResetPasswordQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildSpyResetPasswordQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSpyResetPasswordQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyResetPasswordQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyResetPasswordQuery groupByIdAuthResetPassword() Group by the id_auth_reset_password column
 * @method     ChildSpyResetPasswordQuery groupByFkUser() Group by the fk_user column
 * @method     ChildSpyResetPasswordQuery groupByCode() Group by the code column
 * @method     ChildSpyResetPasswordQuery groupByStatus() Group by the status column
 * @method     ChildSpyResetPasswordQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyResetPasswordQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyResetPasswordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyResetPasswordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyResetPasswordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyResetPasswordQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildSpyResetPasswordQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildSpyResetPasswordQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     \Propel\SpyUserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyResetPassword findOne(ConnectionInterface $con = null) Return the first ChildSpyResetPassword matching the query
 * @method     ChildSpyResetPassword findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyResetPassword matching the query, or a new ChildSpyResetPassword object populated from the query conditions when no match is found
 *
 * @method     ChildSpyResetPassword findOneByIdAuthResetPassword(int $id_auth_reset_password) Return the first ChildSpyResetPassword filtered by the id_auth_reset_password column
 * @method     ChildSpyResetPassword findOneByFkUser(int $fk_user) Return the first ChildSpyResetPassword filtered by the fk_user column
 * @method     ChildSpyResetPassword findOneByCode(string $code) Return the first ChildSpyResetPassword filtered by the code column
 * @method     ChildSpyResetPassword findOneByStatus(int $status) Return the first ChildSpyResetPassword filtered by the status column
 * @method     ChildSpyResetPassword findOneByCreatedAt(string $created_at) Return the first ChildSpyResetPassword filtered by the created_at column
 * @method     ChildSpyResetPassword findOneByUpdatedAt(string $updated_at) Return the first ChildSpyResetPassword filtered by the updated_at column *

 * @method     ChildSpyResetPassword requirePk($key, ConnectionInterface $con = null) Return the ChildSpyResetPassword by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOne(ConnectionInterface $con = null) Return the first ChildSpyResetPassword matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyResetPassword requireOneByIdAuthResetPassword(int $id_auth_reset_password) Return the first ChildSpyResetPassword filtered by the id_auth_reset_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOneByFkUser(int $fk_user) Return the first ChildSpyResetPassword filtered by the fk_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOneByCode(string $code) Return the first ChildSpyResetPassword filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOneByStatus(int $status) Return the first ChildSpyResetPassword filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOneByCreatedAt(string $created_at) Return the first ChildSpyResetPassword filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyResetPassword requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyResetPassword filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyResetPassword[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyResetPassword objects based on current ModelCriteria
 * @method     ChildSpyResetPassword[]|ObjectCollection findByIdAuthResetPassword(int $id_auth_reset_password) Return ChildSpyResetPassword objects filtered by the id_auth_reset_password column
 * @method     ChildSpyResetPassword[]|ObjectCollection findByFkUser(int $fk_user) Return ChildSpyResetPassword objects filtered by the fk_user column
 * @method     ChildSpyResetPassword[]|ObjectCollection findByCode(string $code) Return ChildSpyResetPassword objects filtered by the code column
 * @method     ChildSpyResetPassword[]|ObjectCollection findByStatus(int $status) Return ChildSpyResetPassword objects filtered by the status column
 * @method     ChildSpyResetPassword[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyResetPassword objects filtered by the created_at column
 * @method     ChildSpyResetPassword[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyResetPassword objects filtered by the updated_at column
 * @method     ChildSpyResetPassword[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyResetPasswordQuery extends ModelCriteria
{

    // archivable behavior
    protected $archiveOnDelete = true;
protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyResetPasswordQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyResetPassword', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyResetPasswordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyResetPasswordQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyResetPasswordQuery) {
            return $criteria;
        }
        $query = new ChildSpyResetPasswordQuery();
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
     * @return ChildSpyResetPassword|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyResetPasswordTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyResetPasswordTableMap::DATABASE_NAME);
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
     * @return ChildSpyResetPassword A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_auth_reset_password, fk_user, code, status, created_at, updated_at FROM spy_auth_reset_password WHERE id_auth_reset_password = :p0 AND fk_user = :p1';
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
            /** @var ChildSpyResetPassword $obj */
            $obj = new ChildSpyResetPassword();
            $obj->hydrate($row);
            SpyResetPasswordTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyResetPassword|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyResetPasswordTableMap::COL_FK_USER, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByIdAuthResetPassword($idAuthResetPassword = null, $comparison = null)
    {
        if (is_array($idAuthResetPassword)) {
            $useMinMax = false;
            if (isset($idAuthResetPassword['min'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAuthResetPassword['max'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD, $idAuthResetPassword, $comparison);
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
     * @see       filterByUser()
     *
     * @param     mixed $fkUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByFkUser($fkUser = null, $comparison = null)
    {
        if (is_array($fkUser)) {
            $useMinMax = false;
            if (isset($fkUser['min'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $fkUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkUser['max'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $fkUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $fkUser, $comparison);
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
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        $valueSet = SpyResetPasswordTableMap::getValueSet(SpyResetPasswordTableMap::COL_STATUS);
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

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyResetPasswordTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyUser object
     *
     * @param \Propel\SpyUser|ObjectCollection $spyUser The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function filterByUser($spyUser, $comparison = null)
    {
        if ($spyUser instanceof \Propel\SpyUser) {
            return $this
                ->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $spyUser->getIdUser(), $comparison);
        } elseif ($spyUser instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyResetPasswordTableMap::COL_FK_USER, $spyUser->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \Propel\SpyUser or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation SpyUser object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\Propel\SpyUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyResetPassword $spyResetPassword Object to remove from the list of results
     *
     * @return $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function prune($spyResetPassword = null)
    {
        if ($spyResetPassword) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyResetPasswordTableMap::COL_ID_AUTH_RESET_PASSWORD), $spyResetPassword->getIdAuthResetPassword(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyResetPasswordTableMap::COL_FK_USER), $spyResetPassword->getFkUser(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
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
     * Deletes all rows from the spy_auth_reset_password table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyResetPasswordTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyResetPasswordTableMap::clearInstancePool();
            SpyResetPasswordTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyResetPasswordTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyResetPasswordTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyResetPasswordTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyResetPasswordTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyResetPasswordTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyResetPasswordTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyResetPasswordTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyResetPasswordTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyResetPasswordQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyResetPasswordTableMap::COL_CREATED_AT);
    }

    // archivable behavior

    /**
     * Copy the data of the objects satisfying the query into ChildSpyAuthResetPasswordArchive archive objects.
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyResetPasswordTableMap::DATABASE_NAME);
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

} // SpyResetPasswordQuery
