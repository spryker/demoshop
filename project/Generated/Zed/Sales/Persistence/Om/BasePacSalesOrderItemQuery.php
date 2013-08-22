<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByFkSalesOrderItemStatus($order = Criteria::ASC) Order by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByFkSalesOrderProcess($order = Criteria::ASC) Order by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByLastStatusChange($order = Criteria::ASC) Order by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByPaidAmount($order = Criteria::ASC) Order by the paid_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByTaxAmount($order = Criteria::ASC) Order by the tax_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByToBeCaptured($order = Criteria::ASC) Order by the to_be_captured column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByToBeBilled($order = Criteria::ASC) Order by the to_be_billed column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByFkSalesOrderItemStatus() Group by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByFkSalesOrderProcess() Group by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByLastStatusChange() Group by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupBySku() Group by the sku column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByGrossPrice() Group by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByPriceToPay() Group by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByPaidAmount() Group by the paid_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByTaxAmount() Group by the tax_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByToBeCaptured() Group by the to_be_captured column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByToBeBilled() Group by the to_be_billed column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinInvoiceItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the InvoiceItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinInvoiceItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InvoiceItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinInvoiceItem($relationAlias = null) Adds a INNER JOIN clause to the query using the InvoiceItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinStatusHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinStatusHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusHistory relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinStatusHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusHistory relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinItemDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the ItemDiscount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinItemDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ItemDiscount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinItemDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the ItemDiscount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the QuoteItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the QuoteItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the QuoteItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinSaoSalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoSalesOrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinSaoSalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoSalesOrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinSaoSalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoSalesOrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery leftJoinSaoSalesOrderItemNotification($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoSalesOrderItemNotification relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery rightJoinSaoSalesOrderItemNotification($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoSalesOrderItemNotification relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery innerJoinSaoSalesOrderItemNotification($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoSalesOrderItemNotification relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem matching the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem matching the query, or a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByFkSalesOrderItemStatus(int $fk_sales_order_item_status) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the fk_sales_order_item_status column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByFkSalesOrderProcess(int $fk_sales_order_process) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByLastStatusChange(string $last_status_change) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the last_status_change column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByName(string $name) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneBySku(string $sku) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the sku column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByGrossPrice(int $gross_price) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByPriceToPay(int $price_to_pay) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByPaidAmount(int $paid_amount) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the paid_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByTaxAmount(int $tax_amount) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the tax_amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByTaxPercentage(string $tax_percentage) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByToBeCaptured(boolean $to_be_captured) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the to_be_captured column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByToBeBilled(boolean $to_be_billed) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the to_be_billed column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItem findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItem filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItem(int $id_sales_order_item) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the id_sales_order_item column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the fk_sales_order column
 * @method array findByFkSalesOrderItemStatus(int $fk_sales_order_item_status) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the fk_sales_order_item_status column
 * @method array findByFkSalesOrderProcess(int $fk_sales_order_process) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the fk_sales_order_process column
 * @method array findByLastStatusChange(string $last_status_change) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the last_status_change column
 * @method array findByName(string $name) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the name column
 * @method array findBySku(string $sku) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the sku column
 * @method array findByGrossPrice(int $gross_price) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the gross_price column
 * @method array findByPriceToPay(int $price_to_pay) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the price_to_pay column
 * @method array findByPaidAmount(int $paid_amount) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the paid_amount column
 * @method array findByTaxAmount(int $tax_amount) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the tax_amount column
 * @method array findByTaxPercentage(string $tax_percentage) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the tax_percentage column
 * @method array findByToBeCaptured(boolean $to_be_captured) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the to_be_captured column
 * @method array findByToBeBilled(boolean $to_be_billed) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the to_be_billed column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery();
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItem A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item`, `fk_sales_order`, `fk_sales_order_item_status`, `fk_sales_order_process`, `last_status_change`, `name`, `sku`, `gross_price`, `price_to_pay`, `paid_amount`, `tax_amount`, `tax_percentage`, `to_be_captured`, `to_be_billed`, `created_at`, `updated_at` FROM `pac_sales_order_item` WHERE `id_sales_order_item` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItem();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $keys, Criteria::IN);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemStatus(1234); // WHERE fk_sales_order_item_status = 1234
     * $query->filterByFkSalesOrderItemStatus(array(12, 34)); // WHERE fk_sales_order_item_status IN (12, 34)
     * $query->filterByFkSalesOrderItemStatus(array('min' => 12)); // WHERE fk_sales_order_item_status >= 12
     * $query->filterByFkSalesOrderItemStatus(array('max' => 12)); // WHERE fk_sales_order_item_status <= 12
     * </code>
     *
     * @see       filterByStatus()
     *
     * @param     mixed $fkSalesOrderItemStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemStatus($fkSalesOrderItemStatus = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemStatus)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, $fkSalesOrderItemStatus, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderProcess(1234); // WHERE fk_sales_order_process = 1234
     * $query->filterByFkSalesOrderProcess(array(12, 34)); // WHERE fk_sales_order_process IN (12, 34)
     * $query->filterByFkSalesOrderProcess(array('min' => 12)); // WHERE fk_sales_order_process >= 12
     * $query->filterByFkSalesOrderProcess(array('max' => 12)); // WHERE fk_sales_order_process <= 12
     * </code>
     *
     * @see       filterByProcess()
     *
     * @param     mixed $fkSalesOrderProcess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderProcess($fkSalesOrderProcess = null, $comparison = null)
    {
        if (is_array($fkSalesOrderProcess)) {
            $useMinMax = false;
            if (isset($fkSalesOrderProcess['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderProcess['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess, $comparison);
    }

    /**
     * Filter the query on the last_status_change column
     *
     * Example usage:
     * <code>
     * $query->filterByLastStatusChange('2011-03-14'); // WHERE last_status_change = '2011-03-14'
     * $query->filterByLastStatusChange('now'); // WHERE last_status_change = '2011-03-14'
     * $query->filterByLastStatusChange(array('max' => 'yesterday')); // WHERE last_status_change > '2011-03-13'
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByLastStatusChange($lastStatusChange = null, $comparison = null)
    {
        if (is_array($lastStatusChange)) {
            $useMinMax = false;
            if (isset($lastStatusChange['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastStatusChange['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::LAST_STATUS_CHANGE, $lastStatusChange, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::SKU, $sku, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::GROSS_PRICE, $grossPrice, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY, $priceToPay, $comparison);
    }

    /**
     * Filter the query on the paid_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByPaidAmount(1234); // WHERE paid_amount = 1234
     * $query->filterByPaidAmount(array(12, 34)); // WHERE paid_amount IN (12, 34)
     * $query->filterByPaidAmount(array('min' => 12)); // WHERE paid_amount >= 12
     * $query->filterByPaidAmount(array('max' => 12)); // WHERE paid_amount <= 12
     * </code>
     *
     * @param     mixed $paidAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPaidAmount($paidAmount = null, $comparison = null)
    {
        if (is_array($paidAmount)) {
            $useMinMax = false;
            if (isset($paidAmount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PAID_AMOUNT, $paidAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paidAmount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PAID_AMOUNT, $paidAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PAID_AMOUNT, $paidAmount, $comparison);
    }

    /**
     * Filter the query on the tax_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxAmount(1234); // WHERE tax_amount = 1234
     * $query->filterByTaxAmount(array(12, 34)); // WHERE tax_amount IN (12, 34)
     * $query->filterByTaxAmount(array('min' => 12)); // WHERE tax_amount >= 12
     * $query->filterByTaxAmount(array('max' => 12)); // WHERE tax_amount <= 12
     * </code>
     *
     * @param     mixed $taxAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByTaxAmount($taxAmount = null, $comparison = null)
    {
        if (is_array($taxAmount)) {
            $useMinMax = false;
            if (isset($taxAmount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_AMOUNT, $taxAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxAmount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_AMOUNT, $taxAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_AMOUNT, $taxAmount, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the to_be_captured column
     *
     * Example usage:
     * <code>
     * $query->filterByToBeCaptured(true); // WHERE to_be_captured = true
     * $query->filterByToBeCaptured('yes'); // WHERE to_be_captured = true
     * </code>
     *
     * @param     boolean|string $toBeCaptured The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByToBeCaptured($toBeCaptured = null, $comparison = null)
    {
        if (is_string($toBeCaptured)) {
            $toBeCaptured = in_array(strtolower($toBeCaptured), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TO_BE_CAPTURED, $toBeCaptured, $comparison);
    }

    /**
     * Filter the query on the to_be_billed column
     *
     * Example usage:
     * <code>
     * $query->filterByToBeBilled(true); // WHERE to_be_billed = true
     * $query->filterByToBeBilled('yes'); // WHERE to_be_billed = true
     * </code>
     *
     * @param     boolean|string $toBeBilled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByToBeBilled($toBeBilled = null, $comparison = null)
    {
        if (is_string($toBeBilled)) {
            $toBeBilled = in_array(strtolower($toBeBilled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::TO_BE_BILLED, $toBeBilled, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus|PropelObjectCollection $pacSalesOrderItemStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacSalesOrderItemStatus, $comparison = null)
    {
        if ($pacSalesOrderItemStatus instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, $pacSalesOrderItemStatus->getIdSalesOrderItemStatus(), $comparison);
        } elseif ($pacSalesOrderItemStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, $pacSalesOrderItemStatus->toKeyValue('PrimaryKey', 'IdSalesOrderItemStatus'), $comparison);
        } else {
            throw new PropelException('filterByStatus() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Status relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * Use the Status relation PacSalesOrderItemStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery A secondary query class using the current class as primary query
     */
    public function useStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Status', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess|PropelObjectCollection $pacSalesOrderProcess The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProcess($pacSalesOrderProcess, $comparison = null)
    {
        if ($pacSalesOrderProcess instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_PROCESS, $pacSalesOrderProcess->getIdSalesOrderProcess(), $comparison);
        } elseif ($pacSalesOrderProcess instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_PROCESS, $pacSalesOrderProcess->toKeyValue('PrimaryKey', 'IdSalesOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * Use the Process relation PacSalesOrderProcess object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_PacInvoiceItem object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_PacInvoiceItem|PropelObjectCollection $pacInvoiceItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoiceItem($pacInvoiceItem, $comparison = null)
    {
        if ($pacInvoiceItem instanceof ProjectA_Zed_Invoice_Persistence_PacInvoiceItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacInvoiceItem->getFkSalesOrderItem(), $comparison);
        } elseif ($pacInvoiceItem instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceItemQuery()
                ->filterByPrimaryKeys($pacInvoiceItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoiceItem() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_PacInvoiceItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InvoiceItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinInvoiceItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InvoiceItem');

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
            $this->addJoinObject($join, 'InvoiceItem');
        }

        return $this;
    }

    /**
     * Use the InvoiceItem relation PacInvoiceItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_PacInvoiceItemQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoiceItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InvoiceItem', 'ProjectA_Zed_Invoice_Persistence_PacInvoiceItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory|PropelObjectCollection $pacSalesOrderItemStatusHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusHistory($pacSalesOrderItemStatusHistory, $comparison = null)
    {
        if ($pacSalesOrderItemStatusHistory instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItemStatusHistory->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItemStatusHistory instanceof PropelObjectCollection) {
            return $this
                ->useStatusHistoryQuery()
                ->filterByPrimaryKeys($pacSalesOrderItemStatusHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStatusHistory() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * Use the StatusHistory relation PacSalesOrderItemStatusHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery A secondary query class using the current class as primary query
     */
    public function useStatusHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusHistory', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusHistoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog|PropelObjectCollection $pacSalesOrderItemTransitionLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTransitionLog($pacSalesOrderItemTransitionLog, $comparison = null)
    {
        if ($pacSalesOrderItemTransitionLog instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItemTransitionLog->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItemTransitionLog instanceof PropelObjectCollection) {
            return $this
                ->useTransitionLogQuery()
                ->filterByPrimaryKeys($pacSalesOrderItemTransitionLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransitionLog() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransitionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * Use the TransitionLog relation PacSalesOrderItemTransitionLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery A secondary query class using the current class as primary query
     */
    public function useTransitionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTransitionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransitionLog', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption|PropelObjectCollection $pacSalesOrderItemOption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacSalesOrderItemOption, $comparison = null)
    {
        if ($pacSalesOrderItemOption instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItemOption->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItemOption instanceof PropelObjectCollection) {
            return $this
                ->useOptionQuery()
                ->filterByPrimaryKeys($pacSalesOrderItemOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOptionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesExpense object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesExpense|PropelObjectCollection $pacSalesExpense  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpense($pacSalesExpense, $comparison = null)
    {
        if ($pacSalesExpense instanceof ProjectA_Zed_Sales_Persistence_PacSalesExpense) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesExpense->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesExpense instanceof PropelObjectCollection) {
            return $this
                ->useExpenseQuery()
                ->filterByPrimaryKeys($pacSalesExpense->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpense() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesExpense or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expense', 'ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_PacSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesDiscount->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesDiscount instanceof PropelObjectCollection) {
            return $this
                ->useDiscountQuery()
                ->filterByPrimaryKeys($pacSalesDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', 'ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscount object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscount|PropelObjectCollection $pacSalesruleItemDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByItemDiscount($pacSalesruleItemDiscount, $comparison = null)
    {
        if ($pacSalesruleItemDiscount instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesruleItemDiscount->getFkSalesOrderItem(), $comparison);
        } elseif ($pacSalesruleItemDiscount instanceof PropelObjectCollection) {
            return $this
                ->useItemDiscountQuery()
                ->filterByPrimaryKeys($pacSalesruleItemDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByItemDiscount() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ItemDiscount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinItemDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ItemDiscount');

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
            $this->addJoinObject($join, 'ItemDiscount');
        }

        return $this;
    }

    /**
     * Use the ItemDiscount relation PacSalesruleItemDiscount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscountQuery A secondary query class using the current class as primary query
     */
    public function useItemDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinItemDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ItemDiscount', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleItemDiscountQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem|PropelObjectCollection $saoFulfillmentQuoteItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuoteItem($saoFulfillmentQuoteItem, $comparison = null)
    {
        if ($saoFulfillmentQuoteItem instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $saoFulfillmentQuoteItem->getFkSalesOrderItem(), $comparison);
        } elseif ($saoFulfillmentQuoteItem instanceof PropelObjectCollection) {
            return $this
                ->useQuoteItemQuery()
                ->filterByPrimaryKeys($saoFulfillmentQuoteItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuoteItem() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the QuoteItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('QuoteItem');

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
            $this->addJoinObject($join, 'QuoteItem');
        }

        return $this;
    }

    /**
     * Use the QuoteItem relation SaoFulfillmentQuoteItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery A secondary query class using the current class as primary query
     */
    public function useQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuoteItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'QuoteItem', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItem|PropelObjectCollection $saoSalesOrderItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoSalesOrderItem($saoSalesOrderItem, $comparison = null)
    {
        if ($saoSalesOrderItem instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($saoSalesOrderItem instanceof PropelObjectCollection) {
            return $this
                ->useSaoSalesOrderItemQuery()
                ->filterByPrimaryKeys($saoSalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoSalesOrderItem() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoSalesOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSaoSalesOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoSalesOrderItem');

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
            $this->addJoinObject($join, 'SaoSalesOrderItem');
        }

        return $this;
    }

    /**
     * Use the SaoSalesOrderItem relation SaoSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSaoSalesOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoSalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoSalesOrderItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification|PropelObjectCollection $saoSalesOrderItemNotification  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoSalesOrderItemNotification($saoSalesOrderItemNotification, $comparison = null)
    {
        if ($saoSalesOrderItemNotification instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $saoSalesOrderItemNotification->getFkSalesOrderItem(), $comparison);
        } elseif ($saoSalesOrderItemNotification instanceof PropelObjectCollection) {
            return $this
                ->useSaoSalesOrderItemNotificationQuery()
                ->filterByPrimaryKeys($saoSalesOrderItemNotification->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoSalesOrderItemNotification() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoSalesOrderItemNotification relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSaoSalesOrderItemNotification($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoSalesOrderItemNotification');

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
            $this->addJoinObject($join, 'SaoSalesOrderItemNotification');
        }

        return $this;
    }

    /**
     * Use the SaoSalesOrderItemNotification relation SaoSalesOrderItemNotification object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery A secondary query class using the current class as primary query
     */
    public function useSaoSalesOrderItemNotificationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoSalesOrderItemNotification($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoSalesOrderItemNotification', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery');
    }

    /**
     * Filter the query by a related SaoFulfillmentQuote object
     * using the sao_fulfillment_quote_item table as cross reference
     *
     * @param   SaoFulfillmentQuote $saoFulfillmentQuote the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByQuote($saoFulfillmentQuote, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useQuoteItemQuery()
            ->filterByQuote($saoFulfillmentQuote, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $pacSalesOrderItem Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItem = null)
    {
        if ($pacSalesOrderItem) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT);
    }
}
