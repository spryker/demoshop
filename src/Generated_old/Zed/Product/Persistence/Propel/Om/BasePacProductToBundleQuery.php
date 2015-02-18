<?php


/**
 * Base class that represents a query for the 'pac_product_to_bundle' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery orderByRelatedProductId($order = Criteria::ASC) Order by the related_product_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery groupByProductId() Group by the product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery groupByRelatedProductId() Group by the related_product_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery leftJoinPacProductRelatedByProductId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductRelatedByProductId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery rightJoinPacProductRelatedByProductId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductRelatedByProductId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery innerJoinPacProductRelatedByProductId($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductRelatedByProductId relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle findOneByProductId(int $product_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle filtered by the product_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle findOneByRelatedProductId(int $related_product_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle filtered by the related_product_id column
 *
 * @method array findByProductId(int $product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects filtered by the product_id column
 * @method array findByRelatedProductId(int $related_product_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle objects filtered by the related_product_id column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProductToBundleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacProductToBundleQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProductToBundle']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$product_id, $related_product_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `product_id`, `related_product_id` FROM `pac_product_to_bundle` WHERE `product_id` = :p0 AND `related_product_id` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByPacProductRelatedByProductId()
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the related_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRelatedProductId(1234); // WHERE related_product_id = 1234
     * $query->filterByRelatedProductId(array(12, 34)); // WHERE related_product_id IN (12, 34)
     * $query->filterByRelatedProductId(array('min' => 12)); // WHERE related_product_id >= 12
     * $query->filterByRelatedProductId(array('max' => 12)); // WHERE related_product_id <= 12
     * </code>
     *
     * @see       filterByBundleProduct()
     *
     * @param     mixed $relatedProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function filterByRelatedProductId($relatedProductId = null, $comparison = null)
    {
        if (is_array($relatedProductId)) {
            $useMinMax = false;
            if (isset($relatedProductId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $relatedProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($relatedProductId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $relatedProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $relatedProductId, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductRelatedByProductId($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $pacProduct->getProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID, $pacProduct->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterByPacProductRelatedByProductId() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductRelatedByProductId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function joinPacProductRelatedByProductId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductRelatedByProductId');

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
            $this->addJoinObject($join, 'PacProductRelatedByProductId');
        }

        return $this;
    }

    /**
     * Use the PacProductRelatedByProductId relation PacProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductQuery A secondary query class using the current class as primary query
     */
    public function usePacProductRelatedByProductIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductRelatedByProductId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductRelatedByProductId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBundleProduct($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $pacProduct->getProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID, $pacProduct->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterByBundleProduct() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
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
     * Use the BundleProduct relation PacProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductToBundle $pacProductToBundle Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductToBundleQuery The current query, for fluid interface
     */
    public function prune($pacProductToBundle = null)
    {
        if ($pacProductToBundle) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::PRODUCT_ID), $pacProductToBundle->getProductId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_Product_Persistence_Propel_PacProductToBundlePeer::RELATED_PRODUCT_ID), $pacProductToBundle->getRelatedProductId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
