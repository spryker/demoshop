<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategoryNode as ChildSpyCategoryNode;
use Propel\SpyCategoryNodeQuery as ChildSpyCategoryNodeQuery;
use Propel\Map\SpyCategoryNodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_category_node' table.
 *
 *
 *
 * @method     ChildSpyCategoryNodeQuery orderByIdCategoryNode($order = Criteria::ASC) Order by the id_category_node column
 * @method     ChildSpyCategoryNodeQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 * @method     ChildSpyCategoryNodeQuery orderByFkParentCategoryNode($order = Criteria::ASC) Order by the fk_parent_category_node column
 * @method     ChildSpyCategoryNodeQuery orderByIsRoot($order = Criteria::ASC) Order by the is_root column
 * @method     ChildSpyCategoryNodeQuery orderByIsMain($order = Criteria::ASC) Order by the is_main column
 * @method     ChildSpyCategoryNodeQuery orderByNodeOrder($order = Criteria::ASC) Order by the node_order column
 *
 * @method     ChildSpyCategoryNodeQuery groupByIdCategoryNode() Group by the id_category_node column
 * @method     ChildSpyCategoryNodeQuery groupByFkCategory() Group by the fk_category column
 * @method     ChildSpyCategoryNodeQuery groupByFkParentCategoryNode() Group by the fk_parent_category_node column
 * @method     ChildSpyCategoryNodeQuery groupByIsRoot() Group by the is_root column
 * @method     ChildSpyCategoryNodeQuery groupByIsMain() Group by the is_main column
 * @method     ChildSpyCategoryNodeQuery groupByNodeOrder() Group by the node_order column
 *
 * @method     ChildSpyCategoryNodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCategoryNodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCategoryNodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinParentCategoryNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the ParentCategoryNode relation
 * @method     ChildSpyCategoryNodeQuery rightJoinParentCategoryNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ParentCategoryNode relation
 * @method     ChildSpyCategoryNodeQuery innerJoinParentCategoryNode($relationAlias = null) Adds a INNER JOIN clause to the query using the ParentCategoryNode relation
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ChildSpyCategoryNodeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ChildSpyCategoryNodeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryNodeQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryNodeQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinClosureTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClosureTable relation
 * @method     ChildSpyCategoryNodeQuery rightJoinClosureTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClosureTable relation
 * @method     ChildSpyCategoryNodeQuery innerJoinClosureTable($relationAlias = null) Adds a INNER JOIN clause to the query using the ClosureTable relation
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinDescendant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Descendant relation
 * @method     ChildSpyCategoryNodeQuery rightJoinDescendant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Descendant relation
 * @method     ChildSpyCategoryNodeQuery innerJoinDescendant($relationAlias = null) Adds a INNER JOIN clause to the query using the Descendant relation
 *
 * @method     ChildSpyCategoryNodeQuery leftJoinSpyUrl($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyCategoryNodeQuery rightJoinSpyUrl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyCategoryNodeQuery innerJoinSpyUrl($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUrl relation
 *
 * @method     \Propel\SpyCategoryNodeQuery|\Propel\SpyCategoryQuery|\Propel\SpyCategoryClosureTableQuery|\Propel\SpyUrlQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCategoryNode findOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryNode matching the query
 * @method     ChildSpyCategoryNode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCategoryNode matching the query, or a new ChildSpyCategoryNode object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCategoryNode findOneByIdCategoryNode(int $id_category_node) Return the first ChildSpyCategoryNode filtered by the id_category_node column
 * @method     ChildSpyCategoryNode findOneByFkCategory(int $fk_category) Return the first ChildSpyCategoryNode filtered by the fk_category column
 * @method     ChildSpyCategoryNode findOneByFkParentCategoryNode(int $fk_parent_category_node) Return the first ChildSpyCategoryNode filtered by the fk_parent_category_node column
 * @method     ChildSpyCategoryNode findOneByIsRoot(boolean $is_root) Return the first ChildSpyCategoryNode filtered by the is_root column
 * @method     ChildSpyCategoryNode findOneByIsMain(boolean $is_main) Return the first ChildSpyCategoryNode filtered by the is_main column
 * @method     ChildSpyCategoryNode findOneByNodeOrder(int $node_order) Return the first ChildSpyCategoryNode filtered by the node_order column *

 * @method     ChildSpyCategoryNode requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCategoryNode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryNode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryNode requireOneByIdCategoryNode(int $id_category_node) Return the first ChildSpyCategoryNode filtered by the id_category_node column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOneByFkCategory(int $fk_category) Return the first ChildSpyCategoryNode filtered by the fk_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOneByFkParentCategoryNode(int $fk_parent_category_node) Return the first ChildSpyCategoryNode filtered by the fk_parent_category_node column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOneByIsRoot(boolean $is_root) Return the first ChildSpyCategoryNode filtered by the is_root column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOneByIsMain(boolean $is_main) Return the first ChildSpyCategoryNode filtered by the is_main column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryNode requireOneByNodeOrder(int $node_order) Return the first ChildSpyCategoryNode filtered by the node_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryNode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCategoryNode objects based on current ModelCriteria
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByIdCategoryNode(int $id_category_node) Return ChildSpyCategoryNode objects filtered by the id_category_node column
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByFkCategory(int $fk_category) Return ChildSpyCategoryNode objects filtered by the fk_category column
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByFkParentCategoryNode(int $fk_parent_category_node) Return ChildSpyCategoryNode objects filtered by the fk_parent_category_node column
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByIsRoot(boolean $is_root) Return ChildSpyCategoryNode objects filtered by the is_root column
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByIsMain(boolean $is_main) Return ChildSpyCategoryNode objects filtered by the is_main column
 * @method     ChildSpyCategoryNode[]|ObjectCollection findByNodeOrder(int $node_order) Return ChildSpyCategoryNode objects filtered by the node_order column
 * @method     ChildSpyCategoryNode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCategoryNodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCategoryNodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCategoryNode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCategoryNodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCategoryNodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCategoryNodeQuery) {
            return $criteria;
        }
        $query = new ChildSpyCategoryNodeQuery();
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
     * @return ChildSpyCategoryNode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCategoryNodeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
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
     * @return ChildSpyCategoryNode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_category_node, fk_category, fk_parent_category_node, is_root, is_main, node_order FROM spy_category_node WHERE id_category_node = :p0';
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
            /** @var ChildSpyCategoryNode $obj */
            $obj = new ChildSpyCategoryNode();
            $obj->hydrate($row);
            SpyCategoryNodeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCategoryNode|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryNode(1234); // WHERE id_category_node = 1234
     * $query->filterByIdCategoryNode(array(12, 34)); // WHERE id_category_node IN (12, 34)
     * $query->filterByIdCategoryNode(array('min' => 12)); // WHERE id_category_node > 12
     * </code>
     *
     * @param     mixed $idCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryNode($idCategoryNode = null, $comparison = null)
    {
        if (is_array($idCategoryNode)) {
            $useMinMax = false;
            if (isset($idCategoryNode['min'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $idCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryNode['max'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $idCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $idCategoryNode, $comparison);
    }

    /**
     * Filter the query on the fk_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategory(1234); // WHERE fk_category = 1234
     * $query->filterByFkCategory(array(12, 34)); // WHERE fk_category IN (12, 34)
     * $query->filterByFkCategory(array('min' => 12)); // WHERE fk_category > 12
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
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $fkCategory, $comparison);
    }

    /**
     * Filter the query on the fk_parent_category_node column
     *
     * Example usage:
     * <code>
     * $query->filterByFkParentCategoryNode(1234); // WHERE fk_parent_category_node = 1234
     * $query->filterByFkParentCategoryNode(array(12, 34)); // WHERE fk_parent_category_node IN (12, 34)
     * $query->filterByFkParentCategoryNode(array('min' => 12)); // WHERE fk_parent_category_node > 12
     * </code>
     *
     * @see       filterByParentCategoryNode()
     *
     * @param     mixed $fkParentCategoryNode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByFkParentCategoryNode($fkParentCategoryNode = null, $comparison = null)
    {
        if (is_array($fkParentCategoryNode)) {
            $useMinMax = false;
            if (isset($fkParentCategoryNode['min'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkParentCategoryNode['max'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $fkParentCategoryNode, $comparison);
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
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByIsRoot($isRoot = null, $comparison = null)
    {
        if (is_string($isRoot)) {
            $isRoot = in_array(strtolower($isRoot), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_IS_ROOT, $isRoot, $comparison);
    }

    /**
     * Filter the query on the is_main column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMain(true); // WHERE is_main = true
     * $query->filterByIsMain('yes'); // WHERE is_main = true
     * </code>
     *
     * @param     boolean|string $isMain The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByIsMain($isMain = null, $comparison = null)
    {
        if (is_string($isMain)) {
            $isMain = in_array(strtolower($isMain), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_IS_MAIN, $isMain, $comparison);
    }

    /**
     * Filter the query on the node_order column
     *
     * Example usage:
     * <code>
     * $query->filterByNodeOrder(1234); // WHERE node_order = 1234
     * $query->filterByNodeOrder(array(12, 34)); // WHERE node_order IN (12, 34)
     * $query->filterByNodeOrder(array('min' => 12)); // WHERE node_order > 12
     * </code>
     *
     * @param     mixed $nodeOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByNodeOrder($nodeOrder = null, $comparison = null)
    {
        if (is_array($nodeOrder)) {
            $useMinMax = false;
            if (isset($nodeOrder['min'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_NODE_ORDER, $nodeOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nodeOrder['max'])) {
                $this->addUsingAlias(SpyCategoryNodeTableMap::COL_NODE_ORDER, $nodeOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryNodeTableMap::COL_NODE_ORDER, $nodeOrder, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByParentCategoryNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $spyCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($spyCategoryNode instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, $spyCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterByParentCategoryNode() only accepts arguments of type \Propel\SpyCategoryNode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ParentCategoryNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function joinParentCategoryNode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ParentCategoryNode');

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
            $this->addJoinObject($join, 'ParentCategoryNode');
        }

        return $this;
    }

    /**
     * Use the ParentCategoryNode relation SpyCategoryNode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useParentCategoryNodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinParentCategoryNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ParentCategoryNode', '\Propel\SpyCategoryNodeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategory object
     *
     * @param \Propel\SpyCategory|ObjectCollection $spyCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByCategory($spyCategory, $comparison = null)
    {
        if ($spyCategory instanceof \Propel\SpyCategory) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $spyCategory->getIdCategory(), $comparison);
        } elseif ($spyCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_FK_CATEGORY, $spyCategory->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type \Propel\SpyCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
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
     * Use the Category relation SpyCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', '\Propel\SpyCategoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $spyCategoryNode->getFkParentCategoryNode(), $comparison);
        } elseif ($spyCategoryNode instanceof ObjectCollection) {
            return $this
                ->useNodeQuery()
                ->filterByPrimaryKeys($spyCategoryNode->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
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
    public function useNodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Node', '\Propel\SpyCategoryNodeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryClosureTable object
     *
     * @param \Propel\SpyCategoryClosureTable|ObjectCollection $spyCategoryClosureTable the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByClosureTable($spyCategoryClosureTable, $comparison = null)
    {
        if ($spyCategoryClosureTable instanceof \Propel\SpyCategoryClosureTable) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $spyCategoryClosureTable->getFkCategoryNode(), $comparison);
        } elseif ($spyCategoryClosureTable instanceof ObjectCollection) {
            return $this
                ->useClosureTableQuery()
                ->filterByPrimaryKeys($spyCategoryClosureTable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClosureTable() only accepts arguments of type \Propel\SpyCategoryClosureTable or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClosureTable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
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
     * Use the ClosureTable relation SpyCategoryClosureTable object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryClosureTableQuery A secondary query class using the current class as primary query
     */
    public function useClosureTableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClosureTable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClosureTable', '\Propel\SpyCategoryClosureTableQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryClosureTable object
     *
     * @param \Propel\SpyCategoryClosureTable|ObjectCollection $spyCategoryClosureTable the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterByDescendant($spyCategoryClosureTable, $comparison = null)
    {
        if ($spyCategoryClosureTable instanceof \Propel\SpyCategoryClosureTable) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $spyCategoryClosureTable->getFkCategoryNodeDescendant(), $comparison);
        } elseif ($spyCategoryClosureTable instanceof ObjectCollection) {
            return $this
                ->useDescendantQuery()
                ->filterByPrimaryKeys($spyCategoryClosureTable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDescendant() only accepts arguments of type \Propel\SpyCategoryClosureTable or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Descendant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
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
     * Use the Descendant relation SpyCategoryClosureTable object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryClosureTableQuery A secondary query class using the current class as primary query
     */
    public function useDescendantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDescendant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Descendant', '\Propel\SpyCategoryClosureTableQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyUrl object
     *
     * @param \Propel\SpyUrl|ObjectCollection $spyUrl the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function filterBySpyUrl($spyUrl, $comparison = null)
    {
        if ($spyUrl instanceof \Propel\SpyUrl) {
            return $this
                ->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $spyUrl->getFkResourceCategorynode(), $comparison);
        } elseif ($spyUrl instanceof ObjectCollection) {
            return $this
                ->useSpyUrlQuery()
                ->filterByPrimaryKeys($spyUrl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyUrl() only accepts arguments of type \Propel\SpyUrl or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUrl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function joinSpyUrl($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUrl');

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
            $this->addJoinObject($join, 'SpyUrl');
        }

        return $this;
    }

    /**
     * Use the SpyUrl relation SpyUrl object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUrlQuery A secondary query class using the current class as primary query
     */
    public function useSpyUrlQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyUrl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUrl', '\Propel\SpyUrlQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCategoryNode $spyCategoryNode Object to remove from the list of results
     *
     * @return $this|ChildSpyCategoryNodeQuery The current query, for fluid interface
     */
    public function prune($spyCategoryNode = null)
    {
        if ($spyCategoryNode) {
            $this->addUsingAlias(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, $spyCategoryNode->getIdCategoryNode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_category_node table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCategoryNodeTableMap::clearInstancePool();
            SpyCategoryNodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCategoryNodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCategoryNodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCategoryNodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCategoryNodeQuery
