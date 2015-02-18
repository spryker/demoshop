<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByFkOmsOrderItemStatus($order = Criteria::ASC) Order by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByFkOmsOrderProcess($order = Criteria::ASC) Order by the fk_oms_order_process column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByFkSalesOrderItemBundle($order = Criteria::ASC) Order by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByLastStatusChange($order = Criteria::ASC) Order by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByVariety($order = Criteria::ASC) Order by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByFkOmsOrderItemStatus() Group by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByFkOmsOrderProcess() Group by the fk_oms_order_process column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByFkSalesOrderItemBundle() Group by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByLastStatusChange() Group by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByGrossPrice() Group by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByPriceToPay() Group by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByVariety() Group by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinSalesOrderItemBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinSalesOrderItemBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinSalesOrderItemBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItemBundle relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinStatusHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinStatusHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinStatusHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusHistory relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinEventTimeout($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventTimeout relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinEventTimeout($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventTimeout relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinEventTimeout($relationAlias = null) Adds a INNER JOIN clause to the query using the EventTimeout relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the fk_oms_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the fk_oms_order_process column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the fk_sales_order_item_bundle column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByLastStatusChange(string $last_status_change) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByName(string $name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneBySku(string $sku) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the sku column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByGrossPrice(int $gross_price) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByPriceToPay(int $price_to_pay) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByTaxPercentage(string $tax_percentage) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByVariety(string $variety) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the variety column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItem(int $id_sales_order_item) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the id_sales_order_item column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the fk_sales_order column
 * @method array findByFkOmsOrderItemStatus(int $fk_oms_order_item_status) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the fk_oms_order_item_status column
 * @method array findByFkOmsOrderProcess(int $fk_oms_order_process) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the fk_oms_order_process column
 * @method array findByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the fk_sales_order_item_bundle column
 * @method array findByLastStatusChange(string $last_status_change) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the last_status_change column
 * @method array findByName(string $name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the name column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the sku column
 * @method array findByGrossPrice(int $gross_price) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the gross_price column
 * @method array findByPriceToPay(int $price_to_pay) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the price_to_pay column
 * @method array findByTaxPercentage(string $tax_percentage) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the tax_percentage column
 * @method array findByVariety(string $variety) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the variety column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesOrderItem']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItem($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item`, `fk_sales_order`, `fk_oms_order_item_status`, `fk_oms_order_process`, `fk_sales_order_item_bundle`, `last_status_change`, `name`, `sku`, `gross_price`, `price_to_pay`, `tax_percentage`, `variety`, `created_at`, `updated_at` FROM `pac_sales_order_item` WHERE `id_sales_order_item` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItem(1234); // WHERE id_sales_order_item = 1234
     * $query->filterByIdSalesOrderItem(array(12, 34)); // WHERE id_sales_order_item IN (12, 34)
     * $query->filterByIdSalesOrderItem(array('min' => 12)); // WHERE id_sales_order_item >= 12
     * $query->filterByIdSalesOrderItem(array('max' => 12)); // WHERE id_sales_order_item <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order >= 12
     * $query->filterByFkSalesOrder(array('max' => 12)); // WHERE fk_sales_order <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderItemStatus(1234); // WHERE fk_oms_order_item_status = 1234
     * $query->filterByFkOmsOrderItemStatus(array(12, 34)); // WHERE fk_oms_order_item_status IN (12, 34)
     * $query->filterByFkOmsOrderItemStatus(array('min' => 12)); // WHERE fk_oms_order_item_status >= 12
     * $query->filterByFkOmsOrderItemStatus(array('max' => 12)); // WHERE fk_oms_order_item_status <= 12
     * </code>
     *
     * @see       filterByStatus()
     *
     * @param     mixed $fkOmsOrderItemStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderItemStatus($fkOmsOrderItemStatus = null, $comparison = null)
    {
        if (is_array($fkOmsOrderItemStatus)) {
            $useMinMax = false;
            if (isset($fkOmsOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $fkOmsOrderItemStatus, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderProcess(1234); // WHERE fk_oms_order_process = 1234
     * $query->filterByFkOmsOrderProcess(array(12, 34)); // WHERE fk_oms_order_process IN (12, 34)
     * $query->filterByFkOmsOrderProcess(array('min' => 12)); // WHERE fk_oms_order_process >= 12
     * $query->filterByFkOmsOrderProcess(array('max' => 12)); // WHERE fk_oms_order_process <= 12
     * </code>
     *
     * @see       filterByProcess()
     *
     * @param     mixed $fkOmsOrderProcess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderProcess($fkOmsOrderProcess = null, $comparison = null)
    {
        if (is_array($fkOmsOrderProcess)) {
            $useMinMax = false;
            if (isset($fkOmsOrderProcess['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderProcess['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemBundle($fkSalesOrderItemBundle = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemBundle)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemBundle['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemBundle['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle, $comparison);
    }

    /**
     * Filter the query on the last_status_change column
     *
     * Example usage:
     * <code>
     * $query->filterByLastStatusChange('2011-03-14'); // WHERE last_status_change = '2011-03-14'
     * $query->filterByLastStatusChange('now'); // WHERE last_status_change = '2011-03-14'
     * $query->filterByLastStatusChange(array('max' => 'yesterday')); // WHERE last_status_change < '2011-03-13'
     * </code>
     *
     * @param     mixed $lastStatusChange The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByLastStatusChange($lastStatusChange = null, $comparison = null)
    {
        if (is_array($lastStatusChange)) {
            $useMinMax = false;
            if (isset($lastStatusChange['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastStatusChange['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::SKU, $sku, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::VARIETY, $variety, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus|PropelObjectCollection $pacOmsOrderItemStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacOmsOrderItemStatus, $comparison = null)
    {
        if ($pacOmsOrderItemStatus instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->getIdOmsOrderItemStatus(), $comparison);
        } elseif ($pacOmsOrderItemStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_ITEM_STATUS, $pacOmsOrderItemStatus->toKeyValue('PrimaryKey', 'IdOmsOrderItemStatus'), $comparison);
        } else {
            throw new PropelException('filterByStatus() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Status relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Status');

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
            $this->addJoinObject($join, 'Status');
        }

        return $this;
    }

    /**
     * Use the Status relation PacOmsOrderItemStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery A secondary query class using the current class as primary query
     */
    public function useStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Status', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess|PropelObjectCollection $pacOmsOrderProcess The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProcess($pacOmsOrderProcess, $comparison = null)
    {
        if ($pacOmsOrderProcess instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $pacOmsOrderProcess->getIdOmsOrderProcess(), $comparison);
        } elseif ($pacOmsOrderProcess instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_OMS_ORDER_PROCESS, $pacOmsOrderProcess->toKeyValue('PrimaryKey', 'IdOmsOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinProcess($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Process');

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
            $this->addJoinObject($join, 'Process');
        }

        return $this;
    }

    /**
     * Use the Process relation PacOmsOrderProcess object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle|PropelObjectCollection $pacSalesOrderItemBundle The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderItemBundle($pacSalesOrderItemBundle, $comparison = null)
    {
        if ($pacSalesOrderItemBundle instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundle->getIdSalesOrderItemBundle(), $comparison);
        } elseif ($pacSalesOrderItemBundle instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_BUNDLE, $pacSalesOrderItemBundle->toKeyValue('PrimaryKey', 'IdSalesOrderItemBundle'), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSalesOrderItemBundle($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSalesOrderItemBundleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderItemBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItemBundle', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemBundleQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog|PropelObjectCollection $pacOmsTransitionLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTransitionLog($pacOmsTransitionLog, $comparison = null)
    {
        if ($pacOmsTransitionLog instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacOmsTransitionLog->getFkSalesOrderItem(), $comparison);
        } elseif ($pacOmsTransitionLog instanceof PropelObjectCollection) {
            return $this
                ->useTransitionLogQuery()
                ->filterByPrimaryKeys($pacOmsTransitionLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransitionLog() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransitionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinTransitionLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransitionLog');

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
            $this->addJoinObject($join, 'TransitionLog');
        }

        return $this;
    }

    /**
     * Use the TransitionLog relation PacOmsTransitionLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery A secondary query class using the current class as primary query
     */
    public function useTransitionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTransitionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransitionLog', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory|PropelObjectCollection $pacOmsOrderItemStatusHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusHistory($pacOmsOrderItemStatusHistory, $comparison = null)
    {
        if ($pacOmsOrderItemStatusHistory instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacOmsOrderItemStatusHistory->getFkSalesOrderItem(), $comparison);
        } elseif ($pacOmsOrderItemStatusHistory instanceof PropelObjectCollection) {
            return $this
                ->useStatusHistoryQuery()
                ->filterByPrimaryKeys($pacOmsOrderItemStatusHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStatusHistory() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinStatusHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusHistory');

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
            $this->addJoinObject($join, 'StatusHistory');
        }

        return $this;
    }

    /**
     * Use the StatusHistory relation PacOmsOrderItemStatusHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery A secondary query class using the current class as primary query
     */
    public function useStatusHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusHistory', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderItemStatusHistoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout|PropelObjectCollection $pacOmsEventTimeout  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventTimeout($pacOmsEventTimeout, $comparison = null)
    {
        if ($pacOmsEventTimeout instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacOmsEventTimeout->getFkSalesOrderItem(), $comparison);
        } elseif ($pacOmsEventTimeout instanceof PropelObjectCollection) {
            return $this
                ->useEventTimeoutQuery()
                ->filterByPrimaryKeys($pacOmsEventTimeout->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventTimeout() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeout or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventTimeout relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinEventTimeout($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventTimeout');

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
            $this->addJoinObject($join, 'EventTimeout');
        }

        return $this;
    }

    /**
     * Use the EventTimeout relation PacOmsEventTimeout object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery A secondary query class using the current class as primary query
     */
    public function useEventTimeoutQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventTimeout($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventTimeout', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsEventTimeoutQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption|PropelObjectCollection $pacSalesOrderItemOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacSalesOrderItemOption, $comparison = null)
    {
        if ($pacSalesOrderItemOption instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItemOption->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItemOption instanceof PropelObjectCollection) {
            return $this
                ->useOptionQuery()
                ->filterByPrimaryKeys($pacSalesOrderItemOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Option');

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
            $this->addJoinObject($join, 'Option');
        }

        return $this;
    }

    /**
     * Use the Option relation PacSalesOrderItemOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense|PropelObjectCollection $pacSalesExpense  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpense($pacSalesExpense, $comparison = null)
    {
        if ($pacSalesExpense instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesExpense->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesExpense instanceof PropelObjectCollection) {
            return $this
                ->useExpenseQuery()
                ->filterByPrimaryKeys($pacSalesExpense->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpense() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinExpense($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expense');

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
            $this->addJoinObject($join, 'Expense');
        }

        return $this;
    }

    /**
     * Use the Expense relation PacSalesExpense object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expense', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesDiscount->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesDiscount instanceof PropelObjectCollection) {
            return $this
                ->useDiscountQuery()
                ->filterByPrimaryKeys($pacSalesDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discount');

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
            $this->addJoinObject($join, 'Discount');
        }

        return $this;
    }

    /**
     * Use the Discount relation PacSalesDiscount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $pacSalesOrderItem Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItem = null)
    {
        if ($pacSalesOrderItem) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::CREATED_AT);
    }
}
