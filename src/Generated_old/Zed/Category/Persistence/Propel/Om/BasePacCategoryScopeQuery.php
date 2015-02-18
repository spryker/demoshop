<?php


/**
 * Base class that represents a query for the 'pac_category_scope' table.
 *
 *
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery orderByIdCategoryScope($order = Criteria::ASC) Order by the id_category_scope column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery groupByIdCategoryScope() Group by the id_category_scope column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery leftJoinAttributeKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeKey relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery rightJoinAttributeKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeKey relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery innerJoinAttributeKey($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeKey relation
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope matching the query
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope matching the query, or a new ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope findOneByName(string $name) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope filtered by the name column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope filtered by the created_at column
 * @method ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope filtered by the updated_at column
 *
 * @method array findByIdCategoryScope(int $id_category_scope) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope objects filtered by the id_category_scope column
 * @method array findByName(string $name) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope objects filtered by the name column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Category/Persistence/Propel.om
 */
abstract class Generated_Zed_Category_Persistence_Propel_Om_BasePacCategoryScopeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Propel_Om_BasePacCategoryScopeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryScope']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope|ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryScope($key, $con = null)
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
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_scope`, `name`, `created_at`, `updated_at` FROM `pac_category_scope` WHERE `id_category_scope` = :p0';
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
            $obj = new ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope();
            $obj->hydrate($row);
            ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope|ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_scope column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryScope(1234); // WHERE id_category_scope = 1234
     * $query->filterByIdCategoryScope(array(12, 34)); // WHERE id_category_scope IN (12, 34)
     * $query->filterByIdCategoryScope(array('min' => 12)); // WHERE id_category_scope >= 12
     * $query->filterByIdCategoryScope(array('max' => 12)); // WHERE id_category_scope <= 12
     * </code>
     *
     * @param     mixed $idCategoryScope The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryScope($idCategoryScope = null, $comparison = null)
    {
        if (is_array($idCategoryScope)) {
            $useMinMax = false;
            if (isset($idCategoryScope['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $idCategoryScope['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryScope['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $idCategoryScope['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $idCategoryScope, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKey object
     *
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKey|PropelObjectCollection $pacCategoryAttributeKey  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeKey($pacCategoryAttributeKey, $comparison = null)
    {
        if ($pacCategoryAttributeKey instanceof ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $pacCategoryAttributeKey->getFkCategoryScope(), $comparison);
        } elseif ($pacCategoryAttributeKey instanceof PropelObjectCollection) {
            return $this
                ->useAttributeKeyQuery()
                ->filterByPrimaryKeys($pacCategoryAttributeKey->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeKey() only accepts arguments of type ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function joinAttributeKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeKey');

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
            $this->addJoinObject($join, 'AttributeKey');
        }

        return $this;
    }

    /**
     * Use the AttributeKey relation PacCategoryAttributeKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKeyQuery A secondary query class using the current class as primary query
     */
    public function useAttributeKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeKey', 'ProjectA_Zed_Category_Persistence_Propel_PacCategoryAttributeKeyQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_Propel_PacCategory object
     *
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategory|PropelObjectCollection $pacCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($pacCategory, $comparison = null)
    {
        if ($pacCategory instanceof ProjectA_Zed_Category_Persistence_Propel_PacCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $pacCategory->getFkCategoryScope(), $comparison);
        } elseif ($pacCategory instanceof PropelObjectCollection) {
            return $this
                ->useCategoryQuery()
                ->filterByPrimaryKeys($pacCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ProjectA_Zed_Category_Persistence_Propel_PacCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation PacCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_Propel_PacCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ProjectA_Zed_Category_Persistence_Propel_PacCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Category_Persistence_Propel_PacCategoryScope $pacCategoryScope Object to remove from the list of results
     *
     * @return ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function prune($pacCategoryScope = null)
    {
        if ($pacCategoryScope) {
            $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $pacCategoryScope->getIdCategoryScope(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_Propel_PacCategoryScopePeer::CREATED_AT);
    }
}
