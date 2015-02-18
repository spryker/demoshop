<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item_bundle' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByIdSalesOrderItemBundle($order = Criteria::ASC) Order by the id_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByBundleType($order = Criteria::ASC) Order by the bundle_type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByIdSalesOrderItemBundle() Group by the id_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByGrossPrice() Group by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByPriceToPay() Group by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByBundleType() Group by the bundle_type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery leftJoinSalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery rightJoinSalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery innerJoinSalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery leftJoinSalesOrderItemBundleItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItemBundleItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery rightJoinSalesOrderItemBundleItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItemBundleItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery innerJoinSalesOrderItemBundleItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItemBundleItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByName(string $name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneBySku(string $sku) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByGrossPrice(int $gross_price) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByPriceToPay(int $price_to_pay) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByTaxPercentage(string $tax_percentage) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByBundleType(string $bundle_type) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the bundle_type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItemBundle(int $id_sales_order_item_bundle) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the id_sales_order_item_bundle column
 * @method array findByName(string $name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the name column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the sku column
 * @method array findByGrossPrice(int $gross_price) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the gross_price column
 * @method array findByPriceToPay(int $price_to_pay) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the price_to_pay column
 * @method array findByTaxPercentage(string $tax_percentage) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the tax_percentage column
 * @method array findByBundleType(string $bundle_type) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the bundle_type column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemBundleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemBundleQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesOrderItemBundle']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItemBundle($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item_bundle`, `name`, `sku`, `gross_price`, `price_to_pay`, `tax_percentage`, `bundle_type`, `created_at`, `updated_at` FROM `pac_sales_order_item_bundle` WHERE `id_sales_order_item_bundle` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_bundle column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemBundle(1234); // WHERE id_sales_order_item_bundle = 1234
     * $query->filterByIdSalesOrderItemBundle(array(12, 34)); // WHERE id_sales_order_item_bundle IN (12, 34)
     * $query->filterByIdSalesOrderItemBundle(array('min' => 12)); // WHERE id_sales_order_item_bundle >= 12
     * $query->filterByIdSalesOrderItemBundle(array('max' => 12)); // WHERE id_sales_order_item_bundle <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemBundle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemBundle($idSalesOrderItemBundle = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemBundle)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemBundle['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $idSalesOrderItemBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemBundle['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $idSalesOrderItemBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $idSalesOrderItemBundle, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::SKU, $sku, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::GROSS_PRICE, $grossPrice, $comparison);
    }

    /**
     * Filter the query on the price_to_pay column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceToPay(1234); // WHERE price_to_pay = 1234
     * $query->filterByPriceToPay(array(12, 34)); // WHERE price_to_pay IN (12, 34)
     * $query->filterByPriceToPay(array('min' => 12)); // WHERE price_to_pay >= 12
     * $query->filterByPriceToPay(array('max' => 12)); // WHERE price_to_pay <= 12
     * </code>
     *
     * @param     mixed $priceToPay The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::PRICE_TO_PAY, $priceToPay, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the bundle_type column
     *
     * Example usage:
     * <code>
     * $query->filterByBundleType('fooValue');   // WHERE bundle_type = 'fooValue'
     * $query->filterByBundleType('%fooValue%'); // WHERE bundle_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bundleType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByBundleType($bundleType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bundleType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bundleType)) {
                $bundleType = str_replace('*', '%', $bundleType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::BUNDLE_TYPE, $bundleType, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItem->getFkSalesOrderItemBundle(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            return $this
                ->useSalesOrderItemQuery()
                ->filterByPrimaryKeys($pacSalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function joinSalesOrderItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderItem');

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
            $this->addJoinObject($join, 'SalesOrderItem');
        }

        return $this;
    }

    /**
     * Use the SalesOrderItem relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem|PropelObjectCollection $pacSalesOrderItemBundleItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderItemBundleItem($pacSalesOrderItemBundleItem, $comparison = null)
    {
        if ($pacSalesOrderItemBundleItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundleItem->getFkSalesOrderItemBundle(), $comparison);
        } elseif ($pacSalesOrderItemBundleItem instanceof PropelObjectCollection) {
            return $this
                ->useSalesOrderItemBundleItemQuery()
                ->filterByPrimaryKeys($pacSalesOrderItemBundleItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderItemBundleItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderItemBundleItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function joinSalesOrderItemBundleItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderItemBundleItem');

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
            $this->addJoinObject($join, 'SalesOrderItemBundleItem');
        }

        return $this;
    }

    /**
     * Use the SalesOrderItemBundleItem relation PacSalesOrderItemBundleItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderItemBundleItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderItemBundleItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItemBundleItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle $pacSalesOrderItemBundle Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItemBundle = null)
    {
        if ($pacSalesOrderItemBundle) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::ID_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundle->getIdSalesOrderItemBundle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundlePeer::CREATED_AT);
    }
}
