<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_shipping_agent' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByIdShippingAgent($order = Criteria::ASC) Order by the id_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByInternalName($order = Criteria::ASC) Order by the internal_name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByTrackingUrl($order = Criteria::ASC) Order by the tracking_url column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByIdShippingAgent() Group by the id_shipping_agent column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByInternalName() Group by the internal_name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByName() Group by the name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByTrackingUrl() Group by the tracking_url column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery leftJoinTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery rightJoinTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tracking relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery innerJoinTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the Tracking relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneByInternalName(string $internal_name) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent filtered by the internal_name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneByName(string $name) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent filtered by the name column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneByTrackingUrl(string $tracking_url) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent filtered by the tracking_url column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent filtered by the updated_at column
 *
 * @method array findByIdShippingAgent(int $id_shipping_agent) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the id_shipping_agent column
 * @method array findByInternalName(string $internal_name) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the internal_name column
 * @method array findByName(string $name) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the name column
 * @method array findByTrackingUrl(string $tracking_url) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the tracking_url column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingAgentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentShippingAgentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery();
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
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdShippingAgent($key, $con = null)
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_shipping_agent`, `internal_name`, `name`, `tracking_url`, `created_at`, `updated_at` FROM `sao_fulfillment_shipping_agent` WHERE `id_shipping_agent` = :p0';
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
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_shipping_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByIdShippingAgent(1234); // WHERE id_shipping_agent = 1234
     * $query->filterByIdShippingAgent(array(12, 34)); // WHERE id_shipping_agent IN (12, 34)
     * $query->filterByIdShippingAgent(array('min' => 12)); // WHERE id_shipping_agent >= 12
     * $query->filterByIdShippingAgent(array('max' => 12)); // WHERE id_shipping_agent <= 12
     * </code>
     *
     * @param     mixed $idShippingAgent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByIdShippingAgent($idShippingAgent = null, $comparison = null)
    {
        if (is_array($idShippingAgent)) {
            $useMinMax = false;
            if (isset($idShippingAgent['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $idShippingAgent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idShippingAgent['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $idShippingAgent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $idShippingAgent, $comparison);
    }

    /**
     * Filter the query on the internal_name column
     *
     * Example usage:
     * <code>
     * $query->filterByInternalName('fooValue');   // WHERE internal_name = 'fooValue'
     * $query->filterByInternalName('%fooValue%'); // WHERE internal_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $internalName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByInternalName($internalName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($internalName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $internalName)) {
                $internalName = str_replace('*', '%', $internalName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::INTERNAL_NAME, $internalName, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the tracking_url column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackingUrl('fooValue');   // WHERE tracking_url = 'fooValue'
     * $query->filterByTrackingUrl('%fooValue%'); // WHERE tracking_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackingUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByTrackingUrl($trackingUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackingUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $trackingUrl)) {
                $trackingUrl = str_replace('*', '%', $trackingUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::TRACKING_URL, $trackingUrl, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote|PropelObjectCollection $saoFulfillmentQuote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($saoFulfillmentQuote, $comparison = null)
    {
        if ($saoFulfillmentQuote instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $saoFulfillmentQuote->getFkShippingAgent(), $comparison);
        } elseif ($saoFulfillmentQuote instanceof PropelObjectCollection) {
            return $this
                ->useQuoteQuery()
                ->filterByPrimaryKeys($saoFulfillmentQuote->getPrimaryKeys())
                ->endUse();
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
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
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking|PropelObjectCollection $saoFulfillmentShippingTracking  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracking($saoFulfillmentShippingTracking, $comparison = null)
    {
        if ($saoFulfillmentShippingTracking instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $saoFulfillmentShippingTracking->getFkShippingAgent(), $comparison);
        } elseif ($saoFulfillmentShippingTracking instanceof PropelObjectCollection) {
            return $this
                ->useTrackingQuery()
                ->filterByPrimaryKeys($saoFulfillmentShippingTracking->getPrimaryKeys())
                ->endUse();
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
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
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
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgent $saoFulfillmentShippingAgent Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentShippingAgent = null)
    {
        if ($saoFulfillmentShippingAgent) {
            $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::ID_SHIPPING_AGENT, $saoFulfillmentShippingAgent->getIdShippingAgent(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentPeer::CREATED_AT);
    }
}
