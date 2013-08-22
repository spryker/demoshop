<?php


/**
 * Base class that represents a query for the 'pac_tracking_instance_revision' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByIdTrackingInstanceRevision($order = Criteria::ASC) Order by the id_tracking_instance_revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByIsGlobal($order = Criteria::ASC) Order by the is_global column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByRevision($order = Criteria::ASC) Order by the revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByFkTrackingInstance($order = Criteria::ASC) Order by the fk_tracking_instance column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByConfig($order = Criteria::ASC) Order by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByIdTrackingInstanceRevision() Group by the id_tracking_instance_revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByIsGlobal() Group by the is_global column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByRevision() Group by the revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByFkTrackingInstance() Group by the fk_tracking_instance column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByConfig() Group by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByCode() Group by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery leftJoinTrackingInstance($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery rightJoinTrackingInstance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery innerJoinTrackingInstance($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingInstance relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery leftJoinTrackingPageTypeHasInstanceRevision($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPageTypeHasInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery rightJoinTrackingPageTypeHasInstanceRevision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPageTypeHasInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery innerJoinTrackingPageTypeHasInstanceRevision($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPageTypeHasInstanceRevision relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByIsGlobal(boolean $is_global) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the is_global column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByRevision(int $revision) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the revision column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByFkTrackingInstance(int $fk_tracking_instance) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the fk_tracking_instance column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByConfig(string $config) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByCode(string $code) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision filtered by the updated_at column
 *
 * @method array findByIdTrackingInstanceRevision(int $id_tracking_instance_revision) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the id_tracking_instance_revision column
 * @method array findByIsGlobal(boolean $is_global) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the is_global column
 * @method array findByRevision(int $revision) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the revision column
 * @method array findByFkTrackingInstance(int $fk_tracking_instance) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the fk_tracking_instance column
 * @method array findByConfig(string $config) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the config column
 * @method array findByCode(string $code) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the code column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingInstanceRevisionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingInstanceRevisionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision|ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingInstanceRevision($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_instance_revision`, `is_global`, `revision`, `fk_tracking_instance`, `config`, `code`, `created_at`, `updated_at` FROM `pac_tracking_instance_revision` WHERE `id_tracking_instance_revision` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision|ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_instance_revision column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingInstanceRevision(1234); // WHERE id_tracking_instance_revision = 1234
     * $query->filterByIdTrackingInstanceRevision(array(12, 34)); // WHERE id_tracking_instance_revision IN (12, 34)
     * $query->filterByIdTrackingInstanceRevision(array('min' => 12)); // WHERE id_tracking_instance_revision >= 12
     * $query->filterByIdTrackingInstanceRevision(array('max' => 12)); // WHERE id_tracking_instance_revision <= 12
     * </code>
     *
     * @param     mixed $idTrackingInstanceRevision The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByIdTrackingInstanceRevision($idTrackingInstanceRevision = null, $comparison = null)
    {
        if (is_array($idTrackingInstanceRevision)) {
            $useMinMax = false;
            if (isset($idTrackingInstanceRevision['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $idTrackingInstanceRevision['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingInstanceRevision['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $idTrackingInstanceRevision['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $idTrackingInstanceRevision, $comparison);
    }

    /**
     * Filter the query on the is_global column
     *
     * Example usage:
     * <code>
     * $query->filterByIsGlobal(true); // WHERE is_global = true
     * $query->filterByIsGlobal('yes'); // WHERE is_global = true
     * </code>
     *
     * @param     boolean|string $isGlobal The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByIsGlobal($isGlobal = null, $comparison = null)
    {
        if (is_string($isGlobal)) {
            $isGlobal = in_array(strtolower($isGlobal), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::IS_GLOBAL, $isGlobal, $comparison);
    }

    /**
     * Filter the query on the revision column
     *
     * Example usage:
     * <code>
     * $query->filterByRevision(1234); // WHERE revision = 1234
     * $query->filterByRevision(array(12, 34)); // WHERE revision IN (12, 34)
     * $query->filterByRevision(array('min' => 12)); // WHERE revision >= 12
     * $query->filterByRevision(array('max' => 12)); // WHERE revision <= 12
     * </code>
     *
     * @param     mixed $revision The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByRevision($revision = null, $comparison = null)
    {
        if (is_array($revision)) {
            $useMinMax = false;
            if (isset($revision['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::REVISION, $revision['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($revision['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::REVISION, $revision['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::REVISION, $revision, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_instance column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingInstance(1234); // WHERE fk_tracking_instance = 1234
     * $query->filterByFkTrackingInstance(array(12, 34)); // WHERE fk_tracking_instance IN (12, 34)
     * $query->filterByFkTrackingInstance(array('min' => 12)); // WHERE fk_tracking_instance >= 12
     * $query->filterByFkTrackingInstance(array('max' => 12)); // WHERE fk_tracking_instance <= 12
     * </code>
     *
     * @see       filterByTrackingInstance()
     *
     * @param     mixed $fkTrackingInstance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByFkTrackingInstance($fkTrackingInstance = null, $comparison = null)
    {
        if (is_array($fkTrackingInstance)) {
            $useMinMax = false;
            if (isset($fkTrackingInstance['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingInstance['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::FK_TRACKING_INSTANCE, $fkTrackingInstance, $comparison);
    }

    /**
     * Filter the query on the config column
     *
     * Example usage:
     * <code>
     * $query->filterByConfig('fooValue');   // WHERE config = 'fooValue'
     * $query->filterByConfig('%fooValue%'); // WHERE config LIKE '%fooValue%'
     * </code>
     *
     * @param     string $config The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByConfig($config = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($config)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $config)) {
                $config = str_replace('*', '%', $config);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CONFIG, $config, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CODE, $code, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingInstance object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstance|PropelObjectCollection $pacTrackingInstance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingInstance($pacTrackingInstance, $comparison = null)
    {
        if ($pacTrackingInstance instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstance) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::FK_TRACKING_INSTANCE, $pacTrackingInstance->getIdTrackingInstance(), $comparison);
        } elseif ($pacTrackingInstance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::FK_TRACKING_INSTANCE, $pacTrackingInstance->toKeyValue('PrimaryKey', 'IdTrackingInstance'), $comparison);
        } else {
            throw new PropelException('filterByTrackingInstance() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingInstance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingInstance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function joinTrackingInstance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingInstance');

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
            $this->addJoinObject($join, 'TrackingInstance');
        }

        return $this;
    }

    /**
     * Use the TrackingInstance relation PacTrackingInstance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery A secondary query class using the current class as primary query
     */
    public function useTrackingInstanceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingInstance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision|PropelObjectCollection $pacTrackingPageTypeHasInstanceRevision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPageTypeHasInstanceRevision($pacTrackingPageTypeHasInstanceRevision, $comparison = null)
    {
        if ($pacTrackingPageTypeHasInstanceRevision instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $pacTrackingPageTypeHasInstanceRevision->getFkTrackingInstanceRevision(), $comparison);
        } elseif ($pacTrackingPageTypeHasInstanceRevision instanceof PropelObjectCollection) {
            return $this
                ->useTrackingPageTypeHasInstanceRevisionQuery()
                ->filterByPrimaryKeys($pacTrackingPageTypeHasInstanceRevision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingPageTypeHasInstanceRevision() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPageTypeHasInstanceRevision relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function joinTrackingPageTypeHasInstanceRevision($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPageTypeHasInstanceRevision');

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
            $this->addJoinObject($join, 'TrackingPageTypeHasInstanceRevision');
        }

        return $this;
    }

    /**
     * Use the TrackingPageTypeHasInstanceRevision relation PacTrackingPageTypeHasInstanceRevision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPageTypeHasInstanceRevisionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPageTypeHasInstanceRevision($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPageTypeHasInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevisionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision $pacTrackingInstanceRevision Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function prune($pacTrackingInstanceRevision = null)
    {
        if ($pacTrackingInstanceRevision) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::ID_TRACKING_INSTANCE_REVISION, $pacTrackingInstanceRevision->getIdTrackingInstanceRevision(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionPeer::CREATED_AT);
    }
}
