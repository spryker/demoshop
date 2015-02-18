<?php


/**
 * Base class that represents a query for the 'pac_payment_transaction' table.
 *
 *
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByIdPaymentTransaction($order = Criteria::ASC) Order by the id_payment_transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByFkPayment($order = Criteria::ASC) Order by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByReferenceId($order = Criteria::ASC) Order by the reference_id column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByEvent($order = Criteria::ASC) Order by the event column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByEventDate($order = Criteria::ASC) Order by the event_date column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByIsOutbound($order = Criteria::ASC) Order by the is_outbound column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByIsSuccess($order = Criteria::ASC) Order by the is_success column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByRawRequest($order = Criteria::ASC) Order by the raw_request column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByRawResponse($order = Criteria::ASC) Order by the raw_response column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByIdPaymentTransaction() Group by the id_payment_transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByFkPayment() Group by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByReferenceId() Group by the reference_id column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByEvent() Group by the event column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByEventDate() Group by the event_date column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByIsOutbound() Group by the is_outbound column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByIsSuccess() Group by the is_success column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByMessage() Group by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByRawRequest() Group by the raw_request column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByRawResponse() Group by the raw_response column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery leftJoinPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery rightJoinPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery innerJoinPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Payment relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery leftJoinPaymentAccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentAccount relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery rightJoinPaymentAccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentAccount relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery innerJoinPaymentAccount($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentAccount relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery leftJoinPaymentTransactionPayone($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentTransactionPayone relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery rightJoinPaymentTransactionPayone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentTransactionPayone relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery innerJoinPaymentTransactionPayone($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentTransactionPayone relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction matching the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction matching the query, or a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByFkPayment(int $fk_payment) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByReferenceId(string $reference_id) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the reference_id column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByEvent(string $event) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the event column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByEventDate(string $event_date) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the event_date column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByIsOutbound(boolean $is_outbound) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the is_outbound column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByIsSuccess(boolean $is_success) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the is_success column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByMessage(string $message) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByRawRequest(string $raw_request) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the raw_request column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByRawResponse(string $raw_response) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the raw_response column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction filtered by the updated_at column
 *
 * @method array findByIdPaymentTransaction(int $id_payment_transaction) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the id_payment_transaction column
 * @method array findByFkPayment(int $fk_payment) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the fk_payment column
 * @method array findByReferenceId(string $reference_id) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the reference_id column
 * @method array findByEvent(string $event) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the event column
 * @method array findByEventDate(string $event_date) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the event_date column
 * @method array findByIsOutbound(boolean $is_outbound) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the is_outbound column
 * @method array findByIsSuccess(boolean $is_success) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the is_success column
 * @method array findByMessage(string $message) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the message column
 * @method array findByRawRequest(string $raw_request) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the raw_request column
 * @method array findByRawResponse(string $raw_response) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the raw_response column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.om
 */
abstract class Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentTransactionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentTransactionQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPaymentTransaction']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentTransaction($key, $con = null)
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_transaction`, `fk_payment`, `reference_id`, `event`, `event_date`, `is_outbound`, `is_success`, `message`, `raw_request`, `raw_response`, `created_at`, `updated_at` FROM `pac_payment_transaction` WHERE `id_payment_transaction` = :p0';
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
            $obj = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction();
            $obj->hydrate($row);
            ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_transaction column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentTransaction(1234); // WHERE id_payment_transaction = 1234
     * $query->filterByIdPaymentTransaction(array(12, 34)); // WHERE id_payment_transaction IN (12, 34)
     * $query->filterByIdPaymentTransaction(array('min' => 12)); // WHERE id_payment_transaction >= 12
     * $query->filterByIdPaymentTransaction(array('max' => 12)); // WHERE id_payment_transaction <= 12
     * </code>
     *
     * @param     mixed $idPaymentTransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByIdPaymentTransaction($idPaymentTransaction = null, $comparison = null)
    {
        if (is_array($idPaymentTransaction)) {
            $useMinMax = false;
            if (isset($idPaymentTransaction['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $idPaymentTransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentTransaction['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $idPaymentTransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $idPaymentTransaction, $comparison);
    }

    /**
     * Filter the query on the fk_payment column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPayment(1234); // WHERE fk_payment = 1234
     * $query->filterByFkPayment(array(12, 34)); // WHERE fk_payment IN (12, 34)
     * $query->filterByFkPayment(array('min' => 12)); // WHERE fk_payment >= 12
     * $query->filterByFkPayment(array('max' => 12)); // WHERE fk_payment <= 12
     * </code>
     *
     * @see       filterByPayment()
     *
     * @param     mixed $fkPayment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByFkPayment($fkPayment = null, $comparison = null)
    {
        if (is_array($fkPayment)) {
            $useMinMax = false;
            if (isset($fkPayment['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::FK_PAYMENT, $fkPayment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPayment['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::FK_PAYMENT, $fkPayment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::FK_PAYMENT, $fkPayment, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::REFERENCE_ID, $referenceId, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::EVENT, $event, $comparison);
    }

    /**
     * Filter the query on the event_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEventDate('2011-03-14'); // WHERE event_date = '2011-03-14'
     * $query->filterByEventDate('now'); // WHERE event_date = '2011-03-14'
     * $query->filterByEventDate(array('max' => 'yesterday')); // WHERE event_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $eventDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByEventDate($eventDate = null, $comparison = null)
    {
        if (is_array($eventDate)) {
            $useMinMax = false;
            if (isset($eventDate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::EVENT_DATE, $eventDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventDate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::EVENT_DATE, $eventDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::EVENT_DATE, $eventDate, $comparison);
    }

    /**
     * Filter the query on the is_outbound column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOutbound(true); // WHERE is_outbound = true
     * $query->filterByIsOutbound('yes'); // WHERE is_outbound = true
     * </code>
     *
     * @param     boolean|string $isOutbound The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByIsOutbound($isOutbound = null, $comparison = null)
    {
        if (is_string($isOutbound)) {
            $isOutbound = in_array(strtolower($isOutbound), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::IS_OUTBOUND, $isOutbound, $comparison);
    }

    /**
     * Filter the query on the is_success column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSuccess(true); // WHERE is_success = true
     * $query->filterByIsSuccess('yes'); // WHERE is_success = true
     * </code>
     *
     * @param     boolean|string $isSuccess The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByIsSuccess($isSuccess = null, $comparison = null)
    {
        if (is_string($isSuccess)) {
            $isSuccess = in_array(strtolower($isSuccess), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::IS_SUCCESS, $isSuccess, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the raw_request column
     *
     * Example usage:
     * <code>
     * $query->filterByRawRequest('fooValue');   // WHERE raw_request = 'fooValue'
     * $query->filterByRawRequest('%fooValue%'); // WHERE raw_request LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rawRequest The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByRawRequest($rawRequest = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rawRequest)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rawRequest)) {
                $rawRequest = str_replace('*', '%', $rawRequest);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::RAW_REQUEST, $rawRequest, $comparison);
    }

    /**
     * Filter the query on the raw_response column
     *
     * Example usage:
     * <code>
     * $query->filterByRawResponse('fooValue');   // WHERE raw_response = 'fooValue'
     * $query->filterByRawResponse('%fooValue%'); // WHERE raw_response LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rawResponse The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByRawResponse($rawResponse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rawResponse)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rawResponse)) {
                $rawResponse = str_replace('*', '%', $rawResponse);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::RAW_RESPONSE, $rawResponse, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPayment object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPayment|PropelObjectCollection $pacPayment The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPayment($pacPayment, $comparison = null)
    {
        if ($pacPayment instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPayment) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::FK_PAYMENT, $pacPayment->getIdPayment(), $comparison);
        } elseif ($pacPayment instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::FK_PAYMENT, $pacPayment->toKeyValue('PrimaryKey', 'IdPayment'), $comparison);
        } else {
            throw new PropelException('filterByPayment() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPayment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Payment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function joinPayment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Payment');

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
            $this->addJoinObject($join, 'Payment');
        }

        return $this;
    }

    /**
     * Use the Payment relation PacPayment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Payment', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount|PropelObjectCollection $pacPaymentAccount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentAccount($pacPaymentAccount, $comparison = null)
    {
        if ($pacPaymentAccount instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $pacPaymentAccount->getFkPaymentTransaction(), $comparison);
        } elseif ($pacPaymentAccount instanceof PropelObjectCollection) {
            return $this
                ->usePaymentAccountQuery()
                ->filterByPrimaryKeys($pacPaymentAccount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentAccount() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentAccount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function joinPaymentAccount($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentAccount');

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
            $this->addJoinObject($join, 'PaymentAccount');
        }

        return $this;
    }

    /**
     * Use the PaymentAccount relation PacPaymentAccount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery A secondary query class using the current class as primary query
     */
    public function usePaymentAccountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPaymentAccount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentAccount', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone object
     *
     * @param   ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone|PropelObjectCollection $pacPaymentTransactionPayone  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentTransactionPayone($pacPaymentTransactionPayone, $comparison = null)
    {
        if ($pacPaymentTransactionPayone instanceof ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $pacPaymentTransactionPayone->getIdPaymentTransactionPayone(), $comparison);
        } elseif ($pacPaymentTransactionPayone instanceof PropelObjectCollection) {
            return $this
                ->usePaymentTransactionPayoneQuery()
                ->filterByPrimaryKeys($pacPaymentTransactionPayone->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentTransactionPayone() only accepts arguments of type ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentTransactionPayone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function joinPaymentTransactionPayone($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentTransactionPayone');

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
            $this->addJoinObject($join, 'PaymentTransactionPayone');
        }

        return $this;
    }

    /**
     * Use the PaymentTransactionPayone relation PacPaymentTransactionPayone object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery A secondary query class using the current class as primary query
     */
    public function usePaymentTransactionPayoneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentTransactionPayone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentTransactionPayone', 'ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction $pacPaymentTransaction Object to remove from the list of results
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function prune($pacPaymentTransaction = null)
    {
        if ($pacPaymentTransaction) {
            $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::ID_PAYMENT_TRANSACTION, $pacPaymentTransaction->getIdPaymentTransaction(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionPeer::CREATED_AT);
    }
}
