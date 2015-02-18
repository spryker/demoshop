<?php


/**
 * Base class that represents a query for the 'pac_sales_expense' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByIdSalesExpense($order = Criteria::ASC) Order by the id_sales_expense column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByGrossPrice($order = Criteria::ASC) Order by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByPriceToPay($order = Criteria::ASC) Order by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByTaxPercentage($order = Criteria::ASC) Order by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByIdSalesExpense() Group by the id_sales_expense column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByGrossPrice() Group by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByPriceToPay() Group by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByTaxPercentage() Group by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the fk_sales_order_item column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the fk_sales_order column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByType(string $type) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the type column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByName(string $name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByGrossPrice(int $gross_price) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the gross_price column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByPriceToPay(int $price_to_pay) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the price_to_pay column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByTaxPercentage(int $tax_percentage) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the tax_percentage column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense filtered by the updated_at column
 *
 * @method array findByIdSalesExpense(int $id_sales_expense) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the id_sales_expense column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the fk_sales_order_item column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the fk_sales_order column
 * @method array findByType(string $type) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the type column
 * @method array findByName(string $name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the name column
 * @method array findByGrossPrice(int $gross_price) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the gross_price column
 * @method array findByPriceToPay(int $price_to_pay) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the price_to_pay column
 * @method array findByTaxPercentage(int $tax_percentage) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the tax_percentage column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesExpenseQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesExpenseQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesExpense']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesExpense($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_expense`, `fk_sales_order_item`, `fk_sales_order`, `type`, `name`, `gross_price`, `price_to_pay`, `tax_percentage`, `created_at`, `updated_at` FROM `pac_sales_expense` WHERE `id_sales_expense` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_expense column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesExpense(1234); // WHERE id_sales_expense = 1234
     * $query->filterByIdSalesExpense(array(12, 34)); // WHERE id_sales_expense IN (12, 34)
     * $query->filterByIdSalesExpense(array('min' => 12)); // WHERE id_sales_expense >= 12
     * $query->filterByIdSalesExpense(array('max' => 12)); // WHERE id_sales_expense <= 12
     * </code>
     *
     * @param     mixed $idSalesExpense The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByIdSalesExpense($idSalesExpense = null, $comparison = null)
    {
        if (is_array($idSalesExpense)) {
            $useMinMax = false;
            if (isset($idSalesExpense['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $idSalesExpense['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesExpense['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $idSalesExpense['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $idSalesExpense, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the gross_price column
     *
     * Example usage:
     * <code>
     * $query->filterByGrossPrice(1234); // WHERE gross_price = 1234
     * $query->filterByGrossPrice(array(12, 34)); // WHERE gross_price IN (12, 34)
     * $query->filterByGrossPrice(array('min' => 12)); // WHERE gross_price >= 12
     * $query->filterByGrossPrice(array('max' => 12)); // WHERE gross_price <= 12
     * </code>
     *
     * @param     mixed $grossPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByGrossPrice($grossPrice = null, $comparison = null)
    {
        if (is_array($grossPrice)) {
            $useMinMax = false;
            if (isset($grossPrice['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE, $grossPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grossPrice['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE, $grossPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE, $grossPrice, $comparison);
    }

    /**
     * Filter the query on the price_to_pay column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceToPay(1234); // WHERE price_to_pay = 1234
     * $query->filterByPriceToPay(array(12, 34)); // WHERE price_to_pay IN (12, 34)
     * $query->filterByPriceToPay(array('min' => 12)); // WHERE price_to_pay >= 12
     * $query->filterByPriceToPay(array('max' => 12)); // WHERE price_to_pay <= 12
     * </code>
     *
     * @param     mixed $priceToPay The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByPriceToPay($priceToPay = null, $comparison = null)
    {
        if (is_array($priceToPay)) {
            $useMinMax = false;
            if (isset($priceToPay['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY, $priceToPay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceToPay['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY, $priceToPay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY, $priceToPay, $comparison);
    }

    /**
     * Filter the query on the tax_percentage column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxPercentage(1234); // WHERE tax_percentage = 1234
     * $query->filterByTaxPercentage(array(12, 34)); // WHERE tax_percentage IN (12, 34)
     * $query->filterByTaxPercentage(array('min' => 12)); // WHERE tax_percentage >= 12
     * $query->filterByTaxPercentage(array('max' => 12)); // WHERE tax_percentage <= 12
     * </code>
     *
     * @param     mixed $taxPercentage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByTaxPercentage($taxPercentage = null, $comparison = null)
    {
        if (is_array($taxPercentage)) {
            $useMinMax = false;
            if (isset($taxPercentage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE, $taxPercentage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxPercentage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE, $taxPercentage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE, $taxPercentage, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByOrderItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrderItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $pacSalesDiscount->getFkSalesExpense(), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense $pacSalesExpense Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function prune($pacSalesExpense = null)
    {
        if ($pacSalesExpense) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $pacSalesExpense->getIdSalesExpense(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT);
    }
}
