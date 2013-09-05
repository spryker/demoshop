<?php


/**
 * Base class that represents a query for the 'pac_cart_item_option' table.
 *
 *
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery orderByIdCartItemOption($order = Criteria::ASC) Order by the id_cart_item_option column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery orderByFkCartItem($order = Criteria::ASC) Order by the fk_cart_item column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery orderByIdentifier($order = Criteria::ASC) Order by the identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery groupByIdCartItemOption() Group by the id_cart_item_option column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery groupByFkCartItem() Group by the fk_cart_item column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery groupByIdentifier() Group by the identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery leftJoinCartItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartItem relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery rightJoinCartItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartItem relation
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery innerJoinCartItem($relationAlias = null) Adds a INNER JOIN clause to the query using the CartItem relation
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption matching the query
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption matching the query, or a new ProjectA_Zed_Cart_Persistence_PacCartItemOption object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOneByFkCartItem(int $fk_cart_item) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption filtered by the fk_cart_item column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOneByIdentifier(string $identifier) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption filtered by the identifier column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption filtered by the created_at column
 * @method ProjectA_Zed_Cart_Persistence_PacCartItemOption findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Cart_Persistence_PacCartItemOption filtered by the updated_at column
 *
 * @method array findByIdCartItemOption(int $id_cart_item_option) Return ProjectA_Zed_Cart_Persistence_PacCartItemOption objects filtered by the id_cart_item_option column
 * @method array findByFkCartItem(int $fk_cart_item) Return ProjectA_Zed_Cart_Persistence_PacCartItemOption objects filtered by the fk_cart_item column
 * @method array findByIdentifier(string $identifier) Return ProjectA_Zed_Cart_Persistence_PacCartItemOption objects filtered by the identifier column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Cart_Persistence_PacCartItemOption objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Cart_Persistence_PacCartItemOption objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence.om
 */
abstract class Generated_Zed_Cart_Persistence_Om_BasePacCartItemOptionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cart_Persistence_Om_BasePacCartItemOptionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Cart_Persistence_PacCartItemOption', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery();
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
     * @return   ProjectA_Zed_Cart_Persistence_PacCartItemOption|ProjectA_Zed_Cart_Persistence_PacCartItemOption[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItemOption A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCartItemOption($key, $con = null)
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
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItemOption A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cart_item_option`, `fk_cart_item`, `identifier`, `created_at`, `updated_at` FROM `pac_cart_item_option` WHERE `id_cart_item_option` = :p0';
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
            $obj = new ProjectA_Zed_Cart_Persistence_PacCartItemOption();
            $obj->hydrate($row);
            ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOption|ProjectA_Zed_Cart_Persistence_PacCartItemOption[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cart_Persistence_PacCartItemOption[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cart_item_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCartItemOption(1234); // WHERE id_cart_item_option = 1234
     * $query->filterByIdCartItemOption(array(12, 34)); // WHERE id_cart_item_option IN (12, 34)
     * $query->filterByIdCartItemOption(array('min' => 12)); // WHERE id_cart_item_option >= 12
     * $query->filterByIdCartItemOption(array('max' => 12)); // WHERE id_cart_item_option <= 12
     * </code>
     *
     * @param     mixed $idCartItemOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByIdCartItemOption($idCartItemOption = null, $comparison = null)
    {
        if (is_array($idCartItemOption)) {
            $useMinMax = false;
            if (isset($idCartItemOption['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $idCartItemOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCartItemOption['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $idCartItemOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $idCartItemOption, $comparison);
    }

    /**
     * Filter the query on the fk_cart_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCartItem(1234); // WHERE fk_cart_item = 1234
     * $query->filterByFkCartItem(array(12, 34)); // WHERE fk_cart_item IN (12, 34)
     * $query->filterByFkCartItem(array('min' => 12)); // WHERE fk_cart_item >= 12
     * $query->filterByFkCartItem(array('max' => 12)); // WHERE fk_cart_item <= 12
     * </code>
     *
     * @see       filterByCartItem()
     *
     * @param     mixed $fkCartItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByFkCartItem($fkCartItem = null, $comparison = null)
    {
        if (is_array($fkCartItem)) {
            $useMinMax = false;
            if (isset($fkCartItem['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::FK_CART_ITEM, $fkCartItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCartItem['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::FK_CART_ITEM, $fkCartItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::FK_CART_ITEM, $fkCartItem, $comparison);
    }

    /**
     * Filter the query on the identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentifier('fooValue');   // WHERE identifier = 'fooValue'
     * $query->filterByIdentifier('%fooValue%'); // WHERE identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByIdentifier($identifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identifier)) {
                $identifier = str_replace('*', '%', $identifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::IDENTIFIER, $identifier, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartItem object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItem|PropelObjectCollection $pacCartItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartItem($pacCartItem, $comparison = null)
    {
        if ($pacCartItem instanceof ProjectA_Zed_Cart_Persistence_PacCartItem) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::FK_CART_ITEM, $pacCartItem->getIdCartItem(), $comparison);
        } elseif ($pacCartItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::FK_CART_ITEM, $pacCartItem->toKeyValue('PrimaryKey', 'IdCartItem'), $comparison);
        } else {
            throw new PropelException('filterByCartItem() only accepts arguments of type ProjectA_Zed_Cart_Persistence_PacCartItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function joinCartItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartItem');

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
            $this->addJoinObject($join, 'CartItem');
        }

        return $this;
    }

    /**
     * Use the CartItem relation PacCartItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_PacCartItemQuery A secondary query class using the current class as primary query
     */
    public function useCartItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCartItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartItem', 'ProjectA_Zed_Cart_Persistence_PacCartItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartItemOption $pacCartItemOption Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function prune($pacCartItemOption = null)
    {
        if ($pacCartItemOption) {
            $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::ID_CART_ITEM_OPTION, $pacCartItemOption->getIdCartItemOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Cart_Persistence_PacCartItemOptionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Cart_Persistence_PacCartItemOptionPeer::CREATED_AT);
    }
}
