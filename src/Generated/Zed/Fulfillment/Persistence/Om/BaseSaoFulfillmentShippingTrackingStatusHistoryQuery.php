<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_shipping_tracking_status_history' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByIdShippingTrackingStatusHistory($order = Criteria::ASC) Order by the id_shipping_tracking_status_history column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByFkShippingTracking($order = Criteria::ASC) Order by the fk_shipping_tracking column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByNotificationTimestamp($order = Criteria::ASC) Order by the notification_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByIdShippingTrackingStatusHistory() Group by the id_shipping_tracking_status_history column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByFkShippingTracking() Group by the fk_shipping_tracking column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByCode() Group by the code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByDescription() Group by the description column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByNotificationTimestamp() Group by the notification_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery leftJoinTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery rightJoinTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery innerJoinTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the Tracking relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByFkShippingTracking(int $fk_shipping_tracking) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the fk_shipping_tracking column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByCode(string $code) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the code column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByDescription(string $description) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the description column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByNotificationTimestamp(string $notification_timestamp) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the notification_timestamp column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory filtered by the updated_at column
 *
 * @method array findByIdShippingTrackingStatusHistory(int $id_shipping_tracking_status_history) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the id_shipping_tracking_status_history column
 * @method array findByFkShippingTracking(int $fk_shipping_tracking) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the fk_shipping_tracking column
 * @method array findByCode(string $code) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the code column
 * @method array findByDescription(string $description) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the description column
 * @method array findByNotificationTimestamp(string $notification_timestamp) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the notification_timestamp column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingTrackingStatusHistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingTrackingStatusHistoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery();
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
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdShippingTrackingStatusHistory($key, $con = null)
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_shipping_tracking_status_history`, `fk_shipping_tracking`, `code`, `description`, `notification_timestamp`, `created_at`, `updated_at` FROM `sao_fulfillment_shipping_tracking_status_history` WHERE `id_shipping_tracking_status_history` = :p0';
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
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_shipping_tracking_status_history column
     *
     * Example usage:
     * <code>
     * $query->filterByIdShippingTrackingStatusHistory(1234); // WHERE id_shipping_tracking_status_history = 1234
     * $query->filterByIdShippingTrackingStatusHistory(array(12, 34)); // WHERE id_shipping_tracking_status_history IN (12, 34)
     * $query->filterByIdShippingTrackingStatusHistory(array('min' => 12)); // WHERE id_shipping_tracking_status_history >= 12
     * $query->filterByIdShippingTrackingStatusHistory(array('max' => 12)); // WHERE id_shipping_tracking_status_history <= 12
     * </code>
     *
     * @param     mixed $idShippingTrackingStatusHistory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByIdShippingTrackingStatusHistory($idShippingTrackingStatusHistory = null, $comparison = null)
    {
        if (is_array($idShippingTrackingStatusHistory)) {
            $useMinMax = false;
            if (isset($idShippingTrackingStatusHistory['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $idShippingTrackingStatusHistory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idShippingTrackingStatusHistory['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $idShippingTrackingStatusHistory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $idShippingTrackingStatusHistory, $comparison);
    }

    /**
     * Filter the query on the fk_shipping_tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByFkShippingTracking(1234); // WHERE fk_shipping_tracking = 1234
     * $query->filterByFkShippingTracking(array(12, 34)); // WHERE fk_shipping_tracking IN (12, 34)
     * $query->filterByFkShippingTracking(array('min' => 12)); // WHERE fk_shipping_tracking >= 12
     * $query->filterByFkShippingTracking(array('max' => 12)); // WHERE fk_shipping_tracking <= 12
     * </code>
     *
     * @see       filterByTracking()
     *
     * @param     mixed $fkShippingTracking The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByFkShippingTracking($fkShippingTracking = null, $comparison = null)
    {
        if (is_array($fkShippingTracking)) {
            $useMinMax = false;
            if (isset($fkShippingTracking['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $fkShippingTracking['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkShippingTracking['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $fkShippingTracking['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $fkShippingTracking, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the notification_timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByNotificationTimestamp('2011-03-14'); // WHERE notification_timestamp = '2011-03-14'
     * $query->filterByNotificationTimestamp('now'); // WHERE notification_timestamp = '2011-03-14'
     * $query->filterByNotificationTimestamp(array('max' => 'yesterday')); // WHERE notification_timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $notificationTimestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByNotificationTimestamp($notificationTimestamp = null, $comparison = null)
    {
        if (is_array($notificationTimestamp)) {
            $useMinMax = false;
            if (isset($notificationTimestamp['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP, $notificationTimestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($notificationTimestamp['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP, $notificationTimestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::NOTIFICATION_TIMESTAMP, $notificationTimestamp, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking|PropelObjectCollection $saoFulfillmentShippingTracking The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracking($saoFulfillmentShippingTracking, $comparison = null)
    {
        if ($saoFulfillmentShippingTracking instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $saoFulfillmentShippingTracking->getIdShippingTracking(), $comparison);
        } elseif ($saoFulfillmentShippingTracking instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::FK_SHIPPING_TRACKING, $saoFulfillmentShippingTracking->toKeyValue('PrimaryKey', 'IdShippingTracking'), $comparison);
        } else {
            throw new PropelException('filterByTracking() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tracking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function joinTracking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tracking');

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
            $this->addJoinObject($join, 'Tracking');
        }

        return $this;
    }

    /**
     * Use the Tracking relation SaoFulfillmentShippingTracking object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery A secondary query class using the current class as primary query
     */
    public function useTrackingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTracking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tracking', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory $saoFulfillmentShippingTrackingStatusHistory Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentShippingTrackingStatusHistory = null)
    {
        if ($saoFulfillmentShippingTrackingStatusHistory) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::ID_SHIPPING_TRACKING_STATUS_HISTORY, $saoFulfillmentShippingTrackingStatusHistory->getIdShippingTrackingStatusHistory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryPeer::CREATED_AT);
    }
}
