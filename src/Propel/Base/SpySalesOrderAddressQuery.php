<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySalesOrderAddress as ChildSpySalesOrderAddress;
use Propel\SpySalesOrderAddressQuery as ChildSpySalesOrderAddressQuery;
use Propel\Map\SpySalesOrderAddressTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_sales_order_address' table.
 *
 *
 *
 * @method     ChildSpySalesOrderAddressQuery orderByIdSalesOrderAddress($order = Criteria::ASC) Order by the id_sales_order_address column
 * @method     ChildSpySalesOrderAddressQuery orderByFkCountry($order = Criteria::ASC) Order by the fk_country column
 * @method     ChildSpySalesOrderAddressQuery orderByFkRegion($order = Criteria::ASC) Order by the fk_region column
 * @method     ChildSpySalesOrderAddressQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method     ChildSpySalesOrderAddressQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSpySalesOrderAddressQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method     ChildSpySalesOrderAddressQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSpySalesOrderAddressQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildSpySalesOrderAddressQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildSpySalesOrderAddressQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildSpySalesOrderAddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildSpySalesOrderAddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildSpySalesOrderAddressQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method     ChildSpySalesOrderAddressQuery orderByPoBox($order = Criteria::ASC) Order by the po_box column
 * @method     ChildSpySalesOrderAddressQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildSpySalesOrderAddressQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method     ChildSpySalesOrderAddressQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildSpySalesOrderAddressQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildSpySalesOrderAddressQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSpySalesOrderAddressQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpySalesOrderAddressQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpySalesOrderAddressQuery groupByIdSalesOrderAddress() Group by the id_sales_order_address column
 * @method     ChildSpySalesOrderAddressQuery groupByFkCountry() Group by the fk_country column
 * @method     ChildSpySalesOrderAddressQuery groupByFkRegion() Group by the fk_region column
 * @method     ChildSpySalesOrderAddressQuery groupBySalutation() Group by the salutation column
 * @method     ChildSpySalesOrderAddressQuery groupByFirstName() Group by the first_name column
 * @method     ChildSpySalesOrderAddressQuery groupByMiddleName() Group by the middle_name column
 * @method     ChildSpySalesOrderAddressQuery groupByLastName() Group by the last_name column
 * @method     ChildSpySalesOrderAddressQuery groupByAddress1() Group by the address1 column
 * @method     ChildSpySalesOrderAddressQuery groupByAddress2() Group by the address2 column
 * @method     ChildSpySalesOrderAddressQuery groupByAddress3() Group by the address3 column
 * @method     ChildSpySalesOrderAddressQuery groupByCompany() Group by the company column
 * @method     ChildSpySalesOrderAddressQuery groupByCity() Group by the city column
 * @method     ChildSpySalesOrderAddressQuery groupByZipCode() Group by the zip_code column
 * @method     ChildSpySalesOrderAddressQuery groupByPoBox() Group by the po_box column
 * @method     ChildSpySalesOrderAddressQuery groupByPhone() Group by the phone column
 * @method     ChildSpySalesOrderAddressQuery groupByCellPhone() Group by the cell_phone column
 * @method     ChildSpySalesOrderAddressQuery groupByDescription() Group by the description column
 * @method     ChildSpySalesOrderAddressQuery groupByComment() Group by the comment column
 * @method     ChildSpySalesOrderAddressQuery groupByEmail() Group by the email column
 * @method     ChildSpySalesOrderAddressQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpySalesOrderAddressQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySalesOrderAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySalesOrderAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildSpySalesOrderAddressQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildSpySalesOrderAddressQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method     ChildSpySalesOrderAddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method     ChildSpySalesOrderAddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoinSpySalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressBilling relation
 * @method     ChildSpySalesOrderAddressQuery rightJoinSpySalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressBilling relation
 * @method     ChildSpySalesOrderAddressQuery innerJoinSpySalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressBilling relation
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoinSpySalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressShipping relation
 * @method     ChildSpySalesOrderAddressQuery rightJoinSpySalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressShipping relation
 * @method     ChildSpySalesOrderAddressQuery innerJoinSpySalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressShipping relation
 *
 * @method     ChildSpySalesOrderAddressQuery leftJoinSalesOrderAddressHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpySalesOrderAddressQuery rightJoinSalesOrderAddressHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method     ChildSpySalesOrderAddressQuery innerJoinSalesOrderAddressHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddressHistory relation
 *
 * @method     \Propel\SpyCountryQuery|\Propel\SpyRegionQuery|\Propel\SpySalesOrderQuery|\Propel\SpySalesOrderAddressHistoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySalesOrderAddress findOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderAddress matching the query
 * @method     ChildSpySalesOrderAddress findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySalesOrderAddress matching the query, or a new ChildSpySalesOrderAddress object populated from the query conditions when no match is found
 *
 * @method     ChildSpySalesOrderAddress findOneByIdSalesOrderAddress(int $id_sales_order_address) Return the first ChildSpySalesOrderAddress filtered by the id_sales_order_address column
 * @method     ChildSpySalesOrderAddress findOneByFkCountry(int $fk_country) Return the first ChildSpySalesOrderAddress filtered by the fk_country column
 * @method     ChildSpySalesOrderAddress findOneByFkRegion(int $fk_region) Return the first ChildSpySalesOrderAddress filtered by the fk_region column
 * @method     ChildSpySalesOrderAddress findOneBySalutation(int $salutation) Return the first ChildSpySalesOrderAddress filtered by the salutation column
 * @method     ChildSpySalesOrderAddress findOneByFirstName(string $first_name) Return the first ChildSpySalesOrderAddress filtered by the first_name column
 * @method     ChildSpySalesOrderAddress findOneByMiddleName(string $middle_name) Return the first ChildSpySalesOrderAddress filtered by the middle_name column
 * @method     ChildSpySalesOrderAddress findOneByLastName(string $last_name) Return the first ChildSpySalesOrderAddress filtered by the last_name column
 * @method     ChildSpySalesOrderAddress findOneByAddress1(string $address1) Return the first ChildSpySalesOrderAddress filtered by the address1 column
 * @method     ChildSpySalesOrderAddress findOneByAddress2(string $address2) Return the first ChildSpySalesOrderAddress filtered by the address2 column
 * @method     ChildSpySalesOrderAddress findOneByAddress3(string $address3) Return the first ChildSpySalesOrderAddress filtered by the address3 column
 * @method     ChildSpySalesOrderAddress findOneByCompany(string $company) Return the first ChildSpySalesOrderAddress filtered by the company column
 * @method     ChildSpySalesOrderAddress findOneByCity(string $city) Return the first ChildSpySalesOrderAddress filtered by the city column
 * @method     ChildSpySalesOrderAddress findOneByZipCode(string $zip_code) Return the first ChildSpySalesOrderAddress filtered by the zip_code column
 * @method     ChildSpySalesOrderAddress findOneByPoBox(string $po_box) Return the first ChildSpySalesOrderAddress filtered by the po_box column
 * @method     ChildSpySalesOrderAddress findOneByPhone(string $phone) Return the first ChildSpySalesOrderAddress filtered by the phone column
 * @method     ChildSpySalesOrderAddress findOneByCellPhone(string $cell_phone) Return the first ChildSpySalesOrderAddress filtered by the cell_phone column
 * @method     ChildSpySalesOrderAddress findOneByDescription(string $description) Return the first ChildSpySalesOrderAddress filtered by the description column
 * @method     ChildSpySalesOrderAddress findOneByComment(string $comment) Return the first ChildSpySalesOrderAddress filtered by the comment column
 * @method     ChildSpySalesOrderAddress findOneByEmail(string $email) Return the first ChildSpySalesOrderAddress filtered by the email column
 * @method     ChildSpySalesOrderAddress findOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderAddress filtered by the created_at column
 * @method     ChildSpySalesOrderAddress findOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderAddress filtered by the updated_at column *

 * @method     ChildSpySalesOrderAddress requirePk($key, ConnectionInterface $con = null) Return the ChildSpySalesOrderAddress by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOne(ConnectionInterface $con = null) Return the first ChildSpySalesOrderAddress matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderAddress requireOneByIdSalesOrderAddress(int $id_sales_order_address) Return the first ChildSpySalesOrderAddress filtered by the id_sales_order_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByFkCountry(int $fk_country) Return the first ChildSpySalesOrderAddress filtered by the fk_country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByFkRegion(int $fk_region) Return the first ChildSpySalesOrderAddress filtered by the fk_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneBySalutation(int $salutation) Return the first ChildSpySalesOrderAddress filtered by the salutation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByFirstName(string $first_name) Return the first ChildSpySalesOrderAddress filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByMiddleName(string $middle_name) Return the first ChildSpySalesOrderAddress filtered by the middle_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByLastName(string $last_name) Return the first ChildSpySalesOrderAddress filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByAddress1(string $address1) Return the first ChildSpySalesOrderAddress filtered by the address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByAddress2(string $address2) Return the first ChildSpySalesOrderAddress filtered by the address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByAddress3(string $address3) Return the first ChildSpySalesOrderAddress filtered by the address3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByCompany(string $company) Return the first ChildSpySalesOrderAddress filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByCity(string $city) Return the first ChildSpySalesOrderAddress filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByZipCode(string $zip_code) Return the first ChildSpySalesOrderAddress filtered by the zip_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByPoBox(string $po_box) Return the first ChildSpySalesOrderAddress filtered by the po_box column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByPhone(string $phone) Return the first ChildSpySalesOrderAddress filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByCellPhone(string $cell_phone) Return the first ChildSpySalesOrderAddress filtered by the cell_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByDescription(string $description) Return the first ChildSpySalesOrderAddress filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByComment(string $comment) Return the first ChildSpySalesOrderAddress filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByEmail(string $email) Return the first ChildSpySalesOrderAddress filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByCreatedAt(string $created_at) Return the first ChildSpySalesOrderAddress filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySalesOrderAddress requireOneByUpdatedAt(string $updated_at) Return the first ChildSpySalesOrderAddress filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySalesOrderAddress objects based on current ModelCriteria
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByIdSalesOrderAddress(int $id_sales_order_address) Return ChildSpySalesOrderAddress objects filtered by the id_sales_order_address column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByFkCountry(int $fk_country) Return ChildSpySalesOrderAddress objects filtered by the fk_country column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByFkRegion(int $fk_region) Return ChildSpySalesOrderAddress objects filtered by the fk_region column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findBySalutation(int $salutation) Return ChildSpySalesOrderAddress objects filtered by the salutation column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByFirstName(string $first_name) Return ChildSpySalesOrderAddress objects filtered by the first_name column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByMiddleName(string $middle_name) Return ChildSpySalesOrderAddress objects filtered by the middle_name column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByLastName(string $last_name) Return ChildSpySalesOrderAddress objects filtered by the last_name column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByAddress1(string $address1) Return ChildSpySalesOrderAddress objects filtered by the address1 column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByAddress2(string $address2) Return ChildSpySalesOrderAddress objects filtered by the address2 column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByAddress3(string $address3) Return ChildSpySalesOrderAddress objects filtered by the address3 column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByCompany(string $company) Return ChildSpySalesOrderAddress objects filtered by the company column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByCity(string $city) Return ChildSpySalesOrderAddress objects filtered by the city column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByZipCode(string $zip_code) Return ChildSpySalesOrderAddress objects filtered by the zip_code column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByPoBox(string $po_box) Return ChildSpySalesOrderAddress objects filtered by the po_box column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByPhone(string $phone) Return ChildSpySalesOrderAddress objects filtered by the phone column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByCellPhone(string $cell_phone) Return ChildSpySalesOrderAddress objects filtered by the cell_phone column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByDescription(string $description) Return ChildSpySalesOrderAddress objects filtered by the description column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByComment(string $comment) Return ChildSpySalesOrderAddress objects filtered by the comment column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByEmail(string $email) Return ChildSpySalesOrderAddress objects filtered by the email column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpySalesOrderAddress objects filtered by the created_at column
 * @method     ChildSpySalesOrderAddress[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpySalesOrderAddress objects filtered by the updated_at column
 * @method     ChildSpySalesOrderAddress[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySalesOrderAddressQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySalesOrderAddressQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySalesOrderAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySalesOrderAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySalesOrderAddressQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySalesOrderAddressQuery) {
            return $criteria;
        }
        $query = new ChildSpySalesOrderAddressQuery();
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
     * @return ChildSpySalesOrderAddress|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySalesOrderAddressTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
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
     * @return ChildSpySalesOrderAddress A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sales_order_address, fk_country, fk_region, salutation, first_name, middle_name, last_name, address1, address2, address3, company, city, zip_code, po_box, phone, cell_phone, description, comment, email, created_at, updated_at FROM spy_sales_order_address WHERE id_sales_order_address = :p0';
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
            /** @var ChildSpySalesOrderAddress $obj */
            $obj = new ChildSpySalesOrderAddress();
            $obj->hydrate($row);
            SpySalesOrderAddressTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySalesOrderAddress|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderAddress(1234); // WHERE id_sales_order_address = 1234
     * $query->filterByIdSalesOrderAddress(array(12, 34)); // WHERE id_sales_order_address IN (12, 34)
     * $query->filterByIdSalesOrderAddress(array('min' => 12)); // WHERE id_sales_order_address > 12
     * </code>
     *
     * @param     mixed $idSalesOrderAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderAddress($idSalesOrderAddress = null, $comparison = null)
    {
        if (is_array($idSalesOrderAddress)) {
            $useMinMax = false;
            if (isset($idSalesOrderAddress['min'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderAddress['max'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByFkCountry($fkCountry = null, $comparison = null)
    {
        if (is_array($fkCountry)) {
            $useMinMax = false;
            if (isset($fkCountry['min'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $fkCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCountry['max'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $fkCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $fkCountry, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByFkRegion($fkRegion = null, $comparison = null)
    {
        if (is_array($fkRegion)) {
            $useMinMax = false;
            if (isset($fkRegion['min'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_REGION, $fkRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkRegion['max'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_REGION, $fkRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_REGION, $fkRegion, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        $valueSet = SpySalesOrderAddressTableMap::getValueSet(SpySalesOrderAddressTableMap::COL_SALUTATION);
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_SALUTATION, $salutation, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the middle_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMiddleName('fooValue');   // WHERE middle_name = 'fooValue'
     * $query->filterByMiddleName('%fooValue%'); // WHERE middle_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $middleName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByMiddleName($middleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($middleName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $middleName)) {
                $middleName = str_replace('*', '%', $middleName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_MIDDLE_NAME, $middleName, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_LAST_NAME, $lastName, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ADDRESS1, $address1, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ADDRESS2, $address2, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ADDRESS3, $address3, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_COMPANY, $company, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CITY, $city, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ZIP_CODE, $zipCode, $comparison);
    }

    /**
     * Filter the query on the po_box column
     *
     * Example usage:
     * <code>
     * $query->filterByPoBox('fooValue');   // WHERE po_box = 'fooValue'
     * $query->filterByPoBox('%fooValue%'); // WHERE po_box LIKE '%fooValue%'
     * </code>
     *
     * @param     string $poBox The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPoBox($poBox = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poBox)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $poBox)) {
                $poBox = str_replace('*', '%', $poBox);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_PO_BOX, $poBox, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CELL_PHONE, $cellPhone, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCountry object
     *
     * @param \Propel\SpyCountry|ObjectCollection $spyCountry The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCountry($spyCountry, $comparison = null)
    {
        if ($spyCountry instanceof \Propel\SpyCountry) {
            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $spyCountry->getIdCountry(), $comparison);
        } elseif ($spyCountry instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_COUNTRY, $spyCountry->toKeyValue('PrimaryKey', 'IdCountry'), $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyRegion object
     *
     * @param \Propel\SpyRegion|ObjectCollection $spyRegion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByRegion($spyRegion, $comparison = null)
    {
        if ($spyRegion instanceof \Propel\SpyRegion) {
            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_REGION, $spyRegion->getIdRegion(), $comparison);
        } elseif ($spyRegion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_FK_REGION, $spyRegion->toKeyValue('PrimaryKey', 'IdRegion'), $comparison);
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
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrderRelatedByFkSalesOrderAddressBilling($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $spySalesOrder->getFkSalesOrderAddressBilling(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            return $this
                ->useSpySalesOrderRelatedByFkSalesOrderAddressBillingQuery()
                ->filterByPrimaryKeys($spySalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySalesOrderRelatedByFkSalesOrderAddressBilling() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressBilling relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinSpySalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesOrderRelatedByFkSalesOrderAddressBilling');

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
            $this->addJoinObject($join, 'SpySalesOrderRelatedByFkSalesOrderAddressBilling');
        }

        return $this;
    }

    /**
     * Use the SpySalesOrderRelatedByFkSalesOrderAddressBilling relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesOrderRelatedByFkSalesOrderAddressBillingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrderRelatedByFkSalesOrderAddressBilling', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrder object
     *
     * @param \Propel\SpySalesOrder|ObjectCollection $spySalesOrder the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterBySpySalesOrderRelatedByFkSalesOrderAddressShipping($spySalesOrder, $comparison = null)
    {
        if ($spySalesOrder instanceof \Propel\SpySalesOrder) {
            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $spySalesOrder->getFkSalesOrderAddressShipping(), $comparison);
        } elseif ($spySalesOrder instanceof ObjectCollection) {
            return $this
                ->useSpySalesOrderRelatedByFkSalesOrderAddressShippingQuery()
                ->filterByPrimaryKeys($spySalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySalesOrderRelatedByFkSalesOrderAddressShipping() only accepts arguments of type \Propel\SpySalesOrder or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySalesOrderRelatedByFkSalesOrderAddressShipping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinSpySalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySalesOrderRelatedByFkSalesOrderAddressShipping');

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
            $this->addJoinObject($join, 'SpySalesOrderRelatedByFkSalesOrderAddressShipping');
        }

        return $this;
    }

    /**
     * Use the SpySalesOrderRelatedByFkSalesOrderAddressShipping relation SpySalesOrder object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useSpySalesOrderRelatedByFkSalesOrderAddressShippingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySalesOrderRelatedByFkSalesOrderAddressShipping', '\Propel\SpySalesOrderQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySalesOrderAddressHistory object
     *
     * @param \Propel\SpySalesOrderAddressHistory|ObjectCollection $spySalesOrderAddressHistory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterBySalesOrderAddressHistory($spySalesOrderAddressHistory, $comparison = null)
    {
        if ($spySalesOrderAddressHistory instanceof \Propel\SpySalesOrderAddressHistory) {
            return $this
                ->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $spySalesOrderAddressHistory->getFkSalesOrderAddress(), $comparison);
        } elseif ($spySalesOrderAddressHistory instanceof ObjectCollection) {
            return $this
                ->useSalesOrderAddressHistoryQuery()
                ->filterByPrimaryKeys($spySalesOrderAddressHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddressHistory() only accepts arguments of type \Propel\SpySalesOrderAddressHistory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddressHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddressHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddressHistory');

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
            $this->addJoinObject($join, 'SalesOrderAddressHistory');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddressHistory relation SpySalesOrderAddressHistory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySalesOrderAddressHistoryQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderAddressHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddressHistory', '\Propel\SpySalesOrderAddressHistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySalesOrderAddress $spySalesOrderAddress Object to remove from the list of results
     *
     * @return $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function prune($spySalesOrderAddress = null)
    {
        if ($spySalesOrderAddress) {
            $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, $spySalesOrderAddress->getIdSalesOrderAddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_sales_order_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySalesOrderAddressTableMap::clearInstancePool();
            SpySalesOrderAddressTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySalesOrderAddressTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySalesOrderAddressTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySalesOrderAddressTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderAddressTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderAddressTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpySalesOrderAddressTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpySalesOrderAddressTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpySalesOrderAddressQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpySalesOrderAddressTableMap::COL_CREATED_AT);
    }

} // SpySalesOrderAddressQuery
