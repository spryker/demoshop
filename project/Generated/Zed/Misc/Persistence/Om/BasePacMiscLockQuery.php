<?php


/**
 * Base class that represents a query for the 'pac_misc_lock' table.
 *
 *
 *
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByIdMiscLock($order = Criteria::ASC) Order by the id_misc_lock column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByResource($order = Criteria::ASC) Order by the resource column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByExpiresAt($order = Criteria::ASC) Order by the expires_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByIdMiscLock() Group by the id_misc_lock column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByUid() Group by the uid column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByResource() Group by the resource column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByExpiresAt() Group by the expires_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock matching the query
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock matching the query, or a new ProjectA_Zed_Misc_Persistence_PacMiscLock object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneByUid(string $uid) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock filtered by the uid column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneByResource(string $resource) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock filtered by the resource column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneByExpiresAt(string $expires_at) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock filtered by the expires_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock filtered by the created_at column
 * @method ProjectA_Zed_Misc_Persistence_PacMiscLock findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Misc_Persistence_PacMiscLock filtered by the updated_at column
 *
 * @method array findByIdMiscLock(int $id_misc_lock) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the id_misc_lock column
 * @method array findByUid(string $uid) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the uid column
 * @method array findByResource(string $resource) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the resource column
 * @method array findByExpiresAt(string $expires_at) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the expires_at column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Misc_Persistence_PacMiscLock objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/infrastructure-package/ProjectA/Zed/Misc/Persistence.om
 */
abstract class Generated_Zed_Misc_Persistence_Om_BasePacMiscLockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Misc_Persistence_Om_BasePacMiscLockQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Misc_Persistence_PacMiscLock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Misc_Persistence_PacMiscLockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Misc_Persistence_PacMiscLockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Misc_Persistence_PacMiscLockQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Misc_Persistence_PacMiscLockQuery();
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
     * @return   ProjectA_Zed_Misc_Persistence_PacMiscLock|ProjectA_Zed_Misc_Persistence_PacMiscLock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Misc_Persistence_PacMiscLock A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMiscLock($key, $con = null)
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
     * @return                 ProjectA_Zed_Misc_Persistence_PacMiscLock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_misc_lock`, `uid`, `resource`, `expires_at`, `created_at`, `updated_at` FROM `pac_misc_lock` WHERE `id_misc_lock` = :p0';
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
            $obj = new ProjectA_Zed_Misc_Persistence_PacMiscLock();
            $obj->hydrate($row);
            ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLock|ProjectA_Zed_Misc_Persistence_PacMiscLock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Misc_Persistence_PacMiscLock[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_misc_lock column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMiscLock(1234); // WHERE id_misc_lock = 1234
     * $query->filterByIdMiscLock(array(12, 34)); // WHERE id_misc_lock IN (12, 34)
     * $query->filterByIdMiscLock(array('min' => 12)); // WHERE id_misc_lock >= 12
     * $query->filterByIdMiscLock(array('max' => 12)); // WHERE id_misc_lock <= 12
     * </code>
     *
     * @param     mixed $idMiscLock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByIdMiscLock($idMiscLock = null, $comparison = null)
    {
        if (is_array($idMiscLock)) {
            $useMinMax = false;
            if (isset($idMiscLock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $idMiscLock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMiscLock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $idMiscLock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $idMiscLock, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%'); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uid)) {
                $uid = str_replace('*', '%', $uid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UID, $uid, $comparison);
    }

    /**
     * Filter the query on the resource column
     *
     * Example usage:
     * <code>
     * $query->filterByResource('fooValue');   // WHERE resource = 'fooValue'
     * $query->filterByResource('%fooValue%'); // WHERE resource LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resource The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByResource($resource = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resource)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $resource)) {
                $resource = str_replace('*', '%', $resource);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::RESOURCE, $resource, $comparison);
    }

    /**
     * Filter the query on the expires_at column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiresAt('2011-03-14'); // WHERE expires_at = '2011-03-14'
     * $query->filterByExpiresAt('now'); // WHERE expires_at = '2011-03-14'
     * $query->filterByExpiresAt(array('max' => 'yesterday')); // WHERE expires_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiresAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByExpiresAt($expiresAt = null, $comparison = null)
    {
        if (is_array($expiresAt)) {
            $useMinMax = false;
            if (isset($expiresAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::EXPIRES_AT, $expiresAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiresAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::EXPIRES_AT, $expiresAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::EXPIRES_AT, $expiresAt, $comparison);
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Misc_Persistence_PacMiscLock $pacMiscLock Object to remove from the list of results
     *
     * @return ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function prune($pacMiscLock = null)
    {
        if ($pacMiscLock) {
            $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::ID_MISC_LOCK, $pacMiscLock->getIdMiscLock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Misc_Persistence_PacMiscLockQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Misc_Persistence_PacMiscLockPeer::CREATED_AT);
    }
}
