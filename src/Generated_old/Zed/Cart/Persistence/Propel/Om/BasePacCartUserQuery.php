<?php


/**
 * Base class that represents a query for the 'pac_cart_user' table.
 *
 *
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery orderByIdCartUser($order = Criteria::ASC) Order by the id_cart_user column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery orderByFkCart($order = Criteria::ASC) Order by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery groupByIdCartUser() Group by the id_cart_user column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery groupByFkCart() Group by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery groupByFkCustomer() Group by the fk_customer column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery leftJoinCart($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cart relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery rightJoinCart($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cart relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery innerJoinCart($relationAlias = null) Adds a INNER JOIN clause to the query using the Cart relation
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery leftJoinCartUserStep($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartUserStep relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery rightJoinCartUserStep($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartUserStep relation
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery innerJoinCartUserStep($relationAlias = null) Adds a INNER JOIN clause to the query using the CartUserStep relation
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser matching the query
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser matching the query, or a new ProjectA_Zed_Cart_Persistence_Propel_PacCartUser object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOneByFkCart(int $fk_cart) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser filtered by the fk_cart column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOneByFkCustomer(int $fk_customer) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser filtered by the fk_customer column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser filtered by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_Propel_PacCartUser findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cart_Persistence_Propel_PacCartUser filtered by the updated_at column
 *
 * @method array findByIdCartUser(int $id_cart_user) Return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser objects filtered by the id_cart_user column
 * @method array findByFkCart(int $fk_cart) Return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser objects filtered by the fk_cart column
 * @method array findByFkCustomer(int $fk_customer) Return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser objects filtered by the fk_customer column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cart/Persistence/Propel.om
 */
abstract class Generated_Zed_Cart_Persistence_Propel_Om_BasePacCartUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cart_Persistence_Propel_Om_BasePacCartUserQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCartUser']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cart_Persistence_Propel_PacCartUser|ProjectA_Zed_Cart_Persistence_Propel_PacCartUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cart_Persistence_Propel_PacCartUser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCartUser($key, $con = null)
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
     * @return                 ProjectA_Zed_Cart_Persistence_Propel_PacCartUser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cart_user`, `fk_cart`, `fk_customer`, `created_at`, `updated_at` FROM `pac_cart_user` WHERE `id_cart_user` = :p0';
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
            $obj = new ProjectA_Zed_Cart_Persistence_Propel_PacCartUser();
            $obj->hydrate($row);
            ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUser|ProjectA_Zed_Cart_Persistence_Propel_PacCartUser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_Propel_PacCartUser[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cart_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCartUser(1234); // WHERE id_cart_user = 1234
     * $query->filterByIdCartUser(array(12, 34)); // WHERE id_cart_user IN (12, 34)
     * $query->filterByIdCartUser(array('min' => 12)); // WHERE id_cart_user >= 12
     * $query->filterByIdCartUser(array('max' => 12)); // WHERE id_cart_user <= 12
     * </code>
     *
     * @param     mixed $idCartUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByIdCartUser($idCartUser = null, $comparison = null)
    {
        if (is_array($idCartUser)) {
            $useMinMax = false;
            if (isset($idCartUser['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $idCartUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCartUser['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $idCartUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $idCartUser, $comparison);
    }

    /**
     * Filter the query on the fk_cart column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCart(1234); // WHERE fk_cart = 1234
     * $query->filterByFkCart(array(12, 34)); // WHERE fk_cart IN (12, 34)
     * $query->filterByFkCart(array('min' => 12)); // WHERE fk_cart >= 12
     * $query->filterByFkCart(array('max' => 12)); // WHERE fk_cart <= 12
     * </code>
     *
     * @see       filterByCart()
     *
     * @param     mixed $fkCart The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByFkCart($fkCart = null, $comparison = null)
    {
        if (is_array($fkCart)) {
            $useMinMax = false;
            if (isset($fkCart['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CART, $fkCart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCart['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CART, $fkCart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CART, $fkCart, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CUSTOMER, $fkCustomer, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_Propel_PacCart object
     *
     * @param   ProjectA_Zed_Cart_Persistence_Propel_PacCart|PropelObjectCollection $pacCart The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCart($pacCart, $comparison = null)
    {
        if ($pacCart instanceof ProjectA_Zed_Cart_Persistence_Propel_PacCart) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CART, $pacCart->getIdCart(), $comparison);
        } elseif ($pacCart instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CART, $pacCart->toKeyValue('PrimaryKey', 'IdCart'), $comparison);
        } else {
            throw new PropelException('filterByCart() only accepts arguments of type ProjectA_Zed_Cart_Persistence_Propel_PacCart or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cart relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function joinCart($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cart');

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
            $this->addJoinObject($join, 'Cart');
        }

        return $this;
    }

    /**
     * Use the Cart relation PacCart object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_Propel_PacCartQuery A secondary query class using the current class as primary query
     */
    public function useCartQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCart($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cart', 'ProjectA_Zed_Cart_Persistence_Propel_PacCartQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Customer_Persistence_Propel_PacCustomer object
     *
     * @param   ProjectA_Zed_Customer_Persistence_Propel_PacCustomer|PropelObjectCollection $pacCustomer The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCustomer($pacCustomer, $comparison = null)
    {
        if ($pacCustomer instanceof ProjectA_Zed_Customer_Persistence_Propel_PacCustomer) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CUSTOMER, $pacCustomer->getIdCustomer(), $comparison);
        } elseif ($pacCustomer instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::FK_CUSTOMER, $pacCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStep object
     *
     * @param   ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStep|PropelObjectCollection $pacCartUserStep  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartUserStep($pacCartUserStep, $comparison = null)
    {
        if ($pacCartUserStep instanceof ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStep) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $pacCartUserStep->getIdCartUserStep(), $comparison);
        } elseif ($pacCartUserStep instanceof PropelObjectCollection) {
            return $this
                ->useCartUserStepQuery()
                ->filterByPrimaryKeys($pacCartUserStep->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartUserStep() only accepts arguments of type ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStep or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartUserStep relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function joinCartUserStep($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartUserStep');

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
            $this->addJoinObject($join, 'CartUserStep');
        }

        return $this;
    }

    /**
     * Use the CartUserStep relation PacCartUserStep object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStepQuery A secondary query class using the current class as primary query
     */
    public function useCartUserStepQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCartUserStep($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartUserStep', 'ProjectA_Zed_Cart_Persistence_Propel_PacCartUserStepQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cart_Persistence_Propel_PacCartUser $pacCartUser Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function prune($pacCartUser = null)
    {
        if ($pacCartUser) {
            $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::ID_CART_USER, $pacCartUser->getIdCartUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_Propel_PacCartUserQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_Propel_PacCartUserPeer::CREATED_AT);
    }
}
