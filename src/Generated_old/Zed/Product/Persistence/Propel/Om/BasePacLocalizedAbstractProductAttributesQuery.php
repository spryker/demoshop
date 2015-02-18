<?php


/**
 * Base class that represents a query for the 'pac_abstract_product_localized_attributes' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery orderByAttributesId($order = Criteria::ASC) Order by the attributes_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery orderByAbstractProductId($order = Criteria::ASC) Order by the abstract_product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery orderByLocaleId($order = Criteria::ASC) Order by the locale_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery orderByAttributes($order = Criteria::ASC) Order by the attributes column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery groupByAttributesId() Group by the attributes_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery groupByAbstractProductId() Group by the abstract_product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery groupByLocaleId() Group by the locale_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery groupByAttributes() Group by the attributes column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery leftJoinPacAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacAbstractProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery rightJoinPacAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacAbstractProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery innerJoinPacAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacAbstractProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOneByAbstractProductId(int $abstract_product_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes filtered by the abstract_product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOneByLocaleId(int $locale_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes filtered by the locale_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOneByName(string $name) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes filtered by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes findOneByAttributes(string $attributes) Return the first ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes filtered by the attributes column
 *
 * @method array findByAttributesId(int $attributes_id) Return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects filtered by the attributes_id column
 * @method array findByAbstractProductId(int $abstract_product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects filtered by the abstract_product_id column
 * @method array findByLocaleId(int $locale_id) Return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects filtered by the locale_id column
 * @method array findByName(string $name) Return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects filtered by the name column
 * @method array findByAttributes(string $attributes) Return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes objects filtered by the attributes column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacLocalizedAbstractProductAttributesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacLocalizedAbstractProductAttributesQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacLocalizedAbstractProductAttributes']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAttributesId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `attributes_id`, `abstract_product_id`, `locale_id`, `name`, `attributes` FROM `pac_abstract_product_localized_attributes` WHERE `attributes_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the attributes_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributesId(1234); // WHERE attributes_id = 1234
     * $query->filterByAttributesId(array(12, 34)); // WHERE attributes_id IN (12, 34)
     * $query->filterByAttributesId(array('min' => 12)); // WHERE attributes_id >= 12
     * $query->filterByAttributesId(array('max' => 12)); // WHERE attributes_id <= 12
     * </code>
     *
     * @param     mixed $attributesId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByAttributesId($attributesId = null, $comparison = null)
    {
        if (is_array($attributesId)) {
            $useMinMax = false;
            if (isset($attributesId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $attributesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($attributesId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $attributesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $attributesId, $comparison);
    }

    /**
     * Filter the query on the abstract_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAbstractProductId(1234); // WHERE abstract_product_id = 1234
     * $query->filterByAbstractProductId(array(12, 34)); // WHERE abstract_product_id IN (12, 34)
     * $query->filterByAbstractProductId(array('min' => 12)); // WHERE abstract_product_id >= 12
     * $query->filterByAbstractProductId(array('max' => 12)); // WHERE abstract_product_id <= 12
     * </code>
     *
     * @see       filterByPacAbstractProduct()
     *
     * @param     mixed $abstractProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByAbstractProductId($abstractProductId = null, $comparison = null)
    {
        if (is_array($abstractProductId)) {
            $useMinMax = false;
            if (isset($abstractProductId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($abstractProductId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ABSTRACT_PRODUCT_ID, $abstractProductId, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByLocaleId($localeId = null, $comparison = null)
    {
        if (is_array($localeId)) {
            $useMinMax = false;
            if (isset($localeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::LOCALE_ID, $localeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::LOCALE_ID, $localeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::LOCALE_ID, $localeId, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributes('fooValue');   // WHERE attributes = 'fooValue'
     * $query->filterByAttributes('%fooValue%'); // WHERE attributes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByAttributes($attributes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attributes)) {
                $attributes = str_replace('*', '%', $attributes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES, $attributes, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct|PropelObjectCollection $pacAbstractProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacAbstractProduct($pacAbstractProduct, $comparison = null)
    {
        if ($pacAbstractProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ABSTRACT_PRODUCT_ID, $pacAbstractProduct->getAbstractProductId(), $comparison);
        } elseif ($pacAbstractProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ABSTRACT_PRODUCT_ID, $pacAbstractProduct->toKeyValue('PrimaryKey', 'AbstractProductId'), $comparison);
        } else {
            throw new PropelException('filterByPacAbstractProduct() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacAbstractProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function joinPacAbstractProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacAbstractProduct');

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
            $this->addJoinObject($join, 'PacAbstractProduct');
        }

        return $this;
    }

    /**
     * Use the PacAbstractProduct relation PacAbstractProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function usePacAbstractProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacAbstractProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery');
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::LOCALE_ID, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::LOCALE_ID, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes $pacLocalizedAbstractProductAttributes Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function prune($pacLocalizedAbstractProductAttributes = null)
    {
        if ($pacLocalizedAbstractProductAttributes) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributesPeer::ATTRIBUTES_ID, $pacLocalizedAbstractProductAttributes->getAttributesId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
