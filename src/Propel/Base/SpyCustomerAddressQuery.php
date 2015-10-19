<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCustomerAddress as ChildSpyCustomerAddress;
use Propel\SpyCustomerAddressQuery as ChildSpyCustomerAddressQuery;
use Propel\Map\SpyCustomerAddressTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_customer_address' table.
 *
 *
 *
 * @method     ChildSpyCustomerAddressQuery orderByIdCustomerAddress($order = Criteria::ASC) Order by the id_customer_address column
 * @method     ChildSpyCustomerAddressQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method     ChildSpyCustomerAddressQuery orderByFkCountry($order = Criteria::ASC) Order by the fk_country column
 * @method     ChildSpyCustomerAddressQuery orderByFkRegion($order = Criteria::ASC) Order by the fk_region column
 * @method     ChildSpyCustomerAddressQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method     ChildSpyCustomerAddressQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSpyCustomerAddressQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSpyCustomerAddressQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildSpyCustomerAddressQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildSpyCustomerAddressQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildSpyCustomerAddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildSpyCustomerAddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildSpyCustomerAddressQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method     ChildSpyCustomerAddressQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildSpyCustomerAddressQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildSpyCustomerAddressQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     ChildSpyCustomerAddressQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyCustomerAddressQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyCustomerAddressQuery groupByIdCustomerAddress() Group by the id_customer_address column
 * @method     ChildSpyCustomerAddressQuery groupByFkCustomer() Group by the fk_customer column
 * @method     ChildSpyCustomerAddressQuery groupByFkCountry() Group by the fk_country column
 * @method     ChildSpyCustomerAddressQuery groupByFkRegion() Group by the fk_region column
 * @method     ChildSpyCustomerAddressQuery groupBySalutation() Group by the salutation column
 * @method     ChildSpyCustomerAddressQuery groupByFirstName() Group by the first_name column
 * @method     ChildSpyCustomerAddressQuery groupByLastName() Group by the last_name column
 * @method     ChildSpyCustomerAddressQuery groupByAddress1() Group by the address1 column
 * @method     ChildSpyCustomerAddressQuery groupByAddress2() Group by the address2 column
 * @method     ChildSpyCustomerAddressQuery groupByAddress3() Group by the address3 column
 * @method     ChildSpyCustomerAddressQuery groupByCompany() Group by the company column
 * @method     ChildSpyCustomerAddressQuery groupByCity() Group by the city column
 * @method     ChildSpyCustomerAddressQuery groupByZipCode() Group by the zip_code column
 * @method     ChildSpyCustomerAddressQuery groupByPhone() Group by the phone column
 * @method     ChildSpyCustomerAddressQuery groupByComment() Group by the comment column
 * @method     ChildSpyCustomerAddressQuery groupByDeletedAt() Group by the deleted_at column
 * @method     ChildSpyCustomerAddressQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyCustomerAddressQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyCustomerAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCustomerAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCustomerAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCustomerAddressQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildSpyCustomerAddressQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildSpyCustomerAddressQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildSpyCustomerAddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method     ChildSpyCustomerAddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method     ChildSpyCustomerAddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method     ChildSpyCustomerAddressQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildSpyCustomerAddressQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildSpyCustomerAddressQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildSpyCustomerAddressQuery leftJoinCustomerBillingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerBillingAddress relation
 * @method     ChildSpyCustomerAddressQuery rightJoinCustomerBillingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerBillingAddress relation
 * @method     ChildSpyCustomerAddressQuery innerJoinCustomerBillingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerBillingAddress relation
 *
 * @method     ChildSpyCustomerAddressQuery leftJoinCustomerShippingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerShippingAddress relation
 * @method     ChildSpyCustomerAddressQuery rightJoinCustomerShippingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerShippingAddress relation
 * @method     ChildSpyCustomerAddressQuery innerJoinCustomerShippingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerShippingAddress relation
 *
 * @method     \Propel\SpyCustomerQuery|\Propel\SpyRegionQuery|\Propel\SpyCountryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCustomerAddress findOne(ConnectionInterface $con = null) Return the first ChildSpyCustomerAddress matching the query
 * @method     ChildSpyCustomerAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCustomerAddress matching the query, or a new ChildSpyCustomerAddress object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCustomerAddress findOneByIdCustomerAddress(int $id_customer_address) Return the first ChildSpyCustomerAddress filtered by the id_customer_address column
 * @method     ChildSpyCustomerAddress findOneByFkCustomer(int $fk_customer) Return the first ChildSpyCustomerAddress filtered by the fk_customer column
 * @method     ChildSpyCustomerAddress findOneByFkCountry(int $fk_country) Return the first ChildSpyCustomerAddress filtered by the fk_country column
 * @method     ChildSpyCustomerAddress findOneByFkRegion(int $fk_region) Return the first ChildSpyCustomerAddress filtered by the fk_region column
 * @method     ChildSpyCustomerAddress findOneBySalutation(int $salutation) Return the first ChildSpyCustomerAddress filtered by the salutation column
 * @method     ChildSpyCustomerAddress findOneByFirstName(string $first_name) Return the first ChildSpyCustomerAddress filtered by the first_name column
 * @method     ChildSpyCustomerAddress findOneByLastName(string $last_name) Return the first ChildSpyCustomerAddress filtered by the last_name column
 * @method     ChildSpyCustomerAddress findOneByAddress1(string $address1) Return the first ChildSpyCustomerAddress filtered by the address1 column
 * @method     ChildSpyCustomerAddress findOneByAddress2(string $address2) Return the first ChildSpyCustomerAddress filtered by the address2 column
 * @method     ChildSpyCustomerAddress findOneByAddress3(string $address3) Return the first ChildSpyCustomerAddress filtered by the address3 column
 * @method     ChildSpyCustomerAddress findOneByCompany(string $company) Return the first ChildSpyCustomerAddress filtered by the company column
 * @method     ChildSpyCustomerAddress findOneByCity(string $city) Return the first ChildSpyCustomerAddress filtered by the city column
 * @method     ChildSpyCustomerAddress findOneByZipCode(string $zip_code) Return the first ChildSpyCustomerAddress filtered by the zip_code column
 * @method     ChildSpyCustomerAddress findOneByPhone(string $phone) Return the first ChildSpyCustomerAddress filtered by the phone column
 * @method     ChildSpyCustomerAddress findOneByComment(string $comment) Return the first ChildSpyCustomerAddress filtered by the comment column
 * @method     ChildSpyCustomerAddress findOneByDeletedAt(string $deleted_at) Return the first ChildSpyCustomerAddress filtered by the deleted_at column
 * @method     ChildSpyCustomerAddress findOneByCreatedAt(string $created_at) Return the first ChildSpyCustomerAddress filtered by the created_at column
 * @method     ChildSpyCustomerAddress findOneByUpdatedAt(string $updated_at) Return the first ChildSpyCustomerAddress filtered by the updated_at column *

 * @method     ChildSpyCustomerAddress requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCustomerAddress by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOne(ConnectionInterface $con = null) Return the first ChildSpyCustomerAddress matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCustomerAddress requireOneByIdCustomerAddress(int $id_customer_address) Return the first ChildSpyCustomerAddress filtered by the id_customer_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByFkCustomer(int $fk_customer) Return the first ChildSpyCustomerAddress filtered by the fk_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByFkCountry(int $fk_country) Return the first ChildSpyCustomerAddress filtered by the fk_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByFkRegion(int $fk_region) Return the first ChildSpyCustomerAddress filtered by the fk_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneBySalutation(int $salutation) Return the first ChildSpyCustomerAddress filtered by the salutation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByFirstName(string $first_name) Return the first ChildSpyCustomerAddress filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByLastName(string $last_name) Return the first ChildSpyCustomerAddress filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByAddress1(string $address1) Return the first ChildSpyCustomerAddress filtered by the address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByAddress2(string $address2) Return the first ChildSpyCustomerAddress filtered by the address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByAddress3(string $address3) Return the first ChildSpyCustomerAddress filtered by the address3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByCompany(string $company) Return the first ChildSpyCustomerAddress filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByCity(string $city) Return the first ChildSpyCustomerAddress filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByZipCode(string $zip_code) Return the first ChildSpyCustomerAddress filtered by the zip_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByPhone(string $phone) Return the first ChildSpyCustomerAddress filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByComment(string $comment) Return the first ChildSpyCustomerAddress filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByDeletedAt(string $deleted_at) Return the first ChildSpyCustomerAddress filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByCreatedAt(string $created_at) Return the first ChildSpyCustomerAddress filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCustomerAddress requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyCustomerAddress filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCustomerAddress[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCustomerAddress objects based on current ModelCriteria
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByIdCustomerAddress(int $id_customer_address) Return ChildSpyCustomerAddress objects filtered by the id_customer_address column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByFkCustomer(int $fk_customer) Return ChildSpyCustomerAddress objects filtered by the fk_customer column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByFkCountry(int $fk_country) Return ChildSpyCustomerAddress objects filtered by the fk_country column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByFkRegion(int $fk_region) Return ChildSpyCustomerAddress objects filtered by the fk_region column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findBySalutation(int $salutation) Return ChildSpyCustomerAddress objects filtered by the salutation column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByFirstName(string $first_name) Return ChildSpyCustomerAddress objects filtered by the first_name column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByLastName(string $last_name) Return ChildSpyCustomerAddress objects filtered by the last_name column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByAddress1(string $address1) Return ChildSpyCustomerAddress objects filtered by the address1 column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByAddress2(string $address2) Return ChildSpyCustomerAddress objects filtered by the address2 column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByAddress3(string $address3) Return ChildSpyCustomerAddress objects filtered by the address3 column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByCompany(string $company) Return ChildSpyCustomerAddress objects filtered by the company column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByCity(string $city) Return ChildSpyCustomerAddress objects filtered by the city column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByZipCode(string $zip_code) Return ChildSpyCustomerAddress objects filtered by the zip_code column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByPhone(string $phone) Return ChildSpyCustomerAddress objects filtered by the phone column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByComment(string $comment) Return ChildSpyCustomerAddress objects filtered by the comment column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildSpyCustomerAddress objects filtered by the deleted_at column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyCustomerAddress objects filtered by the created_at column
 * @method     ChildSpyCustomerAddress[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyCustomerAddress objects filtered by the updated_at column
 * @method     ChildSpyCustomerAddress[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCustomerAddressQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCustomerAddressQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCustomerAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCustomerAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCustomerAddressQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCustomerAddressQuery) {
            return $criteria;
        }
        $query = new ChildSpyCustomerAddressQuery();
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
     * @return ChildSpyCustomerAddress|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCustomerAddressTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCustomerAddressTableMap::DATABASE_NAME);
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
     * @return ChildSpyCustomerAddress A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_customer_address, fk_customer, fk_country, fk_region, salutation, first_name, last_name, address1, address2, address3, company, city, zip_code, phone, comment, deleted_at, created_at, updated_at FROM spy_customer_address WHERE id_customer_address = :p0';
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
            /** @var ChildSpyCustomerAddress $obj */
            $obj = new ChildSpyCustomerAddress();
            $obj->hydrate($row);
            SpyCustomerAddressTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCustomerAddress|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomerAddress(1234); // WHERE id_customer_address = 1234
     * $query->filterByIdCustomerAddress(array(12, 34)); // WHERE id_customer_address IN (12, 34)
     * $query->filterByIdCustomerAddress(array('min' => 12)); // WHERE id_customer_address > 12
     * </code>
     *
     * @param     mixed $idCustomerAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByIdCustomerAddress($idCustomerAddress = null, $comparison = null)
    {
        if (is_array($idCustomerAddress)) {
            $useMinMax = false;
            if (isset($idCustomerAddress['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $idCustomerAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomerAddress['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $idCustomerAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $idCustomerAddress, $comparison);
    }

    /**
     * Filter the query on the fk_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomer(1234); // WHERE fk_customer = 1234
     * $query->filterByFkCustomer(array(12, 34)); // WHERE fk_customer IN (12, 34)
     * $query->filterByFkCustomer(array('min' => 12)); // WHERE fk_customer > 12
     * </code>
     *
     * @see       filterByCustomer()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query on the fk_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCountry(1234); // WHERE fk_country = 1234
     * $query->filterByFkCountry(array(12, 34)); // WHERE fk_country IN (12, 34)
     * $query->filterByFkCountry(array('min' => 12)); // WHERE fk_country > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $fkCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByFkCountry($fkCountry = null, $comparison = null)
    {
        if (is_array($fkCountry)) {
            $useMinMax = false;
            if (isset($fkCountry['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_COUNTRY, $fkCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCountry['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_COUNTRY, $fkCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_COUNTRY, $fkCountry, $comparison);
    }

    /**
     * Filter the query on the fk_region column
     *
     * Example usage:
     * <code>
     * $query->filterByFkRegion(1234); // WHERE fk_region = 1234
     * $query->filterByFkRegion(array(12, 34)); // WHERE fk_region IN (12, 34)
     * $query->filterByFkRegion(array('min' => 12)); // WHERE fk_region > 12
     * </code>
     *
     * @see       filterByRegion()
     *
     * @param     mixed $fkRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByFkRegion($fkRegion = null, $comparison = null)
    {
        if (is_array($fkRegion)) {
            $useMinMax = false;
            if (isset($fkRegion['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_REGION, $fkRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkRegion['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_REGION, $fkRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_REGION, $fkRegion, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        $valueSet = SpyCustomerAddressTableMap::getValueSet(SpyCustomerAddressTableMap::COL_SALUTATION);
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_SALUTATION, $salutation, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_FIRST_NAME, $firstName, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%'); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address3)) {
                $address3 = str_replace('*', '%', $address3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ADDRESS3, $address3, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_COMPANY, $company, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_CITY, $city, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ZIP_CODE, $zipCode, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $deletedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_DELETED_AT, $deletedAt, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyCustomerAddressTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByCustomer($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_CUSTOMER, $spyCustomer->getIdCustomer(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_CUSTOMER, $spyCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

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
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', '\Propel\SpyCustomerQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyRegion object
     *
     * @param \Propel\SpyRegion|ObjectCollection $spyRegion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByRegion($spyRegion, $comparison = null)
    {
        if ($spyRegion instanceof \Propel\SpyRegion) {
            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_REGION, $spyRegion->getIdRegion(), $comparison);
        } elseif ($spyRegion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_REGION, $spyRegion->toKeyValue('PrimaryKey', 'IdRegion'), $comparison);
        } else {
            throw new PropelException('filterByRegion() only accepts arguments of type \Propel\SpyRegion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Region relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function joinRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Region');

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
            $this->addJoinObject($join, 'Region');
        }

        return $this;
    }

    /**
     * Use the Region relation SpyRegion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyRegionQuery A secondary query class using the current class as primary query
     */
    public function useRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Region', '\Propel\SpyRegionQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCountry object
     *
     * @param \Propel\SpyCountry|ObjectCollection $spyCountry The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByCountry($spyCountry, $comparison = null)
    {
        if ($spyCountry instanceof \Propel\SpyCountry) {
            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_COUNTRY, $spyCountry->getIdCountry(), $comparison);
        } elseif ($spyCountry instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_FK_COUNTRY, $spyCountry->toKeyValue('PrimaryKey', 'IdCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \Propel\SpyCountry or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation SpyCountry object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\Propel\SpyCountryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByCustomerBillingAddress($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $spyCustomer->getDefaultBillingAddress(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            return $this
                ->useCustomerBillingAddressQuery()
                ->filterByPrimaryKeys($spyCustomer->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerBillingAddress() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerBillingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function joinCustomerBillingAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerBillingAddress');

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
            $this->addJoinObject($join, 'CustomerBillingAddress');
        }

        return $this;
    }

    /**
     * Use the CustomerBillingAddress relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerBillingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerBillingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerBillingAddress', '\Propel\SpyCustomerQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function filterByCustomerShippingAddress($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $spyCustomer->getDefaultShippingAddress(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            return $this
                ->useCustomerShippingAddressQuery()
                ->filterByPrimaryKeys($spyCustomer->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerShippingAddress() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerShippingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function joinCustomerShippingAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerShippingAddress');

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
            $this->addJoinObject($join, 'CustomerShippingAddress');
        }

        return $this;
    }

    /**
     * Use the CustomerShippingAddress relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerShippingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerShippingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerShippingAddress', '\Propel\SpyCustomerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCustomerAddress $spyCustomerAddress Object to remove from the list of results
     *
     * @return $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function prune($spyCustomerAddress = null)
    {
        if ($spyCustomerAddress) {
            $this->addUsingAlias(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, $spyCustomerAddress->getIdCustomerAddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_customer_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerAddressTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCustomerAddressTableMap::clearInstancePool();
            SpyCustomerAddressTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerAddressTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCustomerAddressTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCustomerAddressTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCustomerAddressTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCustomerAddressTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCustomerAddressTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCustomerAddressTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCustomerAddressTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyCustomerAddressQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCustomerAddressTableMap::COL_CREATED_AT);
    }

} // SpyCustomerAddressQuery
