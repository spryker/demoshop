<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAbstractProduct as ChildSpyAbstractProduct;
use Propel\SpyAbstractProductQuery as ChildSpyAbstractProductQuery;
use Propel\Map\SpyAbstractProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_abstract_product' table.
 *
 *
 *
 * @method     ChildSpyAbstractProductQuery orderByIdAbstractProduct($order = Criteria::ASC) Order by the id_abstract_product column
 * @method     ChildSpyAbstractProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method     ChildSpyAbstractProductQuery orderByAttributes($order = Criteria::ASC) Order by the attributes column
 * @method     ChildSpyAbstractProductQuery orderByFkTaxSet($order = Criteria::ASC) Order by the fk_tax_set column
 * @method     ChildSpyAbstractProductQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyAbstractProductQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyAbstractProductQuery groupByIdAbstractProduct() Group by the id_abstract_product column
 * @method     ChildSpyAbstractProductQuery groupBySku() Group by the sku column
 * @method     ChildSpyAbstractProductQuery groupByAttributes() Group by the attributes column
 * @method     ChildSpyAbstractProductQuery groupByFkTaxSet() Group by the fk_tax_set column
 * @method     ChildSpyAbstractProductQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyAbstractProductQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyAbstractProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyAbstractProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyAbstractProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyTaxSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyTaxSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyTaxSet($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxSet relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinPriceProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyAbstractProductQuery rightJoinPriceProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyAbstractProductQuery innerJoinPriceProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceProduct relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductCategory relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductCategory relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductCategory relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyUrl($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyUrl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyUrl($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUrl relation
 *
 * @method     ChildSpyAbstractProductQuery leftJoinSpyWishlistItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyAbstractProductQuery rightJoinSpyWishlistItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyAbstractProductQuery innerJoinSpyWishlistItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyWishlistItem relation
 *
 * @method     \Propel\SpyTaxSetQuery|\Propel\SpyPriceProductQuery|\Propel\SpyLocalizedAbstractProductAttributesQuery|\Propel\SpyProductQuery|\Propel\SpyProductCategoryQuery|\Propel\SpyUrlQuery|\Propel\SpyWishlistItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyAbstractProduct findOne(ConnectionInterface $con = null) Return the first ChildSpyAbstractProduct matching the query
 * @method     ChildSpyAbstractProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyAbstractProduct matching the query, or a new ChildSpyAbstractProduct object populated from the query conditions when no match is found
 *
 * @method     ChildSpyAbstractProduct findOneByIdAbstractProduct(int $id_abstract_product) Return the first ChildSpyAbstractProduct filtered by the id_abstract_product column
 * @method     ChildSpyAbstractProduct findOneBySku(string $sku) Return the first ChildSpyAbstractProduct filtered by the sku column
 * @method     ChildSpyAbstractProduct findOneByAttributes(string $attributes) Return the first ChildSpyAbstractProduct filtered by the attributes column
 * @method     ChildSpyAbstractProduct findOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyAbstractProduct filtered by the fk_tax_set column
 * @method     ChildSpyAbstractProduct findOneByCreatedAt(string $created_at) Return the first ChildSpyAbstractProduct filtered by the created_at column
 * @method     ChildSpyAbstractProduct findOneByUpdatedAt(string $updated_at) Return the first ChildSpyAbstractProduct filtered by the updated_at column *

 * @method     ChildSpyAbstractProduct requirePk($key, ConnectionInterface $con = null) Return the ChildSpyAbstractProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOne(ConnectionInterface $con = null) Return the first ChildSpyAbstractProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAbstractProduct requireOneByIdAbstractProduct(int $id_abstract_product) Return the first ChildSpyAbstractProduct filtered by the id_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOneBySku(string $sku) Return the first ChildSpyAbstractProduct filtered by the sku column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOneByAttributes(string $attributes) Return the first ChildSpyAbstractProduct filtered by the attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyAbstractProduct filtered by the fk_tax_set column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOneByCreatedAt(string $created_at) Return the first ChildSpyAbstractProduct filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyAbstractProduct requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyAbstractProduct filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyAbstractProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyAbstractProduct objects based on current ModelCriteria
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findByIdAbstractProduct(int $id_abstract_product) Return ChildSpyAbstractProduct objects filtered by the id_abstract_product column
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findBySku(string $sku) Return ChildSpyAbstractProduct objects filtered by the sku column
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findByAttributes(string $attributes) Return ChildSpyAbstractProduct objects filtered by the attributes column
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findByFkTaxSet(int $fk_tax_set) Return ChildSpyAbstractProduct objects filtered by the fk_tax_set column
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyAbstractProduct objects filtered by the created_at column
 * @method     ChildSpyAbstractProduct[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyAbstractProduct objects filtered by the updated_at column
 * @method     ChildSpyAbstractProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyAbstractProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyAbstractProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyAbstractProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyAbstractProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyAbstractProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyAbstractProductQuery) {
            return $criteria;
        }
        $query = new ChildSpyAbstractProductQuery();
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
     * @return ChildSpyAbstractProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyAbstractProductTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyAbstractProductTableMap::DATABASE_NAME);
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
     * @return ChildSpyAbstractProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_abstract_product, sku, attributes, fk_tax_set, created_at, updated_at FROM spy_abstract_product WHERE id_abstract_product = :p0';
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
            /** @var ChildSpyAbstractProduct $obj */
            $obj = new ChildSpyAbstractProduct();
            $obj->hydrate($row);
            SpyAbstractProductTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyAbstractProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAbstractProduct(1234); // WHERE id_abstract_product = 1234
     * $query->filterByIdAbstractProduct(array(12, 34)); // WHERE id_abstract_product IN (12, 34)
     * $query->filterByIdAbstractProduct(array('min' => 12)); // WHERE id_abstract_product > 12
     * </code>
     *
     * @param     mixed $idAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByIdAbstractProduct($idAbstractProduct = null, $comparison = null)
    {
        if (is_array($idAbstractProduct)) {
            $useMinMax = false;
            if (isset($idAbstractProduct['min'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $idAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAbstractProduct['max'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $idAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $idAbstractProduct, $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_SKU, $sku, $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_ATTRIBUTES, $attributes, $comparison);
    }

    /**
     * Filter the query on the fk_tax_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTaxSet(1234); // WHERE fk_tax_set = 1234
     * $query->filterByFkTaxSet(array(12, 34)); // WHERE fk_tax_set IN (12, 34)
     * $query->filterByFkTaxSet(array('min' => 12)); // WHERE fk_tax_set > 12
     * </code>
     *
     * @see       filterBySpyTaxSet()
     *
     * @param     mixed $fkTaxSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByFkTaxSet($fkTaxSet = null, $comparison = null)
    {
        if (is_array($fkTaxSet)) {
            $useMinMax = false;
            if (isset($fkTaxSet['min'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_FK_TAX_SET, $fkTaxSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTaxSet['max'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_FK_TAX_SET, $fkTaxSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_FK_TAX_SET, $fkTaxSet, $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyAbstractProductTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSet object
     *
     * @param \Propel\SpyTaxSet|ObjectCollection $spyTaxSet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSet($spyTaxSet, $comparison = null)
    {
        if ($spyTaxSet instanceof \Propel\SpyTaxSet) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_FK_TAX_SET, $spyTaxSet->getIdTaxSet(), $comparison);
        } elseif ($spyTaxSet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_FK_TAX_SET, $spyTaxSet->toKeyValue('PrimaryKey', 'IdTaxSet'), $comparison);
        } else {
            throw new PropelException('filterBySpyTaxSet() only accepts arguments of type \Propel\SpyTaxSet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyTaxSet($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxSet');

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
            $this->addJoinObject($join, 'SpyTaxSet');
        }

        return $this;
    }

    /**
     * Use the SpyTaxSet relation SpyTaxSet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxSetQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyTaxSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxSet', '\Propel\SpyTaxSetQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPriceProduct object
     *
     * @param \Propel\SpyPriceProduct|ObjectCollection $spyPriceProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterByPriceProduct($spyPriceProduct, $comparison = null)
    {
        if ($spyPriceProduct instanceof \Propel\SpyPriceProduct) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyPriceProduct->getFkAbstractProduct(), $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyLocalizedAbstractProductAttributes object
     *
     * @param \Propel\SpyLocalizedAbstractProductAttributes|ObjectCollection $spyLocalizedAbstractProductAttributes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyLocalizedAbstractProductAttributes($spyLocalizedAbstractProductAttributes, $comparison = null)
    {
        if ($spyLocalizedAbstractProductAttributes instanceof \Propel\SpyLocalizedAbstractProductAttributes) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyLocalizedAbstractProductAttributes->getFkAbstractProduct(), $comparison);
        } elseif ($spyLocalizedAbstractProductAttributes instanceof ObjectCollection) {
            return $this
                ->useSpyLocalizedAbstractProductAttributesQuery()
                ->filterByPrimaryKeys($spyLocalizedAbstractProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyLocalizedAbstractProductAttributes() only accepts arguments of type \Propel\SpyLocalizedAbstractProductAttributes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyLocalizedAbstractProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocalizedAbstractProductAttributes');

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
            $this->addJoinObject($join, 'SpyLocalizedAbstractProductAttributes');
        }

        return $this;
    }

    /**
     * Use the SpyLocalizedAbstractProductAttributes relation SpyLocalizedAbstractProductAttributes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocalizedAbstractProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocalizedAbstractProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocalizedAbstractProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocalizedAbstractProductAttributes', '\Propel\SpyLocalizedAbstractProductAttributesQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyProduct->getFkAbstractProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            return $this
                ->useSpyProductQuery()
                ->filterByPrimaryKeys($spyProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProduct');

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
            $this->addJoinObject($join, 'SpyProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductCategory object
     *
     * @param \Propel\SpyProductCategory|ObjectCollection $spyProductCategory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyProductCategory($spyProductCategory, $comparison = null)
    {
        if ($spyProductCategory instanceof \Propel\SpyProductCategory) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyProductCategory->getFkAbstractProduct(), $comparison);
        } elseif ($spyProductCategory instanceof ObjectCollection) {
            return $this
                ->useSpyProductCategoryQuery()
                ->filterByPrimaryKeys($spyProductCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductCategory() only accepts arguments of type \Propel\SpyProductCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductCategory');

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
            $this->addJoinObject($join, 'SpyProductCategory');
        }

        return $this;
    }

    /**
     * Use the SpyProductCategory relation SpyProductCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductCategory', '\Propel\SpyProductCategoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyUrl object
     *
     * @param \Propel\SpyUrl|ObjectCollection $spyUrl the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyUrl($spyUrl, $comparison = null)
    {
        if ($spyUrl instanceof \Propel\SpyUrl) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyUrl->getFkResourceAbstractProduct(), $comparison);
        } elseif ($spyUrl instanceof ObjectCollection) {
            return $this
                ->useSpyUrlQuery()
                ->filterByPrimaryKeys($spyUrl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyUrl() only accepts arguments of type \Propel\SpyUrl or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUrl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyUrl($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUrl');

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
            $this->addJoinObject($join, 'SpyUrl');
        }

        return $this;
    }

    /**
     * Use the SpyUrl relation SpyUrl object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUrlQuery A secondary query class using the current class as primary query
     */
    public function useSpyUrlQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyUrl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUrl', '\Propel\SpyUrlQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyWishlistItem object
     *
     * @param \Propel\SpyWishlistItem|ObjectCollection $spyWishlistItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function filterBySpyWishlistItem($spyWishlistItem, $comparison = null)
    {
        if ($spyWishlistItem instanceof \Propel\SpyWishlistItem) {
            return $this
                ->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyWishlistItem->getFkAbstractProduct(), $comparison);
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
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function joinSpyWishlistItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSpyWishlistItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyWishlistItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyWishlistItem', '\Propel\SpyWishlistItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyAbstractProduct $spyAbstractProduct Object to remove from the list of results
     *
     * @return $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function prune($spyAbstractProduct = null)
    {
        if ($spyAbstractProduct) {
            $this->addUsingAlias(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_abstract_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyAbstractProductTableMap::clearInstancePool();
            SpyAbstractProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAbstractProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyAbstractProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyAbstractProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyAbstractProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAbstractProductTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAbstractProductTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyAbstractProductTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyAbstractProductTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyAbstractProductQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyAbstractProductTableMap::COL_CREATED_AT);
    }

} // SpyAbstractProductQuery
