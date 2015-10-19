<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesDiscount as ChildSpySalesDiscount;
use Propel\SpySalesDiscountQuery as ChildSpySalesDiscountQuery;
use Propel\Map\SpySalesDiscountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_discount' table.
 *
 *
 *
 * @method     ChildSpySalesDiscountQuery orderByIdSalesDiscount($order = Criteria::ASC) Order by the id_sales_discount column
 * @method     ChildSpySalesDiscountQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpySalesDiscountQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method     ChildSpySalesDiscountQuery orderByFkSalesExpense($order = Criteria::ASC) Order by the fk_sales_expense column
 * @method     ChildSpySalesDiscountQuery orderByFkSalesOrderItemOption($order = Criteria::ASC) Order by the fk_sales_order_item_option column
 * @method     ChildSpySalesDiscountQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpySalesDiscountQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildSpySalesDiscountQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method     ChildSpySalesDiscountQuery orderByScope($order = Criteria::ASC) Order by the scope column
 * @method     ChildSpySalesDiscountQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildSpySalesDiscountQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method     ChildSpySalesDiscountQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildSpySalesDiscountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesDiscountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesDiscountQuery groupByIdSalesDiscount() Group by the id_sales_discount column
 * @method     ChildSpySalesDiscountQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpySalesDiscountQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method     ChildSpySalesDiscountQuery groupByFkSalesExpense() Group by the fk_sales_expense column
 * @method     ChildSpySalesDiscountQuery groupByFkSalesOrderItemOption() Group by the fk_sales_order_item_option column
 * @method     ChildSpySalesDiscountQuery groupByName() Group by the name column
 * @method     ChildSpySalesDiscountQuery groupByDescription() Group by the description column
 * @method     ChildSpySalesDiscountQuery groupByDisplayName() Group by the display_name column
 * @method     ChildSpySalesDiscountQuery groupByScope() Group by the scope column
 * @method     ChildSpySalesDiscountQuery groupByAction() Group by the action column
 * @method     ChildSpySalesDiscountQuery groupByConditions() Group by the conditions column
 * @method     ChildSpySalesDiscountQuery groupByAmount() Group by the amount column
 * @method     ChildSpySalesDiscountQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesDiscountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesDiscountQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesDiscountQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesDiscountQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     ChildSpySalesDiscountQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpySalesDiscountQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpySalesDiscountQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method     ChildSpySalesDiscountQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method     ChildSpySalesDiscountQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method     ChildSpySalesDiscountQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method     ChildSpySalesDiscountQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method     ChildSpySalesDiscountQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method     ChildSpySalesDiscountQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method     ChildSpySalesDiscountQuery leftJoinDiscountCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscountCode relation
 * @method     ChildSpySalesDiscountQuery rightJoinDiscountCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscountCode relation
 * @method     ChildSpySalesDiscountQuery innerJoinDiscountCode($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscountCode relation
 *
 * @method     \Propel\SpySalesOrderQuery|\Propel\SpySalesOrderItemQuery|\Propel\SpySalesExpenseQuery|\Propel\SpySalesOrderItemOptionQuery|\Propel\SpySalesDiscountCodeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesDiscount findOne(ConnectionInterface $con = null) Return the first ChildSpySalesDiscount matching the query
 * @method     ChildSpySalesDiscount findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesDiscount matching the query, or a new ChildSpySalesDiscount object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesDiscount findOneByIdSalesDiscount(int $id_sales_discount) Return the first ChildSpySalesDiscount filtered by the id_sales_discount column
 * @method     ChildSpySalesDiscount findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesDiscount filtered by the fk_sales_order column
 * @method     ChildSpySalesDiscount findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpySalesDiscount filtered by the fk_sales_order_item column
 * @method     ChildSpySalesDiscount findOneByFkSalesExpense(int $fk_sales_expense) Return the first ChildSpySalesDiscount filtered by the fk_sales_expense column
 * @method     ChildSpySalesDiscount findOneByFkSalesOrderItemOption(int $fk_sales_order_item_option) Return the first ChildSpySalesDiscount filtered by the fk_sales_order_item_option column
 * @method     ChildSpySalesDiscount findOneByName(string $name) Return the first ChildSpySalesDiscount filtered by the name column
 * @method     ChildSpySalesDiscount findOneByDescription(string $description) Return the first ChildSpySalesDiscount filtered by the description column
 * @method     ChildSpySalesDiscount findOneByDisplayName(string $display_name) Return the first ChildSpySalesDiscount filtered by the display_name column
 * @method     ChildSpySalesDiscount findOneByScope(int $scope) Return the first ChildSpySalesDiscount filtered by the scope column
 * @method     ChildSpySalesDiscount findOneByAction(string $action) Return the first ChildSpySalesDiscount filtered by the action column
 * @method     ChildSpySalesDiscount findOneByConditions(string $conditions) Return the first ChildSpySalesDiscount filtered by the conditions column
 * @method     ChildSpySalesDiscount findOneByAmount(int $amount) Return the first ChildSpySalesDiscount filtered by the amount column
 * @method     ChildSpySalesDiscount findOneByCreatedAt(string $created_at) Return the first ChildSpySalesDiscount filtered by the created_at column
 * @method     ChildSpySalesDiscount findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesDiscount filtered by the updated_at column *

 * @method     ChildSpySalesDiscount requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesDiscount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesDiscount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesDiscount requireOneByIdSalesDiscount(int $id_sales_discount) Return the first ChildSpySalesDiscount filtered by the id_sales_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesDiscount filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpySalesDiscount filtered by the fk_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByFkSalesExpense(int $fk_sales_expense) Return the first ChildSpySalesDiscount filtered by the fk_sales_expense column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByFkSalesOrderItemOption(int $fk_sales_order_item_option) Return the first ChildSpySalesDiscount filtered by the fk_sales_order_item_option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByName(string $name) Return the first ChildSpySalesDiscount filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByDescription(string $description) Return the first ChildSpySalesDiscount filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByDisplayName(string $display_name) Return the first ChildSpySalesDiscount filtered by the display_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByScope(int $scope) Return the first ChildSpySalesDiscount filtered by the scope column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByAction(string $action) Return the first ChildSpySalesDiscount filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByConditions(string $conditions) Return the first ChildSpySalesDiscount filtered by the conditions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByAmount(int $amount) Return the first ChildSpySalesDiscount filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesDiscount filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscount requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesDiscount filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesDiscount[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesDiscount objects based on current ModelCriteria
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByIdSalesDiscount(int $id_sales_discount) Return ChildSpySalesDiscount objects filtered by the id_sales_discount column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpySalesDiscount objects filtered by the fk_sales_order column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByFkSalesOrderItem(int $fk_sales_order_item) Return ChildSpySalesDiscount objects filtered by the fk_sales_order_item column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByFkSalesExpense(int $fk_sales_expense) Return ChildSpySalesDiscount objects filtered by the fk_sales_expense column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByFkSalesOrderItemOption(int $fk_sales_order_item_option) Return ChildSpySalesDiscount objects filtered by the fk_sales_order_item_option column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByName(string $name) Return ChildSpySalesDiscount objects filtered by the name column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByDescription(string $description) Return ChildSpySalesDiscount objects filtered by the description column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByDisplayName(string $display_name) Return ChildSpySalesDiscount objects filtered by the display_name column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByScope(int $scope) Return ChildSpySalesDiscount objects filtered by the scope column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByAction(string $action) Return ChildSpySalesDiscount objects filtered by the action column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByConditions(string $conditions) Return ChildSpySalesDiscount objects filtered by the conditions column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByAmount(int $amount) Return ChildSpySalesDiscount objects filtered by the amount column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesDiscount objects filtered by the created_at column
 * @method     ChildSpySalesDiscount[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesDiscount objects filtered by the updated_at column
 * @method     ChildSpySalesDiscount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesDiscountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesDiscountQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesDiscount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesDiscountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesDiscountQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesDiscountQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesDiscountQuery();
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
     * @return ChildSpySalesDiscount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesDiscountTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesDiscountTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesDiscount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sales_discount, fk_sales_order, fk_sales_order_item, fk_sales_expense, fk_sales_order_item_option, name, description, display_name, scope, action, conditions, amount, created_at, updated_at FROM spy_sales_discount WHERE id_sales_discount = :p0';
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
            /** @var ChildSpySalesDiscount $obj */
            $obj = new ChildSpySalesDiscount();
            $obj->hydrate($row);
            SpySalesDiscountTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesDiscount|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesDiscount(1234); // WHERE id_sales_discount = 1234
     * $query->filterByIdSalesDiscount(array(12, 34)); // WHERE id_sales_discount IN (12, 34)
     * $query->filterByIdSalesDiscount(array('min' => 12)); // WHERE id_sales_discount > 12
     * </code>
     *
     * @param     mixed $idSalesDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByIdSalesDiscount($idSalesDiscount = null, $comparison = null)
    {
        if (is_array($idSalesDiscount)) {
            $useMinMax = false;
            if (isset($idSalesDiscount['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $idSalesDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesDiscount['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $idSalesDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $idSalesDiscount, $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item > 12
     * </code>
     *
     * @see       filterByOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_expense column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesExpense(1234); // WHERE fk_sales_expense = 1234
     * $query->filterByFkSalesExpense(array(12, 34)); // WHERE fk_sales_expense IN (12, 34)
     * $query->filterByFkSalesExpense(array('min' => 12)); // WHERE fk_sales_expense > 12
     * </code>
     *
     * @see       filterByExpense()
     *
     * @param     mixed $fkSalesExpense The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesExpense($fkSalesExpense = null, $comparison = null)
    {
        if (is_array($fkSalesExpense)) {
            $useMinMax = false;
            if (isset($fkSalesExpense['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $fkSalesExpense['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesExpense['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $fkSalesExpense['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $fkSalesExpense, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_option column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemOption(1234); // WHERE fk_sales_order_item_option = 1234
     * $query->filterByFkSalesOrderItemOption(array(12, 34)); // WHERE fk_sales_order_item_option IN (12, 34)
     * $query->filterByFkSalesOrderItemOption(array('min' => 12)); // WHERE fk_sales_order_item_option > 12
     * </code>
     *
     * @see       filterByOption()
     *
     * @param     mixed $fkSalesOrderItemOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemOption($fkSalesOrderItemOption = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemOption)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemOption['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemOption['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption, $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the display_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayName('fooValue');   // WHERE display_name = 'fooValue'
     * $query->filterByDisplayName('%fooValue%'); // WHERE display_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByDisplayName($displayName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayName)) {
                $displayName = str_replace('*', '%', $displayName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_DISPLAY_NAME, $displayName, $comparison);
    }

    /**
     * Filter the query on the scope column
     *
     * @param     mixed $scope The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByScope($scope = null, $comparison = null)
    {
        $valueSet = SpySalesDiscountTableMap::getValueSet(SpySalesDiscountTableMap::COL_SCOPE);
        if (is_scalar($scope)) {
            if (!in_array($scope, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $scope));
            }
            $scope = array_search($scope, $valueSet);
        } elseif (is_array($scope)) {
            $convertedValues = array();
            foreach ($scope as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $scope = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_SCOPE, $scope, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%'); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $action)) {
                $action = str_replace('*', '%', $action);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the conditions column
     *
     * Example usage:
     * <code>
     * $query->filterByConditions('fooValue');   // WHERE conditions = 'fooValue'
     * $query->filterByConditions('%fooValue%'); // WHERE conditions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $conditions The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByConditions($conditions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($conditions)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $conditions)) {
                $conditions = str_replace('*', '%', $conditions);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesDiscountTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type \Propel\SpySalesOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function joinOrderItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderItem');

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
            $this->addJoinObject($join, 'OrderItem');
        }

        return $this;
    }

    /**
     * Use the OrderItem relation SpySalesOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesExpense object
     *
     * @param \Propel\SpySalesExpense|ObjectCollection $spySalesExpense The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByExpense($spySalesExpense, $comparison = null)
    {
        if ($spySalesExpense instanceof \Propel\SpySalesExpense) {
            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $spySalesExpense->getIdSalesExpense(), $comparison);
        } elseif ($spySalesExpense instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, $spySalesExpense->toKeyValue('PrimaryKey', 'IdSalesExpense'), $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpySalesOrderItemOption object
     *
     * @param \Propel\SpySalesOrderItemOption|ObjectCollection $spySalesOrderItemOption The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByOption($spySalesOrderItemOption, $comparison = null)
    {
        if ($spySalesOrderItemOption instanceof \Propel\SpySalesOrderItemOption) {
            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $spySalesOrderItemOption->getIdSalesOrderItemOption(), $comparison);
        } elseif ($spySalesOrderItemOption instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, $spySalesOrderItemOption->toKeyValue('PrimaryKey', 'IdSalesOrderItemOption'), $comparison);
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
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', '\Propel\SpySalesOrderItemOptionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesDiscountCode object
     *
     * @param \Propel\SpySalesDiscountCode|ObjectCollection $spySalesDiscountCode the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function filterByDiscountCode($spySalesDiscountCode, $comparison = null)
    {
        if ($spySalesDiscountCode instanceof \Propel\SpySalesDiscountCode) {
            return $this
                ->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $spySalesDiscountCode->getFkSalesDiscount(), $comparison);
        } elseif ($spySalesDiscountCode instanceof ObjectCollection) {
            return $this
                ->useDiscountCodeQuery()
                ->filterByPrimaryKeys($spySalesDiscountCode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscountCode() only accepts arguments of type \Propel\SpySalesDiscountCode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiscountCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function joinDiscountCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiscountCode');

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
            $this->addJoinObject($join, 'DiscountCode');
        }

        return $this;
    }

    /**
     * Use the DiscountCode relation SpySalesDiscountCode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesDiscountCodeQuery A secondary query class using the current class as primary query
     */
    public function useDiscountCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscountCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiscountCode', '\Propel\SpySalesDiscountCodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySalesDiscount $spySalesDiscount Object to remove from the list of results
     *
     * @return $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function prune($spySalesDiscount = null)
    {
        if ($spySalesDiscount) {
            $this->addUsingAlias(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, $spySalesDiscount->getIdSalesDiscount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesDiscountTableMap::clearInstancePool();
            SpySalesDiscountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesDiscountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesDiscountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesDiscountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesDiscountTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesDiscountTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesDiscountTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesDiscountTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesDiscountQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesDiscountTableMap::COL_CREATED_AT);
    }

} // SpySalesDiscountQuery
