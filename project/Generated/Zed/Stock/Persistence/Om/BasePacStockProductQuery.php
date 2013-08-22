<?php


/**
 * Base class that represents a query for the 'pac_stock_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery orderByIdStockProduct($order = Criteria::ASC) Order by the id_stock_product column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery orderByFkStock($order = Criteria::ASC) Order by the fk_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery groupByIdStockProduct() Group by the id_stock_product column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery groupByQuantity() Group by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery groupByFkStock() Group by the fk_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery leftJoinStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery rightJoinStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_PacStockProductQuery innerJoinStock($relationAlias = null) Adds a INNER JOIN clause to the query using the Stock relation
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockProduct matching the query
 * @method ProjectA_Zed_Stock_Persistence_PacStockProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_PacStockProduct matching the query, or a new ProjectA_Zed_Stock_Persistence_PacStockProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Stock_Persistence_PacStockProduct findOneByQuantity(int $quantity) Return the first ProjectA_Zed_Stock_Persistence_PacStockProduct filtered by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProduct findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Stock_Persistence_PacStockProduct filtered by the fk_catalog_product column
 * @method ProjectA_Zed_Stock_Persistence_PacStockProduct findOneByFkStock(int $fk_stock) Return the first ProjectA_Zed_Stock_Persistence_PacStockProduct filtered by the fk_stock column
 *
 * @method array findByIdStockProduct(int $id_stock_product) Return ProjectA_Zed_Stock_Persistence_PacStockProduct objects filtered by the id_stock_product column
 * @method array findByQuantity(int $quantity) Return ProjectA_Zed_Stock_Persistence_PacStockProduct objects filtered by the quantity column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Stock_Persistence_PacStockProduct objects filtered by the fk_catalog_product column
 * @method array findByFkStock(int $fk_stock) Return ProjectA_Zed_Stock_Persistence_PacStockProduct objects filtered by the fk_stock column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Stock/Persistence.om
 */
abstract class Generated_Zed_Stock_Persistence_Om_BasePacStockProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Stock_Persistence_Om_BasePacStockProductQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Stock_Persistence_PacStockProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Stock_Persistence_PacStockProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Stock_Persistence_PacStockProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Stock_Persistence_PacStockProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Stock_Persistence_PacStockProductQuery();
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
     * @return   ProjectA_Zed_Stock_Persistence_PacStockProduct|ProjectA_Zed_Stock_Persistence_PacStockProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Stock_Persistence_PacStockProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockProduct A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdStockProduct($key, $con = null)
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
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_stock_product`, `quantity`, `fk_catalog_product`, `fk_stock` FROM `pac_stock_product` WHERE `id_stock_product` = :p0';
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
            $obj = new ProjectA_Zed_Stock_Persistence_PacStockProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Stock_Persistence_PacStockProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockProduct|ProjectA_Zed_Stock_Persistence_PacStockProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_PacStockProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_stock_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStockProduct(1234); // WHERE id_stock_product = 1234
     * $query->filterByIdStockProduct(array(12, 34)); // WHERE id_stock_product IN (12, 34)
     * $query->filterByIdStockProduct(array('min' => 12)); // WHERE id_stock_product >= 12
     * $query->filterByIdStockProduct(array('max' => 12)); // WHERE id_stock_product <= 12
     * </code>
     *
     * @param     mixed $idStockProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByIdStockProduct($idStockProduct = null, $comparison = null)
    {
        if (is_array($idStockProduct)) {
            $useMinMax = false;
            if (isset($idStockProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStockProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity >= 12
     * $query->filterByQuantity(array('max' => 12)); // WHERE quantity <= 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProduct(1234); // WHERE fk_catalog_product = 1234
     * $query->filterByFkCatalogProduct(array(12, 34)); // WHERE fk_catalog_product IN (12, 34)
     * $query->filterByFkCatalogProduct(array('min' => 12)); // WHERE fk_catalog_product >= 12
     * $query->filterByFkCatalogProduct(array('max' => 12)); // WHERE fk_catalog_product <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query on the fk_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByFkStock(1234); // WHERE fk_stock = 1234
     * $query->filterByFkStock(array(12, 34)); // WHERE fk_stock IN (12, 34)
     * $query->filterByFkStock(array('min' => 12)); // WHERE fk_stock >= 12
     * $query->filterByFkStock(array('max' => 12)); // WHERE fk_stock <= 12
     * </code>
     *
     * @see       filterByStock()
     *
     * @param     mixed $fkStock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByFkStock($fkStock = null, $comparison = null)
    {
        if (is_array($fkStock)) {
            $useMinMax = false;
            if (isset($fkStock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_STOCK, $fkStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkStock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_STOCK, $fkStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_STOCK, $fkStock, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_PacStock object
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStock|PropelObjectCollection $pacStock The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStock($pacStock, $comparison = null)
    {
        if ($pacStock instanceof ProjectA_Zed_Stock_Persistence_PacStock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_STOCK, $pacStock->getIdStock(), $comparison);
        } elseif ($pacStock instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::FK_STOCK, $pacStock->toKeyValue('PrimaryKey', 'IdStock'), $comparison);
        } else {
            throw new PropelException('filterByStock() only accepts arguments of type ProjectA_Zed_Stock_Persistence_PacStock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function joinStock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stock');

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
            $this->addJoinObject($join, 'Stock');
        }

        return $this;
    }

    /**
     * Use the Stock relation PacStock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_PacStockQuery A secondary query class using the current class as primary query
     */
    public function useStockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stock', 'ProjectA_Zed_Stock_Persistence_PacStockQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Stock_Persistence_PacStockProduct $pacStockProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Stock_Persistence_PacStockProductQuery The current query, for fluid interface
     */
    public function prune($pacStockProduct = null)
    {
        if ($pacStockProduct) {
            $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_PacStockProductPeer::ID_STOCK_PRODUCT, $pacStockProduct->getIdStockProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
