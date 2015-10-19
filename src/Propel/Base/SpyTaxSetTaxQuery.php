<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTaxSetTax as ChildSpyTaxSetTax;
use Propel\SpyTaxSetTaxQuery as ChildSpyTaxSetTaxQuery;
use Propel\Map\SpyTaxSetTaxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_tax_set_tax' table.
 *
 *
 *
 * @method     ChildSpyTaxSetTaxQuery orderByFkTaxSet($order = Criteria::ASC) Order by the fk_tax_set column
 * @method     ChildSpyTaxSetTaxQuery orderByFkTaxRate($order = Criteria::ASC) Order by the fk_tax_rate column
 *
 * @method     ChildSpyTaxSetTaxQuery groupByFkTaxSet() Group by the fk_tax_set column
 * @method     ChildSpyTaxSetTaxQuery groupByFkTaxRate() Group by the fk_tax_rate column
 *
 * @method     ChildSpyTaxSetTaxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyTaxSetTaxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyTaxSetTaxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyTaxSetTaxQuery leftJoinSpyTaxSet($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyTaxSetTaxQuery rightJoinSpyTaxSet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxSet relation
 * @method     ChildSpyTaxSetTaxQuery innerJoinSpyTaxSet($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxSet relation
 *
 * @method     ChildSpyTaxSetTaxQuery leftJoinSpyTaxRate($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxRate relation
 * @method     ChildSpyTaxSetTaxQuery rightJoinSpyTaxRate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxRate relation
 * @method     ChildSpyTaxSetTaxQuery innerJoinSpyTaxRate($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxRate relation
 *
 * @method     \Propel\SpyTaxSetQuery|\Propel\SpyTaxRateQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyTaxSetTax findOne(ConnectionInterface $con = null) Return the first ChildSpyTaxSetTax matching the query
 * @method     ChildSpyTaxSetTax findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyTaxSetTax matching the query, or a new ChildSpyTaxSetTax object populated from the query conditions when no match is found
 *
 * @method     ChildSpyTaxSetTax findOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyTaxSetTax filtered by the fk_tax_set column
 * @method     ChildSpyTaxSetTax findOneByFkTaxRate(int $fk_tax_rate) Return the first ChildSpyTaxSetTax filtered by the fk_tax_rate column *

 * @method     ChildSpyTaxSetTax requirePk($key, ConnectionInterface $con = null) Return the ChildSpyTaxSetTax by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxSetTax requireOne(ConnectionInterface $con = null) Return the first ChildSpyTaxSetTax matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxSetTax requireOneByFkTaxSet(int $fk_tax_set) Return the first ChildSpyTaxSetTax filtered by the fk_tax_set column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxSetTax requireOneByFkTaxRate(int $fk_tax_rate) Return the first ChildSpyTaxSetTax filtered by the fk_tax_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxSetTax[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyTaxSetTax objects based on current ModelCriteria
 * @method     ChildSpyTaxSetTax[]|ObjectCollection findByFkTaxSet(int $fk_tax_set) Return ChildSpyTaxSetTax objects filtered by the fk_tax_set column
 * @method     ChildSpyTaxSetTax[]|ObjectCollection findByFkTaxRate(int $fk_tax_rate) Return ChildSpyTaxSetTax objects filtered by the fk_tax_rate column
 * @method     ChildSpyTaxSetTax[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyTaxSetTaxQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyTaxSetTaxQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyTaxSetTax', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyTaxSetTaxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyTaxSetTaxQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyTaxSetTaxQuery) {
            return $criteria;
        }
        $query = new ChildSpyTaxSetTaxQuery();
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
     * @param array[$fk_tax_set, $fk_tax_rate] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyTaxSetTax|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyTaxSetTaxTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyTaxSetTaxTableMap::DATABASE_NAME);
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
     * @return ChildSpyTaxSetTax A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_tax_set, fk_tax_rate FROM spy_tax_set_tax WHERE fk_tax_set = :p0 AND fk_tax_rate = :p1';
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
            /** @var ChildSpyTaxSetTax $obj */
            $obj = new ChildSpyTaxSetTax();
            $obj->hydrate($row);
            SpyTaxSetTaxTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyTaxSetTax|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_tax_set column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTaxSet(1234); // WHERE fk_tax_set = 1234
     * $query->filterByFkTaxSet(array(12, 34)); // WHERE fk_tax_set IN (12, 34)
     * $query->filterByFkTaxSet(array('min' => 12)); // WHERE fk_tax_set > 12
     * </code>
     *
     * @see       filterBySpyTaxSet()
     *
     * @param     mixed $fkTaxSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterByFkTaxSet($fkTaxSet = null, $comparison = null)
    {
        if (is_array($fkTaxSet)) {
            $useMinMax = false;
            if (isset($fkTaxSet['min'])) {
                $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $fkTaxSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTaxSet['max'])) {
                $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $fkTaxSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $fkTaxSet, $comparison);
    }

    /**
     * Filter the query on the fk_tax_rate column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTaxRate(1234); // WHERE fk_tax_rate = 1234
     * $query->filterByFkTaxRate(array(12, 34)); // WHERE fk_tax_rate IN (12, 34)
     * $query->filterByFkTaxRate(array('min' => 12)); // WHERE fk_tax_rate > 12
     * </code>
     *
     * @see       filterBySpyTaxRate()
     *
     * @param     mixed $fkTaxRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterByFkTaxRate($fkTaxRate = null, $comparison = null)
    {
        if (is_array($fkTaxRate)) {
            $useMinMax = false;
            if (isset($fkTaxRate['min'])) {
                $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $fkTaxRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTaxRate['max'])) {
                $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $fkTaxRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $fkTaxRate, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSet object
     *
     * @param \Propel\SpyTaxSet|ObjectCollection $spyTaxSet The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSet($spyTaxSet, $comparison = null)
    {
        if ($spyTaxSet instanceof \Propel\SpyTaxSet) {
            return $this
                ->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $spyTaxSet->getIdTaxSet(), $comparison);
        } elseif ($spyTaxSet instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_SET, $spyTaxSet->toKeyValue('PrimaryKey', 'IdTaxSet'), $comparison);
        } else {
            throw new PropelException('filterBySpyTaxSet() only accepts arguments of type \Propel\SpyTaxSet or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxSet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function joinSpyTaxSet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxSet');

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
            $this->addJoinObject($join, 'SpyTaxSet');
        }

        return $this;
    }

    /**
     * Use the SpyTaxSet relation SpyTaxSet object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxSetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyTaxSet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxSet', '\Propel\SpyTaxSetQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTaxRate object
     *
     * @param \Propel\SpyTaxRate|ObjectCollection $spyTaxRate The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function filterBySpyTaxRate($spyTaxRate, $comparison = null)
    {
        if ($spyTaxRate instanceof \Propel\SpyTaxRate) {
            return $this
                ->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $spyTaxRate->getIdTaxRate(), $comparison);
        } elseif ($spyTaxRate instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE, $spyTaxRate->toKeyValue('PrimaryKey', 'IdTaxRate'), $comparison);
        } else {
            throw new PropelException('filterBySpyTaxRate() only accepts arguments of type \Propel\SpyTaxRate or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxRate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function joinSpyTaxRate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxRate');

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
            $this->addJoinObject($join, 'SpyTaxRate');
        }

        return $this;
    }

    /**
     * Use the SpyTaxRate relation SpyTaxRate object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxRateQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxRateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyTaxRate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxRate', '\Propel\SpyTaxRateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyTaxSetTax $spyTaxSetTax Object to remove from the list of results
     *
     * @return $this|ChildSpyTaxSetTaxQuery The current query, for fluid interface
     */
    public function prune($spyTaxSetTax = null)
    {
        if ($spyTaxSetTax) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyTaxSetTaxTableMap::COL_FK_TAX_SET), $spyTaxSetTax->getFkTaxSet(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyTaxSetTaxTableMap::COL_FK_TAX_RATE), $spyTaxSetTax->getFkTaxRate(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_tax_set_tax table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxSetTaxTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyTaxSetTaxTableMap::clearInstancePool();
            SpyTaxSetTaxTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxSetTaxTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyTaxSetTaxTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyTaxSetTaxTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyTaxSetTaxTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyTaxSetTaxQuery
