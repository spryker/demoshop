<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesExpense as ChildSpySalesExpense;
use Propel\SpySalesExpenseQuery as ChildSpySalesExpenseQuery;
use Propel\Map\SpySalesExpenseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_expense' table.
 *
 *
 *
 * @method     ChildSpySalesExpenseQuery orderByFkRefund($order = Criteria::ASC) Order by the fk_refund column
 * @method     ChildSpySalesExpenseQuery orderByIdSalesExpense($order = Criteria::ASC) Order by the id_sales_expense column
 * @method     ChildSpySalesExpenseQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpySalesExpenseQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpySalesExpenseQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpySalesExpenseQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method     ChildSpySalesExpenseQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method     ChildSpySalesExpenseQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method     ChildSpySalesExpenseQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesExpenseQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesExpenseQuery groupByFkRefund() Group by the fk_refund column
 * @method     ChildSpySalesExpenseQuery groupByIdSalesExpense() Group by the id_sales_expense column
 * @method     ChildSpySalesExpenseQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpySalesExpenseQuery groupByType() Group by the type column
 * @method     ChildSpySalesExpenseQuery groupByName() Group by the name column
 * @method     ChildSpySalesExpenseQuery groupByGrossPrice() Group by the gross_price column
 * @method     ChildSpySalesExpenseQuery groupByPriceToPay() Group by the price_to_pay column
 * @method     ChildSpySalesExpenseQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method     ChildSpySalesExpenseQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesExpenseQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesExpenseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesExpenseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesExpenseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesExpenseQuery leftJoinSpyRefund($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesExpenseQuery rightJoinSpyRefund($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyRefund relation
 * @method     ChildSpySalesExpenseQuery innerJoinSpyRefund($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyRefund relation
 *
 * @method     ChildSpySalesExpenseQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesExpenseQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpySalesExpenseQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     ChildSpySalesExpenseQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesExpenseQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesExpenseQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpyRefundQuery|\Propel\SpySalesOrderQuery|\Propel\SpySalesDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesExpense findOne(ConnectionInterface $con = null) Return the first ChildSpySalesExpense matching the query
 * @method     ChildSpySalesExpense findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesExpense matching the query, or a new ChildSpySalesExpense object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesExpense findOneByFkRefund(int $fk_refund) Return the first ChildSpySalesExpense filtered by the fk_refund column
 * @method     ChildSpySalesExpense findOneByIdSalesExpense(int $id_sales_expense) Return the first ChildSpySalesExpense filtered by the id_sales_expense column
 * @method     ChildSpySalesExpense findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesExpense filtered by the fk_sales_order column
 * @method     ChildSpySalesExpense findOneByType(string $type) Return the first ChildSpySalesExpense filtered by the type column
 * @method     ChildSpySalesExpense findOneByName(string $name) Return the first ChildSpySalesExpense filtered by the name column
 * @method     ChildSpySalesExpense findOneByGrossPrice(int $gross_price) Return the first ChildSpySalesExpense filtered by the gross_price column
 * @method     ChildSpySalesExpense findOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesExpense filtered by the price_to_pay column
 * @method     ChildSpySalesExpense findOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesExpense filtered by the tax_percentage column
 * @method     ChildSpySalesExpense findOneByCreatedAt(string $created_at) Return the first ChildSpySalesExpense filtered by the created_at column
 * @method     ChildSpySalesExpense findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesExpense filtered by the updated_at column *

 * @method     ChildSpySalesExpense requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesExpense by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesExpense matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesExpense requireOneByFkRefund(int $fk_refund) Return the first ChildSpySalesExpense filtered by the fk_refund column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByIdSalesExpense(int $id_sales_expense) Return the first ChildSpySalesExpense filtered by the id_sales_expense column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpySalesExpense filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByType(string $type) Return the first ChildSpySalesExpense filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByName(string $name) Return the first ChildSpySalesExpense filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByGrossPrice(int $gross_price) Return the first ChildSpySalesExpense filtered by the gross_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesExpense filtered by the price_to_pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesExpense filtered by the tax_percentage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesExpense filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesExpense requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesExpense filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesExpense[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesExpense objects based on current ModelCriteria
 * @method     ChildSpySalesExpense[]|ObjectCollection findByFkRefund(int $fk_refund) Return ChildSpySalesExpense objects filtered by the fk_refund column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByIdSalesExpense(int $id_sales_expense) Return ChildSpySalesExpense objects filtered by the id_sales_expense column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpySalesExpense objects filtered by the fk_sales_order column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByType(string $type) Return ChildSpySalesExpense objects filtered by the type column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByName(string $name) Return ChildSpySalesExpense objects filtered by the name column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByGrossPrice(int $gross_price) Return ChildSpySalesExpense objects filtered by the gross_price column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByPriceToPay(int $price_to_pay) Return ChildSpySalesExpense objects filtered by the price_to_pay column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByTaxPercentage(string $tax_percentage) Return ChildSpySalesExpense objects filtered by the tax_percentage column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesExpense objects filtered by the created_at column
 * @method     ChildSpySalesExpense[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesExpense objects filtered by the updated_at column
 * @method     ChildSpySalesExpense[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesExpenseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesExpenseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesExpense', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesExpenseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesExpenseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesExpenseQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesExpenseQuery();
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
     * @return ChildSpySalesExpense|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesExpenseTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesExpenseTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesExpense A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_refund, id_sales_expense, fk_sales_order, type, name, gross_price, price_to_pay, tax_percentage, created_at, updated_at FROM spy_sales_expense WHERE id_sales_expense = :p0';
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
            /** @var ChildSpySalesExpense $obj */
            $obj = new ChildSpySalesExpense();
            $obj->hydrate($row);
            SpySalesExpenseTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesExpense|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $keys, Criteria::IN);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByFkRefund($fkRefund = null, $comparison = null)
    {
        if (is_array($fkRefund)) {
            $useMinMax = false;
            if (isset($fkRefund['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_REFUND, $fkRefund['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkRefund['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_REFUND, $fkRefund['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_REFUND, $fkRefund, $comparison);
    }

    /**
     * Filter the query on the id_sales_expense column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesExpense(1234); // WHERE id_sales_expense = 1234
     * $query->filterByIdSalesExpense(array(12, 34)); // WHERE id_sales_expense IN (12, 34)
     * $query->filterByIdSalesExpense(array('min' => 12)); // WHERE id_sales_expense > 12
     * </code>
     *
     * @param     mixed $idSalesExpense The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByIdSalesExpense($idSalesExpense = null, $comparison = null)
    {
        if (is_array($idSalesExpense)) {
            $useMinMax = false;
            if (isset($idSalesExpense['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $idSalesExpense['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesExpense['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $idSalesExpense['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $idSalesExpense, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_GROSS_PRICE, $grossPrice, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_PRICE_TO_PAY, $priceToPay, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_TAX_PERCENTAGE, $taxPercentage, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesExpenseTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyRefund object
     *
     * @param \Propel\SpyRefund|ObjectCollection $spyRefund The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterBySpyRefund($spyRefund, $comparison = null)
    {
        if ($spyRefund instanceof \Propel\SpyRefund) {
            return $this
                ->addUsingAlias(SpySalesExpenseTableMap::COL_FK_REFUND, $spyRefund->getIdRefund(), $comparison);
        } elseif ($spyRefund instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesExpenseTableMap::COL_FK_REFUND, $spyRefund->toKeyValue('PrimaryKey', 'IdRefund'), $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
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
     * @return ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpySalesExpenseTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesExpenseTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpySalesDiscount object
     *
     * @param \Propel\SpySalesDiscount|ObjectCollection $spySalesDiscount the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function filterByDiscount($spySalesDiscount, $comparison = null)
    {
        if ($spySalesDiscount instanceof \Propel\SpySalesDiscount) {
            return $this
                ->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $spySalesDiscount->getFkSalesExpense(), $comparison);
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
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
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
     * @param   ChildSpySalesExpense $spySalesExpense Object to remove from the list of results
     *
     * @return $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function prune($spySalesExpense = null)
    {
        if ($spySalesExpense) {
            $this->addUsingAlias(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, $spySalesExpense->getIdSalesExpense(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_expense table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesExpenseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesExpenseTableMap::clearInstancePool();
            SpySalesExpenseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesExpenseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesExpenseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesExpenseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesExpenseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesExpenseTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesExpenseTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesExpenseTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesExpenseTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesExpenseQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesExpenseTableMap::COL_CREATED_AT);
    }

} // SpySalesExpenseQuery
