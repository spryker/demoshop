<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionTypeUsageExclusion as ChildSpyProductOptionTypeUsageExclusion;
use Propel\SpyProductOptionTypeUsageExclusionQuery as ChildSpyProductOptionTypeUsageExclusionQuery;
use Propel\Map\SpyProductOptionTypeUsageExclusionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_type_usage_exclusion' table.
 *
 *
 *
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery orderByFkProductOptionTypeUsageA($order = Criteria::ASC) Order by the fk_product_option_type_usage_a column
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery orderByFkProductOptionTypeUsageB($order = Criteria::ASC) Order by the fk_product_option_type_usage_b column
 *
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery groupByFkProductOptionTypeUsageA() Group by the fk_product_option_type_usage_a column
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery groupByFkProductOptionTypeUsageB() Group by the fk_product_option_type_usage_b column
 *
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery leftJoinproductOptionTypeUsageA($relationAlias = null) Adds a LEFT JOIN clause to the query using the productOptionTypeUsageA relation
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery rightJoinproductOptionTypeUsageA($relationAlias = null) Adds a RIGHT JOIN clause to the query using the productOptionTypeUsageA relation
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery innerJoinproductOptionTypeUsageA($relationAlias = null) Adds a INNER JOIN clause to the query using the productOptionTypeUsageA relation
 *
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery leftJoinproductOptionTypeUsageB($relationAlias = null) Adds a LEFT JOIN clause to the query using the productOptionTypeUsageB relation
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery rightJoinproductOptionTypeUsageB($relationAlias = null) Adds a RIGHT JOIN clause to the query using the productOptionTypeUsageB relation
 * @method     ChildSpyProductOptionTypeUsageExclusionQuery innerJoinproductOptionTypeUsageB($relationAlias = null) Adds a INNER JOIN clause to the query using the productOptionTypeUsageB relation
 *
 * @method     \Propel\SpyProductOptionTypeUsageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionTypeUsageExclusion findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsageExclusion matching the query
 * @method     ChildSpyProductOptionTypeUsageExclusion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsageExclusion matching the query, or a new ChildSpyProductOptionTypeUsageExclusion object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionTypeUsageExclusion findOneByFkProductOptionTypeUsageA(int $fk_product_option_type_usage_a) Return the first ChildSpyProductOptionTypeUsageExclusion filtered by the fk_product_option_type_usage_a column
 * @method     ChildSpyProductOptionTypeUsageExclusion findOneByFkProductOptionTypeUsageB(int $fk_product_option_type_usage_b) Return the first ChildSpyProductOptionTypeUsageExclusion filtered by the fk_product_option_type_usage_b column *

 * @method     ChildSpyProductOptionTypeUsageExclusion requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionTypeUsageExclusion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsageExclusion requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionTypeUsageExclusion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionTypeUsageExclusion requireOneByFkProductOptionTypeUsageA(int $fk_product_option_type_usage_a) Return the first ChildSpyProductOptionTypeUsageExclusion filtered by the fk_product_option_type_usage_a column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionTypeUsageExclusion requireOneByFkProductOptionTypeUsageB(int $fk_product_option_type_usage_b) Return the first ChildSpyProductOptionTypeUsageExclusion filtered by the fk_product_option_type_usage_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionTypeUsageExclusion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionTypeUsageExclusion objects based on current ModelCriteria
 * @method     ChildSpyProductOptionTypeUsageExclusion[]|ObjectCollection findByFkProductOptionTypeUsageA(int $fk_product_option_type_usage_a) Return ChildSpyProductOptionTypeUsageExclusion objects filtered by the fk_product_option_type_usage_a column
 * @method     ChildSpyProductOptionTypeUsageExclusion[]|ObjectCollection findByFkProductOptionTypeUsageB(int $fk_product_option_type_usage_b) Return ChildSpyProductOptionTypeUsageExclusion objects filtered by the fk_product_option_type_usage_b column
 * @method     ChildSpyProductOptionTypeUsageExclusion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionTypeUsageExclusionQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionTypeUsageExclusionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionTypeUsageExclusion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionTypeUsageExclusionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionTypeUsageExclusionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionTypeUsageExclusionQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionTypeUsageExclusionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$fk_product_option_type_usage_a, $fk_product_option_type_usage_b] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyProductOptionTypeUsageExclusion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionTypeUsageExclusionTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionTypeUsageExclusion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_product_option_type_usage_a, fk_product_option_type_usage_b FROM spy_product_option_type_usage_exclusion WHERE fk_product_option_type_usage_a = :p0 AND fk_product_option_type_usage_b = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyProductOptionTypeUsageExclusion $obj */
            $obj = new ChildSpyProductOptionTypeUsageExclusion();
            $obj->hydrate($row);
            SpyProductOptionTypeUsageExclusionTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyProductOptionTypeUsageExclusion|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_product_option_type_usage_a column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionTypeUsageA(1234); // WHERE fk_product_option_type_usage_a = 1234
     * $query->filterByFkProductOptionTypeUsageA(array(12, 34)); // WHERE fk_product_option_type_usage_a IN (12, 34)
     * $query->filterByFkProductOptionTypeUsageA(array('min' => 12)); // WHERE fk_product_option_type_usage_a > 12
     * </code>
     *
     * @see       filterByproductOptionTypeUsageA()
     *
     * @param     mixed $fkProductOptionTypeUsageA The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionTypeUsageA($fkProductOptionTypeUsageA = null, $comparison = null)
    {
        if (is_array($fkProductOptionTypeUsageA)) {
            $useMinMax = false;
            if (isset($fkProductOptionTypeUsageA['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $fkProductOptionTypeUsageA['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionTypeUsageA['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $fkProductOptionTypeUsageA['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $fkProductOptionTypeUsageA, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_type_usage_b column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionTypeUsageB(1234); // WHERE fk_product_option_type_usage_b = 1234
     * $query->filterByFkProductOptionTypeUsageB(array(12, 34)); // WHERE fk_product_option_type_usage_b IN (12, 34)
     * $query->filterByFkProductOptionTypeUsageB(array('min' => 12)); // WHERE fk_product_option_type_usage_b > 12
     * </code>
     *
     * @see       filterByproductOptionTypeUsageB()
     *
     * @param     mixed $fkProductOptionTypeUsageB The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionTypeUsageB($fkProductOptionTypeUsageB = null, $comparison = null)
    {
        if (is_array($fkProductOptionTypeUsageB)) {
            $useMinMax = false;
            if (isset($fkProductOptionTypeUsageB['min'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $fkProductOptionTypeUsageB['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionTypeUsageB['max'])) {
                $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $fkProductOptionTypeUsageB['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $fkProductOptionTypeUsageB, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsage object
     *
     * @param \Propel\SpyProductOptionTypeUsage|ObjectCollection $spyProductOptionTypeUsage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByproductOptionTypeUsageA($spyProductOptionTypeUsage, $comparison = null)
    {
        if ($spyProductOptionTypeUsage instanceof \Propel\SpyProductOptionTypeUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $spyProductOptionTypeUsage->getIdProductOptionTypeUsage(), $comparison);
        } elseif ($spyProductOptionTypeUsage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A, $spyProductOptionTypeUsage->toKeyValue('PrimaryKey', 'IdProductOptionTypeUsage'), $comparison);
        } else {
            throw new PropelException('filterByproductOptionTypeUsageA() only accepts arguments of type \Propel\SpyProductOptionTypeUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the productOptionTypeUsageA relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function joinproductOptionTypeUsageA($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('productOptionTypeUsageA');

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
            $this->addJoinObject($join, 'productOptionTypeUsageA');
        }

        return $this;
    }

    /**
     * Use the productOptionTypeUsageA relation SpyProductOptionTypeUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageQuery A secondary query class using the current class as primary query
     */
    public function useproductOptionTypeUsageAQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinproductOptionTypeUsageA($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'productOptionTypeUsageA', '\Propel\SpyProductOptionTypeUsageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeUsage object
     *
     * @param \Propel\SpyProductOptionTypeUsage|ObjectCollection $spyProductOptionTypeUsage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function filterByproductOptionTypeUsageB($spyProductOptionTypeUsage, $comparison = null)
    {
        if ($spyProductOptionTypeUsage instanceof \Propel\SpyProductOptionTypeUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $spyProductOptionTypeUsage->getIdProductOptionTypeUsage(), $comparison);
        } elseif ($spyProductOptionTypeUsage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B, $spyProductOptionTypeUsage->toKeyValue('PrimaryKey', 'IdProductOptionTypeUsage'), $comparison);
        } else {
            throw new PropelException('filterByproductOptionTypeUsageB() only accepts arguments of type \Propel\SpyProductOptionTypeUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the productOptionTypeUsageB relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function joinproductOptionTypeUsageB($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('productOptionTypeUsageB');

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
            $this->addJoinObject($join, 'productOptionTypeUsageB');
        }

        return $this;
    }

    /**
     * Use the productOptionTypeUsageB relation SpyProductOptionTypeUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeUsageQuery A secondary query class using the current class as primary query
     */
    public function useproductOptionTypeUsageBQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinproductOptionTypeUsageB($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'productOptionTypeUsageB', '\Propel\SpyProductOptionTypeUsageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionTypeUsageExclusion $spyProductOptionTypeUsageExclusion Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionTypeUsageExclusionQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionTypeUsageExclusion = null)
    {
        if ($spyProductOptionTypeUsageExclusion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_A), $spyProductOptionTypeUsageExclusion->getFkProductOptionTypeUsageA(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyProductOptionTypeUsageExclusionTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE_B), $spyProductOptionTypeUsageExclusion->getFkProductOptionTypeUsageB(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_type_usage_exclusion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionTypeUsageExclusionTableMap::clearInstancePool();
            SpyProductOptionTypeUsageExclusionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionTypeUsageExclusionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionTypeUsageExclusionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // query_cache behavior

    public function setQueryKey($key)
    {
        $this->queryKey = $key;

        return $this;
    }

    public function getQueryKey()
    {
        return $this->queryKey;
    }

    public function cacheContains($key)
    {

        return isset(self::$cacheBackend[$key]);
    }

    public function cacheFetch($key)
    {

        return isset(self::$cacheBackend[$key]) ? self::$cacheBackend[$key] : null;
    }

    public function cacheStore($key, $value, $lifetime = 600)
    {
        self::$cacheBackend[$key] = $value;
    }

    public function doSelect(ConnectionInterface $con = null)
    {
        // check that the columns of the main class are already added (if this is the primary ModelCriteria)
        if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
            $this->addSelfSelectColumns();
        }
        $this->configureSelectColumns();

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionTypeUsageExclusionTableMap::DATABASE_NAME);

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            $params = array();
            $sql = $this->createSelectSql($params);
            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
            } catch (Exception $e) {
                Propel::log($e->getMessage(), Propel::LOG_ERR);
                throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
            }

        return $con->getDataFetcher($stmt);
    }

    public function doCount(ConnectionInterface $con = null)
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap($this->getDbName());
        $db = Propel::getServiceContainer()->getAdapter($this->getDbName());

        $key = $this->getQueryKey();
        if ($key && $this->cacheContains($key)) {
            $params = $this->getParams();
            $sql = $this->cacheFetch($key);
        } else {
            // check that the columns of the main class are already added (if this is the primary ModelCriteria)
            if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
                $this->addSelfSelectColumns();
            }

            $this->configureSelectColumns();

            $needsComplexCount = $this->getGroupByColumns()
                || $this->getOffset()
                || $this->getLimit()
                || $this->getHaving()
                || in_array(Criteria::DISTINCT, $this->getSelectModifiers());

            $params = array();
            if ($needsComplexCount) {
                if ($this->needsSelectAliases()) {
                    if ($this->getHaving()) {
                        throw new PropelException('Propel cannot create a COUNT query when using HAVING and  duplicate column names in the SELECT part');
                    }
                    $db->turnSelectColumnsToAliases($this);
                }
                $selectSql = $this->createSelectSql($params);
                $sql = 'SELECT COUNT(*) FROM (' . $selectSql . ') propelmatch4cnt';
            } else {
                // Replace SELECT columns with COUNT(*)
                $this->clearSelectColumns()->addSelectColumn('COUNT(*)');
                $sql = $this->createSelectSql($params);
            }

            if ($key) {
                $this->cacheStore($key, $sql);
            }
        }

        try {
            $stmt = $con->prepare($sql);
            $db->bindValues($stmt, $params, $dbMap);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute COUNT statement [%s]', $sql), 0, $e);
        }

        return $con->getDataFetcher($stmt);
    }

} // SpyProductOptionTypeUsageExclusionQuery
