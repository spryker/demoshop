<?php


/**
 * Base class that represents a query for the 'pac_salesrule_code' table.
 *
 *
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByIdSalesruleCode($order = Criteria::ASC) Order by the id_salesrule_code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByFkSalesruleCodepool($order = Criteria::ASC) Order by the fk_salesrule_codepool column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByIdSalesruleCode() Group by the id_salesrule_code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByFkSalesruleCodepool() Group by the fk_salesrule_codepool column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByFkCustomer() Group by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByCode() Group by the code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery leftJoinCodepool($relationAlias = null) Adds a LEFT JOIN clause to the query using the Codepool relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery rightJoinCodepool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Codepool relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery innerJoinCodepool($relationAlias = null) Adds a INNER JOIN clause to the query using the Codepool relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery leftJoinCodeUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery rightJoinCodeUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CodeUsage relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery innerJoinCodeUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the CodeUsage relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery leftJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery rightJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery innerJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode matching the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode matching the query, or a new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByFkSalesruleCodepool(int $fk_salesrule_codepool) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the fk_salesrule_codepool column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByFkCustomer(int $fk_customer) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the fk_customer column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByCode(string $code) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the code column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByIsActive(int $is_active) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode filtered by the updated_at column
 *
 * @method array findByIdSalesruleCode(int $id_salesrule_code) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the id_salesrule_code column
 * @method array findByFkSalesruleCodepool(int $fk_salesrule_codepool) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the fk_salesrule_codepool column
 * @method array findByFkCustomer(int $fk_customer) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the fk_customer column
 * @method array findByCode(string $code) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the code column
 * @method array findByIsActive(int $is_active) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the is_active column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleCodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery();
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
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesruleCode($key, $con = null)
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_salesrule_code`, `fk_salesrule_codepool`, `fk_customer`, `code`, `is_active`, `created_at`, `updated_at` FROM `pac_salesrule_code` WHERE `id_salesrule_code` = :p0';
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
            $obj = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode();
            $obj->hydrate($row);
            ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_salesrule_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesruleCode(1234); // WHERE id_salesrule_code = 1234
     * $query->filterByIdSalesruleCode(array(12, 34)); // WHERE id_salesrule_code IN (12, 34)
     * $query->filterByIdSalesruleCode(array('min' => 12)); // WHERE id_salesrule_code >= 12
     * $query->filterByIdSalesruleCode(array('max' => 12)); // WHERE id_salesrule_code <= 12
     * </code>
     *
     * @param     mixed $idSalesruleCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByIdSalesruleCode($idSalesruleCode = null, $comparison = null)
    {
        if (is_array($idSalesruleCode)) {
            $useMinMax = false;
            if (isset($idSalesruleCode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $idSalesruleCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesruleCode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $idSalesruleCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $idSalesruleCode, $comparison);
    }

    /**
     * Filter the query on the fk_salesrule_codepool column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesruleCodepool(1234); // WHERE fk_salesrule_codepool = 1234
     * $query->filterByFkSalesruleCodepool(array(12, 34)); // WHERE fk_salesrule_codepool IN (12, 34)
     * $query->filterByFkSalesruleCodepool(array('min' => 12)); // WHERE fk_salesrule_codepool >= 12
     * $query->filterByFkSalesruleCodepool(array('max' => 12)); // WHERE fk_salesrule_codepool <= 12
     * </code>
     *
     * @see       filterByCodepool()
     *
     * @param     mixed $fkSalesruleCodepool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByFkSalesruleCodepool($fkSalesruleCodepool = null, $comparison = null)
    {
        if (is_array($fkSalesruleCodepool)) {
            $useMinMax = false;
            if (isset($fkSalesruleCodepool['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesruleCodepool['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_CUSTOMER, $fkCustomer, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(1234); // WHERE is_active = 1234
     * $query->filterByIsActive(array(12, 34)); // WHERE is_active IN (12, 34)
     * $query->filterByIsActive(array('min' => 12)); // WHERE is_active >= 12
     * $query->filterByIsActive(array('max' => 12)); // WHERE is_active <= 12
     * </code>
     *
     * @param     mixed $isActive The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_array($isActive)) {
            $useMinMax = false;
            if (isset($isActive['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::IS_ACTIVE, $isActive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isActive['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::IS_ACTIVE, $isActive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::IS_ACTIVE, $isActive, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool|PropelObjectCollection $pacSalesruleCodepool The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCodepool($pacSalesruleCodepool, $comparison = null)
    {
        if ($pacSalesruleCodepool instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->getIdSalesruleCodepool(), $comparison);
        } elseif ($pacSalesruleCodepool instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->toKeyValue('PrimaryKey', 'IdSalesruleCodepool'), $comparison);
        } else {
            throw new PropelException('filterByCodepool() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Codepool relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function joinCodepool($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Codepool');

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
            $this->addJoinObject($join, 'Codepool');
        }

        return $this;
    }

    /**
     * Use the Codepool relation PacSalesruleCodepool object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery A secondary query class using the current class as primary query
     */
    public function useCodepoolQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCodepool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Codepool', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_PacCustomer object
     *
     * @param   ProjectA_Zed_Customer_Persistence_PacCustomer|PropelObjectCollection $pacCustomer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($pacCustomer, $comparison = null)
    {
        if ($pacCustomer instanceof ProjectA_Zed_Customer_Persistence_PacCustomer) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_CUSTOMER, $pacCustomer->getIdCustomer(), $comparison);
        } elseif ($pacCustomer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::FK_CUSTOMER, $pacCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage|PropelObjectCollection $pacSalesruleCodeUsage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCodeUsage($pacSalesruleCodeUsage, $comparison = null)
    {
        if ($pacSalesruleCodeUsage instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $pacSalesruleCodeUsage->getFkSalesruleCode(), $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery A secondary query class using the current class as primary query
     */
    public function useCodeUsageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCodeUsage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsageQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode|PropelObjectCollection $saoMailSequenceCartUserCode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoMailSequenceCartUserCode($saoMailSequenceCartUserCode, $comparison = null)
    {
        if ($saoMailSequenceCartUserCode instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $saoMailSequenceCartUserCode->getFkSalesruleCode(), $comparison);
        } elseif ($saoMailSequenceCartUserCode instanceof PropelObjectCollection) {
            return $this
                ->useSaoMailSequenceCartUserCodeQuery()
                ->filterByPrimaryKeys($saoMailSequenceCartUserCode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoMailSequenceCartUserCode() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoMailSequenceCartUserCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function joinSaoMailSequenceCartUserCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoMailSequenceCartUserCode');

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
            $this->addJoinObject($join, 'SaoMailSequenceCartUserCode');
        }

        return $this;
    }

    /**
     * Use the SaoMailSequenceCartUserCode relation SaoMailSequenceCartUserCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery A secondary query class using the current class as primary query
     */
    public function useSaoMailSequenceCartUserCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoMailSequenceCartUserCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode $pacSalesruleCode Object to remove from the list of results
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function prune($pacSalesruleCode = null)
    {
        if ($pacSalesruleCode) {
            $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::ID_SALESRULE_CODE, $pacSalesruleCode->getIdSalesruleCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodePeer::CREATED_AT);
    }
}
