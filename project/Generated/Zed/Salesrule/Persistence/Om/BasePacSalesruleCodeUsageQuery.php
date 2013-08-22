<?php


/**
 * Base class that represents a query for the 'pac_salesrule_code_usage' table.
 *
 *
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByIdSalesruleCodeUsage($order = Criteria::ASC) Order by the id_salesrule_code_usage column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByFkSalesruleCode($order = Criteria::ASC) Order by the fk_salesrule_code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByIdSalesruleCodeUsage() Group by the id_salesrule_code_usage column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByFkCustomer() Group by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByFkSalesruleCode() Group by the fk_salesrule_code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery leftJoinCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Code relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery rightJoinCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Code relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery innerJoinCode($relationAlias = null) Adds a INNER JOIN clause to the query using the Code relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage matching the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage matching the query, or a new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneByFkSalesOrder(int $fk_sales_order) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage filtered by the fk_sales_order column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneByFkCustomer(int $fk_customer) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage filtered by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneByFkSalesruleCode(int $fk_salesrule_code) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage filtered by the fk_salesrule_code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage filtered by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage filtered by the updated_at column
 *
 * @method array findByIdSalesruleCodeUsage(int $id_salesrule_code_usage) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the id_salesrule_code_usage column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the fk_sales_order column
 * @method array findByFkCustomer(int $fk_customer) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the fk_customer column
 * @method array findByFkSalesruleCode(int $fk_salesrule_code) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the fk_salesrule_code column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodeUsageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodeUsageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery();
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
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesruleCodeUsage($key, $con = null)
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_salesrule_code_usage`, `fk_sales_order`, `fk_customer`, `fk_salesrule_code`, `created_at`, `updated_at` FROM `pac_salesrule_code_usage` WHERE `id_salesrule_code_usage` = :p0';
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
            $obj = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage();
            $obj->hydrate($row);
            ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_salesrule_code_usage column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesruleCodeUsage(1234); // WHERE id_salesrule_code_usage = 1234
     * $query->filterByIdSalesruleCodeUsage(array(12, 34)); // WHERE id_salesrule_code_usage IN (12, 34)
     * $query->filterByIdSalesruleCodeUsage(array('min' => 12)); // WHERE id_salesrule_code_usage >= 12
     * $query->filterByIdSalesruleCodeUsage(array('max' => 12)); // WHERE id_salesrule_code_usage <= 12
     * </code>
     *
     * @param     mixed $idSalesruleCodeUsage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByIdSalesruleCodeUsage($idSalesruleCodeUsage = null, $comparison = null)
    {
        if (is_array($idSalesruleCodeUsage)) {
            $useMinMax = false;
            if (isset($idSalesruleCodeUsage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $idSalesruleCodeUsage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesruleCodeUsage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $idSalesruleCodeUsage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $idSalesruleCodeUsage, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query on the fk_salesrule_code column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesruleCode(1234); // WHERE fk_salesrule_code = 1234
     * $query->filterByFkSalesruleCode(array(12, 34)); // WHERE fk_salesrule_code IN (12, 34)
     * $query->filterByFkSalesruleCode(array('min' => 12)); // WHERE fk_salesrule_code >= 12
     * $query->filterByFkSalesruleCode(array('max' => 12)); // WHERE fk_salesrule_code <= 12
     * </code>
     *
     * @see       filterByCode()
     *
     * @param     mixed $fkSalesruleCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByFkSalesruleCode($fkSalesruleCode = null, $comparison = null)
    {
        if (is_array($fkSalesruleCode)) {
            $useMinMax = false;
            if (isset($fkSalesruleCode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALESRULE_CODE, $fkSalesruleCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesruleCode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALESRULE_CODE, $fkSalesruleCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALESRULE_CODE, $fkSalesruleCode, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomer object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomer|PropelObjectCollection $pacCustomer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($pacCustomer, $comparison = null)
    {
        if ($pacCustomer instanceof ProjectA_Zed_Customer_Persistence_PacCustomer) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_CUSTOMER, $pacCustomer->getIdCustomer(), $comparison);
        } elseif ($pacCustomer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_CUSTOMER, $pacCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type ProjectA_Zed_Customer_Persistence_PacCustomer or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Customer_Persistence_PacCustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomerQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode|PropelObjectCollection $pacSalesruleCode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCode($pacSalesruleCode, $comparison = null)
    {
        if ($pacSalesruleCode instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALESRULE_CODE, $pacSalesruleCode->getIdSalesruleCode(), $comparison);
        } elseif ($pacSalesruleCode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALESRULE_CODE, $pacSalesruleCode->toKeyValue('PrimaryKey', 'IdSalesruleCode'), $comparison);
        } else {
            throw new PropelException('filterByCode() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Code relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function joinCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Code');

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
            $this->addJoinObject($join, 'Code');
        }

        return $this;
    }

    /**
     * Use the Code relation PacSalesruleCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery A secondary query class using the current class as primary query
     */
    public function useCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Code', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage $pacSalesruleCodeUsage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function prune($pacSalesruleCodeUsage = null)
    {
        if ($pacSalesruleCodeUsage) {
            $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::ID_SALESRULE_CODE_USAGE, $pacSalesruleCodeUsage->getIdSalesruleCodeUsage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsagePeer::CREATED_AT);
    }
}
