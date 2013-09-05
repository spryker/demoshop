<?php


/**
 * Base class that represents a query for the 'pac_customer' table.
 *
 *
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByIdCustomer($order = Criteria::ASC) Order by the id_customer column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByFkCustomerStatus($order = Criteria::ASC) Order by the fk_customer_status column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByIncrementId($order = Criteria::ASC) Order by the increment_id column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByDateOfBirth($order = Criteria::ASC) Order by the date_of_birth column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByRestorePasswordKey($order = Criteria::ASC) Order by the restore_password_key column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByDefaultBillingAddress($order = Criteria::ASC) Order by the default_billing_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByDefaultShippingAddress($order = Criteria::ASC) Order by the default_shipping_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByIdCustomer() Group by the id_customer column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByFkCustomerStatus() Group by the fk_customer_status column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByEmail() Group by the email column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByIncrementId() Group by the increment_id column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupBySalutation() Group by the salutation column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByFirstName() Group by the first_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByLastName() Group by the last_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByGender() Group by the gender column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByDateOfBirth() Group by the date_of_birth column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByPassword() Group by the password column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByRestorePasswordKey() Group by the restore_password_key column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByDefaultBillingAddress() Group by the default_billing_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByDefaultShippingAddress() Group by the default_shipping_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinBillingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the BillingAddress relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinBillingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BillingAddress relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinBillingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the BillingAddress relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinShippingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAddress relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinShippingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAddress relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinShippingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAddress relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinCartUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartUser relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinCartUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartUser relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinCartUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CartUser relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinNewsletterSubscription($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewsletterSubscription relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinNewsletterSubscription($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewsletterSubscription relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinNewsletterSubscription($relationAlias = null) Adds a INNER JOIN clause to the query using the NewsletterSubscription relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinSalesruleCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesruleCode relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinSalesruleCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesruleCode relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinSalesruleCode($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesruleCode relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery leftJoinCodeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery rightJoinCodeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Customer_Persistence_PacCustomerQuery innerJoinCodeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the CodeUsage relation
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer matching the query
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer matching the query, or a new ProjectA_Zed_Customer_Persistence_PacCustomer object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByFkCustomerStatus(int $fk_customer_status) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the fk_customer_status column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByEmail(string $email) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the email column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByIncrementId(string $increment_id) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the increment_id column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneBySalutation(int $salutation) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the salutation column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByFirstName(string $first_name) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the first_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByLastName(string $last_name) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the last_name column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByGender(int $gender) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the gender column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByDateOfBirth(string $date_of_birth) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the date_of_birth column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByPassword(string $password) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the password column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByRestorePasswordKey(string $restore_password_key) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the restore_password_key column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByDefaultBillingAddress(int $default_billing_address) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the default_billing_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByDefaultShippingAddress(int $default_shipping_address) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the default_shipping_address column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the created_at column
 * @method ProjectA_Zed_Customer_Persistence_PacCustomer findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Customer_Persistence_PacCustomer filtered by the updated_at column
 *
 * @method array findByIdCustomer(int $id_customer) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the id_customer column
 * @method array findByFkCustomerStatus(int $fk_customer_status) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the fk_customer_status column
 * @method array findByEmail(string $email) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the email column
 * @method array findByIncrementId(string $increment_id) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the increment_id column
 * @method array findBySalutation(int $salutation) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the first_name column
 * @method array findByLastName(string $last_name) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the last_name column
 * @method array findByGender(int $gender) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the gender column
 * @method array findByDateOfBirth(string $date_of_birth) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the date_of_birth column
 * @method array findByPassword(string $password) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the password column
 * @method array findByRestorePasswordKey(string $restore_password_key) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the restore_password_key column
 * @method array findByDefaultBillingAddress(int $default_billing_address) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the default_billing_address column
 * @method array findByDefaultShippingAddress(int $default_shipping_address) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the default_shipping_address column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Customer_Persistence_PacCustomer objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/crm-package/ProjectA/Zed/Customer/Persistence.om
 */
abstract class Generated_Zed_Customer_Persistence_Om_BasePacCustomerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Customer_Persistence_Om_BasePacCustomerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Customer_Persistence_PacCustomer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Customer_Persistence_PacCustomerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Customer_Persistence_PacCustomerQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Customer_Persistence_PacCustomerQuery();
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
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomer|ProjectA_Zed_Customer_Persistence_PacCustomer[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomer A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCustomer($key, $con = null)
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
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomer A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_customer`, `fk_customer_status`, `email`, `increment_id`, `salutation`, `first_name`, `last_name`, `gender`, `date_of_birth`, `password`, `restore_password_key`, `default_billing_address`, `default_shipping_address`, `created_at`, `updated_at` FROM `pac_customer` WHERE `id_customer` = :p0';
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
            $obj = new ProjectA_Zed_Customer_Persistence_PacCustomer();
            $obj->hydrate($row);
            ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomer|ProjectA_Zed_Customer_Persistence_PacCustomer[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Customer_Persistence_PacCustomer[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomer(1234); // WHERE id_customer = 1234
     * $query->filterByIdCustomer(array(12, 34)); // WHERE id_customer IN (12, 34)
     * $query->filterByIdCustomer(array('min' => 12)); // WHERE id_customer >= 12
     * $query->filterByIdCustomer(array('max' => 12)); // WHERE id_customer <= 12
     * </code>
     *
     * @param     mixed $idCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByIdCustomer($idCustomer = null, $comparison = null)
    {
        if (is_array($idCustomer)) {
            $useMinMax = false;
            if (isset($idCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $idCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $idCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $idCustomer, $comparison);
    }

    /**
     * Filter the query on the fk_customer_status column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomerStatus(1234); // WHERE fk_customer_status = 1234
     * $query->filterByFkCustomerStatus(array(12, 34)); // WHERE fk_customer_status IN (12, 34)
     * $query->filterByFkCustomerStatus(array('min' => 12)); // WHERE fk_customer_status >= 12
     * $query->filterByFkCustomerStatus(array('max' => 12)); // WHERE fk_customer_status <= 12
     * </code>
     *
     * @see       filterByStatus()
     *
     * @param     mixed $fkCustomerStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByFkCustomerStatus($fkCustomerStatus = null, $comparison = null)
    {
        if (is_array($fkCustomerStatus)) {
            $useMinMax = false;
            if (isset($fkCustomerStatus['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $fkCustomerStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomerStatus['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $fkCustomerStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $fkCustomerStatus, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the increment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIncrementId('fooValue');   // WHERE increment_id = 'fooValue'
     * $query->filterByIncrementId('%fooValue%'); // WHERE increment_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $incrementId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByIncrementId($incrementId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($incrementId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $incrementId)) {
                $incrementId = str_replace('*', '%', $incrementId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::INCREMENT_ID, $incrementId, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getSqlValueForEnum(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getSqlValueForEnum(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::SALUTATION, $salutation, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * @param     mixed $gender The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (is_scalar($gender)) {
            $gender = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getSqlValueForEnum(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER, $gender);
        } elseif (is_array($gender)) {
            $convertedValues = array();
            foreach ($gender as $value) {
                $convertedValues[] = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getSqlValueForEnum(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER, $value);
            }
            $gender = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::GENDER, $gender, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
    {
        if (is_array($dateOfBirth)) {
            $useMinMax = false;
            if (isset($dateOfBirth['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOfBirth['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DATE_OF_BIRTH, $dateOfBirth, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::PASSWORD, $password, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::RESTORE_PASSWORD_KEY, $restorePasswordKey, $comparison);
    }

    /**
     * Filter the query on the default_billing_address column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultBillingAddress(1234); // WHERE default_billing_address = 1234
     * $query->filterByDefaultBillingAddress(array(12, 34)); // WHERE default_billing_address IN (12, 34)
     * $query->filterByDefaultBillingAddress(array('min' => 12)); // WHERE default_billing_address >= 12
     * $query->filterByDefaultBillingAddress(array('max' => 12)); // WHERE default_billing_address <= 12
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByDefaultBillingAddress($defaultBillingAddress = null, $comparison = null)
    {
        if (is_array($defaultBillingAddress)) {
            $useMinMax = false;
            if (isset($defaultBillingAddress['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $defaultBillingAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultBillingAddress['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $defaultBillingAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $defaultBillingAddress, $comparison);
    }

    /**
     * Filter the query on the default_shipping_address column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultShippingAddress(1234); // WHERE default_shipping_address = 1234
     * $query->filterByDefaultShippingAddress(array(12, 34)); // WHERE default_shipping_address IN (12, 34)
     * $query->filterByDefaultShippingAddress(array('min' => 12)); // WHERE default_shipping_address >= 12
     * $query->filterByDefaultShippingAddress(array('max' => 12)); // WHERE default_shipping_address <= 12
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByDefaultShippingAddress($defaultShippingAddress = null, $comparison = null)
    {
        if (is_array($defaultShippingAddress)) {
            $useMinMax = false;
            if (isset($defaultShippingAddress['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultShippingAddress['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $defaultShippingAddress, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomerAddress object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomerAddress|PropelObjectCollection $pacCustomerAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBillingAddress($pacCustomerAddress, $comparison = null)
    {
        if ($pacCustomerAddress instanceof ProjectA_Zed_Customer_Persistence_PacCustomerAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $pacCustomerAddress->getIdCustomerAddress(), $comparison);
        } elseif ($pacCustomerAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_BILLING_ADDRESS, $pacCustomerAddress->toKeyValue('PrimaryKey', 'IdCustomerAddress'), $comparison);
        } else {
            throw new PropelException('filterByBillingAddress() only accepts arguments of type ProjectA_Zed_Customer_Persistence_PacCustomerAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BillingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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
     * Use the BillingAddress relation PacCustomerAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useBillingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBillingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BillingAddress', 'ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomerAddress object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomerAddress|PropelObjectCollection $pacCustomerAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShippingAddress($pacCustomerAddress, $comparison = null)
    {
        if ($pacCustomerAddress instanceof ProjectA_Zed_Customer_Persistence_PacCustomerAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $pacCustomerAddress->getIdCustomerAddress(), $comparison);
        } elseif ($pacCustomerAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::DEFAULT_SHIPPING_ADDRESS, $pacCustomerAddress->toKeyValue('PrimaryKey', 'IdCustomerAddress'), $comparison);
        } else {
            throw new PropelException('filterByShippingAddress() only accepts arguments of type ProjectA_Zed_Customer_Persistence_PacCustomerAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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
     * Use the ShippingAddress relation PacCustomerAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useShippingAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShippingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAddress', 'ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomerStatus object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomerStatus|PropelObjectCollection $pacCustomerStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatus($pacCustomerStatus, $comparison = null)
    {
        if ($pacCustomerStatus instanceof ProjectA_Zed_Customer_Persistence_PacCustomerStatus) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $pacCustomerStatus->getIdCustomerStatus(), $comparison);
        } elseif ($pacCustomerStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::FK_CUSTOMER_STATUS, $pacCustomerStatus->toKeyValue('PrimaryKey', 'IdCustomerStatus'), $comparison);
        } else {
            throw new PropelException('filterByStatus() only accepts arguments of type ProjectA_Zed_Customer_Persistence_PacCustomerStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Status relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function joinStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Status');

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
            $this->addJoinObject($join, 'Status');
        }

        return $this;
    }

    /**
     * Use the Status relation PacCustomerStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomerStatusQuery A secondary query class using the current class as primary query
     */
    public function useStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Status', 'ProjectA_Zed_Customer_Persistence_PacCustomerStatusQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartUser object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUser|PropelObjectCollection $pacCartUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartUser($pacCartUser, $comparison = null)
    {
        if ($pacCartUser instanceof ProjectA_Zed_Cart_Persistence_PacCartUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacCartUser->getFkCustomer(), $comparison);
        } elseif ($pacCartUser instanceof PropelObjectCollection) {
            return $this
                ->useCartUserQuery()
                ->filterByPrimaryKeys($pacCartUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartUser() only accepts arguments of type ProjectA_Zed_Cart_Persistence_PacCartUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function joinCartUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartUser');

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
            $this->addJoinObject($join, 'CartUser');
        }

        return $this;
    }

    /**
     * Use the CartUser relation PacCartUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_PacCartUserQuery A secondary query class using the current class as primary query
     */
    public function useCartUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartUser', 'ProjectA_Zed_Cart_Persistence_PacCartUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomerAddress object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomerAddress|PropelObjectCollection $pacCustomerAddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAddress($pacCustomerAddress, $comparison = null)
    {
        if ($pacCustomerAddress instanceof ProjectA_Zed_Customer_Persistence_PacCustomerAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacCustomerAddress->getFkCustomer(), $comparison);
        } elseif ($pacCustomerAddress instanceof PropelObjectCollection) {
            return $this
                ->useAddressQuery()
                ->filterByPrimaryKeys($pacCustomerAddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAddress() only accepts arguments of type ProjectA_Zed_Customer_Persistence_PacCustomerAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Address relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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
     * Use the Address relation PacCustomerAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery A secondary query class using the current class as primary query
     */
    public function useAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Address', 'ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription object
     *
     * @param   ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription|PropelObjectCollection $pacNewsletterSubscription  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNewsletterSubscription($pacNewsletterSubscription, $comparison = null)
    {
        if ($pacNewsletterSubscription instanceof ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacNewsletterSubscription->getFkCustomer(), $comparison);
        } elseif ($pacNewsletterSubscription instanceof PropelObjectCollection) {
            return $this
                ->useNewsletterSubscriptionQuery()
                ->filterByPrimaryKeys($pacNewsletterSubscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNewsletterSubscription() only accepts arguments of type ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscription or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NewsletterSubscription relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function joinNewsletterSubscription($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NewsletterSubscription');

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
            $this->addJoinObject($join, 'NewsletterSubscription');
        }

        return $this;
    }

    /**
     * Use the NewsletterSubscription relation PacNewsletterSubscription object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useNewsletterSubscriptionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNewsletterSubscription($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NewsletterSubscription', 'ProjectA_Zed_Newsletter_Persistence_PacNewsletterSubscriptionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacSalesOrder->getFkCustomer(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($pacSalesOrder->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
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
     * Use the Order relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode|PropelObjectCollection $pacSalesruleCode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesruleCode($pacSalesruleCode, $comparison = null)
    {
        if ($pacSalesruleCode instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacSalesruleCode->getFkCustomer(), $comparison);
        } elseif ($pacSalesruleCode instanceof PropelObjectCollection) {
            return $this
                ->useSalesruleCodeQuery()
                ->filterByPrimaryKeys($pacSalesruleCode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesruleCode() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesruleCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function joinSalesruleCode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesruleCode');

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
            $this->addJoinObject($join, 'SalesruleCode');
        }

        return $this;
    }

    /**
     * Use the SalesruleCode relation PacSalesruleCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleCodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSalesruleCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesruleCode', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage|PropelObjectCollection $pacSalesruleCodeUsage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCodeUsage($pacSalesruleCodeUsage, $comparison = null)
    {
        if ($pacSalesruleCodeUsage instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacSalesruleCodeUsage->getFkCustomer(), $comparison);
        } elseif ($pacSalesruleCodeUsage instanceof PropelObjectCollection) {
            return $this
                ->useCodeUsageQuery()
                ->filterByPrimaryKeys($pacSalesruleCodeUsage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCodeUsage() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CodeUsage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function joinCodeUsage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CodeUsage');

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
            $this->addJoinObject($join, 'CodeUsage');
        }

        return $this;
    }

    /**
     * Use the CodeUsage relation PacSalesruleCodeUsage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery A secondary query class using the current class as primary query
     */
    public function useCodeUsageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCodeUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomer $pacCustomer Object to remove from the list of results
     *
     * @return ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function prune($pacCustomer = null)
    {
        if ($pacCustomer) {
            $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $pacCustomer->getIdCustomer(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Customer_Persistence_PacCustomerQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Customer_Persistence_PacCustomerPeer::CREATED_AT);
    }
}
