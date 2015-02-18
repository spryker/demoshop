<?php


/**
 * Base class that represents a query for the 'pac_payment_account' table.
 *
 *
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByIdPaymentAccount($order = Criteria::ASC) Order by the id_payment_account column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByFkPayment($order = Criteria::ASC) Order by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByFkPaymentTransaction($order = Criteria::ASC) Order by the fk_payment_transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByReceivable($order = Criteria::ASC) Order by the receivable column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByCash($order = Criteria::ASC) Order by the cash column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByDelta($order = Criteria::ASC) Order by the delta column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByIdPaymentAccount() Group by the id_payment_account column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByFkPayment() Group by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByFkPaymentTransaction() Group by the fk_payment_transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByReceivable() Group by the receivable column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByCash() Group by the cash column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByBalance() Group by the balance column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByDelta() Group by the delta column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByAction() Group by the action column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByMessage() Group by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery leftJoinPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery rightJoinPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery innerJoinPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Payment relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery leftJoinPaymentTransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery rightJoinPaymentTransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery innerJoinPaymentTransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentTransaction relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount matching the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount matching the query, or a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByFkPayment(int $fk_payment) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the fk_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByFkPaymentTransaction(int $fk_payment_transaction) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the fk_payment_transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByReceivable(int $receivable) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the receivable column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByCash(int $cash) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the cash column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByBalance(int $balance) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the balance column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByDelta(int $delta) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the delta column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByAction(string $action) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the action column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByMessage(string $message) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the message column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount filtered by the updated_at column
 *
 * @method array findByIdPaymentAccount(int $id_payment_account) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the id_payment_account column
 * @method array findByFkPayment(int $fk_payment) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the fk_payment column
 * @method array findByFkPaymentTransaction(int $fk_payment_transaction) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the fk_payment_transaction column
 * @method array findByReceivable(int $receivable) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the receivable column
 * @method array findByCash(int $cash) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the cash column
 * @method array findByBalance(int $balance) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the balance column
 * @method array findByDelta(int $delta) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the delta column
 * @method array findByAction(string $action) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the action column
 * @method array findByMessage(string $message) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the message column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.om
 */
abstract class Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentAccountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentAccountQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPaymentAccount']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentAccount($key, $con = null)
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_account`, `fk_payment`, `fk_payment_transaction`, `receivable`, `cash`, `balance`, `delta`, `action`, `message`, `created_at`, `updated_at` FROM `pac_payment_account` WHERE `id_payment_account` = :p0';
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
            $obj = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount();
            $obj->hydrate($row);
            ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_account column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentAccount(1234); // WHERE id_payment_account = 1234
     * $query->filterByIdPaymentAccount(array(12, 34)); // WHERE id_payment_account IN (12, 34)
     * $query->filterByIdPaymentAccount(array('min' => 12)); // WHERE id_payment_account >= 12
     * $query->filterByIdPaymentAccount(array('max' => 12)); // WHERE id_payment_account <= 12
     * </code>
     *
     * @param     mixed $idPaymentAccount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByIdPaymentAccount($idPaymentAccount = null, $comparison = null)
    {
        if (is_array($idPaymentAccount)) {
            $useMinMax = false;
            if (isset($idPaymentAccount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $idPaymentAccount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentAccount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $idPaymentAccount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $idPaymentAccount, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByFkPayment($fkPayment = null, $comparison = null)
    {
        if (is_array($fkPayment)) {
            $useMinMax = false;
            if (isset($fkPayment['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT, $fkPayment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPayment['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT, $fkPayment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT, $fkPayment, $comparison);
    }

    /**
     * Filter the query on the fk_payment_transaction column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPaymentTransaction(1234); // WHERE fk_payment_transaction = 1234
     * $query->filterByFkPaymentTransaction(array(12, 34)); // WHERE fk_payment_transaction IN (12, 34)
     * $query->filterByFkPaymentTransaction(array('min' => 12)); // WHERE fk_payment_transaction >= 12
     * $query->filterByFkPaymentTransaction(array('max' => 12)); // WHERE fk_payment_transaction <= 12
     * </code>
     *
     * @see       filterByPaymentTransaction()
     *
     * @param     mixed $fkPaymentTransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByFkPaymentTransaction($fkPaymentTransaction = null, $comparison = null)
    {
        if (is_array($fkPaymentTransaction)) {
            $useMinMax = false;
            if (isset($fkPaymentTransaction['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT_TRANSACTION, $fkPaymentTransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPaymentTransaction['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT_TRANSACTION, $fkPaymentTransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT_TRANSACTION, $fkPaymentTransaction, $comparison);
    }

    /**
     * Filter the query on the receivable column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivable(1234); // WHERE receivable = 1234
     * $query->filterByReceivable(array(12, 34)); // WHERE receivable IN (12, 34)
     * $query->filterByReceivable(array('min' => 12)); // WHERE receivable >= 12
     * $query->filterByReceivable(array('max' => 12)); // WHERE receivable <= 12
     * </code>
     *
     * @param     mixed $receivable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByReceivable($receivable = null, $comparison = null)
    {
        if (is_array($receivable)) {
            $useMinMax = false;
            if (isset($receivable['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::RECEIVABLE, $receivable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receivable['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::RECEIVABLE, $receivable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::RECEIVABLE, $receivable, $comparison);
    }

    /**
     * Filter the query on the cash column
     *
     * Example usage:
     * <code>
     * $query->filterByCash(1234); // WHERE cash = 1234
     * $query->filterByCash(array(12, 34)); // WHERE cash IN (12, 34)
     * $query->filterByCash(array('min' => 12)); // WHERE cash >= 12
     * $query->filterByCash(array('max' => 12)); // WHERE cash <= 12
     * </code>
     *
     * @param     mixed $cash The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByCash($cash = null, $comparison = null)
    {
        if (is_array($cash)) {
            $useMinMax = false;
            if (isset($cash['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CASH, $cash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cash['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CASH, $cash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CASH, $cash, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance >= 12
     * $query->filterByBalance(array('max' => 12)); // WHERE balance <= 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the delta column
     *
     * Example usage:
     * <code>
     * $query->filterByDelta(1234); // WHERE delta = 1234
     * $query->filterByDelta(array(12, 34)); // WHERE delta IN (12, 34)
     * $query->filterByDelta(array('min' => 12)); // WHERE delta >= 12
     * $query->filterByDelta(array('max' => 12)); // WHERE delta <= 12
     * </code>
     *
     * @param     mixed $delta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByDelta($delta = null, $comparison = null)
    {
        if (is_array($delta)) {
            $useMinMax = false;
            if (isset($delta['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::DELTA, $delta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($delta['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::DELTA, $delta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::DELTA, $delta, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ACTION, $action, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::MESSAGE, $message, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPayment object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPayment|PropelObjectCollection $pacPayment The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPayment($pacPayment, $comparison = null)
    {
        if ($pacPayment instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPayment) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT, $pacPayment->getIdPayment(), $comparison);
        } elseif ($pacPayment instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT, $pacPayment->toKeyValue('PrimaryKey', 'IdPayment'), $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction|PropelObjectCollection $pacPaymentTransaction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentTransaction($pacPaymentTransaction, $comparison = null)
    {
        if ($pacPaymentTransaction instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT_TRANSACTION, $pacPaymentTransaction->getIdPaymentTransaction(), $comparison);
        } elseif ($pacPaymentTransaction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::FK_PAYMENT_TRANSACTION, $pacPaymentTransaction->toKeyValue('PrimaryKey', 'IdPaymentTransaction'), $comparison);
        } else {
            throw new PropelException('filterByPaymentTransaction() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentTransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function joinPaymentTransaction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentTransaction');

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
            $this->addJoinObject($join, 'PaymentTransaction');
        }

        return $this;
    }

    /**
     * Use the PaymentTransaction relation PacPaymentTransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery A secondary query class using the current class as primary query
     */
    public function usePaymentTransactionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPaymentTransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount $pacPaymentAccount Object to remove from the list of results
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function prune($pacPaymentAccount = null)
    {
        if ($pacPaymentAccount) {
            $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::ID_PAYMENT_ACCOUNT, $pacPaymentAccount->getIdPaymentAccount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountPeer::CREATED_AT);
    }
}
