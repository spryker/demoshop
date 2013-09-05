<?php


/**
 * Base class that represents a query for the 'pac_yves_kv_update' table.
 *
 *
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByIdYvesKvUpdate($order = Criteria::ASC) Order by the id_yves_kv_update column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByItemType($order = Criteria::ASC) Order by the item_type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByItemEvent($order = Criteria::ASC) Order by the item_event column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery orderByTouched($order = Criteria::ASC) Order by the touched column
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByIdYvesKvUpdate() Group by the id_yves_kv_update column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByItemType() Group by the item_type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByItemEvent() Group by the item_event column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByItemId() Group by the item_id column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery groupByTouched() Group by the touched column
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate matching the query
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate matching the query, or a new ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneByItemType(string $item_type) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate filtered by the item_type column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneByItemEvent(string $item_event) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate filtered by the item_event column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneByItemId(string $item_id) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate filtered by the item_id column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate filtered by the is_active column
 * @method ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate findOneByTouched(string $touched) Return the first ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate filtered by the touched column
 *
 * @method array findByIdYvesKvUpdate(int $id_yves_kv_update) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the id_yves_kv_update column
 * @method array findByItemType(string $item_type) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the item_type column
 * @method array findByItemEvent(string $item_event) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the item_event column
 * @method array findByItemId(string $item_id) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the item_id column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the is_active column
 * @method array findByTouched(string $touched) Return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate objects filtered by the touched column
 *
 * @package    propel.generator.vendor/project-a/frontend-package/ProjectA/Zed/Yves/Persistence.om
 */
abstract class Generated_Zed_Yves_Persistence_Om_BasePacYvesKvUpdateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Yves_Persistence_Om_BasePacYvesKvUpdateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery();
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
     * @return   ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate|ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdYvesKvUpdate($key, $con = null)
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
     * @return                 ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_yves_kv_update`, `item_type`, `item_event`, `item_id`, `is_active`, `touched` FROM `pac_yves_kv_update` WHERE `id_yves_kv_update` = :p0';
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
            $obj = new ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate();
            $obj->hydrate($row);
            ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate|ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_yves_kv_update column
     *
     * Example usage:
     * <code>
     * $query->filterByIdYvesKvUpdate(1234); // WHERE id_yves_kv_update = 1234
     * $query->filterByIdYvesKvUpdate(array(12, 34)); // WHERE id_yves_kv_update IN (12, 34)
     * $query->filterByIdYvesKvUpdate(array('min' => 12)); // WHERE id_yves_kv_update >= 12
     * $query->filterByIdYvesKvUpdate(array('max' => 12)); // WHERE id_yves_kv_update <= 12
     * </code>
     *
     * @param     mixed $idYvesKvUpdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByIdYvesKvUpdate($idYvesKvUpdate = null, $comparison = null)
    {
        if (is_array($idYvesKvUpdate)) {
            $useMinMax = false;
            if (isset($idYvesKvUpdate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $idYvesKvUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idYvesKvUpdate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $idYvesKvUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $idYvesKvUpdate, $comparison);
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ITEM_TYPE, $itemType, $comparison);
    }

    /**
     * Filter the query on the item_event column
     *
     * Example usage:
     * <code>
     * $query->filterByItemEvent('fooValue');   // WHERE item_event = 'fooValue'
     * $query->filterByItemEvent('%fooValue%'); // WHERE item_event LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemEvent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByItemEvent($itemEvent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemEvent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemEvent)) {
                $itemEvent = str_replace('*', '%', $itemEvent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ITEM_EVENT, $itemEvent, $comparison);
    }

    /**
     * Filter the query on the item_id column
     *
     * Example usage:
     * <code>
     * $query->filterByItemId('fooValue');   // WHERE item_id = 'fooValue'
     * $query->filterByItemId('%fooValue%'); // WHERE item_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemId)) {
                $itemId = str_replace('*', '%', $itemId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ITEM_ID, $itemId, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the touched column
     *
     * Example usage:
     * <code>
     * $query->filterByTouched('2011-03-14'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched('now'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched(array('max' => 'yesterday')); // WHERE touched > '2011-03-13'
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
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function filterByTouched($touched = null, $comparison = null)
    {
        if (is_array($touched)) {
            $useMinMax = false;
            if (isset($touched['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::TOUCHED, $touched['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($touched['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::TOUCHED, $touched['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::TOUCHED, $touched, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate $pacYvesKvUpdate Object to remove from the list of results
     *
     * @return ProjectA_Zed_Yves_Persistence_PacYvesKvUpdateQuery The current query, for fluid interface
     */
    public function prune($pacYvesKvUpdate = null)
    {
        if ($pacYvesKvUpdate) {
            $this->addUsingAlias(ProjectA_Zed_Yves_Persistence_PacYvesKvUpdatePeer::ID_YVES_KV_UPDATE, $pacYvesKvUpdate->getIdYvesKvUpdate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
