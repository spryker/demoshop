<?php


/**
 * Base class that represents a query for the 'pac_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery orderByAbstractProductId($order = Criteria::ASC) Order by the abstract_product_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery groupByProductId() Group by the product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery groupByAbstractProductId() Group by the abstract_product_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinPacAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacAbstractProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinPacAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacAbstractProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinPacAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacAbstractProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinPacLocalizedProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinPacLocalizedProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocalizedProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinPacLocalizedProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocalizedProductAttributes relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinPacProductToBundleRelatedByProductId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductToBundleRelatedByProductId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinPacProductToBundleRelatedByProductId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductToBundleRelatedByProductId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinPacProductToBundleRelatedByProductId($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductToBundleRelatedByProductId relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinPacProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductCategory relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinPacProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductCategory relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinPacProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductCategory relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinPacSearchableProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacSearchableProducts relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinPacSearchableProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacSearchableProducts relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinPacSearchableProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the PacSearchableProducts relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery leftJoinStockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery rightJoinStockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductQuery innerJoinStockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the StockProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProduct matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProduct matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProduct findOneBySku(string $sku) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProduct filtered by the sku column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProduct findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProduct filtered by the is_active column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProduct findOneByAbstractProductId(int $abstract_product_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProduct filtered by the abstract_product_id column
 *
 * @method array findByProductId(int $product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProduct objects filtered by the product_id column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Product_Persistence_Propel_PacProduct objects filtered by the sku column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Product_Persistence_Propel_PacProduct objects filtered by the is_active column
 * @method array findByAbstractProductId(int $abstract_product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProduct objects filtered by the abstract_product_id column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProduct|ProjectA_Zed_Product_Persistence_Propel_PacProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByProductId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `product_id`, `sku`, `is_active`, `abstract_product_id` FROM `pac_product` WHERE `product_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProduct|ProjectA_Zed_Product_Persistence_Propel_PacProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id >= 12
     * $query->filterByProductId(array('max' => 12)); // WHERE product_id <= 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the sku column
     *
     * Example usage:
     * <code>
     * $query->filterBySku('fooValue');   // WHERE sku = 'fooValue'
     * $query->filterBySku('%fooValue%'); // WHERE sku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterBySku($sku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sku)) {
                $sku = str_replace('*', '%', $sku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::SKU, $sku, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::IS_ACTIVE, $isActive, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function filterByAbstractProductId($abstractProductId = null, $comparison = null)
    {
        if (is_array($abstractProductId)) {
            $useMinMax = false;
            if (isset($abstractProductId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($abstractProductId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct|PropelObjectCollection $pacAbstractProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacAbstractProduct($pacAbstractProduct, $comparison = null)
    {
        if ($pacAbstractProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $pacAbstractProduct->getAbstractProductId(), $comparison);
        } elseif ($pacAbstractProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::ABSTRACT_PRODUCT_ID, $pacAbstractProduct->toKeyValue('PrimaryKey', 'AbstractProductId'), $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes|PropelObjectCollection $pacLocalizedProductAttributes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocalizedProductAttributes($pacLocalizedProductAttributes, $comparison = null)
    {
        if ($pacLocalizedProductAttributes instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacLocalizedProductAttributes->getProductId(), $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle|PropelObjectCollection $pacProductToBundle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductToBundleRelatedByProductId($pacProductToBundle, $comparison = null)
    {
        if ($pacProductToBundle instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacProductToBundle->getProductId(), $comparison);
        } elseif ($pacProductToBundle instanceof PropelObjectCollection) {
            return $this
                ->usePacProductToBundleRelatedByProductIdQuery()
                ->filterByPrimaryKeys($pacProductToBundle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductToBundleRelatedByProductId() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductToBundleRelatedByProductId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function joinPacProductToBundleRelatedByProductId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductToBundleRelatedByProductId');

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
            $this->addJoinObject($join, 'PacProductToBundleRelatedByProductId');
        }

        return $this;
    }

    /**
     * Use the PacProductToBundleRelatedByProductId relation PacProductToBundle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery A secondary query class using the current class as primary query
     */
    public function usePacProductToBundleRelatedByProductIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductToBundleRelatedByProductId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductToBundleRelatedByProductId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle|PropelObjectCollection $pacProductToBundle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProduct($pacProductToBundle, $comparison = null)
    {
        if ($pacProductToBundle instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacProductToBundle->getRelatedProductId(), $comparison);
        } elseif ($pacProductToBundle instanceof PropelObjectCollection) {
            return $this
                ->useBundleProductQuery()
                ->filterByPrimaryKeys($pacProductToBundle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBundleProduct() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function joinBundleProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProduct');

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
            $this->addJoinObject($join, 'BundleProduct');
        }

        return $this;
    }

    /**
     * Use the BundleProduct relation PacProductToBundle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory object
     *
     * @param   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory|PropelObjectCollection $pacProductCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductCategory($pacProductCategory, $comparison = null)
    {
        if ($pacProductCategory instanceof ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacProductCategory->getFkProduct(), $comparison);
        } elseif ($pacProductCategory instanceof PropelObjectCollection) {
            return $this
                ->usePacProductCategoryQuery()
                ->filterByPrimaryKeys($pacProductCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductCategory() only accepts arguments of type ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function joinPacProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductCategory');

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
            $this->addJoinObject($join, 'PacProductCategory');
        }

        return $this;
    }

    /**
     * Use the PacProductCategory relation PacProductCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function usePacProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductCategory', 'ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts object
     *
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts|PropelObjectCollection $pacSearchableProducts  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacSearchableProducts($pacSearchableProducts, $comparison = null)
    {
        if ($pacSearchableProducts instanceof ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacSearchableProducts->getFkProduct(), $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct object
     *
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct|PropelObjectCollection $pacStockProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockProduct($pacStockProduct, $comparison = null)
    {
        if ($pacStockProduct instanceof ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacStockProduct->getFkProduct(), $comparison);
        } elseif ($pacStockProduct instanceof PropelObjectCollection) {
            return $this
                ->useStockProductQuery()
                ->filterByPrimaryKeys($pacStockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockProduct() only accepts arguments of type ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function joinStockProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockProduct');

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
            $this->addJoinObject($join, 'StockProduct');
        }

        return $this;
    }

    /**
     * Use the StockProduct relation PacStockProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery A secondary query class using the current class as primary query
     */
    public function useStockProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockProduct', 'ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct $pacProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductQuery The current query, for fluid interface
     */
    public function prune($pacProduct = null)
    {
        if ($pacProduct) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductPeer::PRODUCT_ID, $pacProduct->getProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
