<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDiscountVoucherPool as ChildSpyDiscountVoucherPool;
use Propel\SpyDiscountVoucherPoolQuery as ChildSpyDiscountVoucherPoolQuery;
use Propel\Map\SpyDiscountVoucherPoolTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_discount_voucher_pool' table.
 *
 *
 *
 * @method     ChildSpyDiscountVoucherPoolQuery orderByIdDiscountVoucherPool($order = Criteria::ASC) Order by the id_discount_voucher_pool column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByFkDiscountVoucherPoolCategory($order = Criteria::ASC) Order by the fk_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByTemplate($order = Criteria::ASC) Order by the template column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyDiscountVoucherPoolQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyDiscountVoucherPoolQuery groupByIdDiscountVoucherPool() Group by the id_discount_voucher_pool column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByFkDiscountVoucherPoolCategory() Group by the fk_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByName() Group by the name column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByTemplate() Group by the template column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByIsActive() Group by the is_active column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyDiscountVoucherPoolQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyDiscountVoucherPoolQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDiscountVoucherPoolQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDiscountVoucherPoolQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDiscountVoucherPoolQuery leftJoinVoucherPoolCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the VoucherPoolCategory relation
 * @method     ChildSpyDiscountVoucherPoolQuery rightJoinVoucherPoolCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VoucherPoolCategory relation
 * @method     ChildSpyDiscountVoucherPoolQuery innerJoinVoucherPoolCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the VoucherPoolCategory relation
 *
 * @method     ChildSpyDiscountVoucherPoolQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountVoucherPoolQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountVoucherPoolQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     ChildSpyDiscountVoucherPoolQuery leftJoinDiscountVoucher($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscountVoucher relation
 * @method     ChildSpyDiscountVoucherPoolQuery rightJoinDiscountVoucher($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscountVoucher relation
 * @method     ChildSpyDiscountVoucherPoolQuery innerJoinDiscountVoucher($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscountVoucher relation
 *
 * @method     \Propel\SpyDiscountVoucherPoolCategoryQuery|\Propel\SpyDiscountQuery|\Propel\SpyDiscountVoucherQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDiscountVoucherPool findOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPool matching the query
 * @method     ChildSpyDiscountVoucherPool findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPool matching the query, or a new ChildSpyDiscountVoucherPool object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDiscountVoucherPool findOneByIdDiscountVoucherPool(int $id_discount_voucher_pool) Return the first ChildSpyDiscountVoucherPool filtered by the id_discount_voucher_pool column
 * @method     ChildSpyDiscountVoucherPool findOneByFkDiscountVoucherPoolCategory(int $fk_discount_voucher_pool_category) Return the first ChildSpyDiscountVoucherPool filtered by the fk_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPool findOneByName(string $name) Return the first ChildSpyDiscountVoucherPool filtered by the name column
 * @method     ChildSpyDiscountVoucherPool findOneByTemplate(string $template) Return the first ChildSpyDiscountVoucherPool filtered by the template column
 * @method     ChildSpyDiscountVoucherPool findOneByIsActive(boolean $is_active) Return the first ChildSpyDiscountVoucherPool filtered by the is_active column
 * @method     ChildSpyDiscountVoucherPool findOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountVoucherPool filtered by the created_at column
 * @method     ChildSpyDiscountVoucherPool findOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountVoucherPool filtered by the updated_at column *

 * @method     ChildSpyDiscountVoucherPool requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDiscountVoucherPool by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountVoucherPool matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountVoucherPool requireOneByIdDiscountVoucherPool(int $id_discount_voucher_pool) Return the first ChildSpyDiscountVoucherPool filtered by the id_discount_voucher_pool column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByFkDiscountVoucherPoolCategory(int $fk_discount_voucher_pool_category) Return the first ChildSpyDiscountVoucherPool filtered by the fk_discount_voucher_pool_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByName(string $name) Return the first ChildSpyDiscountVoucherPool filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByTemplate(string $template) Return the first ChildSpyDiscountVoucherPool filtered by the template column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByIsActive(boolean $is_active) Return the first ChildSpyDiscountVoucherPool filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountVoucherPool filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountVoucherPool requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountVoucherPool filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDiscountVoucherPool objects based on current ModelCriteria
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByIdDiscountVoucherPool(int $id_discount_voucher_pool) Return ChildSpyDiscountVoucherPool objects filtered by the id_discount_voucher_pool column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByFkDiscountVoucherPoolCategory(int $fk_discount_voucher_pool_category) Return ChildSpyDiscountVoucherPool objects filtered by the fk_discount_voucher_pool_category column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByName(string $name) Return ChildSpyDiscountVoucherPool objects filtered by the name column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByTemplate(string $template) Return ChildSpyDiscountVoucherPool objects filtered by the template column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyDiscountVoucherPool objects filtered by the is_active column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyDiscountVoucherPool objects filtered by the created_at column
 * @method     ChildSpyDiscountVoucherPool[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyDiscountVoucherPool objects filtered by the updated_at column
 * @method     ChildSpyDiscountVoucherPool[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDiscountVoucherPoolQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDiscountVoucherPoolQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDiscountVoucherPool', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDiscountVoucherPoolQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDiscountVoucherPoolQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDiscountVoucherPoolQuery) {
            return $criteria;
        }
        $query = new ChildSpyDiscountVoucherPoolQuery();
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
     * @return ChildSpyDiscountVoucherPool|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDiscountVoucherPoolTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountVoucherPoolTableMap::DATABASE_NAME);
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
     * @return ChildSpyDiscountVoucherPool A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_discount_voucher_pool, fk_discount_voucher_pool_category, name, template, is_active, created_at, updated_at FROM spy_discount_voucher_pool WHERE id_discount_voucher_pool = :p0';
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
            /** @var ChildSpyDiscountVoucherPool $obj */
            $obj = new ChildSpyDiscountVoucherPool();
            $obj->hydrate($row);
            SpyDiscountVoucherPoolTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDiscountVoucherPool|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_discount_voucher_pool column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDiscountVoucherPool(1234); // WHERE id_discount_voucher_pool = 1234
     * $query->filterByIdDiscountVoucherPool(array(12, 34)); // WHERE id_discount_voucher_pool IN (12, 34)
     * $query->filterByIdDiscountVoucherPool(array('min' => 12)); // WHERE id_discount_voucher_pool > 12
     * </code>
     *
     * @param     mixed $idDiscountVoucherPool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByIdDiscountVoucherPool($idDiscountVoucherPool = null, $comparison = null)
    {
        if (is_array($idDiscountVoucherPool)) {
            $useMinMax = false;
            if (isset($idDiscountVoucherPool['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $idDiscountVoucherPool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDiscountVoucherPool['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $idDiscountVoucherPool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $idDiscountVoucherPool, $comparison);
    }

    /**
     * Filter the query on the fk_discount_voucher_pool_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDiscountVoucherPoolCategory(1234); // WHERE fk_discount_voucher_pool_category = 1234
     * $query->filterByFkDiscountVoucherPoolCategory(array(12, 34)); // WHERE fk_discount_voucher_pool_category IN (12, 34)
     * $query->filterByFkDiscountVoucherPoolCategory(array('min' => 12)); // WHERE fk_discount_voucher_pool_category > 12
     * </code>
     *
     * @see       filterByVoucherPoolCategory()
     *
     * @param     mixed $fkDiscountVoucherPoolCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByFkDiscountVoucherPoolCategory($fkDiscountVoucherPoolCategory = null, $comparison = null)
    {
        if (is_array($fkDiscountVoucherPoolCategory)) {
            $useMinMax = false;
            if (isset($fkDiscountVoucherPoolCategory['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_FK_DISCOUNT_VOUCHER_POOL_CATEGORY, $fkDiscountVoucherPoolCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDiscountVoucherPoolCategory['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_FK_DISCOUNT_VOUCHER_POOL_CATEGORY, $fkDiscountVoucherPoolCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_FK_DISCOUNT_VOUCHER_POOL_CATEGORY, $fkDiscountVoucherPoolCategory, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the template column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplate('fooValue');   // WHERE template = 'fooValue'
     * $query->filterByTemplate('%fooValue%'); // WHERE template LIKE '%fooValue%'
     * </code>
     *
     * @param     string $template The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByTemplate($template = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($template)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $template)) {
                $template = str_replace('*', '%', $template);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_TEMPLATE, $template, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_IS_ACTIVE, $isActive, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountVoucherPoolCategory object
     *
     * @param \Propel\SpyDiscountVoucherPoolCategory|ObjectCollection $spyDiscountVoucherPoolCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByVoucherPoolCategory($spyDiscountVoucherPoolCategory, $comparison = null)
    {
        if ($spyDiscountVoucherPoolCategory instanceof \Propel\SpyDiscountVoucherPoolCategory) {
            return $this
                ->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_FK_DISCOUNT_VOUCHER_POOL_CATEGORY, $spyDiscountVoucherPoolCategory->getIdDiscountVoucherPoolCategory(), $comparison);
        } elseif ($spyDiscountVoucherPoolCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_FK_DISCOUNT_VOUCHER_POOL_CATEGORY, $spyDiscountVoucherPoolCategory->toKeyValue('PrimaryKey', 'IdDiscountVoucherPoolCategory'), $comparison);
        } else {
            throw new PropelException('filterByVoucherPoolCategory() only accepts arguments of type \Propel\SpyDiscountVoucherPoolCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VoucherPoolCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function joinVoucherPoolCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VoucherPoolCategory');

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
            $this->addJoinObject($join, 'VoucherPoolCategory');
        }

        return $this;
    }

    /**
     * Use the VoucherPoolCategory relation SpyDiscountVoucherPoolCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountVoucherPoolCategoryQuery A secondary query class using the current class as primary query
     */
    public function useVoucherPoolCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinVoucherPoolCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VoucherPoolCategory', '\Propel\SpyDiscountVoucherPoolCategoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyDiscount object
     *
     * @param \Propel\SpyDiscount|ObjectCollection $spyDiscount the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByDiscount($spyDiscount, $comparison = null)
    {
        if ($spyDiscount instanceof \Propel\SpyDiscount) {
            return $this
                ->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $spyDiscount->getFkDiscountVoucherPool(), $comparison);
        } elseif ($spyDiscount instanceof ObjectCollection) {
            return $this
                ->useDiscountQuery()
                ->filterByPrimaryKeys($spyDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type \Propel\SpyDiscount or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
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
     * Use the Discount relation SpyDiscount object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', '\Propel\SpyDiscountQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountVoucher object
     *
     * @param \Propel\SpyDiscountVoucher|ObjectCollection $spyDiscountVoucher the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function filterByDiscountVoucher($spyDiscountVoucher, $comparison = null)
    {
        if ($spyDiscountVoucher instanceof \Propel\SpyDiscountVoucher) {
            return $this
                ->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $spyDiscountVoucher->getFkDiscountVoucherPool(), $comparison);
        } elseif ($spyDiscountVoucher instanceof ObjectCollection) {
            return $this
                ->useDiscountVoucherQuery()
                ->filterByPrimaryKeys($spyDiscountVoucher->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscountVoucher() only accepts arguments of type \Propel\SpyDiscountVoucher or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiscountVoucher relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function joinDiscountVoucher($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiscountVoucher');

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
            $this->addJoinObject($join, 'DiscountVoucher');
        }

        return $this;
    }

    /**
     * Use the DiscountVoucher relation SpyDiscountVoucher object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountVoucherQuery A secondary query class using the current class as primary query
     */
    public function useDiscountVoucherQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscountVoucher($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiscountVoucher', '\Propel\SpyDiscountVoucherQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDiscountVoucherPool $spyDiscountVoucherPool Object to remove from the list of results
     *
     * @return $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function prune($spyDiscountVoucherPool = null)
    {
        if ($spyDiscountVoucherPool) {
            $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_ID_DISCOUNT_VOUCHER_POOL, $spyDiscountVoucherPool->getIdDiscountVoucherPool(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_discount_voucher_pool table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherPoolTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDiscountVoucherPoolTableMap::clearInstancePool();
            SpyDiscountVoucherPoolTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherPoolTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDiscountVoucherPoolTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDiscountVoucherPoolTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDiscountVoucherPoolTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountVoucherPoolTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyDiscountVoucherPoolQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountVoucherPoolTableMap::COL_CREATED_AT);
    }

} // SpyDiscountVoucherPoolQuery
