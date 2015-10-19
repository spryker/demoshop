<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTaxRate as ChildSpyTaxRate;
use Propel\SpyTaxRateQuery as ChildSpyTaxRateQuery;
use Propel\Map\SpyTaxRateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_tax_rate' table.
 *
 *
 *
 * @method     ChildSpyTaxRateQuery orderByIdTaxRate($order = Criteria::ASC) Order by the id_tax_rate column
 * @method     ChildSpyTaxRateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyTaxRateQuery orderByRate($order = Criteria::ASC) Order by the rate column
 *
 * @method     ChildSpyTaxRateQuery groupByIdTaxRate() Group by the id_tax_rate column
 * @method     ChildSpyTaxRateQuery groupByName() Group by the name column
 * @method     ChildSpyTaxRateQuery groupByRate() Group by the rate column
 *
 * @method     ChildSpyTaxRateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyTaxRateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyTaxRateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyTaxRateQuery leftJoinSpyTaxSetTax($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxSetTax relation
 * @method     ChildSpyTaxRateQuery rightJoinSpyTaxSetTax($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxSetTax relation
 * @method     ChildSpyTaxRateQuery innerJoinSpyTaxSetTax($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxSetTax relation
 *
 * @method     \Propel\SpyTaxSetTaxQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyTaxRate findOne(ConnectionInterface $con = null) Return the first ChildSpyTaxRate matching the query
 * @method     ChildSpyTaxRate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyTaxRate matching the query, or a new ChildSpyTaxRate object populated from the query conditions when no match is found
 *
 * @method     ChildSpyTaxRate findOneByIdTaxRate(int $id_tax_rate) Return the first ChildSpyTaxRate filtered by the id_tax_rate column
 * @method     ChildSpyTaxRate findOneByName(string $name) Return the first ChildSpyTaxRate filtered by the name column
 * @method     ChildSpyTaxRate findOneByRate(string $rate) Return the first ChildSpyTaxRate filtered by the rate column *

 * @method     ChildSpyTaxRate requirePk($key, ConnectionInterface $con = null) Return the ChildSpyTaxRate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxRate requireOne(ConnectionInterface $con = null) Return the first ChildSpyTaxRate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxRate requireOneByIdTaxRate(int $id_tax_rate) Return the first ChildSpyTaxRate filtered by the id_tax_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxRate requireOneByName(string $name) Return the first ChildSpyTaxRate filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxRate requireOneByRate(string $rate) Return the first ChildSpyTaxRate filtered by the rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxRate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyTaxRate objects based on current ModelCriteria
 * @method     ChildSpyTaxRate[]|ObjectCollection findByIdTaxRate(int $id_tax_rate) Return ChildSpyTaxRate objects filtered by the id_tax_rate column
 * @method     ChildSpyTaxRate[]|ObjectCollection findByName(string $name) Return ChildSpyTaxRate objects filtered by the name column
 * @method     ChildSpyTaxRate[]|ObjectCollection findByRate(string $rate) Return ChildSpyTaxRate objects filtered by the rate column
 * @method     ChildSpyTaxRate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyTaxRateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyTaxRateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyTaxRate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyTaxRateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyTaxRateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyTaxRateQuery) {
            return $criteria;
        }
        $query = new ChildSpyTaxRateQuery();
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
     * @return ChildSpyTaxRate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyTaxRateTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyTaxRateTableMap::DATABASE_NAME);
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
     * @return ChildSpyTaxRate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_tax_rate, name, rate FROM spy_tax_rate WHERE id_tax_rate = :p0';
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
            /** @var ChildSpyTaxRate $obj */
            $obj = new ChildSpyTaxRate();
            $obj->hydrate($row);
            SpyTaxRateTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyTaxRate|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tax_rate column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTaxRate(1234); // WHERE id_tax_rate = 1234
     * $query->filterByIdTaxRate(array(12, 34)); // WHERE id_tax_rate IN (12, 34)
     * $query->filterByIdTaxRate(array('min' => 12)); // WHERE id_tax_rate > 12
     * </code>
     *
     * @param     mixed $idTaxRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterByIdTaxRate($idTaxRate = null, $comparison = null)
    {
        if (is_array($idTaxRate)) {
            $useMinMax = false;
            if (isset($idTaxRate['min'])) {
                $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $idTaxRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTaxRate['max'])) {
                $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $idTaxRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $idTaxRate, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyTaxRateTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate(1234); // WHERE rate = 1234
     * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
     * $query->filterByRate(array('min' => 12)); // WHERE rate > 12
     * </code>
     *
     * @param     mixed $rate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (is_array($rate)) {
            $useMinMax = false;
            if (isset($rate['min'])) {
                $this->addUsingAlias(SpyTaxRateTableMap::COL_RATE, $rate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rate['max'])) {
                $this->addUsingAlias(SpyTaxRateTableMap::COL_RATE, $rate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTaxRateTableMap::COL_RATE, $rate, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSetTax object
     *
     * @param \Propel\SpyTaxSetTax|ObjectCollection $spyTaxSetTax the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSetTax($spyTaxSetTax, $comparison = null)
    {
        if ($spyTaxSetTax instanceof \Propel\SpyTaxSetTax) {
            return $this
                ->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $spyTaxSetTax->getFkTaxRate(), $comparison);
        } elseif ($spyTaxSetTax instanceof ObjectCollection) {
            return $this
                ->useSpyTaxSetTaxQuery()
                ->filterByPrimaryKeys($spyTaxSetTax->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyTaxSetTax() only accepts arguments of type \Propel\SpyTaxSetTax or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxSetTax relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function joinSpyTaxSetTax($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxSetTax');

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
            $this->addJoinObject($join, 'SpyTaxSetTax');
        }

        return $this;
    }

    /**
     * Use the SpyTaxSetTax relation SpyTaxSetTax object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetTaxQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxSetTaxQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyTaxSetTax($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxSetTax', '\Propel\SpyTaxSetTaxQuery');
    }

    /**
     * Filter the query by a related SpyTaxSet object
     * using the spy_tax_set_tax table as cross reference
     *
     * @param SpyTaxSet $spyTaxSet the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSet($spyTaxSet, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSpyTaxSetTaxQuery()
            ->filterBySpyTaxSet($spyTaxSet, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyTaxRate $spyTaxRate Object to remove from the list of results
     *
     * @return $this|ChildSpyTaxRateQuery The current query, for fluid interface
     */
    public function prune($spyTaxRate = null)
    {
        if ($spyTaxRate) {
            $this->addUsingAlias(SpyTaxRateTableMap::COL_ID_TAX_RATE, $spyTaxRate->getIdTaxRate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_tax_rate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxRateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyTaxRateTableMap::clearInstancePool();
            SpyTaxRateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxRateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyTaxRateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyTaxRateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyTaxRateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyTaxRateQuery
