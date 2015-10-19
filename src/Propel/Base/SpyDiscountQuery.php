<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDiscount as ChildSpyDiscount;
use Propel\SpyDiscountQuery as ChildSpyDiscountQuery;
use Propel\Map\SpyDiscountTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_discount' table.
 *
 *
 *
 * @method     ChildSpyDiscountQuery orderByIdDiscount($order = Criteria::ASC) Order by the id_discount column
 * @method     ChildSpyDiscountQuery orderByFkDiscountVoucherPool($order = Criteria::ASC) Order by the fk_discount_voucher_pool column
 * @method     ChildSpyDiscountQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method     ChildSpyDiscountQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildSpyDiscountQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildSpyDiscountQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpyDiscountQuery orderByCalculatorPlugin($order = Criteria::ASC) Order by the calculator_plugin column
 * @method     ChildSpyDiscountQuery orderByIsPrivileged($order = Criteria::ASC) Order by the is_privileged column
 * @method     ChildSpyDiscountQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildSpyDiscountQuery orderByValidFrom($order = Criteria::ASC) Order by the valid_from column
 * @method     ChildSpyDiscountQuery orderByValidTo($order = Criteria::ASC) Order by the valid_to column
 * @method     ChildSpyDiscountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyDiscountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyDiscountQuery groupByIdDiscount() Group by the id_discount column
 * @method     ChildSpyDiscountQuery groupByFkDiscountVoucherPool() Group by the fk_discount_voucher_pool column
 * @method     ChildSpyDiscountQuery groupByDisplayName() Group by the display_name column
 * @method     ChildSpyDiscountQuery groupByDescription() Group by the description column
 * @method     ChildSpyDiscountQuery groupByAmount() Group by the amount column
 * @method     ChildSpyDiscountQuery groupByType() Group by the type column
 * @method     ChildSpyDiscountQuery groupByCalculatorPlugin() Group by the calculator_plugin column
 * @method     ChildSpyDiscountQuery groupByIsPrivileged() Group by the is_privileged column
 * @method     ChildSpyDiscountQuery groupByIsActive() Group by the is_active column
 * @method     ChildSpyDiscountQuery groupByValidFrom() Group by the valid_from column
 * @method     ChildSpyDiscountQuery groupByValidTo() Group by the valid_to column
 * @method     ChildSpyDiscountQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyDiscountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDiscountQuery leftJoinVoucherPool($relationAlias = null) Adds a LEFT JOIN clause to the query using the VoucherPool relation
 * @method     ChildSpyDiscountQuery rightJoinVoucherPool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VoucherPool relation
 * @method     ChildSpyDiscountQuery innerJoinVoucherPool($relationAlias = null) Adds a INNER JOIN clause to the query using the VoucherPool relation
 *
 * @method     ChildSpyDiscountQuery leftJoinDecisionRule($relationAlias = null) Adds a LEFT JOIN clause to the query using the DecisionRule relation
 * @method     ChildSpyDiscountQuery rightJoinDecisionRule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DecisionRule relation
 * @method     ChildSpyDiscountQuery innerJoinDecisionRule($relationAlias = null) Adds a INNER JOIN clause to the query using the DecisionRule relation
 *
 * @method     ChildSpyDiscountQuery leftJoinDiscountCollector($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscountCollector relation
 * @method     ChildSpyDiscountQuery rightJoinDiscountCollector($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscountCollector relation
 * @method     ChildSpyDiscountQuery innerJoinDiscountCollector($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscountCollector relation
 *
 * @method     \Propel\SpyDiscountVoucherPoolQuery|\Propel\SpyDiscountDecisionRuleQuery|\Propel\SpyDiscountCollectorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDiscount findOne(ConnectionInterface $con = null) Return the first ChildSpyDiscount matching the query
 * @method     ChildSpyDiscount findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDiscount matching the query, or a new ChildSpyDiscount object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDiscount findOneByIdDiscount(int $id_discount) Return the first ChildSpyDiscount filtered by the id_discount column
 * @method     ChildSpyDiscount findOneByFkDiscountVoucherPool(int $fk_discount_voucher_pool) Return the first ChildSpyDiscount filtered by the fk_discount_voucher_pool column
 * @method     ChildSpyDiscount findOneByDisplayName(string $display_name) Return the first ChildSpyDiscount filtered by the display_name column
 * @method     ChildSpyDiscount findOneByDescription(string $description) Return the first ChildSpyDiscount filtered by the description column
 * @method     ChildSpyDiscount findOneByAmount(int $amount) Return the first ChildSpyDiscount filtered by the amount column
 * @method     ChildSpyDiscount findOneByType(int $type) Return the first ChildSpyDiscount filtered by the type column
 * @method     ChildSpyDiscount findOneByCalculatorPlugin(string $calculator_plugin) Return the first ChildSpyDiscount filtered by the calculator_plugin column
 * @method     ChildSpyDiscount findOneByIsPrivileged(boolean $is_privileged) Return the first ChildSpyDiscount filtered by the is_privileged column
 * @method     ChildSpyDiscount findOneByIsActive(boolean $is_active) Return the first ChildSpyDiscount filtered by the is_active column
 * @method     ChildSpyDiscount findOneByValidFrom(string $valid_from) Return the first ChildSpyDiscount filtered by the valid_from column
 * @method     ChildSpyDiscount findOneByValidTo(string $valid_to) Return the first ChildSpyDiscount filtered by the valid_to column
 * @method     ChildSpyDiscount findOneByCreatedAt(string $created_at) Return the first ChildSpyDiscount filtered by the created_at column
 * @method     ChildSpyDiscount findOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscount filtered by the updated_at column *

 * @method     ChildSpyDiscount requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDiscount by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOne(ConnectionInterface $con = null) Return the first ChildSpyDiscount matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscount requireOneByIdDiscount(int $id_discount) Return the first ChildSpyDiscount filtered by the id_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByFkDiscountVoucherPool(int $fk_discount_voucher_pool) Return the first ChildSpyDiscount filtered by the fk_discount_voucher_pool column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByDisplayName(string $display_name) Return the first ChildSpyDiscount filtered by the display_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByDescription(string $description) Return the first ChildSpyDiscount filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByAmount(int $amount) Return the first ChildSpyDiscount filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByType(int $type) Return the first ChildSpyDiscount filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByCalculatorPlugin(string $calculator_plugin) Return the first ChildSpyDiscount filtered by the calculator_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByIsPrivileged(boolean $is_privileged) Return the first ChildSpyDiscount filtered by the is_privileged column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByIsActive(boolean $is_active) Return the first ChildSpyDiscount filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByValidFrom(string $valid_from) Return the first ChildSpyDiscount filtered by the valid_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByValidTo(string $valid_to) Return the first ChildSpyDiscount filtered by the valid_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByCreatedAt(string $created_at) Return the first ChildSpyDiscount filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscount requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscount filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscount[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDiscount objects based on current ModelCriteria
 * @method     ChildSpyDiscount[]|ObjectCollection findByIdDiscount(int $id_discount) Return ChildSpyDiscount objects filtered by the id_discount column
 * @method     ChildSpyDiscount[]|ObjectCollection findByFkDiscountVoucherPool(int $fk_discount_voucher_pool) Return ChildSpyDiscount objects filtered by the fk_discount_voucher_pool column
 * @method     ChildSpyDiscount[]|ObjectCollection findByDisplayName(string $display_name) Return ChildSpyDiscount objects filtered by the display_name column
 * @method     ChildSpyDiscount[]|ObjectCollection findByDescription(string $description) Return ChildSpyDiscount objects filtered by the description column
 * @method     ChildSpyDiscount[]|ObjectCollection findByAmount(int $amount) Return ChildSpyDiscount objects filtered by the amount column
 * @method     ChildSpyDiscount[]|ObjectCollection findByType(int $type) Return ChildSpyDiscount objects filtered by the type column
 * @method     ChildSpyDiscount[]|ObjectCollection findByCalculatorPlugin(string $calculator_plugin) Return ChildSpyDiscount objects filtered by the calculator_plugin column
 * @method     ChildSpyDiscount[]|ObjectCollection findByIsPrivileged(boolean $is_privileged) Return ChildSpyDiscount objects filtered by the is_privileged column
 * @method     ChildSpyDiscount[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyDiscount objects filtered by the is_active column
 * @method     ChildSpyDiscount[]|ObjectCollection findByValidFrom(string $valid_from) Return ChildSpyDiscount objects filtered by the valid_from column
 * @method     ChildSpyDiscount[]|ObjectCollection findByValidTo(string $valid_to) Return ChildSpyDiscount objects filtered by the valid_to column
 * @method     ChildSpyDiscount[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyDiscount objects filtered by the created_at column
 * @method     ChildSpyDiscount[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyDiscount objects filtered by the updated_at column
 * @method     ChildSpyDiscount[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDiscountQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDiscountQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDiscount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDiscountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDiscountQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDiscountQuery) {
            return $criteria;
        }
        $query = new ChildSpyDiscountQuery();
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
     * @return ChildSpyDiscount|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDiscountTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountTableMap::DATABASE_NAME);
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
     * @return ChildSpyDiscount A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_discount, fk_discount_voucher_pool, display_name, description, amount, type, calculator_plugin, is_privileged, is_active, valid_from, valid_to, created_at, updated_at FROM spy_discount WHERE id_discount = :p0';
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
            /** @var ChildSpyDiscount $obj */
            $obj = new ChildSpyDiscount();
            $obj->hydrate($row);
            SpyDiscountTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDiscount|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDiscount(1234); // WHERE id_discount = 1234
     * $query->filterByIdDiscount(array(12, 34)); // WHERE id_discount IN (12, 34)
     * $query->filterByIdDiscount(array('min' => 12)); // WHERE id_discount > 12
     * </code>
     *
     * @param     mixed $idDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByIdDiscount($idDiscount = null, $comparison = null)
    {
        if (is_array($idDiscount)) {
            $useMinMax = false;
            if (isset($idDiscount['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $idDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDiscount['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $idDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $idDiscount, $comparison);
    }

    /**
     * Filter the query on the fk_discount_voucher_pool column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDiscountVoucherPool(1234); // WHERE fk_discount_voucher_pool = 1234
     * $query->filterByFkDiscountVoucherPool(array(12, 34)); // WHERE fk_discount_voucher_pool IN (12, 34)
     * $query->filterByFkDiscountVoucherPool(array('min' => 12)); // WHERE fk_discount_voucher_pool > 12
     * </code>
     *
     * @see       filterByVoucherPool()
     *
     * @param     mixed $fkDiscountVoucherPool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByFkDiscountVoucherPool($fkDiscountVoucherPool = null, $comparison = null)
    {
        if (is_array($fkDiscountVoucherPool)) {
            $useMinMax = false;
            if (isset($fkDiscountVoucherPool['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $fkDiscountVoucherPool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDiscountVoucherPool['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $fkDiscountVoucherPool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $fkDiscountVoucherPool, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyDiscountTableMap::COL_DISPLAY_NAME, $displayName, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyDiscountTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        $valueSet = SpyDiscountTableMap::getValueSet(SpyDiscountTableMap::COL_TYPE);
        if (is_scalar($type)) {
            if (!in_array($type, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $type));
            }
            $type = array_search($type, $valueSet);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the calculator_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByCalculatorPlugin('fooValue');   // WHERE calculator_plugin = 'fooValue'
     * $query->filterByCalculatorPlugin('%fooValue%'); // WHERE calculator_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calculatorPlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByCalculatorPlugin($calculatorPlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calculatorPlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $calculatorPlugin)) {
                $calculatorPlugin = str_replace('*', '%', $calculatorPlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_CALCULATOR_PLUGIN, $calculatorPlugin, $comparison);
    }

    /**
     * Filter the query on the is_privileged column
     *
     * Example usage:
     * <code>
     * $query->filterByIsPrivileged(true); // WHERE is_privileged = true
     * $query->filterByIsPrivileged('yes'); // WHERE is_privileged = true
     * </code>
     *
     * @param     boolean|string $isPrivileged The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByIsPrivileged($isPrivileged = null, $comparison = null)
    {
        if (is_string($isPrivileged)) {
            $isPrivileged = in_array(strtolower($isPrivileged), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_IS_PRIVILEGED, $isPrivileged, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the valid_from column
     *
     * Example usage:
     * <code>
     * $query->filterByValidFrom('2011-03-14'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom('now'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom(array('max' => 'yesterday')); // WHERE valid_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $validFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByValidFrom($validFrom = null, $comparison = null)
    {
        if (is_array($validFrom)) {
            $useMinMax = false;
            if (isset($validFrom['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_FROM, $validFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validFrom['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_FROM, $validFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_FROM, $validFrom, $comparison);
    }

    /**
     * Filter the query on the valid_to column
     *
     * Example usage:
     * <code>
     * $query->filterByValidTo('2011-03-14'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo('now'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo(array('max' => 'yesterday')); // WHERE valid_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $validTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByValidTo($validTo = null, $comparison = null)
    {
        if (is_array($validTo)) {
            $useMinMax = false;
            if (isset($validTo['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_TO, $validTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validTo['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_TO, $validTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_VALID_TO, $validTo, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyDiscountTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountVoucherPool object
     *
     * @param \Propel\SpyDiscountVoucherPool|ObjectCollection $spyDiscountVoucherPool The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByVoucherPool($spyDiscountVoucherPool, $comparison = null)
    {
        if ($spyDiscountVoucherPool instanceof \Propel\SpyDiscountVoucherPool) {
            return $this
                ->addUsingAlias(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $spyDiscountVoucherPool->getIdDiscountVoucherPool(), $comparison);
        } elseif ($spyDiscountVoucherPool instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, $spyDiscountVoucherPool->toKeyValue('PrimaryKey', 'IdDiscountVoucherPool'), $comparison);
        } else {
            throw new PropelException('filterByVoucherPool() only accepts arguments of type \Propel\SpyDiscountVoucherPool or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VoucherPool relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function joinVoucherPool($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VoucherPool');

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
            $this->addJoinObject($join, 'VoucherPool');
        }

        return $this;
    }

    /**
     * Use the VoucherPool relation SpyDiscountVoucherPool object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountVoucherPoolQuery A secondary query class using the current class as primary query
     */
    public function useVoucherPoolQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinVoucherPool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VoucherPool', '\Propel\SpyDiscountVoucherPoolQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountDecisionRule object
     *
     * @param \Propel\SpyDiscountDecisionRule|ObjectCollection $spyDiscountDecisionRule the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByDecisionRule($spyDiscountDecisionRule, $comparison = null)
    {
        if ($spyDiscountDecisionRule instanceof \Propel\SpyDiscountDecisionRule) {
            return $this
                ->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $spyDiscountDecisionRule->getFkDiscount(), $comparison);
        } elseif ($spyDiscountDecisionRule instanceof ObjectCollection) {
            return $this
                ->useDecisionRuleQuery()
                ->filterByPrimaryKeys($spyDiscountDecisionRule->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDecisionRule() only accepts arguments of type \Propel\SpyDiscountDecisionRule or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DecisionRule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function joinDecisionRule($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DecisionRule');

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
            $this->addJoinObject($join, 'DecisionRule');
        }

        return $this;
    }

    /**
     * Use the DecisionRule relation SpyDiscountDecisionRule object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountDecisionRuleQuery A secondary query class using the current class as primary query
     */
    public function useDecisionRuleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDecisionRule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DecisionRule', '\Propel\SpyDiscountDecisionRuleQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyDiscountCollector object
     *
     * @param \Propel\SpyDiscountCollector|ObjectCollection $spyDiscountCollector the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function filterByDiscountCollector($spyDiscountCollector, $comparison = null)
    {
        if ($spyDiscountCollector instanceof \Propel\SpyDiscountCollector) {
            return $this
                ->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $spyDiscountCollector->getFkDiscount(), $comparison);
        } elseif ($spyDiscountCollector instanceof ObjectCollection) {
            return $this
                ->useDiscountCollectorQuery()
                ->filterByPrimaryKeys($spyDiscountCollector->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscountCollector() only accepts arguments of type \Propel\SpyDiscountCollector or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiscountCollector relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function joinDiscountCollector($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiscountCollector');

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
            $this->addJoinObject($join, 'DiscountCollector');
        }

        return $this;
    }

    /**
     * Use the DiscountCollector relation SpyDiscountCollector object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountCollectorQuery A secondary query class using the current class as primary query
     */
    public function useDiscountCollectorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscountCollector($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiscountCollector', '\Propel\SpyDiscountCollectorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDiscount $spyDiscount Object to remove from the list of results
     *
     * @return $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function prune($spyDiscount = null)
    {
        if ($spyDiscount) {
            $this->addUsingAlias(SpyDiscountTableMap::COL_ID_DISCOUNT, $spyDiscount->getIdDiscount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDiscountTableMap::clearInstancePool();
            SpyDiscountTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDiscountTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDiscountTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDiscountTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyDiscountQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountTableMap::COL_CREATED_AT);
    }

} // SpyDiscountQuery
