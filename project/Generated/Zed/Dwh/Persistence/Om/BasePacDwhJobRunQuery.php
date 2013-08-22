<?php


/**
 * Base class that represents a query for the 'pac_dwh_job_run' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByIdDwhJobRun($order = Criteria::ASC) Order by the id_dwh_job_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByJobName($order = Criteria::ASC) Order by the job_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByProcessName($order = Criteria::ASC) Order by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByExecutionTime($order = Criteria::ASC) Order by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByFkDwhProcessRun($order = Criteria::ASC) Order by the fk_dwh_process_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByIdDwhJobRun() Group by the id_dwh_job_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByJobName() Group by the job_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByProcessName() Group by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByExecutionTime() Group by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByFkDwhProcessRun() Group by the fk_dwh_process_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery leftJoinPacDwhProcessRun($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacDwhProcessRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery rightJoinPacDwhProcessRun($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacDwhProcessRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery innerJoinPacDwhProcessRun($relationAlias = null) Adds a INNER JOIN clause to the query using the PacDwhProcessRun relation
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhJobRun object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByJobName(string $job_name) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the job_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByProcessName(string $process_name) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByExecutionTime(double $execution_time) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByFkDwhProcessRun(int $fk_dwh_process_run) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the fk_dwh_process_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhJobRun findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhJobRun filtered by the updated_at column
 *
 * @method array findByIdDwhJobRun(int $id_dwh_job_run) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the id_dwh_job_run column
 * @method array findByJobName(string $job_name) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the job_name column
 * @method array findByProcessName(string $process_name) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the process_name column
 * @method array findByExecutionTime(double $execution_time) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the execution_time column
 * @method array findByFkDwhProcessRun(int $fk_dwh_process_run) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the fk_dwh_process_run column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhJobRunQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhJobRunQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhJobRun', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhJobRun|ProjectA_Zed_Dwh_Persistence_PacDwhJobRun[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhJobRun A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhJobRun($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhJobRun A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_job_run`, `job_name`, `process_name`, `execution_time`, `fk_dwh_process_run`, `created_at`, `updated_at` FROM `pac_dwh_job_run` WHERE `id_dwh_job_run` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhJobRun();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRun|ProjectA_Zed_Dwh_Persistence_PacDwhJobRun[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhJobRun[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_job_run column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhJobRun(1234); // WHERE id_dwh_job_run = 1234
     * $query->filterByIdDwhJobRun(array(12, 34)); // WHERE id_dwh_job_run IN (12, 34)
     * $query->filterByIdDwhJobRun(array('min' => 12)); // WHERE id_dwh_job_run >= 12
     * $query->filterByIdDwhJobRun(array('max' => 12)); // WHERE id_dwh_job_run <= 12
     * </code>
     *
     * @param     mixed $idDwhJobRun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByIdDwhJobRun($idDwhJobRun = null, $comparison = null)
    {
        if (is_array($idDwhJobRun)) {
            $useMinMax = false;
            if (isset($idDwhJobRun['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $idDwhJobRun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhJobRun['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $idDwhJobRun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $idDwhJobRun, $comparison);
    }

    /**
     * Filter the query on the job_name column
     *
     * Example usage:
     * <code>
     * $query->filterByJobName('fooValue');   // WHERE job_name = 'fooValue'
     * $query->filterByJobName('%fooValue%'); // WHERE job_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jobName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByJobName($jobName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jobName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jobName)) {
                $jobName = str_replace('*', '%', $jobName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::JOB_NAME, $jobName, $comparison);
    }

    /**
     * Filter the query on the process_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessName('fooValue');   // WHERE process_name = 'fooValue'
     * $query->filterByProcessName('%fooValue%'); // WHERE process_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByProcessName($processName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processName)) {
                $processName = str_replace('*', '%', $processName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::PROCESS_NAME, $processName, $comparison);
    }

    /**
     * Filter the query on the execution_time column
     *
     * Example usage:
     * <code>
     * $query->filterByExecutionTime(1234); // WHERE execution_time = 1234
     * $query->filterByExecutionTime(array(12, 34)); // WHERE execution_time IN (12, 34)
     * $query->filterByExecutionTime(array('min' => 12)); // WHERE execution_time >= 12
     * $query->filterByExecutionTime(array('max' => 12)); // WHERE execution_time <= 12
     * </code>
     *
     * @param     mixed $executionTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByExecutionTime($executionTime = null, $comparison = null)
    {
        if (is_array($executionTime)) {
            $useMinMax = false;
            if (isset($executionTime['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::EXECUTION_TIME, $executionTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($executionTime['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::EXECUTION_TIME, $executionTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::EXECUTION_TIME, $executionTime, $comparison);
    }

    /**
     * Filter the query on the fk_dwh_process_run column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDwhProcessRun(1234); // WHERE fk_dwh_process_run = 1234
     * $query->filterByFkDwhProcessRun(array(12, 34)); // WHERE fk_dwh_process_run IN (12, 34)
     * $query->filterByFkDwhProcessRun(array('min' => 12)); // WHERE fk_dwh_process_run >= 12
     * $query->filterByFkDwhProcessRun(array('max' => 12)); // WHERE fk_dwh_process_run <= 12
     * </code>
     *
     * @see       filterByPacDwhProcessRun()
     *
     * @param     mixed $fkDwhProcessRun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByFkDwhProcessRun($fkDwhProcessRun = null, $comparison = null)
    {
        if (is_array($fkDwhProcessRun)) {
            $useMinMax = false;
            if (isset($fkDwhProcessRun['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::FK_DWH_PROCESS_RUN, $fkDwhProcessRun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDwhProcessRun['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::FK_DWH_PROCESS_RUN, $fkDwhProcessRun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::FK_DWH_PROCESS_RUN, $fkDwhProcessRun, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun object
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun|PropelObjectCollection $pacDwhProcessRun The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacDwhProcessRun($pacDwhProcessRun, $comparison = null)
    {
        if ($pacDwhProcessRun instanceof ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::FK_DWH_PROCESS_RUN, $pacDwhProcessRun->getIdDwhProcessRun(), $comparison);
        } elseif ($pacDwhProcessRun instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::FK_DWH_PROCESS_RUN, $pacDwhProcessRun->toKeyValue('PrimaryKey', 'IdDwhProcessRun'), $comparison);
        } else {
            throw new PropelException('filterByPacDwhProcessRun() only accepts arguments of type ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacDwhProcessRun relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function joinPacDwhProcessRun($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacDwhProcessRun');

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
            $this->addJoinObject($join, 'PacDwhProcessRun');
        }

        return $this;
    }

    /**
     * Use the PacDwhProcessRun relation PacDwhProcessRun object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery A secondary query class using the current class as primary query
     */
    public function usePacDwhProcessRunQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacDwhProcessRun($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacDwhProcessRun', 'ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhJobRun $pacDwhJobRun Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function prune($pacDwhJobRun = null)
    {
        if ($pacDwhJobRun) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::ID_DWH_JOB_RUN, $pacDwhJobRun->getIdDwhJobRun(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhJobRunPeer::CREATED_AT);
    }
}
