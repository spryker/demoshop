<?php


/**
 * Base class that represents a query for the 'pac_payment_transaction_payone' table.
 *
 *
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByIdPaymentTransactionPayone($order = Criteria::ASC) Order by the id_payment_transaction_payone column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderBySequenceNumber($order = Criteria::ASC) Order by the sequence_number column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByMode($order = Criteria::ASC) Order by the mode column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByTxaction($order = Criteria::ASC) Order by the txaction column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByTxid($order = Criteria::ASC) Order by the txid column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByClearingtype($order = Criteria::ASC) Order by the clearingtype column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByReceivable($order = Criteria::ASC) Order by the receivable column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByIdPaymentTransactionPayone() Group by the id_payment_transaction_payone column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupBySequenceNumber() Group by the sequence_number column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByMode() Group by the mode column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByTxaction() Group by the txaction column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByTxid() Group by the txid column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByClearingtype() Group by the clearingtype column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByBalance() Group by the balance column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByReceivable() Group by the receivable column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery leftJoinPaymentTransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery rightJoinPaymentTransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery innerJoinPaymentTransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentTransaction relation
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone matching the query
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone matching the query, or a new ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneBySequenceNumber(int $sequence_number) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the sequence_number column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByMode(string $mode) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the mode column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByTxaction(string $txaction) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the txaction column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByTxid(string $txid) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the txid column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByClearingtype(string $clearingtype) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the clearingtype column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByBalance(string $balance) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the balance column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByReceivable(string $receivable) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the receivable column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the created_at column
 * @method ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone filtered by the updated_at column
 *
 * @method array findByIdPaymentTransactionPayone(int $id_payment_transaction_payone) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the id_payment_transaction_payone column
 * @method array findBySequenceNumber(int $sequence_number) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the sequence_number column
 * @method array findByMode(string $mode) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the mode column
 * @method array findByTxaction(string $txaction) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the txaction column
 * @method array findByTxid(string $txid) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the txid column
 * @method array findByClearingtype(string $clearingtype) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the clearingtype column
 * @method array findByBalance(string $balance) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the balance column
 * @method array findByReceivable(string $receivable) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the receivable column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payone/Persistence/Propel.om
 */
abstract class Generated_Zed_Payone_Persistence_Propel_Om_BasePacPaymentTransactionPayoneQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Payone_Persistence_Propel_Om_BasePacPaymentTransactionPayoneQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPaymentTransactionPayone']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone|ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentTransactionPayone($key, $con = null)
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
     * @return                 ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_transaction_payone`, `sequence_number`, `mode`, `txaction`, `txid`, `clearingtype`, `balance`, `receivable`, `created_at`, `updated_at` FROM `pac_payment_transaction_payone` WHERE `id_payment_transaction_payone` = :p0';
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
            $obj = new ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone();
            $obj->hydrate($row);
            ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone|ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_transaction_payone column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentTransactionPayone(1234); // WHERE id_payment_transaction_payone = 1234
     * $query->filterByIdPaymentTransactionPayone(array(12, 34)); // WHERE id_payment_transaction_payone IN (12, 34)
     * $query->filterByIdPaymentTransactionPayone(array('min' => 12)); // WHERE id_payment_transaction_payone >= 12
     * $query->filterByIdPaymentTransactionPayone(array('max' => 12)); // WHERE id_payment_transaction_payone <= 12
     * </code>
     *
     * @see       filterByPaymentTransaction()
     *
     * @param     mixed $idPaymentTransactionPayone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByIdPaymentTransactionPayone($idPaymentTransactionPayone = null, $comparison = null)
    {
        if (is_array($idPaymentTransactionPayone)) {
            $useMinMax = false;
            if (isset($idPaymentTransactionPayone['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $idPaymentTransactionPayone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentTransactionPayone['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $idPaymentTransactionPayone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $idPaymentTransactionPayone, $comparison);
    }

    /**
     * Filter the query on the sequence_number column
     *
     * Example usage:
     * <code>
     * $query->filterBySequenceNumber(1234); // WHERE sequence_number = 1234
     * $query->filterBySequenceNumber(array(12, 34)); // WHERE sequence_number IN (12, 34)
     * $query->filterBySequenceNumber(array('min' => 12)); // WHERE sequence_number >= 12
     * $query->filterBySequenceNumber(array('max' => 12)); // WHERE sequence_number <= 12
     * </code>
     *
     * @param     mixed $sequenceNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterBySequenceNumber($sequenceNumber = null, $comparison = null)
    {
        if (is_array($sequenceNumber)) {
            $useMinMax = false;
            if (isset($sequenceNumber['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::SEQUENCE_NUMBER, $sequenceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sequenceNumber['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::SEQUENCE_NUMBER, $sequenceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::SEQUENCE_NUMBER, $sequenceNumber, $comparison);
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::MODE, $mode, $comparison);
    }

    /**
     * Filter the query on the txaction column
     *
     * Example usage:
     * <code>
     * $query->filterByTxaction('fooValue');   // WHERE txaction = 'fooValue'
     * $query->filterByTxaction('%fooValue%'); // WHERE txaction LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txaction The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByTxaction($txaction = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txaction)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txaction)) {
                $txaction = str_replace('*', '%', $txaction);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::TXACTION, $txaction, $comparison);
    }

    /**
     * Filter the query on the txid column
     *
     * Example usage:
     * <code>
     * $query->filterByTxid('fooValue');   // WHERE txid = 'fooValue'
     * $query->filterByTxid('%fooValue%'); // WHERE txid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByTxid($txid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txid)) {
                $txid = str_replace('*', '%', $txid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::TXID, $txid, $comparison);
    }

    /**
     * Filter the query on the clearingtype column
     *
     * Example usage:
     * <code>
     * $query->filterByClearingtype('fooValue');   // WHERE clearingtype = 'fooValue'
     * $query->filterByClearingtype('%fooValue%'); // WHERE clearingtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clearingtype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByClearingtype($clearingtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clearingtype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clearingtype)) {
                $clearingtype = str_replace('*', '%', $clearingtype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CLEARINGTYPE, $clearingtype, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance('fooValue');   // WHERE balance = 'fooValue'
     * $query->filterByBalance('%fooValue%'); // WHERE balance LIKE '%fooValue%'
     * </code>
     *
     * @param     string $balance The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($balance)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $balance)) {
                $balance = str_replace('*', '%', $balance);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the receivable column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivable('fooValue');   // WHERE receivable = 'fooValue'
     * $query->filterByReceivable('%fooValue%'); // WHERE receivable LIKE '%fooValue%'
     * </code>
     *
     * @param     string $receivable The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByReceivable($receivable = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($receivable)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $receivable)) {
                $receivable = str_replace('*', '%', $receivable);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::RECEIVABLE, $receivable, $comparison);
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction|PropelObjectCollection $pacPaymentTransaction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentTransaction($pacPaymentTransaction, $comparison = null)
    {
        if ($pacPaymentTransaction instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $pacPaymentTransaction->getIdPaymentTransaction(), $comparison);
        } elseif ($pacPaymentTransaction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $pacPaymentTransaction->toKeyValue('PrimaryKey', 'IdPaymentTransaction'), $comparison);
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
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function joinPaymentTransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePaymentTransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentTransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone $pacPaymentTransactionPayone Object to remove from the list of results
     *
     * @return ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function prune($pacPaymentTransactionPayone = null)
    {
        if ($pacPaymentTransactionPayone) {
            $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::ID_PAYMENT_TRANSACTION_PAYONE, $pacPaymentTransactionPayone->getIdPaymentTransactionPayone(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayoneQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayonePeer::CREATED_AT);
    }
}
