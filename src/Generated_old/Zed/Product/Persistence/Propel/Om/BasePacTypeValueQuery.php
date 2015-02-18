<?php


/**
 * Base class that represents a query for the 'pac_attribute_type_value' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery orderByLocaleId($order = Criteria::ASC) Order by the locale_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery groupById() Group by the id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery groupByTypeId() Group by the type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery groupByKey() Group by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery groupByLocaleId() Group by the locale_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacTypeValue object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOneByTypeId(int $type_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue filtered by the type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOneByKey(string $key) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue filtered by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOneByValue(string $value) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue filtered by the value column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacTypeValue findOneByLocaleId(int $locale_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacTypeValue filtered by the locale_id column
 *
 * @method array findById(int $id) Return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects filtered by the id column
 * @method array findByTypeId(int $type_id) Return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects filtered by the type_id column
 * @method array findByKey(string $key) Return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects filtered by the key column
 * @method array findByValue(string $value) Return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects filtered by the value column
 * @method array findByLocaleId(int $locale_id) Return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue objects filtered by the locale_id column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacTypeValueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacTypeValueQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacTypeValue']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacTypeValue|ProjectA_Zed_Product_Persistence_Propel_PacTypeValue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTypeValue A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTypeValue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `type_id`, `key`, `value`, `locale_id` FROM `pac_attribute_type_value` WHERE `id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacTypeValue();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValue|ProjectA_Zed_Product_Persistence_Propel_PacTypeValue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacTypeValue[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $key)) {
                $key = str_replace('*', '%', $key);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::KEY, $key, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the locale_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleId(1234); // WHERE locale_id = 1234
     * $query->filterByLocaleId(array(12, 34)); // WHERE locale_id IN (12, 34)
     * $query->filterByLocaleId(array('min' => 12)); // WHERE locale_id >= 12
     * $query->filterByLocaleId(array('max' => 12)); // WHERE locale_id <= 12
     * </code>
     *
     * @see       filterByLocale()
     *
     * @param     mixed $localeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function filterByLocaleId($localeId = null, $comparison = null)
    {
        if (is_array($localeId)) {
            $useMinMax = false;
            if (isset($localeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::LOCALE_ID, $localeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::LOCALE_ID, $localeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::LOCALE_ID, $localeId, $comparison);
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::LOCALE_ID, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::LOCALE_ID, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByLocale() only accepts arguments of type SprykerCore_Zed_Locale_Persistence_Propel_PacLocale or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Locale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Locale');

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
            $this->addJoinObject($join, 'Locale');
        }

        return $this;
    }

    /**
     * Use the Locale relation PacLocale object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery A secondary query class using the current class as primary query
     */
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTypeValue $pacTypeValue Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery The current query, for fluid interface
     */
    public function prune($pacTypeValue = null)
    {
        if ($pacTypeValue) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacTypeValuePeer::ID, $pacTypeValue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
