<?php


/**
 * Base class that represents a query for the 'pac_category_closure_table' table.
 *
 *
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery orderByIdCategoryClosureTable($order = Criteria::ASC) Order by the id_category_closure_table column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery orderByFkCategoryNode($order = Criteria::ASC) Order by the fk_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery orderByFkCategoryNodeDescendant($order = Criteria::ASC) Order by the fk_category_node_descendant column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery orderByDepth($order = Criteria::ASC) Order by the depth column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery groupByIdCategoryClosureTable() Group by the id_category_closure_table column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery groupByFkCategoryNode() Group by the fk_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery groupByFkCategoryNodeDescendant() Group by the fk_category_node_descendant column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery groupByDepth() Group by the depth column
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery leftJoinDescendantNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the DescendantNode relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery rightJoinDescendantNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DescendantNode relation
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery innerJoinDescendantNode($relationAlias = null) Adds a INNER JOIN clause to the query using the DescendantNode relation
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable findOne(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable matching the query
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable matching the query, or a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable findOneByFkCategoryNode(int $fk_category_node) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable filtered by the fk_category_node column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable findOneByFkCategoryNodeDescendant(int $fk_category_node_descendant) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable filtered by the fk_category_node_descendant column
 * @method ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable findOneByDepth(int $depth) Return the first ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable filtered by the depth column
 *
 * @method array findByIdCategoryClosureTable(int $id_category_closure_table) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable objects filtered by the id_category_closure_table column
 * @method array findByFkCategoryNode(int $fk_category_node) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable objects filtered by the fk_category_node column
 * @method array findByFkCategoryNodeDescendant(int $fk_category_node_descendant) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable objects filtered by the fk_category_node_descendant column
 * @method array findByDepth(int $depth) Return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable objects filtered by the depth column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/CategoryTree/Persistence/Propel.om
 */
abstract class Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryClosureTableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_CategoryTree_Persistence_Propel_Om_BasePacCategoryClosureTableQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCategoryClosureTable']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategoryClosureTable($key, $con = null)
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
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category_closure_table`, `fk_category_node`, `fk_category_node_descendant`, `depth` FROM `pac_category_closure_table` WHERE `id_category_closure_table` = :p0';
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
            $obj = new ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable();
            $obj->hydrate($row);
            ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_closure_table column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryClosureTable(1234); // WHERE id_category_closure_table = 1234
     * $query->filterByIdCategoryClosureTable(array(12, 34)); // WHERE id_category_closure_table IN (12, 34)
     * $query->filterByIdCategoryClosureTable(array('min' => 12)); // WHERE id_category_closure_table >= 12
     * $query->filterByIdCategoryClosureTable(array('max' => 12)); // WHERE id_category_closure_table <= 12
     * </code>
     *
     * @param     mixed $idCategoryClosureTable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByIdCategoryClosureTable($idCategoryClosureTable = null, $comparison = null)
    {
        if (is_array($idCategoryClosureTable)) {
            $useMinMax = false;
            if (isset($idCategoryClosureTable['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryClosureTable['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable, $comparison);
    }

    /**
     * Filter the query on the fk_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryNode(1234); // WHERE fk_category_node = 1234
     * $query->filterByFkCategoryNode(array(12, 34)); // WHERE fk_category_node IN (12, 34)
     * $query->filterByFkCategoryNode(array('min' => 12)); // WHERE fk_category_node >= 12
     * $query->filterByFkCategoryNode(array('max' => 12)); // WHERE fk_category_node <= 12
     * </code>
     *
     * @see       filterByNode()
     *
     * @param     mixed $fkCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByFkCategoryNode($fkCategoryNode = null, $comparison = null)
    {
        if (is_array($fkCategoryNode)) {
            $useMinMax = false;
            if (isset($fkCategoryNode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE, $fkCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryNode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE, $fkCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE, $fkCategoryNode, $comparison);
    }

    /**
     * Filter the query on the fk_category_node_descendant column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryNodeDescendant(1234); // WHERE fk_category_node_descendant = 1234
     * $query->filterByFkCategoryNodeDescendant(array(12, 34)); // WHERE fk_category_node_descendant IN (12, 34)
     * $query->filterByFkCategoryNodeDescendant(array('min' => 12)); // WHERE fk_category_node_descendant >= 12
     * $query->filterByFkCategoryNodeDescendant(array('max' => 12)); // WHERE fk_category_node_descendant <= 12
     * </code>
     *
     * @see       filterByDescendantNode()
     *
     * @param     mixed $fkCategoryNodeDescendant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByFkCategoryNodeDescendant($fkCategoryNodeDescendant = null, $comparison = null)
    {
        if (is_array($fkCategoryNodeDescendant)) {
            $useMinMax = false;
            if (isset($fkCategoryNodeDescendant['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryNodeDescendant['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant, $comparison);
    }

    /**
     * Filter the query on the depth column
     *
     * Example usage:
     * <code>
     * $query->filterByDepth(1234); // WHERE depth = 1234
     * $query->filterByDepth(array(12, 34)); // WHERE depth IN (12, 34)
     * $query->filterByDepth(array('min' => 12)); // WHERE depth >= 12
     * $query->filterByDepth(array('max' => 12)); // WHERE depth <= 12
     * </code>
     *
     * @param     mixed $depth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByDepth($depth = null, $comparison = null)
    {
        if (is_array($depth)) {
            $useMinMax = false;
            if (isset($depth['min'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::DEPTH, $depth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($depth['max'])) {
                $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::DEPTH, $depth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::DEPTH, $depth, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE, $pacCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($pacCategoryNode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE, $pacCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
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
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode object
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode|PropelObjectCollection $pacCategoryNode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDescendantNode($pacCategoryNode, $comparison = null)
    {
        if ($pacCategoryNode instanceof ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE_DESCENDANT, $pacCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($pacCategoryNode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::FK_CATEGORY_NODE_DESCENDANT, $pacCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByDescendantNode() only accepts arguments of type ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DescendantNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function joinDescendantNode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DescendantNode');

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
            $this->addJoinObject($join, 'DescendantNode');
        }

        return $this;
    }

    /**
     * Use the DescendantNode relation PacCategoryNode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useDescendantNodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDescendantNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DescendantNode', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTable $pacCategoryClosureTable Object to remove from the list of results
     *
     * @return ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTableQuery The current query, for fluid interface
     */
    public function prune($pacCategoryClosureTable = null)
    {
        if ($pacCategoryClosureTable) {
            $this->addUsingAlias(ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryClosureTablePeer::ID_CATEGORY_CLOSURE_TABLE, $pacCategoryClosureTable->getIdCategoryClosureTable(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
