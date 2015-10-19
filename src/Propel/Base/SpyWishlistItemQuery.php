<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyWishlistItem as ChildSpyWishlistItem;
use Propel\SpyWishlistItemQuery as ChildSpyWishlistItemQuery;
use Propel\Map\SpyWishlistItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_wishlist_item' table.
 *
 *
 *
 * @method     ChildSpyWishlistItemQuery orderByIdWishlistItem($order = Criteria::ASC) Order by the id_wishlist_item column
 * @method     ChildSpyWishlistItemQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpyWishlistItemQuery orderByFkWishlist($order = Criteria::ASC) Order by the fk_wishlist column
 * @method     ChildSpyWishlistItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildSpyWishlistItemQuery orderByAddedAt($order = Criteria::ASC) Order by the added_at column
 * @method     ChildSpyWishlistItemQuery orderByGroupKey($order = Criteria::ASC) Order by the group_key column
 * @method     ChildSpyWishlistItemQuery orderByFkAbstractProduct($order = Criteria::ASC) Order by the fk_abstract_product column
 *
 * @method     ChildSpyWishlistItemQuery groupByIdWishlistItem() Group by the id_wishlist_item column
 * @method     ChildSpyWishlistItemQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpyWishlistItemQuery groupByFkWishlist() Group by the fk_wishlist column
 * @method     ChildSpyWishlistItemQuery groupByQuantity() Group by the quantity column
 * @method     ChildSpyWishlistItemQuery groupByAddedAt() Group by the added_at column
 * @method     ChildSpyWishlistItemQuery groupByGroupKey() Group by the group_key column
 * @method     ChildSpyWishlistItemQuery groupByFkAbstractProduct() Group by the fk_abstract_product column
 *
 * @method     ChildSpyWishlistItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyWishlistItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyWishlistItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyWishlistItemQuery leftJoinSpyWishlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyWishlist relation
 * @method     ChildSpyWishlistItemQuery rightJoinSpyWishlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyWishlist relation
 * @method     ChildSpyWishlistItemQuery innerJoinSpyWishlist($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyWishlist relation
 *
 * @method     ChildSpyWishlistItemQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyWishlistItemQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyWishlistItemQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyWishlistItemQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyWishlistItemQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyWishlistItemQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     \Propel\SpyWishlistQuery|\Propel\SpyProductQuery|\Propel\SpyAbstractProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyWishlistItem findOne(ConnectionInterface $con = null) Return the first ChildSpyWishlistItem matching the query
 * @method     ChildSpyWishlistItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyWishlistItem matching the query, or a new ChildSpyWishlistItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpyWishlistItem findOneByIdWishlistItem(int $id_wishlist_item) Return the first ChildSpyWishlistItem filtered by the id_wishlist_item column
 * @method     ChildSpyWishlistItem findOneByFkProduct(int $fk_product) Return the first ChildSpyWishlistItem filtered by the fk_product column
 * @method     ChildSpyWishlistItem findOneByFkWishlist(int $fk_wishlist) Return the first ChildSpyWishlistItem filtered by the fk_wishlist column
 * @method     ChildSpyWishlistItem findOneByQuantity(int $quantity) Return the first ChildSpyWishlistItem filtered by the quantity column
 * @method     ChildSpyWishlistItem findOneByAddedAt(string $added_at) Return the first ChildSpyWishlistItem filtered by the added_at column
 * @method     ChildSpyWishlistItem findOneByGroupKey(string $group_key) Return the first ChildSpyWishlistItem filtered by the group_key column
 * @method     ChildSpyWishlistItem findOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyWishlistItem filtered by the fk_abstract_product column *

 * @method     ChildSpyWishlistItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpyWishlistItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOne(ConnectionInterface $con = null) Return the first ChildSpyWishlistItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyWishlistItem requireOneByIdWishlistItem(int $id_wishlist_item) Return the first ChildSpyWishlistItem filtered by the id_wishlist_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByFkProduct(int $fk_product) Return the first ChildSpyWishlistItem filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByFkWishlist(int $fk_wishlist) Return the first ChildSpyWishlistItem filtered by the fk_wishlist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByQuantity(int $quantity) Return the first ChildSpyWishlistItem filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByAddedAt(string $added_at) Return the first ChildSpyWishlistItem filtered by the added_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByGroupKey(string $group_key) Return the first ChildSpyWishlistItem filtered by the group_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlistItem requireOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyWishlistItem filtered by the fk_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyWishlistItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyWishlistItem objects based on current ModelCriteria
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByIdWishlistItem(int $id_wishlist_item) Return ChildSpyWishlistItem objects filtered by the id_wishlist_item column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyWishlistItem objects filtered by the fk_product column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByFkWishlist(int $fk_wishlist) Return ChildSpyWishlistItem objects filtered by the fk_wishlist column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByQuantity(int $quantity) Return ChildSpyWishlistItem objects filtered by the quantity column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByAddedAt(string $added_at) Return ChildSpyWishlistItem objects filtered by the added_at column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByGroupKey(string $group_key) Return ChildSpyWishlistItem objects filtered by the group_key column
 * @method     ChildSpyWishlistItem[]|ObjectCollection findByFkAbstractProduct(int $fk_abstract_product) Return ChildSpyWishlistItem objects filtered by the fk_abstract_product column
 * @method     ChildSpyWishlistItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyWishlistItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyWishlistItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyWishlistItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyWishlistItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyWishlistItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyWishlistItemQuery) {
            return $criteria;
        }
        $query = new ChildSpyWishlistItemQuery();
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
     * @return ChildSpyWishlistItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyWishlistItemTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyWishlistItemTableMap::DATABASE_NAME);
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
     * @return ChildSpyWishlistItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_wishlist_item, fk_product, fk_wishlist, quantity, added_at, group_key, fk_abstract_product FROM spy_wishlist_item WHERE id_wishlist_item = :p0';
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
            /** @var ChildSpyWishlistItem $obj */
            $obj = new ChildSpyWishlistItem();
            $obj->hydrate($row);
            SpyWishlistItemTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyWishlistItem|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_wishlist_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdWishlistItem(1234); // WHERE id_wishlist_item = 1234
     * $query->filterByIdWishlistItem(array(12, 34)); // WHERE id_wishlist_item IN (12, 34)
     * $query->filterByIdWishlistItem(array('min' => 12)); // WHERE id_wishlist_item > 12
     * </code>
     *
     * @param     mixed $idWishlistItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByIdWishlistItem($idWishlistItem = null, $comparison = null)
    {
        if (is_array($idWishlistItem)) {
            $useMinMax = false;
            if (isset($idWishlistItem['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $idWishlistItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idWishlistItem['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $idWishlistItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $idWishlistItem, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product > 12
     * </code>
     *
     * @see       filterBySpyProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_wishlist column
     *
     * Example usage:
     * <code>
     * $query->filterByFkWishlist(1234); // WHERE fk_wishlist = 1234
     * $query->filterByFkWishlist(array(12, 34)); // WHERE fk_wishlist IN (12, 34)
     * $query->filterByFkWishlist(array('min' => 12)); // WHERE fk_wishlist > 12
     * </code>
     *
     * @see       filterBySpyWishlist()
     *
     * @param     mixed $fkWishlist The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByFkWishlist($fkWishlist = null, $comparison = null)
    {
        if (is_array($fkWishlist)) {
            $useMinMax = false;
            if (isset($fkWishlist['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_WISHLIST, $fkWishlist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkWishlist['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_WISHLIST, $fkWishlist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_WISHLIST, $fkWishlist, $comparison);
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the added_at column
     *
     * Example usage:
     * <code>
     * $query->filterByAddedAt('2011-03-14'); // WHERE added_at = '2011-03-14'
     * $query->filterByAddedAt('now'); // WHERE added_at = '2011-03-14'
     * $query->filterByAddedAt(array('max' => 'yesterday')); // WHERE added_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $addedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByAddedAt($addedAt = null, $comparison = null)
    {
        if (is_array($addedAt)) {
            $useMinMax = false;
            if (isset($addedAt['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_ADDED_AT, $addedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($addedAt['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_ADDED_AT, $addedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_ADDED_AT, $addedAt, $comparison);
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_GROUP_KEY, $groupKey, $comparison);
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterByFkAbstractProduct($fkAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkAbstractProduct['min'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAbstractProduct['max'])) {
                $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyWishlist object
     *
     * @param \Propel\SpyWishlist|ObjectCollection $spyWishlist The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterBySpyWishlist($spyWishlist, $comparison = null)
    {
        if ($spyWishlist instanceof \Propel\SpyWishlist) {
            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_WISHLIST, $spyWishlist->getIdWishlist(), $comparison);
        } elseif ($spyWishlist instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_WISHLIST, $spyWishlist->toKeyValue('PrimaryKey', 'IdWishlist'), $comparison);
        } else {
            throw new PropelException('filterBySpyWishlist() only accepts arguments of type \Propel\SpyWishlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyWishlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function joinSpyWishlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyWishlist');

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
            $this->addJoinObject($join, 'SpyWishlist');
        }

        return $this;
    }

    /**
     * Use the SpyWishlist relation SpyWishlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyWishlistQuery A secondary query class using the current class as primary query
     */
    public function useSpyWishlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyWishlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyWishlist', '\Propel\SpyWishlistQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
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
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSpyWishlistItem $spyWishlistItem Object to remove from the list of results
     *
     * @return $this|ChildSpyWishlistItemQuery The current query, for fluid interface
     */
    public function prune($spyWishlistItem = null)
    {
        if ($spyWishlistItem) {
            $this->addUsingAlias(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, $spyWishlistItem->getIdWishlistItem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_wishlist_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyWishlistItemTableMap::clearInstancePool();
            SpyWishlistItemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyWishlistItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyWishlistItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyWishlistItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyWishlistItemQuery
