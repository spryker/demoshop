<?php


/**
 * Base class that represents a query for the 'pac_cart_user_step' table.
 *
 *
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery orderByIdCartUserStep($order = Criteria::ASC) Order by the id_cart_user_step column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery orderByStep($order = Criteria::ASC) Order by the step column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery orderByCurrentPosition($order = Criteria::ASC) Order by the current_position column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery groupByIdCartUserStep() Group by the id_cart_user_step column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery groupByStep() Group by the step column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery groupByCurrentPosition() Group by the current_position column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery leftJoinCartUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartUser relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery rightJoinCartUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartUser relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery innerJoinCartUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CartUser relation
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep matching the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep matching the query, or a new ProjectA_Zed_Cart_Persistence_PacCartUserStep object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOneByStep(string $step) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep filtered by the step column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOneByCurrentPosition(int $current_position) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep filtered by the current_position column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep filtered by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartUserStep findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartUserStep filtered by the updated_at column
 *
 * @method array findByIdCartUserStep(int $id_cart_user_step) Return ProjectA_Zed_Cart_Persistence_PacCartUserStep objects filtered by the id_cart_user_step column
 * @method array findByStep(string $step) Return ProjectA_Zed_Cart_Persistence_PacCartUserStep objects filtered by the step column
 * @method array findByCurrentPosition(int $current_position) Return ProjectA_Zed_Cart_Persistence_PacCartUserStep objects filtered by the current_position column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cart_Persistence_PacCartUserStep objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cart_Persistence_PacCartUserStep objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence.om
 */
abstract class Generated_Zed_Cart_Persistence_Om_BasePacCartUserStepQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cart_Persistence_Om_BasePacCartUserStepQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cart_Persistence_PacCartUserStep', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery();
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
     * @return   ProjectA_Zed_Cart_Persistence_PacCartUserStep|ProjectA_Zed_Cart_Persistence_PacCartUserStep[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartUserStep A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCartUserStep($key, $con = null)
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartUserStep A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cart_user_step`, `step`, `current_position`, `created_at`, `updated_at` FROM `pac_cart_user_step` WHERE `id_cart_user_step` = :p0';
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
            $obj = new ProjectA_Zed_Cart_Persistence_PacCartUserStep();
            $obj->hydrate($row);
            ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStep|ProjectA_Zed_Cart_Persistence_PacCartUserStep[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartUserStep[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cart_user_step column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCartUserStep(1234); // WHERE id_cart_user_step = 1234
     * $query->filterByIdCartUserStep(array(12, 34)); // WHERE id_cart_user_step IN (12, 34)
     * $query->filterByIdCartUserStep(array('min' => 12)); // WHERE id_cart_user_step >= 12
     * $query->filterByIdCartUserStep(array('max' => 12)); // WHERE id_cart_user_step <= 12
     * </code>
     *
     * @see       filterByCartUser()
     *
     * @param     mixed $idCartUserStep The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByIdCartUserStep($idCartUserStep = null, $comparison = null)
    {
        if (is_array($idCartUserStep)) {
            $useMinMax = false;
            if (isset($idCartUserStep['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $idCartUserStep['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCartUserStep['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $idCartUserStep['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $idCartUserStep, $comparison);
    }

    /**
     * Filter the query on the step column
     *
     * Example usage:
     * <code>
     * $query->filterByStep('fooValue');   // WHERE step = 'fooValue'
     * $query->filterByStep('%fooValue%'); // WHERE step LIKE '%fooValue%'
     * </code>
     *
     * @param     string $step The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByStep($step = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($step)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $step)) {
                $step = str_replace('*', '%', $step);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::STEP, $step, $comparison);
    }

    /**
     * Filter the query on the current_position column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentPosition(1234); // WHERE current_position = 1234
     * $query->filterByCurrentPosition(array(12, 34)); // WHERE current_position IN (12, 34)
     * $query->filterByCurrentPosition(array('min' => 12)); // WHERE current_position >= 12
     * $query->filterByCurrentPosition(array('max' => 12)); // WHERE current_position <= 12
     * </code>
     *
     * @param     mixed $currentPosition The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByCurrentPosition($currentPosition = null, $comparison = null)
    {
        if (is_array($currentPosition)) {
            $useMinMax = false;
            if (isset($currentPosition['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CURRENT_POSITION, $currentPosition['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentPosition['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CURRENT_POSITION, $currentPosition['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CURRENT_POSITION, $currentPosition, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartUser object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUser|PropelObjectCollection $pacCartUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartUser($pacCartUser, $comparison = null)
    {
        if ($pacCartUser instanceof ProjectA_Zed_Cart_Persistence_PacCartUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $pacCartUser->getIdCartUser(), $comparison);
        } elseif ($pacCartUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $pacCartUser->toKeyValue('PrimaryKey', 'IdCartUser'), $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function joinCartUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useCartUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCartUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartUser', 'ProjectA_Zed_Cart_Persistence_PacCartUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUserStep $pacCartUserStep Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function prune($pacCartUserStep = null)
    {
        if ($pacCartUserStep) {
            $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::ID_CART_USER_STEP, $pacCartUserStep->getIdCartUserStep(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartUserStepPeer::CREATED_AT);
    }
}
