<?php


/**
 * Base class that represents a query for the 'pac_sales_discount' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByIdSalesDiscount($order = Criteria::ASC) Order by the id_sales_discount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByFkSalesExpense($order = Criteria::ASC) Order by the fk_sales_expense column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByFkSalesOrderItemOption($order = Criteria::ASC) Order by the fk_sales_order_item_option column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByIsRefundable($order = Criteria::ASC) Order by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByIdSalesDiscount() Group by the id_sales_discount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByFkSalesExpense() Group by the fk_sales_expense column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByFkSalesOrderItemOption() Group by the fk_sales_order_item_option column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByIsRefundable() Group by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByAmount() Group by the amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoinExpense($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoinExpense($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expense relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoinExpense($relationAlias = null) Adds a INNER JOIN clause to the query using the Expense relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery leftJoinSalesDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesDiscount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery rightJoinSalesDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesDiscount relation
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery innerJoinSalesDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesDiscount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount matching the query
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount matching the query, or a new ProjectA_Zed_Sales_Persistence_PacSalesDiscount object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByFkSalesExpense(int $fk_sales_expense) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the fk_sales_expense column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByFkSalesOrderItemOption(int $fk_sales_order_item_option) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the fk_sales_order_item_option column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByIsRefundable(int $is_refundable) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByAmount(int $amount) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the amount column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_PacSalesDiscount findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_PacSalesDiscount filtered by the updated_at column
 *
 * @method array findByIdSalesDiscount(int $id_sales_discount) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the id_sales_discount column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the fk_sales_order column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the fk_sales_order_item column
 * @method array findByFkSalesExpense(int $fk_sales_expense) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the fk_sales_expense column
 * @method array findByFkSalesOrderItemOption(int $fk_sales_order_item_option) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the fk_sales_order_item_option column
 * @method array findByIsRefundable(int $is_refundable) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the is_refundable column
 * @method array findByAmount(int $amount) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the amount column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_PacSalesDiscount objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesDiscountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BasePacSalesDiscountQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Sales_Persistence_PacSalesDiscount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery();
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesDiscount|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscount A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesDiscount($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscount A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_discount`, `fk_sales_order`, `fk_sales_order_item`, `fk_sales_expense`, `fk_sales_order_item_option`, `is_refundable`, `amount`, `created_at`, `updated_at` FROM `pac_sales_discount` WHERE `id_sales_discount` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_PacSalesDiscount();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscount|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_PacSalesDiscount[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesDiscount(1234); // WHERE id_sales_discount = 1234
     * $query->filterByIdSalesDiscount(array(12, 34)); // WHERE id_sales_discount IN (12, 34)
     * $query->filterByIdSalesDiscount(array('min' => 12)); // WHERE id_sales_discount >= 12
     * $query->filterByIdSalesDiscount(array('max' => 12)); // WHERE id_sales_discount <= 12
     * </code>
     *
     * @param     mixed $idSalesDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByIdSalesDiscount($idSalesDiscount = null, $comparison = null)
    {
        if (is_array($idSalesDiscount)) {
            $useMinMax = false;
            if (isset($idSalesDiscount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesDiscount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $idSalesDiscount, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrder(1234); // WHERE fk_sales_order = 1234
     * $query->filterByFkSalesOrder(array(12, 34)); // WHERE fk_sales_order IN (12, 34)
     * $query->filterByFkSalesOrder(array('min' => 12)); // WHERE fk_sales_order >= 12
     * $query->filterByFkSalesOrder(array('max' => 12)); // WHERE fk_sales_order <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $fkSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item >= 12
     * $query->filterByFkSalesOrderItem(array('max' => 12)); // WHERE fk_sales_order_item <= 12
     * </code>
     *
     * @see       filterByOrderItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the fk_sales_expense column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesExpense(1234); // WHERE fk_sales_expense = 1234
     * $query->filterByFkSalesExpense(array(12, 34)); // WHERE fk_sales_expense IN (12, 34)
     * $query->filterByFkSalesExpense(array('min' => 12)); // WHERE fk_sales_expense >= 12
     * $query->filterByFkSalesExpense(array('max' => 12)); // WHERE fk_sales_expense <= 12
     * </code>
     *
     * @see       filterByExpense()
     *
     * @param     mixed $fkSalesExpense The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesExpense($fkSalesExpense = null, $comparison = null)
    {
        if (is_array($fkSalesExpense)) {
            $useMinMax = false;
            if (isset($fkSalesExpense['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_EXPENSE, $fkSalesExpense['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesExpense['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_EXPENSE, $fkSalesExpense['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_EXPENSE, $fkSalesExpense, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item_option column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItemOption(1234); // WHERE fk_sales_order_item_option = 1234
     * $query->filterByFkSalesOrderItemOption(array(12, 34)); // WHERE fk_sales_order_item_option IN (12, 34)
     * $query->filterByFkSalesOrderItemOption(array('min' => 12)); // WHERE fk_sales_order_item_option >= 12
     * $query->filterByFkSalesOrderItemOption(array('max' => 12)); // WHERE fk_sales_order_item_option <= 12
     * </code>
     *
     * @see       filterByOption()
     *
     * @param     mixed $fkSalesOrderItemOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItemOption($fkSalesOrderItemOption = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItemOption)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItemOption['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItemOption['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM_OPTION, $fkSalesOrderItemOption, $comparison);
    }

    /**
     * Filter the query on the is_refundable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsRefundable(1234); // WHERE is_refundable = 1234
     * $query->filterByIsRefundable(array(12, 34)); // WHERE is_refundable IN (12, 34)
     * $query->filterByIsRefundable(array('min' => 12)); // WHERE is_refundable >= 12
     * $query->filterByIsRefundable(array('max' => 12)); // WHERE is_refundable <= 12
     * </code>
     *
     * @param     mixed $isRefundable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByIsRefundable($isRefundable = null, $comparison = null)
    {
        if (is_array($isRefundable)) {
            $useMinMax = false;
            if (isset($isRefundable['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::IS_REFUNDABLE, $isRefundable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isRefundable['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::IS_REFUNDABLE, $isRefundable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::IS_REFUNDABLE, $isRefundable, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::AMOUNT, $amount, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function joinOrderItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderItem');

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
            $this->addJoinObject($join, 'OrderItem');
        }

        return $this;
    }

    /**
     * Use the OrderItem relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesExpense object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesExpense|PropelObjectCollection $pacSalesExpense The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpense($pacSalesExpense, $comparison = null)
    {
        if ($pacSalesExpense instanceof ProjectA_Zed_Sales_Persistence_PacSalesExpense) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_EXPENSE, $pacSalesExpense->getIdSalesExpense(), $comparison);
        } elseif ($pacSalesExpense instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_EXPENSE, $pacSalesExpense->toKeyValue('PrimaryKey', 'IdSalesExpense'), $comparison);
        } else {
            throw new PropelException('filterByExpense() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesExpense or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expense relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery A secondary query class using the current class as primary query
     */
    public function useExpenseQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinExpense($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expense', 'ProjectA_Zed_Sales_Persistence_PacSalesExpenseQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption|PropelObjectCollection $pacSalesOrderItemOption The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacSalesOrderItemOption, $comparison = null)
    {
        if ($pacSalesOrderItemOption instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM_OPTION, $pacSalesOrderItemOption->getIdSalesOrderItemOption(), $comparison);
        } elseif ($pacSalesOrderItemOption instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::FK_SALES_ORDER_ITEM_OPTION, $pacSalesOrderItemOption->toKeyValue('PrimaryKey', 'IdSalesOrderItemOption'), $comparison);
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Option');

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
            $this->addJoinObject($join, 'Option');
        }

        return $this;
    }

    /**
     * Use the Option relation PacSalesOrderItemOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOptionQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Sales_Persistence_SaoSalesDiscount object
     *
     * @param   Sao_Zed_Sales_Persistence_SaoSalesDiscount|PropelObjectCollection $saoSalesDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesDiscount($saoSalesDiscount, $comparison = null)
    {
        if ($saoSalesDiscount instanceof Sao_Zed_Sales_Persistence_SaoSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $saoSalesDiscount->getIdSalesDiscount(), $comparison);
        } elseif ($saoSalesDiscount instanceof PropelObjectCollection) {
            return $this
                ->useSalesDiscountQuery()
                ->filterByPrimaryKeys($saoSalesDiscount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesDiscount() only accepts arguments of type Sao_Zed_Sales_Persistence_SaoSalesDiscount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesDiscount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function joinSalesDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesDiscount');

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
            $this->addJoinObject($join, 'SalesDiscount');
        }

        return $this;
    }

    /**
     * Use the SalesDiscount relation SaoSalesDiscount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery A secondary query class using the current class as primary query
     */
    public function useSalesDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesDiscount', 'Sao_Zed_Sales_Persistence_SaoSalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesDiscount $pacSalesDiscount Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function prune($pacSalesDiscount = null)
    {
        if ($pacSalesDiscount) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::ID_SALES_DISCOUNT, $pacSalesDiscount->getIdSalesDiscount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_PacSalesDiscountQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesDiscountPeer::CREATED_AT);
    }
}
