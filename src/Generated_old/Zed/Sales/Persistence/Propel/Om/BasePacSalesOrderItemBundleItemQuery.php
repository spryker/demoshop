<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item_bundle_item' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByIdSalesOrderItemBundleItem($order = Criteria::ASC) Order by the id_sales_order_item_bundle_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByFkSalesOrderItemBundle($order = Criteria::ASC) Order by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByVariety($order = Criteria::ASC) Order by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByIdSalesOrderItemBundleItem() Group by the id_sales_order_item_bundle_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByFkSalesOrderItemBundle() Group by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByGrossPrice() Group by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByVariety() Group by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery leftJoinSalesOrderItemBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery rightJoinSalesOrderItemBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery innerJoinSalesOrderItemBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItemBundle relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByName(string $name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneBySku(string $sku) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByGrossPrice(int $gross_price) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByTaxPercentage(string $tax_percentage) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByVariety(string $variety) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItemBundleItem(int $id_sales_order_item_bundle_item) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the id_sales_order_item_bundle_item column
 * @method array findByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the fk_sales_order_item_bundle column
 * @method array findByName(string $name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the name column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the sku column
 * @method array findByGrossPrice(int $gross_price) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the gross_price column
 * @method array findByTaxPercentage(string $tax_percentage) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the tax_percentage column
 * @method array findByVariety(string $variety) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the variety column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemBundleItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemBundleItemQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesOrderItemBundleItem']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItemBundleItem($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item_bundle_item`, `fk_sales_order_item_bundle`, `name`, `sku`, `gross_price`, `tax_percentage`, `variety`, `created_at`, `updated_at` FROM `pac_sales_order_item_bundle_item` WHERE `id_sales_order_item_bundle_item` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_bundle_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemBundleItem(1234); // WHERE id_sales_order_item_bundle_item = 1234
     * $query->filterByIdSalesOrderItemBundleItem(array(12, 34)); // WHERE id_sales_order_item_bundle_item IN (12, 34)
     * $query->filterByIdSalesOrderItemBundleItem(array('min' => 12)); // WHERE id_sales_order_item_bundle_item >= 12
     * $query->filterByIdSalesOrderItemBundleItem(array('max' => 12)); // WHERE id_sales_order_item_bundle_item <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemBundleItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemBundleItem($idSalesOrderItemBundleItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemBundleItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemBundleItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemBundleItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_bundle column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemBundle(1234); // WHERE fk_sales_order_item_bundle = 1234
     * $query->filterByFkSalesOrderItemBundle(array(12, 34)); // WHERE fk_sales_order_item_bundle IN (12, 34)
     * $query->filterByFkSalesOrderItemBundle(array('min' => 12)); // WHERE fk_sales_order_item_bundle >= 12
     * $query->filterByFkSalesOrderItemBundle(array('max' => 12)); // WHERE fk_sales_order_item_bundle <= 12
     * </code>
     *
     * @see       filterBySalesOrderItemBundle()
     *
     * @param     mixed $fkSalesOrderItemBundle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemBundle($fkSalesOrderItemBundle = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemBundle)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemBundle['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemBundle['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the gross_price column
     *
     * Example usage:
     * <code>
     * $query->filterByGrossPrice(1234); // WHERE gross_price = 1234
     * $query->filterByGrossPrice(array(12, 34)); // WHERE gross_price IN (12, 34)
     * $query->filterByGrossPrice(array('min' => 12)); // WHERE gross_price >= 12
     * $query->filterByGrossPrice(array('max' => 12)); // WHERE gross_price <= 12
     * </code>
     *
     * @param     mixed $grossPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::GROSS_PRICE, $grossPrice, $comparison);
    }

    /**
     * Filter the query on the tax_percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxPercentage(1234); // WHERE tax_percentage = 1234
     * $query->filterByTaxPercentage(array(12, 34)); // WHERE tax_percentage IN (12, 34)
     * $query->filterByTaxPercentage(array('min' => 12)); // WHERE tax_percentage >= 12
     * $query->filterByTaxPercentage(array('max' => 12)); // WHERE tax_percentage <= 12
     * </code>
     *
     * @param     mixed $taxPercentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the variety column
     *
     * Example usage:
     * <code>
     * $query->filterByVariety('fooValue');   // WHERE variety = 'fooValue'
     * $query->filterByVariety('%fooValue%'); // WHERE variety LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variety The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByVariety($variety = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variety)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variety)) {
                $variety = str_replace('*', '%', $variety);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::VARIETY, $variety, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle|PropelObjectCollection $pacSalesOrderItemBundle The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderItemBundle($pacSalesOrderItemBundle, $comparison = null)
    {
        if ($pacSalesOrderItemBundle instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundle->getIdSalesOrderItemBundle(), $comparison);
        } elseif ($pacSalesOrderItemBundle instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundle->toKeyValue('PrimaryKey', 'IdSalesOrderItemBundle'), $comparison);
        } else {
            throw new PropelException('filterBySalesOrderItemBundle() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderItemBundle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function joinSalesOrderItemBundle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderItemBundle');

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
            $this->addJoinObject($join, 'SalesOrderItemBundle');
        }

        return $this;
    }

    /**
     * Use the SalesOrderItemBundle relation PacSalesOrderItemBundle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderItemBundleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderItemBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItemBundle', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem $pacSalesOrderItemBundleItem Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItemBundleItem = null)
    {
        if ($pacSalesOrderItemBundleItem) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $pacSalesOrderItemBundleItem->getIdSalesOrderItemBundleItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemPeer::CREATED_AT);
    }
}
