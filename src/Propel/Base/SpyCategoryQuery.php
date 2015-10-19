<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategory as ChildSpyCategory;
use Propel\SpyCategoryQuery as ChildSpyCategoryQuery;
use Propel\Map\SpyCategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_category' table.
 *
 *
 *
 * @method     ChildSpyCategoryQuery orderByIdCategory($order = Criteria::ASC) Order by the id_category column
 * @method     ChildSpyCategoryQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildSpyCategoryQuery orderByIsInMenu($order = Criteria::ASC) Order by the is_in_menu column
 * @method     ChildSpyCategoryQuery orderByIsClickable($order = Criteria::ASC) Order by the is_clickable column
 *
 * @method     ChildSpyCategoryQuery groupByIdCategory() Group by the id_category column
 * @method     ChildSpyCategoryQuery groupByIsActive() Group by the is_active column
 * @method     ChildSpyCategoryQuery groupByIsInMenu() Group by the is_in_menu column
 * @method     ChildSpyCategoryQuery groupByIsClickable() Group by the is_clickable column
 *
 * @method     ChildSpyCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCategoryQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method     ChildSpyCategoryQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method     ChildSpyCategoryQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method     ChildSpyCategoryQuery leftJoinNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryQuery rightJoinNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Node relation
 * @method     ChildSpyCategoryQuery innerJoinNode($relationAlias = null) Adds a INNER JOIN clause to the query using the Node relation
 *
 * @method     ChildSpyCategoryQuery leftJoinSpyProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductCategory relation
 * @method     ChildSpyCategoryQuery rightJoinSpyProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductCategory relation
 * @method     ChildSpyCategoryQuery innerJoinSpyProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductCategory relation
 *
 * @method     \Propel\SpyCategoryAttributeQuery|\Propel\SpyCategoryNodeQuery|\Propel\SpyProductCategoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCategory findOne(ConnectionInterface $con = null) Return the first ChildSpyCategory matching the query
 * @method     ChildSpyCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCategory matching the query, or a new ChildSpyCategory object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCategory findOneByIdCategory(int $id_category) Return the first ChildSpyCategory filtered by the id_category column
 * @method     ChildSpyCategory findOneByIsActive(boolean $is_active) Return the first ChildSpyCategory filtered by the is_active column
 * @method     ChildSpyCategory findOneByIsInMenu(boolean $is_in_menu) Return the first ChildSpyCategory filtered by the is_in_menu column
 * @method     ChildSpyCategory findOneByIsClickable(boolean $is_clickable) Return the first ChildSpyCategory filtered by the is_clickable column *

 * @method     ChildSpyCategory requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategory requireOne(ConnectionInterface $con = null) Return the first ChildSpyCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategory requireOneByIdCategory(int $id_category) Return the first ChildSpyCategory filtered by the id_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategory requireOneByIsActive(boolean $is_active) Return the first ChildSpyCategory filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategory requireOneByIsInMenu(boolean $is_in_menu) Return the first ChildSpyCategory filtered by the is_in_menu column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategory requireOneByIsClickable(boolean $is_clickable) Return the first ChildSpyCategory filtered by the is_clickable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCategory objects based on current ModelCriteria
 * @method     ChildSpyCategory[]|ObjectCollection findByIdCategory(int $id_category) Return ChildSpyCategory objects filtered by the id_category column
 * @method     ChildSpyCategory[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyCategory objects filtered by the is_active column
 * @method     ChildSpyCategory[]|ObjectCollection findByIsInMenu(boolean $is_in_menu) Return ChildSpyCategory objects filtered by the is_in_menu column
 * @method     ChildSpyCategory[]|ObjectCollection findByIsClickable(boolean $is_clickable) Return ChildSpyCategory objects filtered by the is_clickable column
 * @method     ChildSpyCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCategoryQuery) {
            return $criteria;
        }
        $query = new ChildSpyCategoryQuery();
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
     * @return ChildSpyCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCategoryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryTableMap::DATABASE_NAME);
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
     * @return ChildSpyCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_category, is_active, is_in_menu, is_clickable FROM spy_category WHERE id_category = :p0';
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
            /** @var ChildSpyCategory $obj */
            $obj = new ChildSpyCategory();
            $obj->hydrate($row);
            SpyCategoryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategory(1234); // WHERE id_category = 1234
     * $query->filterByIdCategory(array(12, 34)); // WHERE id_category IN (12, 34)
     * $query->filterByIdCategory(array('min' => 12)); // WHERE id_category > 12
     * </code>
     *
     * @param     mixed $idCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByIdCategory($idCategory = null, $comparison = null)
    {
        if (is_array($idCategory)) {
            $useMinMax = false;
            if (isset($idCategory['min'])) {
                $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $idCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategory['max'])) {
                $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $idCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $idCategory, $comparison);
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
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCategoryTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the is_in_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByIsInMenu(true); // WHERE is_in_menu = true
     * $query->filterByIsInMenu('yes'); // WHERE is_in_menu = true
     * </code>
     *
     * @param     boolean|string $isInMenu The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByIsInMenu($isInMenu = null, $comparison = null)
    {
        if (is_string($isInMenu)) {
            $isInMenu = in_array(strtolower($isInMenu), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCategoryTableMap::COL_IS_IN_MENU, $isInMenu, $comparison);
    }

    /**
     * Filter the query on the is_clickable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsClickable(true); // WHERE is_clickable = true
     * $query->filterByIsClickable('yes'); // WHERE is_clickable = true
     * </code>
     *
     * @param     boolean|string $isClickable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByIsClickable($isClickable = null, $comparison = null)
    {
        if (is_string($isClickable)) {
            $isClickable = in_array(strtolower($isClickable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyCategoryTableMap::COL_IS_CLICKABLE, $isClickable, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryAttribute object
     *
     * @param \Propel\SpyCategoryAttribute|ObjectCollection $spyCategoryAttribute the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByAttribute($spyCategoryAttribute, $comparison = null)
    {
        if ($spyCategoryAttribute instanceof \Propel\SpyCategoryAttribute) {
            return $this
                ->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $spyCategoryAttribute->getFkCategory(), $comparison);
        } elseif ($spyCategoryAttribute instanceof ObjectCollection) {
            return $this
                ->useAttributeQuery()
                ->filterByPrimaryKeys($spyCategoryAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type \Propel\SpyCategoryAttribute or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
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
     * Use the Attribute relation SpyCategoryAttribute object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', '\Propel\SpyCategoryAttributeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterByNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $spyCategoryNode->getFkCategory(), $comparison);
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
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyProductCategory object
     *
     * @param \Propel\SpyProductCategory|ObjectCollection $spyProductCategory the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function filterBySpyProductCategory($spyProductCategory, $comparison = null)
    {
        if ($spyProductCategory instanceof \Propel\SpyProductCategory) {
            return $this
                ->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $spyProductCategory->getFkCategory(), $comparison);
        } elseif ($spyProductCategory instanceof ObjectCollection) {
            return $this
                ->useSpyProductCategoryQuery()
                ->filterByPrimaryKeys($spyProductCategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductCategory() only accepts arguments of type \Propel\SpyProductCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function joinSpyProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductCategory');

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
            $this->addJoinObject($join, 'SpyProductCategory');
        }

        return $this;
    }

    /**
     * Use the SpyProductCategory relation SpyProductCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductCategory', '\Propel\SpyProductCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCategory $spyCategory Object to remove from the list of results
     *
     * @return $this|ChildSpyCategoryQuery The current query, for fluid interface
     */
    public function prune($spyCategory = null)
    {
        if ($spyCategory) {
            $this->addUsingAlias(SpyCategoryTableMap::COL_ID_CATEGORY, $spyCategory->getIdCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCategoryTableMap::clearInstancePool();
            SpyCategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCategoryQuery
