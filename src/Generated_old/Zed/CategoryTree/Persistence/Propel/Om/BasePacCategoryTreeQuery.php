<?php


/**
 * Base class that represents a query for the 'pac_category_tree' table.
 *
 *
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery orderByIdCategory($order = Criteria::ASC) Order by the id_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery groupByIdCategory() Group by the id_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery groupByIsActive() Group by the is_active column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree findOne(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree matching the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree matching the query, or a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree filtered by the is_active column
 *
 * @method array findByIdCategory(int $id_category) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree objects filtered by the id_category column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree objects filtered by the is_active column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTreeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryTreeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryTree']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategory($key, $con = null)
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category`, `is_active` FROM `pac_category_tree` WHERE `id_category` = :p0';
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
            $obj = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree();
            $obj->hydrate($row);
            ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategory(1234); // WHERE id_category = 1234
     * $query->filterByIdCategory(array(12, 34)); // WHERE id_category IN (12, 34)
     * $query->filterByIdCategory(array('min' => 12)); // WHERE id_category >= 12
     * $query->filterByIdCategory(array('max' => 12)); // WHERE id_category <= 12
     * </code>
     *
     * @param     mixed $idCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function filterByIdCategory($idCategory = null, $comparison = null)
    {
        if (is_array($idCategory)) {
            $useMinMax = false;
            if (isset($idCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $idCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $idCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $idCategory, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $pacCategoryNode->getFkCategory(), $comparison);
        } elseif ($pacCategoryNode instanceof PropelObjectCollection) {
            return $this
                ->useNodeQuery()
                ->filterByPrimaryKeys($pacCategoryNode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNode() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Node relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function joinNode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Node');

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
            $this->addJoinObject($join, 'Node');
        }

        return $this;
    }

    /**
     * Use the Node relation PacCategoryNode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useNodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Node', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute|PropelObjectCollection $pacCategoryTreeAttribute  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacCategoryTreeAttribute, $comparison = null)
    {
        if ($pacCategoryTreeAttribute instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $pacCategoryTreeAttribute->getFkCategory(), $comparison);
        } elseif ($pacCategoryTreeAttribute instanceof PropelObjectCollection) {
            return $this
                ->useAttributeQuery()
                ->filterByPrimaryKeys($pacCategoryTreeAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function joinAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Attribute');

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
            $this->addJoinObject($join, 'Attribute');
        }

        return $this;
    }

    /**
     * Use the Attribute relation PacCategoryTreeAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree $pacCategoryTree Object to remove from the list of results
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery The current query, for fluid interface
     */
    public function prune($pacCategoryTree = null)
    {
        if ($pacCategoryTree) {
            $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreePeer::ID_CATEGORY, $pacCategoryTree->getIdCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
