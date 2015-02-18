<?php


/**
 * Base class that represents a query for the 'pac_acl_user' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByIdAclUser($order = Criteria::ASC) Order by the id_acl_user column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByFkAclRole($order = Criteria::ASC) Order by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByRestorePasswordKey($order = Criteria::ASC) Order by the restore_password_key column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByFailedLogins($order = Criteria::ASC) Order by the failed_logins column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByIsNew($order = Criteria::ASC) Order by the is_new column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByIdAclUser() Group by the id_acl_user column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByFkAclRole() Group by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByFirstname() Group by the firstname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByLastname() Group by the lastname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByEmail() Group by the email column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByUsername() Group by the username column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByPassword() Group by the password column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByRestorePasswordKey() Group by the restore_password_key column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByLastLogin() Group by the last_login column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByFailedLogins() Group by the failed_logins column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByIsDefault() Group by the is_default column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByIsNew() Group by the is_new column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery leftJoinAclRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery rightJoinAclRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclRole relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery innerJoinAclRole($relationAlias = null) Adds a INNER JOIN clause to the query using the AclRole relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery leftJoinPacKendoGridState($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacKendoGridState relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery rightJoinPacKendoGridState($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacKendoGridState relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery innerJoinPacKendoGridState($relationAlias = null) Adds a INNER JOIN clause to the query using the PacKendoGridState relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery leftJoinOrderNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderNote relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery rightJoinOrderNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderNote relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery innerJoinOrderNote($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderNote relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser matching the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser matching the query, or a new ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByFkAclRole(int $fk_acl_role) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the fk_acl_role column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByFirstname(string $firstname) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the firstname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByLastname(string $lastname) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the lastname column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByEmail(string $email) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the email column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByUsername(string $username) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the username column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByPassword(string $password) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the password column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByRestorePasswordKey(string $restore_password_key) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the restore_password_key column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByLastLogin(string $last_login) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the last_login column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByFailedLogins(int $failed_logins) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the failed_logins column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByIsDefault(boolean $is_default) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the is_default column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByIsNew(boolean $is_new) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the is_new column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclUser findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclUser filtered by the updated_at column
 *
 * @method array findByIdAclUser(int $id_acl_user) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the id_acl_user column
 * @method array findByFkAclRole(int $fk_acl_role) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the fk_acl_role column
 * @method array findByFirstname(string $firstname) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the firstname column
 * @method array findByLastname(string $lastname) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the lastname column
 * @method array findByEmail(string $email) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the email column
 * @method array findByUsername(string $username) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the username column
 * @method array findByPassword(string $password) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the password column
 * @method array findByRestorePasswordKey(string $restore_password_key) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the restore_password_key column
 * @method array findByLastLogin(string $last_login) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the last_login column
 * @method array findByFailedLogins(int $failed_logins) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the failed_logins column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the is_deleted column
 * @method array findByIsDefault(boolean $is_default) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the is_default column
 * @method array findByIsNew(boolean $is_new) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the is_new column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAclUser']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclUser|ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclUser($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_user`, `fk_acl_role`, `firstname`, `lastname`, `email`, `username`, `password`, `restore_password_key`, `last_login`, `failed_logins`, `is_deleted`, `is_default`, `is_new`, `created_at`, `updated_at` FROM `pac_acl_user` WHERE `id_acl_user` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_Propel_PacAclUser();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser|ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclUser(1234); // WHERE id_acl_user = 1234
     * $query->filterByIdAclUser(array(12, 34)); // WHERE id_acl_user IN (12, 34)
     * $query->filterByIdAclUser(array('min' => 12)); // WHERE id_acl_user >= 12
     * $query->filterByIdAclUser(array('max' => 12)); // WHERE id_acl_user <= 12
     * </code>
     *
     * @param     mixed $idAclUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByIdAclUser($idAclUser = null, $comparison = null)
    {
        if (is_array($idAclUser)) {
            $useMinMax = false;
            if (isset($idAclUser['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $idAclUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclUser['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $idAclUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $idAclUser, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByFkAclRole($fkAclRole = null, $comparison = null)
    {
        if (is_array($fkAclRole)) {
            $useMinMax = false;
            if (isset($fkAclRole['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, $fkAclRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclRole['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, $fkAclRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, $fkAclRole, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the restore_password_key column
     *
     * Example usage:
     * <code>
     * $query->filterByRestorePasswordKey('fooValue');   // WHERE restore_password_key = 'fooValue'
     * $query->filterByRestorePasswordKey('%fooValue%'); // WHERE restore_password_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $restorePasswordKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByRestorePasswordKey($restorePasswordKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restorePasswordKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $restorePasswordKey)) {
                $restorePasswordKey = str_replace('*', '%', $restorePasswordKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::RESTORE_PASSWORD_KEY, $restorePasswordKey, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login < '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Filter the query on the failed_logins column
     *
     * Example usage:
     * <code>
     * $query->filterByFailedLogins(1234); // WHERE failed_logins = 1234
     * $query->filterByFailedLogins(array(12, 34)); // WHERE failed_logins IN (12, 34)
     * $query->filterByFailedLogins(array('min' => 12)); // WHERE failed_logins >= 12
     * $query->filterByFailedLogins(array('max' => 12)); // WHERE failed_logins <= 12
     * </code>
     *
     * @param     mixed $failedLogins The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByFailedLogins($failedLogins = null, $comparison = null)
    {
        if (is_array($failedLogins)) {
            $useMinMax = false;
            if (isset($failedLogins['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS, $failedLogins['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($failedLogins['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS, $failedLogins['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS, $failedLogins, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the is_default column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDefault(true); // WHERE is_default = true
     * $query->filterByIsDefault('yes'); // WHERE is_default = true
     * </code>
     *
     * @param     boolean|string $isDefault The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByIsDefault($isDefault = null, $comparison = null)
    {
        if (is_string($isDefault)) {
            $isDefault = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DEFAULT, $isDefault, $comparison);
    }

    /**
     * Filter the query on the is_new column
     *
     * Example usage:
     * <code>
     * $query->filterByIsNew(true); // WHERE is_new = true
     * $query->filterByIsNew('yes'); // WHERE is_new = true
     * </code>
     *
     * @param     boolean|string $isNew The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByIsNew($isNew = null, $comparison = null)
    {
        if (is_string($isNew)) {
            $isNew = in_array(strtolower($isNew), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_NEW, $isNew, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclRole object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclRole|PropelObjectCollection $pacAclRole The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclRole($pacAclRole, $comparison = null)
    {
        if ($pacAclRole instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclRole) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, $pacAclRole->getIdAclRole(), $comparison);
        } elseif ($pacAclRole instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, $pacAclRole->toKeyValue('PrimaryKey', 'IdAclRole'), $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState object
     *
     * @param   ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState|PropelObjectCollection $pacKendoGridState  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacKendoGridState($pacKendoGridState, $comparison = null)
    {
        if ($pacKendoGridState instanceof ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pacKendoGridState->getFkAclUser(), $comparison);
        } elseif ($pacKendoGridState instanceof PropelObjectCollection) {
            return $this
                ->usePacKendoGridStateQuery()
                ->filterByPrimaryKeys($pacKendoGridState->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacKendoGridState() only accepts arguments of type ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridState or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacKendoGridState relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function joinPacKendoGridState($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacKendoGridState');

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
            $this->addJoinObject($join, 'PacKendoGridState');
        }

        return $this;
    }

    /**
     * Use the PacKendoGridState relation PacKendoGridState object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery A secondary query class using the current class as primary query
     */
    public function usePacKendoGridStateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacKendoGridState($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacKendoGridState', 'ProjectA_Zed_Kendo_Persistence_Propel_PacKendoGridStateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog|PropelObjectCollection $pacOmsTransitionLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTransitionLog($pacOmsTransitionLog, $comparison = null)
    {
        if ($pacOmsTransitionLog instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pacOmsTransitionLog->getFkAclUser(), $comparison);
        } elseif ($pacOmsTransitionLog instanceof PropelObjectCollection) {
            return $this
                ->useTransitionLogQuery()
                ->filterByPrimaryKeys($pacOmsTransitionLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransitionLog() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransitionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function joinTransitionLog($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransitionLog');

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
            $this->addJoinObject($join, 'TransitionLog');
        }

        return $this;
    }

    /**
     * Use the TransitionLog relation PacOmsTransitionLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery A secondary query class using the current class as primary query
     */
    public function useTransitionLogQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTransitionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransitionLog', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote|PropelObjectCollection $pacSalesOrderNote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderNote($pacSalesOrderNote, $comparison = null)
    {
        if ($pacSalesOrderNote instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pacSalesOrderNote->getFkAclUser(), $comparison);
        } elseif ($pacSalesOrderNote instanceof PropelObjectCollection) {
            return $this
                ->useOrderNoteQuery()
                ->filterByPrimaryKeys($pacSalesOrderNote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderNote() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderNote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function joinOrderNote($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderNote');

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
            $this->addJoinObject($join, 'OrderNote');
        }

        return $this;
    }

    /**
     * Use the OrderNote relation PacSalesOrderNote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNoteQuery A secondary query class using the current class as primary query
     */
    public function useOrderNoteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrderNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderNote', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNoteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $pacAclUser Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function prune($pacAclUser = null)
    {
        if ($pacAclUser) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pacAclUser->getIdAclUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT);
    }
}
