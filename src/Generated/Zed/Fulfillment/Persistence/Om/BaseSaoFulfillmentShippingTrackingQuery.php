<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_shipping_tracking' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByIdShippingTracking($order = Criteria::ASC) Order by the id_shipping_tracking column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByFkShippingAgent($order = Criteria::ASC) Order by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByFkQuote($order = Criteria::ASC) Order by the fk_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByTrackingNumber($order = Criteria::ASC) Order by the tracking_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByIdShippingTracking() Group by the id_shipping_tracking column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByFkShippingAgent() Group by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByFkQuote() Group by the fk_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByTrackingNumber() Group by the tracking_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery leftJoinShippingAgent($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAgent relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery rightJoinShippingAgent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAgent relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery innerJoinShippingAgent($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAgent relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery leftJoinTrackingStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingStatus relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery rightJoinTrackingStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingStatus relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery innerJoinTrackingStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingStatus relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneByFkShippingAgent(int $fk_shipping_agent) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking filtered by the fk_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneByFkQuote(int $fk_quote) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking filtered by the fk_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneByTrackingNumber(string $tracking_number) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking filtered by the tracking_number column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking filtered by the updated_at column
 *
 * @method array findByIdShippingTracking(int $id_shipping_tracking) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the id_shipping_tracking column
 * @method array findByFkShippingAgent(int $fk_shipping_agent) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the fk_shipping_agent column
 * @method array findByFkQuote(int $fk_quote) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the fk_quote column
 * @method array findByTrackingNumber(string $tracking_number) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the tracking_number column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingTrackingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingTrackingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery();
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
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdShippingTracking($key, $con = null)
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_shipping_tracking`, `fk_shipping_agent`, `fk_quote`, `tracking_number`, `created_at`, `updated_at` FROM `sao_fulfillment_shipping_tracking` WHERE `id_shipping_tracking` = :p0';
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
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_shipping_tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByIdShippingTracking(1234); // WHERE id_shipping_tracking = 1234
     * $query->filterByIdShippingTracking(array(12, 34)); // WHERE id_shipping_tracking IN (12, 34)
     * $query->filterByIdShippingTracking(array('min' => 12)); // WHERE id_shipping_tracking >= 12
     * $query->filterByIdShippingTracking(array('max' => 12)); // WHERE id_shipping_tracking <= 12
     * </code>
     *
     * @param     mixed $idShippingTracking The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByIdShippingTracking($idShippingTracking = null, $comparison = null)
    {
        if (is_array($idShippingTracking)) {
            $useMinMax = false;
            if (isset($idShippingTracking['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $idShippingTracking['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idShippingTracking['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $idShippingTracking['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $idShippingTracking, $comparison);
    }

    /**
     * Filter the query on the fk_shipping_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByFkShippingAgent(1234); // WHERE fk_shipping_agent = 1234
     * $query->filterByFkShippingAgent(array(12, 34)); // WHERE fk_shipping_agent IN (12, 34)
     * $query->filterByFkShippingAgent(array('min' => 12)); // WHERE fk_shipping_agent >= 12
     * $query->filterByFkShippingAgent(array('max' => 12)); // WHERE fk_shipping_agent <= 12
     * </code>
     *
     * @see       filterByShippingAgent()
     *
     * @param     mixed $fkShippingAgent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByFkShippingAgent($fkShippingAgent = null, $comparison = null)
    {
        if (is_array($fkShippingAgent)) {
            $useMinMax = false;
            if (isset($fkShippingAgent['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_SHIPPING_AGENT, $fkShippingAgent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkShippingAgent['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_SHIPPING_AGENT, $fkShippingAgent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_SHIPPING_AGENT, $fkShippingAgent, $comparison);
    }

    /**
     * Filter the query on the fk_quote column
     *
     * Example usage:
     * <code>
     * $query->filterByFkQuote(1234); // WHERE fk_quote = 1234
     * $query->filterByFkQuote(array(12, 34)); // WHERE fk_quote IN (12, 34)
     * $query->filterByFkQuote(array('min' => 12)); // WHERE fk_quote >= 12
     * $query->filterByFkQuote(array('max' => 12)); // WHERE fk_quote <= 12
     * </code>
     *
     * @see       filterByQuote()
     *
     * @param     mixed $fkQuote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByFkQuote($fkQuote = null, $comparison = null)
    {
        if (is_array($fkQuote)) {
            $useMinMax = false;
            if (isset($fkQuote['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_QUOTE, $fkQuote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkQuote['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_QUOTE, $fkQuote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_QUOTE, $fkQuote, $comparison);
    }

    /**
     * Filter the query on the tracking_number column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackingNumber('fooValue');   // WHERE tracking_number = 'fooValue'
     * $query->filterByTrackingNumber('%fooValue%'); // WHERE tracking_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackingNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByTrackingNumber($trackingNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackingNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $trackingNumber)) {
                $trackingNumber = str_replace('*', '%', $trackingNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::TRACKING_NUMBER, $trackingNumber, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote|PropelObjectCollection $saoFulfillmentQuote The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($saoFulfillmentQuote, $comparison = null)
    {
        if ($saoFulfillmentQuote instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_QUOTE, $saoFulfillmentQuote->getIdQuote(), $comparison);
        } elseif ($saoFulfillmentQuote instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_QUOTE, $saoFulfillmentQuote->toKeyValue('PrimaryKey', 'IdQuote'), $comparison);
        } else {
            throw new PropelException('filterByQuote() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function joinQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quote');

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
            $this->addJoinObject($join, 'Quote');
        }

        return $this;
    }

    /**
     * Use the Quote relation SaoFulfillmentQuote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent|PropelObjectCollection $saoFulfillmentShippingAgent The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShippingAgent($saoFulfillmentShippingAgent, $comparison = null)
    {
        if ($saoFulfillmentShippingAgent instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_SHIPPING_AGENT, $saoFulfillmentShippingAgent->getIdShippingAgent(), $comparison);
        } elseif ($saoFulfillmentShippingAgent instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::FK_SHIPPING_AGENT, $saoFulfillmentShippingAgent->toKeyValue('PrimaryKey', 'IdShippingAgent'), $comparison);
        } else {
            throw new PropelException('filterByShippingAgent() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAgent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function joinShippingAgent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShippingAgent');

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
            $this->addJoinObject($join, 'ShippingAgent');
        }

        return $this;
    }

    /**
     * Use the ShippingAgent relation SaoFulfillmentShippingAgent object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery A secondary query class using the current class as primary query
     */
    public function useShippingAgentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShippingAgent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAgent', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory|PropelObjectCollection $saoFulfillmentShippingTrackingStatusHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingStatus($saoFulfillmentShippingTrackingStatusHistory, $comparison = null)
    {
        if ($saoFulfillmentShippingTrackingStatusHistory instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $saoFulfillmentShippingTrackingStatusHistory->getFkShippingTracking(), $comparison);
        } elseif ($saoFulfillmentShippingTrackingStatusHistory instanceof PropelObjectCollection) {
            return $this
                ->useTrackingStatusQuery()
                ->filterByPrimaryKeys($saoFulfillmentShippingTrackingStatusHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingStatus() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingStatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function joinTrackingStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingStatus');

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
            $this->addJoinObject($join, 'TrackingStatus');
        }

        return $this;
    }

    /**
     * Use the TrackingStatus relation SaoFulfillmentShippingTrackingStatusHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery A secondary query class using the current class as primary query
     */
    public function useTrackingStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingStatus', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $saoFulfillmentShippingTracking Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentShippingTracking = null)
    {
        if ($saoFulfillmentShippingTracking) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::ID_SHIPPING_TRACKING, $saoFulfillmentShippingTracking->getIdShippingTracking(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingPeer::CREATED_AT);
    }
}
