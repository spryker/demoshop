<?php


/**
 * Base class that represents a query for the 'pac_customer2_address' table.
 *
 *
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByIdCustomerAddress($order = Criteria::ASC) Order by the id_customer_address column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByFkMiscRegion($order = Criteria::ASC) Order by the fk_misc_region column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByPoBox($order = Criteria::ASC) Order by the po_box column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByIdCustomerAddress() Group by the id_customer_address column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByFkCustomer() Group by the fk_customer column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByFkMiscRegion() Group by the fk_misc_region column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupBySalutation() Group by the salutation column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByFirstName() Group by the first_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByMiddleName() Group by the middle_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByLastName() Group by the last_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByAddress1() Group by the address1 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByAddress2() Group by the address2 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByAddress3() Group by the address3 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByCompany() Group by the company column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByCity() Group by the city column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByZipCode() Group by the zip_code column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByPoBox() Group by the po_box column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByPhone() Group by the phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByCellPhone() Group by the cell_phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByComment() Group by the comment column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByDeletedAt() Group by the deleted_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoinCustomer2($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoinCustomer2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoinCustomer2($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer2 relation
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoinCustomerBillingAddress2($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerBillingAddress2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoinCustomerBillingAddress2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerBillingAddress2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoinCustomerBillingAddress2($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerBillingAddress2 relation
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery leftJoinCustomerShippingAddress2($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerShippingAddress2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery rightJoinCustomerShippingAddress2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerShippingAddress2 relation
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery innerJoinCustomerShippingAddress2($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerShippingAddress2 relation
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address matching the query
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address matching the query, or a new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByFkCustomer(int $fk_customer) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the fk_customer column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByFkMiscCountry(int $fk_misc_country) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the fk_misc_country column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByFkMiscRegion(int $fk_misc_region) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the fk_misc_region column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneBySalutation(int $salutation) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the salutation column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByFirstName(string $first_name) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the first_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByMiddleName(string $middle_name) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the middle_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByLastName(string $last_name) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the last_name column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByAddress1(string $address1) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the address1 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByAddress2(string $address2) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the address2 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByAddress3(string $address3) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the address3 column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByCompany(string $company) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the company column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByCity(string $city) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the city column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByZipCode(string $zip_code) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the zip_code column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByPoBox(string $po_box) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the po_box column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByPhone(string $phone) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByCellPhone(string $cell_phone) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the cell_phone column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByComment(string $comment) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the comment column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByIsDeleted(int $is_deleted) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the is_deleted column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByDeletedAt(string $deleted_at) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the deleted_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the created_at column
 * @method ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address filtered by the updated_at column
 *
 * @method array findByIdCustomerAddress(int $id_customer_address) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the id_customer_address column
 * @method array findByFkCustomer(int $fk_customer) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the fk_customer column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the fk_misc_country column
 * @method array findByFkMiscRegion(int $fk_misc_region) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the fk_misc_region column
 * @method array findBySalutation(int $salutation) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the first_name column
 * @method array findByMiddleName(string $middle_name) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the middle_name column
 * @method array findByLastName(string $last_name) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the last_name column
 * @method array findByAddress1(string $address1) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the address1 column
 * @method array findByAddress2(string $address2) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the address2 column
 * @method array findByAddress3(string $address3) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the address3 column
 * @method array findByCompany(string $company) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the company column
 * @method array findByCity(string $city) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the city column
 * @method array findByZipCode(string $zip_code) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the zip_code column
 * @method array findByPoBox(string $po_box) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the po_box column
 * @method array findByPhone(string $phone) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the phone column
 * @method array findByCellPhone(string $cell_phone) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the cell_phone column
 * @method array findByComment(string $comment) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the comment column
 * @method array findByIsDeleted(int $is_deleted) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the is_deleted column
 * @method array findByDeletedAt(string $deleted_at) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the deleted_at column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer2/Persistence/Propel.om
 */
abstract class Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2AddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2AddressQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCustomer2Address']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCustomerAddress($key, $con = null)
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
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_customer_address`, `fk_customer`, `fk_misc_country`, `fk_misc_region`, `salutation`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `address3`, `company`, `city`, `zip_code`, `po_box`, `phone`, `cell_phone`, `comment`, `is_deleted`, `deleted_at`, `created_at`, `updated_at` FROM `pac_customer2_address` WHERE `id_customer_address` = :p0';
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
            $obj = new ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address();
            $obj->hydrate($row);
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomerAddress(1234); // WHERE id_customer_address = 1234
     * $query->filterByIdCustomerAddress(array(12, 34)); // WHERE id_customer_address IN (12, 34)
     * $query->filterByIdCustomerAddress(array('min' => 12)); // WHERE id_customer_address >= 12
     * $query->filterByIdCustomerAddress(array('max' => 12)); // WHERE id_customer_address <= 12
     * </code>
     *
     * @param     mixed $idCustomerAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByIdCustomerAddress($idCustomerAddress = null, $comparison = null)
    {
        if (is_array($idCustomerAddress)) {
            $useMinMax = false;
            if (isset($idCustomerAddress['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $idCustomerAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomerAddress['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $idCustomerAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $idCustomerAddress, $comparison);
    }

    /**
     * Filter the query on the fk_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomer(1234); // WHERE fk_customer = 1234
     * $query->filterByFkCustomer(array(12, 34)); // WHERE fk_customer IN (12, 34)
     * $query->filterByFkCustomer(array('min' => 12)); // WHERE fk_customer >= 12
     * $query->filterByFkCustomer(array('max' => 12)); // WHERE fk_customer <= 12
     * </code>
     *
     * @see       filterByCustomer2()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query on the fk_misc_country column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscCountry(1234); // WHERE fk_misc_country = 1234
     * $query->filterByFkMiscCountry(array(12, 34)); // WHERE fk_misc_country IN (12, 34)
     * $query->filterByFkMiscCountry(array('min' => 12)); // WHERE fk_misc_country >= 12
     * $query->filterByFkMiscCountry(array('max' => 12)); // WHERE fk_misc_country <= 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $fkMiscCountry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
    }

    /**
     * Filter the query on the fk_misc_region column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMiscRegion(1234); // WHERE fk_misc_region = 1234
     * $query->filterByFkMiscRegion(array(12, 34)); // WHERE fk_misc_region IN (12, 34)
     * $query->filterByFkMiscRegion(array('min' => 12)); // WHERE fk_misc_region >= 12
     * $query->filterByFkMiscRegion(array('max' => 12)); // WHERE fk_misc_region <= 12
     * </code>
     *
     * @see       filterByRegion()
     *
     * @param     mixed $fkMiscRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByFkMiscRegion($fkMiscRegion = null, $comparison = null)
    {
        if (is_array($fkMiscRegion)) {
            $useMinMax = false;
            if (isset($fkMiscRegion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $fkMiscRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscRegion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $fkMiscRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $fkMiscRegion, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getSqlValueForEnum(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getSqlValueForEnum(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::SALUTATION, $salutation, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::MIDDLE_NAME, $middleName, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::LAST_NAME, $lastName, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS1, $address1, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS2, $address2, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ADDRESS3, $address3, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMPANY, $company, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CITY, $city, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ZIP_CODE, $zipCode, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PO_BOX, $poBox, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::PHONE, $phone, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CELL_PHONE, $cellPhone, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(1234); // WHERE is_deleted = 1234
     * $query->filterByIsDeleted(array(12, 34)); // WHERE is_deleted IN (12, 34)
     * $query->filterByIsDeleted(array('min' => 12)); // WHERE is_deleted >= 12
     * $query->filterByIsDeleted(array('max' => 12)); // WHERE is_deleted <= 12
     * </code>
     *
     * @param     mixed $isDeleted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_array($isDeleted)) {
            $useMinMax = false;
            if (isset($isDeleted['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED, $isDeleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isDeleted['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED, $isDeleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at < '2011-03-13'
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::DELETED_AT, $deletedAt, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
     *
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2|PropelObjectCollection $pacCustomer2 The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer2($pacCustomer2, $comparison = null)
    {
        if ($pacCustomer2 instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $pacCustomer2->getIdCustomer(), $comparison);
        } elseif ($pacCustomer2 instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_CUSTOMER, $pacCustomer2->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomer2() only accepts arguments of type ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function joinCustomer2($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer2');

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
            $this->addJoinObject($join, 'Customer2');
        }

        return $this;
    }

    /**
     * Use the Customer2 relation PacCustomer2 object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query A secondary query class using the current class as primary query
     */
    public function useCustomer2Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer2', 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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
     * Use the Country relation PacMiscCountry object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', 'ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion object
     *
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion|PropelObjectCollection $pacMiscRegion The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($pacMiscRegion, $comparison = null)
    {
        if ($pacMiscRegion instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $pacMiscRegion->getIdMiscRegion(), $comparison);
        } elseif ($pacMiscRegion instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::FK_MISC_REGION, $pacMiscRegion->toKeyValue('PrimaryKey', 'IdMiscRegion'), $comparison);
        } else {
            throw new PropelException('filterByRegion() only accepts arguments of type ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Region relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
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
     * Use the Region relation PacMiscRegion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery A secondary query class using the current class as primary query
     */
    public function useRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Region', 'ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
     *
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2|PropelObjectCollection $pacCustomer2  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerBillingAddress2($pacCustomer2, $comparison = null)
    {
        if ($pacCustomer2 instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $pacCustomer2->getDefaultBillingAddress(), $comparison);
        } elseif ($pacCustomer2 instanceof PropelObjectCollection) {
            return $this
                ->useCustomerBillingAddress2Query()
                ->filterByPrimaryKeys($pacCustomer2->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerBillingAddress2() only accepts arguments of type ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerBillingAddress2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function joinCustomerBillingAddress2($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerBillingAddress2');

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
            $this->addJoinObject($join, 'CustomerBillingAddress2');
        }

        return $this;
    }

    /**
     * Use the CustomerBillingAddress2 relation PacCustomer2 object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query A secondary query class using the current class as primary query
     */
    public function useCustomerBillingAddress2Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerBillingAddress2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerBillingAddress2', 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
     *
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2|PropelObjectCollection $pacCustomer2  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomerShippingAddress2($pacCustomer2, $comparison = null)
    {
        if ($pacCustomer2 instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $pacCustomer2->getDefaultShippingAddress(), $comparison);
        } elseif ($pacCustomer2 instanceof PropelObjectCollection) {
            return $this
                ->useCustomerShippingAddress2Query()
                ->filterByPrimaryKeys($pacCustomer2->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCustomerShippingAddress2() only accepts arguments of type ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerShippingAddress2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function joinCustomerShippingAddress2($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerShippingAddress2');

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
            $this->addJoinObject($join, 'CustomerShippingAddress2');
        }

        return $this;
    }

    /**
     * Use the CustomerShippingAddress2 relation PacCustomer2 object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query A secondary query class using the current class as primary query
     */
    public function useCustomerShippingAddress2Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomerShippingAddress2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerShippingAddress2', 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Query');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address $pacCustomer2Address Object to remove from the list of results
     *
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function prune($pacCustomer2Address = null)
    {
        if ($pacCustomer2Address) {
            $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $pacCustomer2Address->getIdCustomerAddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::CREATED_AT);
    }
}
