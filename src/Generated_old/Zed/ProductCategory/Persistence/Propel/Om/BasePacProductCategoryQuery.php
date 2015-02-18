<?php


/**
 * Base class that represents a query for the 'pac_product_category' table.
 *
 *
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery orderByFkCategoryNode($order = Criteria::ASC) Order by the fk_category_node column
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery groupByFkProduct() Group by the fk_product column
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery groupByFkCategoryNode() Group by the fk_category_node column
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery leftJoinPacCategoryNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCategoryNode relation
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery rightJoinPacCategoryNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCategoryNode relation
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery innerJoinPacCategoryNode($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCategoryNode relation
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery leftJoinPacProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery rightJoinPacProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery innerJoinPacProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProduct relation
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory matching the query
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory matching the query, or a new ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory findOneByFkProduct(int $fk_product) Return the first ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory filtered by the fk_product column
 * @method ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory findOneByFkCategoryNode(int $fk_category_node) Return the first ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory filtered by the fk_category_node column
 *
 * @method array findByFkProduct(int $fk_product) Return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects filtered by the fk_product column
 * @method array findByFkCategoryNode(int $fk_category_node) Return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory objects filtered by the fk_category_node column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductCategory/Persistence/Propel.om
 */
abstract class Generated_Zed_ProductCategory_Persistence_Propel_Om_BasePacProductCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_ProductCategory_Persistence_Propel_Om_BasePacProductCategoryQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProductCategory']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$fk_product, $fk_category_node]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `fk_product`, `fk_category_node` FROM `pac_product_category` WHERE `fk_product` = :p0 AND `fk_category_node` = :p1';
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
            $obj = new ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory();
            $obj->hydrate($row);
            ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryNode(1234); // WHERE fk_category_node = 1234
     * $query->filterByFkCategoryNode(array(12, 34)); // WHERE fk_category_node IN (12, 34)
     * $query->filterByFkCategoryNode(array('min' => 12)); // WHERE fk_category_node >= 12
     * $query->filterByFkCategoryNode(array('max' => 12)); // WHERE fk_category_node <= 12
     * </code>
     *
     * @see       filterByPacCategoryNode()
     *
     * @param     mixed $fkCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCategoryNode($fkCategoryNode = null, $comparison = null)
    {
        if (is_array($fkCategoryNode)) {
            $useMinMax = false;
            if (isset($fkCategoryNode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $fkCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryNode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $fkCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $fkCategoryNode, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCategoryNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $pacCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($pacCategoryNode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE, $pacCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByPacCategoryNode() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCategoryNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function joinPacCategoryNode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCategoryNode');

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
            $this->addJoinObject($join, 'PacCategoryNode');
        }

        return $this;
    }

    /**
     * Use the PacCategoryNode relation PacCategoryNode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function usePacCategoryNodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCategoryNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCategoryNode', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProduct($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $pacProduct->getProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT, $pacProduct->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
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
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
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
     * @param   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory $pacProductCategory Object to remove from the list of results
     *
     * @return ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery The current query, for fluid interface
     */
    public function prune($pacProductCategory = null)
    {
        if ($pacProductCategory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_PRODUCT), $pacProductCategory->getFkProduct(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryPeer::FK_CATEGORY_NODE), $pacProductCategory->getFkCategoryNode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
