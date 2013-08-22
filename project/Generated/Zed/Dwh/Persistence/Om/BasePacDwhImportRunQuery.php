<?php


/**
 * Base class that represents a query for the 'pac_dwh_import_run' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery orderByIdDwhImportRun($order = Criteria::ASC) Order by the id_dwh_import_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery orderByExecutionTime($order = Criteria::ASC) Order by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery orderBySucceeded($order = Criteria::ASC) Order by the succeeded column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery groupByIdDwhImportRun() Group by the id_dwh_import_run column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery groupByExecutionTime() Group by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery groupBySucceeded() Group by the succeeded column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery leftJoinPacDwhProcessRun($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacDwhProcessRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery rightJoinPacDwhProcessRun($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacDwhProcessRun relation
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery innerJoinPacDwhProcessRun($relationAlias = null) Adds a INNER JOIN clause to the query using the PacDwhProcessRun relation
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhImportRun object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOneByExecutionTime(double $execution_time) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun filtered by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOneBySucceeded(boolean $succeeded) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun filtered by the succeeded column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhImportRun findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhImportRun filtered by the updated_at column
 *
 * @method array findByIdDwhImportRun(int $id_dwh_import_run) Return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun objects filtered by the id_dwh_import_run column
 * @method array findByExecutionTime(double $execution_time) Return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun objects filtered by the execution_time column
 * @method array findBySucceeded(boolean $succeeded) Return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun objects filtered by the succeeded column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhImportRunQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhImportRunQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhImportRun', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhImportRun|ProjectA_Zed_Dwh_Persistence_PacDwhImportRun[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhImportRun A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhImportRun($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhImportRun A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_import_run`, `execution_time`, `succeeded`, `created_at`, `updated_at` FROM `pac_dwh_import_run` WHERE `id_dwh_import_run` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhImportRun();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRun|ProjectA_Zed_Dwh_Persistence_PacDwhImportRun[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhImportRun[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_import_run column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhImportRun(1234); // WHERE id_dwh_import_run = 1234
     * $query->filterByIdDwhImportRun(array(12, 34)); // WHERE id_dwh_import_run IN (12, 34)
     * $query->filterByIdDwhImportRun(array('min' => 12)); // WHERE id_dwh_import_run >= 12
     * $query->filterByIdDwhImportRun(array('max' => 12)); // WHERE id_dwh_import_run <= 12
     * </code>
     *
     * @param     mixed $idDwhImportRun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByIdDwhImportRun($idDwhImportRun = null, $comparison = null)
    {
        if (is_array($idDwhImportRun)) {
            $useMinMax = false;
            if (isset($idDwhImportRun['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $idDwhImportRun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhImportRun['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $idDwhImportRun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $idDwhImportRun, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByExecutionTime($executionTime = null, $comparison = null)
    {
        if (is_array($executionTime)) {
            $useMinMax = false;
            if (isset($executionTime['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME, $executionTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($executionTime['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME, $executionTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::EXECUTION_TIME, $executionTime, $comparison);
    }

    /**
     * Filter the query on the succeeded column
     *
     * Example usage:
     * <code>
     * $query->filterBySucceeded(true); // WHERE succeeded = true
     * $query->filterBySucceeded('yes'); // WHERE succeeded = true
     * </code>
     *
     * @param     boolean|string $succeeded The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterBySucceeded($succeeded = null, $comparison = null)
    {
        if (is_string($succeeded)) {
            $succeeded = in_array(strtolower($succeeded), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::SUCCEEDED, $succeeded, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun object
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun|PropelObjectCollection $pacDwhProcessRun  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacDwhProcessRun($pacDwhProcessRun, $comparison = null)
    {
        if ($pacDwhProcessRun instanceof ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $pacDwhProcessRun->getFkDwhImportRun(), $comparison);
        } elseif ($pacDwhProcessRun instanceof PropelObjectCollection) {
            return $this
                ->usePacDwhProcessRunQuery()
                ->filterByPrimaryKeys($pacDwhProcessRun->getPrimaryKeys())
                ->endUse();
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhImportRun $pacDwhImportRun Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function prune($pacDwhImportRun = null)
    {
        if ($pacDwhImportRun) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::ID_DWH_IMPORT_RUN, $pacDwhImportRun->getIdDwhImportRun(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhImportRunQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhImportRunPeer::CREATED_AT);
    }
}
