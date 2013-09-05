<?php


/**
 * Base class that represents a query for the 'pac_acl_role_resource' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery orderByIdAclRoleResource($order = Criteria::ASC) Order by the id_acl_role_resource column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery orderByFkAclResource($order = Criteria::ASC) Order by the fk_acl_resource column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery groupByIdAclRoleResource() Group by the id_acl_role_resource column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery groupByFkAclResource() Group by the fk_acl_resource column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery leftJoinAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery rightJoinAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery innerJoinAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery leftJoinAclResource($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery rightJoinAclResource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery innerJoinAclResource($relationAlias = null) Adds a INNER JOIN clause to the query using the AclResource relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResource findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRoleResource matching the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResource findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRoleResource matching the query, or a new ProjectA_Zed_Acl_Persistence_PacAclRoleResource object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResource findOneByFkAclRole(int $fk_acl_role) Return the first ProjectA_Zed_Acl_Persistence_PacAclRoleResource filtered by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleResource findOneByFkAclResource(int $fk_acl_resource) Return the first ProjectA_Zed_Acl_Persistence_PacAclRoleResource filtered by the fk_acl_resource column
 *
 * @method array findByIdAclRoleResource(int $id_acl_role_resource) Return ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects filtered by the id_acl_role_resource column
 * @method array findByFkAclRole(int $fk_acl_role) Return ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects filtered by the fk_acl_role column
 * @method array findByFkAclResource(int $fk_acl_resource) Return ProjectA_Zed_Acl_Persistence_PacAclRoleResource objects filtered by the fk_acl_resource column
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.om
 */
abstract class Generated_Zed_Acl_Persistence_Om_BasePacAclRoleResourceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Om_BasePacAclRoleResourceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Acl_Persistence_PacAclRoleResource', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery();
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
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRoleResource|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleResource A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclRoleResource($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleResource A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_role_resource`, `fk_acl_role`, `fk_acl_resource` FROM `pac_acl_role_resource` WHERE `id_acl_role_resource` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_PacAclRoleResource();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResource|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRoleResource[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_role_resource column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclRoleResource(1234); // WHERE id_acl_role_resource = 1234
     * $query->filterByIdAclRoleResource(array(12, 34)); // WHERE id_acl_role_resource IN (12, 34)
     * $query->filterByIdAclRoleResource(array('min' => 12)); // WHERE id_acl_role_resource >= 12
     * $query->filterByIdAclRoleResource(array('max' => 12)); // WHERE id_acl_role_resource <= 12
     * </code>
     *
     * @param     mixed $idAclRoleResource The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function filterByIdAclRoleResource($idAclRoleResource = null, $comparison = null)
    {
        if (is_array($idAclRoleResource)) {
            $useMinMax = false;
            if (isset($idAclRoleResource['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $idAclRoleResource['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRoleResource['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $idAclRoleResource['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $idAclRoleResource, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_ROLE, $fkAclRole, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function filterByFkAclResource($fkAclResource = null, $comparison = null)
    {
        if (is_array($fkAclResource)) {
            $useMinMax = false;
            if (isset($fkAclResource['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_RESOURCE, $fkAclResource['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclResource['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_RESOURCE, $fkAclResource['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_RESOURCE, $fkAclResource, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRole|PropelObjectCollection $pacAclRole The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_ROLE, $pacAclRole->getIdAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_ROLE, $pacAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclResource($pacAclResource, $comparison = null)
    {
        if ($pacAclResource instanceof ProjectA_Zed_Acl_Persistence_PacAclResource) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_RESOURCE, $pacAclResource->getIdAclResource(), $comparison);
        } elseif ($pacAclResource instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::FK_ACL_RESOURCE, $pacAclResource->toKeyValue('PrimaryKey', 'IdAclResource'), $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRoleResource $pacAclRoleResource Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery The current query, for fluid interface
     */
    public function prune($pacAclRoleResource = null)
    {
        if ($pacAclRoleResource) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRoleResourcePeer::ID_ACL_ROLE_RESOURCE, $pacAclRoleResource->getIdAclRoleResource(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
