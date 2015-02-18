<?php


/**
 * Base class that represents a query for the 'pac_touch' table.
 *
 *
 *
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery orderByIdTouch($order = Criteria::ASC) Order by the id_touch column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery orderByItemType($order = Criteria::ASC) Order by the item_type column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery orderByItemEvent($order = Criteria::ASC) Order by the item_event column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery orderByTouched($order = Criteria::ASC) Order by the touched column
 *
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery groupByIdTouch() Group by the id_touch column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery groupByItemType() Group by the item_type column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery groupByItemEvent() Group by the item_event column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery groupByItemId() Group by the item_id column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery groupByTouched() Group by the touched column
 *
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOne(PropelPDO $con = null) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch matching the query
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOneOrCreate(PropelPDO $con = null) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch matching the query, or a new SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object populated from the query conditions when no match is found
 *
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOneByItemType(string $item_type) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch filtered by the item_type column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOneByItemEvent(int $item_event) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch filtered by the item_event column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOneByItemId(int $item_id) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch filtered by the item_id column
 * @method SprykerCore_Zed_Touch_Persistence_Propel_PacTouch findOneByTouched(string $touched) Return the first SprykerCore_Zed_Touch_Persistence_Propel_PacTouch filtered by the touched column
 *
 * @method array findByIdTouch(int $id_touch) Return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects filtered by the id_touch column
 * @method array findByItemType(string $item_type) Return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects filtered by the item_type column
 * @method array findByItemEvent(int $item_event) Return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects filtered by the item_event column
 * @method array findByItemId(int $item_id) Return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects filtered by the item_id column
 * @method array findByTouched(string $touched) Return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects filtered by the touched column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/Propel.om
 */
abstract class Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacTouch']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery) {
            return $criteria;
        }
        $query = new SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery(null, null, $modelAlias);

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
     * @return   SprykerCore_Zed_Touch_Persistence_Propel_PacTouch|SprykerCore_Zed_Touch_Persistence_Propel_PacTouch[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SprykerCore_Zed_Touch_Persistence_Propel_PacTouch A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTouch($key, $con = null)
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
     * @return                 SprykerCore_Zed_Touch_Persistence_Propel_PacTouch A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_touch`, `item_type`, `item_event`, `item_id`, `touched` FROM `pac_touch` WHERE `id_touch` = :p0';
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
            $obj = new SprykerCore_Zed_Touch_Persistence_Propel_PacTouch();
            $obj->hydrate($row);
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch|SprykerCore_Zed_Touch_Persistence_Propel_PacTouch[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SprykerCore_Zed_Touch_Persistence_Propel_PacTouch[]|mixed the list of results, formatted by the current formatter
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
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_touch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTouch(1234); // WHERE id_touch = 1234
     * $query->filterByIdTouch(array(12, 34)); // WHERE id_touch IN (12, 34)
     * $query->filterByIdTouch(array('min' => 12)); // WHERE id_touch >= 12
     * $query->filterByIdTouch(array('max' => 12)); // WHERE id_touch <= 12
     * </code>
     *
     * @param     mixed $idTouch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByIdTouch($idTouch = null, $comparison = null)
    {
        if (is_array($idTouch)) {
            $useMinMax = false;
            if (isset($idTouch['min'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $idTouch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTouch['max'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $idTouch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $idTouch, $comparison);
    }

    /**
     * Filter the query on the item_type column
     *
     * Example usage:
     * <code>
     * $query->filterByItemType('fooValue');   // WHERE item_type = 'fooValue'
     * $query->filterByItemType('%fooValue%'); // WHERE item_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByItemType($itemType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemType)) {
                $itemType = str_replace('*', '%', $itemType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_TYPE, $itemType, $comparison);
    }

    /**
     * Filter the query on the item_event column
     *
     * @param     mixed $itemEvent The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByItemEvent($itemEvent = null, $comparison = null)
    {
        if (is_scalar($itemEvent)) {
            $itemEvent = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getSqlValueForEnum(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT, $itemEvent);
        } elseif (is_array($itemEvent)) {
            $convertedValues = array();
            foreach ($itemEvent as $value) {
                $convertedValues[] = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getSqlValueForEnum(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT, $value);
            }
            $itemEvent = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT, $itemEvent, $comparison);
    }

    /**
     * Filter the query on the item_id column
     *
     * Example usage:
     * <code>
     * $query->filterByItemId(1234); // WHERE item_id = 1234
     * $query->filterByItemId(array(12, 34)); // WHERE item_id IN (12, 34)
     * $query->filterByItemId(array('min' => 12)); // WHERE item_id >= 12
     * $query->filterByItemId(array('max' => 12)); // WHERE item_id <= 12
     * </code>
     *
     * @param     mixed $itemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (is_array($itemId)) {
            $useMinMax = false;
            if (isset($itemId['min'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID, $itemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemId['max'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID, $itemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID, $itemId, $comparison);
    }

    /**
     * Filter the query on the touched column
     *
     * Example usage:
     * <code>
     * $query->filterByTouched('2011-03-14'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched('now'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched(array('max' => 'yesterday')); // WHERE touched < '2011-03-13'
     * </code>
     *
     * @param     mixed $touched The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function filterByTouched($touched = null, $comparison = null)
    {
        if (is_array($touched)) {
            $useMinMax = false;
            if (isset($touched['min'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED, $touched['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($touched['max'])) {
                $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED, $touched['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED, $touched, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SprykerCore_Zed_Touch_Persistence_Propel_PacTouch $pacTouch Object to remove from the list of results
     *
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery The current query, for fluid interface
     */
    public function prune($pacTouch = null)
    {
        if ($pacTouch) {
            $this->addUsingAlias(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $pacTouch->getIdTouch(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
