<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionValueUsageConstraint as ChildSpyProductOptionValueUsageConstraint;
use Propel\SpyProductOptionValueUsageConstraintQuery as ChildSpyProductOptionValueUsageConstraintQuery;
use Propel\Map\SpyProductOptionValueUsageConstraintTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_value_usage_constraint' table.
 *
 *
 *
 * @method     ChildSpyProductOptionValueUsageConstraintQuery orderByFkProductOptionValueUsageA($order = Criteria::ASC) Order by the fk_product_option_value_usage_a column
 * @method     ChildSpyProductOptionValueUsageConstraintQuery orderByFkProductOptionValueUsageB($order = Criteria::ASC) Order by the fk_product_option_value_usage_b column
 * @method     ChildSpyProductOptionValueUsageConstraintQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 *
 * @method     ChildSpyProductOptionValueUsageConstraintQuery groupByFkProductOptionValueUsageA() Group by the fk_product_option_value_usage_a column
 * @method     ChildSpyProductOptionValueUsageConstraintQuery groupByFkProductOptionValueUsageB() Group by the fk_product_option_value_usage_b column
 * @method     ChildSpyProductOptionValueUsageConstraintQuery groupByOperator() Group by the operator column
 *
 * @method     ChildSpyProductOptionValueUsageConstraintQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionValueUsageConstraintQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionValueUsageConstraintQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionValueUsageConstraintQuery leftJoinproductOptionValueUsageA($relationAlias = null) Adds a LEFT JOIN clause to the query using the productOptionValueUsageA relation
 * @method     ChildSpyProductOptionValueUsageConstraintQuery rightJoinproductOptionValueUsageA($relationAlias = null) Adds a RIGHT JOIN clause to the query using the productOptionValueUsageA relation
 * @method     ChildSpyProductOptionValueUsageConstraintQuery innerJoinproductOptionValueUsageA($relationAlias = null) Adds a INNER JOIN clause to the query using the productOptionValueUsageA relation
 *
 * @method     ChildSpyProductOptionValueUsageConstraintQuery leftJoinproductOptionValueUsageB($relationAlias = null) Adds a LEFT JOIN clause to the query using the productOptionValueUsageB relation
 * @method     ChildSpyProductOptionValueUsageConstraintQuery rightJoinproductOptionValueUsageB($relationAlias = null) Adds a RIGHT JOIN clause to the query using the productOptionValueUsageB relation
 * @method     ChildSpyProductOptionValueUsageConstraintQuery innerJoinproductOptionValueUsageB($relationAlias = null) Adds a INNER JOIN clause to the query using the productOptionValueUsageB relation
 *
 * @method     \Propel\SpyProductOptionValueUsageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionValueUsageConstraint findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsageConstraint matching the query
 * @method     ChildSpyProductOptionValueUsageConstraint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsageConstraint matching the query, or a new ChildSpyProductOptionValueUsageConstraint object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionValueUsageConstraint findOneByFkProductOptionValueUsageA(int $fk_product_option_value_usage_a) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the fk_product_option_value_usage_a column
 * @method     ChildSpyProductOptionValueUsageConstraint findOneByFkProductOptionValueUsageB(int $fk_product_option_value_usage_b) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the fk_product_option_value_usage_b column
 * @method     ChildSpyProductOptionValueUsageConstraint findOneByOperator(string $operator) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the operator column *

 * @method     ChildSpyProductOptionValueUsageConstraint requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionValueUsageConstraint by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsageConstraint requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueUsageConstraint matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueUsageConstraint requireOneByFkProductOptionValueUsageA(int $fk_product_option_value_usage_a) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the fk_product_option_value_usage_a column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsageConstraint requireOneByFkProductOptionValueUsageB(int $fk_product_option_value_usage_b) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the fk_product_option_value_usage_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueUsageConstraint requireOneByOperator(string $operator) Return the first ChildSpyProductOptionValueUsageConstraint filtered by the operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueUsageConstraint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionValueUsageConstraint objects based on current ModelCriteria
 * @method     ChildSpyProductOptionValueUsageConstraint[]|ObjectCollection findByFkProductOptionValueUsageA(int $fk_product_option_value_usage_a) Return ChildSpyProductOptionValueUsageConstraint objects filtered by the fk_product_option_value_usage_a column
 * @method     ChildSpyProductOptionValueUsageConstraint[]|ObjectCollection findByFkProductOptionValueUsageB(int $fk_product_option_value_usage_b) Return ChildSpyProductOptionValueUsageConstraint objects filtered by the fk_product_option_value_usage_b column
 * @method     ChildSpyProductOptionValueUsageConstraint[]|ObjectCollection findByOperator(string $operator) Return ChildSpyProductOptionValueUsageConstraint objects filtered by the operator column
 * @method     ChildSpyProductOptionValueUsageConstraint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionValueUsageConstraintQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionValueUsageConstraintQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionValueUsageConstraint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionValueUsageConstraintQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionValueUsageConstraintQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionValueUsageConstraintQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionValueUsageConstraintQuery();
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
     * @param array[$fk_product_option_value_usage_a, $fk_product_option_value_usage_b] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyProductOptionValueUsageConstraint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionValueUsageConstraintTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionValueUsageConstraint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_product_option_value_usage_a, fk_product_option_value_usage_b, operator FROM spy_product_option_value_usage_constraint WHERE fk_product_option_value_usage_a = :p0 AND fk_product_option_value_usage_b = :p1';
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
            /** @var ChildSpyProductOptionValueUsageConstraint $obj */
            $obj = new ChildSpyProductOptionValueUsageConstraint();
            $obj->hydrate($row);
            SpyProductOptionValueUsageConstraintTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyProductOptionValueUsageConstraint|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_product_option_value_usage_a column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionValueUsageA(1234); // WHERE fk_product_option_value_usage_a = 1234
     * $query->filterByFkProductOptionValueUsageA(array(12, 34)); // WHERE fk_product_option_value_usage_a IN (12, 34)
     * $query->filterByFkProductOptionValueUsageA(array('min' => 12)); // WHERE fk_product_option_value_usage_a > 12
     * </code>
     *
     * @see       filterByproductOptionValueUsageA()
     *
     * @param     mixed $fkProductOptionValueUsageA The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionValueUsageA($fkProductOptionValueUsageA = null, $comparison = null)
    {
        if (is_array($fkProductOptionValueUsageA)) {
            $useMinMax = false;
            if (isset($fkProductOptionValueUsageA['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $fkProductOptionValueUsageA['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionValueUsageA['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $fkProductOptionValueUsageA['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $fkProductOptionValueUsageA, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_value_usage_b column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionValueUsageB(1234); // WHERE fk_product_option_value_usage_b = 1234
     * $query->filterByFkProductOptionValueUsageB(array(12, 34)); // WHERE fk_product_option_value_usage_b IN (12, 34)
     * $query->filterByFkProductOptionValueUsageB(array('min' => 12)); // WHERE fk_product_option_value_usage_b > 12
     * </code>
     *
     * @see       filterByproductOptionValueUsageB()
     *
     * @param     mixed $fkProductOptionValueUsageB The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionValueUsageB($fkProductOptionValueUsageB = null, $comparison = null)
    {
        if (is_array($fkProductOptionValueUsageB)) {
            $useMinMax = false;
            if (isset($fkProductOptionValueUsageB['min'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $fkProductOptionValueUsageB['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionValueUsageB['max'])) {
                $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $fkProductOptionValueUsageB['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $fkProductOptionValueUsageB, $comparison);
    }

    /**
     * Filter the query on the operator column
     *
     * Example usage:
     * <code>
     * $query->filterByOperator('fooValue');   // WHERE operator = 'fooValue'
     * $query->filterByOperator('%fooValue%'); // WHERE operator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByOperator($operator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operator)) {
                $operator = str_replace('*', '%', $operator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_OPERATOR, $operator, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsage object
     *
     * @param \Propel\SpyProductOptionValueUsage|ObjectCollection $spyProductOptionValueUsage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByproductOptionValueUsageA($spyProductOptionValueUsage, $comparison = null)
    {
        if ($spyProductOptionValueUsage instanceof \Propel\SpyProductOptionValueUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $spyProductOptionValueUsage->getIdProductOptionValueUsage(), $comparison);
        } elseif ($spyProductOptionValueUsage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A, $spyProductOptionValueUsage->toKeyValue('PrimaryKey', 'IdProductOptionValueUsage'), $comparison);
        } else {
            throw new PropelException('filterByproductOptionValueUsageA() only accepts arguments of type \Propel\SpyProductOptionValueUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the productOptionValueUsageA relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function joinproductOptionValueUsageA($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('productOptionValueUsageA');

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
            $this->addJoinObject($join, 'productOptionValueUsageA');
        }

        return $this;
    }

    /**
     * Use the productOptionValueUsageA relation SpyProductOptionValueUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueUsageQuery A secondary query class using the current class as primary query
     */
    public function useproductOptionValueUsageAQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinproductOptionValueUsageA($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'productOptionValueUsageA', '\Propel\SpyProductOptionValueUsageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueUsage object
     *
     * @param \Propel\SpyProductOptionValueUsage|ObjectCollection $spyProductOptionValueUsage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function filterByproductOptionValueUsageB($spyProductOptionValueUsage, $comparison = null)
    {
        if ($spyProductOptionValueUsage instanceof \Propel\SpyProductOptionValueUsage) {
            return $this
                ->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $spyProductOptionValueUsage->getIdProductOptionValueUsage(), $comparison);
        } elseif ($spyProductOptionValueUsage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B, $spyProductOptionValueUsage->toKeyValue('PrimaryKey', 'IdProductOptionValueUsage'), $comparison);
        } else {
            throw new PropelException('filterByproductOptionValueUsageB() only accepts arguments of type \Propel\SpyProductOptionValueUsage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the productOptionValueUsageB relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function joinproductOptionValueUsageB($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('productOptionValueUsageB');

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
            $this->addJoinObject($join, 'productOptionValueUsageB');
        }

        return $this;
    }

    /**
     * Use the productOptionValueUsageB relation SpyProductOptionValueUsage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueUsageQuery A secondary query class using the current class as primary query
     */
    public function useproductOptionValueUsageBQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinproductOptionValueUsageB($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'productOptionValueUsageB', '\Propel\SpyProductOptionValueUsageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionValueUsageConstraint $spyProductOptionValueUsageConstraint Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionValueUsageConstraintQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionValueUsageConstraint = null)
    {
        if ($spyProductOptionValueUsageConstraint) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_A), $spyProductOptionValueUsageConstraint->getFkProductOptionValueUsageA(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyProductOptionValueUsageConstraintTableMap::COL_FK_PRODUCT_OPTION_VALUE_USAGE_B), $spyProductOptionValueUsageConstraint->getFkProductOptionValueUsageB(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_value_usage_constraint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionValueUsageConstraintTableMap::clearInstancePool();
            SpyProductOptionValueUsageConstraintTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionValueUsageConstraintTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionValueUsageConstraintTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionValueUsageConstraintTableMap::DATABASE_NAME);

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

} // SpyProductOptionValueUsageConstraintQuery
