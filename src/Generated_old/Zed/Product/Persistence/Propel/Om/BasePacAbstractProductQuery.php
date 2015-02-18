<?php


/**
 * Base class that represents a query for the 'pac_abstract_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery orderByAbstractProductId($order = Criteria::ASC) Order by the abstract_product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery groupByAbstractProductId() Group by the abstract_product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery groupBySku() Group by the sku column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery leftJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery rightJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery innerJoinPacLocalizedAbstractProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the PacLocalizedAbstractProductAttributes relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery leftJoinPacProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery rightJoinPacProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery innerJoinPacProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct findOneBySku(string $sku) Return the first ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct filtered by the sku column
 *
 * @method array findByAbstractProductId(int $abstract_product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct objects filtered by the abstract_product_id column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct objects filtered by the sku column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacAbstractProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacAbstractProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacAbstractProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct|ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAbstractProductId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `abstract_product_id`, `sku` FROM `pac_abstract_product` WHERE `abstract_product_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct|ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $keys, Criteria::IN);
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
     * @param     mixed $abstractProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     */
    public function filterByAbstractProductId($abstractProductId = null, $comparison = null)
    {
        if (is_array($abstractProductId)) {
            $useMinMax = false;
            if (isset($abstractProductId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($abstractProductId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $abstractProductId, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::SKU, $sku, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes|PropelObjectCollection $pacLocalizedAbstractProductAttributes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacLocalizedAbstractProductAttributes($pacLocalizedAbstractProductAttributes, $comparison = null)
    {
        if ($pacLocalizedAbstractProductAttributes instanceof ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $pacLocalizedAbstractProductAttributes->getAbstractProductId(), $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProduct($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $pacProduct->getAbstractProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            return $this
                ->usePacProductQuery()
                ->filterByPrimaryKeys($pacProduct->getPrimaryKeys())
                ->endUse();
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     */
    public function joinPacProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePacProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct $pacAbstractProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery The current query, for fluid interface
     */
    public function prune($pacAbstractProduct = null)
    {
        if ($pacAbstractProduct) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductPeer::ABSTRACT_PRODUCT_ID, $pacAbstractProduct->getAbstractProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
