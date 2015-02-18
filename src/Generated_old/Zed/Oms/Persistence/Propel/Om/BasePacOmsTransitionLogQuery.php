<?php


/**
 * Base class that represents a query for the 'pac_oms_transition_log' table.
 *
 *
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByIdOmsTransitionLog($order = Criteria::ASC) Order by the id_oms_transition_log column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByFkAclUser($order = Criteria::ASC) Order by the fk_acl_user column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByLocked($order = Criteria::ASC) Order by the locked column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByFkOmsOrderProcess($order = Criteria::ASC) Order by the fk_oms_order_process column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByHostname($order = Criteria::ASC) Order by the hostname column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByController($order = Criteria::ASC) Order by the controller column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByParams($order = Criteria::ASC) Order by the params column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderBySourceState($order = Criteria::ASC) Order by the source_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByTargetState($order = Criteria::ASC) Order by the target_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByCommands($order = Criteria::ASC) Order by the commands column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByConditions($order = Criteria::ASC) Order by the conditions column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByIdOmsTransitionLog() Group by the id_oms_transition_log column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByFkAclUser() Group by the fk_acl_user column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByLocked() Group by the locked column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByFkOmsOrderProcess() Group by the fk_oms_order_process column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByEvent() Group by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByHostname() Group by the hostname column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByModule() Group by the module column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByController() Group by the controller column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByAction() Group by the action column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByParams() Group by the params column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupBySourceState() Group by the source_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByTargetState() Group by the target_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByCommands() Group by the commands column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByConditions() Group by the conditions column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByError() Group by the error column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByErrorMessage() Group by the error_message column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery leftJoinAclUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery rightJoinAclUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUser relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery innerJoinAclUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUser relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery leftJoinProcess($relationAlias = null) Adds a LEFT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery rightJoinProcess($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Process relation
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery innerJoinProcess($relationAlias = null) Adds a INNER JOIN clause to the query using the Process relation
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog matching the query
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog matching the query, or a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the fk_sales_order column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByFkAclUser(int $fk_acl_user) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the fk_acl_user column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByLocked(boolean $locked) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the locked column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByFkOmsOrderProcess(int $fk_oms_order_process) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the fk_oms_order_process column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByEvent(string $event) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the event column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByHostname(string $hostname) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the hostname column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByModule(string $module) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the module column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByController(string $controller) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the controller column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByAction(string $action) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the action column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByParams(array $params) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the params column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneBySourceState(string $source_state) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the source_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByTargetState(string $target_state) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the target_state column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByCommands(array $commands) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the commands column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByConditions(array $conditions) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the conditions column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByError(boolean $error) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the error column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByErrorMessage(string $error_message) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the error_message column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the created_at column
 * @method ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog filtered by the updated_at column
 *
 * @method array findByIdOmsTransitionLog(int $id_oms_transition_log) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the id_oms_transition_log column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the fk_sales_order_item column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the fk_sales_order column
 * @method array findByFkAclUser(int $fk_acl_user) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the fk_acl_user column
 * @method array findByLocked(boolean $locked) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the locked column
 * @method array findByFkOmsOrderProcess(int $fk_oms_order_process) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the fk_oms_order_process column
 * @method array findByEvent(string $event) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the event column
 * @method array findByHostname(string $hostname) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the hostname column
 * @method array findByModule(string $module) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the module column
 * @method array findByController(string $controller) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the controller column
 * @method array findByAction(string $action) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the action column
 * @method array findByParams(array $params) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the params column
 * @method array findBySourceState(string $source_state) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the source_state column
 * @method array findByTargetState(string $target_state) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the target_state column
 * @method array findByCommands(array $commands) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the commands column
 * @method array findByConditions(array $conditions) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the conditions column
 * @method array findByError(boolean $error) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the error column
 * @method array findByErrorMessage(string $error_message) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the error_message column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.om
 */
abstract class Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsTransitionLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsTransitionLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacOmsTransitionLog']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdOmsTransitionLog($key, $con = null)
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
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_oms_transition_log`, `fk_sales_order_item`, `fk_sales_order`, `fk_acl_user`, `locked`, `fk_oms_order_process`, `event`, `hostname`, `module`, `controller`, `action`, `params`, `source_state`, `target_state`, `commands`, `conditions`, `error`, `error_message`, `created_at`, `updated_at` FROM `pac_oms_transition_log` WHERE `id_oms_transition_log` = :p0';
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
            $obj = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog();
            $obj->hydrate($row);
            ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_oms_transition_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOmsTransitionLog(1234); // WHERE id_oms_transition_log = 1234
     * $query->filterByIdOmsTransitionLog(array(12, 34)); // WHERE id_oms_transition_log IN (12, 34)
     * $query->filterByIdOmsTransitionLog(array('min' => 12)); // WHERE id_oms_transition_log >= 12
     * $query->filterByIdOmsTransitionLog(array('max' => 12)); // WHERE id_oms_transition_log <= 12
     * </code>
     *
     * @param     mixed $idOmsTransitionLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByIdOmsTransitionLog($idOmsTransitionLog = null, $comparison = null)
    {
        if (is_array($idOmsTransitionLog)) {
            $useMinMax = false;
            if (isset($idOmsTransitionLog['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $idOmsTransitionLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOmsTransitionLog['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $idOmsTransitionLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $idOmsTransitionLog, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkAclUser($fkAclUser = null, $comparison = null)
    {
        if (is_array($fkAclUser)) {
            $useMinMax = false;
            if (isset($fkAclUser['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $fkAclUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclUser['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $fkAclUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $fkAclUser, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByLocked($locked = null, $comparison = null)
    {
        if (is_string($locked)) {
            $locked = in_array(strtolower($locked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::LOCKED, $locked, $comparison);
    }

    /**
     * Filter the query on the fk_oms_order_process column
     *
     * Example usage:
     * <code>
     * $query->filterByFkOmsOrderProcess(1234); // WHERE fk_oms_order_process = 1234
     * $query->filterByFkOmsOrderProcess(array(12, 34)); // WHERE fk_oms_order_process IN (12, 34)
     * $query->filterByFkOmsOrderProcess(array('min' => 12)); // WHERE fk_oms_order_process >= 12
     * $query->filterByFkOmsOrderProcess(array('max' => 12)); // WHERE fk_oms_order_process <= 12
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByFkOmsOrderProcess($fkOmsOrderProcess = null, $comparison = null)
    {
        if (is_array($fkOmsOrderProcess)) {
            $useMinMax = false;
            if (isset($fkOmsOrderProcess['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkOmsOrderProcess['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $fkOmsOrderProcess, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::EVENT, $event, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::HOSTNAME, $hostname, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::MODULE, $module, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONTROLLER, $controller, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the params column
     *
     * @param     array $params The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByParams($params = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS);
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS, $params, $comparison);
    }

    /**
     * Filter the query on the params column
     * @param     mixed $params The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $params, $comparison);
            } else {
                $this->addAnd($key, $params, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS, $params, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::SOURCE_STATE, $sourceState, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::TARGET_STATE, $targetState, $comparison);
    }

    /**
     * Filter the query on the commands column
     *
     * @param     array $commands The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCommands($commands = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS);
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the commands column
     * @param     mixed $commands The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $commands, $comparison);
            } else {
                $this->addAnd($key, $commands, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS, $commands, $comparison);
    }

    /**
     * Filter the query on the conditions column
     *
     * @param     array $conditions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByConditions($conditions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS);
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS, $conditions, $comparison);
    }

    /**
     * Filter the query on the conditions column
     * @param     mixed $conditions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
            $key = $this->getAliasedColName(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $conditions, $comparison);
            } else {
                $this->addAnd($key, $conditions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS, $conditions, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (is_string($error)) {
            $error = in_array(strtolower($error), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR, $error, $comparison);
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR_MESSAGE, $errorMessage, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_Propel_PacAclUser|PropelObjectCollection $pacAclUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUser($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $pacAclUser->getIdAclUser(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $pacAclUser->toKeyValue('PrimaryKey', 'IdAclUser'), $comparison);
        } else {
            throw new PropelException('filterByAclUser() only accepts arguments of type ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAclUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUser', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess|PropelObjectCollection $pacOmsOrderProcess The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProcess($pacOmsOrderProcess, $comparison = null)
    {
        if ($pacOmsOrderProcess instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $pacOmsOrderProcess->getIdOmsOrderProcess(), $comparison);
        } elseif ($pacOmsOrderProcess instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $pacOmsOrderProcess->toKeyValue('PrimaryKey', 'IdOmsOrderProcess'), $comparison);
        } else {
            throw new PropelException('filterByProcess() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Process relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
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
     * Use the Process relation PacOmsOrderProcess object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery A secondary query class using the current class as primary query
     */
    public function useProcessQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProcess($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Process', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog $pacOmsTransitionLog Object to remove from the list of results
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function prune($pacOmsTransitionLog = null)
    {
        if ($pacOmsTransitionLog) {
            $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $pacOmsTransitionLog->getIdOmsTransitionLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT);
    }
}
