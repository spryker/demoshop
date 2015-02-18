<?php


/**
 * Base class that represents a query for the 'pac_acl_resource' table.
 *
 *
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByIdAclResource($order = Criteria::ASC) Order by the id_acl_resource column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByPattern($order = Criteria::ASC) Order by the pattern column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByFkAclGroup($order = Criteria::ASC) Order by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByBlackList($order = Criteria::ASC) Order by the black_list column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByIdAclResource() Group by the id_acl_resource column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByPattern() Group by the pattern column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByFkAclGroup() Group by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByBlackList() Group by the black_list column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery leftJoinAclGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclGroup relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery rightJoinAclGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclGroup relation
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery innerJoinAclGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AclGroup relation
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource matching the query
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource matching the query, or a new ProjectA_Zed_Acl_Persistence_Propel_PacAclResource object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByPattern(string $pattern) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the pattern column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByFkAclGroup(int $fk_acl_group) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the fk_acl_group column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByBlackList(boolean $black_list) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the black_list column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the is_deleted column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the created_at column
 * @method ProjectA_Zed_Acl_Persistence_Propel_PacAclResource findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Acl_Persistence_Propel_PacAclResource filtered by the updated_at column
 *
 * @method array findByIdAclResource(int $id_acl_resource) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the id_acl_resource column
 * @method array findByPattern(string $pattern) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the pattern column
 * @method array findByFkAclGroup(int $fk_acl_group) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the fk_acl_group column
 * @method array findByBlackList(boolean $black_list) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the black_list column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the is_deleted column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclResourceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclResourceQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAclResource']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclResource|ProjectA_Zed_Acl_Persistence_Propel_PacAclResource[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclResource A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAclResource($key, $con = null)
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
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclResource A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_acl_resource`, `pattern`, `fk_acl_group`, `black_list`, `is_deleted`, `created_at`, `updated_at` FROM `pac_acl_resource` WHERE `id_acl_resource` = :p0';
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
            $obj = new ProjectA_Zed_Acl_Persistence_Propel_PacAclResource();
            $obj->hydrate($row);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResource|ProjectA_Zed_Acl_Persistence_Propel_PacAclResource[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Acl_Persistence_Propel_PacAclResource[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_acl_resource column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAclResource(1234); // WHERE id_acl_resource = 1234
     * $query->filterByIdAclResource(array(12, 34)); // WHERE id_acl_resource IN (12, 34)
     * $query->filterByIdAclResource(array('min' => 12)); // WHERE id_acl_resource >= 12
     * $query->filterByIdAclResource(array('max' => 12)); // WHERE id_acl_resource <= 12
     * </code>
     *
     * @param     mixed $idAclResource The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByIdAclResource($idAclResource = null, $comparison = null)
    {
        if (is_array($idAclResource)) {
            $useMinMax = false;
            if (isset($idAclResource['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $idAclResource['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAclResource['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $idAclResource['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $idAclResource, $comparison);
    }

    /**
     * Filter the query on the pattern column
     *
     * Example usage:
     * <code>
     * $query->filterByPattern('fooValue');   // WHERE pattern = 'fooValue'
     * $query->filterByPattern('%fooValue%'); // WHERE pattern LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pattern The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByPattern($pattern = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pattern)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pattern)) {
                $pattern = str_replace('*', '%', $pattern);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::PATTERN, $pattern, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByFkAclGroup($fkAclGroup = null, $comparison = null)
    {
        if (is_array($fkAclGroup)) {
            $useMinMax = false;
            if (isset($fkAclGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::FK_ACL_GROUP, $fkAclGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::FK_ACL_GROUP, $fkAclGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::FK_ACL_GROUP, $fkAclGroup, $comparison);
    }

    /**
     * Filter the query on the black_list column
     *
     * Example usage:
     * <code>
     * $query->filterByBlackList(true); // WHERE black_list = true
     * $query->filterByBlackList('yes'); // WHERE black_list = true
     * </code>
     *
     * @param     boolean|string $blackList The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByBlackList($blackList = null, $comparison = null)
    {
        if (is_string($blackList)) {
            $blackList = in_array(strtolower($blackList), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::BLACK_LIST, $blackList, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup|PropelObjectCollection $pacAclGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclGroup($pacAclGroup, $comparison = null)
    {
        if ($pacAclGroup instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::FK_ACL_GROUP, $pacAclGroup->getIdAclGroup(), $comparison);
        } elseif ($pacAclGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::FK_ACL_GROUP, $pacAclGroup->toKeyValue('PrimaryKey', 'IdAclGroup'), $comparison);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclResource $pacAclResource Object to remove from the list of results
     *
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function prune($pacAclResource = null)
    {
        if ($pacAclResource) {
            $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::ID_ACL_RESOURCE, $pacAclResource->getIdAclResource(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Acl_Persistence_Propel_PacAclResourceQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclResourcePeer::CREATED_AT);
    }
}
