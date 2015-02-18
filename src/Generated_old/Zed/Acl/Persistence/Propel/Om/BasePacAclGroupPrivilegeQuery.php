<?php


/**
 * Base class that represents a query for the 'pac_acl_group_privilege' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery orderByIdAclGroupPrivilege($order = Criteria::ASC) Order by the id_acl_group_privilege column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery orderByFkAclGroup($order = Criteria::ASC) Order by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery groupByIdAclGroupPrivilege() Group by the id_acl_group_privilege column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery groupByFkAclGroup() Group by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery groupByIsDeleted() Group by the is_deleted column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery leftJoinAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery rightJoinAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery innerJoinAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery leftJoinAclGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclGroup relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery rightJoinAclGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclGroup relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery innerJoinAclGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AclGroup relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege matching the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege matching the query, or a new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege findOneByFkAclRole(int $fk_acl_role) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege filtered by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege findOneByFkAclGroup(int $fk_acl_group) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege filtered by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege filtered by the is_deleted column
 *
 * @method array findByIdAclGroupPrivilege(int $id_acl_group_privilege) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects filtered by the id_acl_group_privilege column
 * @method array findByFkAclRole(int $fk_acl_role) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects filtered by the fk_acl_role column
 * @method array findByFkAclGroup(int $fk_acl_group) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects filtered by the fk_acl_group column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege objects filtered by the is_deleted column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclGroupPrivilegeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclGroupPrivilegeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAclGroupPrivilege']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclGroupPrivilege($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_group_privilege`, `fk_acl_role`, `fk_acl_group`, `is_deleted` FROM `pac_acl_group_privilege` WHERE `id_acl_group_privilege` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_group_privilege column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclGroupPrivilege(1234); // WHERE id_acl_group_privilege = 1234
     * $query->filterByIdAclGroupPrivilege(array(12, 34)); // WHERE id_acl_group_privilege IN (12, 34)
     * $query->filterByIdAclGroupPrivilege(array('min' => 12)); // WHERE id_acl_group_privilege >= 12
     * $query->filterByIdAclGroupPrivilege(array('max' => 12)); // WHERE id_acl_group_privilege <= 12
     * </code>
     *
     * @param     mixed $idAclGroupPrivilege The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByIdAclGroupPrivilege($idAclGroupPrivilege = null, $comparison = null)
    {
        if (is_array($idAclGroupPrivilege)) {
            $useMinMax = false;
            if (isset($idAclGroupPrivilege['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $idAclGroupPrivilege['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclGroupPrivilege['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $idAclGroupPrivilege['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $idAclGroupPrivilege, $comparison);
    }

    /**
     * Filter the query on the fk_acl_role column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclRole(1234); // WHERE fk_acl_role = 1234
     * $query->filterByFkAclRole(array(12, 34)); // WHERE fk_acl_role IN (12, 34)
     * $query->filterByFkAclRole(array('min' => 12)); // WHERE fk_acl_role >= 12
     * $query->filterByFkAclRole(array('max' => 12)); // WHERE fk_acl_role <= 12
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_ROLE, $fkAclRole, $comparison);
    }

    /**
     * Filter the query on the fk_acl_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclGroup(1234); // WHERE fk_acl_group = 1234
     * $query->filterByFkAclGroup(array(12, 34)); // WHERE fk_acl_group IN (12, 34)
     * $query->filterByFkAclGroup(array('min' => 12)); // WHERE fk_acl_group >= 12
     * $query->filterByFkAclGroup(array('max' => 12)); // WHERE fk_acl_group <= 12
     * </code>
     *
     * @see       filterByAclGroup()
     *
     * @param     mixed $fkAclGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByFkAclGroup($fkAclGroup = null, $comparison = null)
    {
        if (is_array($fkAclGroup)) {
            $useMinMax = false;
            if (isset($fkAclGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_GROUP, $fkAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_GROUP, $fkAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_GROUP, $fkAclGroup, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclRole|PropelObjectCollection $pacAclRole The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_ROLE, $pacAclRole->getIdAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_ROLE, $pacAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
        } else {
            throw new PropelException('filterByAclRole() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
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
     * Use the AclRole relation PacAclRole object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery A secondary query class using the current class as primary query
     */
    public function useAclRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclRole', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup|PropelObjectCollection $pacAclGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclGroup($pacAclGroup, $comparison = null)
    {
        if ($pacAclGroup instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_GROUP, $pacAclGroup->getIdAclGroup(), $comparison);
        } elseif ($pacAclGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::FK_ACL_GROUP, $pacAclGroup->toKeyValue('PrimaryKey', 'IdAclGroup'), $comparison);
        } else {
            throw new PropelException('filterByAclGroup() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function joinAclGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclGroup');

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
            $this->addJoinObject($join, 'AclGroup');
        }

        return $this;
    }

    /**
     * Use the AclGroup relation PacAclGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery A secondary query class using the current class as primary query
     */
    public function useAclGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclGroup', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege $pacAclGroupPrivilege Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegeQuery The current query, for fluid interface
     */
    public function prune($pacAclGroupPrivilege = null)
    {
        if ($pacAclGroupPrivilege) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilegePeer::ID_ACL_GROUP_PRIVILEGE, $pacAclGroupPrivilege->getIdAclGroupPrivilege(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
