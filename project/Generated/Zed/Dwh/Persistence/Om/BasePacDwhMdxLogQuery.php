<?php


/**
 * Base class that represents a query for the 'pac_dwh_mdx_log' table.
 *
 *
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByIdDwhMdxLog($order = Criteria::ASC) Order by the id_dwh_mdx_log column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByMdxQuery($order = Criteria::ASC) Order by the mdx_query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByMdxQueryHash($order = Criteria::ASC) Order by the mdx_query_hash column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByExecutionTime($order = Criteria::ASC) Order by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByExceptionMessage($order = Criteria::ASC) Order by the exception_message column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByIdDwhMdxLog() Group by the id_dwh_mdx_log column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByMdxQuery() Group by the mdx_query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByMdxQueryHash() Group by the mdx_query_hash column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByExecutionTime() Group by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByExceptionMessage() Group by the exception_message column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog matching the query
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog matching the query, or a new ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByMdxQuery(string $mdx_query) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the mdx_query column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByMdxQueryHash(string $mdx_query_hash) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the mdx_query_hash column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByExecutionTime(double $execution_time) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the execution_time column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByExceptionMessage(string $exception_message) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the exception_message column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the created_at column
 * @method ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog filtered by the updated_at column
 *
 * @method array findByIdDwhMdxLog(int $id_dwh_mdx_log) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the id_dwh_mdx_log column
 * @method array findByMdxQuery(string $mdx_query) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the mdx_query column
 * @method array findByMdxQueryHash(string $mdx_query_hash) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the mdx_query_hash column
 * @method array findByExecutionTime(double $execution_time) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the execution_time column
 * @method array findByExceptionMessage(string $exception_message) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the exception_message column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.om
 */
abstract class Generated_Zed_Dwh_Persistence_Om_BasePacDwhMdxLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Dwh_Persistence_Om_BasePacDwhMdxLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery();
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
     * @return   ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog|ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDwhMdxLog($key, $con = null)
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
     * @return                 ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_dwh_mdx_log`, `mdx_query`, `mdx_query_hash`, `execution_time`, `exception_message`, `created_at`, `updated_at` FROM `pac_dwh_mdx_log` WHERE `id_dwh_mdx_log` = :p0';
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
            $obj = new ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog();
            $obj->hydrate($row);
            ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog|ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_dwh_mdx_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDwhMdxLog(1234); // WHERE id_dwh_mdx_log = 1234
     * $query->filterByIdDwhMdxLog(array(12, 34)); // WHERE id_dwh_mdx_log IN (12, 34)
     * $query->filterByIdDwhMdxLog(array('min' => 12)); // WHERE id_dwh_mdx_log >= 12
     * $query->filterByIdDwhMdxLog(array('max' => 12)); // WHERE id_dwh_mdx_log <= 12
     * </code>
     *
     * @param     mixed $idDwhMdxLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByIdDwhMdxLog($idDwhMdxLog = null, $comparison = null)
    {
        if (is_array($idDwhMdxLog)) {
            $useMinMax = false;
            if (isset($idDwhMdxLog['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $idDwhMdxLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDwhMdxLog['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $idDwhMdxLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $idDwhMdxLog, $comparison);
    }

    /**
     * Filter the query on the mdx_query column
     *
     * Example usage:
     * <code>
     * $query->filterByMdxQuery('fooValue');   // WHERE mdx_query = 'fooValue'
     * $query->filterByMdxQuery('%fooValue%'); // WHERE mdx_query LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mdxQuery The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByMdxQuery($mdxQuery = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mdxQuery)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mdxQuery)) {
                $mdxQuery = str_replace('*', '%', $mdxQuery);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::MDX_QUERY, $mdxQuery, $comparison);
    }

    /**
     * Filter the query on the mdx_query_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByMdxQueryHash('fooValue');   // WHERE mdx_query_hash = 'fooValue'
     * $query->filterByMdxQueryHash('%fooValue%'); // WHERE mdx_query_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mdxQueryHash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByMdxQueryHash($mdxQueryHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mdxQueryHash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mdxQueryHash)) {
                $mdxQueryHash = str_replace('*', '%', $mdxQueryHash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::MDX_QUERY_HASH, $mdxQueryHash, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByExecutionTime($executionTime = null, $comparison = null)
    {
        if (is_array($executionTime)) {
            $useMinMax = false;
            if (isset($executionTime['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::EXECUTION_TIME, $executionTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($executionTime['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::EXECUTION_TIME, $executionTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::EXECUTION_TIME, $executionTime, $comparison);
    }

    /**
     * Filter the query on the exception_message column
     *
     * Example usage:
     * <code>
     * $query->filterByExceptionMessage('fooValue');   // WHERE exception_message = 'fooValue'
     * $query->filterByExceptionMessage('%fooValue%'); // WHERE exception_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $exceptionMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByExceptionMessage($exceptionMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($exceptionMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $exceptionMessage)) {
                $exceptionMessage = str_replace('*', '%', $exceptionMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::EXCEPTION_MESSAGE, $exceptionMessage, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Dwh_Persistence_PacDwhMdxLog $pacDwhMdxLog Object to remove from the list of results
     *
     * @return ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function prune($pacDwhMdxLog = null)
    {
        if ($pacDwhMdxLog) {
            $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::ID_DWH_MDX_LOG, $pacDwhMdxLog->getIdDwhMdxLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Dwh_Persistence_PacDwhMdxLogPeer::CREATED_AT);
    }
}
