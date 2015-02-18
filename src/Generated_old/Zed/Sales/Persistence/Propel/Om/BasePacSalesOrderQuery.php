<?php


/**
 * Base class that represents a query for the 'pac_sales_order' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByIdSalesOrder($order = Criteria::ASC) Order by the id_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByFkSalesOrderAddressBilling($order = Criteria::ASC) Order by the fk_sales_order_address_billing column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByFkSalesOrderAddressShipping($order = Criteria::ASC) Order by the fk_sales_order_address_shipping column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderBySalutation($order = Criteria::ASC) Order by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByCustomerSessionId($order = Criteria::ASC) Order by the customer_session_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByIncrementId($order = Criteria::ASC) Order by the increment_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByGrandTotal($order = Criteria::ASC) Order by the grand_total column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByIsTest($order = Criteria::ASC) Order by the is_test column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByIdSalesOrder() Group by the id_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByFkSalesOrderAddressBilling() Group by the fk_sales_order_address_billing column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByFkSalesOrderAddressShipping() Group by the fk_sales_order_address_shipping column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByFkCustomer() Group by the fk_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByEmail() Group by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupBySalutation() Group by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByFirstName() Group by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByLastName() Group by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByCustomerSessionId() Group by the customer_session_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByIncrementId() Group by the increment_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByGrandTotal() Group by the grand_total column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupBySubtotal() Group by the subtotal column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByIsTest() Group by the is_test column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinBillingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the BillingAddress relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinBillingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BillingAddress relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinBillingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the BillingAddress relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinShippingAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingAddress relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinShippingAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingAddress relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinShippingAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingAddress relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Document relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Document relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Document relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinInvoice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinInvoice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Invoice relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinInvoice($relationAlias = null) Adds a INNER JOIN clause to the query using the Invoice relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinTransitionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinTransitionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransitionLog relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinTransitionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TransitionLog relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Payment relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Item relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Item relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinItem($relationAlias = null) Adds a INNER JOIN clause to the query using the Item relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinOrderComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderComment relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinOrderComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderComment relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinOrderComment($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderComment relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery leftJoinCodeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery rightJoinCodeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery innerJoinCodeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the CodeUsage relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByFkSalesOrderAddressBilling(int $fk_sales_order_address_billing) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the fk_sales_order_address_billing column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByFkSalesOrderAddressShipping(int $fk_sales_order_address_shipping) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the fk_sales_order_address_shipping column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByFkCustomer(int $fk_customer) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the fk_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByEmail(string $email) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the email column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneBySalutation(int $salutation) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the salutation column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByFirstName(string $first_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the first_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByLastName(string $last_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the last_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByCustomerSessionId(string $customer_session_id) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the customer_session_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByIncrementId(string $increment_id) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the increment_id column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByGrandTotal(int $grand_total) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the grand_total column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneBySubtotal(int $subtotal) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the subtotal column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByIsTest(boolean $is_test) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the is_test column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder filtered by the updated_at column
 *
 * @method array findByIdSalesOrder(int $id_sales_order) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the id_sales_order column
 * @method array findByFkSalesOrderAddressBilling(int $fk_sales_order_address_billing) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the fk_sales_order_address_billing column
 * @method array findByFkSalesOrderAddressShipping(int $fk_sales_order_address_shipping) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the fk_sales_order_address_shipping column
 * @method array findByFkCustomer(int $fk_customer) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the fk_customer column
 * @method array findByEmail(string $email) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the email column
 * @method array findBySalutation(int $salutation) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the salutation column
 * @method array findByFirstName(string $first_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the first_name column
 * @method array findByLastName(string $last_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the last_name column
 * @method array findByCustomerSessionId(string $customer_session_id) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the customer_session_id column
 * @method array findByIncrementId(string $increment_id) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the increment_id column
 * @method array findByGrandTotal(int $grand_total) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the grand_total column
 * @method array findBySubtotal(int $subtotal) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the subtotal column
 * @method array findByIsTest(boolean $is_test) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the is_test column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesOrder']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrder($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order`, `fk_sales_order_address_billing`, `fk_sales_order_address_shipping`, `fk_customer`, `email`, `salutation`, `first_name`, `last_name`, `customer_session_id`, `increment_id`, `grand_total`, `subtotal`, `is_test`, `created_at`, `updated_at` FROM `pac_sales_order` WHERE `id_sales_order` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrder(1234); // WHERE id_sales_order = 1234
     * $query->filterByIdSalesOrder(array(12, 34)); // WHERE id_sales_order IN (12, 34)
     * $query->filterByIdSalesOrder(array('min' => 12)); // WHERE id_sales_order >= 12
     * $query->filterByIdSalesOrder(array('max' => 12)); // WHERE id_sales_order <= 12
     * </code>
     *
     * @param     mixed $idSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrder($idSalesOrder = null, $comparison = null)
    {
        if (is_array($idSalesOrder)) {
            $useMinMax = false;
            if (isset($idSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_address_billing column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderAddressBilling(1234); // WHERE fk_sales_order_address_billing = 1234
     * $query->filterByFkSalesOrderAddressBilling(array(12, 34)); // WHERE fk_sales_order_address_billing IN (12, 34)
     * $query->filterByFkSalesOrderAddressBilling(array('min' => 12)); // WHERE fk_sales_order_address_billing >= 12
     * $query->filterByFkSalesOrderAddressBilling(array('max' => 12)); // WHERE fk_sales_order_address_billing <= 12
     * </code>
     *
     * @see       filterByBillingAddress()
     *
     * @param     mixed $fkSalesOrderAddressBilling The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderAddressBilling($fkSalesOrderAddressBilling = null, $comparison = null)
    {
        if (is_array($fkSalesOrderAddressBilling)) {
            $useMinMax = false;
            if (isset($fkSalesOrderAddressBilling['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderAddressBilling['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $fkSalesOrderAddressBilling, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_address_shipping column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderAddressShipping(1234); // WHERE fk_sales_order_address_shipping = 1234
     * $query->filterByFkSalesOrderAddressShipping(array(12, 34)); // WHERE fk_sales_order_address_shipping IN (12, 34)
     * $query->filterByFkSalesOrderAddressShipping(array('min' => 12)); // WHERE fk_sales_order_address_shipping >= 12
     * $query->filterByFkSalesOrderAddressShipping(array('max' => 12)); // WHERE fk_sales_order_address_shipping <= 12
     * </code>
     *
     * @see       filterByShippingAddress()
     *
     * @param     mixed $fkSalesOrderAddressShipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderAddressShipping($fkSalesOrderAddressShipping = null, $comparison = null)
    {
        if (is_array($fkSalesOrderAddressShipping)) {
            $useMinMax = false;
            if (isset($fkSalesOrderAddressShipping['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderAddressShipping['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $fkSalesOrderAddressShipping, $comparison);
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
     * @see       filterByCustomer()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_CUSTOMER, $fkCustomer, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the salutation column
     *
     * @param     mixed $salutation The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterBySalutation($salutation = null, $comparison = null)
    {
        if (is_scalar($salutation)) {
            $salutation = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SALUTATION, $salutation);
        } elseif (is_array($salutation)) {
            $convertedValues = array();
            foreach ($salutation as $value) {
                $convertedValues[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SALUTATION, $value);
            }
            $salutation = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SALUTATION, $salutation, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the customer_session_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerSessionId('fooValue');   // WHERE customer_session_id = 'fooValue'
     * $query->filterByCustomerSessionId('%fooValue%'); // WHERE customer_session_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerSessionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByCustomerSessionId($customerSessionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerSessionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customerSessionId)) {
                $customerSessionId = str_replace('*', '%', $customerSessionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CUSTOMER_SESSION_ID, $customerSessionId, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::INCREMENT_ID, $incrementId, $comparison);
    }

    /**
     * Filter the query on the grand_total column
     *
     * Example usage:
     * <code>
     * $query->filterByGrandTotal(1234); // WHERE grand_total = 1234
     * $query->filterByGrandTotal(array(12, 34)); // WHERE grand_total IN (12, 34)
     * $query->filterByGrandTotal(array('min' => 12)); // WHERE grand_total >= 12
     * $query->filterByGrandTotal(array('max' => 12)); // WHERE grand_total <= 12
     * </code>
     *
     * @param     mixed $grandTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByGrandTotal($grandTotal = null, $comparison = null)
    {
        if (is_array($grandTotal)) {
            $useMinMax = false;
            if (isset($grandTotal['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::GRAND_TOTAL, $grandTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grandTotal['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::GRAND_TOTAL, $grandTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::GRAND_TOTAL, $grandTotal, $comparison);
    }

    /**
     * Filter the query on the subtotal column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotal(1234); // WHERE subtotal = 1234
     * $query->filterBySubtotal(array(12, 34)); // WHERE subtotal IN (12, 34)
     * $query->filterBySubtotal(array('min' => 12)); // WHERE subtotal >= 12
     * $query->filterBySubtotal(array('max' => 12)); // WHERE subtotal <= 12
     * </code>
     *
     * @param     mixed $subtotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, $comparison = null)
    {
        if (is_array($subtotal)) {
            $useMinMax = false;
            if (isset($subtotal['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SUBTOTAL, $subtotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subtotal['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SUBTOTAL, $subtotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::SUBTOTAL, $subtotal, $comparison);
    }

    /**
     * Filter the query on the is_test column
     *
     * Example usage:
     * <code>
     * $query->filterByIsTest(true); // WHERE is_test = true
     * $query->filterByIsTest('yes'); // WHERE is_test = true
     * </code>
     *
     * @param     boolean|string $isTest The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByIsTest($isTest = null, $comparison = null)
    {
        if (is_string($isTest)) {
            $isTest = in_array(strtolower($isTest), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::IS_TEST, $isTest, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress|PropelObjectCollection $pacSalesOrderAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBillingAddress($pacSalesOrderAddress, $comparison = null)
    {
        if ($pacSalesOrderAddress instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $pacSalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($pacSalesOrderAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, $pacSalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterByBillingAddress() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BillingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinBillingAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * Use the BillingAddress relation PacSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useBillingAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBillingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BillingAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress|PropelObjectCollection $pacSalesOrderAddress The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShippingAddress($pacSalesOrderAddress, $comparison = null)
    {
        if ($pacSalesOrderAddress instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $pacSalesOrderAddress->getIdSalesOrderAddress(), $comparison);
        } elseif ($pacSalesOrderAddress instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, $pacSalesOrderAddress->toKeyValue('PrimaryKey', 'IdSalesOrderAddress'), $comparison);
        } else {
            throw new PropelException('filterByShippingAddress() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingAddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinShippingAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * Use the ShippingAddress relation PacSalesOrderAddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery A secondary query class using the current class as primary query
     */
    public function useShippingAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShippingAddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_Propel_PacCustomer object
     *
     * @param   ProjectA_Zed_Customer_Persistence_Propel_PacCustomer|PropelObjectCollection $pacCustomer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($pacCustomer, $comparison = null)
    {
        if ($pacCustomer instanceof ProjectA_Zed_Customer_Persistence_Propel_PacCustomer) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_CUSTOMER, $pacCustomer->getIdCustomer(), $comparison);
        } elseif ($pacCustomer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::FK_CUSTOMER, $pacCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type ProjectA_Zed_Customer_Persistence_Propel_PacCustomer or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * Use the Customer relation PacCustomer object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocument object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocument|PropelObjectCollection $pacDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocument($pacDocument, $comparison = null)
    {
        if ($pacDocument instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocument) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacDocument->getFkSalesOrder(), $comparison);
        } elseif ($pacDocument instanceof PropelObjectCollection) {
            return $this
                ->useDocumentQuery()
                ->filterByPrimaryKeys($pacDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocument() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Document relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinDocument($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Document');

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
            $this->addJoinObject($join, 'Document');
        }

        return $this;
    }

    /**
     * Use the Document relation PacDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery A secondary query class using the current class as primary query
     */
    public function useDocumentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Document', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice object
     *
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice|PropelObjectCollection $pacInvoice  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInvoice($pacInvoice, $comparison = null)
    {
        if ($pacInvoice instanceof ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacInvoice->getFkSalesOrder(), $comparison);
        } elseif ($pacInvoice instanceof PropelObjectCollection) {
            return $this
                ->useInvoiceQuery()
                ->filterByPrimaryKeys($pacInvoice->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInvoice() only accepts arguments of type ProjectA_Zed_Invoice_Persistence_Propel_PacInvoice or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Invoice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinInvoice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Invoice');

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
            $this->addJoinObject($join, 'Invoice');
        }

        return $this;
    }

    /**
     * Use the Invoice relation PacInvoice object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceQuery A secondary query class using the current class as primary query
     */
    public function useInvoiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInvoice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Invoice', 'ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object
     *
     * @param   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog|PropelObjectCollection $pacOmsTransitionLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTransitionLog($pacOmsTransitionLog, $comparison = null)
    {
        if ($pacOmsTransitionLog instanceof ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacOmsTransitionLog->getFkSalesOrder(), $comparison);
        } elseif ($pacOmsTransitionLog instanceof PropelObjectCollection) {
            return $this
                ->useTransitionLogQuery()
                ->filterByPrimaryKeys($pacOmsTransitionLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransitionLog() only accepts arguments of type ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransitionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinTransitionLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransitionLog');

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
            $this->addJoinObject($join, 'TransitionLog');
        }

        return $this;
    }

    /**
     * Use the TransitionLog relation PacOmsTransitionLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery A secondary query class using the current class as primary query
     */
    public function useTransitionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTransitionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransitionLog', 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPayment object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPayment|PropelObjectCollection $pacPayment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPayment($pacPayment, $comparison = null)
    {
        if ($pacPayment instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPayment) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacPayment->getIdPayment(), $comparison);
        } elseif ($pacPayment instanceof PropelObjectCollection) {
            return $this
                ->usePaymentQuery()
                ->filterByPrimaryKeys($pacPayment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPayment() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPayment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Payment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinPayment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Payment');

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
            $this->addJoinObject($join, 'Payment');
        }

        return $this;
    }

    /**
     * Use the Payment relation PacPayment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Payment', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrderItem->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            return $this
                ->useItemQuery()
                ->filterByPrimaryKeys($pacSalesOrderItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Item relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Item');

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
            $this->addJoinObject($join, 'Item');
        }

        return $this;
    }

    /**
     * Use the Item relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Item', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote|PropelObjectCollection $pacSalesOrderNote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNote($pacSalesOrderNote, $comparison = null)
    {
        if ($pacSalesOrderNote instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrderNote->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesOrderNote instanceof PropelObjectCollection) {
            return $this
                ->useNoteQuery()
                ->filterByPrimaryKeys($pacSalesOrderNote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNote() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Note relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Note');

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
            $this->addJoinObject($join, 'Note');
        }

        return $this;
    }

    /**
     * Use the Note relation PacSalesOrderNote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNoteQuery A secondary query class using the current class as primary query
     */
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Note', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderNoteQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderComment object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderComment|PropelObjectCollection $pacSalesOrderComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderComment($pacSalesOrderComment, $comparison = null)
    {
        if ($pacSalesOrderComment instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderComment) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrderComment->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesOrderComment instanceof PropelObjectCollection) {
            return $this
                ->useOrderCommentQuery()
                ->filterByPrimaryKeys($pacSalesOrderComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderComment() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinOrderComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderComment');

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
            $this->addJoinObject($join, 'OrderComment');
        }

        return $this;
    }

    /**
     * Use the OrderComment relation PacSalesOrderComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderCommentQuery A secondary query class using the current class as primary query
     */
    public function useOrderCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderComment', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderCommentQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense|PropelObjectCollection $pacSalesExpense  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpense($pacSalesExpense, $comparison = null)
    {
        if ($pacSalesExpense instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesExpense->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesExpense instanceof PropelObjectCollection) {
            return $this
                ->useExpenseQuery()
                ->filterByPrimaryKeys($pacSalesExpense->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpense() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinExpense($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expense');

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
            $this->addJoinObject($join, 'Expense');
        }

        return $this;
    }

    /**
     * Use the Expense relation PacSalesExpense object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expense', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesDiscount->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesDiscount instanceof PropelObjectCollection) {
            return $this
                ->useDiscountQuery()
                ->filterByPrimaryKeys($pacSalesDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discount');

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
            $this->addJoinObject($join, 'Discount');
        }

        return $this;
    }

    /**
     * Use the Discount relation PacSalesDiscount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage|PropelObjectCollection $pacSalesruleCodeUsage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCodeUsage($pacSalesruleCodeUsage, $comparison = null)
    {
        if ($pacSalesruleCodeUsage instanceof ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesruleCodeUsage->getFkSalesOrder(), $comparison);
        } elseif ($pacSalesruleCodeUsage instanceof PropelObjectCollection) {
            return $this
                ->useCodeUsageQuery()
                ->filterByPrimaryKeys($pacSalesruleCodeUsage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCodeUsage() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CodeUsage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function joinCodeUsage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsageQuery A secondary query class using the current class as primary query
     */
    public function useCodeUsageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCodeUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $pacSalesOrder Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function prune($pacSalesOrder = null)
    {
        if ($pacSalesOrder) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderPeer::CREATED_AT);
    }
}
