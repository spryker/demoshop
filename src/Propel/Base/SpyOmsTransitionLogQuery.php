<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyOmsTransitionLog as ChildSpyOmsTransitionLog;
use Propel\SpyOmsTransitionLogQuery as ChildSpyOmsTransitionLogQuery;
use Propel\Map\SpyOmsTransitionLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_oms_transition_log' table.
 *
 *
 *
 * @method     ChildSpyOmsTransitionLogQuery orderByIdOmsTransitionLog($order = Criteria::ASC) Order by the id_oms_transition_log column
 * @method     ChildSpyOmsTransitionLogQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method     ChildSpyOmsTransitionLogQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpyOmsTransitionLogQuery orderByLocked($order = Criteria::ASC) Order by the locked column
 * @method     ChildSpyOmsTransitionLogQuery orderByFkOmsOrderProcess($order = Criteria::ASC) Order by the fk_oms_order_process column
 * @method     ChildSpyOmsTransitionLogQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method     ChildSpyOmsTransitionLogQuery orderByHostname($order = Criteria::ASC) Order by the hostname column
 * @method     ChildSpyOmsTransitionLogQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     ChildSpyOmsTransitionLogQuery orderByController($order = Criteria::ASC) Order by the controller column
 * @method     ChildSpyOmsTransitionLogQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildSpyOmsTransitionLogQuery orderByParams($order = Criteria::ASC) Order by the params column
 * @method     ChildSpyOmsTransitionLogQuery orderBySourceState($order = Criteria::ASC) Order by the source_state column
 * @method     ChildSpyOmsTransitionLogQuery orderByTargetState($order = Criteria::ASC) Order by the target_state column
 * @method     ChildSpyOmsTransitionLogQuery orderByCommands($order = Criteria::ASC) Order by the commands column
 * @method     ChildSpyOmsTransitionLogQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method     ChildSpyOmsTransitionLogQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildSpyOmsTransitionLogQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method     ChildSpyOmsTransitionLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyOmsTransitionLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyOmsTransitionLogQuery groupByIdOmsTransitionLog() Group by the id_oms_transition_log column
 * @method     ChildSpyOmsTransitionLogQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method     ChildSpyOmsTransitionLogQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpyOmsTransitionLogQuery groupByLocked() Group by the locked column
 * @method     ChildSpyOmsTransitionLogQuery groupByFkOmsOrderProcess() Group by the fk_oms_order_process column
 * @method     ChildSpyOmsTransitionLogQuery groupByEvent() Group by the event column
 * @method     ChildSpyOmsTransitionLogQuery groupByHostname() Group by the hostname column
 * @method     ChildSpyOmsTransitionLogQuery groupByModule() Group by the module column
 * @method     ChildSpyOmsTransitionLogQuery groupByController() Group by the controller column
 * @method     ChildSpyOmsTransitionLogQuery groupByAction() Group by the action column
 * @method     ChildSpyOmsTransitionLogQuery groupByParams() Group by the params column
 * @method     ChildSpyOmsTransitionLogQuery groupBySourceState() Group by the source_state column
 * @method     ChildSpyOmsTransitionLogQuery groupByTargetState() Group by the target_state column
 * @method     ChildSpyOmsTransitionLogQuery groupByCommands() Group by the commands column
 * @method     ChildSpyOmsTransitionLogQuery groupByConditions() Group by the conditions column
 * @method     ChildSpyOmsTransitionLogQuery groupByError() Group by the error column
 * @method     ChildSpyOmsTransitionLogQuery groupByErrorMessage() Group by the error_message column
 * @method     ChildSpyOmsTransitionLogQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyOmsTransitionLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyOmsTransitionLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyOmsTransitionLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyOmsTransitionLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyOmsTransitionLogQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpyOmsTransitionLogQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpyOmsTransitionLogQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     ChildSpyOmsTransitionLogQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpyOmsTransitionLogQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method     ChildSpyOmsTransitionLogQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method     ChildSpyOmsTransitionLogQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method     ChildSpyOmsTransitionLogQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method     ChildSpyOmsTransitionLogQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method     \Propel\SpySalesOrderQuery|\Propel\SpySalesOrderItemQuery|\Propel\SpyOmsOrderProcessQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyOmsTransitionLog findOne(ConnectionInterface $con = null) Return the first ChildSpyOmsTransitionLog matching the query
 * @method     ChildSpyOmsTransitionLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyOmsTransitionLog matching the query, or a new ChildSpyOmsTransitionLog object populated from the query conditions when no match is found
 *
 * @method     ChildSpyOmsTransitionLog findOneByIdOmsTransitionLog(int $id_oms_transition_log) Return the first ChildSpyOmsTransitionLog filtered by the id_oms_transition_log column
 * @method     ChildSpyOmsTransitionLog findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpyOmsTransitionLog filtered by the fk_sales_order_item column
 * @method     ChildSpyOmsTransitionLog findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyOmsTransitionLog filtered by the fk_sales_order column
 * @method     ChildSpyOmsTransitionLog findOneByLocked(boolean $locked) Return the first ChildSpyOmsTransitionLog filtered by the locked column
 * @method     ChildSpyOmsTransitionLog findOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ChildSpyOmsTransitionLog filtered by the fk_oms_order_process column
 * @method     ChildSpyOmsTransitionLog findOneByEvent(string $event) Return the first ChildSpyOmsTransitionLog filtered by the event column
 * @method     ChildSpyOmsTransitionLog findOneByHostname(string $hostname) Return the first ChildSpyOmsTransitionLog filtered by the hostname column
 * @method     ChildSpyOmsTransitionLog findOneByModule(string $module) Return the first ChildSpyOmsTransitionLog filtered by the module column
 * @method     ChildSpyOmsTransitionLog findOneByController(string $controller) Return the first ChildSpyOmsTransitionLog filtered by the controller column
 * @method     ChildSpyOmsTransitionLog findOneByAction(string $action) Return the first ChildSpyOmsTransitionLog filtered by the action column
 * @method     ChildSpyOmsTransitionLog findOneByParams(array $params) Return the first ChildSpyOmsTransitionLog filtered by the params column
 * @method     ChildSpyOmsTransitionLog findOneBySourceState(string $source_state) Return the first ChildSpyOmsTransitionLog filtered by the source_state column
 * @method     ChildSpyOmsTransitionLog findOneByTargetState(string $target_state) Return the first ChildSpyOmsTransitionLog filtered by the target_state column
 * @method     ChildSpyOmsTransitionLog findOneByCommands(array $commands) Return the first ChildSpyOmsTransitionLog filtered by the commands column
 * @method     ChildSpyOmsTransitionLog findOneByConditions(array $conditions) Return the first ChildSpyOmsTransitionLog filtered by the conditions column
 * @method     ChildSpyOmsTransitionLog findOneByError(boolean $error) Return the first ChildSpyOmsTransitionLog filtered by the error column
 * @method     ChildSpyOmsTransitionLog findOneByErrorMessage(string $error_message) Return the first ChildSpyOmsTransitionLog filtered by the error_message column
 * @method     ChildSpyOmsTransitionLog findOneByCreatedAt(string $created_at) Return the first ChildSpyOmsTransitionLog filtered by the created_at column
 * @method     ChildSpyOmsTransitionLog findOneByUpdatedAt(string $updated_at) Return the first ChildSpyOmsTransitionLog filtered by the updated_at column *

 * @method     ChildSpyOmsTransitionLog requirePk($key, ConnectionInterface $con = null) Return the ChildSpyOmsTransitionLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOne(ConnectionInterface $con = null) Return the first ChildSpyOmsTransitionLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyOmsTransitionLog requireOneByIdOmsTransitionLog(int $id_oms_transition_log) Return the first ChildSpyOmsTransitionLog filtered by the id_oms_transition_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ChildSpyOmsTransitionLog filtered by the fk_sales_order_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyOmsTransitionLog filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByLocked(boolean $locked) Return the first ChildSpyOmsTransitionLog filtered by the locked column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ChildSpyOmsTransitionLog filtered by the fk_oms_order_process column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByEvent(string $event) Return the first ChildSpyOmsTransitionLog filtered by the event column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByHostname(string $hostname) Return the first ChildSpyOmsTransitionLog filtered by the hostname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByModule(string $module) Return the first ChildSpyOmsTransitionLog filtered by the module column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByController(string $controller) Return the first ChildSpyOmsTransitionLog filtered by the controller column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByAction(string $action) Return the first ChildSpyOmsTransitionLog filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByParams(array $params) Return the first ChildSpyOmsTransitionLog filtered by the params column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneBySourceState(string $source_state) Return the first ChildSpyOmsTransitionLog filtered by the source_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByTargetState(string $target_state) Return the first ChildSpyOmsTransitionLog filtered by the target_state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByCommands(array $commands) Return the first ChildSpyOmsTransitionLog filtered by the commands column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByConditions(array $conditions) Return the first ChildSpyOmsTransitionLog filtered by the conditions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByError(boolean $error) Return the first ChildSpyOmsTransitionLog filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByErrorMessage(string $error_message) Return the first ChildSpyOmsTransitionLog filtered by the error_message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByCreatedAt(string $created_at) Return the first ChildSpyOmsTransitionLog filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyOmsTransitionLog requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyOmsTransitionLog filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyOmsTransitionLog objects based on current ModelCriteria
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByIdOmsTransitionLog(int $id_oms_transition_log) Return ChildSpyOmsTransitionLog objects filtered by the id_oms_transition_log column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByFkSalesOrderItem(int $fk_sales_order_item) Return ChildSpyOmsTransitionLog objects filtered by the fk_sales_order_item column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpyOmsTransitionLog objects filtered by the fk_sales_order column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByLocked(boolean $locked) Return ChildSpyOmsTransitionLog objects filtered by the locked column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByFkOmsOrderProcess(int $fk_oms_order_process) Return ChildSpyOmsTransitionLog objects filtered by the fk_oms_order_process column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByEvent(string $event) Return ChildSpyOmsTransitionLog objects filtered by the event column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByHostname(string $hostname) Return ChildSpyOmsTransitionLog objects filtered by the hostname column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByModule(string $module) Return ChildSpyOmsTransitionLog objects filtered by the module column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByController(string $controller) Return ChildSpyOmsTransitionLog objects filtered by the controller column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByAction(string $action) Return ChildSpyOmsTransitionLog objects filtered by the action column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByParams(array $params) Return ChildSpyOmsTransitionLog objects filtered by the params column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findBySourceState(string $source_state) Return ChildSpyOmsTransitionLog objects filtered by the source_state column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByTargetState(string $target_state) Return ChildSpyOmsTransitionLog objects filtered by the target_state column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByCommands(array $commands) Return ChildSpyOmsTransitionLog objects filtered by the commands column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByConditions(array $conditions) Return ChildSpyOmsTransitionLog objects filtered by the conditions column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByError(boolean $error) Return ChildSpyOmsTransitionLog objects filtered by the error column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByErrorMessage(string $error_message) Return ChildSpyOmsTransitionLog objects filtered by the error_message column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyOmsTransitionLog objects filtered by the created_at column
 * @method     ChildSpyOmsTransitionLog[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyOmsTransitionLog objects filtered by the updated_at column
 * @method     ChildSpyOmsTransitionLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyOmsTransitionLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyOmsTransitionLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyOmsTransitionLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyOmsTransitionLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyOmsTransitionLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyOmsTransitionLogQuery) {
            return $criteria;
        }
        $query = new ChildSpyOmsTransitionLogQuery();
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
     * @return ChildSpyOmsTransitionLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyOmsTransitionLogTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
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
     * @return ChildSpyOmsTransitionLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_oms_transition_log, fk_sales_order_item, fk_sales_order, locked, fk_oms_order_process, event, hostname, module, controller, action, params, source_state, target_state, commands, conditions, error, error_message, created_at, updated_at FROM spy_oms_transition_log WHERE id_oms_transition_log = :p0';
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
            /** @var ChildSpyOmsTransitionLog $obj */
            $obj = new ChildSpyOmsTransitionLog();
            $obj->hydrate($row);
            SpyOmsTransitionLogTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyOmsTransitionLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_transition_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsTransitionLog(1234); // WHERE id_oms_transition_log = 1234
     * $query->filterByIdOmsTransitionLog(array(12, 34)); // WHERE id_oms_transition_log IN (12, 34)
     * $query->filterByIdOmsTransitionLog(array('min' => 12)); // WHERE id_oms_transition_log > 12
     * </code>
     *
     * @param     mixed $idOmsTransitionLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByIdOmsTransitionLog($idOmsTransitionLog = null, $comparison = null)
    {
        if (is_array($idOmsTransitionLog)) {
            $useMinMax = false;
            if (isset($idOmsTransitionLog['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $idOmsTransitionLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsTransitionLog['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $idOmsTransitionLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $idOmsTransitionLog, $comparison);
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
     * @see       filterByOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
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
     * @see       filterByOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the locked column
     *
     * Example usage:
     * <code>
     * $query->filterByLocked(true); // WHERE locked = true
     * $query->filterByLocked('yes'); // WHERE locked = true
     * </code>
     *
     * @param     boolean|string $locked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByLocked($locked = null, $comparison = null)
    {
        if (is_string($locked)) {
            $locked = in_array(strtolower($locked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_LOCKED, $locked, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderProcess(1234); // WHERE fk_oms_order_process = 1234
     * $query->filterByFkOmsOrderProcess(array(12, 34)); // WHERE fk_oms_order_process IN (12, 34)
     * $query->filterByFkOmsOrderProcess(array('min' => 12)); // WHERE fk_oms_order_process > 12
     * </code>
     *
     * @see       filterByProcess()
     *
     * @param     mixed $fkOmsOrderProcess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderProcess($fkOmsOrderProcess = null, $comparison = null)
    {
        if (is_array($fkOmsOrderProcess)) {
            $useMinMax = false;
            if (isset($fkOmsOrderProcess['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderProcess['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess, $comparison);
    }

    /**
     * Filter the query on the event column
     *
     * Example usage:
     * <code>
     * $query->filterByEvent('fooValue');   // WHERE event = 'fooValue'
     * $query->filterByEvent('%fooValue%'); // WHERE event LIKE '%fooValue%'
     * </code>
     *
     * @param     string $event The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByEvent($event = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($event)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $event)) {
                $event = str_replace('*', '%', $event);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the hostname column
     *
     * Example usage:
     * <code>
     * $query->filterByHostname('fooValue');   // WHERE hostname = 'fooValue'
     * $query->filterByHostname('%fooValue%'); // WHERE hostname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hostname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByHostname($hostname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hostname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hostname)) {
                $hostname = str_replace('*', '%', $hostname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_HOSTNAME, $hostname, $comparison);
    }

    /**
     * Filter the query on the module column
     *
     * Example usage:
     * <code>
     * $query->filterByModule('fooValue');   // WHERE module = 'fooValue'
     * $query->filterByModule('%fooValue%'); // WHERE module LIKE '%fooValue%'
     * </code>
     *
     * @param     string $module The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByModule($module = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($module)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $module)) {
                $module = str_replace('*', '%', $module);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_MODULE, $module, $comparison);
    }

    /**
     * Filter the query on the controller column
     *
     * Example usage:
     * <code>
     * $query->filterByController('fooValue');   // WHERE controller = 'fooValue'
     * $query->filterByController('%fooValue%'); // WHERE controller LIKE '%fooValue%'
     * </code>
     *
     * @param     string $controller The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByController($controller = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($controller)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $controller)) {
                $controller = str_replace('*', '%', $controller);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CONTROLLER, $controller, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%'); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $action)) {
                $action = str_replace('*', '%', $action);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the params column
     *
     * @param     array $params The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByParams($params = null, $comparison = null)
    {
        $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_PARAMS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($params as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($params as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($params as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_PARAMS, $params, $comparison);
    }

    /**
     * Filter the query on the params column
     * @param     mixed $params The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByParam($params = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($params)) {
                $params = '%| ' . $params . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $params = '%| ' . $params . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_PARAMS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $params, $comparison);
            } else {
                $this->addAnd($key, $params, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_PARAMS, $params, $comparison);
    }

    /**
     * Filter the query on the source_state column
     *
     * Example usage:
     * <code>
     * $query->filterBySourceState('fooValue');   // WHERE source_state = 'fooValue'
     * $query->filterBySourceState('%fooValue%'); // WHERE source_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sourceState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterBySourceState($sourceState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sourceState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sourceState)) {
                $sourceState = str_replace('*', '%', $sourceState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_SOURCE_STATE, $sourceState, $comparison);
    }

    /**
     * Filter the query on the target_state column
     *
     * Example usage:
     * <code>
     * $query->filterByTargetState('fooValue');   // WHERE target_state = 'fooValue'
     * $query->filterByTargetState('%fooValue%'); // WHERE target_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $targetState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByTargetState($targetState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($targetState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $targetState)) {
                $targetState = str_replace('*', '%', $targetState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_TARGET_STATE, $targetState, $comparison);
    }

    /**
     * Filter the query on the commands column
     *
     * @param     array $commands The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCommands($commands = null, $comparison = null)
    {
        $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_COMMANDS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($commands as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($commands as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($commands as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the commands column
     * @param     mixed $commands The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCommand($commands = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($commands)) {
                $commands = '%| ' . $commands . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $commands = '%| ' . $commands . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_COMMANDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $commands, $comparison);
            } else {
                $this->addAnd($key, $commands, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the conditions column
     *
     * @param     array $conditions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByConditions($conditions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_CONDITIONS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($conditions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($conditions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($conditions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the conditions column
     * @param     mixed $conditions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCondition($conditions = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($conditions)) {
                $conditions = '%| ' . $conditions . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $conditions = '%| ' . $conditions . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(SpyOmsTransitionLogTableMap::COL_CONDITIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $conditions, $comparison);
            } else {
                $this->addAnd($key, $conditions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError(true); // WHERE error = true
     * $query->filterByError('yes'); // WHERE error = true
     * </code>
     *
     * @param     boolean|string $error The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (is_string($error)) {
            $error = in_array(strtolower($error), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ERROR, $error, $comparison);
    }

    /**
     * Filter the query on the error_message column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMessage('fooValue');   // WHERE error_message = 'fooValue'
     * $query->filterByErrorMessage('%fooValue%'); // WHERE error_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByErrorMessage($errorMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $errorMessage)) {
                $errorMessage = str_replace('*', '%', $errorMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE, $errorMessage, $comparison);
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
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderItem object
     *
     * @param \Propel\SpySalesOrderItem|ObjectCollection $spySalesOrderItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByOrderItem($spySalesOrderItem, $comparison = null)
    {
        if ($spySalesOrderItem instanceof \Propel\SpySalesOrderItem) {
            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($spySalesOrderItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $spySalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type \Propel\SpySalesOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function joinOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderItem');

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
            $this->addJoinObject($join, 'OrderItem');
        }

        return $this;
    }

    /**
     * Use the OrderItem relation SpySalesOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', '\Propel\SpySalesOrderItemQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyOmsOrderProcess object
     *
     * @param \Propel\SpyOmsOrderProcess|ObjectCollection $spyOmsOrderProcess The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByProcess($spyOmsOrderProcess, $comparison = null)
    {
        if ($spyOmsOrderProcess instanceof \Propel\SpyOmsOrderProcess) {
            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $spyOmsOrderProcess->getIdOmsOrderProcess(), $comparison);
        } elseif ($spyOmsOrderProcess instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $spyOmsOrderProcess->toKeyValue('PrimaryKey', 'IdOmsOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type \Propel\SpyOmsOrderProcess or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function joinProcess($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Process');

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
            $this->addJoinObject($join, 'Process');
        }

        return $this;
    }

    /**
     * Use the Process relation SpyOmsOrderProcess object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyOmsOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', '\Propel\SpyOmsOrderProcessQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyOmsTransitionLog $spyOmsTransitionLog Object to remove from the list of results
     *
     * @return $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function prune($spyOmsTransitionLog = null)
    {
        if ($spyOmsTransitionLog) {
            $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $spyOmsTransitionLog->getIdOmsTransitionLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_oms_transition_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyOmsTransitionLogTableMap::clearInstancePool();
            SpyOmsTransitionLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyOmsTransitionLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyOmsTransitionLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyOmsTransitionLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyOmsTransitionLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyOmsTransitionLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyOmsTransitionLogTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyOmsTransitionLogTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyOmsTransitionLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyOmsTransitionLogTableMap::COL_CREATED_AT);
    }

} // SpyOmsTransitionLogQuery
