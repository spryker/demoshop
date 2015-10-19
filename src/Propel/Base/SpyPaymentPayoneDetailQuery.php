<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayoneDetail as ChildSpyPaymentPayoneDetail;
use Propel\SpyPaymentPayoneDetailQuery as ChildSpyPaymentPayoneDetailQuery;
use Propel\Map\SpyPaymentPayoneDetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payone_detail' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayoneDetailQuery orderByIdPaymentPayone($order = Criteria::ASC) Order by the id_payment_payone column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByCurrency($order = Criteria::ASC) Order by the currency column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByPseudoCardPan($order = Criteria::ASC) Order by the pseudo_card_pan column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankCountry($order = Criteria::ASC) Order by the bank_country column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankAccount($order = Criteria::ASC) Order by the bank_account column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankCode($order = Criteria::ASC) Order by the bank_code column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankGroupType($order = Criteria::ASC) Order by the bank_group_type column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankBranchCode($order = Criteria::ASC) Order by the bank_branch_code column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBankCheckDigit($order = Criteria::ASC) Order by the bank_check_digit column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByIban($order = Criteria::ASC) Order by the iban column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByBic($order = Criteria::ASC) Order by the bic column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayoneDetailQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneDetailQuery groupByIdPaymentPayone() Group by the id_payment_payone column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByAmount() Group by the amount column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByCurrency() Group by the currency column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByPseudoCardPan() Group by the pseudo_card_pan column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankCountry() Group by the bank_country column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankAccount() Group by the bank_account column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankCode() Group by the bank_code column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankGroupType() Group by the bank_group_type column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankBranchCode() Group by the bank_branch_code column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBankCheckDigit() Group by the bank_check_digit column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByIban() Group by the iban column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByBic() Group by the bic column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByType() Group by the type column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayoneDetailQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayoneDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayoneDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayoneDetailQuery leftJoinSpyPaymentPayone($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneDetailQuery rightJoinSpyPaymentPayone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayone relation
 * @method     ChildSpyPaymentPayoneDetailQuery innerJoinSpyPaymentPayone($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayone relation
 *
 * @method     \Propel\SpyPaymentPayoneQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayoneDetail findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneDetail matching the query
 * @method     ChildSpyPaymentPayoneDetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneDetail matching the query, or a new ChildSpyPaymentPayoneDetail object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayoneDetail findOneByIdPaymentPayone(int $id_payment_payone) Return the first ChildSpyPaymentPayoneDetail filtered by the id_payment_payone column
 * @method     ChildSpyPaymentPayoneDetail findOneByAmount(int $amount) Return the first ChildSpyPaymentPayoneDetail filtered by the amount column
 * @method     ChildSpyPaymentPayoneDetail findOneByCurrency(string $currency) Return the first ChildSpyPaymentPayoneDetail filtered by the currency column
 * @method     ChildSpyPaymentPayoneDetail findOneByPseudoCardPan(string $pseudo_card_pan) Return the first ChildSpyPaymentPayoneDetail filtered by the pseudo_card_pan column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankCountry(string $bank_country) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_country column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankAccount(string $bank_account) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_account column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankCode(string $bank_code) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_code column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankGroupType(string $bank_group_type) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_group_type column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankBranchCode(string $bank_branch_code) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_branch_code column
 * @method     ChildSpyPaymentPayoneDetail findOneByBankCheckDigit(string $bank_check_digit) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_check_digit column
 * @method     ChildSpyPaymentPayoneDetail findOneByIban(string $iban) Return the first ChildSpyPaymentPayoneDetail filtered by the iban column
 * @method     ChildSpyPaymentPayoneDetail findOneByBic(string $bic) Return the first ChildSpyPaymentPayoneDetail filtered by the bic column
 * @method     ChildSpyPaymentPayoneDetail findOneByType(string $type) Return the first ChildSpyPaymentPayoneDetail filtered by the type column
 * @method     ChildSpyPaymentPayoneDetail findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneDetail filtered by the created_at column
 * @method     ChildSpyPaymentPayoneDetail findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneDetail filtered by the updated_at column *

 * @method     ChildSpyPaymentPayoneDetail requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayoneDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayoneDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneDetail requireOneByIdPaymentPayone(int $id_payment_payone) Return the first ChildSpyPaymentPayoneDetail filtered by the id_payment_payone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByAmount(int $amount) Return the first ChildSpyPaymentPayoneDetail filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByCurrency(string $currency) Return the first ChildSpyPaymentPayoneDetail filtered by the currency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByPseudoCardPan(string $pseudo_card_pan) Return the first ChildSpyPaymentPayoneDetail filtered by the pseudo_card_pan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankCountry(string $bank_country) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankAccount(string $bank_account) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankCode(string $bank_code) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankGroupType(string $bank_group_type) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_group_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankBranchCode(string $bank_branch_code) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_branch_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBankCheckDigit(string $bank_check_digit) Return the first ChildSpyPaymentPayoneDetail filtered by the bank_check_digit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByIban(string $iban) Return the first ChildSpyPaymentPayoneDetail filtered by the iban column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByBic(string $bic) Return the first ChildSpyPaymentPayoneDetail filtered by the bic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByType(string $type) Return the first ChildSpyPaymentPayoneDetail filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayoneDetail filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayoneDetail requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayoneDetail filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayoneDetail objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByIdPaymentPayone(int $id_payment_payone) Return ChildSpyPaymentPayoneDetail objects filtered by the id_payment_payone column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByAmount(int $amount) Return ChildSpyPaymentPayoneDetail objects filtered by the amount column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByCurrency(string $currency) Return ChildSpyPaymentPayoneDetail objects filtered by the currency column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByPseudoCardPan(string $pseudo_card_pan) Return ChildSpyPaymentPayoneDetail objects filtered by the pseudo_card_pan column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankCountry(string $bank_country) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_country column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankAccount(string $bank_account) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_account column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankCode(string $bank_code) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_code column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankGroupType(string $bank_group_type) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_group_type column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankBranchCode(string $bank_branch_code) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_branch_code column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBankCheckDigit(string $bank_check_digit) Return ChildSpyPaymentPayoneDetail objects filtered by the bank_check_digit column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByIban(string $iban) Return ChildSpyPaymentPayoneDetail objects filtered by the iban column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByBic(string $bic) Return ChildSpyPaymentPayoneDetail objects filtered by the bic column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByType(string $type) Return ChildSpyPaymentPayoneDetail objects filtered by the type column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayoneDetail objects filtered by the created_at column
 * @method     ChildSpyPaymentPayoneDetail[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayoneDetail objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayoneDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayoneDetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayoneDetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayoneDetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayoneDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayoneDetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayoneDetailQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayoneDetailQuery();
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
     * @return ChildSpyPaymentPayoneDetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayoneDetailTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayoneDetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payone, amount, currency, pseudo_card_pan, bank_country, bank_account, bank_code, bank_group_type, bank_branch_code, bank_check_digit, iban, bic, type, created_at, updated_at FROM spy_payment_payone_detail WHERE id_payment_payone = :p0';
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
            /** @var ChildSpyPaymentPayoneDetail $obj */
            $obj = new ChildSpyPaymentPayoneDetail();
            $obj->hydrate($row);
            SpyPaymentPayoneDetailTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayoneDetail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_payone column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayone(1234); // WHERE id_payment_payone = 1234
     * $query->filterByIdPaymentPayone(array(12, 34)); // WHERE id_payment_payone IN (12, 34)
     * $query->filterByIdPaymentPayone(array('min' => 12)); // WHERE id_payment_payone > 12
     * </code>
     *
     * @see       filterBySpyPaymentPayone()
     *
     * @param     mixed $idPaymentPayone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayone($idPaymentPayone = null, $comparison = null)
    {
        if (is_array($idPaymentPayone)) {
            $useMinMax = false;
            if (isset($idPaymentPayone['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $idPaymentPayone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayone['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $idPaymentPayone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $idPaymentPayone, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the currency column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrency('fooValue');   // WHERE currency = 'fooValue'
     * $query->filterByCurrency('%fooValue%'); // WHERE currency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currency The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByCurrency($currency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currency)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $currency)) {
                $currency = str_replace('*', '%', $currency);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_CURRENCY, $currency, $comparison);
    }

    /**
     * Filter the query on the pseudo_card_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByPseudoCardPan('fooValue');   // WHERE pseudo_card_pan = 'fooValue'
     * $query->filterByPseudoCardPan('%fooValue%'); // WHERE pseudo_card_pan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pseudoCardPan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByPseudoCardPan($pseudoCardPan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pseudoCardPan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pseudoCardPan)) {
                $pseudoCardPan = str_replace('*', '%', $pseudoCardPan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN, $pseudoCardPan, $comparison);
    }

    /**
     * Filter the query on the bank_country column
     *
     * Example usage:
     * <code>
     * $query->filterByBankCountry('fooValue');   // WHERE bank_country = 'fooValue'
     * $query->filterByBankCountry('%fooValue%'); // WHERE bank_country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankCountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankCountry($bankCountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankCountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankCountry)) {
                $bankCountry = str_replace('*', '%', $bankCountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY, $bankCountry, $comparison);
    }

    /**
     * Filter the query on the bank_account column
     *
     * Example usage:
     * <code>
     * $query->filterByBankAccount('fooValue');   // WHERE bank_account = 'fooValue'
     * $query->filterByBankAccount('%fooValue%'); // WHERE bank_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankAccount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankAccount($bankAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankAccount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankAccount)) {
                $bankAccount = str_replace('*', '%', $bankAccount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT, $bankAccount, $comparison);
    }

    /**
     * Filter the query on the bank_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBankCode('fooValue');   // WHERE bank_code = 'fooValue'
     * $query->filterByBankCode('%fooValue%'); // WHERE bank_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankCode($bankCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankCode)) {
                $bankCode = str_replace('*', '%', $bankCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_CODE, $bankCode, $comparison);
    }

    /**
     * Filter the query on the bank_group_type column
     *
     * Example usage:
     * <code>
     * $query->filterByBankGroupType('fooValue');   // WHERE bank_group_type = 'fooValue'
     * $query->filterByBankGroupType('%fooValue%'); // WHERE bank_group_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankGroupType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankGroupType($bankGroupType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankGroupType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankGroupType)) {
                $bankGroupType = str_replace('*', '%', $bankGroupType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE, $bankGroupType, $comparison);
    }

    /**
     * Filter the query on the bank_branch_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBankBranchCode('fooValue');   // WHERE bank_branch_code = 'fooValue'
     * $query->filterByBankBranchCode('%fooValue%'); // WHERE bank_branch_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankBranchCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankBranchCode($bankBranchCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankBranchCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankBranchCode)) {
                $bankBranchCode = str_replace('*', '%', $bankBranchCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE, $bankBranchCode, $comparison);
    }

    /**
     * Filter the query on the bank_check_digit column
     *
     * Example usage:
     * <code>
     * $query->filterByBankCheckDigit('fooValue');   // WHERE bank_check_digit = 'fooValue'
     * $query->filterByBankCheckDigit('%fooValue%'); // WHERE bank_check_digit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankCheckDigit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBankCheckDigit($bankCheckDigit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankCheckDigit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankCheckDigit)) {
                $bankCheckDigit = str_replace('*', '%', $bankCheckDigit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT, $bankCheckDigit, $comparison);
    }

    /**
     * Filter the query on the iban column
     *
     * Example usage:
     * <code>
     * $query->filterByIban('fooValue');   // WHERE iban = 'fooValue'
     * $query->filterByIban('%fooValue%'); // WHERE iban LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iban The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByIban($iban = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iban)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $iban)) {
                $iban = str_replace('*', '%', $iban);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_IBAN, $iban, $comparison);
    }

    /**
     * Filter the query on the bic column
     *
     * Example usage:
     * <code>
     * $query->filterByBic('fooValue');   // WHERE bic = 'fooValue'
     * $query->filterByBic('%fooValue%'); // WHERE bic LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bic The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByBic($bic = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bic)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bic)) {
                $bic = str_replace('*', '%', $bic);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_BIC, $bic, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayone object
     *
     * @param \Propel\SpyPaymentPayone|ObjectCollection $spyPaymentPayone The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayone($spyPaymentPayone, $comparison = null)
    {
        if ($spyPaymentPayone instanceof \Propel\SpyPaymentPayone) {
            return $this
                ->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $spyPaymentPayone->getIdPaymentPayone(), $comparison);
        } elseif ($spyPaymentPayone instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $spyPaymentPayone->toKeyValue('PrimaryKey', 'IdPaymentPayone'), $comparison);
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
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
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
     * @param   ChildSpyPaymentPayoneDetail $spyPaymentPayoneDetail Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayoneDetail = null)
    {
        if ($spyPaymentPayoneDetail) {
            $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $spyPaymentPayoneDetail->getIdPaymentPayone(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payone_detail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayoneDetailTableMap::clearInstancePool();
            SpyPaymentPayoneDetailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayoneDetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayoneDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayoneDetailQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayoneDetailQuery
