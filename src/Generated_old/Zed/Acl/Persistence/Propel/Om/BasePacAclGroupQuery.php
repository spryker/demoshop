<?php


/**
 * Base class that represents a query for the 'pac_acl_group' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery orderByIdAclGroup($order = Criteria::ASC) Order by the id_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery groupByIdAclGroup() Group by the id_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery leftJoinAclResource($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery rightJoinAclResource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery innerJoinAclResource($relationAlias = null) Adds a INNER JOIN clause to the query using the AclResource relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery leftJoinAclGroupPrivilege($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclGroupPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery rightJoinAclGroupPrivilege($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclGroupPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery innerJoinAclGroupPrivilege($relationAlias = null) Adds a INNER JOIN clause to the query using the AclGroupPrivilege relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup matching the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup matching the query, or a new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOneByName(string $name) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup filtered by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup filtered by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup filtered by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup filtered by the updated_at column
 *
 * @method array findByIdAclGroup(int $id_acl_group) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup objects filtered by the id_acl_group column
 * @method array findByName(string $name) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup objects filtered by the name column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAclGroup']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery(null, null, $modelAlias);

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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclGroup($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_group`, `name`, `is_deleted`, `created_at`, `updated_at` FROM `pac_acl_group` WHERE `id_acl_group` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_group column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclGroup(1234); // WHERE id_acl_group = 1234
     * $query->filterByIdAclGroup(array(12, 34)); // WHERE id_acl_group IN (12, 34)
     * $query->filterByIdAclGroup(array('min' => 12)); // WHERE id_acl_group >= 12
     * $query->filterByIdAclGroup(array('max' => 12)); // WHERE id_acl_group <= 12
     * </code>
     *
     * @param     mixed $idAclGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByIdAclGroup($idAclGroup = null, $comparison = null)
    {
        if (is_array($idAclGroup)) {
            $useMinMax = false;
            if (isset($idAclGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $idAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $idAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $idAclGroup, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclResource object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclResource|PropelObjectCollection $pacAclResource  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclResource($pacAclResource, $comparison = null)
    {
        if ($pacAclResource instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclResource) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $pacAclResource->getFkAclGroup(), $comparison);
        } elseif ($pacAclResource instanceof PropelObjectCollection) {
            return $this
                ->useAclResourceQuery()
                ->filterByPrimaryKeys($pacAclResource->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclResource() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclResource or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclResource relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function joinAclResource($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclResource');

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
            $this->addJoinObject($join, 'AclResource');
        }

        return $this;
    }

    /**
     * Use the AclResource relation PacAclResource object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery A secondary query class using the current class as primary query
     */
    public function useAclResourceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclResource($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclResource', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege|PropelObjectCollection $pacAclGroupPrivilege  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclGroupPrivilege($pacAclGroupPrivilege, $comparison = null)
    {
        if ($pacAclGroupPrivilege instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $pacAclGroupPrivilege->getFkAclGroup(), $comparison);
        } elseif ($pacAclGroupPrivilege instanceof PropelObjectCollection) {
            return $this
                ->useAclGroupPrivilegeQuery()
                ->filterByPrimaryKeys($pacAclGroupPrivilege->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclGroupPrivilege() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclGroupPrivilege relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function joinAclGroupPrivilege($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclGroupPrivilege');

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
            $this->addJoinObject($join, 'AclGroupPrivilege');
        }

        return $this;
    }

    /**
     * Use the AclGroupPrivilege relation PacAclGroupPrivilege object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery A secondary query class using the current class as primary query
     */
    public function useAclGroupPrivilegeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclGroupPrivilege($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclGroupPrivilege', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup $pacAclGroup Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function prune($pacAclGroup = null)
    {
        if ($pacAclGroup) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::ID_ACL_GROUP, $pacAclGroup->getIdAclGroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPeer::CREATED_AT);
    }
}
