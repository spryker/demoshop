<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProduct as ChildSpyProduct;
use Propel\SpyProductQuery as ChildSpyProductQuery;
use Propel\Map\SpyProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product' table.
 *
 *
 *
 * @method     ChildSpyProductQuery orderByIdProduct($order = Criteria::ASC) Order by the id_product column
 * @method     ChildSpyProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method     ChildSpyProductQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildSpyProductQuery orderByAttributes($order = Criteria::ASC) Order by the attributes column
 * @method     ChildSpyProductQuery orderByFkAbstractProduct($order = Criteria::ASC) Order by the fk_abstract_product column
 * @method     ChildSpyProductQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyProductQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyProductQuery groupByIdProduct() Group by the id_product column
 * @method     ChildSpyProductQuery groupBySku() Group by the sku column
 * @method     ChildSpyProductQuery groupByIsActive() Group by the is_active column
 * @method     ChildSpyProductQuery groupByAttributes() Group by the attributes column
 * @method     ChildSpyProductQuery groupByFkAbstractProduct() Group by the fk_abstract_product column
 * @method     ChildSpyProductQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyProductQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyProductQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyProductQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     ChildSpyProductQuery leftJoinPriceProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyProductQuery rightJoinPriceProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyProductQuery innerJoinPriceProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceProduct relation
 *
 * @method     ChildSpyProductQuery leftJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocalizedProductAttributes relation
 * @method     ChildSpyProductQuery rightJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocalizedProductAttributes relation
 * @method     ChildSpyProductQuery innerJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocalizedProductAttributes relation
 *
 * @method     ChildSpyProductQuery leftJoinSpyProductToBundleRelatedByFkProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductToBundleRelatedByFkProduct relation
 * @method     ChildSpyProductQuery rightJoinSpyProductToBundleRelatedByFkProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductToBundleRelatedByFkProduct relation
 * @method     ChildSpyProductQuery innerJoinSpyProductToBundleRelatedByFkProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductToBundleRelatedByFkProduct relation
 *
 * @method     ChildSpyProductQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method     ChildSpyProductQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method     ChildSpyProductQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method     ChildSpyProductQuery leftJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductQuery rightJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeUsage relation
 * @method     ChildSpyProductQuery innerJoinSpyProductOptionTypeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeUsage relation
 *
 * @method     ChildSpyProductQuery leftJoinSpyProductOptionConfigurationPreset($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionConfigurationPreset relation
 * @method     ChildSpyProductQuery rightJoinSpyProductOptionConfigurationPreset($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionConfigurationPreset relation
 * @method     ChildSpyProductQuery innerJoinSpyProductOptionConfigurationPreset($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionConfigurationPreset relation
 *
 * @method     ChildSpyProductQuery leftJoinSpySearchableProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySearchableProducts relation
 * @method     ChildSpyProductQuery rightJoinSpySearchableProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySearchableProducts relation
 * @method     ChildSpyProductQuery innerJoinSpySearchableProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySearchableProducts relation
 *
 * @method     ChildSpyProductQuery leftJoinStockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockProduct relation
 * @method     ChildSpyProductQuery rightJoinStockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockProduct relation
 * @method     ChildSpyProductQuery innerJoinStockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the StockProduct relation
 *
 * @method     ChildSpyProductQuery leftJoinSpyWishlistItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyProductQuery rightJoinSpyWishlistItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyProductQuery innerJoinSpyWishlistItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyWishlistItem relation
 *
 * @method     \Propel\SpyAbstractProductQuery|\Propel\SpyPriceProductQuery|\Propel\SpyLocalizedProductAttributesQuery|\Propel\SpyProductToBundleQuery|\Propel\SpyProductOptionTypeUsageQuery|\Propel\SpyProductOptionConfigurationPresetQuery|\Propel\SpySearchableProductsQuery|\Propel\SpyStockProductQuery|\Propel\SpyWishlistItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProduct findOne(ConnectionInterface $con = null) Return the first ChildSpyProduct matching the query
 * @method     ChildSpyProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProduct matching the query, or a new ChildSpyProduct object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProduct findOneByIdProduct(int $id_product) Return the first ChildSpyProduct filtered by the id_product column
 * @method     ChildSpyProduct findOneBySku(string $sku) Return the first ChildSpyProduct filtered by the sku column
 * @method     ChildSpyProduct findOneByIsActive(boolean $is_active) Return the first ChildSpyProduct filtered by the is_active column
 * @method     ChildSpyProduct findOneByAttributes(string $attributes) Return the first ChildSpyProduct filtered by the attributes column
 * @method     ChildSpyProduct findOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyProduct filtered by the fk_abstract_product column
 * @method     ChildSpyProduct findOneByCreatedAt(string $created_at) Return the first ChildSpyProduct filtered by the created_at column
 * @method     ChildSpyProduct findOneByUpdatedAt(string $updated_at) Return the first ChildSpyProduct filtered by the updated_at column *

 * @method     ChildSpyProduct requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOne(ConnectionInterface $con = null) Return the first ChildSpyProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProduct requireOneByIdProduct(int $id_product) Return the first ChildSpyProduct filtered by the id_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneBySku(string $sku) Return the first ChildSpyProduct filtered by the sku column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneByIsActive(boolean $is_active) Return the first ChildSpyProduct filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneByAttributes(string $attributes) Return the first ChildSpyProduct filtered by the attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyProduct filtered by the fk_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneByCreatedAt(string $created_at) Return the first ChildSpyProduct filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProduct requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyProduct filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProduct objects based on current ModelCriteria
 * @method     ChildSpyProduct[]|ObjectCollection findByIdProduct(int $id_product) Return ChildSpyProduct objects filtered by the id_product column
 * @method     ChildSpyProduct[]|ObjectCollection findBySku(string $sku) Return ChildSpyProduct objects filtered by the sku column
 * @method     ChildSpyProduct[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyProduct objects filtered by the is_active column
 * @method     ChildSpyProduct[]|ObjectCollection findByAttributes(string $attributes) Return ChildSpyProduct objects filtered by the attributes column
 * @method     ChildSpyProduct[]|ObjectCollection findByFkAbstractProduct(int $fk_abstract_product) Return ChildSpyProduct objects filtered by the fk_abstract_product column
 * @method     ChildSpyProduct[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyProduct objects filtered by the created_at column
 * @method     ChildSpyProduct[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyProduct objects filtered by the updated_at column
 * @method     ChildSpyProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductQuery();
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
     * @return ChildSpyProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductTableMap::DATABASE_NAME);
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
     * @return ChildSpyProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_product`, `sku`, `is_active`, `attributes`, `fk_abstract_product`, `created_at`, `updated_at` FROM `spy_product` WHERE `id_product` = :p0';
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
            /** @var ChildSpyProduct $obj */
            $obj = new ChildSpyProduct();
            $obj->hydrate($row);
            SpyProductTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProduct(1234); // WHERE id_product = 1234
     * $query->filterByIdProduct(array(12, 34)); // WHERE id_product IN (12, 34)
     * $query->filterByIdProduct(array('min' => 12)); // WHERE id_product > 12
     * </code>
     *
     * @param     mixed $idProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByIdProduct($idProduct = null, $comparison = null)
    {
        if (is_array($idProduct)) {
            $useMinMax = false;
            if (isset($idProduct['min'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $idProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduct['max'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $idProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $idProduct, $comparison);
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
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyProductTableMap::COL_SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributes('fooValue');   // WHERE attributes = 'fooValue'
     * $query->filterByAttributes('%fooValue%'); // WHERE attributes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByAttributes($attributes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attributes)) {
                $attributes = str_replace('*', '%', $attributes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_ATTRIBUTES, $attributes, $comparison);
    }

    /**
     * Filter the query on the fk_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAbstractProduct(1234); // WHERE fk_abstract_product = 1234
     * $query->filterByFkAbstractProduct(array(12, 34)); // WHERE fk_abstract_product IN (12, 34)
     * $query->filterByFkAbstractProduct(array('min' => 12)); // WHERE fk_abstract_product > 12
     * </code>
     *
     * @see       filterBySpyAbstractProduct()
     *
     * @param     mixed $fkAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByFkAbstractProduct($fkAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkAbstractProduct['min'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAbstractProduct['max'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct, $comparison);
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
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyProductTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyAbstractProduct() only accepts arguments of type \Propel\SpyAbstractProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAbstractProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyAbstractProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAbstractProduct');

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
            $this->addJoinObject($join, 'SpyAbstractProduct');
        }

        return $this;
    }

    /**
     * Use the SpyAbstractProduct relation SpyAbstractProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyAbstractProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAbstractProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPriceProduct object
     *
     * @param \Propel\SpyPriceProduct|ObjectCollection $spyPriceProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByPriceProduct($spyPriceProduct, $comparison = null)
    {
        if ($spyPriceProduct instanceof \Propel\SpyPriceProduct) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyPriceProduct->getFkProduct(), $comparison);
        } elseif ($spyPriceProduct instanceof ObjectCollection) {
            return $this
                ->usePriceProductQuery()
                ->filterByPrimaryKeys($spyPriceProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPriceProduct() only accepts arguments of type \Propel\SpyPriceProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PriceProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinPriceProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PriceProduct');

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
            $this->addJoinObject($join, 'PriceProduct');
        }

        return $this;
    }

    /**
     * Use the PriceProduct relation SpyPriceProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPriceProductQuery A secondary query class using the current class as primary query
     */
    public function usePriceProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPriceProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PriceProduct', '\Propel\SpyPriceProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocalizedProductAttributes object
     *
     * @param \Propel\SpyLocalizedProductAttributes|ObjectCollection $spyLocalizedProductAttributes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyLocalizedProductAttributes($spyLocalizedProductAttributes, $comparison = null)
    {
        if ($spyLocalizedProductAttributes instanceof \Propel\SpyLocalizedProductAttributes) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyLocalizedProductAttributes->getFkProduct(), $comparison);
        } elseif ($spyLocalizedProductAttributes instanceof ObjectCollection) {
            return $this
                ->useSpyLocalizedProductAttributesQuery()
                ->filterByPrimaryKeys($spyLocalizedProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyLocalizedProductAttributes() only accepts arguments of type \Propel\SpyLocalizedProductAttributes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocalizedProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyLocalizedProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocalizedProductAttributes');

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
            $this->addJoinObject($join, 'SpyLocalizedProductAttributes');
        }

        return $this;
    }

    /**
     * Use the SpyLocalizedProductAttributes relation SpyLocalizedProductAttributes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocalizedProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocalizedProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocalizedProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocalizedProductAttributes', '\Propel\SpyLocalizedProductAttributesQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductToBundle object
     *
     * @param \Propel\SpyProductToBundle|ObjectCollection $spyProductToBundle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyProductToBundleRelatedByFkProduct($spyProductToBundle, $comparison = null)
    {
        if ($spyProductToBundle instanceof \Propel\SpyProductToBundle) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyProductToBundle->getFkProduct(), $comparison);
        } elseif ($spyProductToBundle instanceof ObjectCollection) {
            return $this
                ->useSpyProductToBundleRelatedByFkProductQuery()
                ->filterByPrimaryKeys($spyProductToBundle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductToBundleRelatedByFkProduct() only accepts arguments of type \Propel\SpyProductToBundle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductToBundleRelatedByFkProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyProductToBundleRelatedByFkProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductToBundleRelatedByFkProduct');

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
            $this->addJoinObject($join, 'SpyProductToBundleRelatedByFkProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProductToBundleRelatedByFkProduct relation SpyProductToBundle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductToBundleQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductToBundleRelatedByFkProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductToBundleRelatedByFkProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductToBundleRelatedByFkProduct', '\Propel\SpyProductToBundleQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductToBundle object
     *
     * @param \Propel\SpyProductToBundle|ObjectCollection $spyProductToBundle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByBundleProduct($spyProductToBundle, $comparison = null)
    {
        if ($spyProductToBundle instanceof \Propel\SpyProductToBundle) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyProductToBundle->getFkRelatedProduct(), $comparison);
        } elseif ($spyProductToBundle instanceof ObjectCollection) {
            return $this
                ->useBundleProductQuery()
                ->filterByPrimaryKeys($spyProductToBundle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBundleProduct() only accepts arguments of type \Propel\SpyProductToBundle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinBundleProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProduct');

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
            $this->addJoinObject($join, 'BundleProduct');
        }

        return $this;
    }

    /**
     * Use the BundleProduct relation SpyProductToBundle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductToBundleQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProduct', '\Propel\SpyProductToBundleQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsage object
     *
     * @param \Propel\SpyProductOptionTypeUsage|ObjectCollection $spyProductOptionTypeUsage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeUsage($spyProductOptionTypeUsage, $comparison = null)
    {
        if ($spyProductOptionTypeUsage instanceof \Propel\SpyProductOptionTypeUsage) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyProductOptionTypeUsage->getFkProduct(), $comparison);
        } elseif ($spyProductOptionTypeUsage instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeUsageQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeUsage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionTypeUsage() only accepts arguments of type \Propel\SpyProductOptionTypeUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeUsage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeUsage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeUsage');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeUsage');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeUsage relation SpyProductOptionTypeUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeUsageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeUsage', '\Propel\SpyProductOptionTypeUsageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionConfigurationPreset object
     *
     * @param \Propel\SpyProductOptionConfigurationPreset|ObjectCollection $spyProductOptionConfigurationPreset the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionConfigurationPreset($spyProductOptionConfigurationPreset, $comparison = null)
    {
        if ($spyProductOptionConfigurationPreset instanceof \Propel\SpyProductOptionConfigurationPreset) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyProductOptionConfigurationPreset->getFkProduct(), $comparison);
        } elseif ($spyProductOptionConfigurationPreset instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionConfigurationPresetQuery()
                ->filterByPrimaryKeys($spyProductOptionConfigurationPreset->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionConfigurationPreset() only accepts arguments of type \Propel\SpyProductOptionConfigurationPreset or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionConfigurationPreset relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionConfigurationPreset($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionConfigurationPreset');

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
            $this->addJoinObject($join, 'SpyProductOptionConfigurationPreset');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionConfigurationPreset relation SpyProductOptionConfigurationPreset object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionConfigurationPresetQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionConfigurationPresetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionConfigurationPreset($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionConfigurationPreset', '\Propel\SpyProductOptionConfigurationPresetQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySearchableProducts object
     *
     * @param \Propel\SpySearchableProducts|ObjectCollection $spySearchableProducts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpySearchableProducts($spySearchableProducts, $comparison = null)
    {
        if ($spySearchableProducts instanceof \Propel\SpySearchableProducts) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spySearchableProducts->getFkProduct(), $comparison);
        } elseif ($spySearchableProducts instanceof ObjectCollection) {
            return $this
                ->useSpySearchableProductsQuery()
                ->filterByPrimaryKeys($spySearchableProducts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySearchableProducts() only accepts arguments of type \Propel\SpySearchableProducts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySearchableProducts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpySearchableProducts($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySearchableProducts');

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
            $this->addJoinObject($join, 'SpySearchableProducts');
        }

        return $this;
    }

    /**
     * Use the SpySearchableProducts relation SpySearchableProducts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySearchableProductsQuery A secondary query class using the current class as primary query
     */
    public function useSpySearchableProductsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpySearchableProducts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySearchableProducts', '\Propel\SpySearchableProductsQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyStockProduct object
     *
     * @param \Propel\SpyStockProduct|ObjectCollection $spyStockProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterByStockProduct($spyStockProduct, $comparison = null)
    {
        if ($spyStockProduct instanceof \Propel\SpyStockProduct) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyStockProduct->getFkProduct(), $comparison);
        } elseif ($spyStockProduct instanceof ObjectCollection) {
            return $this
                ->useStockProductQuery()
                ->filterByPrimaryKeys($spyStockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockProduct() only accepts arguments of type \Propel\SpyStockProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinStockProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockProduct');

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
            $this->addJoinObject($join, 'StockProduct');
        }

        return $this;
    }

    /**
     * Use the StockProduct relation SpyStockProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyStockProductQuery A secondary query class using the current class as primary query
     */
    public function useStockProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockProduct', '\Propel\SpyStockProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyWishlistItem object
     *
     * @param \Propel\SpyWishlistItem|ObjectCollection $spyWishlistItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductQuery The current query, for fluid interface
     */
    public function filterBySpyWishlistItem($spyWishlistItem, $comparison = null)
    {
        if ($spyWishlistItem instanceof \Propel\SpyWishlistItem) {
            return $this
                ->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyWishlistItem->getFkProduct(), $comparison);
        } elseif ($spyWishlistItem instanceof ObjectCollection) {
            return $this
                ->useSpyWishlistItemQuery()
                ->filterByPrimaryKeys($spyWishlistItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyWishlistItem() only accepts arguments of type \Propel\SpyWishlistItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyWishlistItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function joinSpyWishlistItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyWishlistItem');

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
            $this->addJoinObject($join, 'SpyWishlistItem');
        }

        return $this;
    }

    /**
     * Use the SpyWishlistItem relation SpyWishlistItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyWishlistItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyWishlistItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyWishlistItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyWishlistItem', '\Propel\SpyWishlistItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProduct $spyProduct Object to remove from the list of results
     *
     * @return $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function prune($spyProduct = null)
    {
        if ($spyProduct) {
            $this->addUsingAlias(SpyProductTableMap::COL_ID_PRODUCT, $spyProduct->getIdProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductTableMap::clearInstancePool();
            SpyProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyProductTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyProductTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyProductTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyProductTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyProductTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyProductQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyProductTableMap::COL_CREATED_AT);
    }

} // SpyProductQuery
