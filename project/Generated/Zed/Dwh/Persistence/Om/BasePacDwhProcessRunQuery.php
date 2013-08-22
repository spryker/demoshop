<?php


/**
 * Base class that represents a query for the 'pac_dwh_process_run' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByIdDwhProcessRun($order = Criteria::ASC) Order by the id_dwh_process_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByProcessName($order = Criteria::ASC) Order by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByExecutionTime($order = Criteria::ASC) Order by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByFkDwhImportRun($order = Criteria::ASC) Order by the fk_dwh_import_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByIdDwhProcessRun() Group by the id_dwh_process_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByProcessName() Group by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByExecutionTime() Group by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByFkDwhImportRun() Group by the fk_dwh_import_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery leftJoinPacDwhImportRun($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacDwhImportRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery rightJoinPacDwhImportRun($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacDwhImportRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery innerJoinPacDwhImportRun($relationAlias = null) Adds a INNER JOIN clause to the query using the PacDwhImportRun relation
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery leftJoinPacDwhJobRun($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacDwhJobRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery rightJoinPacDwhJobRun($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacDwhJobRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery innerJoinPacDwhJobRun($relationAlias = null) Adds a INNER JOIN clause to the query using the PacDwhJobRun relation
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneByProcessName(string $process_name) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun filtered by the process_name column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneByExecutionTime(double $execution_time) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun filtered by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneByFkDwhImportRun(int $fk_dwh_import_run) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun filtered by the fk_dwh_import_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun filtered by the updated_at column
 *
 * @method array findByIdDwhProcessRun(int $id_dwh_process_run) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the id_dwh_process_run column
 * @method array findByProcessName(string $process_name) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the process_name column
 * @method array findByExecutionTime(double $execution_time) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the execution_time column
 * @method array findByFkDwhImportRun(int $fk_dwh_import_run) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the fk_dwh_import_run column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhProcessRunQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhProcessRunQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun|ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhProcessRun($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_process_run`, `process_name`, `execution_time`, `fk_dwh_import_run`, `created_at`, `updated_at` FROM `pac_dwh_process_run` WHERE `id_dwh_process_run` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun|ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_process_run column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhProcessRun(1234); // WHERE id_dwh_process_run = 1234
     * $query->filterByIdDwhProcessRun(array(12, 34)); // WHERE id_dwh_process_run IN (12, 34)
     * $query->filterByIdDwhProcessRun(array('min' => 12)); // WHERE id_dwh_process_run >= 12
     * $query->filterByIdDwhProcessRun(array('max' => 12)); // WHERE id_dwh_process_run <= 12
     * </code>
     *
     * @param     mixed $idDwhProcessRun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByIdDwhProcessRun($idDwhProcessRun = null, $comparison = null)
    {
        if (is_array($idDwhProcessRun)) {
            $useMinMax = false;
            if (isset($idDwhProcessRun['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $idDwhProcessRun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhProcessRun['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $idDwhProcessRun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $idDwhProcessRun, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::PROCESS_NAME, $processName, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByExecutionTime($executionTime = null, $comparison = null)
    {
        if (is_array($executionTime)) {
            $useMinMax = false;
            if (isset($executionTime['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME, $executionTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($executionTime['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME, $executionTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::EXECUTION_TIME, $executionTime, $comparison);
    }

    /**
     * Filter the query on the fk_dwh_import_run column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDwhImportRun(1234); // WHERE fk_dwh_import_run = 1234
     * $query->filterByFkDwhImportRun(array(12, 34)); // WHERE fk_dwh_import_run IN (12, 34)
     * $query->filterByFkDwhImportRun(array('min' => 12)); // WHERE fk_dwh_import_run >= 12
     * $query->filterByFkDwhImportRun(array('max' => 12)); // WHERE fk_dwh_import_run <= 12
     * </code>
     *
     * @see       filterByPacDwhImportRun()
     *
     * @param     mixed $fkDwhImportRun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByFkDwhImportRun($fkDwhImportRun = null, $comparison = null)
    {
        if (is_array($fkDwhImportRun)) {
            $useMinMax = false;
            if (isset($fkDwhImportRun['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $fkDwhImportRun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDwhImportRun['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $fkDwhImportRun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $fkDwhImportRun, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhImportRun|PropelObjectCollection $pacDwhImportRun The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacDwhImportRun($pacDwhImportRun, $comparison = null)
    {
        if ($pacDwhImportRun instanceof ProjectA_Zed_Dwh_Persistence_PacDwhImportRun) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $pacDwhImportRun->getIdDwhImportRun(), $comparison);
        } elseif ($pacDwhImportRun instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::FK_DWH_IMPORT_RUN, $pacDwhImportRun->toKeyValue('PrimaryKey', 'IdDwhImportRun'), $comparison);
        } else {
            throw new PropelException('filterByPacDwhImportRun() only accepts arguments of type ProjectA_Zed_Dwh_Persistence_PacDwhImportRun or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacDwhImportRun relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function joinPacDwhImportRun($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacDwhImportRun');

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
            $this->addJoinObject($join, 'PacDwhImportRun');
        }

        return $this;
    }

    /**
     * Use the PacDwhImportRun relation PacDwhImportRun object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery A secondary query class using the current class as primary query
     */
    public function usePacDwhImportRunQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacDwhImportRun($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacDwhImportRun', 'ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Dwh_Persistence_PacDwhJobRun object
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhJobRun|PropelObjectCollection $pacDwhJobRun  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacDwhJobRun($pacDwhJobRun, $comparison = null)
    {
        if ($pacDwhJobRun instanceof ProjectA_Zed_Dwh_Persistence_PacDwhJobRun) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $pacDwhJobRun->getFkDwhProcessRun(), $comparison);
        } elseif ($pacDwhJobRun instanceof PropelObjectCollection) {
            return $this
                ->usePacDwhJobRunQuery()
                ->filterByPrimaryKeys($pacDwhJobRun->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacDwhJobRun() only accepts arguments of type ProjectA_Zed_Dwh_Persistence_PacDwhJobRun or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacDwhJobRun relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function joinPacDwhJobRun($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacDwhJobRun');

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
            $this->addJoinObject($join, 'PacDwhJobRun');
        }

        return $this;
    }

    /**
     * Use the PacDwhJobRun relation PacDwhJobRun object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery A secondary query class using the current class as primary query
     */
    public function usePacDwhJobRunQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacDwhJobRun($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacDwhJobRun', 'ProjectA_Zed_Dwh_Persistence_PacDwhJobRunQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun $pacDwhProcessRun Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function prune($pacDwhProcessRun = null)
    {
        if ($pacDwhProcessRun) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::ID_DWH_PROCESS_RUN, $pacDwhProcessRun->getIdDwhProcessRun(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhProcessRunPeer::CREATED_AT);
    }
}
