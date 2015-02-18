<?php


/**
 * Base class that represents a query for the 'pac_sales_order_address' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByIdSalesOrderAddress($order = Criteria::ASC) Order by the id_sales_order_address column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByFkMiscRegion($order = Criteria::ASC) Order by the fk_misc_region column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByPoBox($order = Criteria::ASC) Order by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByIdSalesOrderAddress() Group by the id_sales_order_address column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByFkMiscRegion() Group by the fk_misc_region column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupBySalutation() Group by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByFirstName() Group by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByMiddleName() Group by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByLastName() Group by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByAddress1() Group by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByAddress2() Group by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByAddress3() Group by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByCompany() Group by the company column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByCity() Group by the city column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByZipCode() Group by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByPoBox() Group by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByPhone() Group by the phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByCellPhone() Group by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByComment() Group by the comment column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByEmail() Group by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoinSalesOrderAddressHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoinSalesOrderAddressHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddressHistory relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoinSalesOrderAddressHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddressHistory relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoinPacSalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressBilling relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoinPacSalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressBilling relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoinPacSalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null) Adds a INNER JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressBilling relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery leftJoinPacSalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressShipping relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery rightJoinPacSalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressShipping relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery innerJoinPacSalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null) Adds a INNER JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressShipping relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByFkMiscCountry(int $fk_misc_country) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByFkMiscRegion(int $fk_misc_region) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the fk_misc_region column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneBySalutation(int $salutation) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByFirstName(string $first_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByMiddleName(string $middle_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByLastName(string $last_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByAddress1(string $address1) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByAddress2(string $address2) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByAddress3(string $address3) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByCompany(string $company) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the company column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByCity(string $city) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the city column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByZipCode(string $zip_code) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByPoBox(string $po_box) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByPhone(string $phone) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByCellPhone(string $cell_phone) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByDescription(string $description) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the description column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByComment(string $comment) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the comment column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByEmail(string $email) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress filtered by the updated_at column
 *
 * @method array findByIdSalesOrderAddress(int $id_sales_order_address) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the id_sales_order_address column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the fk_misc_country column
 * @method array findByFkMiscRegion(int $fk_misc_region) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the fk_misc_region column
 * @method array findBySalutation(int $salutation) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the first_name column
 * @method array findByMiddleName(string $middle_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the middle_name column
 * @method array findByLastName(string $last_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the last_name column
 * @method array findByAddress1(string $address1) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the address1 column
 * @method array findByAddress2(string $address2) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the address2 column
 * @method array findByAddress3(string $address3) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the address3 column
 * @method array findByCompany(string $company) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the company column
 * @method array findByCity(string $city) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the city column
 * @method array findByZipCode(string $zip_code) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the zip_code column
 * @method array findByPoBox(string $po_box) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the po_box column
 * @method array findByPhone(string $phone) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the phone column
 * @method array findByCellPhone(string $cell_phone) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the cell_phone column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the description column
 * @method array findByComment(string $comment) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the comment column
 * @method array findByEmail(string $email) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the email column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesOrderAddress']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderAddress($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_address`, `fk_misc_country`, `fk_misc_region`, `salutation`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `address3`, `company`, `city`, `zip_code`, `po_box`, `phone`, `cell_phone`, `description`, `comment`, `email`, `created_at`, `updated_at` FROM `pac_sales_order_address` WHERE `id_sales_order_address` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderAddress(1234); // WHERE id_sales_order_address = 1234
     * $query->filterByIdSalesOrderAddress(array(12, 34)); // WHERE id_sales_order_address IN (12, 34)
     * $query->filterByIdSalesOrderAddress(array('min' => 12)); // WHERE id_sales_order_address >= 12
     * $query->filterByIdSalesOrderAddress(array('max' => 12)); // WHERE id_sales_order_address <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderAddress($idSalesOrderAddress = null, $comparison = null)
    {
        if (is_array($idSalesOrderAddress)) {
            $useMinMax = false;
            if (isset($idSalesOrderAddress['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderAddress['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $idSalesOrderAddress, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByFkMiscRegion($fkMiscRegion = null, $comparison = null)
    {
        if (is_array($fkMiscRegion)) {
            $useMinMax = false;
            if (isset($fkMiscRegion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscRegion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_REGION, $fkMiscRegion, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::SALUTATION, $salutation, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::MIDDLE_NAME, $middleName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::LAST_NAME, $lastName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ADDRESS1, $address1, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ADDRESS2, $address2, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ADDRESS3, $address3, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::COMPANY, $company, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CITY, $city, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ZIP_CODE, $zipCode, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::PO_BOX, $poBox, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::PHONE, $phone, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CELL_PHONE, $cellPhone, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::DESCRIPTION, $description, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::COMMENT, $comment, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::EMAIL, $email, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($pacMiscRegion, $comparison = null)
    {
        if ($pacMiscRegion instanceof ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_REGION, $pacMiscRegion->getIdMiscRegion(), $comparison);
        } elseif ($pacMiscRegion instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::FK_MISC_REGION, $pacMiscRegion->toKeyValue('PrimaryKey', 'IdMiscRegion'), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory|PropelObjectCollection $pacSalesOrderAddressHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderAddressHistory($pacSalesOrderAddressHistory, $comparison = null)
    {
        if ($pacSalesOrderAddressHistory instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrderAddressHistory->getFkSalesOrderAddress(), $comparison);
        } elseif ($pacSalesOrderAddressHistory instanceof PropelObjectCollection) {
            return $this
                ->useSalesOrderAddressHistoryQuery()
                ->filterByPrimaryKeys($pacSalesOrderAddressHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesOrderAddressHistory() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddressHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
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
     * Use the SalesOrderAddressHistory relation PacSalesOrderAddressHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderAddressHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddressHistory', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacSalesOrderRelatedByFkSalesOrderAddressBilling($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrder->getFkSalesOrderAddressBilling(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            return $this
                ->usePacSalesOrderRelatedByFkSalesOrderAddressBillingQuery()
                ->filterByPrimaryKeys($pacSalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacSalesOrderRelatedByFkSalesOrderAddressBilling() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressBilling relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinPacSalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacSalesOrderRelatedByFkSalesOrderAddressBilling');

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
            $this->addJoinObject($join, 'PacSalesOrderRelatedByFkSalesOrderAddressBilling');
        }

        return $this;
    }

    /**
     * Use the PacSalesOrderRelatedByFkSalesOrderAddressBilling relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function usePacSalesOrderRelatedByFkSalesOrderAddressBillingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacSalesOrderRelatedByFkSalesOrderAddressBilling($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacSalesOrderRelatedByFkSalesOrderAddressBilling', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacSalesOrderRelatedByFkSalesOrderAddressShipping($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrder->getFkSalesOrderAddressShipping(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            return $this
                ->usePacSalesOrderRelatedByFkSalesOrderAddressShippingQuery()
                ->filterByPrimaryKeys($pacSalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacSalesOrderRelatedByFkSalesOrderAddressShipping() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacSalesOrderRelatedByFkSalesOrderAddressShipping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function joinPacSalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacSalesOrderRelatedByFkSalesOrderAddressShipping');

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
            $this->addJoinObject($join, 'PacSalesOrderRelatedByFkSalesOrderAddressShipping');
        }

        return $this;
    }

    /**
     * Use the PacSalesOrderRelatedByFkSalesOrderAddressShipping relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function usePacSalesOrderRelatedByFkSalesOrderAddressShippingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacSalesOrderRelatedByFkSalesOrderAddressShipping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacSalesOrderRelatedByFkSalesOrderAddressShipping', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress $pacSalesOrderAddress Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderAddress = null)
    {
        if ($pacSalesOrderAddress) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $pacSalesOrderAddress->getIdSalesOrderAddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::CREATED_AT);
    }
}
