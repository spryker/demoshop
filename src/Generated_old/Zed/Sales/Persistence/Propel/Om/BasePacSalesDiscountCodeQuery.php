<?php


/**
 * Base class that represents a query for the 'pac_sales_discount_code' table.
 *
 *
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByIdSalesDiscountCode($order = Criteria::ASC) Order by the id_sales_discount_code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByFkSalesDiscount($order = Criteria::ASC) Order by the fk_sales_discount column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByCodepoolName($order = Criteria::ASC) Order by the codepool_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByIsReusable($order = Criteria::ASC) Order by the is_reusable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByIsOncePerCustomer($order = Criteria::ASC) Order by the is_once_per_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByIsRefundable($order = Criteria::ASC) Order by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByIdSalesDiscountCode() Group by the id_sales_discount_code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByFkSalesDiscount() Group by the fk_sales_discount column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByCode() Group by the code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByCodepoolName() Group by the codepool_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByIsReusable() Group by the is_reusable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByIsOncePerCustomer() Group by the is_once_per_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByIsRefundable() Group by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode matching the query
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode matching the query, or a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByFkSalesDiscount(int $fk_sales_discount) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the fk_sales_discount column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByCode(string $code) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the code column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByCodepoolName(string $codepool_name) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the codepool_name column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByIsReusable(boolean $is_reusable) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the is_reusable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByIsOncePerCustomer(boolean $is_once_per_customer) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the is_once_per_customer column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByIsRefundable(boolean $is_refundable) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the is_refundable column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the created_at column
 * @method ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode filtered by the updated_at column
 *
 * @method array findByIdSalesDiscountCode(int $id_sales_discount_code) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the id_sales_discount_code column
 * @method array findByFkSalesDiscount(int $fk_sales_discount) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the fk_sales_discount column
 * @method array findByCode(string $code) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the code column
 * @method array findByCodepoolName(string $codepool_name) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the codepool_name column
 * @method array findByIsReusable(boolean $is_reusable) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the is_reusable column
 * @method array findByIsOncePerCustomer(boolean $is_once_per_customer) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the is_once_per_customer column
 * @method array findByIsRefundable(boolean $is_refundable) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the is_refundable column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesDiscountCodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesDiscountCodeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesDiscountCode']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesDiscountCode($key, $con = null)
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
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_discount_code`, `fk_sales_discount`, `code`, `codepool_name`, `is_reusable`, `is_once_per_customer`, `is_refundable`, `created_at`, `updated_at` FROM `pac_sales_discount_code` WHERE `id_sales_discount_code` = :p0';
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
            $obj = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode();
            $obj->hydrate($row);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_discount_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesDiscountCode(1234); // WHERE id_sales_discount_code = 1234
     * $query->filterByIdSalesDiscountCode(array(12, 34)); // WHERE id_sales_discount_code IN (12, 34)
     * $query->filterByIdSalesDiscountCode(array('min' => 12)); // WHERE id_sales_discount_code >= 12
     * $query->filterByIdSalesDiscountCode(array('max' => 12)); // WHERE id_sales_discount_code <= 12
     * </code>
     *
     * @param     mixed $idSalesDiscountCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIdSalesDiscountCode($idSalesDiscountCode = null, $comparison = null)
    {
        if (is_array($idSalesDiscountCode)) {
            $useMinMax = false;
            if (isset($idSalesDiscountCode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesDiscountCode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $idSalesDiscountCode, $comparison);
    }

    /**
     * Filter the query on the fk_sales_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesDiscount(1234); // WHERE fk_sales_discount = 1234
     * $query->filterByFkSalesDiscount(array(12, 34)); // WHERE fk_sales_discount IN (12, 34)
     * $query->filterByFkSalesDiscount(array('min' => 12)); // WHERE fk_sales_discount >= 12
     * $query->filterByFkSalesDiscount(array('max' => 12)); // WHERE fk_sales_discount <= 12
     * </code>
     *
     * @see       filterByDiscount()
     *
     * @param     mixed $fkSalesDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByFkSalesDiscount($fkSalesDiscount = null, $comparison = null)
    {
        if (is_array($fkSalesDiscount)) {
            $useMinMax = false;
            if (isset($fkSalesDiscount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::FK_SALES_DISCOUNT, $fkSalesDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesDiscount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::FK_SALES_DISCOUNT, $fkSalesDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::FK_SALES_DISCOUNT, $fkSalesDiscount, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the codepool_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCodepoolName('fooValue');   // WHERE codepool_name = 'fooValue'
     * $query->filterByCodepoolName('%fooValue%'); // WHERE codepool_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codepoolName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCodepoolName($codepoolName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codepoolName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codepoolName)) {
                $codepoolName = str_replace('*', '%', $codepoolName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CODEPOOL_NAME, $codepoolName, $comparison);
    }

    /**
     * Filter the query on the is_reusable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsReusable(true); // WHERE is_reusable = true
     * $query->filterByIsReusable('yes'); // WHERE is_reusable = true
     * </code>
     *
     * @param     boolean|string $isReusable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsReusable($isReusable = null, $comparison = null)
    {
        if (is_string($isReusable)) {
            $isReusable = in_array(strtolower($isReusable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::IS_REUSABLE, $isReusable, $comparison);
    }

    /**
     * Filter the query on the is_once_per_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIsOncePerCustomer(true); // WHERE is_once_per_customer = true
     * $query->filterByIsOncePerCustomer('yes'); // WHERE is_once_per_customer = true
     * </code>
     *
     * @param     boolean|string $isOncePerCustomer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsOncePerCustomer($isOncePerCustomer = null, $comparison = null)
    {
        if (is_string($isOncePerCustomer)) {
            $isOncePerCustomer = in_array(strtolower($isOncePerCustomer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::IS_ONCE_PER_CUSTOMER, $isOncePerCustomer, $comparison);
    }

    /**
     * Filter the query on the is_refundable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsRefundable(true); // WHERE is_refundable = true
     * $query->filterByIsRefundable('yes'); // WHERE is_refundable = true
     * </code>
     *
     * @param     boolean|string $isRefundable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByIsRefundable($isRefundable = null, $comparison = null)
    {
        if (is_string($isRefundable)) {
            $isRefundable = in_array(strtolower($isRefundable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::IS_REFUNDABLE, $isRefundable, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount|PropelObjectCollection $pacSalesDiscount The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiscount($pacSalesDiscount, $comparison = null)
    {
        if ($pacSalesDiscount instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::FK_SALES_DISCOUNT, $pacSalesDiscount->getIdSalesDiscount(), $comparison);
        } elseif ($pacSalesDiscount instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::FK_SALES_DISCOUNT, $pacSalesDiscount->toKeyValue('PrimaryKey', 'IdSalesDiscount'), $comparison);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCode $pacSalesDiscountCode Object to remove from the list of results
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function prune($pacSalesDiscountCode = null)
    {
        if ($pacSalesDiscountCode) {
            $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::ID_SALES_DISCOUNT_CODE, $pacSalesDiscountCode->getIdSalesDiscountCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountCodePeer::CREATED_AT);
    }
}
