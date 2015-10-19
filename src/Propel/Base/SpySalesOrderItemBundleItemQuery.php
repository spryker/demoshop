<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrderItemBundleItem as ChildSpySalesOrderItemBundleItem;
use Propel\SpySalesOrderItemBundleItemQuery as ChildSpySalesOrderItemBundleItemQuery;
use Propel\Map\SpySalesOrderItemBundleItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_order_item_bundle_item' table.
 *
 *
 *
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByIdSalesOrderItemBundleItem($order = Criteria::ASC) Order by the id_sales_order_item_bundle_item column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByFkSalesOrderItemBundle($order = Criteria::ASC) Order by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByVariety($order = Criteria::ASC) Order by the variety column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesOrderItemBundleItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByIdSalesOrderItemBundleItem() Group by the id_sales_order_item_bundle_item column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByFkSalesOrderItemBundle() Group by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByName() Group by the name column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupBySku() Group by the sku column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByGrossPrice() Group by the gross_price column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByVariety() Group by the variety column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesOrderItemBundleItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesOrderItemBundleItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesOrderItemBundleItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesOrderItemBundleItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesOrderItemBundleItemQuery leftJoinSalesOrderItemBundle($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method     ChildSpySalesOrderItemBundleItemQuery rightJoinSalesOrderItemBundle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderItemBundle relation
 * @method     ChildSpySalesOrderItemBundleItemQuery innerJoinSalesOrderItemBundle($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderItemBundle relation
 *
 * @method     \Propel\SpySalesOrderItemBundleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesOrderItemBundleItem findOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemBundleItem matching the query
 * @method     ChildSpySalesOrderItemBundleItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemBundleItem matching the query, or a new ChildSpySalesOrderItemBundleItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesOrderItemBundleItem findOneByIdSalesOrderItemBundleItem(int $id_sales_order_item_bundle_item) Return the first ChildSpySalesOrderItemBundleItem filtered by the id_sales_order_item_bundle_item column
 * @method     ChildSpySalesOrderItemBundleItem findOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ChildSpySalesOrderItemBundleItem filtered by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemBundleItem findOneByName(string $name) Return the first ChildSpySalesOrderItemBundleItem filtered by the name column
 * @method     ChildSpySalesOrderItemBundleItem findOneBySku(string $sku) Return the first ChildSpySalesOrderItemBundleItem filtered by the sku column
 * @method     ChildSpySalesOrderItemBundleItem findOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItemBundleItem filtered by the gross_price column
 * @method     ChildSpySalesOrderItemBundleItem findOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesOrderItemBundleItem filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItemBundleItem findOneByVariety(int $variety) Return the first ChildSpySalesOrderItemBundleItem filtered by the variety column
 * @method     ChildSpySalesOrderItemBundleItem findOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItemBundleItem filtered by the created_at column
 * @method     ChildSpySalesOrderItemBundleItem findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItemBundleItem filtered by the updated_at column *

 * @method     ChildSpySalesOrderItemBundleItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesOrderItemBundleItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderItemBundleItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItemBundleItem requireOneByIdSalesOrderItemBundleItem(int $id_sales_order_item_bundle_item) Return the first ChildSpySalesOrderItemBundleItem filtered by the id_sales_order_item_bundle_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return the first ChildSpySalesOrderItemBundleItem filtered by the fk_sales_order_item_bundle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByName(string $name) Return the first ChildSpySalesOrderItemBundleItem filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneBySku(string $sku) Return the first ChildSpySalesOrderItemBundleItem filtered by the sku column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByGrossPrice(int $gross_price) Return the first ChildSpySalesOrderItemBundleItem filtered by the gross_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByTaxPercentage(string $tax_percentage) Return the first ChildSpySalesOrderItemBundleItem filtered by the tax_percentage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByVariety(int $variety) Return the first ChildSpySalesOrderItemBundleItem filtered by the variety column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderItemBundleItem filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderItemBundleItem requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderItemBundleItem filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesOrderItemBundleItem objects based on current ModelCriteria
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByIdSalesOrderItemBundleItem(int $id_sales_order_item_bundle_item) Return ChildSpySalesOrderItemBundleItem objects filtered by the id_sales_order_item_bundle_item column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByFkSalesOrderItemBundle(int $fk_sales_order_item_bundle) Return ChildSpySalesOrderItemBundleItem objects filtered by the fk_sales_order_item_bundle column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByName(string $name) Return ChildSpySalesOrderItemBundleItem objects filtered by the name column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findBySku(string $sku) Return ChildSpySalesOrderItemBundleItem objects filtered by the sku column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByGrossPrice(int $gross_price) Return ChildSpySalesOrderItemBundleItem objects filtered by the gross_price column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByTaxPercentage(string $tax_percentage) Return ChildSpySalesOrderItemBundleItem objects filtered by the tax_percentage column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByVariety(int $variety) Return ChildSpySalesOrderItemBundleItem objects filtered by the variety column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesOrderItemBundleItem objects filtered by the created_at column
 * @method     ChildSpySalesOrderItemBundleItem[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesOrderItemBundleItem objects filtered by the updated_at column
 * @method     ChildSpySalesOrderItemBundleItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesOrderItemBundleItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesOrderItemBundleItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesOrderItemBundleItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesOrderItemBundleItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesOrderItemBundleItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesOrderItemBundleItemQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesOrderItemBundleItemQuery();
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
     * @return ChildSpySalesOrderItemBundleItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesOrderItemBundleItemTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderItemBundleItemTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesOrderItemBundleItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sales_order_item_bundle_item, fk_sales_order_item_bundle, name, sku, gross_price, tax_percentage, variety, created_at, updated_at FROM spy_sales_order_item_bundle_item WHERE id_sales_order_item_bundle_item = :p0';
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
            /** @var ChildSpySalesOrderItemBundleItem $obj */
            $obj = new ChildSpySalesOrderItemBundleItem();
            $obj->hydrate($row);
            SpySalesOrderItemBundleItemTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesOrderItemBundleItem|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_bundle_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemBundleItem(1234); // WHERE id_sales_order_item_bundle_item = 1234
     * $query->filterByIdSalesOrderItemBundleItem(array(12, 34)); // WHERE id_sales_order_item_bundle_item IN (12, 34)
     * $query->filterByIdSalesOrderItemBundleItem(array('min' => 12)); // WHERE id_sales_order_item_bundle_item > 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemBundleItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemBundleItem($idSalesOrderItemBundleItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemBundleItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemBundleItem['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemBundleItem['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $idSalesOrderItemBundleItem, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemBundle($fkSalesOrderItemBundle = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemBundle)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemBundle['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemBundle['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $fkSalesOrderItemBundle, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_SKU, $sku, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_GROSS_PRICE, $grossPrice, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_TAX_PERCENTAGE, $taxPercentage, $comparison);
    }

    /**
     * Filter the query on the variety column
     *
     * @param     mixed $variety The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByVariety($variety = null, $comparison = null)
    {
        $valueSet = SpySalesOrderItemBundleItemTableMap::getValueSet(SpySalesOrderItemBundleItemTableMap::COL_VARIETY);
        if (is_scalar($variety)) {
            if (!in_array($variety, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $variety));
            }
            $variety = array_search($variety, $valueSet);
        } elseif (is_array($variety)) {
            $convertedValues = array();
            foreach ($variety as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $variety = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_VARIETY, $variety, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItemBundle object
     *
     * @param \Propel\SpySalesOrderItemBundle|ObjectCollection $spySalesOrderItemBundle The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function filterBySalesOrderItemBundle($spySalesOrderItemBundle, $comparison = null)
    {
        if ($spySalesOrderItemBundle instanceof \Propel\SpySalesOrderItemBundle) {
            return $this
                ->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $spySalesOrderItemBundle->getIdSalesOrderItemBundle(), $comparison);
        } elseif ($spySalesOrderItemBundle instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, $spySalesOrderItemBundle->toKeyValue('PrimaryKey', 'IdSalesOrderItemBundle'), $comparison);
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
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
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
    public function useSalesOrderItemBundleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderItemBundle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderItemBundle', '\Propel\SpySalesOrderItemBundleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySalesOrderItemBundleItem $spySalesOrderItemBundleItem Object to remove from the list of results
     *
     * @return $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function prune($spySalesOrderItemBundleItem = null)
    {
        if ($spySalesOrderItemBundleItem) {
            $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE_ITEM, $spySalesOrderItemBundleItem->getIdSalesOrderItemBundleItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_order_item_bundle_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesOrderItemBundleItemTableMap::clearInstancePool();
            SpySalesOrderItemBundleItemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesOrderItemBundleItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesOrderItemBundleItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesOrderItemBundleItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemBundleItemTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesOrderItemBundleItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderItemBundleItemTableMap::COL_CREATED_AT);
    }

} // SpySalesOrderItemBundleItemQuery
