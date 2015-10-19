<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCustomer as ChildSpyCustomer;
use Propel\SpyCustomerQuery as ChildSpyCustomerQuery;
use Propel\Map\SpyCustomerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_customer' table.
 *
 *
 *
 * @method     ChildSpyCustomerQuery orderByIdCustomer($order = Criteria::ASC) Order by the id_customer column
 * @method     ChildSpyCustomerQuery orderByCustomerReference($order = Criteria::ASC) Order by the customer_reference column
 * @method     ChildSpyCustomerQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSpyCustomerQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method     ChildSpyCustomerQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSpyCustomerQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSpyCustomerQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildSpyCustomerQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildSpyCustomerQuery orderByDateOfBirth($order = Criteria::ASC) Order by the date_of_birth column
 * @method     ChildSpyCustomerQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildSpyCustomerQuery orderByRestorePasswordKey($order = Criteria::ASC) Order by the restore_password_key column
 * @method     ChildSpyCustomerQuery orderByRestorePasswordDate($order = Criteria::ASC) Order by the restore_password_date column
 * @method     ChildSpyCustomerQuery orderByRegistered($order = Criteria::ASC) Order by the registered column
 * @method     ChildSpyCustomerQuery orderByRegistrationKey($order = Criteria::ASC) Order by the registration_key column
 * @method     ChildSpyCustomerQuery orderByDefaultBillingAddress($order = Criteria::ASC) Order by the default_billing_address column
 * @method     ChildSpyCustomerQuery orderByDefaultShippingAddress($order = Criteria::ASC) Order by the default_shipping_address column
 * @method     ChildSpyCustomerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyCustomerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyCustomerQuery groupByIdCustomer() Group by the id_customer column
 * @method     ChildSpyCustomerQuery groupByCustomerReference() Group by the customer_reference column
 * @method     ChildSpyCustomerQuery groupByEmail() Group by the email column
 * @method     ChildSpyCustomerQuery groupBySalutation() Group by the salutation column
 * @method     ChildSpyCustomerQuery groupByFirstName() Group by the first_name column
 * @method     ChildSpyCustomerQuery groupByLastName() Group by the last_name column
 * @method     ChildSpyCustomerQuery groupByCompany() Group by the company column
 * @method     ChildSpyCustomerQuery groupByGender() Group by the gender column
 * @method     ChildSpyCustomerQuery groupByDateOfBirth() Group by the date_of_birth column
 * @method     ChildSpyCustomerQuery groupByPassword() Group by the password column
 * @method     ChildSpyCustomerQuery groupByRestorePasswordKey() Group by the restore_password_key column
 * @method     ChildSpyCustomerQuery groupByRestorePasswordDate() Group by the restore_password_date column
 * @method     ChildSpyCustomerQuery groupByRegistered() Group by the registered column
 * @method     ChildSpyCustomerQuery groupByRegistrationKey() Group by the registration_key column
 * @method     ChildSpyCustomerQuery groupByDefaultBillingAddress() Group by the default_billing_address column
 * @method     ChildSpyCustomerQuery groupByDefaultShippingAddress() Group by the default_shipping_address column
 * @method     ChildSpyCustomerQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyCustomerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyCustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCustomerQuery leftJoinBillingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the BillingAddress relation
 * @method     ChildSpyCustomerQuery rightJoinBillingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BillingAddress relation
 * @method     ChildSpyCustomerQuery innerJoinBillingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the BillingAddress relation
 *
 * @method     ChildSpyCustomerQuery leftJoinShippingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAddress relation
 * @method     ChildSpyCustomerQuery rightJoinShippingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAddress relation
 * @method     ChildSpyCustomerQuery innerJoinShippingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAddress relation
 *
 * @method     ChildSpyCustomerQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method     ChildSpyCustomerQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method     ChildSpyCustomerQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method     ChildSpyCustomerQuery leftJoinSpyNewsletterSubscriber($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyNewsletterSubscriber relation
 * @method     ChildSpyCustomerQuery rightJoinSpyNewsletterSubscriber($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyNewsletterSubscriber relation
 * @method     ChildSpyCustomerQuery innerJoinSpyNewsletterSubscriber($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyNewsletterSubscriber relation
 *
 * @method     ChildSpyCustomerQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     ChildSpyCustomerQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     ChildSpyCustomerQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     ChildSpyCustomerQuery leftJoinSpyWishlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyWishlist relation
 * @method     ChildSpyCustomerQuery rightJoinSpyWishlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyWishlist relation
 * @method     ChildSpyCustomerQuery innerJoinSpyWishlist($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyWishlist relation
 *
 * @method     \Propel\SpyCustomerAddressQuery|\Propel\SpyNewsletterSubscriberQuery|\Propel\SpySalesOrderQuery|\Propel\SpyWishlistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCustomer findOne(ConnectionInterface $con = null) Return the first ChildSpyCustomer matching the query
 * @method     ChildSpyCustomer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCustomer matching the query, or a new ChildSpyCustomer object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCustomer findOneByIdCustomer(int $id_customer) Return the first ChildSpyCustomer filtered by the id_customer column
 * @method     ChildSpyCustomer findOneByCustomerReference(string $customer_reference) Return the first ChildSpyCustomer filtered by the customer_reference column
 * @method     ChildSpyCustomer findOneByEmail(string $email) Return the first ChildSpyCustomer filtered by the email column
 * @method     ChildSpyCustomer findOneBySalutation(int $salutation) Return the first ChildSpyCustomer filtered by the salutation column
 * @method     ChildSpyCustomer findOneByFirstName(string $first_name) Return the first ChildSpyCustomer filtered by the first_name column
 * @method     ChildSpyCustomer findOneByLastName(string $last_name) Return the first ChildSpyCustomer filtered by the last_name column
 * @method     ChildSpyCustomer findOneByCompany(string $company) Return the first ChildSpyCustomer filtered by the company column
 * @method     ChildSpyCustomer findOneByGender(int $gender) Return the first ChildSpyCustomer filtered by the gender column
 * @method     ChildSpyCustomer findOneByDateOfBirth(string $date_of_birth) Return the first ChildSpyCustomer filtered by the date_of_birth column
 * @method     ChildSpyCustomer findOneByPassword(string $password) Return the first ChildSpyCustomer filtered by the password column
 * @method     ChildSpyCustomer findOneByRestorePasswordKey(string $restore_password_key) Return the first ChildSpyCustomer filtered by the restore_password_key column
 * @method     ChildSpyCustomer findOneByRestorePasswordDate(string $restore_password_date) Return the first ChildSpyCustomer filtered by the restore_password_date column
 * @method     ChildSpyCustomer findOneByRegistered(string $registered) Return the first ChildSpyCustomer filtered by the registered column
 * @method     ChildSpyCustomer findOneByRegistrationKey(string $registration_key) Return the first ChildSpyCustomer filtered by the registration_key column
 * @method     ChildSpyCustomer findOneByDefaultBillingAddress(int $default_billing_address) Return the first ChildSpyCustomer filtered by the default_billing_address column
 * @method     ChildSpyCustomer findOneByDefaultShippingAddress(int $default_shipping_address) Return the first ChildSpyCustomer filtered by the default_shipping_address column
 * @method     ChildSpyCustomer findOneByCreatedAt(string $created_at) Return the first ChildSpyCustomer filtered by the created_at column
 * @method     ChildSpyCustomer findOneByUpdatedAt(string $updated_at) Return the first ChildSpyCustomer filtered by the updated_at column *

 * @method     ChildSpyCustomer requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCustomer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOne(ConnectionInterface $con = null) Return the first ChildSpyCustomer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCustomer requireOneByIdCustomer(int $id_customer) Return the first ChildSpyCustomer filtered by the id_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByCustomerReference(string $customer_reference) Return the first ChildSpyCustomer filtered by the customer_reference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByEmail(string $email) Return the first ChildSpyCustomer filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneBySalutation(int $salutation) Return the first ChildSpyCustomer filtered by the salutation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByFirstName(string $first_name) Return the first ChildSpyCustomer filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByLastName(string $last_name) Return the first ChildSpyCustomer filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByCompany(string $company) Return the first ChildSpyCustomer filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByGender(int $gender) Return the first ChildSpyCustomer filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByDateOfBirth(string $date_of_birth) Return the first ChildSpyCustomer filtered by the date_of_birth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByPassword(string $password) Return the first ChildSpyCustomer filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByRestorePasswordKey(string $restore_password_key) Return the first ChildSpyCustomer filtered by the restore_password_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByRestorePasswordDate(string $restore_password_date) Return the first ChildSpyCustomer filtered by the restore_password_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByRegistered(string $registered) Return the first ChildSpyCustomer filtered by the registered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByRegistrationKey(string $registration_key) Return the first ChildSpyCustomer filtered by the registration_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByDefaultBillingAddress(int $default_billing_address) Return the first ChildSpyCustomer filtered by the default_billing_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByDefaultShippingAddress(int $default_shipping_address) Return the first ChildSpyCustomer filtered by the default_shipping_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByCreatedAt(string $created_at) Return the first ChildSpyCustomer filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomer requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyCustomer filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCustomer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCustomer objects based on current ModelCriteria
 * @method     ChildSpyCustomer[]|ObjectCollection findByIdCustomer(int $id_customer) Return ChildSpyCustomer objects filtered by the id_customer column
 * @method     ChildSpyCustomer[]|ObjectCollection findByCustomerReference(string $customer_reference) Return ChildSpyCustomer objects filtered by the customer_reference column
 * @method     ChildSpyCustomer[]|ObjectCollection findByEmail(string $email) Return ChildSpyCustomer objects filtered by the email column
 * @method     ChildSpyCustomer[]|ObjectCollection findBySalutation(int $salutation) Return ChildSpyCustomer objects filtered by the salutation column
 * @method     ChildSpyCustomer[]|ObjectCollection findByFirstName(string $first_name) Return ChildSpyCustomer objects filtered by the first_name column
 * @method     ChildSpyCustomer[]|ObjectCollection findByLastName(string $last_name) Return ChildSpyCustomer objects filtered by the last_name column
 * @method     ChildSpyCustomer[]|ObjectCollection findByCompany(string $company) Return ChildSpyCustomer objects filtered by the company column
 * @method     ChildSpyCustomer[]|ObjectCollection findByGender(int $gender) Return ChildSpyCustomer objects filtered by the gender column
 * @method     ChildSpyCustomer[]|ObjectCollection findByDateOfBirth(string $date_of_birth) Return ChildSpyCustomer objects filtered by the date_of_birth column
 * @method     ChildSpyCustomer[]|ObjectCollection findByPassword(string $password) Return ChildSpyCustomer objects filtered by the password column
 * @method     ChildSpyCustomer[]|ObjectCollection findByRestorePasswordKey(string $restore_password_key) Return ChildSpyCustomer objects filtered by the restore_password_key column
 * @method     ChildSpyCustomer[]|ObjectCollection findByRestorePasswordDate(string $restore_password_date) Return ChildSpyCustomer objects filtered by the restore_password_date column
 * @method     ChildSpyCustomer[]|ObjectCollection findByRegistered(string $registered) Return ChildSpyCustomer objects filtered by the registered column
 * @method     ChildSpyCustomer[]|ObjectCollection findByRegistrationKey(string $registration_key) Return ChildSpyCustomer objects filtered by the registration_key column
 * @method     ChildSpyCustomer[]|ObjectCollection findByDefaultBillingAddress(int $default_billing_address) Return ChildSpyCustomer objects filtered by the default_billing_address column
 * @method     ChildSpyCustomer[]|ObjectCollection findByDefaultShippingAddress(int $default_shipping_address) Return ChildSpyCustomer objects filtered by the default_shipping_address column
 * @method     ChildSpyCustomer[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyCustomer objects filtered by the created_at column
 * @method     ChildSpyCustomer[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyCustomer objects filtered by the updated_at column
 * @method     ChildSpyCustomer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCustomerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCustomerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCustomer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCustomerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCustomerQuery) {
            return $criteria;
        }
        $query = new ChildSpyCustomerQuery();
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
     * @return ChildSpyCustomer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCustomerTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCustomerTableMap::DATABASE_NAME);
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
     * @return ChildSpyCustomer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_customer, customer_reference, email, salutation, first_name, last_name, company, gender, date_of_birth, password, restore_password_key, restore_password_date, registered, registration_key, default_billing_address, default_shipping_address, created_at, updated_at FROM spy_customer WHERE id_customer = :p0';
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
            /** @var ChildSpyCustomer $obj */
            $obj = new ChildSpyCustomer();
            $obj->hydrate($row);
            SpyCustomerTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCustomer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomer(1234); // WHERE id_customer = 1234
     * $query->filterByIdCustomer(array(12, 34)); // WHERE id_customer IN (12, 34)
     * $query->filterByIdCustomer(array('min' => 12)); // WHERE id_customer > 12
     * </code>
     *
     * @param     mixed $idCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByIdCustomer($idCustomer = null, $comparison = null)
    {
        if (is_array($idCustomer)) {
            $useMinMax = false;
            if (isset($idCustomer['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $idCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomer['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $idCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $idCustomer, $comparison);
    }

    /**
     * Filter the query on the customer_reference column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerReference('fooValue');   // WHERE customer_reference = 'fooValue'
     * $query->filterByCustomerReference('%fooValue%'); // WHERE customer_reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerReference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByCustomerReference($customerReference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerReference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customerReference)) {
                $customerReference = str_replace('*', '%', $customerReference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_CUSTOMER_REFERENCE, $customerReference, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_SALUTATION);
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

        return $this->addUsingAlias(SpyCustomerTableMap::COL_SALUTATION, $salutation, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerTableMap::COL_FIRST_NAME, $firstName, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * @param     mixed $gender The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        $valueSet = SpyCustomerTableMap::getValueSet(SpyCustomerTableMap::COL_GENDER);
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

        return $this->addUsingAlias(SpyCustomerTableMap::COL_GENDER, $gender, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
    {
        if (is_array($dateOfBirth)) {
            $useMinMax = false;
            if (isset($dateOfBirth['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOfBirth['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_DATE_OF_BIRTH, $dateOfBirth, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the restore_password_key column
     *
     * Example usage:
     * <code>
     * $query->filterByRestorePasswordKey('fooValue');   // WHERE restore_password_key = 'fooValue'
     * $query->filterByRestorePasswordKey('%fooValue%'); // WHERE restore_password_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $restorePasswordKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByRestorePasswordKey($restorePasswordKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($restorePasswordKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $restorePasswordKey)) {
                $restorePasswordKey = str_replace('*', '%', $restorePasswordKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY, $restorePasswordKey, $comparison);
    }

    /**
     * Filter the query on the restore_password_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRestorePasswordDate('2011-03-14'); // WHERE restore_password_date = '2011-03-14'
     * $query->filterByRestorePasswordDate('now'); // WHERE restore_password_date = '2011-03-14'
     * $query->filterByRestorePasswordDate(array('max' => 'yesterday')); // WHERE restore_password_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $restorePasswordDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByRestorePasswordDate($restorePasswordDate = null, $comparison = null)
    {
        if (is_array($restorePasswordDate)) {
            $useMinMax = false;
            if (isset($restorePasswordDate['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE, $restorePasswordDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restorePasswordDate['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE, $restorePasswordDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE, $restorePasswordDate, $comparison);
    }

    /**
     * Filter the query on the registered column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistered('2011-03-14'); // WHERE registered = '2011-03-14'
     * $query->filterByRegistered('now'); // WHERE registered = '2011-03-14'
     * $query->filterByRegistered(array('max' => 'yesterday')); // WHERE registered > '2011-03-13'
     * </code>
     *
     * @param     mixed $registered The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByRegistered($registered = null, $comparison = null)
    {
        if (is_array($registered)) {
            $useMinMax = false;
            if (isset($registered['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_REGISTERED, $registered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($registered['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_REGISTERED, $registered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_REGISTERED, $registered, $comparison);
    }

    /**
     * Filter the query on the registration_key column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistrationKey('fooValue');   // WHERE registration_key = 'fooValue'
     * $query->filterByRegistrationKey('%fooValue%'); // WHERE registration_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registrationKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByRegistrationKey($registrationKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registrationKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registrationKey)) {
                $registrationKey = str_replace('*', '%', $registrationKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_REGISTRATION_KEY, $registrationKey, $comparison);
    }

    /**
     * Filter the query on the default_billing_address column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultBillingAddress(1234); // WHERE default_billing_address = 1234
     * $query->filterByDefaultBillingAddress(array(12, 34)); // WHERE default_billing_address IN (12, 34)
     * $query->filterByDefaultBillingAddress(array('min' => 12)); // WHERE default_billing_address > 12
     * </code>
     *
     * @see       filterByBillingAddress()
     *
     * @param     mixed $defaultBillingAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByDefaultBillingAddress($defaultBillingAddress = null, $comparison = null)
    {
        if (is_array($defaultBillingAddress)) {
            $useMinMax = false;
            if (isset($defaultBillingAddress['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $defaultBillingAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultBillingAddress['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $defaultBillingAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $defaultBillingAddress, $comparison);
    }

    /**
     * Filter the query on the default_shipping_address column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultShippingAddress(1234); // WHERE default_shipping_address = 1234
     * $query->filterByDefaultShippingAddress(array(12, 34)); // WHERE default_shipping_address IN (12, 34)
     * $query->filterByDefaultShippingAddress(array('min' => 12)); // WHERE default_shipping_address > 12
     * </code>
     *
     * @see       filterByShippingAddress()
     *
     * @param     mixed $defaultShippingAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByDefaultShippingAddress($defaultShippingAddress = null, $comparison = null)
    {
        if (is_array($defaultShippingAddress)) {
            $useMinMax = false;
            if (isset($defaultShippingAddress['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultShippingAddress['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyCustomerTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCustomerAddress object
     *
     * @param \Propel\SpyCustomerAddress|ObjectCollection $spyCustomerAddress The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByBillingAddress($spyCustomerAddress, $comparison = null)
    {
        if ($spyCustomerAddress instanceof \Propel\SpyCustomerAddress) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $spyCustomerAddress->getIdCustomerAddress(), $comparison);
        } elseif ($spyCustomerAddress instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, $spyCustomerAddress->toKeyValue('PrimaryKey', 'IdCustomerAddress'), $comparison);
        } else {
            throw new PropelException('filterByBillingAddress() only accepts arguments of type \Propel\SpyCustomerAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BillingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinBillingAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BillingAddress');

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
            $this->addJoinObject($join, 'BillingAddress');
        }

        return $this;
    }

    /**
     * Use the BillingAddress relation SpyCustomerAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useBillingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBillingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BillingAddress', '\Propel\SpyCustomerAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomerAddress object
     *
     * @param \Propel\SpyCustomerAddress|ObjectCollection $spyCustomerAddress The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByShippingAddress($spyCustomerAddress, $comparison = null)
    {
        if ($spyCustomerAddress instanceof \Propel\SpyCustomerAddress) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $spyCustomerAddress->getIdCustomerAddress(), $comparison);
        } elseif ($spyCustomerAddress instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, $spyCustomerAddress->toKeyValue('PrimaryKey', 'IdCustomerAddress'), $comparison);
        } else {
            throw new PropelException('filterByShippingAddress() only accepts arguments of type \Propel\SpyCustomerAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinShippingAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShippingAddress');

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
            $this->addJoinObject($join, 'ShippingAddress');
        }

        return $this;
    }

    /**
     * Use the ShippingAddress relation SpyCustomerAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useShippingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShippingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAddress', '\Propel\SpyCustomerAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomerAddress object
     *
     * @param \Propel\SpyCustomerAddress|ObjectCollection $spyCustomerAddress the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByAddress($spyCustomerAddress, $comparison = null)
    {
        if ($spyCustomerAddress instanceof \Propel\SpyCustomerAddress) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $spyCustomerAddress->getFkCustomer(), $comparison);
        } elseif ($spyCustomerAddress instanceof ObjectCollection) {
            return $this
                ->useAddressQuery()
                ->filterByPrimaryKeys($spyCustomerAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAddress() only accepts arguments of type \Propel\SpyCustomerAddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Address relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Address');

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
            $this->addJoinObject($join, 'Address');
        }

        return $this;
    }

    /**
     * Use the Address relation SpyCustomerAddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Address', '\Propel\SpyCustomerAddressQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyNewsletterSubscriber object
     *
     * @param \Propel\SpyNewsletterSubscriber|ObjectCollection $spyNewsletterSubscriber the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterBySpyNewsletterSubscriber($spyNewsletterSubscriber, $comparison = null)
    {
        if ($spyNewsletterSubscriber instanceof \Propel\SpyNewsletterSubscriber) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $spyNewsletterSubscriber->getFkCustomer(), $comparison);
        } elseif ($spyNewsletterSubscriber instanceof ObjectCollection) {
            return $this
                ->useSpyNewsletterSubscriberQuery()
                ->filterByPrimaryKeys($spyNewsletterSubscriber->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyNewsletterSubscriber() only accepts arguments of type \Propel\SpyNewsletterSubscriber or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyNewsletterSubscriber relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinSpyNewsletterSubscriber($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyNewsletterSubscriber');

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
            $this->addJoinObject($join, 'SpyNewsletterSubscriber');
        }

        return $this;
    }

    /**
     * Use the SpyNewsletterSubscriber relation SpyNewsletterSubscriber object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyNewsletterSubscriberQuery A secondary query class using the current class as primary query
     */
    public function useSpyNewsletterSubscriberQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyNewsletterSubscriber($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyNewsletterSubscriber', '\Propel\SpyNewsletterSubscriberQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterByOrder($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $spySalesOrder->getFkCustomer(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($spySalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * Use the Order relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyWishlist object
     *
     * @param \Propel\SpyWishlist|ObjectCollection $spyWishlist the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function filterBySpyWishlist($spyWishlist, $comparison = null)
    {
        if ($spyWishlist instanceof \Propel\SpyWishlist) {
            return $this
                ->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $spyWishlist->getFkCustomer(), $comparison);
        } elseif ($spyWishlist instanceof ObjectCollection) {
            return $this
                ->useSpyWishlistQuery()
                ->filterByPrimaryKeys($spyWishlist->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyWishlist() only accepts arguments of type \Propel\SpyWishlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyWishlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function joinSpyWishlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyWishlist');

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
            $this->addJoinObject($join, 'SpyWishlist');
        }

        return $this;
    }

    /**
     * Use the SpyWishlist relation SpyWishlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyWishlistQuery A secondary query class using the current class as primary query
     */
    public function useSpyWishlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyWishlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyWishlist', '\Propel\SpyWishlistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCustomer $spyCustomer Object to remove from the list of results
     *
     * @return $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function prune($spyCustomer = null)
    {
        if ($spyCustomer) {
            $this->addUsingAlias(SpyCustomerTableMap::COL_ID_CUSTOMER, $spyCustomer->getIdCustomer(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCustomerTableMap::clearInstancePool();
            SpyCustomerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCustomerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCustomerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCustomerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCustomerTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCustomerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCustomerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCustomerTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCustomerTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyCustomerQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCustomerTableMap::COL_CREATED_AT);
    }

} // SpyCustomerQuery
