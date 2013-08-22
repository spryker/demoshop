<?php


/**
 * Base class that represents a query for the 'pac_sales_order_item_transition_log' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByIdSalesOrderItemTransitionLog($order = Criteria::ASC) Order by the id_sales_order_item_transition_log column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByFkAclUser($order = Criteria::ASC) Order by the fk_acl_user column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByLocked($order = Criteria::ASC) Order by the locked column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByFkSalesOrderProcess($order = Criteria::ASC) Order by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByHostname($order = Criteria::ASC) Order by the hostname column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByController($order = Criteria::ASC) Order by the controller column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByParams($order = Criteria::ASC) Order by the params column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderBySourceState($order = Criteria::ASC) Order by the source_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByTargetState($order = Criteria::ASC) Order by the target_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByCommands($order = Criteria::ASC) Order by the commands column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByIdSalesOrderItemTransitionLog() Group by the id_sales_order_item_transition_log column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByFkAclUser() Group by the fk_acl_user column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByLocked() Group by the locked column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByFkSalesOrderProcess() Group by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByEvent() Group by the event column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByHostname() Group by the hostname column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByModule() Group by the module column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByController() Group by the controller column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByAction() Group by the action column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByParams() Group by the params column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupBySourceState() Group by the source_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByTargetState() Group by the target_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByCommands() Group by the commands column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByConditions() Group by the conditions column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByError() Group by the error column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByErrorMessage() Group by the error_message column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery leftJoinAclUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery rightJoinAclUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery innerJoinAclUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUser relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog matching the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog matching the query, or a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByFkAclUser(int $fk_acl_user) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the fk_acl_user column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByLocked(boolean $locked) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the locked column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByFkSalesOrderProcess(int $fk_sales_order_process) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the fk_sales_order_process column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByEvent(string $event) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the event column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByHostname(string $hostname) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the hostname column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByModule(string $module) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the module column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByController(string $controller) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the controller column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByAction(string $action) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the action column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByParams(array $params) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the params column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneBySourceState(string $source_state) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the source_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByTargetState(string $target_state) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the target_state column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByCommands(array $commands) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the commands column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByConditions(array $conditions) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the conditions column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByError(boolean $error) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the error column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByErrorMessage(string $error_message) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the error_message column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog filtered by the updated_at column
 *
 * @method array findByIdSalesOrderItemTransitionLog(int $id_sales_order_item_transition_log) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the id_sales_order_item_transition_log column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the fk_sales_order_item column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the fk_sales_order column
 * @method array findByFkAclUser(int $fk_acl_user) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the fk_acl_user column
 * @method array findByLocked(boolean $locked) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the locked column
 * @method array findByFkSalesOrderProcess(int $fk_sales_order_process) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the fk_sales_order_process column
 * @method array findByEvent(string $event) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the event column
 * @method array findByHostname(string $hostname) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the hostname column
 * @method array findByModule(string $module) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the module column
 * @method array findByController(string $controller) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the controller column
 * @method array findByAction(string $action) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the action column
 * @method array findByParams(array $params) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the params column
 * @method array findBySourceState(string $source_state) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the source_state column
 * @method array findByTargetState(string $target_state) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the target_state column
 * @method array findByCommands(array $commands) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the commands column
 * @method array findByConditions(array $conditions) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the conditions column
 * @method array findByError(boolean $error) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the error column
 * @method array findByErrorMessage(string $error_message) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the error_message column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemTransitionLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderItemTransitionLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderItemTransitionLog($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_item_transition_log`, `fk_sales_order_item`, `fk_sales_order`, `fk_acl_user`, `locked`, `fk_sales_order_process`, `event`, `hostname`, `module`, `controller`, `action`, `params`, `source_state`, `target_state`, `commands`, `conditions`, `error`, `error_message`, `created_at`, `updated_at` FROM `pac_sales_order_item_transition_log` WHERE `id_sales_order_item_transition_log` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_item_transition_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderItemTransitionLog(1234); // WHERE id_sales_order_item_transition_log = 1234
     * $query->filterByIdSalesOrderItemTransitionLog(array(12, 34)); // WHERE id_sales_order_item_transition_log IN (12, 34)
     * $query->filterByIdSalesOrderItemTransitionLog(array('min' => 12)); // WHERE id_sales_order_item_transition_log >= 12
     * $query->filterByIdSalesOrderItemTransitionLog(array('max' => 12)); // WHERE id_sales_order_item_transition_log <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderItemTransitionLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderItemTransitionLog($idSalesOrderItemTransitionLog = null, $comparison = null)
    {
        if (is_array($idSalesOrderItemTransitionLog)) {
            $useMinMax = false;
            if (isset($idSalesOrderItemTransitionLog['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $idSalesOrderItemTransitionLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderItemTransitionLog['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $idSalesOrderItemTransitionLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $idSalesOrderItemTransitionLog, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item >= 12
     * $query->filterByFkSalesOrderItem(array('max' => 12)); // WHERE fk_sales_order_item <= 12
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order >= 12
     * $query->filterByFkSalesOrder(array('max' => 12)); // WHERE fk_sales_order <= 12
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_acl_user column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclUser(1234); // WHERE fk_acl_user = 1234
     * $query->filterByFkAclUser(array(12, 34)); // WHERE fk_acl_user IN (12, 34)
     * $query->filterByFkAclUser(array('min' => 12)); // WHERE fk_acl_user >= 12
     * $query->filterByFkAclUser(array('max' => 12)); // WHERE fk_acl_user <= 12
     * </code>
     *
     * @see       filterByAclUser()
     *
     * @param     mixed $fkAclUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkAclUser($fkAclUser = null, $comparison = null)
    {
        if (is_array($fkAclUser)) {
            $useMinMax = false;
            if (isset($fkAclUser['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_ACL_USER, $fkAclUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclUser['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_ACL_USER, $fkAclUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_ACL_USER, $fkAclUser, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByLocked($locked = null, $comparison = null)
    {
        if (is_string($locked)) {
            $locked = in_array(strtolower($locked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::LOCKED, $locked, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderProcess(1234); // WHERE fk_sales_order_process = 1234
     * $query->filterByFkSalesOrderProcess(array(12, 34)); // WHERE fk_sales_order_process IN (12, 34)
     * $query->filterByFkSalesOrderProcess(array('min' => 12)); // WHERE fk_sales_order_process >= 12
     * $query->filterByFkSalesOrderProcess(array('max' => 12)); // WHERE fk_sales_order_process <= 12
     * </code>
     *
     * @see       filterByProcess()
     *
     * @param     mixed $fkSalesOrderProcess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderProcess($fkSalesOrderProcess = null, $comparison = null)
    {
        if (is_array($fkSalesOrderProcess)) {
            $useMinMax = false;
            if (isset($fkSalesOrderProcess['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderProcess['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_PROCESS, $fkSalesOrderProcess, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::EVENT, $event, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::HOSTNAME, $hostname, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::MODULE, $module, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CONTROLLER, $controller, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the params column
     *
     * @param     array $params The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByParams($params = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::PARAMS);
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::PARAMS, $params, $comparison);
    }

    /**
     * Filter the query on the params column
     * @param     mixed $params The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::PARAMS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $params, $comparison);
            } else {
                $this->addAnd($key, $params, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::PARAMS, $params, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::SOURCE_STATE, $sourceState, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::TARGET_STATE, $targetState, $comparison);
    }

    /**
     * Filter the query on the commands column
     *
     * @param     array $commands The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCommands($commands = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::COMMANDS);
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the commands column
     * @param     mixed $commands The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::COMMANDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $commands, $comparison);
            } else {
                $this->addAnd($key, $commands, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the conditions column
     *
     * @param     array $conditions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByConditions($conditions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CONDITIONS);
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the conditions column
     * @param     mixed $conditions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CONDITIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $conditions, $comparison);
            } else {
                $this->addAnd($key, $conditions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CONDITIONS, $conditions, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (is_string($error)) {
            $error = in_array(strtolower($error), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ERROR, $error, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ERROR_MESSAGE, $errorMessage, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
     * Use the Order relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
     * Use the OrderItem relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclUser|PropelObjectCollection $pacAclUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUser($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_ACL_USER, $pacAclUser->getIdAclUser(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_ACL_USER, $pacAclUser->toKeyValue('PrimaryKey', 'IdAclUser'), $comparison);
        } else {
            throw new PropelException('filterByAclUser() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function joinAclUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclUser');

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
            $this->addJoinObject($join, 'AclUser');
        }

        return $this;
    }

    /**
     * Use the AclUser relation PacAclUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAclUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUser', 'ProjectA_Zed_Acl_Persistence_PacAclUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess|PropelObjectCollection $pacSalesOrderProcess The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProcess($pacSalesOrderProcess, $comparison = null)
    {
        if ($pacSalesOrderProcess instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_PROCESS, $pacSalesOrderProcess->getIdSalesOrderProcess(), $comparison);
        } elseif ($pacSalesOrderProcess instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::FK_SALES_ORDER_PROCESS, $pacSalesOrderProcess->toKeyValue('PrimaryKey', 'IdSalesOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
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
     * Use the Process relation PacSalesOrderProcess object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog $pacSalesOrderItemTransitionLog Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderItemTransitionLog = null)
    {
        if ($pacSalesOrderItemTransitionLog) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::ID_SALES_ORDER_ITEM_TRANSITION_LOG, $pacSalesOrderItemTransitionLog->getIdSalesOrderItemTransitionLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLogPeer::CREATED_AT);
    }
}
