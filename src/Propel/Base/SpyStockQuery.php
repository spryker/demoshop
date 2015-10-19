<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyStock as ChildSpyStock;
use Propel\SpyStockQuery as ChildSpyStockQuery;
use Propel\Map\SpyStockTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_stock' table.
 *
 *
 *
 * @method     ChildSpyStockQuery orderByIdStock($order = Criteria::ASC) Order by the id_stock column
 * @method     ChildSpyStockQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     ChildSpyStockQuery groupByIdStock() Group by the id_stock column
 * @method     ChildSpyStockQuery groupByName() Group by the name column
 *
 * @method     ChildSpyStockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyStockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyStockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyStockQuery leftJoinStockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockProduct relation
 * @method     ChildSpyStockQuery rightJoinStockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockProduct relation
 * @method     ChildSpyStockQuery innerJoinStockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the StockProduct relation
 *
 * @method     \Propel\SpyStockProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyStock findOne(ConnectionInterface $con = null) Return the first ChildSpyStock matching the query
 * @method     ChildSpyStock findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyStock matching the query, or a new ChildSpyStock object populated from the query conditions when no match is found
 *
 * @method     ChildSpyStock findOneByIdStock(int $id_stock) Return the first ChildSpyStock filtered by the id_stock column
 * @method     ChildSpyStock findOneByName(string $name) Return the first ChildSpyStock filtered by the name column *

 * @method     ChildSpyStock requirePk($key, ConnectionInterface $con = null) Return the ChildSpyStock by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyStock requireOne(ConnectionInterface $con = null) Return the first ChildSpyStock matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyStock requireOneByIdStock(int $id_stock) Return the first ChildSpyStock filtered by the id_stock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyStock requireOneByName(string $name) Return the first ChildSpyStock filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyStock[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyStock objects based on current ModelCriteria
 * @method     ChildSpyStock[]|ObjectCollection findByIdStock(int $id_stock) Return ChildSpyStock objects filtered by the id_stock column
 * @method     ChildSpyStock[]|ObjectCollection findByName(string $name) Return ChildSpyStock objects filtered by the name column
 * @method     ChildSpyStock[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyStockQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyStockQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyStock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyStockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyStockQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyStockQuery) {
            return $criteria;
        }
        $query = new ChildSpyStockQuery();
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
     * @return ChildSpyStock|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyStockTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyStockTableMap::DATABASE_NAME);
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
     * @return ChildSpyStock A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_stock, name FROM spy_stock WHERE id_stock = :p0';
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
            /** @var ChildSpyStock $obj */
            $obj = new ChildSpyStock();
            $obj->hydrate($row);
            SpyStockTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyStock|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStock(1234); // WHERE id_stock = 1234
     * $query->filterByIdStock(array(12, 34)); // WHERE id_stock IN (12, 34)
     * $query->filterByIdStock(array('min' => 12)); // WHERE id_stock > 12
     * </code>
     *
     * @param     mixed $idStock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
     */
    public function filterByIdStock($idStock = null, $comparison = null)
    {
        if (is_array($idStock)) {
            $useMinMax = false;
            if (isset($idStock['min'])) {
                $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $idStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStock['max'])) {
                $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $idStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $idStock, $comparison);
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
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyStockTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyStockProduct object
     *
     * @param \Propel\SpyStockProduct|ObjectCollection $spyStockProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyStockQuery The current query, for fluid interface
     */
    public function filterByStockProduct($spyStockProduct, $comparison = null)
    {
        if ($spyStockProduct instanceof \Propel\SpyStockProduct) {
            return $this
                ->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $spyStockProduct->getFkStock(), $comparison);
        } elseif ($spyStockProduct instanceof ObjectCollection) {
            return $this
                ->useStockProductQuery()
                ->filterByPrimaryKeys($spyStockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockProduct() only accepts arguments of type \Propel\SpyStockProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
     */
    public function joinStockProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockProduct');

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
            $this->addJoinObject($join, 'StockProduct');
        }

        return $this;
    }

    /**
     * Use the StockProduct relation SpyStockProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyStockProductQuery A secondary query class using the current class as primary query
     */
    public function useStockProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockProduct', '\Propel\SpyStockProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyStock $spyStock Object to remove from the list of results
     *
     * @return $this|ChildSpyStockQuery The current query, for fluid interface
     */
    public function prune($spyStock = null)
    {
        if ($spyStock) {
            $this->addUsingAlias(SpyStockTableMap::COL_ID_STOCK, $spyStock->getIdStock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_stock table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyStockTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyStockTableMap::clearInstancePool();
            SpyStockTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyStockTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyStockTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyStockTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyStockTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyStockQuery
