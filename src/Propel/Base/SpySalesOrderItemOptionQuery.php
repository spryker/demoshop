<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrderItemOption as ChildSpySalesOrderItemOption;
use Propel\SpySalesOrderItemOptionQuery as ChildSpySalesOrderItemOptionQuery;
use Propel\Map\SpySalesOrderItemOptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_order_item_option' table.
 *
 *
 *
 * @method     ChildSpySalesOrderItemOptionQuery orderByIdSalesOrderItemOption($order = Criteria::ASC) Order by the id_sales_order_item_option column
 * @method     ChildSpySalesOrderItemOptionQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method     ChildSpySalesOrderItemOptionQuery orderByLabelOptionType($order = Criteria::ASC) Order by the label_option_type column
 * @method     ChildSpySalesOrderItemOptionQuery orderByLabelOptionValue($order = Criteria::ASC) Order by the label_option_value column
 * @method     ChildSpySalesOrderItemOptionQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method     ChildSpySalesOrderItemOptionQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method     ChildSpySalesOrderItemOptionQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method     ChildSpySalesOrderItemOptionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesOrderItemOptionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesOrderItemOptionQuery groupByIdSalesOrderItemOption() Group by the id_sales_order_item_option column
 * @method     ChildSpySalesOrderItemOptionQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method     ChildSpySalesOrderItemOptionQuery groupByLabelOptionType() Group by the label_option_type column
 * @method     ChildSpySalesOrderItemOptionQuery groupByLabelOptionValue() Group by the label_option_value column
 * @method     ChildSpySalesOrderItemOptionQuery groupByGrossPrice() Group by the gross_price column
 * @method     ChildSpySalesOrderItemOptionQuery groupByPriceToPay() Group by the price_to_pay column
 * @method     ChildSpySalesOrderItemOptionQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method     ChildSpySalesOrderItemOptionQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesOrderItemOptionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesOrderItemOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesOrderItemOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesOrderItemOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesOrderItemOptionQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpySalesOrderItemOptionQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpySalesOrderItemOptionQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method     ChildSpySalesOrderItemOptionQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderItemOptionQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesOrderItemOptionQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpySalesOrderItemQuery|\Propel\SpySalesDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesOrderItemOption findOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemOption matching the query
 * @method     ChildSpySalesOrderItemOption findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemOption matching the query, or a new ChildSpySalesOrderItemOption object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesOrderItemOption findOneByIdSalesOrderItemOption(int $id_sales_order_item_option) Return the first ChildSpySalesOrderItemOption filtered by the id_sales_order_item_option column
 * @method     ChildSpySalesOrderItemOption findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpySalesOrderItemOption filtered by the fk_sales_order_item column
 * @method     ChildSpySalesOrderItemOption findOneByLabelOptionType(string $label_option_type) Return the first ChildSpySalesOrderItemOption filtered by the label_option_type column
 * @method     ChildSpySalesOrderItemOption findOneByLabelOptionValue(string $label_option_value) Return the first ChildSpySalesOrderItemOption filtered by the label_option_value column
 * @method     ChildSpySalesOrderItemOption findOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItemOption filtered by the gross_price column
 * @method     ChildSpySalesOrderItemOption findOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesOrderItemOption filtered by the price_to_pay column
 * @method     ChildSpySalesOrderItemOption findOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesOrderItemOption filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItemOption findOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItemOption filtered by the created_at column
 * @method     ChildSpySalesOrderItemOption findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItemOption filtered by the updated_at column *

 * @method     ChildSpySalesOrderItemOption requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesOrderItemOption by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemOption matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItemOption requireOneByIdSalesOrderItemOption(int $id_sales_order_item_option) Return the first ChildSpySalesOrderItemOption filtered by the id_sales_order_item_option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpySalesOrderItemOption filtered by the fk_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByLabelOptionType(string $label_option_type) Return the first ChildSpySalesOrderItemOption filtered by the label_option_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByLabelOptionValue(string $label_option_value) Return the first ChildSpySalesOrderItemOption filtered by the label_option_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItemOption filtered by the gross_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByPriceToPay(int $price_to_pay) Return the first ChildSpySalesOrderItemOption filtered by the price_to_pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesOrderItemOption filtered by the tax_percentage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItemOption filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemOption requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItemOption filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesOrderItemOption objects based on current ModelCriteria
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByIdSalesOrderItemOption(int $id_sales_order_item_option) Return ChildSpySalesOrderItemOption objects filtered by the id_sales_order_item_option column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByFkSalesOrderItem(int $fk_sales_order_item) Return ChildSpySalesOrderItemOption objects filtered by the fk_sales_order_item column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByLabelOptionType(string $label_option_type) Return ChildSpySalesOrderItemOption objects filtered by the label_option_type column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByLabelOptionValue(string $label_option_value) Return ChildSpySalesOrderItemOption objects filtered by the label_option_value column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByGrossPrice(int $gross_price) Return ChildSpySalesOrderItemOption objects filtered by the gross_price column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByPriceToPay(int $price_to_pay) Return ChildSpySalesOrderItemOption objects filtered by the price_to_pay column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByTaxPercentage(string $tax_percentage) Return ChildSpySalesOrderItemOption objects filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesOrderItemOption objects filtered by the created_at column
 * @method     ChildSpySalesOrderItemOption[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesOrderItemOption objects filtered by the updated_at column
 * @method     ChildSpySalesOrderItemOption[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesOrderItemOptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesOrderItemOptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesOrderItemOption', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesOrderItemOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesOrderItemOptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesOrderItemOptionQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesOrderItemOptionQuery();
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
     * @return ChildSpySalesOrderItemOption|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesOrderItemOptionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderItemOptionTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesOrderItemOption A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sales_order_item_option, fk_sales_order_item, label_option_type, label_option_value, gross_price, price_to_pay, tax_percentage, created_at, updated_at FROM spy_sales_order_item_option WHERE id_sales_order_item_option = :p0';
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
            /** @var ChildSpySalesOrderItemOption $obj */
            $obj = new ChildSpySalesOrderItemOption();
            $obj->hydrate($row);
            SpySalesOrderItemOptionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesOrderItemOption|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemOption(1234); // WHERE id_sales_order_item_option = 1234
     * $query->filterByIdSalesOrderItemOption(array(12, 34)); // WHERE id_sales_order_item_option IN (12, 34)
     * $query->filterByIdSalesOrderItemOption(array('min' => 12)); // WHERE id_sales_order_item_option > 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemOption($idSalesOrderItemOption = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemOption)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemOption['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $idSalesOrderItemOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemOption['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $idSalesOrderItemOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $idSalesOrderItemOption, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the label_option_type column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelOptionType('fooValue');   // WHERE label_option_type = 'fooValue'
     * $query->filterByLabelOptionType('%fooValue%'); // WHERE label_option_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labelOptionType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByLabelOptionType($labelOptionType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelOptionType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $labelOptionType)) {
                $labelOptionType = str_replace('*', '%', $labelOptionType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_LABEL_OPTION_TYPE, $labelOptionType, $comparison);
    }

    /**
     * Filter the query on the label_option_value column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelOptionValue('fooValue');   // WHERE label_option_value = 'fooValue'
     * $query->filterByLabelOptionValue('%fooValue%'); // WHERE label_option_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labelOptionValue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByLabelOptionValue($labelOptionValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelOptionValue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $labelOptionValue)) {
                $labelOptionValue = str_replace('*', '%', $labelOptionValue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_LABEL_OPTION_VALUE, $labelOptionValue, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_GROSS_PRICE, $grossPrice, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_PRICE_TO_PAY, $priceToPay, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_TAX_PERCENTAGE, $taxPercentage, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function joinOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesDiscount object
     *
     * @param \Propel\SpySalesDiscount|ObjectCollection $spySalesDiscount the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function filterByDiscount($spySalesDiscount, $comparison = null)
    {
        if ($spySalesDiscount instanceof \Propel\SpySalesDiscount) {
            return $this
                ->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $spySalesDiscount->getFkSalesOrderItemOption(), $comparison);
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
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
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
     * @param   ChildSpySalesOrderItemOption $spySalesOrderItemOption Object to remove from the list of results
     *
     * @return $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function prune($spySalesOrderItemOption = null)
    {
        if ($spySalesOrderItemOption) {
            $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_ID_SALES_ORDER_ITEM_OPTION, $spySalesOrderItemOption->getIdSalesOrderItemOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_order_item_option table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemOptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesOrderItemOptionTableMap::clearInstancePool();
            SpySalesOrderItemOptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemOptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesOrderItemOptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesOrderItemOptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesOrderItemOptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemOptionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemOptionTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemOptionTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesOrderItemOptionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemOptionTableMap::COL_CREATED_AT);
    }

} // SpySalesOrderItemOptionQuery
