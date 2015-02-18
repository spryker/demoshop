<?php


/**
 * Base class that represents a query for the 'pac_yves_export_touch' table.
 *
 *
 *
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByIdYvesExportTouch($order = Criteria::ASC) Order by the id_yves_export_touch column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByItemType($order = Criteria::ASC) Order by the item_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByItemEvent($order = Criteria::ASC) Order by the item_event column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByExportType($order = Criteria::ASC) Order by the export_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByItemId($order = Criteria::ASC) Order by the item_id column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery orderByTouched($order = Criteria::ASC) Order by the touched column
 *
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByIdYvesExportTouch() Group by the id_yves_export_touch column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByItemType() Group by the item_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByItemEvent() Group by the item_event column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByExportType() Group by the export_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByItemId() Group by the item_id column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery groupByTouched() Group by the touched column
 *
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOne(PropelPDO $con = null) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch matching the query
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch matching the query, or a new ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneByItemType(string $item_type) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch filtered by the item_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneByItemEvent(int $item_event) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch filtered by the item_event column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneByExportType(int $export_type) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch filtered by the export_type column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneByItemId(string $item_id) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch filtered by the item_id column
 * @method ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch findOneByTouched(string $touched) Return the first ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch filtered by the touched column
 *
 * @method array findByIdYvesExportTouch(int $id_yves_export_touch) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the id_yves_export_touch column
 * @method array findByItemType(string $item_type) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the item_type column
 * @method array findByItemEvent(int $item_event) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the item_event column
 * @method array findByExportType(int $export_type) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the export_type column
 * @method array findByItemId(string $item_id) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the item_id column
 * @method array findByTouched(string $touched) Return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch objects filtered by the touched column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/YvesExport/Persistence/Propel.om
 */
abstract class Generated_Zed_YvesExport_Persistence_Propel_Om_BasePacYvesExportTouchQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_YvesExport_Persistence_Propel_Om_BasePacYvesExportTouchQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacYvesExportTouch']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch|ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdYvesExportTouch($key, $con = null)
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
     * @return                 ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_yves_export_touch`, `item_type`, `item_event`, `export_type`, `item_id`, `touched` FROM `pac_yves_export_touch` WHERE `id_yves_export_touch` = :p0';
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
            $obj = new ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();
            $obj->hydrate($row);
            ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch|ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_yves_export_touch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdYvesExportTouch(1234); // WHERE id_yves_export_touch = 1234
     * $query->filterByIdYvesExportTouch(array(12, 34)); // WHERE id_yves_export_touch IN (12, 34)
     * $query->filterByIdYvesExportTouch(array('min' => 12)); // WHERE id_yves_export_touch >= 12
     * $query->filterByIdYvesExportTouch(array('max' => 12)); // WHERE id_yves_export_touch <= 12
     * </code>
     *
     * @param     mixed $idYvesExportTouch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     */
    public function filterByIdYvesExportTouch($idYvesExportTouch = null, $comparison = null)
    {
        if (is_array($idYvesExportTouch)) {
            $useMinMax = false;
            if (isset($idYvesExportTouch['min'])) {
                $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $idYvesExportTouch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idYvesExportTouch['max'])) {
                $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $idYvesExportTouch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $idYvesExportTouch, $comparison);
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
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_TYPE, $itemType, $comparison);
    }

    /**
     * Filter the query on the item_event column
     *
     * @param     mixed $itemEvent The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByItemEvent($itemEvent = null, $comparison = null)
    {
        if (is_scalar($itemEvent)) {
            $itemEvent = ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::getSqlValueForEnum(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT, $itemEvent);
        } elseif (is_array($itemEvent)) {
            $convertedValues = array();
            foreach ($itemEvent as $value) {
                $convertedValues[] = ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::getSqlValueForEnum(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT, $value);
            }
            $itemEvent = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT, $itemEvent, $comparison);
    }

    /**
     * Filter the query on the export_type column
     *
     * @param     mixed $exportType The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByExportType($exportType = null, $comparison = null)
    {
        if (is_scalar($exportType)) {
            $exportType = ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::getSqlValueForEnum(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE, $exportType);
        } elseif (is_array($exportType)) {
            $convertedValues = array();
            foreach ($exportType as $value) {
                $convertedValues[] = ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::getSqlValueForEnum(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE, $value);
            }
            $exportType = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE, $exportType, $comparison);
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
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_ID, $itemId, $comparison);
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
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     */
    public function filterByTouched($touched = null, $comparison = null)
    {
        if (is_array($touched)) {
            $useMinMax = false;
            if (isset($touched['min'])) {
                $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::TOUCHED, $touched['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($touched['max'])) {
                $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::TOUCHED, $touched['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::TOUCHED, $touched, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch $pacYvesExportTouch Object to remove from the list of results
     *
     * @return ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery The current query, for fluid interface
     */
    public function prune($pacYvesExportTouch = null)
    {
        if ($pacYvesExportTouch) {
            $this->addUsingAlias(ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ID_YVES_EXPORT_TOUCH, $pacYvesExportTouch->getIdYvesExportTouch(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
