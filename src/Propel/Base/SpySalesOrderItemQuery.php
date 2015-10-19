<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\Map\SpySalesOrderItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_order_item' table.
 *
 *
 *
 * @method     ChildSpySalesOrderItemQuery orderByFkRefund($order = Criteria::ASC) Order by the fk_refund column
 * @method     ChildSpySalesOrderItemQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method     ChildSpySalesOrderItemQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpySalesOrderItemQuery orderByFkOmsOrderItemState($order = Criteria::ASC) Order by the fk_oms_order_item_state column
 * @method     ChildSpySalesOrderItemQuery orderByFkOmsOrderProcess($order = Criteria::ASC) Order by the fk_oms_order_process column
 * @method     ChildSpySalesOrderItemQuery orderByFkSalesOrderItemBundle($order = Criteria::ASC) Order by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemQuery orderByLastStateChange($order = Criteria::ASC) Order by the last_state_change column
 * @method     ChildSpySalesOrderItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpySalesOrderItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method     ChildSpySalesOrderItemQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method     ChildSpySalesOrderItemQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method     ChildSpySalesOrderItemQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method     ChildSpySalesOrderItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildSpySalesOrderItemQuery orderByGroupKey($order = Criteria::ASC) Order by the group_key column
 * @method     ChildSpySalesOrderItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesOrderItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesOrderItemQuery groupByFkRefund() Group by the fk_refund column
 * @method     ChildSpySalesOrderItemQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method     ChildSpySalesOrderItemQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpySalesOrderItemQuery groupByFkOmsOrderItemState() Group by the fk_oms_order_item_state column
 * @method     ChildSpySalesOrderItemQuery groupByFkOmsOrderProcess() Group by the fk_oms_order_process column
 * @method     ChildSpySalesOrderItemQuery groupByFkSalesOrderItemBundle() Group by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemQuery groupByLastStateChange() Group by the last_state_change column
 * @method     ChildSpySalesOrderItemQuery groupByName() Group by the name column
 * @method     ChildSpySalesOrderItemQuery groupBySku() Group by the sku column
 * @method     ChildSpySalesOrderItemQuery groupByGrossPrice() Group by the gross_price column
 * @method     ChildSpySalesOrderItemQuery groupByPriceToPay() Group by the price_to_pay column
 * @method     ChildSpySalesOrderItemQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method     ChildSpySalesOrderItemQuery groupByQuantity() Group by the quantity column
 * @method     ChildSpySalesOrderItemQuery groupByGroupKey() Group by the group_key column
 * @method     ChildSpySalesOrderItemQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesOrderItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinSpyRefund($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesOrderItemQuery rightJoinSpyRefund($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesOrderItemQuery innerJoinSpyRefund($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyRefund relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesOrderItemQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesOrderItemQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinState($relationAlias = null) Adds a LEFT JOIN clause to the query using the State relation
 * @method     ChildSpySalesOrderItemQuery rightJoinState($relationAlias = null) Adds a RIGHT JOIN clause to the query using the State relation
 * @method     ChildSpySalesOrderItemQuery innerJoinState($relationAlias = null) Adds a INNER JOIN clause to the query using the State relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method     ChildSpySalesOrderItemQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method     ChildSpySalesOrderItemQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinSalesOrderItemBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method     ChildSpySalesOrderItemQuery rightJoinSalesOrderItemBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method     ChildSpySalesOrderItemQuery innerJoinSalesOrderItemBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItemBundle relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinNopayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Nopayment relation
 * @method     ChildSpySalesOrderItemQuery rightJoinNopayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Nopayment relation
 * @method     ChildSpySalesOrderItemQuery innerJoinNopayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Nopayment relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method     ChildSpySalesOrderItemQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method     ChildSpySalesOrderItemQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinStateHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the StateHistory relation
 * @method     ChildSpySalesOrderItemQuery rightJoinStateHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StateHistory relation
 * @method     ChildSpySalesOrderItemQuery innerJoinStateHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the StateHistory relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinEventTimeout($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventTimeout relation
 * @method     ChildSpySalesOrderItemQuery rightJoinEventTimeout($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventTimeout relation
 * @method     ChildSpySalesOrderItemQuery innerJoinEventTimeout($relationAlias = null) Adds a INNER JOIN clause to the query using the EventTimeout relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 * @method     ChildSpySalesOrderItemQuery rightJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 * @method     ChildSpySalesOrderItemQuery innerJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 * @method     ChildSpySalesOrderItemQuery rightJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 * @method     ChildSpySalesOrderItemQuery innerJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method     ChildSpySalesOrderItemQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method     ChildSpySalesOrderItemQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method     ChildSpySalesOrderItemQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderItemQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderItemQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpyRefundQuery|\Propel\SpySalesOrderQuery|\Propel\SpyOmsOrderItemStateQuery|\Propel\SpyOmsOrderProcessQuery|\Propel\SpySalesOrderItemBundleQuery|\Propel\SpyNopaymentPaidQuery|\Propel\SpyOmsTransitionLogQuery|\Propel\SpyOmsOrderItemStateHistoryQuery|\Propel\SpyOmsEventTimeoutQuery|\Propel\SpyPaymentPayolutionOrderItemQuery|\Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery|\Propel\SpySalesOrderItemOptionQuery|\Propel\SpySalesDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesOrderItem findOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItem matching the query
 * @method     ChildSpySalesOrderItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItem matching the query, or a new ChildSpySalesOrderItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesOrderItem findOneByFkRefund(int $fk_refund) Return the first ChildSpySalesOrderItem filtered by the fk_refund column
 * @method     ChildSpySalesOrderItem findOneByIdSalesOrderItem(int $id_sales_order_item) Return the first ChildSpySalesOrderItem filtered by the id_sales_order_item column
 * @method     ChildSpySalesOrderItem findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesOrderItem filtered by the fk_sales_order column
 * @method     ChildSpySalesOrderItem findOneByFkOmsOrderItemState(int $fk_oms_order_item_state) Return the first ChildSpySalesOrderItem filtered by the fk_oms_order_item_state column
 * @method     ChildSpySalesOrderItem findOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ChildSpySalesOrderItem filtered by the fk_oms_order_process column
 * @method     ChildSpySalesOrderItem findOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ChildSpySalesOrderItem filtered by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItem findOneByLastStateChange(string $last_state_change) Return the first ChildSpySalesOrderItem filtered by the last_state_change column
 * @method     ChildSpySalesOrderItem findOneByName(string $name) Return the first ChildSpySalesOrderItem filtered by the name column
 * @method     ChildSpySalesOrderItem findOneBySku(string $sku) Return the first ChildSpySalesOrderItem filtered by the sku column
 * @method     ChildSpySalesOrderItem findOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItem filtered by the gross_price column
 * @method     ChildSpySalesOrderItem findOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesOrderItem filtered by the price_to_pay column
 * @method     ChildSpySalesOrderItem findOneByTaxPercentage(int $tax_percentage) Return the first ChildSpySalesOrderItem filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItem findOneByQuantity(int $quantity) Return the first ChildSpySalesOrderItem filtered by the quantity column
 * @method     ChildSpySalesOrderItem findOneByGroupKey(string $group_key) Return the first ChildSpySalesOrderItem filtered by the group_key column
 * @method     ChildSpySalesOrderItem findOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItem filtered by the created_at column
 * @method     ChildSpySalesOrderItem findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItem filtered by the updated_at column *

 * @method     ChildSpySalesOrderItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesOrderItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItem requireOneByFkRefund(int $fk_refund) Return the first ChildSpySalesOrderItem filtered by the fk_refund column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByIdSalesOrderItem(int $id_sales_order_item) Return the first ChildSpySalesOrderItem filtered by the id_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesOrderItem filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByFkOmsOrderItemState(int $fk_oms_order_item_state) Return the first ChildSpySalesOrderItem filtered by the fk_oms_order_item_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ChildSpySalesOrderItem filtered by the fk_oms_order_process column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ChildSpySalesOrderItem filtered by the fk_sales_order_item_bundle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByLastStateChange(string $last_state_change) Return the first ChildSpySalesOrderItem filtered by the last_state_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByName(string $name) Return the first ChildSpySalesOrderItem filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneBySku(string $sku) Return the first ChildSpySalesOrderItem filtered by the sku column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItem filtered by the gross_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesOrderItem filtered by the price_to_pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByTaxPercentage(int $tax_percentage) Return the first ChildSpySalesOrderItem filtered by the tax_percentage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByQuantity(int $quantity) Return the first ChildSpySalesOrderItem filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByGroupKey(string $group_key) Return the first ChildSpySalesOrderItem filtered by the group_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItem filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItem requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItem filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesOrderItem objects based on current ModelCriteria
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByFkRefund(int $fk_refund) Return ChildSpySalesOrderItem objects filtered by the fk_refund column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByIdSalesOrderItem(int $id_sales_order_item) Return ChildSpySalesOrderItem objects filtered by the id_sales_order_item column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpySalesOrderItem objects filtered by the fk_sales_order column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByFkOmsOrderItemState(int $fk_oms_order_item_state) Return ChildSpySalesOrderItem objects filtered by the fk_oms_order_item_state column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByFkOmsOrderProcess(int $fk_oms_order_process) Return ChildSpySalesOrderItem objects filtered by the fk_oms_order_process column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return ChildSpySalesOrderItem objects filtered by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByLastStateChange(string $last_state_change) Return ChildSpySalesOrderItem objects filtered by the last_state_change column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByName(string $name) Return ChildSpySalesOrderItem objects filtered by the name column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findBySku(string $sku) Return ChildSpySalesOrderItem objects filtered by the sku column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByGrossPrice(int $gross_price) Return ChildSpySalesOrderItem objects filtered by the gross_price column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByPriceToPay(int $price_to_pay) Return ChildSpySalesOrderItem objects filtered by the price_to_pay column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByTaxPercentage(int $tax_percentage) Return ChildSpySalesOrderItem objects filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByQuantity(int $quantity) Return ChildSpySalesOrderItem objects filtered by the quantity column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByGroupKey(string $group_key) Return ChildSpySalesOrderItem objects filtered by the group_key column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesOrderItem objects filtered by the created_at column
 * @method     ChildSpySalesOrderItem[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesOrderItem objects filtered by the updated_at column
 * @method     ChildSpySalesOrderItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesOrderItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesOrderItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesOrderItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesOrderItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesOrderItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesOrderItemQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesOrderItemQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpySalesOrderItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesOrderItemTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
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
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_refund, id_sales_order_item, fk_sales_order, fk_oms_order_item_state, fk_oms_order_process, fk_sales_order_item_bundle, last_state_change, name, sku, gross_price, price_to_pay, tax_percentage, quantity, group_key, created_at, updated_at FROM spy_sales_order_item WHERE id_sales_order_item = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpySalesOrderItem $obj */
            $obj = new ChildSpySalesOrderItem();
            $obj->hydrate($row);
            SpySalesOrderItemTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpySalesOrderItem|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the fk_refund column
     *
     * Example usage:
     * <code>
     * $query->filterByFkRefund(1234); // WHERE fk_refund = 1234
     * $query->filterByFkRefund(array(12, 34)); // WHERE fk_refund IN (12, 34)
     * $query->filterByFkRefund(array('min' => 12)); // WHERE fk_refund > 12
     * </code>
     *
     * @see       filterBySpyRefund()
     *
     * @param     mixed $fkRefund The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkRefund($fkRefund = null, $comparison = null)
    {
        if (is_array($fkRefund)) {
            $useMinMax = false;
            if (isset($fkRefund['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_REFUND, $fkRefund['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkRefund['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_REFUND, $fkRefund['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_REFUND, $fkRefund, $comparison);
    }

    /**
     * Filter the query on the id_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItem(1234); // WHERE id_sales_order_item = 1234
     * $query->filterByIdSalesOrderItem(array(12, 34)); // WHERE id_sales_order_item IN (12, 34)
     * $query->filterByIdSalesOrderItem(array('min' => 12)); // WHERE id_sales_order_item > 12
     * </code>
     *
     * @param     mixed $idSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order > 12
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_item_state column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderItemState(1234); // WHERE fk_oms_order_item_state = 1234
     * $query->filterByFkOmsOrderItemState(array(12, 34)); // WHERE fk_oms_order_item_state IN (12, 34)
     * $query->filterByFkOmsOrderItemState(array('min' => 12)); // WHERE fk_oms_order_item_state > 12
     * </code>
     *
     * @see       filterByState()
     *
     * @param     mixed $fkOmsOrderItemState The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderItemState($fkOmsOrderItemState = null, $comparison = null)
    {
        if (is_array($fkOmsOrderItemState)) {
            $useMinMax = false;
            if (isset($fkOmsOrderItemState['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $fkOmsOrderItemState['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderItemState['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $fkOmsOrderItemState['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $fkOmsOrderItemState, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderProcess(1234); // WHERE fk_oms_order_process = 1234
     * $query->filterByFkOmsOrderProcess(array(12, 34)); // WHERE fk_oms_order_process IN (12, 34)
     * $query->filterByFkOmsOrderProcess(array('min' => 12)); // WHERE fk_oms_order_process > 12
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderProcess($fkOmsOrderProcess = null, $comparison = null)
    {
        if (is_array($fkOmsOrderProcess)) {
            $useMinMax = false;
            if (isset($fkOmsOrderProcess['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderProcess['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_bundle column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemBundle(1234); // WHERE fk_sales_order_item_bundle = 1234
     * $query->filterByFkSalesOrderItemBundle(array(12, 34)); // WHERE fk_sales_order_item_bundle IN (12, 34)
     * $query->filterByFkSalesOrderItemBundle(array('min' => 12)); // WHERE fk_sales_order_item_bundle > 12
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemBundle($fkSalesOrderItemBundle = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemBundle)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemBundle['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemBundle['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle, $comparison);
    }

    /**
     * Filter the query on the last_state_change column
     *
     * Example usage:
     * <code>
     * $query->filterByLastStateChange('2011-03-14'); // WHERE last_state_change = '2011-03-14'
     * $query->filterByLastStateChange('now'); // WHERE last_state_change = '2011-03-14'
     * $query->filterByLastStateChange(array('max' => 'yesterday')); // WHERE last_state_change > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastStateChange The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByLastStateChange($lastStateChange = null, $comparison = null)
    {
        if (is_array($lastStateChange)) {
            $useMinMax = false;
            if (isset($lastStateChange['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE, $lastStateChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastStateChange['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE, $lastStateChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE, $lastStateChange, $comparison);
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the gross_price column
     *
     * Example usage:
     * <code>
     * $query->filterByGrossPrice(1234); // WHERE gross_price = 1234
     * $query->filterByGrossPrice(array(12, 34)); // WHERE gross_price IN (12, 34)
     * $query->filterByGrossPrice(array('min' => 12)); // WHERE gross_price > 12
     * </code>
     *
     * @param     mixed $grossPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_GROSS_PRICE, $grossPrice, $comparison);
    }

    /**
     * Filter the query on the price_to_pay column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceToPay(1234); // WHERE price_to_pay = 1234
     * $query->filterByPriceToPay(array(12, 34)); // WHERE price_to_pay IN (12, 34)
     * $query->filterByPriceToPay(array('min' => 12)); // WHERE price_to_pay > 12
     * </code>
     *
     * @param     mixed $priceToPay The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY, $priceToPay, $comparison);
    }

    /**
     * Filter the query on the tax_percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxPercentage(1234); // WHERE tax_percentage = 1234
     * $query->filterByTaxPercentage(array(12, 34)); // WHERE tax_percentage IN (12, 34)
     * $query->filterByTaxPercentage(array('min' => 12)); // WHERE tax_percentage > 12
     * </code>
     *
     * @param     mixed $taxPercentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the group_key column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupKey('fooValue');   // WHERE group_key = 'fooValue'
     * $query->filterByGroupKey('%fooValue%'); // WHERE group_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $groupKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByGroupKey($groupKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($groupKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $groupKey)) {
                $groupKey = str_replace('*', '%', $groupKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_GROUP_KEY, $groupKey, $comparison);
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyRefund object
     *
     * @param \Propel\SpyRefund|ObjectCollection $spyRefund The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpyRefund($spyRefund, $comparison = null)
    {
        if ($spyRefund instanceof \Propel\SpyRefund) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_REFUND, $spyRefund->getIdRefund(), $comparison);
        } elseif ($spyRefund instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_REFUND, $spyRefund->toKeyValue('PrimaryKey', 'IdRefund'), $comparison);
        } else {
            throw new PropelException('filterBySpyRefund() only accepts arguments of type \Propel\SpyRefund or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyRefund relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSpyRefund($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyRefund');

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
            $this->addJoinObject($join, 'SpyRefund');
        }

        return $this;
    }

    /**
     * Use the SpyRefund relation SpyRefund object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyRefundQuery A secondary query class using the current class as primary query
     */
    public function useSpyRefundQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyRefund($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyRefund', '\Propel\SpyRefundQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the Order relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsOrderItemState object
     *
     * @param \Propel\SpyOmsOrderItemState|ObjectCollection $spyOmsOrderItemState The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByState($spyOmsOrderItemState, $comparison = null)
    {
        if ($spyOmsOrderItemState instanceof \Propel\SpyOmsOrderItemState) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $spyOmsOrderItemState->getIdOmsOrderItemState(), $comparison);
        } elseif ($spyOmsOrderItemState instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, $spyOmsOrderItemState->toKeyValue('PrimaryKey', 'IdOmsOrderItemState'), $comparison);
        } else {
            throw new PropelException('filterByState() only accepts arguments of type \Propel\SpyOmsOrderItemState or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the State relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinState($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('State');

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
            $this->addJoinObject($join, 'State');
        }

        return $this;
    }

    /**
     * Use the State relation SpyOmsOrderItemState object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsOrderItemStateQuery A secondary query class using the current class as primary query
     */
    public function useStateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinState($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'State', '\Propel\SpyOmsOrderItemStateQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsOrderProcess object
     *
     * @param \Propel\SpyOmsOrderProcess|ObjectCollection $spyOmsOrderProcess The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByProcess($spyOmsOrderProcess, $comparison = null)
    {
        if ($spyOmsOrderProcess instanceof \Propel\SpyOmsOrderProcess) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $spyOmsOrderProcess->getIdOmsOrderProcess(), $comparison);
        } elseif ($spyOmsOrderProcess instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, $spyOmsOrderProcess->toKeyValue('PrimaryKey', 'IdOmsOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type \Propel\SpyOmsOrderProcess or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the Process relation SpyOmsOrderProcess object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', '\Propel\SpyOmsOrderProcessQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItemBundle object
     *
     * @param \Propel\SpySalesOrderItemBundle|ObjectCollection $spySalesOrderItemBundle The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterBySalesOrderItemBundle($spySalesOrderItemBundle, $comparison = null)
    {
        if ($spySalesOrderItemBundle instanceof \Propel\SpySalesOrderItemBundle) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $spySalesOrderItemBundle->getIdSalesOrderItemBundle(), $comparison);
        } elseif ($spySalesOrderItemBundle instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $spySalesOrderItemBundle->toKeyValue('PrimaryKey', 'IdSalesOrderItemBundle'), $comparison);
        } else {
            throw new PropelException('filterBySalesOrderItemBundle() only accepts arguments of type \Propel\SpySalesOrderItemBundle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderItemBundle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the SalesOrderItemBundle relation SpySalesOrderItemBundle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemBundleQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderItemBundleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesOrderItemBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItemBundle', '\Propel\SpySalesOrderItemBundleQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyNopaymentPaid object
     *
     * @param \Propel\SpyNopaymentPaid|ObjectCollection $spyNopaymentPaid the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByNopayment($spyNopaymentPaid, $comparison = null)
    {
        if ($spyNopaymentPaid instanceof \Propel\SpyNopaymentPaid) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyNopaymentPaid->getFkSalesOrderItem(), $comparison);
        } elseif ($spyNopaymentPaid instanceof ObjectCollection) {
            return $this
                ->useNopaymentQuery()
                ->filterByPrimaryKeys($spyNopaymentPaid->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNopayment() only accepts arguments of type \Propel\SpyNopaymentPaid or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Nopayment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinNopayment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Nopayment');

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
            $this->addJoinObject($join, 'Nopayment');
        }

        return $this;
    }

    /**
     * Use the Nopayment relation SpyNopaymentPaid object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyNopaymentPaidQuery A secondary query class using the current class as primary query
     */
    public function useNopaymentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNopayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Nopayment', '\Propel\SpyNopaymentPaidQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsTransitionLog object
     *
     * @param \Propel\SpyOmsTransitionLog|ObjectCollection $spyOmsTransitionLog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByTransitionLog($spyOmsTransitionLog, $comparison = null)
    {
        if ($spyOmsTransitionLog instanceof \Propel\SpyOmsTransitionLog) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyOmsTransitionLog->getFkSalesOrderItem(), $comparison);
        } elseif ($spyOmsTransitionLog instanceof ObjectCollection) {
            return $this
                ->useTransitionLogQuery()
                ->filterByPrimaryKeys($spyOmsTransitionLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransitionLog() only accepts arguments of type \Propel\SpyOmsTransitionLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransitionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the TransitionLog relation SpyOmsTransitionLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsTransitionLogQuery A secondary query class using the current class as primary query
     */
    public function useTransitionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTransitionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransitionLog', '\Propel\SpyOmsTransitionLogQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsOrderItemStateHistory object
     *
     * @param \Propel\SpyOmsOrderItemStateHistory|ObjectCollection $spyOmsOrderItemStateHistory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByStateHistory($spyOmsOrderItemStateHistory, $comparison = null)
    {
        if ($spyOmsOrderItemStateHistory instanceof \Propel\SpyOmsOrderItemStateHistory) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyOmsOrderItemStateHistory->getFkSalesOrderItem(), $comparison);
        } elseif ($spyOmsOrderItemStateHistory instanceof ObjectCollection) {
            return $this
                ->useStateHistoryQuery()
                ->filterByPrimaryKeys($spyOmsOrderItemStateHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStateHistory() only accepts arguments of type \Propel\SpyOmsOrderItemStateHistory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StateHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinStateHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StateHistory');

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
            $this->addJoinObject($join, 'StateHistory');
        }

        return $this;
    }

    /**
     * Use the StateHistory relation SpyOmsOrderItemStateHistory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsOrderItemStateHistoryQuery A secondary query class using the current class as primary query
     */
    public function useStateHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStateHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StateHistory', '\Propel\SpyOmsOrderItemStateHistoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsEventTimeout object
     *
     * @param \Propel\SpyOmsEventTimeout|ObjectCollection $spyOmsEventTimeout the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByEventTimeout($spyOmsEventTimeout, $comparison = null)
    {
        if ($spyOmsEventTimeout instanceof \Propel\SpyOmsEventTimeout) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyOmsEventTimeout->getFkSalesOrderItem(), $comparison);
        } elseif ($spyOmsEventTimeout instanceof ObjectCollection) {
            return $this
                ->useEventTimeoutQuery()
                ->filterByPrimaryKeys($spyOmsEventTimeout->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventTimeout() only accepts arguments of type \Propel\SpyOmsEventTimeout or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventTimeout relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the EventTimeout relation SpyOmsEventTimeout object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsEventTimeoutQuery A secondary query class using the current class as primary query
     */
    public function useEventTimeoutQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventTimeout($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventTimeout', '\Propel\SpyOmsEventTimeoutQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayolutionOrderItem object
     *
     * @param \Propel\SpyPaymentPayolutionOrderItem|ObjectCollection $spyPaymentPayolutionOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionOrderItem($spyPaymentPayolutionOrderItem, $comparison = null)
    {
        if ($spyPaymentPayolutionOrderItem instanceof \Propel\SpyPaymentPayolutionOrderItem) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyPaymentPayolutionOrderItem->getFkSalesOrderItem(), $comparison);
        } elseif ($spyPaymentPayolutionOrderItem instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayolutionOrderItemQuery()
                ->filterByPrimaryKeys($spyPaymentPayolutionOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayolutionOrderItem() only accepts arguments of type \Propel\SpyPaymentPayolutionOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolutionOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolutionOrderItem');

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
            $this->addJoinObject($join, 'SpyPaymentPayolutionOrderItem');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolutionOrderItem relation SpyPaymentPayolutionOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolutionOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolutionOrderItem', '\Propel\SpyPaymentPayolutionOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem object
     *
     * @param \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem|ObjectCollection $spyPaymentPayoneTransactionStatusLogOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayoneTransactionStatusLogOrderItem($spyPaymentPayoneTransactionStatusLogOrderItem, $comparison = null)
    {
        if ($spyPaymentPayoneTransactionStatusLogOrderItem instanceof \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spyPaymentPayoneTransactionStatusLogOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spyPaymentPayoneTransactionStatusLogOrderItem instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayoneTransactionStatusLogOrderItemQuery()
                ->filterByPrimaryKeys($spyPaymentPayoneTransactionStatusLogOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayoneTransactionStatusLogOrderItem() only accepts arguments of type \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayoneTransactionStatusLogOrderItem');

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
            $this->addJoinObject($join, 'SpyPaymentPayoneTransactionStatusLogOrderItem');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayoneTransactionStatusLogOrderItem relation SpyPaymentPayoneTransactionStatusLogOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayoneTransactionStatusLogOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayoneTransactionStatusLogOrderItem', '\Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItemOption object
     *
     * @param \Propel\SpySalesOrderItemOption|ObjectCollection $spySalesOrderItemOption the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByOption($spySalesOrderItemOption, $comparison = null)
    {
        if ($spySalesOrderItemOption instanceof \Propel\SpySalesOrderItemOption) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spySalesOrderItemOption->getFkSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItemOption instanceof ObjectCollection) {
            return $this
                ->useOptionQuery()
                ->filterByPrimaryKeys($spySalesOrderItemOption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type \Propel\SpySalesOrderItemOption or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the Option relation SpySalesOrderItemOption object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', '\Propel\SpySalesOrderItemOptionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesDiscount object
     *
     * @param \Propel\SpySalesDiscount|ObjectCollection $spySalesDiscount the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function filterByDiscount($spySalesDiscount, $comparison = null)
    {
        if ($spySalesDiscount instanceof \Propel\SpySalesDiscount) {
            return $this
                ->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spySalesDiscount->getFkSalesOrderItem(), $comparison);
        } elseif ($spySalesDiscount instanceof ObjectCollection) {
            return $this
                ->useDiscountQuery()
                ->filterByPrimaryKeys($spySalesDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type \Propel\SpySalesDiscount or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
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
     * Use the Discount relation SpySalesDiscount object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', '\Propel\SpySalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySalesOrderItem $spySalesOrderItem Object to remove from the list of results
     *
     * @return $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function prune($spySalesOrderItem = null)
    {
        if ($spySalesOrderItem) {
            $this->addUsingAlias(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_order_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesOrderItemTableMap::clearInstancePool();
            SpySalesOrderItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesOrderItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesOrderItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesOrderItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesOrderItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemTableMap::COL_CREATED_AT);
    }

} // SpySalesOrderItemQuery
