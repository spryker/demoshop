<?php


/**
 * Base class that represents a query for the 'pac_tracking_instance' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByIdTrackingInstance($order = Criteria::ASC) Order by the id_tracking_instance column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByFkTrackingLibraryCode($order = Criteria::ASC) Order by the fk_tracking_library_code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByIdTrackingInstance() Group by the id_tracking_instance column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByFkTrackingLibraryCode() Group by the fk_tracking_library_code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery leftJoinTrackingLibraryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingLibraryCode relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery rightJoinTrackingLibraryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingLibraryCode relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery innerJoinTrackingLibraryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingLibraryCode relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery leftJoinPacMcmRelation($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMcmRelation relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery rightJoinPacMcmRelation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMcmRelation relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery innerJoinPacMcmRelation($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMcmRelation relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery leftJoinTrackingInstanceRevision($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery rightJoinTrackingInstanceRevision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingInstanceRevision relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery innerJoinTrackingInstanceRevision($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingInstanceRevision relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery leftJoinTrackingPageExclusivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPageExclusivity relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery rightJoinTrackingPageExclusivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPageExclusivity relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery innerJoinTrackingPageExclusivity($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPageExclusivity relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingInstance object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneByFkTrackingLibraryCode(int $fk_tracking_library_code) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance filtered by the fk_tracking_library_code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneByName(string $name) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance filtered by the name column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance filtered by the is_active column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance filtered by the created_at column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingInstance findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingInstance filtered by the updated_at column
 *
 * @method array findByIdTrackingInstance(int $id_tracking_instance) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the id_tracking_instance column
 * @method array findByFkTrackingLibraryCode(int $fk_tracking_library_code) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the fk_tracking_library_code column
 * @method array findByName(string $name) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the name column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the is_active column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingInstanceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingInstanceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstance|ProjectA_Zed_Tracking_Persistence_PacTrackingInstance[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstance A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingInstance($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstance A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_instance`, `fk_tracking_library_code`, `name`, `is_active`, `created_at`, `updated_at` FROM `pac_tracking_instance` WHERE `id_tracking_instance` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingInstance();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstance|ProjectA_Zed_Tracking_Persistence_PacTrackingInstance[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingInstance[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_instance column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingInstance(1234); // WHERE id_tracking_instance = 1234
     * $query->filterByIdTrackingInstance(array(12, 34)); // WHERE id_tracking_instance IN (12, 34)
     * $query->filterByIdTrackingInstance(array('min' => 12)); // WHERE id_tracking_instance >= 12
     * $query->filterByIdTrackingInstance(array('max' => 12)); // WHERE id_tracking_instance <= 12
     * </code>
     *
     * @param     mixed $idTrackingInstance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByIdTrackingInstance($idTrackingInstance = null, $comparison = null)
    {
        if (is_array($idTrackingInstance)) {
            $useMinMax = false;
            if (isset($idTrackingInstance['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $idTrackingInstance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingInstance['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $idTrackingInstance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $idTrackingInstance, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_library_code column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingLibraryCode(1234); // WHERE fk_tracking_library_code = 1234
     * $query->filterByFkTrackingLibraryCode(array(12, 34)); // WHERE fk_tracking_library_code IN (12, 34)
     * $query->filterByFkTrackingLibraryCode(array('min' => 12)); // WHERE fk_tracking_library_code >= 12
     * $query->filterByFkTrackingLibraryCode(array('max' => 12)); // WHERE fk_tracking_library_code <= 12
     * </code>
     *
     * @see       filterByTrackingLibraryCode()
     *
     * @param     mixed $fkTrackingLibraryCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByFkTrackingLibraryCode($fkTrackingLibraryCode = null, $comparison = null)
    {
        if (is_array($fkTrackingLibraryCode)) {
            $useMinMax = false;
            if (isset($fkTrackingLibraryCode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $fkTrackingLibraryCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingLibraryCode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $fkTrackingLibraryCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $fkTrackingLibraryCode, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::IS_ACTIVE, $isActive, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode|PropelObjectCollection $pacTrackingLibraryCode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingLibraryCode($pacTrackingLibraryCode, $comparison = null)
    {
        if ($pacTrackingLibraryCode instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $pacTrackingLibraryCode->getIdTrackingLibraryCode(), $comparison);
        } elseif ($pacTrackingLibraryCode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::FK_TRACKING_LIBRARY_CODE, $pacTrackingLibraryCode->toKeyValue('PrimaryKey', 'IdTrackingLibraryCode'), $comparison);
        } else {
            throw new PropelException('filterByTrackingLibraryCode() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingLibraryCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function joinTrackingLibraryCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingLibraryCode');

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
            $this->addJoinObject($join, 'TrackingLibraryCode');
        }

        return $this;
    }

    /**
     * Use the TrackingLibraryCode relation PacTrackingLibraryCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingLibraryCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingLibraryCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingLibraryCode', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmRelation object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmRelation|PropelObjectCollection $pacMcmRelation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMcmRelation($pacMcmRelation, $comparison = null)
    {
        if ($pacMcmRelation instanceof ProjectA_Zed_Mcm_Persistence_PacMcmRelation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $pacMcmRelation->getFkTrackingInstance(), $comparison);
        } elseif ($pacMcmRelation instanceof PropelObjectCollection) {
            return $this
                ->usePacMcmRelationQuery()
                ->filterByPrimaryKeys($pacMcmRelation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMcmRelation() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmRelation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMcmRelation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function joinPacMcmRelation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMcmRelation');

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
            $this->addJoinObject($join, 'PacMcmRelation');
        }

        return $this;
    }

    /**
     * Use the PacMcmRelation relation PacMcmRelation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmRelationQuery A secondary query class using the current class as primary query
     */
    public function usePacMcmRelationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMcmRelation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMcmRelation', 'ProjectA_Zed_Mcm_Persistence_PacMcmRelationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision|PropelObjectCollection $pacTrackingInstanceRevision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingInstanceRevision($pacTrackingInstanceRevision, $comparison = null)
    {
        if ($pacTrackingInstanceRevision instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $pacTrackingInstanceRevision->getFkTrackingInstance(), $comparison);
        } elseif ($pacTrackingInstanceRevision instanceof PropelObjectCollection) {
            return $this
                ->useTrackingInstanceRevisionQuery()
                ->filterByPrimaryKeys($pacTrackingInstanceRevision->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingInstanceRevision() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingInstanceRevision relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function joinTrackingInstanceRevision($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingInstanceRevision');

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
            $this->addJoinObject($join, 'TrackingInstanceRevision');
        }

        return $this;
    }

    /**
     * Use the TrackingInstanceRevision relation PacTrackingInstanceRevision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery A secondary query class using the current class as primary query
     */
    public function useTrackingInstanceRevisionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingInstanceRevision($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevisionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity|PropelObjectCollection $pacTrackingExclusivity  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPageExclusivity($pacTrackingExclusivity, $comparison = null)
    {
        if ($pacTrackingExclusivity instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $pacTrackingExclusivity->getFkTrackingInstance(), $comparison);
        } elseif ($pacTrackingExclusivity instanceof PropelObjectCollection) {
            return $this
                ->useTrackingPageExclusivityQuery()
                ->filterByPrimaryKeys($pacTrackingExclusivity->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingPageExclusivity() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPageExclusivity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function joinTrackingPageExclusivity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPageExclusivity');

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
            $this->addJoinObject($join, 'TrackingPageExclusivity');
        }

        return $this;
    }

    /**
     * Use the TrackingPageExclusivity relation PacTrackingExclusivity object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPageExclusivityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPageExclusivity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPageExclusivity', 'ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivityQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstance $pacTrackingInstance Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function prune($pacTrackingInstance = null)
    {
        if ($pacTrackingInstance) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::ID_TRACKING_INSTANCE, $pacTrackingInstance->getIdTrackingInstance(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Tracking_Persistence_PacTrackingInstancePeer::CREATED_AT);
    }
}
