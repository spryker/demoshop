<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDiscountCollector as ChildSpyDiscountCollector;
use Propel\SpyDiscountCollectorQuery as ChildSpyDiscountCollectorQuery;
use Propel\Map\SpyDiscountCollectorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_discount_collector' table.
 *
 *
 *
 * @method     ChildSpyDiscountCollectorQuery orderByIdDiscountCollector($order = Criteria::ASC) Order by the id_discount_collector column
 * @method     ChildSpyDiscountCollectorQuery orderByFkDiscount($order = Criteria::ASC) Order by the fk_discount column
 * @method     ChildSpyDiscountCollectorQuery orderByCollectorPlugin($order = Criteria::ASC) Order by the collector_plugin column
 * @method     ChildSpyDiscountCollectorQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildSpyDiscountCollectorQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyDiscountCollectorQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyDiscountCollectorQuery groupByIdDiscountCollector() Group by the id_discount_collector column
 * @method     ChildSpyDiscountCollectorQuery groupByFkDiscount() Group by the fk_discount column
 * @method     ChildSpyDiscountCollectorQuery groupByCollectorPlugin() Group by the collector_plugin column
 * @method     ChildSpyDiscountCollectorQuery groupByValue() Group by the value column
 * @method     ChildSpyDiscountCollectorQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyDiscountCollectorQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyDiscountCollectorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDiscountCollectorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDiscountCollectorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDiscountCollectorQuery leftJoinDiscount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountCollectorQuery rightJoinDiscount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Discount relation
 * @method     ChildSpyDiscountCollectorQuery innerJoinDiscount($relationAlias = null) Adds a INNER JOIN clause to the query using the Discount relation
 *
 * @method     \Propel\SpyDiscountQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDiscountCollector findOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountCollector matching the query
 * @method     ChildSpyDiscountCollector findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDiscountCollector matching the query, or a new ChildSpyDiscountCollector object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDiscountCollector findOneByIdDiscountCollector(int $id_discount_collector) Return the first ChildSpyDiscountCollector filtered by the id_discount_collector column
 * @method     ChildSpyDiscountCollector findOneByFkDiscount(int $fk_discount) Return the first ChildSpyDiscountCollector filtered by the fk_discount column
 * @method     ChildSpyDiscountCollector findOneByCollectorPlugin(string $collector_plugin) Return the first ChildSpyDiscountCollector filtered by the collector_plugin column
 * @method     ChildSpyDiscountCollector findOneByValue(string $value) Return the first ChildSpyDiscountCollector filtered by the value column
 * @method     ChildSpyDiscountCollector findOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountCollector filtered by the created_at column
 * @method     ChildSpyDiscountCollector findOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountCollector filtered by the updated_at column *

 * @method     ChildSpyDiscountCollector requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDiscountCollector by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOne(ConnectionInterface $con = null) Return the first ChildSpyDiscountCollector matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountCollector requireOneByIdDiscountCollector(int $id_discount_collector) Return the first ChildSpyDiscountCollector filtered by the id_discount_collector column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOneByFkDiscount(int $fk_discount) Return the first ChildSpyDiscountCollector filtered by the fk_discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOneByCollectorPlugin(string $collector_plugin) Return the first ChildSpyDiscountCollector filtered by the collector_plugin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOneByValue(string $value) Return the first ChildSpyDiscountCollector filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOneByCreatedAt(string $created_at) Return the first ChildSpyDiscountCollector filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDiscountCollector requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyDiscountCollector filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDiscountCollector[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDiscountCollector objects based on current ModelCriteria
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByIdDiscountCollector(int $id_discount_collector) Return ChildSpyDiscountCollector objects filtered by the id_discount_collector column
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByFkDiscount(int $fk_discount) Return ChildSpyDiscountCollector objects filtered by the fk_discount column
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByCollectorPlugin(string $collector_plugin) Return ChildSpyDiscountCollector objects filtered by the collector_plugin column
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByValue(string $value) Return ChildSpyDiscountCollector objects filtered by the value column
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyDiscountCollector objects filtered by the created_at column
 * @method     ChildSpyDiscountCollector[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyDiscountCollector objects filtered by the updated_at column
 * @method     ChildSpyDiscountCollector[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDiscountCollectorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDiscountCollectorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDiscountCollector', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDiscountCollectorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDiscountCollectorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDiscountCollectorQuery) {
            return $criteria;
        }
        $query = new ChildSpyDiscountCollectorQuery();
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
     * @return ChildSpyDiscountCollector|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDiscountCollectorTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDiscountCollectorTableMap::DATABASE_NAME);
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
     * @return ChildSpyDiscountCollector A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_discount_collector, fk_discount, collector_plugin, value, created_at, updated_at FROM spy_discount_collector WHERE id_discount_collector = :p0';
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
            /** @var ChildSpyDiscountCollector $obj */
            $obj = new ChildSpyDiscountCollector();
            $obj->hydrate($row);
            SpyDiscountCollectorTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyDiscountCollector|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_discount_collector column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDiscountCollector(1234); // WHERE id_discount_collector = 1234
     * $query->filterByIdDiscountCollector(array(12, 34)); // WHERE id_discount_collector IN (12, 34)
     * $query->filterByIdDiscountCollector(array('min' => 12)); // WHERE id_discount_collector > 12
     * </code>
     *
     * @param     mixed $idDiscountCollector The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByIdDiscountCollector($idDiscountCollector = null, $comparison = null)
    {
        if (is_array($idDiscountCollector)) {
            $useMinMax = false;
            if (isset($idDiscountCollector['min'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $idDiscountCollector['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDiscountCollector['max'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $idDiscountCollector['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $idDiscountCollector, $comparison);
    }

    /**
     * Filter the query on the fk_discount column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDiscount(1234); // WHERE fk_discount = 1234
     * $query->filterByFkDiscount(array(12, 34)); // WHERE fk_discount IN (12, 34)
     * $query->filterByFkDiscount(array('min' => 12)); // WHERE fk_discount > 12
     * </code>
     *
     * @see       filterByDiscount()
     *
     * @param     mixed $fkDiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByFkDiscount($fkDiscount = null, $comparison = null)
    {
        if (is_array($fkDiscount)) {
            $useMinMax = false;
            if (isset($fkDiscount['min'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, $fkDiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDiscount['max'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, $fkDiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, $fkDiscount, $comparison);
    }

    /**
     * Filter the query on the collector_plugin column
     *
     * Example usage:
     * <code>
     * $query->filterByCollectorPlugin('fooValue');   // WHERE collector_plugin = 'fooValue'
     * $query->filterByCollectorPlugin('%fooValue%'); // WHERE collector_plugin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $collectorPlugin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByCollectorPlugin($collectorPlugin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($collectorPlugin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $collectorPlugin)) {
                $collectorPlugin = str_replace('*', '%', $collectorPlugin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_COLLECTOR_PLUGIN, $collectorPlugin, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_VALUE, $value, $comparison);
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
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDiscount object
     *
     * @param \Propel\SpyDiscount|ObjectCollection $spyDiscount The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function filterByDiscount($spyDiscount, $comparison = null)
    {
        if ($spyDiscount instanceof \Propel\SpyDiscount) {
            return $this
                ->addUsingAlias(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, $spyDiscount->getIdDiscount(), $comparison);
        } elseif ($spyDiscount instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, $spyDiscount->toKeyValue('PrimaryKey', 'IdDiscount'), $comparison);
        } else {
            throw new PropelException('filterByDiscount() only accepts arguments of type \Propel\SpyDiscount or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Discount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function joinDiscount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Discount');

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
            $this->addJoinObject($join, 'Discount');
        }

        return $this;
    }

    /**
     * Use the Discount relation SpyDiscount object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDiscountQuery A secondary query class using the current class as primary query
     */
    public function useDiscountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Discount', '\Propel\SpyDiscountQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDiscountCollector $spyDiscountCollector Object to remove from the list of results
     *
     * @return $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function prune($spyDiscountCollector = null)
    {
        if ($spyDiscountCollector) {
            $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, $spyDiscountCollector->getIdDiscountCollector(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_discount_collector table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountCollectorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDiscountCollectorTableMap::clearInstancePool();
            SpyDiscountCollectorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountCollectorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDiscountCollectorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDiscountCollectorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDiscountCollectorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountCollectorTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountCollectorTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyDiscountCollectorTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyDiscountCollectorTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyDiscountCollectorQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyDiscountCollectorTableMap::COL_CREATED_AT);
    }

} // SpyDiscountCollectorQuery
