<?php


/**
 * Base class that represents a query for the 'pac_category_node' table.
 *
 *
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery orderByIdCategoryNode($order = Criteria::ASC) Order by the id_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery orderByFkParentCategoryNode($order = Criteria::ASC) Order by the fk_parent_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery orderByIsRoot($order = Criteria::ASC) Order by the is_root column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery groupByIdCategoryNode() Group by the id_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery groupByFkCategory() Group by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery groupByFkParentCategoryNode() Group by the fk_parent_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery groupByIsRoot() Group by the is_root column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinCategoryNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryNode relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinCategoryNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryNode relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinCategoryNode($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryNode relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinClosureTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClosureTable relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinClosureTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClosureTable relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinClosureTable($relationAlias = null) Adds a INNER JOIN clause to the query using the ClosureTable relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinDescendant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Descendant relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinDescendant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Descendant relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinDescendant($relationAlias = null) Adds a INNER JOIN clause to the query using the Descendant relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery leftJoinPacProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductCategory relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery rightJoinPacProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductCategory relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery innerJoinPacProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductCategory relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode findOne(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode matching the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode matching the query, or a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode findOneByFkCategory(int $fk_category) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode filtered by the fk_category column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode findOneByFkParentCategoryNode(int $fk_parent_category_node) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode filtered by the fk_parent_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode findOneByIsRoot(boolean $is_root) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode filtered by the is_root column
 *
 * @method array findByIdCategoryNode(int $id_category_node) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects filtered by the id_category_node column
 * @method array findByFkCategory(int $fk_category) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects filtered by the fk_category column
 * @method array findByFkParentCategoryNode(int $fk_parent_category_node) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects filtered by the fk_parent_category_node column
 * @method array findByIsRoot(boolean $is_root) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode objects filtered by the is_root column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryNodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryNodeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryNode']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryNode($key, $con = null)
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_node`, `fk_category`, `fk_parent_category_node`, `is_root` FROM `pac_category_node` WHERE `id_category_node` = :p0';
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
            $obj = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode();
            $obj->hydrate($row);
            ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryNode(1234); // WHERE id_category_node = 1234
     * $query->filterByIdCategoryNode(array(12, 34)); // WHERE id_category_node IN (12, 34)
     * $query->filterByIdCategoryNode(array('min' => 12)); // WHERE id_category_node >= 12
     * $query->filterByIdCategoryNode(array('max' => 12)); // WHERE id_category_node <= 12
     * </code>
     *
     * @param     mixed $idCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryNode($idCategoryNode = null, $comparison = null)
    {
        if (is_array($idCategoryNode)) {
            $useMinMax = false;
            if (isset($idCategoryNode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $idCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryNode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $idCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $idCategoryNode, $comparison);
    }

    /**
     * Filter the query on the fk_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategory(1234); // WHERE fk_category = 1234
     * $query->filterByFkCategory(array(12, 34)); // WHERE fk_category IN (12, 34)
     * $query->filterByFkCategory(array('min' => 12)); // WHERE fk_category >= 12
     * $query->filterByFkCategory(array('max' => 12)); // WHERE fk_category <= 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $fkCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_CATEGORY, $fkCategory, $comparison);
    }

    /**
     * Filter the query on the fk_parent_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByFkParentCategoryNode(1234); // WHERE fk_parent_category_node = 1234
     * $query->filterByFkParentCategoryNode(array(12, 34)); // WHERE fk_parent_category_node IN (12, 34)
     * $query->filterByFkParentCategoryNode(array('min' => 12)); // WHERE fk_parent_category_node >= 12
     * $query->filterByFkParentCategoryNode(array('max' => 12)); // WHERE fk_parent_category_node <= 12
     * </code>
     *
     * @see       filterByCategoryNode()
     *
     * @param     mixed $fkParentCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByFkParentCategoryNode($fkParentCategoryNode = null, $comparison = null)
    {
        if (is_array($fkParentCategoryNode)) {
            $useMinMax = false;
            if (isset($fkParentCategoryNode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkParentCategoryNode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode, $comparison);
    }

    /**
     * Filter the query on the is_root column
     *
     * Example usage:
     * <code>
     * $query->filterByIsRoot(true); // WHERE is_root = true
     * $query->filterByIsRoot('yes'); // WHERE is_root = true
     * </code>
     *
     * @param     boolean|string $isRoot The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByIsRoot($isRoot = null, $comparison = null)
    {
        if (is_string($isRoot)) {
            $isRoot = in_array(strtolower($isRoot), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::IS_ROOT, $isRoot, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_PARENT_CATEGORY_NODE, $pacCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($pacCategoryNode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_PARENT_CATEGORY_NODE, $pacCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByCategoryNode() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function joinCategoryNode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryNode');

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
            $this->addJoinObject($join, 'CategoryNode');
        }

        return $this;
    }

    /**
     * Use the CategoryNode relation PacCategoryNode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useCategoryNodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCategoryNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryNode', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree|PropelObjectCollection $pacCategoryTree The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($pacCategoryTree, $comparison = null)
    {
        if ($pacCategoryTree instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_CATEGORY, $pacCategoryTree->getIdCategory(), $comparison);
        } elseif ($pacCategoryTree instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::FK_CATEGORY, $pacCategoryTree->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTree or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
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
     * Use the Category relation PacCategoryTree object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $pacCategoryNode->getFkParentCategoryNode(), $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function joinNode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useNodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Node', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable|PropelObjectCollection $pacCategoryClosureTable  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClosureTable($pacCategoryClosureTable, $comparison = null)
    {
        if ($pacCategoryClosureTable instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $pacCategoryClosureTable->getFkCategoryNode(), $comparison);
        } elseif ($pacCategoryClosureTable instanceof PropelObjectCollection) {
            return $this
                ->useClosureTableQuery()
                ->filterByPrimaryKeys($pacCategoryClosureTable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClosureTable() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClosureTable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function joinClosureTable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClosureTable');

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
            $this->addJoinObject($join, 'ClosureTable');
        }

        return $this;
    }

    /**
     * Use the ClosureTable relation PacCategoryClosureTable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery A secondary query class using the current class as primary query
     */
    public function useClosureTableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClosureTable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClosureTable', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable|PropelObjectCollection $pacCategoryClosureTable  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDescendant($pacCategoryClosureTable, $comparison = null)
    {
        if ($pacCategoryClosureTable instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $pacCategoryClosureTable->getFkCategoryNodeDescendant(), $comparison);
        } elseif ($pacCategoryClosureTable instanceof PropelObjectCollection) {
            return $this
                ->useDescendantQuery()
                ->filterByPrimaryKeys($pacCategoryClosureTable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDescendant() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Descendant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function joinDescendant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Descendant');

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
            $this->addJoinObject($join, 'Descendant');
        }

        return $this;
    }

    /**
     * Use the Descendant relation PacCategoryClosureTable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery A secondary query class using the current class as primary query
     */
    public function useDescendantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDescendant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Descendant', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory object
     *
     * @param   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory|PropelObjectCollection $pacProductCategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductCategory($pacProductCategory, $comparison = null)
    {
        if ($pacProductCategory instanceof ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $pacProductCategory->getFkCategoryNode(), $comparison);
        } elseif ($pacProductCategory instanceof PropelObjectCollection) {
            return $this
                ->usePacProductCategoryQuery()
                ->filterByPrimaryKeys($pacProductCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductCategory() only accepts arguments of type ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function joinPacProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductCategory');

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
            $this->addJoinObject($join, 'PacProductCategory');
        }

        return $this;
    }

    /**
     * Use the PacProductCategory relation PacProductCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function usePacProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductCategory', 'ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode $pacCategoryNode Object to remove from the list of results
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery The current query, for fluid interface
     */
    public function prune($pacCategoryNode = null)
    {
        if ($pacCategoryNode) {
            $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodePeer::ID_CATEGORY_NODE, $pacCategoryNode->getIdCategoryNode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
