<?php


/**
 * Base class that represents a query for the 'sao_sales_order_item_notification' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByIdSaoSalesOrderItemNotification($order = Criteria::ASC) Order by the id_sao_sales_order_item_notification column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByEventTriggered($order = Criteria::ASC) Order by the event_triggered column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByIdSaoSalesOrderItemNotification() Group by the id_sao_sales_order_item_notification column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByHash() Group by the hash column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByEvent() Group by the event column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByEventTriggered() Group by the event_triggered column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByStatus() Group by the status column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery leftJoinSalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItem relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery rightJoinSalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItem relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery innerJoinSalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItem relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the fk_sales_order_item column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByHash(string $hash) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the hash column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByEvent(string $event) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the event column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByEventTriggered(int $event_triggered) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the event_triggered column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByStatus(int $status) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the status column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification filtered by the updated_at column
 *
 * @method array findByIdSaoSalesOrderItemNotification(int $id_sao_sales_order_item_notification) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the id_sao_sales_order_item_notification column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the fk_sales_order_item column
 * @method array findByHash(string $hash) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the hash column
 * @method array findByEvent(string $event) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the event column
 * @method array findByEventTriggered(int $event_triggered) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the event_triggered column
 * @method array findByStatus(int $status) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the status column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemNotificationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemNotificationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification|Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSaoSalesOrderItemNotification($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sao_sales_order_item_notification`, `fk_sales_order_item`, `hash`, `event`, `event_triggered`, `status`, `created_at`, `updated_at` FROM `sao_sales_order_item_notification` WHERE `id_sao_sales_order_item_notification` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification|Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sao_sales_order_item_notification column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSaoSalesOrderItemNotification(1234); // WHERE id_sao_sales_order_item_notification = 1234
     * $query->filterByIdSaoSalesOrderItemNotification(array(12, 34)); // WHERE id_sao_sales_order_item_notification IN (12, 34)
     * $query->filterByIdSaoSalesOrderItemNotification(array('min' => 12)); // WHERE id_sao_sales_order_item_notification >= 12
     * $query->filterByIdSaoSalesOrderItemNotification(array('max' => 12)); // WHERE id_sao_sales_order_item_notification <= 12
     * </code>
     *
     * @param     mixed $idSaoSalesOrderItemNotification The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByIdSaoSalesOrderItemNotification($idSaoSalesOrderItemNotification = null, $comparison = null)
    {
        if (is_array($idSaoSalesOrderItemNotification)) {
            $useMinMax = false;
            if (isset($idSaoSalesOrderItemNotification['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $idSaoSalesOrderItemNotification['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSaoSalesOrderItemNotification['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $idSaoSalesOrderItemNotification['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $idSaoSalesOrderItemNotification, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item >= 12
     * $query->filterByFkSalesOrderItem(array('max' => 12)); // WHERE fk_sales_order_item <= 12
     * </code>
     *
     * @see       filterBySalesOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the hash column
     *
     * Example usage:
     * <code>
     * $query->filterByHash('fooValue');   // WHERE hash = 'fooValue'
     * $query->filterByHash('%fooValue%'); // WHERE hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByHash($hash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hash)) {
                $hash = str_replace('*', '%', $hash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::HASH, $hash, $comparison);
    }

    /**
     * Filter the query on the event column
     *
     * Example usage:
     * <code>
     * $query->filterByEvent('fooValue');   // WHERE event = 'fooValue'
     * $query->filterByEvent('%fooValue%'); // WHERE event LIKE '%fooValue%'
     * </code>
     *
     * @param     string $event The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($event)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $event)) {
                $event = str_replace('*', '%', $event);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the event_triggered column
     *
     * @param     mixed $eventTriggered The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByEventTriggered($eventTriggered = null, $comparison = null)
    {
        if (is_scalar($eventTriggered)) {
            $eventTriggered = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED, $eventTriggered);
        } elseif (is_array($eventTriggered)) {
            $convertedValues = array();
            foreach ($eventTriggered as $value) {
                $convertedValues[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED, $value);
            }
            $eventTriggered = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED, $eventTriggered, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS, $status, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterBySalesOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function joinSalesOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderItem');

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
            $this->addJoinObject($join, 'SalesOrderItem');
        }

        return $this;
    }

    /**
     * Use the SalesOrderItem relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification $saoSalesOrderItemNotification Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function prune($saoSalesOrderItemNotification = null)
    {
        if ($saoSalesOrderItemNotification) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::ID_SAO_SALES_ORDER_ITEM_NOTIFICATION, $saoSalesOrderItemNotification->getIdSaoSalesOrderItemNotification(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::CREATED_AT);
    }
}
