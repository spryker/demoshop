<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayoneTransactionStatusLogOrderItem as ChildSpyPaymentPayoneTransactionStatusLogOrderItem;
use Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery as ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery;
use Propel\Map\SpyPaymentPayoneTransactionStatusLogOrderItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payone_transaction_status_log_order_item' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery orderByIdPaymentPayoneTransactionStatusLog($order = Criteria::ASC) Order by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery orderByIdSalesOrderItem($order = Criteria::ASC) Order by the id_sales_order_item column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery groupByIdPaymentPayoneTransactionStatusLog() Group by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery groupByIdSalesOrderItem() Group by the id_sales_order_item column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery leftJoinSpyPaymentPayoneTransactionStatusLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLog relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery rightJoinSpyPaymentPayoneTransactionStatusLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLog relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery innerJoinSpyPaymentPayoneTransactionStatusLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLog relation
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery leftJoinSpySalesOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery rightJoinSpySalesOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrderItem relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery innerJoinSpySalesOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrderItem relation
 *
 * @method     \Propel\SpyPaymentPayoneTransactionStatusLogQuery|\Propel\SpySalesOrderItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem matching the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem matching the query, or a new ChildSpyPaymentPayoneTransactionStatusLogOrderItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem findOneByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem findOneByIdSalesOrderItem(int $id_sales_order_item) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the id_sales_order_item column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the created_at column *

 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayoneTransactionStatusLogOrderItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem requireOneByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the id_payment_payone_transaction_status_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem requireOneByIdSalesOrderItem(int $id_sales_order_item) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the id_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneTransactionStatusLogOrderItem filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]|ObjectCollection findByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects filtered by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]|ObjectCollection findByIdSalesOrderItem(int $id_sales_order_item) Return ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects filtered by the id_sales_order_item column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayoneTransactionStatusLogOrderItem objects filtered by the created_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogOrderItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayoneTransactionStatusLogOrderItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayoneTransactionStatusLogOrderItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayoneTransactionStatusLogOrderItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery();
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
     * @param array[$id_payment_payone_transaction_status_log, $id_sales_order_item] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payone_transaction_status_log, id_sales_order_item, created_at FROM spy_payment_payone_transaction_status_log_order_item WHERE id_payment_payone_transaction_status_log = :p0 AND id_sales_order_item = :p1';
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
            /** @var ChildSpyPaymentPayoneTransactionStatusLogOrderItem $obj */
            $obj = new ChildSpyPaymentPayoneTransactionStatusLogOrderItem();
            $obj->hydrate($row);
            SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItem|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_payment_payone_transaction_status_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayoneTransactionStatusLog(1234); // WHERE id_payment_payone_transaction_status_log = 1234
     * $query->filterByIdPaymentPayoneTransactionStatusLog(array(12, 34)); // WHERE id_payment_payone_transaction_status_log IN (12, 34)
     * $query->filterByIdPaymentPayoneTransactionStatusLog(array('min' => 12)); // WHERE id_payment_payone_transaction_status_log > 12
     * </code>
     *
     * @see       filterBySpyPaymentPayoneTransactionStatusLog()
     *
     * @param     mixed $idPaymentPayoneTransactionStatusLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayoneTransactionStatusLog($idPaymentPayoneTransactionStatusLog = null, $comparison = null)
    {
        if (is_array($idPaymentPayoneTransactionStatusLog)) {
            $useMinMax = false;
            if (isset($idPaymentPayoneTransactionStatusLog['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayoneTransactionStatusLog['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog, $comparison);
    }

    /**
     * Filter the query on the id_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItem(1234); // WHERE id_sales_order_item = 1234
     * $query->filterByIdSalesOrderItem(array(12, 34)); // WHERE id_sales_order_item IN (12, 34)
     * $query->filterByIdSalesOrderItem(array('min' => 12)); // WHERE id_sales_order_item > 12
     * </code>
     *
     * @see       filterBySpySalesOrderItem()
     *
     * @param     mixed $idSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItem($idSalesOrderItem = null, $comparison = null)
    {
        if (is_array($idSalesOrderItem)) {
            $useMinMax = false;
            if (isset($idSalesOrderItem['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItem['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $idSalesOrderItem, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayoneTransactionStatusLog object
     *
     * @param \Propel\SpyPaymentPayoneTransactionStatusLog|ObjectCollection $spyPaymentPayoneTransactionStatusLog The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayoneTransactionStatusLog($spyPaymentPayoneTransactionStatusLog, $comparison = null)
    {
        if ($spyPaymentPayoneTransactionStatusLog instanceof \Propel\SpyPaymentPayoneTransactionStatusLog) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $spyPaymentPayoneTransactionStatusLog->getIdPaymentPayoneTransactionStatusLog(), $comparison);
        } elseif ($spyPaymentPayoneTransactionStatusLog instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $spyPaymentPayoneTransactionStatusLog->toKeyValue('PrimaryKey', 'IdPaymentPayoneTransactionStatusLog'), $comparison);
        } else {
            throw new PropelException('filterBySpyPaymentPayoneTransactionStatusLog() only accepts arguments of type \Propel\SpyPaymentPayoneTransactionStatusLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayoneTransactionStatusLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayoneTransactionStatusLog');

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
            $this->addJoinObject($join, 'SpyPaymentPayoneTransactionStatusLog');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayoneTransactionStatusLog relation SpyPaymentPayoneTransactionStatusLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayoneTransactionStatusLogQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayoneTransactionStatusLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayoneTransactionStatusLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayoneTransactionStatusLog', '\Propel\SpyPaymentPayoneTransactionStatusLogQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, $spySalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
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
     * @param   ChildSpyPaymentPayoneTransactionStatusLogOrderItem $spyPaymentPayoneTransactionStatusLogOrderItem Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayoneTransactionStatusLogOrderItem = null)
    {
        if ($spyPaymentPayoneTransactionStatusLogOrderItem) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG), $spyPaymentPayoneTransactionStatusLogOrderItem->getIdPaymentPayoneTransactionStatusLog(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_ID_SALES_ORDER_ITEM), $spyPaymentPayoneTransactionStatusLogOrderItem->getIdSalesOrderItem(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payone_transaction_status_log_order_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::clearInstancePool();
            SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogOrderItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogOrderItemTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayoneTransactionStatusLogOrderItemQuery
