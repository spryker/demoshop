<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayoneApiLog as ChildSpyPaymentPayoneApiLog;
use Propel\SpyPaymentPayoneApiLogQuery as ChildSpyPaymentPayoneApiLogQuery;
use Propel\Map\SpyPaymentPayoneApiLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payone_api_log' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByIdPaymentPayoneApiLog($order = Criteria::ASC) Order by the id_payment_payone_api_log column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByFkPaymentPayone($order = Criteria::ASC) Order by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByRequest($order = Criteria::ASC) Order by the request column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByMode($order = Criteria::ASC) Order by the mode column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByTransactionId($order = Criteria::ASC) Order by the transaction_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderBySequenceNumber($order = Criteria::ASC) Order by the sequence_number column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByMerchantId($order = Criteria::ASC) Order by the merchant_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByPortalId($order = Criteria::ASC) Order by the portal_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByErrorCode($order = Criteria::ASC) Order by the error_code column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByErrorMessageInternal($order = Criteria::ASC) Order by the error_message_internal column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByErrorMessageUser($order = Criteria::ASC) Order by the error_message_user column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByRedirectUrl($order = Criteria::ASC) Order by the redirect_url column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayoneApiLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByIdPaymentPayoneApiLog() Group by the id_payment_payone_api_log column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByFkPaymentPayone() Group by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByRequest() Group by the request column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByMode() Group by the mode column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByStatus() Group by the status column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByTransactionId() Group by the transaction_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupBySequenceNumber() Group by the sequence_number column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByUserId() Group by the user_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByMerchantId() Group by the merchant_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByPortalId() Group by the portal_id column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByErrorCode() Group by the error_code column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByErrorMessageInternal() Group by the error_message_internal column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByErrorMessageUser() Group by the error_message_user column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByRedirectUrl() Group by the redirect_url column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayoneApiLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneApiLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneApiLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneApiLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayoneApiLogQuery leftJoinSpyPaymentPayone($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneApiLogQuery rightJoinSpyPaymentPayone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneApiLogQuery innerJoinSpyPaymentPayone($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayone relation
 *
 * @method     \Propel\SpyPaymentPayoneQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayoneApiLog findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneApiLog matching the query
 * @method     ChildSpyPaymentPayoneApiLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneApiLog matching the query, or a new ChildSpyPaymentPayoneApiLog object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayoneApiLog findOneByIdPaymentPayoneApiLog(int $id_payment_payone_api_log) Return the first ChildSpyPaymentPayoneApiLog filtered by the id_payment_payone_api_log column
 * @method     ChildSpyPaymentPayoneApiLog findOneByFkPaymentPayone(int $fk_payment_payone) Return the first ChildSpyPaymentPayoneApiLog filtered by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneApiLog findOneByRequest(string $request) Return the first ChildSpyPaymentPayoneApiLog filtered by the request column
 * @method     ChildSpyPaymentPayoneApiLog findOneByMode(string $mode) Return the first ChildSpyPaymentPayoneApiLog filtered by the mode column
 * @method     ChildSpyPaymentPayoneApiLog findOneByStatus(string $status) Return the first ChildSpyPaymentPayoneApiLog filtered by the status column
 * @method     ChildSpyPaymentPayoneApiLog findOneByTransactionId(int $transaction_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the transaction_id column
 * @method     ChildSpyPaymentPayoneApiLog findOneBySequenceNumber(int $sequence_number) Return the first ChildSpyPaymentPayoneApiLog filtered by the sequence_number column
 * @method     ChildSpyPaymentPayoneApiLog findOneByUserId(string $user_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the user_id column
 * @method     ChildSpyPaymentPayoneApiLog findOneByMerchantId(string $merchant_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the merchant_id column
 * @method     ChildSpyPaymentPayoneApiLog findOneByPortalId(string $portal_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the portal_id column
 * @method     ChildSpyPaymentPayoneApiLog findOneByErrorCode(string $error_code) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_code column
 * @method     ChildSpyPaymentPayoneApiLog findOneByErrorMessageInternal(string $error_message_internal) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_message_internal column
 * @method     ChildSpyPaymentPayoneApiLog findOneByErrorMessageUser(string $error_message_user) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_message_user column
 * @method     ChildSpyPaymentPayoneApiLog findOneByRedirectUrl(string $redirect_url) Return the first ChildSpyPaymentPayoneApiLog filtered by the redirect_url column
 * @method     ChildSpyPaymentPayoneApiLog findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneApiLog filtered by the created_at column
 * @method     ChildSpyPaymentPayoneApiLog findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneApiLog filtered by the updated_at column *

 * @method     ChildSpyPaymentPayoneApiLog requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayoneApiLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneApiLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneApiLog requireOneByIdPaymentPayoneApiLog(int $id_payment_payone_api_log) Return the first ChildSpyPaymentPayoneApiLog filtered by the id_payment_payone_api_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByFkPaymentPayone(int $fk_payment_payone) Return the first ChildSpyPaymentPayoneApiLog filtered by the fk_payment_payone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByRequest(string $request) Return the first ChildSpyPaymentPayoneApiLog filtered by the request column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByMode(string $mode) Return the first ChildSpyPaymentPayoneApiLog filtered by the mode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByStatus(string $status) Return the first ChildSpyPaymentPayoneApiLog filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByTransactionId(int $transaction_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneBySequenceNumber(int $sequence_number) Return the first ChildSpyPaymentPayoneApiLog filtered by the sequence_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByUserId(string $user_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByMerchantId(string $merchant_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the merchant_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByPortalId(string $portal_id) Return the first ChildSpyPaymentPayoneApiLog filtered by the portal_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByErrorCode(string $error_code) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByErrorMessageInternal(string $error_message_internal) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_message_internal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByErrorMessageUser(string $error_message_user) Return the first ChildSpyPaymentPayoneApiLog filtered by the error_message_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByRedirectUrl(string $redirect_url) Return the first ChildSpyPaymentPayoneApiLog filtered by the redirect_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneApiLog filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneApiLog requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneApiLog filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayoneApiLog objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByIdPaymentPayoneApiLog(int $id_payment_payone_api_log) Return ChildSpyPaymentPayoneApiLog objects filtered by the id_payment_payone_api_log column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByFkPaymentPayone(int $fk_payment_payone) Return ChildSpyPaymentPayoneApiLog objects filtered by the fk_payment_payone column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByRequest(string $request) Return ChildSpyPaymentPayoneApiLog objects filtered by the request column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByMode(string $mode) Return ChildSpyPaymentPayoneApiLog objects filtered by the mode column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByStatus(string $status) Return ChildSpyPaymentPayoneApiLog objects filtered by the status column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByTransactionId(int $transaction_id) Return ChildSpyPaymentPayoneApiLog objects filtered by the transaction_id column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findBySequenceNumber(int $sequence_number) Return ChildSpyPaymentPayoneApiLog objects filtered by the sequence_number column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByUserId(string $user_id) Return ChildSpyPaymentPayoneApiLog objects filtered by the user_id column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByMerchantId(string $merchant_id) Return ChildSpyPaymentPayoneApiLog objects filtered by the merchant_id column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByPortalId(string $portal_id) Return ChildSpyPaymentPayoneApiLog objects filtered by the portal_id column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByErrorCode(string $error_code) Return ChildSpyPaymentPayoneApiLog objects filtered by the error_code column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByErrorMessageInternal(string $error_message_internal) Return ChildSpyPaymentPayoneApiLog objects filtered by the error_message_internal column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByErrorMessageUser(string $error_message_user) Return ChildSpyPaymentPayoneApiLog objects filtered by the error_message_user column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByRedirectUrl(string $redirect_url) Return ChildSpyPaymentPayoneApiLog objects filtered by the redirect_url column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayoneApiLog objects filtered by the created_at column
 * @method     ChildSpyPaymentPayoneApiLog[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayoneApiLog objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayoneApiLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayoneApiLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayoneApiLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayoneApiLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayoneApiLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayoneApiLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayoneApiLogQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayoneApiLogQuery();
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
     * @return ChildSpyPaymentPayoneApiLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayoneApiLogTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayoneApiLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payone_api_log, fk_payment_payone, request, mode, status, transaction_id, sequence_number, user_id, merchant_id, portal_id, error_code, error_message_internal, error_message_user, redirect_url, created_at, updated_at FROM spy_payment_payone_api_log WHERE id_payment_payone_api_log = :p0';
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
            /** @var ChildSpyPaymentPayoneApiLog $obj */
            $obj = new ChildSpyPaymentPayoneApiLog();
            $obj->hydrate($row);
            SpyPaymentPayoneApiLogTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayoneApiLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_payone_api_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayoneApiLog(1234); // WHERE id_payment_payone_api_log = 1234
     * $query->filterByIdPaymentPayoneApiLog(array(12, 34)); // WHERE id_payment_payone_api_log IN (12, 34)
     * $query->filterByIdPaymentPayoneApiLog(array('min' => 12)); // WHERE id_payment_payone_api_log > 12
     * </code>
     *
     * @param     mixed $idPaymentPayoneApiLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayoneApiLog($idPaymentPayoneApiLog = null, $comparison = null)
    {
        if (is_array($idPaymentPayoneApiLog)) {
            $useMinMax = false;
            if (isset($idPaymentPayoneApiLog['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $idPaymentPayoneApiLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayoneApiLog['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $idPaymentPayoneApiLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $idPaymentPayoneApiLog, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByFkPaymentPayone($fkPaymentPayone = null, $comparison = null)
    {
        if (is_array($fkPaymentPayone)) {
            $useMinMax = false;
            if (isset($fkPaymentPayone['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentPayone['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $fkPaymentPayone, $comparison);
    }

    /**
     * Filter the query on the request column
     *
     * Example usage:
     * <code>
     * $query->filterByRequest('fooValue');   // WHERE request = 'fooValue'
     * $query->filterByRequest('%fooValue%'); // WHERE request LIKE '%fooValue%'
     * </code>
     *
     * @param     string $request The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByRequest($request = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($request)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $request)) {
                $request = str_replace('*', '%', $request);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_REQUEST, $request, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_MODE, $mode, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByTransactionId($transactionId = null, $comparison = null)
    {
        if (is_array($transactionId)) {
            $useMinMax = false;
            if (isset($transactionId['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID, $transactionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transactionId['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID, $transactionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID, $transactionId, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterBySequenceNumber($sequenceNumber = null, $comparison = null)
    {
        if (is_array($sequenceNumber)) {
            $useMinMax = false;
            if (isset($sequenceNumber['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequenceNumber['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER, $sequenceNumber, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId('fooValue');   // WHERE user_id = 'fooValue'
     * $query->filterByUserId('%fooValue%'); // WHERE user_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userId)) {
                $userId = str_replace('*', '%', $userId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the merchant_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMerchantId('fooValue');   // WHERE merchant_id = 'fooValue'
     * $query->filterByMerchantId('%fooValue%'); // WHERE merchant_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $merchantId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByMerchantId($merchantId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($merchantId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $merchantId)) {
                $merchantId = str_replace('*', '%', $merchantId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID, $merchantId, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID, $portalId, $comparison);
    }

    /**
     * Filter the query on the error_code column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorCode('fooValue');   // WHERE error_code = 'fooValue'
     * $query->filterByErrorCode('%fooValue%'); // WHERE error_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByErrorCode($errorCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $errorCode)) {
                $errorCode = str_replace('*', '%', $errorCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE, $errorCode, $comparison);
    }

    /**
     * Filter the query on the error_message_internal column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMessageInternal('fooValue');   // WHERE error_message_internal = 'fooValue'
     * $query->filterByErrorMessageInternal('%fooValue%'); // WHERE error_message_internal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMessageInternal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByErrorMessageInternal($errorMessageInternal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMessageInternal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $errorMessageInternal)) {
                $errorMessageInternal = str_replace('*', '%', $errorMessageInternal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL, $errorMessageInternal, $comparison);
    }

    /**
     * Filter the query on the error_message_user column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMessageUser('fooValue');   // WHERE error_message_user = 'fooValue'
     * $query->filterByErrorMessageUser('%fooValue%'); // WHERE error_message_user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMessageUser The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByErrorMessageUser($errorMessageUser = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMessageUser)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $errorMessageUser)) {
                $errorMessageUser = str_replace('*', '%', $errorMessageUser);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER, $errorMessageUser, $comparison);
    }

    /**
     * Filter the query on the redirect_url column
     *
     * Example usage:
     * <code>
     * $query->filterByRedirectUrl('fooValue');   // WHERE redirect_url = 'fooValue'
     * $query->filterByRedirectUrl('%fooValue%'); // WHERE redirect_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $redirectUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByRedirectUrl($redirectUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($redirectUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $redirectUrl)) {
                $redirectUrl = str_replace('*', '%', $redirectUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL, $redirectUrl, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayone object
     *
     * @param \Propel\SpyPaymentPayone|ObjectCollection $spyPaymentPayone The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayone($spyPaymentPayone, $comparison = null)
    {
        if ($spyPaymentPayone instanceof \Propel\SpyPaymentPayone) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $spyPaymentPayone->getIdPaymentPayone(), $comparison);
        } elseif ($spyPaymentPayone instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $spyPaymentPayone->toKeyValue('PrimaryKey', 'IdPaymentPayone'), $comparison);
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
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayoneApiLog $spyPaymentPayoneApiLog Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayoneApiLog = null)
    {
        if ($spyPaymentPayoneApiLog) {
            $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $spyPaymentPayoneApiLog->getIdPaymentPayoneApiLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payone_api_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayoneApiLogTableMap::clearInstancePool();
            SpyPaymentPayoneApiLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayoneApiLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayoneApiLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayoneApiLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayoneApiLogQuery
