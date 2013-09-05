<?php


/**
 * Base class that represents a query for the 'sao_sales_ccvalidation' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByIdValidation($order = Criteria::ASC) Order by the id_validation column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByFkSalesOrder($order = Criteria::ASC) Order by the fk_sales_order column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByValidJs($order = Criteria::ASC) Order by the valid_js column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByValidPaymentProvider($order = Criteria::ASC) Order by the valid_payment_provider column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByIdValidation() Group by the id_validation column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByFkSalesOrder() Group by the fk_sales_order column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByValidJs() Group by the valid_js column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByValidPaymentProvider() Group by the valid_payment_provider column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesCCValidation object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneByFkSalesOrder(int $fk_sales_order) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation filtered by the fk_sales_order column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneByValidJs(int $valid_js) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation filtered by the valid_js column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneByValidPaymentProvider(int $valid_payment_provider) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation filtered by the valid_payment_provider column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation filtered by the created_at column
 * @method Sao_Zed_Sales_Persistence_SaoSalesCCValidation findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Sales_Persistence_SaoSalesCCValidation filtered by the updated_at column
 *
 * @method array findByIdValidation(int $id_validation) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the id_validation column
 * @method array findByFkSalesOrder(int $fk_sales_order) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the fk_sales_order column
 * @method array findByValidJs(int $valid_js) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the valid_js column
 * @method array findByValidPaymentProvider(int $valid_payment_provider) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the valid_payment_provider column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Sales_Persistence_SaoSalesCCValidation objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesCCValidationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesCCValidationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesCCValidation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesCCValidation|Sao_Zed_Sales_Persistence_SaoSalesCCValidation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesCCValidation A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdValidation($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesCCValidation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_validation`, `fk_sales_order`, `valid_js`, `valid_payment_provider`, `created_at`, `updated_at` FROM `sao_sales_ccvalidation` WHERE `id_validation` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesCCValidation();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidation|Sao_Zed_Sales_Persistence_SaoSalesCCValidation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesCCValidation[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_validation column
     *
     * Example usage:
     * <code>
     * $query->filterByIdValidation(1234); // WHERE id_validation = 1234
     * $query->filterByIdValidation(array(12, 34)); // WHERE id_validation IN (12, 34)
     * $query->filterByIdValidation(array('min' => 12)); // WHERE id_validation >= 12
     * $query->filterByIdValidation(array('max' => 12)); // WHERE id_validation <= 12
     * </code>
     *
     * @param     mixed $idValidation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByIdValidation($idValidation = null, $comparison = null)
    {
        if (is_array($idValidation)) {
            $useMinMax = false;
            if (isset($idValidation['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $idValidation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idValidation['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $idValidation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $idValidation, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrder($fkSalesOrder = null, $comparison = null)
    {
        if (is_array($fkSalesOrder)) {
            $useMinMax = false;
            if (isset($fkSalesOrder['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::FK_SALES_ORDER, $fkSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrder['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::FK_SALES_ORDER, $fkSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::FK_SALES_ORDER, $fkSalesOrder, $comparison);
    }

    /**
     * Filter the query on the valid_js column
     *
     * Example usage:
     * <code>
     * $query->filterByValidJs(1234); // WHERE valid_js = 1234
     * $query->filterByValidJs(array(12, 34)); // WHERE valid_js IN (12, 34)
     * $query->filterByValidJs(array('min' => 12)); // WHERE valid_js >= 12
     * $query->filterByValidJs(array('max' => 12)); // WHERE valid_js <= 12
     * </code>
     *
     * @param     mixed $validJs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByValidJs($validJs = null, $comparison = null)
    {
        if (is_array($validJs)) {
            $useMinMax = false;
            if (isset($validJs['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_JS, $validJs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validJs['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_JS, $validJs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_JS, $validJs, $comparison);
    }

    /**
     * Filter the query on the valid_payment_provider column
     *
     * Example usage:
     * <code>
     * $query->filterByValidPaymentProvider(1234); // WHERE valid_payment_provider = 1234
     * $query->filterByValidPaymentProvider(array(12, 34)); // WHERE valid_payment_provider IN (12, 34)
     * $query->filterByValidPaymentProvider(array('min' => 12)); // WHERE valid_payment_provider >= 12
     * $query->filterByValidPaymentProvider(array('max' => 12)); // WHERE valid_payment_provider <= 12
     * </code>
     *
     * @param     mixed $validPaymentProvider The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByValidPaymentProvider($validPaymentProvider = null, $comparison = null)
    {
        if (is_array($validPaymentProvider)) {
            $useMinMax = false;
            if (isset($validPaymentProvider['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_PAYMENT_PROVIDER, $validPaymentProvider['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validPaymentProvider['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_PAYMENT_PROVIDER, $validPaymentProvider['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::VALID_PAYMENT_PROVIDER, $validPaymentProvider, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::FK_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::FK_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
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
     * @param   Sao_Zed_Sales_Persistence_SaoSalesCCValidation $saoSalesCCValidation Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function prune($saoSalesCCValidation = null)
    {
        if ($saoSalesCCValidation) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::ID_VALIDATION, $saoSalesCCValidation->getIdValidation(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Sales_Persistence_SaoSalesCCValidationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Sales_Persistence_SaoSalesCCValidationPeer::CREATED_AT);
    }
}
