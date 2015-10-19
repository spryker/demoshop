<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayoneTransactionStatusLog as ChildSpyPaymentPayoneTransactionStatusLog;
use Propel\SpyPaymentPayoneTransactionStatusLogQuery as ChildSpyPaymentPayoneTransactionStatusLogQuery;
use Propel\Map\SpyPaymentPayoneTransactionStatusLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payone_transaction_status_log' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByIdPaymentPayoneTransactionStatusLog($order = Criteria::ASC) Order by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByFkPaymentPayone($order = Criteria::ASC) Order by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByTransactionId($order = Criteria::ASC) Order by the transaction_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByReferenceId($order = Criteria::ASC) Order by the reference_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByMode($order = Criteria::ASC) Order by the mode column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByTransactionTime($order = Criteria::ASC) Order by the transaction_time column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderBySequenceNumber($order = Criteria::ASC) Order by the sequence_number column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByClearingType($order = Criteria::ASC) Order by the clearing_type column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByPortalId($order = Criteria::ASC) Order by the portal_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByReceivable($order = Criteria::ASC) Order by the receivable column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByReminderLevel($order = Criteria::ASC) Order by the reminder_level column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByIdPaymentPayoneTransactionStatusLog() Group by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByFkPaymentPayone() Group by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByTransactionId() Group by the transaction_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByReferenceId() Group by the reference_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByMode() Group by the mode column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByStatus() Group by the status column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByTransactionTime() Group by the transaction_time column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupBySequenceNumber() Group by the sequence_number column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByClearingType() Group by the clearing_type column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByPortalId() Group by the portal_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByPrice() Group by the price column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByBalance() Group by the balance column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByReceivable() Group by the receivable column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByReminderLevel() Group by the reminder_level column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery leftJoinSpyPaymentPayone($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery rightJoinSpyPaymentPayone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery innerJoinSpyPaymentPayone($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayone relation
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery leftJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery rightJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 * @method     ChildSpyPaymentPayoneTransactionStatusLogQuery innerJoinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
 *
 * @method     \Propel\SpyPaymentPayoneQuery|\Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLog matching the query
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLog matching the query, or a new ChildSpyPaymentPayoneTransactionStatusLog object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByFkPaymentPayone(int $fk_payment_payone) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByTransactionId(int $transaction_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the transaction_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByReferenceId(int $reference_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the reference_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByMode(string $mode) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the mode column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByStatus(string $status) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the status column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByTransactionTime(string $transaction_time) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the transaction_time column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneBySequenceNumber(int $sequence_number) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the sequence_number column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByClearingType(string $clearing_type) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the clearing_type column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByPortalId(string $portal_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the portal_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByPrice(int $price) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the price column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByBalance(int $balance) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the balance column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByReceivable(int $receivable) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the receivable column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByReminderLevel(string $reminder_level) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the reminder_level column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the created_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the updated_at column *

 * @method     ChildSpyPaymentPayoneTransactionStatusLog requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayoneTransactionStatusLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneTransactionStatusLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the id_payment_payone_transaction_status_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByFkPaymentPayone(int $fk_payment_payone) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the fk_payment_payone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByTransactionId(int $transaction_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByReferenceId(int $reference_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the reference_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByMode(string $mode) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the mode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByStatus(string $status) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByTransactionTime(string $transaction_time) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the transaction_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneBySequenceNumber(int $sequence_number) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the sequence_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByClearingType(string $clearing_type) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the clearing_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByPortalId(string $portal_id) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the portal_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByPrice(int $price) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByBalance(int $balance) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByReceivable(int $receivable) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the receivable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByReminderLevel(string $reminder_level) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the reminder_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneTransactionStatusLog requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneTransactionStatusLog filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayoneTransactionStatusLog objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByIdPaymentPayoneTransactionStatusLog(int $id_payment_payone_transaction_status_log) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the id_payment_payone_transaction_status_log column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByFkPaymentPayone(int $fk_payment_payone) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByTransactionId(int $transaction_id) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the transaction_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByReferenceId(int $reference_id) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the reference_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByMode(string $mode) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the mode column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByStatus(string $status) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the status column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByTransactionTime(string $transaction_time) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the transaction_time column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findBySequenceNumber(int $sequence_number) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the sequence_number column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByClearingType(string $clearing_type) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the clearing_type column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByPortalId(string $portal_id) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the portal_id column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByPrice(int $price) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the price column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByBalance(int $balance) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the balance column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByReceivable(int $receivable) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the receivable column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByReminderLevel(string $reminder_level) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the reminder_level column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the created_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayoneTransactionStatusLog objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayoneTransactionStatusLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayoneTransactionStatusLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayoneTransactionStatusLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayoneTransactionStatusLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayoneTransactionStatusLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayoneTransactionStatusLogQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayoneTransactionStatusLogQuery();
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
     * @return ChildSpyPaymentPayoneTransactionStatusLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayoneTransactionStatusLogTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneTransactionStatusLogTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayoneTransactionStatusLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payone_transaction_status_log, fk_payment_payone, transaction_id, reference_id, mode, status, transaction_time, sequence_number, clearing_type, portal_id, price, balance, receivable, reminder_level, created_at, updated_at FROM spy_payment_payone_transaction_status_log WHERE id_payment_payone_transaction_status_log = :p0';
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
            /** @var ChildSpyPaymentPayoneTransactionStatusLog $obj */
            $obj = new ChildSpyPaymentPayoneTransactionStatusLog();
            $obj->hydrate($row);
            SpyPaymentPayoneTransactionStatusLogTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayoneTransactionStatusLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $keys, Criteria::IN);
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
     * @param     mixed $idPaymentPayoneTransactionStatusLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayoneTransactionStatusLog($idPaymentPayoneTransactionStatusLog = null, $comparison = null)
    {
        if (is_array($idPaymentPayoneTransactionStatusLog)) {
            $useMinMax = false;
            if (isset($idPaymentPayoneTransactionStatusLog['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayoneTransactionStatusLog['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $idPaymentPayoneTransactionStatusLog, $comparison);
    }

    /**
     * Filter the query on the fk_payment_payone column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPaymentPayone(1234); // WHERE fk_payment_payone = 1234
     * $query->filterByFkPaymentPayone(array(12, 34)); // WHERE fk_payment_payone IN (12, 34)
     * $query->filterByFkPaymentPayone(array('min' => 12)); // WHERE fk_payment_payone > 12
     * </code>
     *
     * @see       filterBySpyPaymentPayone()
     *
     * @param     mixed $fkPaymentPayone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByFkPaymentPayone($fkPaymentPayone = null, $comparison = null)
    {
        if (is_array($fkPaymentPayone)) {
            $useMinMax = false;
            if (isset($fkPaymentPayone['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentPayone['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone, $comparison);
    }

    /**
     * Filter the query on the transaction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransactionId(1234); // WHERE transaction_id = 1234
     * $query->filterByTransactionId(array(12, 34)); // WHERE transaction_id IN (12, 34)
     * $query->filterByTransactionId(array('min' => 12)); // WHERE transaction_id > 12
     * </code>
     *
     * @param     mixed $transactionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByTransactionId($transactionId = null, $comparison = null)
    {
        if (is_array($transactionId)) {
            $useMinMax = false;
            if (isset($transactionId['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_ID, $transactionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transactionId['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_ID, $transactionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_ID, $transactionId, $comparison);
    }

    /**
     * Filter the query on the reference_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReferenceId(1234); // WHERE reference_id = 1234
     * $query->filterByReferenceId(array(12, 34)); // WHERE reference_id IN (12, 34)
     * $query->filterByReferenceId(array('min' => 12)); // WHERE reference_id > 12
     * </code>
     *
     * @param     mixed $referenceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByReferenceId($referenceId = null, $comparison = null)
    {
        if (is_array($referenceId)) {
            $useMinMax = false;
            if (isset($referenceId['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_REFERENCE_ID, $referenceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($referenceId['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_REFERENCE_ID, $referenceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_REFERENCE_ID, $referenceId, $comparison);
    }

    /**
     * Filter the query on the mode column
     *
     * Example usage:
     * <code>
     * $query->filterByMode('fooValue');   // WHERE mode = 'fooValue'
     * $query->filterByMode('%fooValue%'); // WHERE mode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByMode($mode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mode)) {
                $mode = str_replace('*', '%', $mode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_MODE, $mode, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the transaction_time column
     *
     * Example usage:
     * <code>
     * $query->filterByTransactionTime('2011-03-14'); // WHERE transaction_time = '2011-03-14'
     * $query->filterByTransactionTime('now'); // WHERE transaction_time = '2011-03-14'
     * $query->filterByTransactionTime(array('max' => 'yesterday')); // WHERE transaction_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $transactionTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByTransactionTime($transactionTime = null, $comparison = null)
    {
        if (is_array($transactionTime)) {
            $useMinMax = false;
            if (isset($transactionTime['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_TIME, $transactionTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transactionTime['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_TIME, $transactionTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_TRANSACTION_TIME, $transactionTime, $comparison);
    }

    /**
     * Filter the query on the sequence_number column
     *
     * Example usage:
     * <code>
     * $query->filterBySequenceNumber(1234); // WHERE sequence_number = 1234
     * $query->filterBySequenceNumber(array(12, 34)); // WHERE sequence_number IN (12, 34)
     * $query->filterBySequenceNumber(array('min' => 12)); // WHERE sequence_number > 12
     * </code>
     *
     * @param     mixed $sequenceNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterBySequenceNumber($sequenceNumber = null, $comparison = null)
    {
        if (is_array($sequenceNumber)) {
            $useMinMax = false;
            if (isset($sequenceNumber['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequenceNumber['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber, $comparison);
    }

    /**
     * Filter the query on the clearing_type column
     *
     * Example usage:
     * <code>
     * $query->filterByClearingType('fooValue');   // WHERE clearing_type = 'fooValue'
     * $query->filterByClearingType('%fooValue%'); // WHERE clearing_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clearingType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByClearingType($clearingType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clearingType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clearingType)) {
                $clearingType = str_replace('*', '%', $clearingType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CLEARING_TYPE, $clearingType, $comparison);
    }

    /**
     * Filter the query on the portal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPortalId('fooValue');   // WHERE portal_id = 'fooValue'
     * $query->filterByPortalId('%fooValue%'); // WHERE portal_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $portalId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPortalId($portalId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($portalId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $portalId)) {
                $portalId = str_replace('*', '%', $portalId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_PORTAL_ID, $portalId, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance > 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the receivable column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivable(1234); // WHERE receivable = 1234
     * $query->filterByReceivable(array(12, 34)); // WHERE receivable IN (12, 34)
     * $query->filterByReceivable(array('min' => 12)); // WHERE receivable > 12
     * </code>
     *
     * @param     mixed $receivable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByReceivable($receivable = null, $comparison = null)
    {
        if (is_array($receivable)) {
            $useMinMax = false;
            if (isset($receivable['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_RECEIVABLE, $receivable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receivable['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_RECEIVABLE, $receivable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_RECEIVABLE, $receivable, $comparison);
    }

    /**
     * Filter the query on the reminder_level column
     *
     * Example usage:
     * <code>
     * $query->filterByReminderLevel('fooValue');   // WHERE reminder_level = 'fooValue'
     * $query->filterByReminderLevel('%fooValue%'); // WHERE reminder_level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reminderLevel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByReminderLevel($reminderLevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reminderLevel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reminderLevel)) {
                $reminderLevel = str_replace('*', '%', $reminderLevel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_REMINDER_LEVEL, $reminderLevel, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayone object
     *
     * @param \Propel\SpyPaymentPayone|ObjectCollection $spyPaymentPayone The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayone($spyPaymentPayone, $comparison = null)
    {
        if ($spyPaymentPayone instanceof \Propel\SpyPaymentPayone) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYONE, $spyPaymentPayone->getIdPaymentPayone(), $comparison);
        } elseif ($spyPaymentPayone instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYONE, $spyPaymentPayone->toKeyValue('PrimaryKey', 'IdPaymentPayone'), $comparison);
        } else {
            throw new PropelException('filterBySpyPaymentPayone() only accepts arguments of type \Propel\SpyPaymentPayone or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayone($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayone');

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
            $this->addJoinObject($join, 'SpyPaymentPayone');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayone relation SpyPaymentPayone object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayoneQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayoneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayone', '\Propel\SpyPaymentPayoneQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem object
     *
     * @param \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem|ObjectCollection $spyPaymentPayoneTransactionStatusLogOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayoneTransactionStatusLogOrderItem($spyPaymentPayoneTransactionStatusLogOrderItem, $comparison = null)
    {
        if ($spyPaymentPayoneTransactionStatusLogOrderItem instanceof \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $spyPaymentPayoneTransactionStatusLogOrderItem->getIdPaymentPayoneTransactionStatusLog(), $comparison);
        } elseif ($spyPaymentPayoneTransactionStatusLogOrderItem instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayoneTransactionStatusLogOrderItemQuery()
                ->filterByPrimaryKeys($spyPaymentPayoneTransactionStatusLogOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayoneTransactionStatusLogOrderItem() only accepts arguments of type \Propel\SpyPaymentPayoneTransactionStatusLogOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayoneTransactionStatusLogOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayoneTransactionStatusLogOrderItem');

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
            $this->addJoinObject($join, 'SpyPaymentPayoneTransactionStatusLogOrderItem');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayoneTransactionStatusLogOrderItem relation SpyPaymentPayoneTransactionStatusLogOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayoneTransactionStatusLogOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayoneTransactionStatusLogOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayoneTransactionStatusLogOrderItem', '\Propel\SpyPaymentPayoneTransactionStatusLogOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayoneTransactionStatusLog $spyPaymentPayoneTransactionStatusLog Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayoneTransactionStatusLog = null)
    {
        if ($spyPaymentPayoneTransactionStatusLog) {
            $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYONE_TRANSACTION_STATUS_LOG, $spyPaymentPayoneTransactionStatusLog->getIdPaymentPayoneTransactionStatusLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payone_transaction_status_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneTransactionStatusLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayoneTransactionStatusLogTableMap::clearInstancePool();
            SpyPaymentPayoneTransactionStatusLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneTransactionStatusLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayoneTransactionStatusLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayoneTransactionStatusLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayoneTransactionStatusLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayoneTransactionStatusLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneTransactionStatusLogTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayoneTransactionStatusLogQuery
