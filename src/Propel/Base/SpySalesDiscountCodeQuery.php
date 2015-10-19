<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesDiscountCode as ChildSpySalesDiscountCode;
use Propel\SpySalesDiscountCodeQuery as ChildSpySalesDiscountCodeQuery;
use Propel\Map\SpySalesDiscountCodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_discount_code' table.
 *
 *
 *
 * @method     ChildSpySalesDiscountCodeQuery orderByIdSalesDiscountCode($order = Criteria::ASC) Order by the id_sales_discount_code column
 * @method     ChildSpySalesDiscountCodeQuery orderByFkSalesDiscount($order = Criteria::ASC) Order by the fk_sales_discount column
 * @method     ChildSpySalesDiscountCodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildSpySalesDiscountCodeQuery orderByCodepoolName($order = Criteria::ASC) Order by the codepool_name column
 * @method     ChildSpySalesDiscountCodeQuery orderByIsReusable($order = Criteria::ASC) Order by the is_reusable column
 * @method     ChildSpySalesDiscountCodeQuery orderByIsOncePerCustomer($order = Criteria::ASC) Order by the is_once_per_customer column
 * @method     ChildSpySalesDiscountCodeQuery orderByIsRefundable($order = Criteria::ASC) Order by the is_refundable column
 * @method     ChildSpySalesDiscountCodeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesDiscountCodeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesDiscountCodeQuery groupByIdSalesDiscountCode() Group by the id_sales_discount_code column
 * @method     ChildSpySalesDiscountCodeQuery groupByFkSalesDiscount() Group by the fk_sales_discount column
 * @method     ChildSpySalesDiscountCodeQuery groupByCode() Group by the code column
 * @method     ChildSpySalesDiscountCodeQuery groupByCodepoolName() Group by the codepool_name column
 * @method     ChildSpySalesDiscountCodeQuery groupByIsReusable() Group by the is_reusable column
 * @method     ChildSpySalesDiscountCodeQuery groupByIsOncePerCustomer() Group by the is_once_per_customer column
 * @method     ChildSpySalesDiscountCodeQuery groupByIsRefundable() Group by the is_refundable column
 * @method     ChildSpySalesDiscountCodeQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesDiscountCodeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesDiscountCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesDiscountCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesDiscountCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesDiscountCodeQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesDiscountCodeQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpySalesDiscountCodeQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpySalesDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesDiscountCode findOne(ConnectionInterface $con = null) Return the first ChildSpySalesDiscountCode matching the query
 * @method     ChildSpySalesDiscountCode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesDiscountCode matching the query, or a new ChildSpySalesDiscountCode object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesDiscountCode findOneByIdSalesDiscountCode(int $id_sales_discount_code) Return the first ChildSpySalesDiscountCode filtered by the id_sales_discount_code column
 * @method     ChildSpySalesDiscountCode findOneByFkSalesDiscount(int $fk_sales_discount) Return the first ChildSpySalesDiscountCode filtered by the fk_sales_discount column
 * @method     ChildSpySalesDiscountCode findOneByCode(string $code) Return the first ChildSpySalesDiscountCode filtered by the code column
 * @method     ChildSpySalesDiscountCode findOneByCodepoolName(string $codepool_name) Return the first ChildSpySalesDiscountCode filtered by the codepool_name column
 * @method     ChildSpySalesDiscountCode findOneByIsReusable(boolean $is_reusable) Return the first ChildSpySalesDiscountCode filtered by the is_reusable column
 * @method     ChildSpySalesDiscountCode findOneByIsOncePerCustomer(boolean $is_once_per_customer) Return the first ChildSpySalesDiscountCode filtered by the is_once_per_customer column
 * @method     ChildSpySalesDiscountCode findOneByIsRefundable(boolean $is_refundable) Return the first ChildSpySalesDiscountCode filtered by the is_refundable column
 * @method     ChildSpySalesDiscountCode findOneByCreatedAt(string $created_at) Return the first ChildSpySalesDiscountCode filtered by the created_at column
 * @method     ChildSpySalesDiscountCode findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesDiscountCode filtered by the updated_at column *

 * @method     ChildSpySalesDiscountCode requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesDiscountCode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesDiscountCode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesDiscountCode requireOneByIdSalesDiscountCode(int $id_sales_discount_code) Return the first ChildSpySalesDiscountCode filtered by the id_sales_discount_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByFkSalesDiscount(int $fk_sales_discount) Return the first ChildSpySalesDiscountCode filtered by the fk_sales_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByCode(string $code) Return the first ChildSpySalesDiscountCode filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByCodepoolName(string $codepool_name) Return the first ChildSpySalesDiscountCode filtered by the codepool_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByIsReusable(boolean $is_reusable) Return the first ChildSpySalesDiscountCode filtered by the is_reusable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByIsOncePerCustomer(boolean $is_once_per_customer) Return the first ChildSpySalesDiscountCode filtered by the is_once_per_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByIsRefundable(boolean $is_refundable) Return the first ChildSpySalesDiscountCode filtered by the is_refundable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesDiscountCode filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesDiscountCode requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesDiscountCode filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesDiscountCode objects based on current ModelCriteria
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByIdSalesDiscountCode(int $id_sales_discount_code) Return ChildSpySalesDiscountCode objects filtered by the id_sales_discount_code column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByFkSalesDiscount(int $fk_sales_discount) Return ChildSpySalesDiscountCode objects filtered by the fk_sales_discount column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByCode(string $code) Return ChildSpySalesDiscountCode objects filtered by the code column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByCodepoolName(string $codepool_name) Return ChildSpySalesDiscountCode objects filtered by the codepool_name column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByIsReusable(boolean $is_reusable) Return ChildSpySalesDiscountCode objects filtered by the is_reusable column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByIsOncePerCustomer(boolean $is_once_per_customer) Return ChildSpySalesDiscountCode objects filtered by the is_once_per_customer column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByIsRefundable(boolean $is_refundable) Return ChildSpySalesDiscountCode objects filtered by the is_refundable column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesDiscountCode objects filtered by the created_at column
 * @method     ChildSpySalesDiscountCode[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesDiscountCode objects filtered by the updated_at column
 * @method     ChildSpySalesDiscountCode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesDiscountCodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesDiscountCodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesDiscountCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesDiscountCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesDiscountCodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesDiscountCodeQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesDiscountCodeQuery();
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
     * @return ChildSpySalesDiscountCode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesDiscountCodeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesDiscountCodeTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesDiscountCode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sales_discount_code, fk_sales_discount, code, codepool_name, is_reusable, is_once_per_customer, is_refundable, created_at, updated_at FROM spy_sales_discount_code WHERE id_sales_discount_code = :p0';
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
            /** @var ChildSpySalesDiscountCode $obj */
            $obj = new ChildSpySalesDiscountCode();
            $obj->hydrate($row);
            SpySalesDiscountCodeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesDiscountCode|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_discount_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesDiscountCode(1234); // WHERE id_sales_discount_code = 1234
     * $query->filterByIdSalesDiscountCode(array(12, 34)); // WHERE id_sales_discount_code IN (12, 34)
     * $query->filterByIdSalesDiscountCode(array('min' => 12)); // WHERE id_sales_discount_code > 12
     * </code>
     *
     * @param     mixed $idSalesDiscountCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIdSalesDiscountCode($idSalesDiscountCode = null, $comparison = null)
    {
        if (is_array($idSalesDiscountCode)) {
            $useMinMax = false;
            if (isset($idSalesDiscountCode['min'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesDiscountCode['max'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode, $comparison);
    }

    /**
     * Filter the query on the fk_sales_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesDiscount(1234); // WHERE fk_sales_discount = 1234
     * $query->filterByFkSalesDiscount(array(12, 34)); // WHERE fk_sales_discount IN (12, 34)
     * $query->filterByFkSalesDiscount(array('min' => 12)); // WHERE fk_sales_discount > 12
     * </code>
     *
     * @see       filterByDiscount()
     *
     * @param     mixed $fkSalesDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByFkSalesDiscount($fkSalesDiscount = null, $comparison = null)
    {
        if (is_array($fkSalesDiscount)) {
            $useMinMax = false;
            if (isset($fkSalesDiscount['min'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, $fkSalesDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesDiscount['max'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, $fkSalesDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, $fkSalesDiscount, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the codepool_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCodepoolName('fooValue');   // WHERE codepool_name = 'fooValue'
     * $query->filterByCodepoolName('%fooValue%'); // WHERE codepool_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codepoolName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCodepoolName($codepoolName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codepoolName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codepoolName)) {
                $codepoolName = str_replace('*', '%', $codepoolName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CODEPOOL_NAME, $codepoolName, $comparison);
    }

    /**
     * Filter the query on the is_reusable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsReusable(true); // WHERE is_reusable = true
     * $query->filterByIsReusable('yes'); // WHERE is_reusable = true
     * </code>
     *
     * @param     boolean|string $isReusable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsReusable($isReusable = null, $comparison = null)
    {
        if (is_string($isReusable)) {
            $isReusable = in_array(strtolower($isReusable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_IS_REUSABLE, $isReusable, $comparison);
    }

    /**
     * Filter the query on the is_once_per_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOncePerCustomer(true); // WHERE is_once_per_customer = true
     * $query->filterByIsOncePerCustomer('yes'); // WHERE is_once_per_customer = true
     * </code>
     *
     * @param     boolean|string $isOncePerCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsOncePerCustomer($isOncePerCustomer = null, $comparison = null)
    {
        if (is_string($isOncePerCustomer)) {
            $isOncePerCustomer = in_array(strtolower($isOncePerCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_IS_ONCE_PER_CUSTOMER, $isOncePerCustomer, $comparison);
    }

    /**
     * Filter the query on the is_refundable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsRefundable(true); // WHERE is_refundable = true
     * $query->filterByIsRefundable('yes'); // WHERE is_refundable = true
     * </code>
     *
     * @param     boolean|string $isRefundable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsRefundable($isRefundable = null, $comparison = null)
    {
        if (is_string($isRefundable)) {
            $isRefundable = in_array(strtolower($isRefundable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_IS_REFUNDABLE, $isRefundable, $comparison);
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
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesDiscount object
     *
     * @param \Propel\SpySalesDiscount|ObjectCollection $spySalesDiscount The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByDiscount($spySalesDiscount, $comparison = null)
    {
        if ($spySalesDiscount instanceof \Propel\SpySalesDiscount) {
            return $this
                ->addUsingAlias(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, $spySalesDiscount->getIdSalesDiscount(), $comparison);
        } elseif ($spySalesDiscount instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, $spySalesDiscount->toKeyValue('PrimaryKey', 'IdSalesDiscount'), $comparison);
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
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', '\Propel\SpySalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySalesDiscountCode $spySalesDiscountCode Object to remove from the list of results
     *
     * @return $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function prune($spySalesDiscountCode = null)
    {
        if ($spySalesDiscountCode) {
            $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, $spySalesDiscountCode->getIdSalesDiscountCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_discount_code table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountCodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesDiscountCodeTableMap::clearInstancePool();
            SpySalesDiscountCodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountCodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesDiscountCodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesDiscountCodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesDiscountCodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesDiscountCodeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesDiscountCodeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesDiscountCodeTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesDiscountCodeTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesDiscountCodeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesDiscountCodeTableMap::COL_CREATED_AT);
    }

} // SpySalesDiscountCodeQuery
