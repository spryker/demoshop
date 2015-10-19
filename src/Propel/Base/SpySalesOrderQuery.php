<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpySalesOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_order' table.
 *
 *
 *
 * @method     ChildSpySalesOrderQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method     ChildSpySalesOrderQuery orderByIdSalesOrder($order = Criteria::ASC) Order by the id_sales_order column
 * @method     ChildSpySalesOrderQuery orderByFkSalesOrderAddressBilling($order = Criteria::ASC) Order by the fk_sales_order_address_billing column
 * @method     ChildSpySalesOrderQuery orderByFkSalesOrderAddressShipping($order = Criteria::ASC) Order by the fk_sales_order_address_shipping column
 * @method     ChildSpySalesOrderQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSpySalesOrderQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method     ChildSpySalesOrderQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSpySalesOrderQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSpySalesOrderQuery orderByOrderReference($order = Criteria::ASC) Order by the order_reference column
 * @method     ChildSpySalesOrderQuery orderByGrandTotal($order = Criteria::ASC) Order by the grand_total column
 * @method     ChildSpySalesOrderQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method     ChildSpySalesOrderQuery orderByIsTest($order = Criteria::ASC) Order by the is_test column
 * @method     ChildSpySalesOrderQuery orderByFkShipmentMethod($order = Criteria::ASC) Order by the fk_shipment_method column
 * @method     ChildSpySalesOrderQuery orderByShipmentDeliveryTime($order = Criteria::ASC) Order by the shipment_delivery_time column
 * @method     ChildSpySalesOrderQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesOrderQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesOrderQuery groupByFkCustomer() Group by the fk_customer column
 * @method     ChildSpySalesOrderQuery groupByIdSalesOrder() Group by the id_sales_order column
 * @method     ChildSpySalesOrderQuery groupByFkSalesOrderAddressBilling() Group by the fk_sales_order_address_billing column
 * @method     ChildSpySalesOrderQuery groupByFkSalesOrderAddressShipping() Group by the fk_sales_order_address_shipping column
 * @method     ChildSpySalesOrderQuery groupByEmail() Group by the email column
 * @method     ChildSpySalesOrderQuery groupBySalutation() Group by the salutation column
 * @method     ChildSpySalesOrderQuery groupByFirstName() Group by the first_name column
 * @method     ChildSpySalesOrderQuery groupByLastName() Group by the last_name column
 * @method     ChildSpySalesOrderQuery groupByOrderReference() Group by the order_reference column
 * @method     ChildSpySalesOrderQuery groupByGrandTotal() Group by the grand_total column
 * @method     ChildSpySalesOrderQuery groupBySubtotal() Group by the subtotal column
 * @method     ChildSpySalesOrderQuery groupByIsTest() Group by the is_test column
 * @method     ChildSpySalesOrderQuery groupByFkShipmentMethod() Group by the fk_shipment_method column
 * @method     ChildSpySalesOrderQuery groupByShipmentDeliveryTime() Group by the shipment_delivery_time column
 * @method     ChildSpySalesOrderQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesOrderQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesOrderQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildSpySalesOrderQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildSpySalesOrderQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinBillingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the BillingAddress relation
 * @method     ChildSpySalesOrderQuery rightJoinBillingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BillingAddress relation
 * @method     ChildSpySalesOrderQuery innerJoinBillingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the BillingAddress relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinShippingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAddress relation
 * @method     ChildSpySalesOrderQuery rightJoinShippingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAddress relation
 * @method     ChildSpySalesOrderQuery innerJoinShippingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAddress relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinShipmentMethod($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentMethod relation
 * @method     ChildSpySalesOrderQuery rightJoinShipmentMethod($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentMethod relation
 * @method     ChildSpySalesOrderQuery innerJoinShipmentMethod($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentMethod relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method     ChildSpySalesOrderQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method     ChildSpySalesOrderQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinSpyPaymentPayolution($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpySalesOrderQuery rightJoinSpyPaymentPayolution($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpySalesOrderQuery innerJoinSpyPaymentPayolution($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolution relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinSpyPaymentPayone($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpySalesOrderQuery rightJoinSpyPaymentPayone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpySalesOrderQuery innerJoinSpyPaymentPayone($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayone relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinSpyRefund($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesOrderQuery rightJoinSpyRefund($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesOrderQuery innerJoinSpyRefund($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyRefund relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Item relation
 * @method     ChildSpySalesOrderQuery rightJoinItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Item relation
 * @method     ChildSpySalesOrderQuery innerJoinItem($relationAlias = null) Adds a INNER JOIN clause to the query using the Item relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method     ChildSpySalesOrderQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method     ChildSpySalesOrderQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method     ChildSpySalesOrderQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method     ChildSpySalesOrderQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinOrderComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderComment relation
 * @method     ChildSpySalesOrderQuery rightJoinOrderComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderComment relation
 * @method     ChildSpySalesOrderQuery innerJoinOrderComment($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderComment relation
 *
 * @method     ChildSpySalesOrderQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpyCustomerQuery|\Propel\SpySalesOrderAddressQuery|\Propel\SpyShipmentMethodQuery|\Propel\SpyOmsTransitionLogQuery|\Propel\SpyPaymentPayolutionQuery|\Propel\SpyPaymentPayoneQuery|\Propel\SpyRefundQuery|\Propel\SpySalesOrderItemQuery|\Propel\SpySalesExpenseQuery|\Propel\SpySalesOrderNoteQuery|\Propel\SpySalesOrderCommentQuery|\Propel\SpySalesDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesOrder findOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrder matching the query
 * @method     ChildSpySalesOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesOrder matching the query, or a new ChildSpySalesOrder object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesOrder findOneByFkCustomer(int $fk_customer) Return the first ChildSpySalesOrder filtered by the fk_customer column
 * @method     ChildSpySalesOrder findOneByIdSalesOrder(int $id_sales_order) Return the first ChildSpySalesOrder filtered by the id_sales_order column
 * @method     ChildSpySalesOrder findOneByFkSalesOrderAddressBilling(int $fk_sales_order_address_billing) Return the first ChildSpySalesOrder filtered by the fk_sales_order_address_billing column
 * @method     ChildSpySalesOrder findOneByFkSalesOrderAddressShipping(int $fk_sales_order_address_shipping) Return the first ChildSpySalesOrder filtered by the fk_sales_order_address_shipping column
 * @method     ChildSpySalesOrder findOneByEmail(string $email) Return the first ChildSpySalesOrder filtered by the email column
 * @method     ChildSpySalesOrder findOneBySalutation(int $salutation) Return the first ChildSpySalesOrder filtered by the salutation column
 * @method     ChildSpySalesOrder findOneByFirstName(string $first_name) Return the first ChildSpySalesOrder filtered by the first_name column
 * @method     ChildSpySalesOrder findOneByLastName(string $last_name) Return the first ChildSpySalesOrder filtered by the last_name column
 * @method     ChildSpySalesOrder findOneByOrderReference(string $order_reference) Return the first ChildSpySalesOrder filtered by the order_reference column
 * @method     ChildSpySalesOrder findOneByGrandTotal(int $grand_total) Return the first ChildSpySalesOrder filtered by the grand_total column
 * @method     ChildSpySalesOrder findOneBySubtotal(int $subtotal) Return the first ChildSpySalesOrder filtered by the subtotal column
 * @method     ChildSpySalesOrder findOneByIsTest(boolean $is_test) Return the first ChildSpySalesOrder filtered by the is_test column
 * @method     ChildSpySalesOrder findOneByFkShipmentMethod(int $fk_shipment_method) Return the first ChildSpySalesOrder filtered by the fk_shipment_method column
 * @method     ChildSpySalesOrder findOneByShipmentDeliveryTime(int $shipment_delivery_time) Return the first ChildSpySalesOrder filtered by the shipment_delivery_time column
 * @method     ChildSpySalesOrder findOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrder filtered by the created_at column
 * @method     ChildSpySalesOrder findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrder filtered by the updated_at column *

 * @method     ChildSpySalesOrder requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrder requireOneByFkCustomer(int $fk_customer) Return the first ChildSpySalesOrder filtered by the fk_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByIdSalesOrder(int $id_sales_order) Return the first ChildSpySalesOrder filtered by the id_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByFkSalesOrderAddressBilling(int $fk_sales_order_address_billing) Return the first ChildSpySalesOrder filtered by the fk_sales_order_address_billing column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByFkSalesOrderAddressShipping(int $fk_sales_order_address_shipping) Return the first ChildSpySalesOrder filtered by the fk_sales_order_address_shipping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByEmail(string $email) Return the first ChildSpySalesOrder filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneBySalutation(int $salutation) Return the first ChildSpySalesOrder filtered by the salutation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByFirstName(string $first_name) Return the first ChildSpySalesOrder filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByLastName(string $last_name) Return the first ChildSpySalesOrder filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByOrderReference(string $order_reference) Return the first ChildSpySalesOrder filtered by the order_reference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByGrandTotal(int $grand_total) Return the first ChildSpySalesOrder filtered by the grand_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneBySubtotal(int $subtotal) Return the first ChildSpySalesOrder filtered by the subtotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByIsTest(boolean $is_test) Return the first ChildSpySalesOrder filtered by the is_test column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByFkShipmentMethod(int $fk_shipment_method) Return the first ChildSpySalesOrder filtered by the fk_shipment_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByShipmentDeliveryTime(int $shipment_delivery_time) Return the first ChildSpySalesOrder filtered by the shipment_delivery_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrder filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrder requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrder filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesOrder objects based on current ModelCriteria
 * @method     ChildSpySalesOrder[]|ObjectCollection findByFkCustomer(int $fk_customer) Return ChildSpySalesOrder objects filtered by the fk_customer column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByIdSalesOrder(int $id_sales_order) Return ChildSpySalesOrder objects filtered by the id_sales_order column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByFkSalesOrderAddressBilling(int $fk_sales_order_address_billing) Return ChildSpySalesOrder objects filtered by the fk_sales_order_address_billing column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByFkSalesOrderAddressShipping(int $fk_sales_order_address_shipping) Return ChildSpySalesOrder objects filtered by the fk_sales_order_address_shipping column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByEmail(string $email) Return ChildSpySalesOrder objects filtered by the email column
 * @method     ChildSpySalesOrder[]|ObjectCollection findBySalutation(int $salutation) Return ChildSpySalesOrder objects filtered by the salutation column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByFirstName(string $first_name) Return ChildSpySalesOrder objects filtered by the first_name column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByLastName(string $last_name) Return ChildSpySalesOrder objects filtered by the last_name column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByOrderReference(string $order_reference) Return ChildSpySalesOrder objects filtered by the order_reference column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByGrandTotal(int $grand_total) Return ChildSpySalesOrder objects filtered by the grand_total column
 * @method     ChildSpySalesOrder[]|ObjectCollection findBySubtotal(int $subtotal) Return ChildSpySalesOrder objects filtered by the subtotal column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByIsTest(boolean $is_test) Return ChildSpySalesOrder objects filtered by the is_test column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByFkShipmentMethod(int $fk_shipment_method) Return ChildSpySalesOrder objects filtered by the fk_shipment_method column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByShipmentDeliveryTime(int $shipment_delivery_time) Return ChildSpySalesOrder objects filtered by the shipment_delivery_time column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesOrder objects filtered by the created_at column
 * @method     ChildSpySalesOrder[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesOrder objects filtered by the updated_at column
 * @method     ChildSpySalesOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesOrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesOrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesOrderQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesOrderQuery();
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
     * @return ChildSpySalesOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesOrderTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_customer, id_sales_order, fk_sales_order_address_billing, fk_sales_order_address_shipping, email, salutation, first_name, last_name, order_reference, grand_total, subtotal, is_test, fk_shipment_method, shipment_delivery_time, created_at, updated_at FROM spy_sales_order WHERE id_sales_order = :p0';
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
            /** @var ChildSpySalesOrder $obj */
            $obj = new ChildSpySalesOrder();
            $obj->hydrate($row);
            SpySalesOrderTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesOrder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the fk_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomer(1234); // WHERE fk_customer = 1234
     * $query->filterByFkCustomer(array(12, 34)); // WHERE fk_customer IN (12, 34)
     * $query->filterByFkCustomer(array('min' => 12)); // WHERE fk_customer > 12
     * </code>
     *
     * @see       filterByCustomer()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query on the id_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrder(1234); // WHERE id_sales_order = 1234
     * $query->filterByIdSalesOrder(array(12, 34)); // WHERE id_sales_order IN (12, 34)
     * $query->filterByIdSalesOrder(array('min' => 12)); // WHERE id_sales_order > 12
     * </code>
     *
     * @param     mixed $idSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrder($idSalesOrder = null, $comparison = null)
    {
        if (is_array($idSalesOrder)) {
            $useMinMax = false;
            if (isset($idSalesOrder['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $idSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrder['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $idSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $idSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_address_billing column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderAddressBilling(1234); // WHERE fk_sales_order_address_billing = 1234
     * $query->filterByFkSalesOrderAddressBilling(array(12, 34)); // WHERE fk_sales_order_address_billing IN (12, 34)
     * $query->filterByFkSalesOrderAddressBilling(array('min' => 12)); // WHERE fk_sales_order_address_billing > 12
     * </code>
     *
     * @see       filterByBillingAddress()
     *
     * @param     mixed $fkSalesOrderAddressBilling The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderAddressBilling($fkSalesOrderAddressBilling = null, $comparison = null)
    {
        if (is_array($fkSalesOrderAddressBilling)) {
            $useMinMax = false;
            if (isset($fkSalesOrderAddressBilling['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderAddressBilling['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_address_shipping column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderAddressShipping(1234); // WHERE fk_sales_order_address_shipping = 1234
     * $query->filterByFkSalesOrderAddressShipping(array(12, 34)); // WHERE fk_sales_order_address_shipping IN (12, 34)
     * $query->filterByFkSalesOrderAddressShipping(array('min' => 12)); // WHERE fk_sales_order_address_shipping > 12
     * </code>
     *
     * @see       filterByShippingAddress()
     *
     * @param     mixed $fkSalesOrderAddressShipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderAddressShipping($fkSalesOrderAddressShipping = null, $comparison = null)
    {
        if (is_array($fkSalesOrderAddressShipping)) {
            $useMinMax = false;
            if (isset($fkSalesOrderAddressShipping['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderAddressShipping['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        $valueSet = SpySalesOrderTableMap::getValueSet(SpySalesOrderTableMap::COL_SALUTATION);
        if (is_scalar($salutation)) {
            if (!in_array($salutation, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $salutation));
            }
            $salutation = array_search($salutation, $valueSet);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_SALUTATION, $salutation, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the order_reference column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderReference('fooValue');   // WHERE order_reference = 'fooValue'
     * $query->filterByOrderReference('%fooValue%'); // WHERE order_reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderReference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByOrderReference($orderReference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderReference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderReference)) {
                $orderReference = str_replace('*', '%', $orderReference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_ORDER_REFERENCE, $orderReference, $comparison);
    }

    /**
     * Filter the query on the grand_total column
     *
     * Example usage:
     * <code>
     * $query->filterByGrandTotal(1234); // WHERE grand_total = 1234
     * $query->filterByGrandTotal(array(12, 34)); // WHERE grand_total IN (12, 34)
     * $query->filterByGrandTotal(array('min' => 12)); // WHERE grand_total > 12
     * </code>
     *
     * @param     mixed $grandTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByGrandTotal($grandTotal = null, $comparison = null)
    {
        if (is_array($grandTotal)) {
            $useMinMax = false;
            if (isset($grandTotal['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_GRAND_TOTAL, $grandTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grandTotal['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_GRAND_TOTAL, $grandTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_GRAND_TOTAL, $grandTotal, $comparison);
    }

    /**
     * Filter the query on the subtotal column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotal(1234); // WHERE subtotal = 1234
     * $query->filterBySubtotal(array(12, 34)); // WHERE subtotal IN (12, 34)
     * $query->filterBySubtotal(array('min' => 12)); // WHERE subtotal > 12
     * </code>
     *
     * @param     mixed $subtotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, $comparison = null)
    {
        if (is_array($subtotal)) {
            $useMinMax = false;
            if (isset($subtotal['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_SUBTOTAL, $subtotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotal['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_SUBTOTAL, $subtotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_SUBTOTAL, $subtotal, $comparison);
    }

    /**
     * Filter the query on the is_test column
     *
     * Example usage:
     * <code>
     * $query->filterByIsTest(true); // WHERE is_test = true
     * $query->filterByIsTest('yes'); // WHERE is_test = true
     * </code>
     *
     * @param     boolean|string $isTest The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByIsTest($isTest = null, $comparison = null)
    {
        if (is_string($isTest)) {
            $isTest = in_array(strtolower($isTest), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_IS_TEST, $isTest, $comparison);
    }

    /**
     * Filter the query on the fk_shipment_method column
     *
     * Example usage:
     * <code>
     * $query->filterByFkShipmentMethod(1234); // WHERE fk_shipment_method = 1234
     * $query->filterByFkShipmentMethod(array(12, 34)); // WHERE fk_shipment_method IN (12, 34)
     * $query->filterByFkShipmentMethod(array('min' => 12)); // WHERE fk_shipment_method > 12
     * </code>
     *
     * @see       filterByShipmentMethod()
     *
     * @param     mixed $fkShipmentMethod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkShipmentMethod($fkShipmentMethod = null, $comparison = null)
    {
        if (is_array($fkShipmentMethod)) {
            $useMinMax = false;
            if (isset($fkShipmentMethod['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $fkShipmentMethod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkShipmentMethod['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $fkShipmentMethod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $fkShipmentMethod, $comparison);
    }

    /**
     * Filter the query on the shipment_delivery_time column
     *
     * Example usage:
     * <code>
     * $query->filterByShipmentDeliveryTime(1234); // WHERE shipment_delivery_time = 1234
     * $query->filterByShipmentDeliveryTime(array(12, 34)); // WHERE shipment_delivery_time IN (12, 34)
     * $query->filterByShipmentDeliveryTime(array('min' => 12)); // WHERE shipment_delivery_time > 12
     * </code>
     *
     * @param     mixed $shipmentDeliveryTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByShipmentDeliveryTime($shipmentDeliveryTime = null, $comparison = null)
    {
        if (is_array($shipmentDeliveryTime)) {
            $useMinMax = false;
            if (isset($shipmentDeliveryTime['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME, $shipmentDeliveryTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shipmentDeliveryTime['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME, $shipmentDeliveryTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME, $shipmentDeliveryTime, $comparison);
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesOrderTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByCustomer($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_CUSTOMER, $spyCustomer->getIdCustomer(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_CUSTOMER, $spyCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

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
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', '\Propel\SpyCustomerQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderAddress object
     *
     * @param \Propel\SpySalesOrderAddress|ObjectCollection $spySalesOrderAddress The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByBillingAddress($spySalesOrderAddress, $comparison = null)
    {
        if ($spySalesOrderAddress instanceof \Propel\SpySalesOrderAddress) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $spySalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($spySalesOrderAddress instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, $spySalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterByBillingAddress() only accepts arguments of type \Propel\SpySalesOrderAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BillingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinBillingAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BillingAddress');

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
            $this->addJoinObject($join, 'BillingAddress');
        }

        return $this;
    }

    /**
     * Use the BillingAddress relation SpySalesOrderAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useBillingAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBillingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BillingAddress', '\Propel\SpySalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderAddress object
     *
     * @param \Propel\SpySalesOrderAddress|ObjectCollection $spySalesOrderAddress The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByShippingAddress($spySalesOrderAddress, $comparison = null)
    {
        if ($spySalesOrderAddress instanceof \Propel\SpySalesOrderAddress) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $spySalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($spySalesOrderAddress instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, $spySalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterByShippingAddress() only accepts arguments of type \Propel\SpySalesOrderAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinShippingAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShippingAddress');

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
            $this->addJoinObject($join, 'ShippingAddress');
        }

        return $this;
    }

    /**
     * Use the ShippingAddress relation SpySalesOrderAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useShippingAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShippingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAddress', '\Propel\SpySalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyShipmentMethod object
     *
     * @param \Propel\SpyShipmentMethod|ObjectCollection $spyShipmentMethod The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByShipmentMethod($spyShipmentMethod, $comparison = null)
    {
        if ($spyShipmentMethod instanceof \Propel\SpyShipmentMethod) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $spyShipmentMethod->getIdShipmentMethod(), $comparison);
        } elseif ($spyShipmentMethod instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, $spyShipmentMethod->toKeyValue('PrimaryKey', 'IdShipmentMethod'), $comparison);
        } else {
            throw new PropelException('filterByShipmentMethod() only accepts arguments of type \Propel\SpyShipmentMethod or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipmentMethod relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinShipmentMethod($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipmentMethod');

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
            $this->addJoinObject($join, 'ShipmentMethod');
        }

        return $this;
    }

    /**
     * Use the ShipmentMethod relation SpyShipmentMethod object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyShipmentMethodQuery A secondary query class using the current class as primary query
     */
    public function useShipmentMethodQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShipmentMethod($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipmentMethod', '\Propel\SpyShipmentMethodQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsTransitionLog object
     *
     * @param \Propel\SpyOmsTransitionLog|ObjectCollection $spyOmsTransitionLog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByTransitionLog($spyOmsTransitionLog, $comparison = null)
    {
        if ($spyOmsTransitionLog instanceof \Propel\SpyOmsTransitionLog) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spyOmsTransitionLog->getFkSalesOrder(), $comparison);
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyPaymentPayolution object
     *
     * @param \Propel\SpyPaymentPayolution|ObjectCollection $spyPaymentPayolution the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolution($spyPaymentPayolution, $comparison = null)
    {
        if ($spyPaymentPayolution instanceof \Propel\SpyPaymentPayolution) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spyPaymentPayolution->getFkSalesOrder(), $comparison);
        } elseif ($spyPaymentPayolution instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayolutionQuery()
                ->filterByPrimaryKeys($spyPaymentPayolution->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayolution() only accepts arguments of type \Propel\SpyPaymentPayolution or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolution relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolution($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolution');

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
            $this->addJoinObject($join, 'SpyPaymentPayolution');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolution relation SpyPaymentPayolution object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolution($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolution', '\Propel\SpyPaymentPayolutionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayone object
     *
     * @param \Propel\SpyPaymentPayone|ObjectCollection $spyPaymentPayone the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayone($spyPaymentPayone, $comparison = null)
    {
        if ($spyPaymentPayone instanceof \Propel\SpyPaymentPayone) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spyPaymentPayone->getFkSalesOrder(), $comparison);
        } elseif ($spyPaymentPayone instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayoneQuery()
                ->filterByPrimaryKeys($spyPaymentPayone->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayone() only accepts arguments of type \Propel\SpyPaymentPayone or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayone($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayone');

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
            $this->addJoinObject($join, 'SpyPaymentPayone');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayone relation SpyPaymentPayone object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayoneQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayoneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayone', '\Propel\SpyPaymentPayoneQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyRefund object
     *
     * @param \Propel\SpyRefund|ObjectCollection $spyRefund the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterBySpyRefund($spyRefund, $comparison = null)
    {
        if ($spyRefund instanceof \Propel\SpyRefund) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spyRefund->getFkSalesOrder(), $comparison);
        } elseif ($spyRefund instanceof ObjectCollection) {
            return $this
                ->useSpyRefundQuery()
                ->filterByPrimaryKeys($spyRefund->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinSpyRefund($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSpyRefundQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyRefund($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyRefund', '\Propel\SpyRefundQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesOrderItem->getFkSalesOrder(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            return $this
                ->useItemQuery()
                ->filterByPrimaryKeys($spySalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByItem() only accepts arguments of type \Propel\SpySalesOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Item relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Item');

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
            $this->addJoinObject($join, 'Item');
        }

        return $this;
    }

    /**
     * Use the Item relation SpySalesOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Item', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesExpense object
     *
     * @param \Propel\SpySalesExpense|ObjectCollection $spySalesExpense the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByExpense($spySalesExpense, $comparison = null)
    {
        if ($spySalesExpense instanceof \Propel\SpySalesExpense) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesExpense->getFkSalesOrder(), $comparison);
        } elseif ($spySalesExpense instanceof ObjectCollection) {
            return $this
                ->useExpenseQuery()
                ->filterByPrimaryKeys($spySalesExpense->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpense() only accepts arguments of type \Propel\SpySalesExpense or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
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
     * Use the Expense relation SpySalesExpense object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expense', '\Propel\SpySalesExpenseQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderNote object
     *
     * @param \Propel\SpySalesOrderNote|ObjectCollection $spySalesOrderNote the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByNote($spySalesOrderNote, $comparison = null)
    {
        if ($spySalesOrderNote instanceof \Propel\SpySalesOrderNote) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesOrderNote->getFkSalesOrder(), $comparison);
        } elseif ($spySalesOrderNote instanceof ObjectCollection) {
            return $this
                ->useNoteQuery()
                ->filterByPrimaryKeys($spySalesOrderNote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNote() only accepts arguments of type \Propel\SpySalesOrderNote or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Note relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Note');

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
            $this->addJoinObject($join, 'Note');
        }

        return $this;
    }

    /**
     * Use the Note relation SpySalesOrderNote object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderNoteQuery A secondary query class using the current class as primary query
     */
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Note', '\Propel\SpySalesOrderNoteQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderComment object
     *
     * @param \Propel\SpySalesOrderComment|ObjectCollection $spySalesOrderComment the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByOrderComment($spySalesOrderComment, $comparison = null)
    {
        if ($spySalesOrderComment instanceof \Propel\SpySalesOrderComment) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesOrderComment->getFkSalesOrder(), $comparison);
        } elseif ($spySalesOrderComment instanceof ObjectCollection) {
            return $this
                ->useOrderCommentQuery()
                ->filterByPrimaryKeys($spySalesOrderComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderComment() only accepts arguments of type \Propel\SpySalesOrderComment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function joinOrderComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderComment');

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
            $this->addJoinObject($join, 'OrderComment');
        }

        return $this;
    }

    /**
     * Use the OrderComment relation SpySalesOrderComment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderCommentQuery A secondary query class using the current class as primary query
     */
    public function useOrderCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderComment', '\Propel\SpySalesOrderCommentQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesDiscount object
     *
     * @param \Propel\SpySalesDiscount|ObjectCollection $spySalesDiscount the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function filterByDiscount($spySalesDiscount, $comparison = null)
    {
        if ($spySalesDiscount instanceof \Propel\SpySalesDiscount) {
            return $this
                ->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesDiscount->getFkSalesOrder(), $comparison);
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
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
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
     * @param   ChildSpySalesOrder $spySalesOrder Object to remove from the list of results
     *
     * @return $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function prune($spySalesOrder = null)
    {
        if ($spySalesOrder) {
            $this->addUsingAlias(SpySalesOrderTableMap::COL_ID_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesOrderTableMap::clearInstancePool();
            SpySalesOrderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesOrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesOrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesOrderQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderTableMap::COL_CREATED_AT);
    }

} // SpySalesOrderQuery
