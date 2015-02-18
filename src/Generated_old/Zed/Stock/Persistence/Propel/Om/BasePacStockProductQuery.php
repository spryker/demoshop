<?php


/**
 * Base class that represents a query for the 'pac_stock_product' table.
 *
 *
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery orderByIdStockProduct($order = Criteria::ASC) Order by the id_stock_product column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery orderByFkStock($order = Criteria::ASC) Order by the fk_stock column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery orderByIsNeverOutOfStock($order = Criteria::ASC) Order by the is_never_out_of_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery groupByIdStockProduct() Group by the id_stock_product column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery groupByFkProduct() Group by the fk_product column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery groupByFkStock() Group by the fk_stock column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery groupByQuantity() Group by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery groupByIsNeverOutOfStock() Group by the is_never_out_of_stock column
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery leftJoinPacProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery rightJoinPacProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProduct relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery innerJoinPacProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProduct relation
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery leftJoinStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery rightJoinStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stock relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery innerJoinStock($relationAlias = null) Adds a INNER JOIN clause to the query using the Stock relation
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct matching the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct matching the query, or a new ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOneByFkProduct(int $fk_product) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct filtered by the fk_product column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOneByFkStock(int $fk_stock) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct filtered by the fk_stock column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOneByQuantity(int $quantity) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct filtered by the quantity column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct findOneByIsNeverOutOfStock(boolean $is_never_out_of_stock) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct filtered by the is_never_out_of_stock column
 *
 * @method array findByIdStockProduct(int $id_stock_product) Return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects filtered by the id_stock_product column
 * @method array findByFkProduct(int $fk_product) Return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects filtered by the fk_product column
 * @method array findByFkStock(int $fk_stock) Return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects filtered by the fk_stock column
 * @method array findByQuantity(int $quantity) Return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects filtered by the quantity column
 * @method array findByIsNeverOutOfStock(boolean $is_never_out_of_stock) Return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct objects filtered by the is_never_out_of_stock column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Stock/Persistence/Propel.om
 */
abstract class Generated_Zed_Stock_Persistence_Propel_Om_BasePacStockProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Stock_Persistence_Propel_Om_BasePacStockProductQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacStockProduct']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_stock_product`, `fk_product`, `fk_stock`, `quantity`, `is_never_out_of_stock` FROM `pac_stock_product` WHERE `id_stock_product` = :p0';
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
            $obj = new ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct();
            $obj->hydrate($row);
            ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $keys, Criteria::IN);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByIdStockProduct($idStockProduct = null, $comparison = null)
    {
        if (is_array($idStockProduct)) {
            $useMinMax = false;
            if (isset($idStockProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStockProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $idStockProduct, $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_PRODUCT, $fkProduct, $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByFkStock($fkStock = null, $comparison = null)
    {
        if (is_array($fkStock)) {
            $useMinMax = false;
            if (isset($fkStock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_STOCK, $fkStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkStock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_STOCK, $fkStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_STOCK, $fkStock, $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the is_never_out_of_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByIsNeverOutOfStock(true); // WHERE is_never_out_of_stock = true
     * $query->filterByIsNeverOutOfStock('yes'); // WHERE is_never_out_of_stock = true
     * </code>
     *
     * @param     boolean|string $isNeverOutOfStock The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function filterByIsNeverOutOfStock($isNeverOutOfStock = null, $comparison = null)
    {
        if (is_string($isNeverOutOfStock)) {
            $isNeverOutOfStock = in_array(strtolower($isNeverOutOfStock), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::IS_NEVER_OUT_OF_STOCK, $isNeverOutOfStock, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProduct object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProduct|PropelObjectCollection $pacProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProduct($pacProduct, $comparison = null)
    {
        if ($pacProduct instanceof ProjectA_Zed_Product_Persistence_Propel_PacProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_PRODUCT, $pacProduct->getProductId(), $comparison);
        } elseif ($pacProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_PRODUCT, $pacProduct->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_Propel_PacStock object
     *
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStock|PropelObjectCollection $pacStock The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStock($pacStock, $comparison = null)
    {
        if ($pacStock instanceof ProjectA_Zed_Stock_Persistence_Propel_PacStock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_STOCK, $pacStock->getIdStock(), $comparison);
        } elseif ($pacStock instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::FK_STOCK, $pacStock->toKeyValue('PrimaryKey', 'IdStock'), $comparison);
        } else {
            throw new PropelException('filterByStock() only accepts arguments of type ProjectA_Zed_Stock_Persistence_Propel_PacStock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery A secondary query class using the current class as primary query
     */
    public function useStockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stock', 'ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct $pacStockProduct Object to remove from the list of results
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery The current query, for fluid interface
     */
    public function prune($pacStockProduct = null)
    {
        if ($pacStockProduct) {
            $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockProductPeer::ID_STOCK_PRODUCT, $pacStockProduct->getIdStockProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
