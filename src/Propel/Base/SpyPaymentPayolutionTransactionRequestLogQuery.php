<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayolutionTransactionRequestLog as ChildSpyPaymentPayolutionTransactionRequestLog;
use Propel\SpyPaymentPayolutionTransactionRequestLogQuery as ChildSpyPaymentPayolutionTransactionRequestLogQuery;
use Propel\Map\SpyPaymentPayolutionTransactionRequestLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payolution_transaction_request_log' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByIdPaymentPayolutionTransactionRequestLog($order = Criteria::ASC) Order by the id_payment_payolution_transaction_request_log column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByFkPaymentPayolution($order = Criteria::ASC) Order by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByTransactionId($order = Criteria::ASC) Order by the transaction_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByReferenceId($order = Criteria::ASC) Order by the reference_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByPaymentCode($order = Criteria::ASC) Order by the payment_code column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByPresentationAmount($order = Criteria::ASC) Order by the presentation_amount column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByPresentationCurrency($order = Criteria::ASC) Order by the presentation_currency column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByIdPaymentPayolutionTransactionRequestLog() Group by the id_payment_payolution_transaction_request_log column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByFkPaymentPayolution() Group by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByTransactionId() Group by the transaction_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByReferenceId() Group by the reference_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByPaymentCode() Group by the payment_code column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByPresentationAmount() Group by the presentation_amount column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByPresentationCurrency() Group by the presentation_currency column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery leftJoinSpyPaymentPayolution($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery rightJoinSpyPaymentPayolution($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolution relation
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery innerJoinSpyPaymentPayolution($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolution relation
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery leftJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery rightJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 * @method     ChildSpyPaymentPayolutionTransactionRequestLogQuery innerJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 *
 * @method     \Propel\SpyPaymentPayolutionQuery|\Propel\SpyPaymentPayolutionTransactionStatusLogQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionRequestLog matching the query
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionRequestLog matching the query, or a new ChildSpyPaymentPayolutionTransactionRequestLog object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByIdPaymentPayolutionTransactionRequestLog(int $id_payment_payolution_transaction_request_log) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the id_payment_payolution_transaction_request_log column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByTransactionId(string $transaction_id) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the transaction_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByReferenceId(string $reference_id) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the reference_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByPaymentCode(string $payment_code) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the payment_code column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByPresentationAmount(string $presentation_amount) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the presentation_amount column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByPresentationCurrency(string $presentation_currency) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the presentation_currency column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the updated_at column *

 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayolutionTransactionRequestLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolutionTransactionRequestLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByIdPaymentPayolutionTransactionRequestLog(int $id_payment_payolution_transaction_request_log) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the id_payment_payolution_transaction_request_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByFkPaymentPayolution(int $fk_payment_payolution) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the fk_payment_payolution column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByTransactionId(string $transaction_id) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByReferenceId(string $reference_id) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the reference_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByPaymentCode(string $payment_code) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the payment_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByPresentationAmount(string $presentation_amount) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the presentation_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByPresentationCurrency(string $presentation_currency) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the presentation_currency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolutionTransactionRequestLog filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayolutionTransactionRequestLog objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByIdPaymentPayolutionTransactionRequestLog(int $id_payment_payolution_transaction_request_log) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the id_payment_payolution_transaction_request_log column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByFkPaymentPayolution(int $fk_payment_payolution) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the fk_payment_payolution column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByTransactionId(string $transaction_id) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the transaction_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByReferenceId(string $reference_id) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the reference_id column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByPaymentCode(string $payment_code) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the payment_code column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByPresentationAmount(string $presentation_amount) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the presentation_amount column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByPresentationCurrency(string $presentation_currency) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the presentation_currency column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the created_at column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayolutionTransactionRequestLog objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayolutionTransactionRequestLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayolutionTransactionRequestLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayolutionTransactionRequestLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayolutionTransactionRequestLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayolutionTransactionRequestLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayolutionTransactionRequestLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayolutionTransactionRequestLogQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayolutionTransactionRequestLogQuery();
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
     * @return ChildSpyPaymentPayolutionTransactionRequestLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayolutionTransactionRequestLogTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayolutionTransactionRequestLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payolution_transaction_request_log, fk_payment_payolution, transaction_id, reference_id, payment_code, presentation_amount, presentation_currency, created_at, updated_at FROM spy_payment_payolution_transaction_request_log WHERE id_payment_payolution_transaction_request_log = :p0';
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
            /** @var ChildSpyPaymentPayolutionTransactionRequestLog $obj */
            $obj = new ChildSpyPaymentPayolutionTransactionRequestLog();
            $obj->hydrate($row);
            SpyPaymentPayolutionTransactionRequestLogTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayolutionTransactionRequestLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_payolution_transaction_request_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayolutionTransactionRequestLog(1234); // WHERE id_payment_payolution_transaction_request_log = 1234
     * $query->filterByIdPaymentPayolutionTransactionRequestLog(array(12, 34)); // WHERE id_payment_payolution_transaction_request_log IN (12, 34)
     * $query->filterByIdPaymentPayolutionTransactionRequestLog(array('min' => 12)); // WHERE id_payment_payolution_transaction_request_log > 12
     * </code>
     *
     * @param     mixed $idPaymentPayolutionTransactionRequestLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayolutionTransactionRequestLog($idPaymentPayolutionTransactionRequestLog = null, $comparison = null)
    {
        if (is_array($idPaymentPayolutionTransactionRequestLog)) {
            $useMinMax = false;
            if (isset($idPaymentPayolutionTransactionRequestLog['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $idPaymentPayolutionTransactionRequestLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayolutionTransactionRequestLog['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $idPaymentPayolutionTransactionRequestLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $idPaymentPayolutionTransactionRequestLog, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByFkPaymentPayolution($fkPaymentPayolution = null, $comparison = null)
    {
        if (is_array($fkPaymentPayolution)) {
            $useMinMax = false;
            if (isset($fkPaymentPayolution['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentPayolution['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $fkPaymentPayolution, $comparison);
    }

    /**
     * Filter the query on the transaction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransactionId('fooValue');   // WHERE transaction_id = 'fooValue'
     * $query->filterByTransactionId('%fooValue%'); // WHERE transaction_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transactionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByTransactionId($transactionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transactionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transactionId)) {
                $transactionId = str_replace('*', '%', $transactionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_TRANSACTION_ID, $transactionId, $comparison);
    }

    /**
     * Filter the query on the reference_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReferenceId('fooValue');   // WHERE reference_id = 'fooValue'
     * $query->filterByReferenceId('%fooValue%'); // WHERE reference_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $referenceId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByReferenceId($referenceId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($referenceId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $referenceId)) {
                $referenceId = str_replace('*', '%', $referenceId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_REFERENCE_ID, $referenceId, $comparison);
    }

    /**
     * Filter the query on the payment_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentCode('fooValue');   // WHERE payment_code = 'fooValue'
     * $query->filterByPaymentCode('%fooValue%'); // WHERE payment_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByPaymentCode($paymentCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentCode)) {
                $paymentCode = str_replace('*', '%', $paymentCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PAYMENT_CODE, $paymentCode, $comparison);
    }

    /**
     * Filter the query on the presentation_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByPresentationAmount('fooValue');   // WHERE presentation_amount = 'fooValue'
     * $query->filterByPresentationAmount('%fooValue%'); // WHERE presentation_amount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $presentationAmount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByPresentationAmount($presentationAmount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($presentationAmount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $presentationAmount)) {
                $presentationAmount = str_replace('*', '%', $presentationAmount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_AMOUNT, $presentationAmount, $comparison);
    }

    /**
     * Filter the query on the presentation_currency column
     *
     * Example usage:
     * <code>
     * $query->filterByPresentationCurrency('fooValue');   // WHERE presentation_currency = 'fooValue'
     * $query->filterByPresentationCurrency('%fooValue%'); // WHERE presentation_currency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $presentationCurrency The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByPresentationCurrency($presentationCurrency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($presentationCurrency)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $presentationCurrency)) {
                $presentationCurrency = str_replace('*', '%', $presentationCurrency);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_CURRENCY, $presentationCurrency, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayolution object
     *
     * @param \Propel\SpyPaymentPayolution|ObjectCollection $spyPaymentPayolution The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolution($spyPaymentPayolution, $comparison = null)
    {
        if ($spyPaymentPayolution instanceof \Propel\SpyPaymentPayolution) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->getIdPaymentPayolution(), $comparison);
        } elseif ($spyPaymentPayolution instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $spyPaymentPayolution->toKeyValue('PrimaryKey', 'IdPaymentPayolution'), $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyPaymentPayolutionTransactionStatusLog object
     *
     * @param \Propel\SpyPaymentPayolutionTransactionStatusLog|ObjectCollection $spyPaymentPayolutionTransactionStatusLog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionTransactionStatusLog($spyPaymentPayolutionTransactionStatusLog, $comparison = null)
    {
        if ($spyPaymentPayolutionTransactionStatusLog instanceof \Propel\SpyPaymentPayolutionTransactionStatusLog) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_TRANSACTION_ID, $spyPaymentPayolutionTransactionStatusLog->getIdentificationTransactionid(), $comparison);
        } elseif ($spyPaymentPayolutionTransactionStatusLog instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayolutionTransactionStatusLogQuery()
                ->filterByPrimaryKeys($spyPaymentPayolutionTransactionStatusLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayolutionTransactionStatusLog() only accepts arguments of type \Propel\SpyPaymentPayolutionTransactionStatusLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolutionTransactionStatusLog');

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
            $this->addJoinObject($join, 'SpyPaymentPayolutionTransactionStatusLog');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolutionTransactionStatusLog relation SpyPaymentPayolutionTransactionStatusLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionTransactionStatusLogQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionTransactionStatusLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolutionTransactionStatusLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolutionTransactionStatusLog', '\Propel\SpyPaymentPayolutionTransactionStatusLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayolutionTransactionRequestLog $spyPaymentPayolutionTransactionRequestLog Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayolutionTransactionRequestLog = null)
    {
        if ($spyPaymentPayolutionTransactionRequestLog) {
            $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, $spyPaymentPayolutionTransactionRequestLog->getIdPaymentPayolutionTransactionRequestLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payolution_transaction_request_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayolutionTransactionRequestLogTableMap::clearInstancePool();
            SpyPaymentPayolutionTransactionRequestLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayolutionTransactionRequestLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayolutionTransactionRequestLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionRequestLogQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayolutionTransactionRequestLogQuery
