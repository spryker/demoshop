<?php


/**
 * Base class that represents a query for the 'pac_sales_order_address_history' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByIdSalesOrderAddressHistory($order = Criteria::ASC) Order by the id_sales_order_address_history column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByFkMiscCountry($order = Criteria::ASC) Order by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByFkSalesOrderAddress($order = Criteria::ASC) Order by the fk_sales_order_address column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByIsBilling($order = Criteria::ASC) Order by the is_billing column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByZipCode($order = Criteria::ASC) Order by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByPoBox($order = Criteria::ASC) Order by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByCellPhone($order = Criteria::ASC) Order by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByIdSalesOrderAddressHistory() Group by the id_sales_order_address_history column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByFkMiscCountry() Group by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByFkSalesOrderAddress() Group by the fk_sales_order_address column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByIsBilling() Group by the is_billing column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupBySalutation() Group by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByFirstName() Group by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByMiddleName() Group by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByLastName() Group by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByAddress1() Group by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByAddress2() Group by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByAddress3() Group by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByCompany() Group by the company column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByCity() Group by the city column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByZipCode() Group by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByPoBox() Group by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByPhone() Group by the phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByCellPhone() Group by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByComment() Group by the comment column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByEmail() Group by the email column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery leftJoinSalesOrderAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrderAddress relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery rightJoinSalesOrderAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrderAddress relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery innerJoinSalesOrderAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrderAddress relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory matching the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory matching the query, or a new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByFkMiscCountry(int $fk_misc_country) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the fk_misc_country column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByFkSalesOrderAddress(int $fk_sales_order_address) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the fk_sales_order_address column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByIsBilling(boolean $is_billing) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the is_billing column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneBySalutation(int $salutation) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByFirstName(string $first_name) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByMiddleName(string $middle_name) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the middle_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByLastName(string $last_name) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByAddress1(string $address1) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the address1 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByAddress2(string $address2) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the address2 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByAddress3(string $address3) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the address3 column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByCompany(string $company) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the company column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByCity(string $city) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the city column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByZipCode(string $zip_code) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the zip_code column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByPoBox(string $po_box) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the po_box column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByPhone(string $phone) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByCellPhone(string $cell_phone) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the cell_phone column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByDescription(string $description) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the description column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByComment(string $comment) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the comment column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByEmail(string $email) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the email column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory filtered by the updated_at column
 *
 * @method array findByIdSalesOrderAddressHistory(int $id_sales_order_address_history) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the id_sales_order_address_history column
 * @method array findByFkMiscCountry(int $fk_misc_country) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the fk_misc_country column
 * @method array findByFkSalesOrderAddress(int $fk_sales_order_address) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the fk_sales_order_address column
 * @method array findByIsBilling(boolean $is_billing) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the is_billing column
 * @method array findBySalutation(int $salutation) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the first_name column
 * @method array findByMiddleName(string $middle_name) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the middle_name column
 * @method array findByLastName(string $last_name) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the last_name column
 * @method array findByAddress1(string $address1) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the address1 column
 * @method array findByAddress2(string $address2) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the address2 column
 * @method array findByAddress3(string $address3) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the address3 column
 * @method array findByCompany(string $company) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the company column
 * @method array findByCity(string $city) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the city column
 * @method array findByZipCode(string $zip_code) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the zip_code column
 * @method array findByPoBox(string $po_box) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the po_box column
 * @method array findByPhone(string $phone) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the phone column
 * @method array findByCellPhone(string $cell_phone) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the cell_phone column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the description column
 * @method array findByComment(string $comment) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the comment column
 * @method array findByEmail(string $email) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the email column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderAddressHistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderAddressHistoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrderAddressHistory($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order_address_history`, `fk_misc_country`, `fk_sales_order_address`, `is_billing`, `salutation`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `address3`, `company`, `city`, `zip_code`, `po_box`, `phone`, `cell_phone`, `description`, `comment`, `email`, `created_at`, `updated_at` FROM `pac_sales_order_address_history` WHERE `id_sales_order_address_history` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order_address_history column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrderAddressHistory(1234); // WHERE id_sales_order_address_history = 1234
     * $query->filterByIdSalesOrderAddressHistory(array(12, 34)); // WHERE id_sales_order_address_history IN (12, 34)
     * $query->filterByIdSalesOrderAddressHistory(array('min' => 12)); // WHERE id_sales_order_address_history >= 12
     * $query->filterByIdSalesOrderAddressHistory(array('max' => 12)); // WHERE id_sales_order_address_history <= 12
     * </code>
     *
     * @param     mixed $idSalesOrderAddressHistory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrderAddressHistory($idSalesOrderAddressHistory = null, $comparison = null)
    {
        if (is_array($idSalesOrderAddressHistory)) {
            $useMinMax = false;
            if (isset($idSalesOrderAddressHistory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $idSalesOrderAddressHistory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrderAddressHistory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $idSalesOrderAddressHistory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $idSalesOrderAddressHistory, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByFkMiscCountry($fkMiscCountry = null, $comparison = null)
    {
        if (is_array($fkMiscCountry)) {
            $useMinMax = false;
            if (isset($fkMiscCountry['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $fkMiscCountry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMiscCountry['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $fkMiscCountry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $fkMiscCountry, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_address column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderAddress(1234); // WHERE fk_sales_order_address = 1234
     * $query->filterByFkSalesOrderAddress(array(12, 34)); // WHERE fk_sales_order_address IN (12, 34)
     * $query->filterByFkSalesOrderAddress(array('min' => 12)); // WHERE fk_sales_order_address >= 12
     * $query->filterByFkSalesOrderAddress(array('max' => 12)); // WHERE fk_sales_order_address <= 12
     * </code>
     *
     * @see       filterBySalesOrderAddress()
     *
     * @param     mixed $fkSalesOrderAddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderAddress($fkSalesOrderAddress = null, $comparison = null)
    {
        if (is_array($fkSalesOrderAddress)) {
            $useMinMax = false;
            if (isset($fkSalesOrderAddress['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $fkSalesOrderAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderAddress['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $fkSalesOrderAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $fkSalesOrderAddress, $comparison);
    }

    /**
     * Filter the query on the is_billing column
     *
     * Example usage:
     * <code>
     * $query->filterByIsBilling(true); // WHERE is_billing = true
     * $query->filterByIsBilling('yes'); // WHERE is_billing = true
     * </code>
     *
     * @param     boolean|string $isBilling The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByIsBilling($isBilling = null, $comparison = null)
    {
        if (is_string($isBilling)) {
            $isBilling = in_array(strtolower($isBilling), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::IS_BILLING, $isBilling, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::SALUTATION, $salutation, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME, $middleName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::LAST_NAME, $lastName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS1, $address1, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS2, $address2, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ADDRESS3, $address3, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMPANY, $company, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CITY, $city, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ZIP_CODE, $zipCode, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PO_BOX, $poBox, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::PHONE, $phone, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CELL_PHONE, $cellPhone, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::DESCRIPTION, $description, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::COMMENT, $comment, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::EMAIL, $email, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Misc_Persistence_PacMiscCountry object
     *
     * @param   ProjectA_Zed_Misc_Persistence_PacMiscCountry|PropelObjectCollection $pacMiscCountry The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCountry($pacMiscCountry, $comparison = null)
    {
        if ($pacMiscCountry instanceof ProjectA_Zed_Misc_Persistence_PacMiscCountry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $pacMiscCountry->getIdMiscCountry(), $comparison);
        } elseif ($pacMiscCountry instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, $pacMiscCountry->toKeyValue('PrimaryKey', 'IdMiscCountry'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type ProjectA_Zed_Misc_Persistence_PacMiscCountry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress|PropelObjectCollection $pacSalesOrderAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrderAddress($pacSalesOrderAddress, $comparison = null)
    {
        if ($pacSalesOrderAddress instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $pacSalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($pacSalesOrderAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, $pacSalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterBySalesOrderAddress() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrderAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function joinSalesOrderAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrderAddress');

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
            $this->addJoinObject($join, 'SalesOrderAddress');
        }

        return $this;
    }

    /**
     * Use the SalesOrderAddress relation PacSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrderAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrderAddress', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory $pacSalesOrderAddressHistory Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrderAddressHistory = null)
    {
        if ($pacSalesOrderAddressHistory) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $pacSalesOrderAddressHistory->getIdSalesOrderAddressHistory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistoryPeer::CREATED_AT);
    }
}
