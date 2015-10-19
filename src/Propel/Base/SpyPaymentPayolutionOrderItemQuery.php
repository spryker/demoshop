<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayolutionOrderItem as ChildSpyPaymentPayolutionOrderItem;
use Propel\SpyPaymentPayolutionOrderItemQuery as ChildSpyPaymentPayolutionOrderItemQuery;
use Propel\Map\SpyPaymentPayolutionOrderItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payolution_order_item' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayolutionOrderItemQuery orderByFkPaymentPayolution($order = Criteria::ASC) Order by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionOrderItemQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method     ChildSpyPaymentPayolutionOrderItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildSpyPaymentPayolutionOrderItemQuery groupByFkPaymentPayolution() Group by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionOrderItemQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method     ChildSpyPaymentPayolutionOrderItemQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildSpyPaymentPayolutionOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayolutionOrderItemQuery leftJoinSpyPaymentPayolution($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionOrderItemQuery rightJoinSpyPaymentPayolution($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionOrderItemQuery innerJoinSpyPaymentPayolution($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolution relation
 *
 * @method     ChildSpyPaymentPayolutionOrderItemQuery leftJoinSpySalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyPaymentPayolutionOrderItemQuery rightJoinSpySalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyPaymentPayolutionOrderItemQuery innerJoinSpySalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrderItem relation
 *
 * @method     \Propel\SpyPaymentPayolutionQuery|\Propel\SpySalesOrderItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayolutionOrderItem findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionOrderItem matching the query
 * @method     ChildSpyPaymentPayolutionOrderItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionOrderItem matching the query, or a new ChildSpyPaymentPayolutionOrderItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayolutionOrderItem findOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionOrderItem findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the fk_sales_order_item column
 * @method     ChildSpyPaymentPayolutionOrderItem findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the created_at column *

 * @method     ChildSpyPaymentPayolutionOrderItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayolutionOrderItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionOrderItem requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionOrderItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionOrderItem requireOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the fk_payment_payolution column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionOrderItem requireOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the fk_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionOrderItem requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionOrderItem filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionOrderItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayolutionOrderItem objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayolutionOrderItem[]|ObjectCollection findByFkPaymentPayolution(int $fk_payment_payolution) Return ChildSpyPaymentPayolutionOrderItem objects filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionOrderItem[]|ObjectCollection findByFkSalesOrderItem(int $fk_sales_order_item) Return ChildSpyPaymentPayolutionOrderItem objects filtered by the fk_sales_order_item column
 * @method     ChildSpyPaymentPayolutionOrderItem[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayolutionOrderItem objects filtered by the created_at column
 * @method     ChildSpyPaymentPayolutionOrderItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayolutionOrderItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayolutionOrderItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayolutionOrderItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayolutionOrderItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayolutionOrderItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayolutionOrderItemQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayolutionOrderItemQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$fk_payment_payolution, $fk_sales_order_item] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyPaymentPayolutionOrderItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayolutionOrderItemTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionOrderItemTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayolutionOrderItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_payment_payolution, fk_sales_order_item, created_at FROM spy_payment_payolution_order_item WHERE fk_payment_payolution = :p0 AND fk_sales_order_item = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyPaymentPayolutionOrderItem $obj */
            $obj = new ChildSpyPaymentPayolutionOrderItem();
            $obj->hydrate($row);
            SpyPaymentPayolutionOrderItemTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyPaymentPayolutionOrderItem|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_payment_payolution column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPaymentPayolution(1234); // WHERE fk_payment_payolution = 1234
     * $query->filterByFkPaymentPayolution(array(12, 34)); // WHERE fk_payment_payolution IN (12, 34)
     * $query->filterByFkPaymentPayolution(array('min' => 12)); // WHERE fk_payment_payolution > 12
     * </code>
     *
     * @see       filterBySpyPaymentPayolution()
     *
     * @param     mixed $fkPaymentPayolution The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkPaymentPayolution($fkPaymentPayolution = null, $comparison = null)
    {
        if (is_array($fkPaymentPayolution)) {
            $useMinMax = false;
            if (isset($fkPaymentPayolution['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentPayolution['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution, $comparison);
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
     * @see       filterBySpySalesOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayolution object
     *
     * @param \Propel\SpyPaymentPayolution|ObjectCollection $spyPaymentPayolution The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolution($spyPaymentPayolution, $comparison = null)
    {
        if ($spyPaymentPayolution instanceof \Propel\SpyPaymentPayolution) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->getIdPaymentPayolution(), $comparison);
        } elseif ($spyPaymentPayolution instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->toKeyValue('PrimaryKey', 'IdPaymentPayolution'), $comparison);
        } else {
            throw new PropelException('filterBySpyPaymentPayolution() only accepts arguments of type \Propel\SpyPaymentPayolution or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolution relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolution($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolution');

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
            $this->addJoinObject($join, 'SpyPaymentPayolution');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolution relation SpyPaymentPayolution object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolution($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolution', '\Propel\SpyPaymentPayolutionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function joinSpySalesOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSpySalesOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySalesOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrderItem', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayolutionOrderItem $spyPaymentPayolutionOrderItem Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayolutionOrderItem = null)
    {
        if ($spyPaymentPayolutionOrderItem) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyPaymentPayolutionOrderItemTableMap::COL_FK_PAYMENT_PAYOLUTION), $spyPaymentPayolutionOrderItem->getFkPaymentPayolution(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyPaymentPayolutionOrderItemTableMap::COL_FK_SALES_ORDER_ITEM), $spyPaymentPayolutionOrderItem->getFkSalesOrderItem(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payolution_order_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionOrderItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayolutionOrderItemTableMap::clearInstancePool();
            SpyPaymentPayolutionOrderItemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionOrderItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayolutionOrderItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayolutionOrderItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayolutionOrderItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionOrderItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionOrderItemTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayolutionOrderItemQuery
