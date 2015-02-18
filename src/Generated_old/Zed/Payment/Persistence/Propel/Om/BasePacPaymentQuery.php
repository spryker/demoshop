<?php


/**
 * Base class that represents a query for the 'pac_payment' table.
 *
 *
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByIdPayment($order = Criteria::ASC) Order by the id_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByTransaction($order = Criteria::ASC) Order by the transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByMethod($order = Criteria::ASC) Order by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByProvider($order = Criteria::ASC) Order by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByIdPayment() Group by the id_payment column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByTransaction() Group by the transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByMethod() Group by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByProvider() Group by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery leftJoinPaymentAccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentAccount relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery rightJoinPaymentAccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentAccount relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery innerJoinPaymentAccount($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentAccount relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery leftJoinPaymentTransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery rightJoinPaymentTransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentTransaction relation
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery innerJoinPaymentTransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentTransaction relation
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment matching the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment matching the query, or a new ProjectA_Zed_Payment_Persistence_Propel_PacPayment object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneByTransaction(string $transaction) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment filtered by the transaction column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneByMethod(string $method) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment filtered by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneByProvider(string $provider) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment filtered by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment filtered by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPayment findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPayment filtered by the updated_at column
 *
 * @method array findByIdPayment(int $id_payment) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the id_payment column
 * @method array findByTransaction(string $transaction) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the transaction column
 * @method array findByMethod(string $method) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the method column
 * @method array findByProvider(string $provider) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the provider column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPayment objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.om
 */
abstract class Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPayment']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPayment|ProjectA_Zed_Payment_Persistence_Propel_PacPayment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPayment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPayment($key, $con = null)
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPayment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment`, `transaction`, `method`, `provider`, `created_at`, `updated_at` FROM `pac_payment` WHERE `id_payment` = :p0';
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
            $obj = new ProjectA_Zed_Payment_Persistence_Propel_PacPayment();
            $obj->hydrate($row);
            ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPayment|ProjectA_Zed_Payment_Persistence_Propel_PacPayment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_Propel_PacPayment[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPayment(1234); // WHERE id_payment = 1234
     * $query->filterByIdPayment(array(12, 34)); // WHERE id_payment IN (12, 34)
     * $query->filterByIdPayment(array('min' => 12)); // WHERE id_payment >= 12
     * $query->filterByIdPayment(array('max' => 12)); // WHERE id_payment <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $idPayment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByIdPayment($idPayment = null, $comparison = null)
    {
        if (is_array($idPayment)) {
            $useMinMax = false;
            if (isset($idPayment['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $idPayment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPayment['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $idPayment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $idPayment, $comparison);
    }

    /**
     * Filter the query on the transaction column
     *
     * Example usage:
     * <code>
     * $query->filterByTransaction('fooValue');   // WHERE transaction = 'fooValue'
     * $query->filterByTransaction('%fooValue%'); // WHERE transaction LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transaction The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByTransaction($transaction = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transaction)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transaction)) {
                $transaction = str_replace('*', '%', $transaction);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::TRANSACTION, $transaction, $comparison);
    }

    /**
     * Filter the query on the method column
     *
     * Example usage:
     * <code>
     * $query->filterByMethod('fooValue');   // WHERE method = 'fooValue'
     * $query->filterByMethod('%fooValue%'); // WHERE method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $method The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByMethod($method = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($method)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $method)) {
                $method = str_replace('*', '%', $method);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::METHOD, $method, $comparison);
    }

    /**
     * Filter the query on the provider column
     *
     * Example usage:
     * <code>
     * $query->filterByProvider('fooValue');   // WHERE provider = 'fooValue'
     * $query->filterByProvider('%fooValue%'); // WHERE provider LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provider The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByProvider($provider = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provider)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $provider)) {
                $provider = str_replace('*', '%', $provider);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::PROVIDER, $provider, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount|PropelObjectCollection $pacPaymentAccount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentAccount($pacPaymentAccount, $comparison = null)
    {
        if ($pacPaymentAccount instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $pacPaymentAccount->getFkPayment(), $comparison);
        } elseif ($pacPaymentAccount instanceof PropelObjectCollection) {
            return $this
                ->usePaymentAccountQuery()
                ->filterByPrimaryKeys($pacPaymentAccount->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentAccount() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentAccount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function joinPaymentAccount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentAccount');

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
            $this->addJoinObject($join, 'PaymentAccount');
        }

        return $this;
    }

    /**
     * Use the PaymentAccount relation PacPaymentAccount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery A secondary query class using the current class as primary query
     */
    public function usePaymentAccountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentAccount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentAccount', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccountQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction object
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction|PropelObjectCollection $pacPaymentTransaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaymentTransaction($pacPaymentTransaction, $comparison = null)
    {
        if ($pacPaymentTransaction instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $pacPaymentTransaction->getFkPayment(), $comparison);
        } elseif ($pacPaymentTransaction instanceof PropelObjectCollection) {
            return $this
                ->usePaymentTransactionQuery()
                ->filterByPrimaryKeys($pacPaymentTransaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPaymentTransaction() only accepts arguments of type ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PaymentTransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function joinPaymentTransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PaymentTransaction');

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
            $this->addJoinObject($join, 'PaymentTransaction');
        }

        return $this;
    }

    /**
     * Use the PaymentTransaction relation PacPaymentTransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery A secondary query class using the current class as primary query
     */
    public function usePaymentTransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaymentTransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPayment $pacPayment Object to remove from the list of results
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function prune($pacPayment = null)
    {
        if ($pacPayment) {
            $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::ID_PAYMENT, $pacPayment->getIdPayment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentPeer::CREATED_AT);
    }
}
