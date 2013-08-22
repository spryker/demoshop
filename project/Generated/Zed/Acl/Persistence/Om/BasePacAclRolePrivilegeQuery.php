<?php


/**
 * Base class that represents a query for the 'pac_acl_role_privilege' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery orderByIdAclRolePrivilege($order = Criteria::ASC) Order by the id_acl_role_privilege column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery orderByFkAclResource($order = Criteria::ASC) Order by the fk_acl_resource column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery orderByFkAclPrivilege($order = Criteria::ASC) Order by the fk_acl_privilege column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery groupByIdAclRolePrivilege() Group by the id_acl_role_privilege column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery groupByFkAclResource() Group by the fk_acl_resource column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery groupByFkAclPrivilege() Group by the fk_acl_privilege column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery leftJoinAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery rightJoinAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery innerJoinAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery leftJoinAclResource($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery rightJoinAclResource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery innerJoinAclResource($relationAlias = null) Adds a INNER JOIN clause to the query using the AclResource relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery leftJoinAclPrivilege($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery rightJoinAclPrivilege($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery innerJoinAclPrivilege($relationAlias = null) Adds a INNER JOIN clause to the query using the AclPrivilege relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege matching the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege matching the query, or a new ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege findOneByFkAclRole(int $fk_acl_role) Return the first ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege filtered by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege findOneByFkAclResource(int $fk_acl_resource) Return the first ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege filtered by the fk_acl_resource column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege findOneByFkAclPrivilege(int $fk_acl_privilege) Return the first ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege filtered by the fk_acl_privilege column
 *
 * @method array findByIdAclRolePrivilege(int $id_acl_role_privilege) Return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects filtered by the id_acl_role_privilege column
 * @method array findByFkAclRole(int $fk_acl_role) Return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects filtered by the fk_acl_role column
 * @method array findByFkAclResource(int $fk_acl_resource) Return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects filtered by the fk_acl_resource column
 * @method array findByFkAclPrivilege(int $fk_acl_privilege) Return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege objects filtered by the fk_acl_privilege column
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.om
 */
abstract class Generated_Zed_Acl_Persistence_Om_BasePacAclRolePrivilegeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Om_BasePacAclRolePrivilegeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclRolePrivilege($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_role_privilege`, `fk_acl_role`, `fk_acl_resource`, `fk_acl_privilege` FROM `pac_acl_role_privilege` WHERE `id_acl_role_privilege` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_role_privilege column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclRolePrivilege(1234); // WHERE id_acl_role_privilege = 1234
     * $query->filterByIdAclRolePrivilege(array(12, 34)); // WHERE id_acl_role_privilege IN (12, 34)
     * $query->filterByIdAclRolePrivilege(array('min' => 12)); // WHERE id_acl_role_privilege >= 12
     * $query->filterByIdAclRolePrivilege(array('max' => 12)); // WHERE id_acl_role_privilege <= 12
     * </code>
     *
     * @param     mixed $idAclRolePrivilege The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByIdAclRolePrivilege($idAclRolePrivilege = null, $comparison = null)
    {
        if (is_array($idAclRolePrivilege)) {
            $useMinMax = false;
            if (isset($idAclRolePrivilege['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $idAclRolePrivilege['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRolePrivilege['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $idAclRolePrivilege['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $idAclRolePrivilege, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_ROLE, $fkAclRole, $comparison);
    }

    /**
     * Filter the query on the fk_acl_resource column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclResource(1234); // WHERE fk_acl_resource = 1234
     * $query->filterByFkAclResource(array(12, 34)); // WHERE fk_acl_resource IN (12, 34)
     * $query->filterByFkAclResource(array('min' => 12)); // WHERE fk_acl_resource >= 12
     * $query->filterByFkAclResource(array('max' => 12)); // WHERE fk_acl_resource <= 12
     * </code>
     *
     * @see       filterByAclResource()
     *
     * @param     mixed $fkAclResource The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByFkAclResource($fkAclResource = null, $comparison = null)
    {
        if (is_array($fkAclResource)) {
            $useMinMax = false;
            if (isset($fkAclResource['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_RESOURCE, $fkAclResource['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclResource['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_RESOURCE, $fkAclResource['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_RESOURCE, $fkAclResource, $comparison);
    }

    /**
     * Filter the query on the fk_acl_privilege column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclPrivilege(1234); // WHERE fk_acl_privilege = 1234
     * $query->filterByFkAclPrivilege(array(12, 34)); // WHERE fk_acl_privilege IN (12, 34)
     * $query->filterByFkAclPrivilege(array('min' => 12)); // WHERE fk_acl_privilege >= 12
     * $query->filterByFkAclPrivilege(array('max' => 12)); // WHERE fk_acl_privilege <= 12
     * </code>
     *
     * @see       filterByAclPrivilege()
     *
     * @param     mixed $fkAclPrivilege The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function filterByFkAclPrivilege($fkAclPrivilege = null, $comparison = null)
    {
        if (is_array($fkAclPrivilege)) {
            $useMinMax = false;
            if (isset($fkAclPrivilege['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_PRIVILEGE, $fkAclPrivilege['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclPrivilege['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_PRIVILEGE, $fkAclPrivilege['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_PRIVILEGE, $fkAclPrivilege, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRole|PropelObjectCollection $pacAclRole The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_ROLE, $pacAclRole->getIdAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_ROLE, $pacAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
        } else {
            throw new PropelException('filterByAclRole() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRoleQuery A secondary query class using the current class as primary query
     */
    public function useAclRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclRole', 'ProjectA_Zed_Acl_Persistence_PacAclRoleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclResource object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclResource|PropelObjectCollection $pacAclResource The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclResource($pacAclResource, $comparison = null)
    {
        if ($pacAclResource instanceof ProjectA_Zed_Acl_Persistence_PacAclResource) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_RESOURCE, $pacAclResource->getIdAclResource(), $comparison);
        } elseif ($pacAclResource instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_RESOURCE, $pacAclResource->toKeyValue('PrimaryKey', 'IdAclResource'), $comparison);
        } else {
            throw new PropelException('filterByAclResource() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclResource or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclResource relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Acl_Persistence_PacAclResourceQuery A secondary query class using the current class as primary query
     */
    public function useAclResourceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclResource($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclResource', 'ProjectA_Zed_Acl_Persistence_PacAclResourceQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclPrivilege object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclPrivilege|PropelObjectCollection $pacAclPrivilege The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclPrivilege($pacAclPrivilege, $comparison = null)
    {
        if ($pacAclPrivilege instanceof ProjectA_Zed_Acl_Persistence_PacAclPrivilege) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_PRIVILEGE, $pacAclPrivilege->getIdAclPrivilege(), $comparison);
        } elseif ($pacAclPrivilege instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::FK_ACL_PRIVILEGE, $pacAclPrivilege->toKeyValue('PrimaryKey', 'IdAclPrivilege'), $comparison);
        } else {
            throw new PropelException('filterByAclPrivilege() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclPrivilege or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclPrivilege relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function joinAclPrivilege($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclPrivilege');

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
            $this->addJoinObject($join, 'AclPrivilege');
        }

        return $this;
    }

    /**
     * Use the AclPrivilege relation PacAclPrivilege object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery A secondary query class using the current class as primary query
     */
    public function useAclPrivilegeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclPrivilege($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclPrivilege', 'ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege $pacAclRolePrivilege Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery The current query, for fluid interface
     */
    public function prune($pacAclRolePrivilege = null)
    {
        if ($pacAclRolePrivilege) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegePeer::ID_ACL_ROLE_PRIVILEGE, $pacAclRolePrivilege->getIdAclRolePrivilege(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
