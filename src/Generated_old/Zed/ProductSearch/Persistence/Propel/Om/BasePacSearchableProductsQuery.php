<?php


/**
 * Base class that represents a query for the 'pac_searchable_products' table.
 *
 *
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery orderBySearchableId($order = Criteria::ASC) Order by the searchable_id column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery orderByIsSearchable($order = Criteria::ASC) Order by the is_searchable column
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery groupBySearchableId() Group by the searchable_id column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery groupByFkProduct() Group by the fk_product column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery groupByFkLocale() Group by the fk_locale column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery groupByIsSearchable() Group by the is_searchable column
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery leftJoinPacProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery rightJoinPacProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery innerJoinPacProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProduct relation
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery leftJoinPacLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocale relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery rightJoinPacLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocale relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery innerJoinPacLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocale relation
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts findOne(PropelPDO $con = null) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts matching the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts matching the query, or a new ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts findOneByFkProduct(int $fk_product) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts filtered by the fk_product column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts findOneByFkLocale(int $fk_locale) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts filtered by the fk_locale column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts findOneByIsSearchable(boolean $is_searchable) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts filtered by the is_searchable column
 *
 * @method array findBySearchableId(int $searchable_id) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects filtered by the searchable_id column
 * @method array findByFkProduct(int $fk_product) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects filtered by the fk_product column
 * @method array findByFkLocale(int $fk_locale) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects filtered by the fk_locale column
 * @method array findByIsSearchable(boolean $is_searchable) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts objects filtered by the is_searchable column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductSearch/Persistence/Propel.om
 */
abstract class Generated_Zed_ProductSearch_Persistence_Propel_Om_BasePacSearchableProductsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_ProductSearch_Persistence_Propel_Om_BasePacSearchableProductsQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSearchableProducts']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySearchableId($key, $con = null)
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
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `searchable_id`, `fk_product`, `fk_locale`, `is_searchable` FROM `pac_searchable_products` WHERE `searchable_id` = :p0';
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
            $obj = new ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts();
            $obj->hydrate($row);
            ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the searchable_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySearchableId(1234); // WHERE searchable_id = 1234
     * $query->filterBySearchableId(array(12, 34)); // WHERE searchable_id IN (12, 34)
     * $query->filterBySearchableId(array('min' => 12)); // WHERE searchable_id >= 12
     * $query->filterBySearchableId(array('max' => 12)); // WHERE searchable_id <= 12
     * </code>
     *
     * @param     mixed $searchableId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterBySearchableId($searchableId = null, $comparison = null)
    {
        if (is_array($searchableId)) {
            $useMinMax = false;
            if (isset($searchableId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $searchableId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($searchableId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $searchableId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $searchableId, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product >= 12
     * $query->filterByFkProduct(array('max' => 12)); // WHERE fk_product <= 12
     * </code>
     *
     * @see       filterByPacProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByFkLocale(1234); // WHERE fk_locale = 1234
     * $query->filterByFkLocale(array(12, 34)); // WHERE fk_locale IN (12, 34)
     * $query->filterByFkLocale(array('min' => 12)); // WHERE fk_locale >= 12
     * $query->filterByFkLocale(array('max' => 12)); // WHERE fk_locale <= 12
     * </code>
     *
     * @see       filterByPacLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the is_searchable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSearchable(true); // WHERE is_searchable = true
     * $query->filterByIsSearchable('yes'); // WHERE is_searchable = true
     * </code>
     *
     * @param     boolean|string $isSearchable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function filterByIsSearchable($isSearchable = null, $comparison = null)
    {
        if (is_string($isSearchable)) {
            $isSearchable = in_array(strtolower($isSearchable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::IS_SEARCHABLE, $isSearchable, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProduct($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_PRODUCT, $pacProduct->getProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_PRODUCT, $pacProduct->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterByPacProduct() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function joinPacProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProduct');

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
            $this->addJoinObject($join, 'PacProduct');
        }

        return $this;
    }

    /**
     * Use the PacProduct relation PacProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductQuery A secondary query class using the current class as primary query
     */
    public function usePacProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProductQuery');
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_LOCALE, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::FK_LOCALE, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByPacLocale() only accepts arguments of type SprykerCore_Zed_Locale_Persistence_Propel_PacLocale or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacLocale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function joinPacLocale($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacLocale');

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
            $this->addJoinObject($join, 'PacLocale');
        }

        return $this;
    }

    /**
     * Use the PacLocale relation PacLocale object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery A secondary query class using the current class as primary query
     */
    public function usePacLocaleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacLocale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts $pacSearchableProducts Object to remove from the list of results
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsQuery The current query, for fluid interface
     */
    public function prune($pacSearchableProducts = null)
    {
        if ($pacSearchableProducts) {
            $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProductsPeer::SEARCHABLE_ID, $pacSearchableProducts->getSearchableId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
