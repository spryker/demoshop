<?php


/**
 * Base class that represents a query for the 'pac_acl_role' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByIdAclRole($order = Criteria::ASC) Order by the id_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByIsDeletable($order = Criteria::ASC) Order by the is_deletable column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByIsAdmin($order = Criteria::ASC) Order by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByIdAclRole() Group by the id_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByIsDeletable() Group by the is_deletable column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByIsAdmin() Group by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery leftJoinAclUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery rightJoinAclUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery innerJoinAclUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUser relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery leftJoinAclGroupPrivilege($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclGroupPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery rightJoinAclGroupPrivilege($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclGroupPrivilege relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery innerJoinAclGroupPrivilege($relationAlias = null) Adds a INNER JOIN clause to the query using the AclGroupPrivilege relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole matching the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole matching the query, or a new ProjectA_Zed_Acl_Persistence_Propel_PacAclRole object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByName(string $name) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the name column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByIsDeletable(boolean $is_deletable) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the is_deletable column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByIsAdmin(boolean $is_admin) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the is_admin column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclRole findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclRole filtered by the updated_at column
 *
 * @method array findByIdAclRole(int $id_acl_role) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the id_acl_role column
 * @method array findByName(string $name) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the name column
 * @method array findByIsDeletable(boolean $is_deletable) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the is_deletable column
 * @method array findByIsAdmin(boolean $is_admin) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the is_admin column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclRoleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclRoleQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAclRole']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclRole|ProjectA_Zed_Acl_Persistence_Propel_PacAclRole[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclRole A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclRole A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_role`, `name`, `is_deletable`, `is_admin`, `is_deleted`, `created_at`, `updated_at` FROM `pac_acl_role` WHERE `id_acl_role` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_Propel_PacAclRole();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRole|ProjectA_Zed_Acl_Persistence_Propel_PacAclRole[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclRole[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $keys, Criteria::IN);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIdAclRole($idAclRole = null, $comparison = null)
    {
        if (is_array($idAclRole)) {
            $useMinMax = false;
            if (isset($idAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $idAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $idAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $idAclRole, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_deletable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeletable(true); // WHERE is_deletable = true
     * $query->filterByIsDeletable('yes'); // WHERE is_deletable = true
     * </code>
     *
     * @param     boolean|string $isDeletable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIsDeletable($isDeletable = null, $comparison = null)
    {
        if (is_string($isDeletable)) {
            $isDeletable = in_array(strtolower($isDeletable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETABLE, $isDeletable, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIsAdmin($isAdmin = null, $comparison = null)
    {
        if (is_string($isAdmin)) {
            $isAdmin = in_array(strtolower($isAdmin), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_ADMIN, $isAdmin, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclUser|PropelObjectCollection $pacAclUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUser($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $pacAclUser->getFkAclRole(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            return $this
                ->useAclUserQuery()
                ->filterByPrimaryKeys($pacAclUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAclUser() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUser', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege|PropelObjectCollection $pacAclGroupPrivilege  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclGroupPrivilege($pacAclGroupPrivilege, $comparison = null)
    {
        if ($pacAclGroupPrivilege instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroupPrivilege) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $pacAclGroupPrivilege->getFkAclRole(), $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclRole $pacAclRole Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function prune($pacAclRole = null)
    {
        if ($pacAclRole) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $pacAclRole->getIdAclRole(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclRoleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::CREATED_AT);
    }
}
