<?php


/**
 * Base class that represents a query for the 'pac_payment_control_raw_data_log' table.
 *
 *
 *
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByIdPaymentControlRawDataLog($order = Criteria::ASC) Order by the id_payment_control_raw_data_log column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderBySessionId($order = Criteria::ASC) Order by the session_id column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByOfferedMethods($order = Criteria::ASC) Order by the offered_methods column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByIdPaymentControlRawDataLog() Group by the id_payment_control_raw_data_log column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupBySessionId() Group by the session_id column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByIpAddress() Group by the ip_address column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByData() Group by the data column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByOfferedMethods() Group by the offered_methods column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOne(PropelPDO $con = null) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog matching the query
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog matching the query, or a new ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneBySessionId(string $session_id) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the session_id column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneByIpAddress(string $ip_address) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the ip_address column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneByData(string $data) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the data column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneByOfferedMethods(string $offered_methods) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the offered_methods column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the created_at column
 * @method ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog filtered by the updated_at column
 *
 * @method array findByIdPaymentControlRawDataLog(int $id_payment_control_raw_data_log) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the id_payment_control_raw_data_log column
 * @method array findBySessionId(string $session_id) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the session_id column
 * @method array findByIpAddress(string $ip_address) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the ip_address column
 * @method array findByData(string $data) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the data column
 * @method array findByOfferedMethods(string $offered_methods) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the offered_methods column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/PaymentControl/Persistence/Propel.om
 */
abstract class Generated_Zed_PaymentControl_Persistence_Propel_Om_BasePacPaymentControlRawDataLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_PaymentControl_Persistence_Propel_Om_BasePacPaymentControlRawDataLogQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPaymentControlRawDataLog']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog|ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentControlRawDataLog($key, $con = null)
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
     * @return                 ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_control_raw_data_log`, `session_id`, `ip_address`, `data`, `offered_methods`, `created_at`, `updated_at` FROM `pac_payment_control_raw_data_log` WHERE `id_payment_control_raw_data_log` = :p0';
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
            $obj = new ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog();
            $obj->hydrate($row);
            ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog|ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_control_raw_data_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentControlRawDataLog(1234); // WHERE id_payment_control_raw_data_log = 1234
     * $query->filterByIdPaymentControlRawDataLog(array(12, 34)); // WHERE id_payment_control_raw_data_log IN (12, 34)
     * $query->filterByIdPaymentControlRawDataLog(array('min' => 12)); // WHERE id_payment_control_raw_data_log >= 12
     * $query->filterByIdPaymentControlRawDataLog(array('max' => 12)); // WHERE id_payment_control_raw_data_log <= 12
     * </code>
     *
     * @param     mixed $idPaymentControlRawDataLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByIdPaymentControlRawDataLog($idPaymentControlRawDataLog = null, $comparison = null)
    {
        if (is_array($idPaymentControlRawDataLog)) {
            $useMinMax = false;
            if (isset($idPaymentControlRawDataLog['min'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $idPaymentControlRawDataLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentControlRawDataLog['max'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $idPaymentControlRawDataLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $idPaymentControlRawDataLog, $comparison);
    }

    /**
     * Filter the query on the session_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionId('fooValue');   // WHERE session_id = 'fooValue'
     * $query->filterBySessionId('%fooValue%'); // WHERE session_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterBySessionId($sessionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sessionId)) {
                $sessionId = str_replace('*', '%', $sessionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::SESSION_ID, $sessionId, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%'); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $data)) {
                $data = str_replace('*', '%', $data);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::DATA, $data, $comparison);
    }

    /**
     * Filter the query on the offered_methods column
     *
     * Example usage:
     * <code>
     * $query->filterByOfferedMethods('fooValue');   // WHERE offered_methods = 'fooValue'
     * $query->filterByOfferedMethods('%fooValue%'); // WHERE offered_methods LIKE '%fooValue%'
     * </code>
     *
     * @param     string $offeredMethods The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByOfferedMethods($offeredMethods = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($offeredMethods)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $offeredMethods)) {
                $offeredMethods = str_replace('*', '%', $offeredMethods);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::OFFERED_METHODS, $offeredMethods, $comparison);
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLog $pacPaymentControlRawDataLog Object to remove from the list of results
     *
     * @return ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function prune($pacPaymentControlRawDataLog = null)
    {
        if ($pacPaymentControlRawDataLog) {
            $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::ID_PAYMENT_CONTROL_RAW_DATA_LOG, $pacPaymentControlRawDataLog->getIdPaymentControlRawDataLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_PaymentControl_Persistence_Propel_PacPaymentControlRawDataLogPeer::CREATED_AT);
    }
}
