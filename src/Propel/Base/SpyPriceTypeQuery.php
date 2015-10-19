<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyPriceType as ChildSpyPriceType;
use Propel\SpyPriceTypeQuery as ChildSpyPriceTypeQuery;
use Propel\Map\SpyPriceTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_price_type' table.
 *
 *
 *
 * @method     ChildSpyPriceTypeQuery orderByIdPriceType($order = Criteria::ASC) Order by the id_price_type column
 * @method     ChildSpyPriceTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     ChildSpyPriceTypeQuery groupByIdPriceType() Group by the id_price_type column
 * @method     ChildSpyPriceTypeQuery groupByName() Group by the name column
 *
 * @method     ChildSpyPriceTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyPriceTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyPriceTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyPriceTypeQuery leftJoinPriceProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyPriceTypeQuery rightJoinPriceProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PriceProduct relation
 * @method     ChildSpyPriceTypeQuery innerJoinPriceProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PriceProduct relation
 *
 * @method     \Propel\SpyPriceProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyPriceType findOne(ConnectionInterface $con = null) Return the first ChildSpyPriceType matching the query
 * @method     ChildSpyPriceType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyPriceType matching the query, or a new ChildSpyPriceType object populated from the query conditions when no match is found
 *
 * @method     ChildSpyPriceType findOneByIdPriceType(int $id_price_type) Return the first ChildSpyPriceType filtered by the id_price_type column
 * @method     ChildSpyPriceType findOneByName(string $name) Return the first ChildSpyPriceType filtered by the name column *

 * @method     ChildSpyPriceType requirePk($key, ConnectionInterface $con = null) Return the ChildSpyPriceType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceType requireOne(ConnectionInterface $con = null) Return the first ChildSpyPriceType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPriceType requireOneByIdPriceType(int $id_price_type) Return the first ChildSpyPriceType filtered by the id_price_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyPriceType requireOneByName(string $name) Return the first ChildSpyPriceType filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyPriceType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyPriceType objects based on current ModelCriteria
 * @method     ChildSpyPriceType[]|ObjectCollection findByIdPriceType(int $id_price_type) Return ChildSpyPriceType objects filtered by the id_price_type column
 * @method     ChildSpyPriceType[]|ObjectCollection findByName(string $name) Return ChildSpyPriceType objects filtered by the name column
 * @method     ChildSpyPriceType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyPriceTypeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyPriceTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyPriceType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyPriceTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyPriceTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyPriceTypeQuery) {
            return $criteria;
        }
        $query = new ChildSpyPriceTypeQuery();
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
     * @return ChildSpyPriceType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyPriceTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyPriceTypeTableMap::DATABASE_NAME);
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
     * @return ChildSpyPriceType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_price_type, name FROM spy_price_type WHERE id_price_type = :p0';
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
            /** @var ChildSpyPriceType $obj */
            $obj = new ChildSpyPriceType();
            $obj->hydrate($row);
            SpyPriceTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyPriceType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_price_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPriceType(1234); // WHERE id_price_type = 1234
     * $query->filterByIdPriceType(array(12, 34)); // WHERE id_price_type IN (12, 34)
     * $query->filterByIdPriceType(array('min' => 12)); // WHERE id_price_type > 12
     * </code>
     *
     * @param     mixed $idPriceType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function filterByIdPriceType($idPriceType = null, $comparison = null)
    {
        if (is_array($idPriceType)) {
            $useMinMax = false;
            if (isset($idPriceType['min'])) {
                $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $idPriceType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPriceType['max'])) {
                $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $idPriceType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $idPriceType, $comparison);
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
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyPriceTypeTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyPriceProduct object
     *
     * @param \Propel\SpyPriceProduct|ObjectCollection $spyPriceProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function filterByPriceProduct($spyPriceProduct, $comparison = null)
    {
        if ($spyPriceProduct instanceof \Propel\SpyPriceProduct) {
            return $this
                ->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $spyPriceProduct->getFkPriceType(), $comparison);
        } elseif ($spyPriceProduct instanceof ObjectCollection) {
            return $this
                ->usePriceProductQuery()
                ->filterByPrimaryKeys($spyPriceProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPriceProduct() only accepts arguments of type \Propel\SpyPriceProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PriceProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function joinPriceProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PriceProduct');

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
            $this->addJoinObject($join, 'PriceProduct');
        }

        return $this;
    }

    /**
     * Use the PriceProduct relation SpyPriceProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyPriceProductQuery A secondary query class using the current class as primary query
     */
    public function usePriceProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPriceProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PriceProduct', '\Propel\SpyPriceProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyPriceType $spyPriceType Object to remove from the list of results
     *
     * @return $this|ChildSpyPriceTypeQuery The current query, for fluid interface
     */
    public function prune($spyPriceType = null)
    {
        if ($spyPriceType) {
            $this->addUsingAlias(SpyPriceTypeTableMap::COL_ID_PRICE_TYPE, $spyPriceType->getIdPriceType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_price_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPriceTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyPriceTypeTableMap::clearInstancePool();
            SpyPriceTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPriceTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyPriceTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyPriceTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyPriceTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyPriceTypeQuery
