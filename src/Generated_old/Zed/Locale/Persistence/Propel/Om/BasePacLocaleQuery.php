<?php


/**
 * Base class that represents a query for the 'pac_locale' table.
 *
 *
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery orderByIdLocale($order = Criteria::ASC) Order by the id_locale column
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery orderByLocaleName($order = Criteria::ASC) Order by the locale_name column
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery groupByIdLocale() Group by the id_locale column
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery groupByLocaleName() Group by the locale_name column
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery groupByIsActive() Group by the is_active column
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacCategoryTreeAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCategoryTreeAttribute relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacCategoryTreeAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCategoryTreeAttribute relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacCategoryTreeAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCategoryTreeAttribute relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacGlossaryTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryTranslation relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacGlossaryTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryTranslation relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacGlossaryTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryTranslation relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacLocalizedProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacLocalizedProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacLocalizedProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocalizedProductAttributes relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacTax($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacTax relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacTax($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacTax relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacTax($relationAlias = null) Adds a INNER JOIN clause to the query using the PacTax relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacTypeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacTypeValue relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacTypeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacTypeValue relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacTypeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the PacTypeValue relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery leftJoinPacSearchableProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacSearchableProducts relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery rightJoinPacSearchableProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacSearchableProducts relation
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery innerJoinPacSearchableProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the PacSearchableProducts relation
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocale findOne(PropelPDO $con = null) Return the first SprykerCore_Zed_Locale_Persistence_Propel_PacLocale matching the query
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocale findOneOrCreate(PropelPDO $con = null) Return the first SprykerCore_Zed_Locale_Persistence_Propel_PacLocale matching the query, or a new SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object populated from the query conditions when no match is found
 *
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocale findOneByLocaleName(string $locale_name) Return the first SprykerCore_Zed_Locale_Persistence_Propel_PacLocale filtered by the locale_name column
 * @method SprykerCore_Zed_Locale_Persistence_Propel_PacLocale findOneByIsActive(boolean $is_active) Return the first SprykerCore_Zed_Locale_Persistence_Propel_PacLocale filtered by the is_active column
 *
 * @method array findByIdLocale(int $id_locale) Return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale objects filtered by the id_locale column
 * @method array findByLocaleName(string $locale_name) Return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale objects filtered by the locale_name column
 * @method array findByIsActive(boolean $is_active) Return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale objects filtered by the is_active column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Locale/Persistence/Propel.om
 */
abstract class Generated_Zed_Locale_Persistence_Propel_Om_BasePacLocaleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Locale_Persistence_Propel_Om_BasePacLocaleQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacLocale']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery) {
            return $criteria;
        }
        $query = new SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery(null, null, $modelAlias);

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
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|SprykerCore_Zed_Locale_Persistence_Propel_PacLocale[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocale A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLocale($key, $con = null)
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
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocale A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_locale`, `locale_name`, `is_active` FROM `pac_locale` WHERE `id_locale` = :p0';
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
            $obj = new SprykerCore_Zed_Locale_Persistence_Propel_PacLocale();
            $obj->hydrate($row);
            SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::addInstanceToPool($obj, (string) $key);
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|SprykerCore_Zed_Locale_Persistence_Propel_PacLocale[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SprykerCore_Zed_Locale_Persistence_Propel_PacLocale[]|mixed the list of results, formatted by the current formatter
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLocale(1234); // WHERE id_locale = 1234
     * $query->filterByIdLocale(array(12, 34)); // WHERE id_locale IN (12, 34)
     * $query->filterByIdLocale(array('min' => 12)); // WHERE id_locale >= 12
     * $query->filterByIdLocale(array('max' => 12)); // WHERE id_locale <= 12
     * </code>
     *
     * @param     mixed $idLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function filterByIdLocale($idLocale = null, $comparison = null)
    {
        if (is_array($idLocale)) {
            $useMinMax = false;
            if (isset($idLocale['min'])) {
                $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $idLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLocale['max'])) {
                $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $idLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $idLocale, $comparison);
    }

    /**
     * Filter the query on the locale_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleName('fooValue');   // WHERE locale_name = 'fooValue'
     * $query->filterByLocaleName('%fooValue%'); // WHERE locale_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $localeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function filterByLocaleName($localeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($localeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $localeName)) {
                $localeName = str_replace('*', '%', $localeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::LOCALE_NAME, $localeName, $comparison);
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
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute|PropelObjectCollection $pacCategoryTreeAttribute  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCategoryTreeAttribute($pacCategoryTreeAttribute, $comparison = null)
    {
        if ($pacCategoryTreeAttribute instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacCategoryTreeAttribute->getLocaleId(), $comparison);
        } elseif ($pacCategoryTreeAttribute instanceof PropelObjectCollection) {
            return $this
                ->usePacCategoryTreeAttributeQuery()
                ->filterByPrimaryKeys($pacCategoryTreeAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCategoryTreeAttribute() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCategoryTreeAttribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacCategoryTreeAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCategoryTreeAttribute');

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
            $this->addJoinObject($join, 'PacCategoryTreeAttribute');
        }

        return $this;
    }

    /**
     * Use the PacCategoryTreeAttribute relation PacCategoryTreeAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery A secondary query class using the current class as primary query
     */
    public function usePacCategoryTreeAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCategoryTreeAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCategoryTreeAttribute', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation|PropelObjectCollection $pacGlossaryTranslation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryTranslation($pacGlossaryTranslation, $comparison = null)
    {
        if ($pacGlossaryTranslation instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacGlossaryTranslation->getFkLocale(), $comparison);
        } elseif ($pacGlossaryTranslation instanceof PropelObjectCollection) {
            return $this
                ->usePacGlossaryTranslationQuery()
                ->filterByPrimaryKeys($pacGlossaryTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacGlossaryTranslation() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacGlossaryTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryTranslation');

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
            $this->addJoinObject($join, 'PacGlossaryTranslation');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryTranslation relation PacGlossaryTranslation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryTranslation', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes|PropelObjectCollection $pacLocalizedAbstractProductAttributes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocalizedAbstractProductAttributes($pacLocalizedAbstractProductAttributes, $comparison = null)
    {
        if ($pacLocalizedAbstractProductAttributes instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacLocalizedAbstractProductAttributes->getLocaleId(), $comparison);
        } elseif ($pacLocalizedAbstractProductAttributes instanceof PropelObjectCollection) {
            return $this
                ->usePacLocalizedAbstractProductAttributesQuery()
                ->filterByPrimaryKeys($pacLocalizedAbstractProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacLocalizedAbstractProductAttributes() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacLocalizedAbstractProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacLocalizedAbstractProductAttributes');

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
            $this->addJoinObject($join, 'PacLocalizedAbstractProductAttributes');
        }

        return $this;
    }

    /**
     * Use the PacLocalizedAbstractProductAttributes relation PacLocalizedAbstractProductAttributes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function usePacLocalizedAbstractProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacLocalizedAbstractProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacLocalizedAbstractProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes|PropelObjectCollection $pacLocalizedProductAttributes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocalizedProductAttributes($pacLocalizedProductAttributes, $comparison = null)
    {
        if ($pacLocalizedProductAttributes instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacLocalizedProductAttributes->getLocaleId(), $comparison);
        } elseif ($pacLocalizedProductAttributes instanceof PropelObjectCollection) {
            return $this
                ->usePacLocalizedProductAttributesQuery()
                ->filterByPrimaryKeys($pacLocalizedProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacLocalizedProductAttributes() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacLocalizedProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacLocalizedProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacLocalizedProductAttributes');

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
            $this->addJoinObject($join, 'PacLocalizedProductAttributes');
        }

        return $this;
    }

    /**
     * Use the PacLocalizedProductAttributes relation PacLocalizedProductAttributes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function usePacLocalizedProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacLocalizedProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacLocalizedProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributesQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacTax object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTax|PropelObjectCollection $pacTax  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacTax($pacTax, $comparison = null)
    {
        if ($pacTax instanceof ProjectA_Zed_Product_Persistence_Propel_PacTax) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacTax->getLocaleId(), $comparison);
        } elseif ($pacTax instanceof PropelObjectCollection) {
            return $this
                ->usePacTaxQuery()
                ->filterByPrimaryKeys($pacTax->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacTax() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacTax or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacTax relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacTax($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacTax');

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
            $this->addJoinObject($join, 'PacTax');
        }

        return $this;
    }

    /**
     * Use the PacTax relation PacTax object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery A secondary query class using the current class as primary query
     */
    public function usePacTaxQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacTax($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacTax', 'ProjectA_Zed_Product_Persistence_Propel_PacTaxQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacTypeValue object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacTypeValue|PropelObjectCollection $pacTypeValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacTypeValue($pacTypeValue, $comparison = null)
    {
        if ($pacTypeValue instanceof ProjectA_Zed_Product_Persistence_Propel_PacTypeValue) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacTypeValue->getLocaleId(), $comparison);
        } elseif ($pacTypeValue instanceof PropelObjectCollection) {
            return $this
                ->usePacTypeValueQuery()
                ->filterByPrimaryKeys($pacTypeValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacTypeValue() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacTypeValue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacTypeValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacTypeValue($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacTypeValue');

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
            $this->addJoinObject($join, 'PacTypeValue');
        }

        return $this;
    }

    /**
     * Use the PacTypeValue relation PacTypeValue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery A secondary query class using the current class as primary query
     */
    public function usePacTypeValueQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacTypeValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacTypeValue', 'ProjectA_Zed_Product_Persistence_Propel_PacTypeValueQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts object
     *
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts|PropelObjectCollection $pacSearchableProducts  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacSearchableProducts($pacSearchableProducts, $comparison = null)
    {
        if ($pacSearchableProducts instanceof ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts) {
            return $this
                ->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacSearchableProducts->getFkLocale(), $comparison);
        } elseif ($pacSearchableProducts instanceof PropelObjectCollection) {
            return $this
                ->usePacSearchableProductsQuery()
                ->filterByPrimaryKeys($pacSearchableProducts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacSearchableProducts() only accepts arguments of type ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacSearchableProducts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function joinPacSearchableProducts($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacSearchableProducts');

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
            $this->addJoinObject($join, 'PacSearchableProducts');
        }

        return $this;
    }

    /**
     * Use the PacSearchableProducts relation PacSearchableProducts object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery A secondary query class using the current class as primary query
     */
    public function usePacSearchableProductsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacSearchableProducts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacSearchableProducts', 'ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale $pacLocale Object to remove from the list of results
     *
     * @return SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery The current query, for fluid interface
     */
    public function prune($pacLocale = null)
    {
        if ($pacLocale) {
            $this->addUsingAlias(SprykerCore_Zed_Locale_Persistence_Propel_PacLocalePeer::ID_LOCALE, $pacLocale->getIdLocale(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
