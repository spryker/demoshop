<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayolutionTransactionStatusLog as ChildSpyPaymentPayolutionTransactionStatusLog;
use Propel\SpyPaymentPayolutionTransactionStatusLogQuery as ChildSpyPaymentPayolutionTransactionStatusLogQuery;
use Propel\Map\SpyPaymentPayolutionTransactionStatusLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payolution_transaction_status_log' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByIdPaymentPayolutionTransactionStatusLog($order = Criteria::ASC) Order by the id_payment_payolution_transaction_status_log column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByFkPaymentPayolution($order = Criteria::ASC) Order by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingCode($order = Criteria::ASC) Order by the processing_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingResult($order = Criteria::ASC) Order by the processing_result column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingStatus($order = Criteria::ASC) Order by the processing_status column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingStatusCode($order = Criteria::ASC) Order by the processing_status_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingReason($order = Criteria::ASC) Order by the processing_reason column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingReasonCode($order = Criteria::ASC) Order by the processing_reason_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingReturn($order = Criteria::ASC) Order by the processing_return column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingReturnCode($order = Criteria::ASC) Order by the processing_return_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByIdentificationTransactionid($order = Criteria::ASC) Order by the identification_transactionid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByIdentificationUniqueid($order = Criteria::ASC) Order by the identification_uniqueid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByIdentificationShortid($order = Criteria::ASC) Order by the identification_shortid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByIdentificationReferenceid($order = Criteria::ASC) Order by the identification_referenceid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingConnectordetailConnectortxid1($order = Criteria::ASC) Order by the processing_connectordetail_connectortxid1 column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingConnectordetailPaymentreference($order = Criteria::ASC) Order by the processing_connectordetail_paymentreference column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByProcessingTimestamp($order = Criteria::ASC) Order by the processing_timestamp column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByIdPaymentPayolutionTransactionStatusLog() Group by the id_payment_payolution_transaction_status_log column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByFkPaymentPayolution() Group by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingCode() Group by the processing_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingResult() Group by the processing_result column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingStatus() Group by the processing_status column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingStatusCode() Group by the processing_status_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingReason() Group by the processing_reason column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingReasonCode() Group by the processing_reason_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingReturn() Group by the processing_return column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingReturnCode() Group by the processing_return_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByIdentificationTransactionid() Group by the identification_transactionid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByIdentificationUniqueid() Group by the identification_uniqueid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByIdentificationShortid() Group by the identification_shortid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByIdentificationReferenceid() Group by the identification_referenceid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingConnectordetailConnectortxid1() Group by the processing_connectordetail_connectortxid1 column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingConnectordetailPaymentreference() Group by the processing_connectordetail_paymentreference column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByProcessingTimestamp() Group by the processing_timestamp column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery leftJoinSpyPaymentPayolution($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery rightJoinSpyPaymentPayolution($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery innerJoinSpyPaymentPayolution($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolution relation
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery leftJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery rightJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 * @method     ChildSpyPaymentPayolutionTransactionStatusLogQuery innerJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 *
 * @method     \Propel\SpyPaymentPayolutionQuery|\Propel\SpyPaymentPayolutionTransactionRequestLogQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionStatusLog matching the query
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionStatusLog matching the query, or a new ChildSpyPaymentPayolutionTransactionStatusLog object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByIdPaymentPayolutionTransactionStatusLog(int $id_payment_payolution_transaction_status_log) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the id_payment_payolution_transaction_status_log column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingCode(string $processing_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingResult(string $processing_result) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_result column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingStatus(string $processing_status) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_status column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingStatusCode(int $processing_status_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_status_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingReason(string $processing_reason) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_reason column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingReasonCode(int $processing_reason_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_reason_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingReturn(string $processing_return) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_return column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingReturnCode(string $processing_return_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_return_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByIdentificationTransactionid(string $identification_transactionid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_transactionid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByIdentificationUniqueid(string $identification_uniqueid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_uniqueid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByIdentificationShortid(string $identification_shortid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_shortid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByIdentificationReferenceid(string $identification_referenceid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_referenceid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingConnectordetailConnectortxid1(string $processing_connectordetail_connectortxid1) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_connectordetail_connectortxid1 column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingConnectordetailPaymentreference(string $processing_connectordetail_paymentreference) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_connectordetail_paymentreference column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByProcessingTimestamp(string $processing_timestamp) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_timestamp column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the updated_at column *

 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayolutionTransactionStatusLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionStatusLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByIdPaymentPayolutionTransactionStatusLog(int $id_payment_payolution_transaction_status_log) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the id_payment_payolution_transaction_status_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the fk_payment_payolution column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingCode(string $processing_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingResult(string $processing_result) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_result column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingStatus(string $processing_status) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingStatusCode(int $processing_status_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_status_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingReason(string $processing_reason) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_reason column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingReasonCode(int $processing_reason_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_reason_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingReturn(string $processing_return) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_return column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingReturnCode(string $processing_return_code) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_return_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByIdentificationTransactionid(string $identification_transactionid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_transactionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByIdentificationUniqueid(string $identification_uniqueid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_uniqueid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByIdentificationShortid(string $identification_shortid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_shortid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByIdentificationReferenceid(string $identification_referenceid) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the identification_referenceid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingConnectordetailConnectortxid1(string $processing_connectordetail_connectortxid1) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_connectordetail_connectortxid1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingConnectordetailPaymentreference(string $processing_connectordetail_paymentreference) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_connectordetail_paymentreference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByProcessingTimestamp(string $processing_timestamp) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the processing_timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolutionTransactionStatusLog filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayolutionTransactionStatusLog objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByIdPaymentPayolutionTransactionStatusLog(int $id_payment_payolution_transaction_status_log) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the id_payment_payolution_transaction_status_log column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByFkPaymentPayolution(int $fk_payment_payolution) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingCode(string $processing_code) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingResult(string $processing_result) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_result column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingStatus(string $processing_status) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_status column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingStatusCode(int $processing_status_code) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_status_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingReason(string $processing_reason) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_reason column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingReasonCode(int $processing_reason_code) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_reason_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingReturn(string $processing_return) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_return column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingReturnCode(string $processing_return_code) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_return_code column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByIdentificationTransactionid(string $identification_transactionid) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the identification_transactionid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByIdentificationUniqueid(string $identification_uniqueid) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the identification_uniqueid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByIdentificationShortid(string $identification_shortid) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the identification_shortid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByIdentificationReferenceid(string $identification_referenceid) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the identification_referenceid column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingConnectordetailConnectortxid1(string $processing_connectordetail_connectortxid1) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_connectordetail_connectortxid1 column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingConnectordetailPaymentreference(string $processing_connectordetail_paymentreference) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_connectordetail_paymentreference column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByProcessingTimestamp(string $processing_timestamp) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the processing_timestamp column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayolutionTransactionStatusLog objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayolutionTransactionStatusLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayolutionTransactionStatusLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayolutionTransactionStatusLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayolutionTransactionStatusLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayolutionTransactionStatusLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayolutionTransactionStatusLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayolutionTransactionStatusLogQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayolutionTransactionStatusLogQuery();
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
     * @return ChildSpyPaymentPayolutionTransactionStatusLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayolutionTransactionStatusLogTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayolutionTransactionStatusLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payolution_transaction_status_log, fk_payment_payolution, processing_code, processing_result, processing_status, processing_status_code, processing_reason, processing_reason_code, processing_return, processing_return_code, identification_transactionid, identification_uniqueid, identification_shortid, identification_referenceid, processing_connectordetail_connectortxid1, processing_connectordetail_paymentreference, processing_timestamp, created_at, updated_at FROM spy_payment_payolution_transaction_status_log WHERE id_payment_payolution_transaction_status_log = :p0';
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
            /** @var ChildSpyPaymentPayolutionTransactionStatusLog $obj */
            $obj = new ChildSpyPaymentPayolutionTransactionStatusLog();
            $obj->hydrate($row);
            SpyPaymentPayolutionTransactionStatusLogTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayolutionTransactionStatusLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_payolution_transaction_status_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayolutionTransactionStatusLog(1234); // WHERE id_payment_payolution_transaction_status_log = 1234
     * $query->filterByIdPaymentPayolutionTransactionStatusLog(array(12, 34)); // WHERE id_payment_payolution_transaction_status_log IN (12, 34)
     * $query->filterByIdPaymentPayolutionTransactionStatusLog(array('min' => 12)); // WHERE id_payment_payolution_transaction_status_log > 12
     * </code>
     *
     * @param     mixed $idPaymentPayolutionTransactionStatusLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayolutionTransactionStatusLog($idPaymentPayolutionTransactionStatusLog = null, $comparison = null)
    {
        if (is_array($idPaymentPayolutionTransactionStatusLog)) {
            $useMinMax = false;
            if (isset($idPaymentPayolutionTransactionStatusLog['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $idPaymentPayolutionTransactionStatusLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayolutionTransactionStatusLog['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $idPaymentPayolutionTransactionStatusLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $idPaymentPayolutionTransactionStatusLog, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByFkPaymentPayolution($fkPaymentPayolution = null, $comparison = null)
    {
        if (is_array($fkPaymentPayolution)) {
            $useMinMax = false;
            if (isset($fkPaymentPayolution['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentPayolution['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution, $comparison);
    }

    /**
     * Filter the query on the processing_code column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingCode('fooValue');   // WHERE processing_code = 'fooValue'
     * $query->filterByProcessingCode('%fooValue%'); // WHERE processing_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingCode($processingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingCode)) {
                $processingCode = str_replace('*', '%', $processingCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE, $processingCode, $comparison);
    }

    /**
     * Filter the query on the processing_result column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingResult('fooValue');   // WHERE processing_result = 'fooValue'
     * $query->filterByProcessingResult('%fooValue%'); // WHERE processing_result LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingResult The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingResult($processingResult = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingResult)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingResult)) {
                $processingResult = str_replace('*', '%', $processingResult);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT, $processingResult, $comparison);
    }

    /**
     * Filter the query on the processing_status column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingStatus('fooValue');   // WHERE processing_status = 'fooValue'
     * $query->filterByProcessingStatus('%fooValue%'); // WHERE processing_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingStatus($processingStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingStatus)) {
                $processingStatus = str_replace('*', '%', $processingStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS, $processingStatus, $comparison);
    }

    /**
     * Filter the query on the processing_status_code column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingStatusCode(1234); // WHERE processing_status_code = 1234
     * $query->filterByProcessingStatusCode(array(12, 34)); // WHERE processing_status_code IN (12, 34)
     * $query->filterByProcessingStatusCode(array('min' => 12)); // WHERE processing_status_code > 12
     * </code>
     *
     * @param     mixed $processingStatusCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingStatusCode($processingStatusCode = null, $comparison = null)
    {
        if (is_array($processingStatusCode)) {
            $useMinMax = false;
            if (isset($processingStatusCode['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE, $processingStatusCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($processingStatusCode['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE, $processingStatusCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE, $processingStatusCode, $comparison);
    }

    /**
     * Filter the query on the processing_reason column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingReason('fooValue');   // WHERE processing_reason = 'fooValue'
     * $query->filterByProcessingReason('%fooValue%'); // WHERE processing_reason LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingReason The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingReason($processingReason = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingReason)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingReason)) {
                $processingReason = str_replace('*', '%', $processingReason);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON, $processingReason, $comparison);
    }

    /**
     * Filter the query on the processing_reason_code column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingReasonCode(1234); // WHERE processing_reason_code = 1234
     * $query->filterByProcessingReasonCode(array(12, 34)); // WHERE processing_reason_code IN (12, 34)
     * $query->filterByProcessingReasonCode(array('min' => 12)); // WHERE processing_reason_code > 12
     * </code>
     *
     * @param     mixed $processingReasonCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingReasonCode($processingReasonCode = null, $comparison = null)
    {
        if (is_array($processingReasonCode)) {
            $useMinMax = false;
            if (isset($processingReasonCode['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE, $processingReasonCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($processingReasonCode['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE, $processingReasonCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE, $processingReasonCode, $comparison);
    }

    /**
     * Filter the query on the processing_return column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingReturn('fooValue');   // WHERE processing_return = 'fooValue'
     * $query->filterByProcessingReturn('%fooValue%'); // WHERE processing_return LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingReturn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingReturn($processingReturn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingReturn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingReturn)) {
                $processingReturn = str_replace('*', '%', $processingReturn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN, $processingReturn, $comparison);
    }

    /**
     * Filter the query on the processing_return_code column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingReturnCode('fooValue');   // WHERE processing_return_code = 'fooValue'
     * $query->filterByProcessingReturnCode('%fooValue%'); // WHERE processing_return_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingReturnCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingReturnCode($processingReturnCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingReturnCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingReturnCode)) {
                $processingReturnCode = str_replace('*', '%', $processingReturnCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE, $processingReturnCode, $comparison);
    }

    /**
     * Filter the query on the identification_transactionid column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificationTransactionid('fooValue');   // WHERE identification_transactionid = 'fooValue'
     * $query->filterByIdentificationTransactionid('%fooValue%'); // WHERE identification_transactionid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificationTransactionid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdentificationTransactionid($identificationTransactionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificationTransactionid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificationTransactionid)) {
                $identificationTransactionid = str_replace('*', '%', $identificationTransactionid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID, $identificationTransactionid, $comparison);
    }

    /**
     * Filter the query on the identification_uniqueid column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificationUniqueid('fooValue');   // WHERE identification_uniqueid = 'fooValue'
     * $query->filterByIdentificationUniqueid('%fooValue%'); // WHERE identification_uniqueid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificationUniqueid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdentificationUniqueid($identificationUniqueid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificationUniqueid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificationUniqueid)) {
                $identificationUniqueid = str_replace('*', '%', $identificationUniqueid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID, $identificationUniqueid, $comparison);
    }

    /**
     * Filter the query on the identification_shortid column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificationShortid('fooValue');   // WHERE identification_shortid = 'fooValue'
     * $query->filterByIdentificationShortid('%fooValue%'); // WHERE identification_shortid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificationShortid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdentificationShortid($identificationShortid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificationShortid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificationShortid)) {
                $identificationShortid = str_replace('*', '%', $identificationShortid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID, $identificationShortid, $comparison);
    }

    /**
     * Filter the query on the identification_referenceid column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentificationReferenceid('fooValue');   // WHERE identification_referenceid = 'fooValue'
     * $query->filterByIdentificationReferenceid('%fooValue%'); // WHERE identification_referenceid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identificationReferenceid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByIdentificationReferenceid($identificationReferenceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identificationReferenceid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identificationReferenceid)) {
                $identificationReferenceid = str_replace('*', '%', $identificationReferenceid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID, $identificationReferenceid, $comparison);
    }

    /**
     * Filter the query on the processing_connectordetail_connectortxid1 column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingConnectordetailConnectortxid1('fooValue');   // WHERE processing_connectordetail_connectortxid1 = 'fooValue'
     * $query->filterByProcessingConnectordetailConnectortxid1('%fooValue%'); // WHERE processing_connectordetail_connectortxid1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingConnectordetailConnectortxid1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingConnectordetailConnectortxid1($processingConnectordetailConnectortxid1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingConnectordetailConnectortxid1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingConnectordetailConnectortxid1)) {
                $processingConnectordetailConnectortxid1 = str_replace('*', '%', $processingConnectordetailConnectortxid1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1, $processingConnectordetailConnectortxid1, $comparison);
    }

    /**
     * Filter the query on the processing_connectordetail_paymentreference column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingConnectordetailPaymentreference('fooValue');   // WHERE processing_connectordetail_paymentreference = 'fooValue'
     * $query->filterByProcessingConnectordetailPaymentreference('%fooValue%'); // WHERE processing_connectordetail_paymentreference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingConnectordetailPaymentreference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingConnectordetailPaymentreference($processingConnectordetailPaymentreference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingConnectordetailPaymentreference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingConnectordetailPaymentreference)) {
                $processingConnectordetailPaymentreference = str_replace('*', '%', $processingConnectordetailPaymentreference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE, $processingConnectordetailPaymentreference, $comparison);
    }

    /**
     * Filter the query on the processing_timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessingTimestamp('fooValue');   // WHERE processing_timestamp = 'fooValue'
     * $query->filterByProcessingTimestamp('%fooValue%'); // WHERE processing_timestamp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processingTimestamp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByProcessingTimestamp($processingTimestamp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processingTimestamp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $processingTimestamp)) {
                $processingTimestamp = str_replace('*', '%', $processingTimestamp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP, $processingTimestamp, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayolution object
     *
     * @param \Propel\SpyPaymentPayolution|ObjectCollection $spyPaymentPayolution The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolution($spyPaymentPayolution, $comparison = null)
    {
        if ($spyPaymentPayolution instanceof \Propel\SpyPaymentPayolution) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->getIdPaymentPayolution(), $comparison);
        } elseif ($spyPaymentPayolution instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->toKeyValue('PrimaryKey', 'IdPaymentPayolution'), $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyPaymentPayolutionTransactionRequestLog object
     *
     * @param \Propel\SpyPaymentPayolutionTransactionRequestLog|ObjectCollection $spyPaymentPayolutionTransactionRequestLog The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionTransactionRequestLog($spyPaymentPayolutionTransactionRequestLog, $comparison = null)
    {
        if ($spyPaymentPayolutionTransactionRequestLog instanceof \Propel\SpyPaymentPayolutionTransactionRequestLog) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID, $spyPaymentPayolutionTransactionRequestLog->getTransactionId(), $comparison);
        } elseif ($spyPaymentPayolutionTransactionRequestLog instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID, $spyPaymentPayolutionTransactionRequestLog->toKeyValue('PrimaryKey', 'TransactionId'), $comparison);
        } else {
            throw new PropelException('filterBySpyPaymentPayolutionTransactionRequestLog() only accepts arguments of type \Propel\SpyPaymentPayolutionTransactionRequestLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolutionTransactionRequestLog');

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
            $this->addJoinObject($join, 'SpyPaymentPayolutionTransactionRequestLog');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolutionTransactionRequestLog relation SpyPaymentPayolutionTransactionRequestLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionTransactionRequestLogQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionTransactionRequestLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolutionTransactionRequestLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolutionTransactionRequestLog', '\Propel\SpyPaymentPayolutionTransactionRequestLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayolutionTransactionStatusLog $spyPaymentPayolutionTransactionStatusLog Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayolutionTransactionStatusLog = null)
    {
        if ($spyPaymentPayolutionTransactionStatusLog) {
            $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $spyPaymentPayolutionTransactionStatusLog->getIdPaymentPayolutionTransactionStatusLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payolution_transaction_status_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayolutionTransactionStatusLogTableMap::clearInstancePool();
            SpyPaymentPayolutionTransactionStatusLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayolutionTransactionStatusLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayolutionTransactionStatusLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayolutionTransactionStatusLogQuery
