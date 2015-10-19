<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPaymentPayolution as ChildSpyPaymentPayolution;
use Propel\SpyPaymentPayolutionQuery as ChildSpyPaymentPayolutionQuery;
use Propel\Map\SpyPaymentPayolutionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_payment_payolution' table.
 *
 *
 *
 * @method     ChildSpyPaymentPayolutionQuery orderByIdPaymentPayolution($order = Criteria::ASC) Order by the id_payment_payolution column
 * @method     ChildSpyPaymentPayolutionQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method     ChildSpyPaymentPayolutionQuery orderByAccountBrand($order = Criteria::ASC) Order by the account_brand column
 * @method     ChildSpyPaymentPayolutionQuery orderByClientIp($order = Criteria::ASC) Order by the client_ip column
 * @method     ChildSpyPaymentPayolutionQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSpyPaymentPayolutionQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSpyPaymentPayolutionQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method     ChildSpyPaymentPayolutionQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildSpyPaymentPayolutionQuery orderByDateOfBirth($order = Criteria::ASC) Order by the date_of_birth column
 * @method     ChildSpyPaymentPayolutionQuery orderByCountryIso2Code($order = Criteria::ASC) Order by the country_iso2_code column
 * @method     ChildSpyPaymentPayolutionQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildSpyPaymentPayolutionQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildSpyPaymentPayolutionQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method     ChildSpyPaymentPayolutionQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSpyPaymentPayolutionQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildSpyPaymentPayolutionQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method     ChildSpyPaymentPayolutionQuery orderByLanguageIso2Code($order = Criteria::ASC) Order by the language_iso2_code column
 * @method     ChildSpyPaymentPayolutionQuery orderByCurrencyIso3Code($order = Criteria::ASC) Order by the currency_iso3_code column
 * @method     ChildSpyPaymentPayolutionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyPaymentPayolutionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionQuery groupByIdPaymentPayolution() Group by the id_payment_payolution column
 * @method     ChildSpyPaymentPayolutionQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method     ChildSpyPaymentPayolutionQuery groupByAccountBrand() Group by the account_brand column
 * @method     ChildSpyPaymentPayolutionQuery groupByClientIp() Group by the client_ip column
 * @method     ChildSpyPaymentPayolutionQuery groupByFirstName() Group by the first_name column
 * @method     ChildSpyPaymentPayolutionQuery groupByLastName() Group by the last_name column
 * @method     ChildSpyPaymentPayolutionQuery groupBySalutation() Group by the salutation column
 * @method     ChildSpyPaymentPayolutionQuery groupByGender() Group by the gender column
 * @method     ChildSpyPaymentPayolutionQuery groupByDateOfBirth() Group by the date_of_birth column
 * @method     ChildSpyPaymentPayolutionQuery groupByCountryIso2Code() Group by the country_iso2_code column
 * @method     ChildSpyPaymentPayolutionQuery groupByCity() Group by the city column
 * @method     ChildSpyPaymentPayolutionQuery groupByStreet() Group by the street column
 * @method     ChildSpyPaymentPayolutionQuery groupByZipCode() Group by the zip_code column
 * @method     ChildSpyPaymentPayolutionQuery groupByEmail() Group by the email column
 * @method     ChildSpyPaymentPayolutionQuery groupByPhone() Group by the phone column
 * @method     ChildSpyPaymentPayolutionQuery groupByCellPhone() Group by the cell_phone column
 * @method     ChildSpyPaymentPayolutionQuery groupByLanguageIso2Code() Group by the language_iso2_code column
 * @method     ChildSpyPaymentPayolutionQuery groupByCurrencyIso3Code() Group by the currency_iso3_code column
 * @method     ChildSpyPaymentPayolutionQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyPaymentPayolutionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyPaymentPayolutionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPaymentPayolutionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPaymentPayolutionQuery leftJoinSpySalesOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrder relation
 * @method     ChildSpyPaymentPayolutionQuery rightJoinSpySalesOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrder relation
 * @method     ChildSpyPaymentPayolutionQuery innerJoinSpySalesOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrder relation
 *
 * @method     ChildSpyPaymentPayolutionQuery leftJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 * @method     ChildSpyPaymentPayolutionQuery rightJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 * @method     ChildSpyPaymentPayolutionQuery innerJoinSpyPaymentPayolutionTransactionRequestLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionTransactionRequestLog relation
 *
 * @method     ChildSpyPaymentPayolutionQuery leftJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 * @method     ChildSpyPaymentPayolutionQuery rightJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 * @method     ChildSpyPaymentPayolutionQuery innerJoinSpyPaymentPayolutionTransactionStatusLog($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionTransactionStatusLog relation
 *
 * @method     ChildSpyPaymentPayolutionQuery leftJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 * @method     ChildSpyPaymentPayolutionQuery rightJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 * @method     ChildSpyPaymentPayolutionQuery innerJoinSpyPaymentPayolutionOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
 *
 * @method     \Propel\SpySalesOrderQuery|\Propel\SpyPaymentPayolutionTransactionRequestLogQuery|\Propel\SpyPaymentPayolutionTransactionStatusLogQuery|\Propel\SpyPaymentPayolutionOrderItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPaymentPayolution findOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolution matching the query
 * @method     ChildSpyPaymentPayolution findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolution matching the query, or a new ChildSpyPaymentPayolution object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPaymentPayolution findOneByIdPaymentPayolution(int $id_payment_payolution) Return the first ChildSpyPaymentPayolution filtered by the id_payment_payolution column
 * @method     ChildSpyPaymentPayolution findOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyPaymentPayolution filtered by the fk_sales_order column
 * @method     ChildSpyPaymentPayolution findOneByAccountBrand(string $account_brand) Return the first ChildSpyPaymentPayolution filtered by the account_brand column
 * @method     ChildSpyPaymentPayolution findOneByClientIp(string $client_ip) Return the first ChildSpyPaymentPayolution filtered by the client_ip column
 * @method     ChildSpyPaymentPayolution findOneByFirstName(string $first_name) Return the first ChildSpyPaymentPayolution filtered by the first_name column
 * @method     ChildSpyPaymentPayolution findOneByLastName(string $last_name) Return the first ChildSpyPaymentPayolution filtered by the last_name column
 * @method     ChildSpyPaymentPayolution findOneBySalutation(int $salutation) Return the first ChildSpyPaymentPayolution filtered by the salutation column
 * @method     ChildSpyPaymentPayolution findOneByGender(int $gender) Return the first ChildSpyPaymentPayolution filtered by the gender column
 * @method     ChildSpyPaymentPayolution findOneByDateOfBirth(string $date_of_birth) Return the first ChildSpyPaymentPayolution filtered by the date_of_birth column
 * @method     ChildSpyPaymentPayolution findOneByCountryIso2Code(string $country_iso2_code) Return the first ChildSpyPaymentPayolution filtered by the country_iso2_code column
 * @method     ChildSpyPaymentPayolution findOneByCity(string $city) Return the first ChildSpyPaymentPayolution filtered by the city column
 * @method     ChildSpyPaymentPayolution findOneByStreet(string $street) Return the first ChildSpyPaymentPayolution filtered by the street column
 * @method     ChildSpyPaymentPayolution findOneByZipCode(string $zip_code) Return the first ChildSpyPaymentPayolution filtered by the zip_code column
 * @method     ChildSpyPaymentPayolution findOneByEmail(string $email) Return the first ChildSpyPaymentPayolution filtered by the email column
 * @method     ChildSpyPaymentPayolution findOneByPhone(string $phone) Return the first ChildSpyPaymentPayolution filtered by the phone column
 * @method     ChildSpyPaymentPayolution findOneByCellPhone(string $cell_phone) Return the first ChildSpyPaymentPayolution filtered by the cell_phone column
 * @method     ChildSpyPaymentPayolution findOneByLanguageIso2Code(string $language_iso2_code) Return the first ChildSpyPaymentPayolution filtered by the language_iso2_code column
 * @method     ChildSpyPaymentPayolution findOneByCurrencyIso3Code(string $currency_iso3_code) Return the first ChildSpyPaymentPayolution filtered by the currency_iso3_code column
 * @method     ChildSpyPaymentPayolution findOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolution filtered by the created_at column
 * @method     ChildSpyPaymentPayolution findOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolution filtered by the updated_at column *

 * @method     ChildSpyPaymentPayolution requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPaymentPayolution by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOne(ConnectionInterface $con = null) Return the first ChildSpyPaymentPayolution matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolution requireOneByIdPaymentPayolution(int $id_payment_payolution) Return the first ChildSpyPaymentPayolution filtered by the id_payment_payolution column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByFkSalesOrder(int $fk_sales_order) Return the first ChildSpyPaymentPayolution filtered by the fk_sales_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByAccountBrand(string $account_brand) Return the first ChildSpyPaymentPayolution filtered by the account_brand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByClientIp(string $client_ip) Return the first ChildSpyPaymentPayolution filtered by the client_ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByFirstName(string $first_name) Return the first ChildSpyPaymentPayolution filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByLastName(string $last_name) Return the first ChildSpyPaymentPayolution filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneBySalutation(int $salutation) Return the first ChildSpyPaymentPayolution filtered by the salutation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByGender(int $gender) Return the first ChildSpyPaymentPayolution filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByDateOfBirth(string $date_of_birth) Return the first ChildSpyPaymentPayolution filtered by the date_of_birth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByCountryIso2Code(string $country_iso2_code) Return the first ChildSpyPaymentPayolution filtered by the country_iso2_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByCity(string $city) Return the first ChildSpyPaymentPayolution filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByStreet(string $street) Return the first ChildSpyPaymentPayolution filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByZipCode(string $zip_code) Return the first ChildSpyPaymentPayolution filtered by the zip_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByEmail(string $email) Return the first ChildSpyPaymentPayolution filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByPhone(string $phone) Return the first ChildSpyPaymentPayolution filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByCellPhone(string $cell_phone) Return the first ChildSpyPaymentPayolution filtered by the cell_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByLanguageIso2Code(string $language_iso2_code) Return the first ChildSpyPaymentPayolution filtered by the language_iso2_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByCurrencyIso3Code(string $currency_iso3_code) Return the first ChildSpyPaymentPayolution filtered by the currency_iso3_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByCreatedAt(string $created_at) Return the first ChildSpyPaymentPayolution filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPaymentPayolution requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyPaymentPayolution filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPaymentPayolution objects based on current ModelCriteria
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByIdPaymentPayolution(int $id_payment_payolution) Return ChildSpyPaymentPayolution objects filtered by the id_payment_payolution column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByFkSalesOrder(int $fk_sales_order) Return ChildSpyPaymentPayolution objects filtered by the fk_sales_order column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByAccountBrand(string $account_brand) Return ChildSpyPaymentPayolution objects filtered by the account_brand column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByClientIp(string $client_ip) Return ChildSpyPaymentPayolution objects filtered by the client_ip column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByFirstName(string $first_name) Return ChildSpyPaymentPayolution objects filtered by the first_name column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByLastName(string $last_name) Return ChildSpyPaymentPayolution objects filtered by the last_name column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findBySalutation(int $salutation) Return ChildSpyPaymentPayolution objects filtered by the salutation column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByGender(int $gender) Return ChildSpyPaymentPayolution objects filtered by the gender column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByDateOfBirth(string $date_of_birth) Return ChildSpyPaymentPayolution objects filtered by the date_of_birth column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByCountryIso2Code(string $country_iso2_code) Return ChildSpyPaymentPayolution objects filtered by the country_iso2_code column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByCity(string $city) Return ChildSpyPaymentPayolution objects filtered by the city column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByStreet(string $street) Return ChildSpyPaymentPayolution objects filtered by the street column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByZipCode(string $zip_code) Return ChildSpyPaymentPayolution objects filtered by the zip_code column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByEmail(string $email) Return ChildSpyPaymentPayolution objects filtered by the email column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByPhone(string $phone) Return ChildSpyPaymentPayolution objects filtered by the phone column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByCellPhone(string $cell_phone) Return ChildSpyPaymentPayolution objects filtered by the cell_phone column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByLanguageIso2Code(string $language_iso2_code) Return ChildSpyPaymentPayolution objects filtered by the language_iso2_code column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByCurrencyIso3Code(string $currency_iso3_code) Return ChildSpyPaymentPayolution objects filtered by the currency_iso3_code column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyPaymentPayolution objects filtered by the created_at column
 * @method     ChildSpyPaymentPayolution[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyPaymentPayolution objects filtered by the updated_at column
 * @method     ChildSpyPaymentPayolution[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPaymentPayolutionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPaymentPayolutionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPaymentPayolution', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPaymentPayolutionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPaymentPayolutionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPaymentPayolutionQuery) {
            return $criteria;
        }
        $query = new ChildSpyPaymentPayolutionQuery();
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
     * @return ChildSpyPaymentPayolution|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPaymentPayolutionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
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
     * @return ChildSpyPaymentPayolution A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_payment_payolution, fk_sales_order, account_brand, client_ip, first_name, last_name, salutation, gender, date_of_birth, country_iso2_code, city, street, zip_code, email, phone, cell_phone, language_iso2_code, currency_iso3_code, created_at, updated_at FROM spy_payment_payolution WHERE id_payment_payolution = :p0';
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
            /** @var ChildSpyPaymentPayolution $obj */
            $obj = new ChildSpyPaymentPayolution();
            $obj->hydrate($row);
            SpyPaymentPayolutionTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPaymentPayolution|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_payolution column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentPayolution(1234); // WHERE id_payment_payolution = 1234
     * $query->filterByIdPaymentPayolution(array(12, 34)); // WHERE id_payment_payolution IN (12, 34)
     * $query->filterByIdPaymentPayolution(array('min' => 12)); // WHERE id_payment_payolution > 12
     * </code>
     *
     * @param     mixed $idPaymentPayolution The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByIdPaymentPayolution($idPaymentPayolution = null, $comparison = null)
    {
        if (is_array($idPaymentPayolution)) {
            $useMinMax = false;
            if (isset($idPaymentPayolution['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $idPaymentPayolution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentPayolution['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $idPaymentPayolution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $idPaymentPayolution, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order > 12
     * </code>
     *
     * @see       filterBySpySalesOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the account_brand column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountBrand('fooValue');   // WHERE account_brand = 'fooValue'
     * $query->filterByAccountBrand('%fooValue%'); // WHERE account_brand LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountBrand The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByAccountBrand($accountBrand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountBrand)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accountBrand)) {
                $accountBrand = str_replace('*', '%', $accountBrand);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND, $accountBrand, $comparison);
    }

    /**
     * Filter the query on the client_ip column
     *
     * Example usage:
     * <code>
     * $query->filterByClientIp('fooValue');   // WHERE client_ip = 'fooValue'
     * $query->filterByClientIp('%fooValue%'); // WHERE client_ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientIp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByClientIp($clientIp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientIp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientIp)) {
                $clientIp = str_replace('*', '%', $clientIp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CLIENT_IP, $clientIp, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_SALUTATION);
        if (is_scalar($salutation)) {
            if (!in_array($salutation, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $salutation));
            }
            $salutation = array_search($salutation, $valueSet);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_SALUTATION, $salutation, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * @param     mixed $gender The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        $valueSet = SpyPaymentPayolutionTableMap::getValueSet(SpyPaymentPayolutionTableMap::COL_GENDER);
        if (is_scalar($gender)) {
            if (!in_array($gender, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $gender));
            }
            $gender = array_search($gender, $valueSet);
        } elseif (is_array($gender)) {
            $convertedValues = array();
            foreach ($gender as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $gender = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the date_of_birth column
     *
     * Example usage:
     * <code>
     * $query->filterByDateOfBirth('2011-03-14'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth('now'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth(array('max' => 'yesterday')); // WHERE date_of_birth > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateOfBirth The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
    {
        if (is_array($dateOfBirth)) {
            $useMinMax = false;
            if (isset($dateOfBirth['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOfBirth['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH, $dateOfBirth, $comparison);
    }

    /**
     * Filter the query on the country_iso2_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryIso2Code('fooValue');   // WHERE country_iso2_code = 'fooValue'
     * $query->filterByCountryIso2Code('%fooValue%'); // WHERE country_iso2_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $countryIso2Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByCountryIso2Code($countryIso2Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($countryIso2Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $countryIso2Code)) {
                $countryIso2Code = str_replace('*', '%', $countryIso2Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE, $countryIso2Code, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%'); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $street)) {
                $street = str_replace('*', '%', $street);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the zip_code column
     *
     * Example usage:
     * <code>
     * $query->filterByZipCode('fooValue');   // WHERE zip_code = 'fooValue'
     * $query->filterByZipCode('%fooValue%'); // WHERE zip_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByZipCode($zipCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipCode)) {
                $zipCode = str_replace('*', '%', $zipCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the cell_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellPhone('fooValue');   // WHERE cell_phone = 'fooValue'
     * $query->filterByCellPhone('%fooValue%'); // WHERE cell_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByCellPhone($cellPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cellPhone)) {
                $cellPhone = str_replace('*', '%', $cellPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CELL_PHONE, $cellPhone, $comparison);
    }

    /**
     * Filter the query on the language_iso2_code column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageIso2Code('fooValue');   // WHERE language_iso2_code = 'fooValue'
     * $query->filterByLanguageIso2Code('%fooValue%'); // WHERE language_iso2_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $languageIso2Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByLanguageIso2Code($languageIso2Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($languageIso2Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $languageIso2Code)) {
                $languageIso2Code = str_replace('*', '%', $languageIso2Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE, $languageIso2Code, $comparison);
    }

    /**
     * Filter the query on the currency_iso3_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyIso3Code('fooValue');   // WHERE currency_iso3_code = 'fooValue'
     * $query->filterByCurrencyIso3Code('%fooValue%'); // WHERE currency_iso3_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currencyIso3Code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByCurrencyIso3Code($currencyIso3Code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currencyIso3Code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $currencyIso3Code)) {
                $currencyIso3Code = str_replace('*', '%', $currencyIso3Code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE, $currencyIso3Code, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $spySalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, $spySalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterBySpySalesOrder() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesOrder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function joinSpySalesOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesOrder');

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
            $this->addJoinObject($join, 'SpySalesOrder');
        }

        return $this;
    }

    /**
     * Use the SpySalesOrder relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySalesOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrder', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyPaymentPayolutionTransactionRequestLog object
     *
     * @param \Propel\SpyPaymentPayolutionTransactionRequestLog|ObjectCollection $spyPaymentPayolutionTransactionRequestLog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionTransactionRequestLog($spyPaymentPayolutionTransactionRequestLog, $comparison = null)
    {
        if ($spyPaymentPayolutionTransactionRequestLog instanceof \Propel\SpyPaymentPayolutionTransactionRequestLog) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $spyPaymentPayolutionTransactionRequestLog->getFkPaymentPayolution(), $comparison);
        } elseif ($spyPaymentPayolutionTransactionRequestLog instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayolutionTransactionRequestLogQuery()
                ->filterByPrimaryKeys($spyPaymentPayolutionTransactionRequestLog->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyPaymentPayolutionTransactionStatusLog object
     *
     * @param \Propel\SpyPaymentPayolutionTransactionStatusLog|ObjectCollection $spyPaymentPayolutionTransactionStatusLog the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionTransactionStatusLog($spyPaymentPayolutionTransactionStatusLog, $comparison = null)
    {
        if ($spyPaymentPayolutionTransactionStatusLog instanceof \Propel\SpyPaymentPayolutionTransactionStatusLog) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $spyPaymentPayolutionTransactionStatusLog->getFkPaymentPayolution(), $comparison);
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
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyPaymentPayolutionOrderItem object
     *
     * @param \Propel\SpyPaymentPayolutionOrderItem|ObjectCollection $spyPaymentPayolutionOrderItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function filterBySpyPaymentPayolutionOrderItem($spyPaymentPayolutionOrderItem, $comparison = null)
    {
        if ($spyPaymentPayolutionOrderItem instanceof \Propel\SpyPaymentPayolutionOrderItem) {
            return $this
                ->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $spyPaymentPayolutionOrderItem->getFkPaymentPayolution(), $comparison);
        } elseif ($spyPaymentPayolutionOrderItem instanceof ObjectCollection) {
            return $this
                ->useSpyPaymentPayolutionOrderItemQuery()
                ->filterByPrimaryKeys($spyPaymentPayolutionOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyPaymentPayolutionOrderItem() only accepts arguments of type \Propel\SpyPaymentPayolutionOrderItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyPaymentPayolutionOrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function joinSpyPaymentPayolutionOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyPaymentPayolutionOrderItem');

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
            $this->addJoinObject($join, 'SpyPaymentPayolutionOrderItem');
        }

        return $this;
    }

    /**
     * Use the SpyPaymentPayolutionOrderItem relation SpyPaymentPayolutionOrderItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPaymentPayolutionOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyPaymentPayolutionOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyPaymentPayolutionOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyPaymentPayolutionOrderItem', '\Propel\SpyPaymentPayolutionOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPaymentPayolution $spyPaymentPayolution Object to remove from the list of results
     *
     * @return $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function prune($spyPaymentPayolution = null)
    {
        if ($spyPaymentPayolution) {
            $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, $spyPaymentPayolution->getIdPaymentPayolution(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_payment_payolution table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPaymentPayolutionTableMap::clearInstancePool();
            SpyPaymentPayolutionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPaymentPayolutionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPaymentPayolutionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPaymentPayolutionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyPaymentPayolutionTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyPaymentPayolutionTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyPaymentPayolutionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyPaymentPayolutionTableMap::COL_CREATED_AT);
    }

} // SpyPaymentPayolutionQuery
