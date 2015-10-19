<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategoryClosureTable as ChildSpyCategoryClosureTable;
use Propel\SpyCategoryClosureTableQuery as ChildSpyCategoryClosureTableQuery;
use Propel\Map\SpyCategoryClosureTableTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_category_closure_table' table.
 *
 *
 *
 * @method     ChildSpyCategoryClosureTableQuery orderByIdCategoryClosureTable($order = Criteria::ASC) Order by the id_category_closure_table column
 * @method     ChildSpyCategoryClosureTableQuery orderByFkCategoryNode($order = Criteria::ASC) Order by the fk_category_node column
 * @method     ChildSpyCategoryClosureTableQuery orderByFkCategoryNodeDescendant($order = Criteria::ASC) Order by the fk_category_node_descendant column
 * @method     ChildSpyCategoryClosureTableQuery orderByDepth($order = Criteria::ASC) Order by the depth column
 *
 * @method     ChildSpyCategoryClosureTableQuery groupByIdCategoryClosureTable() Group by the id_category_closure_table column
 * @method     ChildSpyCategoryClosureTableQuery groupByFkCategoryNode() Group by the fk_category_node column
 * @method     ChildSpyCategoryClosureTableQuery groupByFkCategoryNodeDescendant() Group by the fk_category_node_descendant column
 * @method     ChildSpyCategoryClosureTableQuery groupByDepth() Group by the depth column
 *
 * @method     ChildSpyCategoryClosureTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCategoryClosureTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCategoryClosureTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCategoryClosureTableQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryClosureTableQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryClosureTableQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method     ChildSpyCategoryClosureTableQuery leftJoinDescendantNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the DescendantNode relation
 * @method     ChildSpyCategoryClosureTableQuery rightJoinDescendantNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DescendantNode relation
 * @method     ChildSpyCategoryClosureTableQuery innerJoinDescendantNode($relationAlias = null) Adds a INNER JOIN clause to the query using the DescendantNode relation
 *
 * @method     \Propel\SpyCategoryNodeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCategoryClosureTable findOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryClosureTable matching the query
 * @method     ChildSpyCategoryClosureTable findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCategoryClosureTable matching the query, or a new ChildSpyCategoryClosureTable object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCategoryClosureTable findOneByIdCategoryClosureTable(int $id_category_closure_table) Return the first ChildSpyCategoryClosureTable filtered by the id_category_closure_table column
 * @method     ChildSpyCategoryClosureTable findOneByFkCategoryNode(int $fk_category_node) Return the first ChildSpyCategoryClosureTable filtered by the fk_category_node column
 * @method     ChildSpyCategoryClosureTable findOneByFkCategoryNodeDescendant(int $fk_category_node_descendant) Return the first ChildSpyCategoryClosureTable filtered by the fk_category_node_descendant column
 * @method     ChildSpyCategoryClosureTable findOneByDepth(int $depth) Return the first ChildSpyCategoryClosureTable filtered by the depth column *

 * @method     ChildSpyCategoryClosureTable requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCategoryClosureTable by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryClosureTable requireOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryClosureTable matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryClosureTable requireOneByIdCategoryClosureTable(int $id_category_closure_table) Return the first ChildSpyCategoryClosureTable filtered by the id_category_closure_table column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryClosureTable requireOneByFkCategoryNode(int $fk_category_node) Return the first ChildSpyCategoryClosureTable filtered by the fk_category_node column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryClosureTable requireOneByFkCategoryNodeDescendant(int $fk_category_node_descendant) Return the first ChildSpyCategoryClosureTable filtered by the fk_category_node_descendant column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryClosureTable requireOneByDepth(int $depth) Return the first ChildSpyCategoryClosureTable filtered by the depth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryClosureTable[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCategoryClosureTable objects based on current ModelCriteria
 * @method     ChildSpyCategoryClosureTable[]|ObjectCollection findByIdCategoryClosureTable(int $id_category_closure_table) Return ChildSpyCategoryClosureTable objects filtered by the id_category_closure_table column
 * @method     ChildSpyCategoryClosureTable[]|ObjectCollection findByFkCategoryNode(int $fk_category_node) Return ChildSpyCategoryClosureTable objects filtered by the fk_category_node column
 * @method     ChildSpyCategoryClosureTable[]|ObjectCollection findByFkCategoryNodeDescendant(int $fk_category_node_descendant) Return ChildSpyCategoryClosureTable objects filtered by the fk_category_node_descendant column
 * @method     ChildSpyCategoryClosureTable[]|ObjectCollection findByDepth(int $depth) Return ChildSpyCategoryClosureTable objects filtered by the depth column
 * @method     ChildSpyCategoryClosureTable[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCategoryClosureTableQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCategoryClosureTableQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCategoryClosureTable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCategoryClosureTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCategoryClosureTableQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCategoryClosureTableQuery) {
            return $criteria;
        }
        $query = new ChildSpyCategoryClosureTableQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyCategoryClosureTable|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCategoryClosureTableTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryClosureTableTableMap::DATABASE_NAME);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryClosureTable A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_category_closure_table, fk_category_node, fk_category_node_descendant, depth FROM spy_category_closure_table WHERE id_category_closure_table = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyCategoryClosureTable $obj */
            $obj = new ChildSpyCategoryClosureTable();
            $obj->hydrate($row);
            SpyCategoryClosureTableTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpyCategoryClosureTable|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_closure_table column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryClosureTable(1234); // WHERE id_category_closure_table = 1234
     * $query->filterByIdCategoryClosureTable(array(12, 34)); // WHERE id_category_closure_table IN (12, 34)
     * $query->filterByIdCategoryClosureTable(array('min' => 12)); // WHERE id_category_closure_table > 12
     * </code>
     *
     * @param     mixed $idCategoryClosureTable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByIdCategoryClosureTable($idCategoryClosureTable = null, $comparison = null)
    {
        if (is_array($idCategoryClosureTable)) {
            $useMinMax = false;
            if (isset($idCategoryClosureTable['min'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryClosureTable['max'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $idCategoryClosureTable, $comparison);
    }

    /**
     * Filter the query on the fk_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryNode(1234); // WHERE fk_category_node = 1234
     * $query->filterByFkCategoryNode(array(12, 34)); // WHERE fk_category_node IN (12, 34)
     * $query->filterByFkCategoryNode(array('min' => 12)); // WHERE fk_category_node > 12
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
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByFkCategoryNode($fkCategoryNode = null, $comparison = null)
    {
        if (is_array($fkCategoryNode)) {
            $useMinMax = false;
            if (isset($fkCategoryNode['min'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE, $fkCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryNode['max'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE, $fkCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE, $fkCategoryNode, $comparison);
    }

    /**
     * Filter the query on the fk_category_node_descendant column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryNodeDescendant(1234); // WHERE fk_category_node_descendant = 1234
     * $query->filterByFkCategoryNodeDescendant(array(12, 34)); // WHERE fk_category_node_descendant IN (12, 34)
     * $query->filterByFkCategoryNodeDescendant(array('min' => 12)); // WHERE fk_category_node_descendant > 12
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
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByFkCategoryNodeDescendant($fkCategoryNodeDescendant = null, $comparison = null)
    {
        if (is_array($fkCategoryNodeDescendant)) {
            $useMinMax = false;
            if (isset($fkCategoryNodeDescendant['min'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryNodeDescendant['max'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT, $fkCategoryNodeDescendant, $comparison);
    }

    /**
     * Filter the query on the depth column
     *
     * Example usage:
     * <code>
     * $query->filterByDepth(1234); // WHERE depth = 1234
     * $query->filterByDepth(array(12, 34)); // WHERE depth IN (12, 34)
     * $query->filterByDepth(array('min' => 12)); // WHERE depth > 12
     * </code>
     *
     * @param     mixed $depth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByDepth($depth = null, $comparison = null)
    {
        if (is_array($depth)) {
            $useMinMax = false;
            if (isset($depth['min'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_DEPTH, $depth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($depth['max'])) {
                $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_DEPTH, $depth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_DEPTH, $depth, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE, $spyCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($spyCategoryNode instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE, $spyCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByNode() only accepts arguments of type \Propel\SpyCategoryNode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Node relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
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
     * Use the Node relation SpyCategoryNode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useNodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Node', '\Propel\SpyCategoryNodeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function filterByDescendantNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT, $spyCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($spyCategoryNode instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT, $spyCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByDescendantNode() only accepts arguments of type \Propel\SpyCategoryNode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DescendantNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
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
     * Use the DescendantNode relation SpyCategoryNode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useDescendantNodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDescendantNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DescendantNode', '\Propel\SpyCategoryNodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCategoryClosureTable $spyCategoryClosureTable Object to remove from the list of results
     *
     * @return $this|ChildSpyCategoryClosureTableQuery The current query, for fluid interface
     */
    public function prune($spyCategoryClosureTable = null)
    {
        if ($spyCategoryClosureTable) {
            $this->addUsingAlias(SpyCategoryClosureTableTableMap::COL_ID_CATEGORY_CLOSURE_TABLE, $spyCategoryClosureTable->getIdCategoryClosureTable(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_category_closure_table table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryClosureTableTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCategoryClosureTableTableMap::clearInstancePool();
            SpyCategoryClosureTableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryClosureTableTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCategoryClosureTableTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCategoryClosureTableTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCategoryClosureTableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCategoryClosureTableQuery
