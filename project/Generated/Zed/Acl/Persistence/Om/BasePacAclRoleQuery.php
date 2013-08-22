<?php


/**
 * Base class that represents a query for the 'pac_acl_role' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByIdAclRole($order = Criteria::ASC) Order by the id_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByIsDeleteable($order = Criteria::ASC) Order by the is_deleteable column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByIsAdmin($order = Criteria::ASC) Order by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByIdAclRole() Group by the id_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByIsDeleteable() Group by the is_deleteable column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByIsAdmin() Group by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoinAclParentRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclParentRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoinAclParentRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclParentRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoinAclParentRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclParentRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoinPacAclRoleRelatedByIdAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacAclRoleRelatedByIdAclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoinPacAclRoleRelatedByIdAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacAclRoleRelatedByIdAclRole relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoinPacAclRoleRelatedByIdAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the PacAclRoleRelatedByIdAclRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoinAclUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoinAclUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoinAclUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUser relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoinAclRoleResource($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRoleResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoinAclRoleResource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRoleResource relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoinAclRoleResource($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRoleResource relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery leftJoinAclRolePrivilege($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRolePrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery rightJoinAclRolePrivilege($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRolePrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_PacAclRoleQuery innerJoinAclRolePrivilege($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRolePrivilege relation
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole matching the query
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole matching the query, or a new ProjectA_Zed_Acl_Persistence_PacAclRole object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByFkAclRole(int $fk_acl_role) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByName(string $name) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the name column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByIsDeleteable(boolean $is_deleteable) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the is_deleteable column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByIsAdmin(boolean $is_admin) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_PacAclRole findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Acl_Persistence_PacAclRole filtered by the updated_at column
 *
 * @method array findByIdAclRole(int $id_acl_role) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the id_acl_role column
 * @method array findByFkAclRole(int $fk_acl_role) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the fk_acl_role column
 * @method array findByName(string $name) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the name column
 * @method array findByIsDeleteable(boolean $is_deleteable) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the is_deleteable column
 * @method array findByIsAdmin(boolean $is_admin) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the is_admin column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Acl_Persistence_PacAclRole objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.om
 */
abstract class Generated_Zed_Acl_Persistence_Om_BasePacAclRoleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Om_BasePacAclRoleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Acl_Persistence_PacAclRole', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_PacAclRoleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRoleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_PacAclRoleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_PacAclRoleQuery();
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
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRole|ProjectA_Zed_Acl_Persistence_PacAclRole[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_PacAclRolePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRole A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclRole($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRole A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_role`, `fk_acl_role`, `name`, `is_deleteable`, `is_admin`, `created_at`, `updated_at` FROM `pac_acl_role` WHERE `id_acl_role` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_PacAclRole();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_PacAclRolePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRole|ProjectA_Zed_Acl_Persistence_PacAclRole[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_PacAclRole[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclRole(1234); // WHERE id_acl_role = 1234
     * $query->filterByIdAclRole(array(12, 34)); // WHERE id_acl_role IN (12, 34)
     * $query->filterByIdAclRole(array('min' => 12)); // WHERE id_acl_role >= 12
     * $query->filterByIdAclRole(array('max' => 12)); // WHERE id_acl_role <= 12
     * </code>
     *
     * @param     mixed $idAclRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIdAclRole($idAclRole = null, $comparison = null)
    {
        if (is_array($idAclRole)) {
            $useMinMax = false;
            if (isset($idAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $idAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $idAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $idAclRole, $comparison);
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
     * @see       filterByAclParentRole()
     *
     * @param     mixed $fkAclRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::FK_ACL_ROLE, $fkAclRole, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_deleteable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleteable(true); // WHERE is_deleteable = true
     * $query->filterByIsDeleteable('yes'); // WHERE is_deleteable = true
     * </code>
     *
     * @param     boolean|string $isDeleteable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIsDeleteable($isDeleteable = null, $comparison = null)
    {
        if (is_string($isDeleteable)) {
            $isDeleteable = in_array(strtolower($isDeleteable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::IS_DELETEABLE, $isDeleteable, $comparison);
    }

    /**
     * Filter the query on the is_admin column
     *
     * Example usage:
     * <code>
     * $query->filterByIsAdmin(true); // WHERE is_admin = true
     * $query->filterByIsAdmin('yes'); // WHERE is_admin = true
     * </code>
     *
     * @param     boolean|string $isAdmin The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIsAdmin($isAdmin = null, $comparison = null)
    {
        if (is_string($isAdmin)) {
            $isAdmin = in_array(strtolower($isAdmin), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::IS_ADMIN, $isAdmin, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRole|PropelObjectCollection $pacAclRole The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclParentRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::FK_ACL_ROLE, $pacAclRole->getIdAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::FK_ACL_ROLE, $pacAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
        } else {
            throw new PropelException('filterByAclParentRole() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclParentRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function joinAclParentRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclParentRole');

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
            $this->addJoinObject($join, 'AclParentRole');
        }

        return $this;
    }

    /**
     * Use the AclParentRole relation PacAclRole object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRoleQuery A secondary query class using the current class as primary query
     */
    public function useAclParentRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAclParentRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclParentRole', 'ProjectA_Zed_Acl_Persistence_PacAclRoleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRole|PropelObjectCollection $pacAclRole  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacAclRoleRelatedByIdAclRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $pacAclRole->getFkAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            return $this
                ->usePacAclRoleRelatedByIdAclRoleQuery()
                ->filterByPrimaryKeys($pacAclRole->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacAclRoleRelatedByIdAclRole() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacAclRoleRelatedByIdAclRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function joinPacAclRoleRelatedByIdAclRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacAclRoleRelatedByIdAclRole');

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
            $this->addJoinObject($join, 'PacAclRoleRelatedByIdAclRole');
        }

        return $this;
    }

    /**
     * Use the PacAclRoleRelatedByIdAclRole relation PacAclRole object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRoleQuery A secondary query class using the current class as primary query
     */
    public function usePacAclRoleRelatedByIdAclRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacAclRoleRelatedByIdAclRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacAclRoleRelatedByIdAclRole', 'ProjectA_Zed_Acl_Persistence_PacAclRoleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclUser|PropelObjectCollection $pacAclUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUser($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $pacAclUser->getFkAclRole(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            return $this
                ->useAclUserQuery()
                ->filterByPrimaryKeys($pacAclUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclUser() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function joinAclUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclUser');

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
            $this->addJoinObject($join, 'AclUser');
        }

        return $this;
    }

    /**
     * Use the AclUser relation PacAclUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUser', 'ProjectA_Zed_Acl_Persistence_PacAclUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRoleResource object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRoleResource|PropelObjectCollection $pacAclRoleResource  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRoleResource($pacAclRoleResource, $comparison = null)
    {
        if ($pacAclRoleResource instanceof ProjectA_Zed_Acl_Persistence_PacAclRoleResource) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $pacAclRoleResource->getFkAclRole(), $comparison);
        } elseif ($pacAclRoleResource instanceof PropelObjectCollection) {
            return $this
                ->useAclRoleResourceQuery()
                ->filterByPrimaryKeys($pacAclRoleResource->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclRoleResource() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclRoleResource or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclRoleResource relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function joinAclRoleResource($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclRoleResource');

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
            $this->addJoinObject($join, 'AclRoleResource');
        }

        return $this;
    }

    /**
     * Use the AclRoleResource relation PacAclRoleResource object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery A secondary query class using the current class as primary query
     */
    public function useAclRoleResourceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclRoleResource($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclRoleResource', 'ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege|PropelObjectCollection $pacAclRolePrivilege  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRolePrivilege($pacAclRolePrivilege, $comparison = null)
    {
        if ($pacAclRolePrivilege instanceof ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $pacAclRolePrivilege->getFkAclRole(), $comparison);
        } elseif ($pacAclRolePrivilege instanceof PropelObjectCollection) {
            return $this
                ->useAclRolePrivilegeQuery()
                ->filterByPrimaryKeys($pacAclRolePrivilege->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclRolePrivilege() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclRolePrivilege relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function joinAclRolePrivilege($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclRolePrivilege');

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
            $this->addJoinObject($join, 'AclRolePrivilege');
        }

        return $this;
    }

    /**
     * Use the AclRolePrivilege relation PacAclRolePrivilege object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery A secondary query class using the current class as primary query
     */
    public function useAclRolePrivilegeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclRolePrivilege($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclRolePrivilege', 'ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclRole $pacAclRole Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function prune($pacAclRole = null)
    {
        if ($pacAclRole) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::ID_ACL_ROLE, $pacAclRole->getIdAclRole(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_PacAclRoleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::CREATED_AT);
    }
}
