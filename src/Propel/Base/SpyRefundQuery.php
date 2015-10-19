<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyRefund as ChildSpyRefund;
use Propel\SpyRefundQuery as ChildSpyRefundQuery;
use Propel\Map\SpyRefundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_refund' table.
 *
 *
 *
 * @method     ChildSpyRefundQuery orderByIdRefund($order = Criteria::ASC) Order by the id_refund column
 * @method     ChildSpyRefundQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpyRefundQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildSpyRefundQuery orderByAdjustmentFee($order = Criteria::ASC) Order by the adjustment_fee column
 * @method     ChildSpyRefundQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildSpyRefundQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildSpyRefundQuery groupByIdRefund() Group by the id_refund column
 * @method     ChildSpyRefundQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpyRefundQuery groupByAmount() Group by the amount column
 * @method     ChildSpyRefundQuery groupByAdjustmentFee() Group by the adjustment_fee column
 * @method     ChildSpyRefundQuery groupByComment() Group by the comment column
 * @method     ChildSpyRefundQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildSpyRefundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyRefundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyRefundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyRefundQuery leftJoinSpySalesOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrder relation
 * @method     ChildSpyRefundQuery rightJoinSpySalesOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrder relation
 * @method     ChildSpyRefundQuery innerJoinSpySalesOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrder relation
 *
 * @method     ChildSpyRefundQuery leftJoinSpySalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyRefundQuery rightJoinSpySalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyRefundQuery innerJoinSpySalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrderItem relation
 *
 * @method     ChildSpyRefundQuery leftJoinSpySalesExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesExpense relation
 * @method     ChildSpyRefundQuery rightJoinSpySalesExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesExpense relation
 * @method     ChildSpyRefundQuery innerJoinSpySalesExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesExpense relation
 *
 * @method     \Propel\SpySalesOrderQuery|\Propel\SpySalesOrderItemQuery|\Propel\SpySalesExpenseQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyRefund findOne(ConnectionInterface $con = null) Return the first ChildSpyRefund matching the query
 * @method     ChildSpyRefund findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyRefund matching the query, or a new ChildSpyRefund object populated from the query conditions when no match is found
 *
 * @method     ChildSpyRefund findOneByIdRefund(int $id_refund) Return the first ChildSpyRefund filtered by the id_refund column
 * @method     ChildSpyRefund findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyRefund filtered by the fk_sales_order column
 * @method     ChildSpyRefund findOneByAmount(int $amount) Return the first ChildSpyRefund filtered by the amount column
 * @method     ChildSpyRefund findOneByAdjustmentFee(int $adjustment_fee) Return the first ChildSpyRefund filtered by the adjustment_fee column
 * @method     ChildSpyRefund findOneByComment(string $comment) Return the first ChildSpyRefund filtered by the comment column
 * @method     ChildSpyRefund findOneByCreatedAt(string $created_at) Return the first ChildSpyRefund filtered by the created_at column *

 * @method     ChildSpyRefund requirePk($key, ConnectionInterface $con = null) Return the ChildSpyRefund by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOne(ConnectionInterface $con = null) Return the first ChildSpyRefund matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRefund requireOneByIdRefund(int $id_refund) Return the first ChildSpyRefund filtered by the id_refund column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyRefund filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOneByAmount(int $amount) Return the first ChildSpyRefund filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOneByAdjustmentFee(int $adjustment_fee) Return the first ChildSpyRefund filtered by the adjustment_fee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOneByComment(string $comment) Return the first ChildSpyRefund filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyRefund requireOneByCreatedAt(string $created_at) Return the first ChildSpyRefund filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyRefund[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyRefund objects based on current ModelCriteria
 * @method     ChildSpyRefund[]|ObjectCollection findByIdRefund(int $id_refund) Return ChildSpyRefund objects filtered by the id_refund column
 * @method     ChildSpyRefund[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpyRefund objects filtered by the fk_sales_order column
 * @method     ChildSpyRefund[]|ObjectCollection findByAmount(int $amount) Return ChildSpyRefund objects filtered by the amount column
 * @method     ChildSpyRefund[]|ObjectCollection findByAdjustmentFee(int $adjustment_fee) Return ChildSpyRefund objects filtered by the adjustment_fee column
 * @method     ChildSpyRefund[]|ObjectCollection findByComment(string $comment) Return ChildSpyRefund objects filtered by the comment column
 * @method     ChildSpyRefund[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyRefund objects filtered by the created_at column
 * @method     ChildSpyRefund[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyRefundQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyRefundQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyRefund', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyRefundQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyRefundQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyRefundQuery) {
            return $criteria;
        }
        $query = new ChildSpyRefundQuery();
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
     * @return ChildSpyRefund|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyRefundTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyRefundTableMap::DATABASE_NAME);
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
     * @return ChildSpyRefund A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_refund, fk_sales_order, amount, adjustment_fee, comment, created_at FROM spy_refund WHERE id_refund = :p0';
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
            /** @var ChildSpyRefund $obj */
            $obj = new ChildSpyRefund();
            $obj->hydrate($row);
            SpyRefundTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyRefund|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_refund column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRefund(1234); // WHERE id_refund = 1234
     * $query->filterByIdRefund(array(12, 34)); // WHERE id_refund IN (12, 34)
     * $query->filterByIdRefund(array('min' => 12)); // WHERE id_refund > 12
     * </code>
     *
     * @param     mixed $idRefund The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByIdRefund($idRefund = null, $comparison = null)
    {
        if (is_array($idRefund)) {
            $useMinMax = false;
            if (isset($idRefund['min'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $idRefund['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRefund['max'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $idRefund['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $idRefund, $comparison);
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
     * @see       filterBySpySalesOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
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
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the adjustment_fee column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustmentFee(1234); // WHERE adjustment_fee = 1234
     * $query->filterByAdjustmentFee(array(12, 34)); // WHERE adjustment_fee IN (12, 34)
     * $query->filterByAdjustmentFee(array('min' => 12)); // WHERE adjustment_fee > 12
     * </code>
     *
     * @param     mixed $adjustmentFee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByAdjustmentFee($adjustmentFee = null, $comparison = null)
    {
        if (is_array($adjustmentFee)) {
            $useMinMax = false;
            if (isset($adjustmentFee['min'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_ADJUSTMENT_FEE, $adjustmentFee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustmentFee['max'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_ADJUSTMENT_FEE, $adjustmentFee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_ADJUSTMENT_FEE, $adjustmentFee, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyRefundTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyRefundTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpyRefundTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyRefundTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterBySpySalesOrder() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesOrder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function joinSpySalesOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesOrder');

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
            $this->addJoinObject($join, 'SpySalesOrder');
        }

        return $this;
    }

    /**
     * Use the SpySalesOrder relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySalesOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrder', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $spySalesOrderItem->getFkRefund(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            return $this
                ->useSpySalesOrderItemQuery()
                ->filterByPrimaryKeys($spySalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySalesOrderItem() only accepts arguments of type \Propel\SpySalesOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function joinSpySalesOrderItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesOrderItem');

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
            $this->addJoinObject($join, 'SpySalesOrderItem');
        }

        return $this;
    }

    /**
     * Use the SpySalesOrderItem relation SpySalesOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpySalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrderItem', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesExpense object
     *
     * @param \Propel\SpySalesExpense|ObjectCollection $spySalesExpense the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyRefundQuery The current query, for fluid interface
     */
    public function filterBySpySalesExpense($spySalesExpense, $comparison = null)
    {
        if ($spySalesExpense instanceof \Propel\SpySalesExpense) {
            return $this
                ->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $spySalesExpense->getFkRefund(), $comparison);
        } elseif ($spySalesExpense instanceof ObjectCollection) {
            return $this
                ->useSpySalesExpenseQuery()
                ->filterByPrimaryKeys($spySalesExpense->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySalesExpense() only accepts arguments of type \Propel\SpySalesExpense or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesExpense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function joinSpySalesExpense($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesExpense');

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
            $this->addJoinObject($join, 'SpySalesExpense');
        }

        return $this;
    }

    /**
     * Use the SpySalesExpense relation SpySalesExpense object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpySalesExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesExpense', '\Propel\SpySalesExpenseQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyRefund $spyRefund Object to remove from the list of results
     *
     * @return $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function prune($spyRefund = null)
    {
        if ($spyRefund) {
            $this->addUsingAlias(SpyRefundTableMap::COL_ID_REFUND, $spyRefund->getIdRefund(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_refund table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRefundTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyRefundTableMap::clearInstancePool();
            SpyRefundTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyRefundTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyRefundTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyRefundTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyRefundTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyRefundTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyRefundTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyRefundQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyRefundTableMap::COL_CREATED_AT);
    }

} // SpyRefundQuery
