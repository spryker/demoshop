<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTouchStorage as ChildSpyTouchStorage;
use Propel\SpyTouchStorageQuery as ChildSpyTouchStorageQuery;
use Propel\Map\SpyTouchStorageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_touch_storage' table.
 *
 *
 *
 * @method     ChildSpyTouchStorageQuery orderByIdTouchStorage($order = Criteria::ASC) Order by the id_touch_storage column
 * @method     ChildSpyTouchStorageQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpyTouchStorageQuery orderByFkTouch($order = Criteria::ASC) Order by the fk_touch column
 * @method     ChildSpyTouchStorageQuery orderByKey($order = Criteria::ASC) Order by the key column
 *
 * @method     ChildSpyTouchStorageQuery groupByIdTouchStorage() Group by the id_touch_storage column
 * @method     ChildSpyTouchStorageQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpyTouchStorageQuery groupByFkTouch() Group by the fk_touch column
 * @method     ChildSpyTouchStorageQuery groupByKey() Group by the key column
 *
 * @method     ChildSpyTouchStorageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyTouchStorageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyTouchStorageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyTouchStorageQuery leftJoinTouch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Touch relation
 * @method     ChildSpyTouchStorageQuery rightJoinTouch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Touch relation
 * @method     ChildSpyTouchStorageQuery innerJoinTouch($relationAlias = null) Adds a INNER JOIN clause to the query using the Touch relation
 *
 * @method     ChildSpyTouchStorageQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method     ChildSpyTouchStorageQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method     ChildSpyTouchStorageQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method     \Propel\SpyTouchQuery|\Propel\SpyLocaleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyTouchStorage findOne(ConnectionInterface $con = null) Return the first ChildSpyTouchStorage matching the query
 * @method     ChildSpyTouchStorage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyTouchStorage matching the query, or a new ChildSpyTouchStorage object populated from the query conditions when no match is found
 *
 * @method     ChildSpyTouchStorage findOneByIdTouchStorage(int $id_touch_storage) Return the first ChildSpyTouchStorage filtered by the id_touch_storage column
 * @method     ChildSpyTouchStorage findOneByFkLocale(int $fk_locale) Return the first ChildSpyTouchStorage filtered by the fk_locale column
 * @method     ChildSpyTouchStorage findOneByFkTouch(int $fk_touch) Return the first ChildSpyTouchStorage filtered by the fk_touch column
 * @method     ChildSpyTouchStorage findOneByKey(string $key) Return the first ChildSpyTouchStorage filtered by the key column *

 * @method     ChildSpyTouchStorage requirePk($key, ConnectionInterface $con = null) Return the ChildSpyTouchStorage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouchStorage requireOne(ConnectionInterface $con = null) Return the first ChildSpyTouchStorage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTouchStorage requireOneByIdTouchStorage(int $id_touch_storage) Return the first ChildSpyTouchStorage filtered by the id_touch_storage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouchStorage requireOneByFkLocale(int $fk_locale) Return the first ChildSpyTouchStorage filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouchStorage requireOneByFkTouch(int $fk_touch) Return the first ChildSpyTouchStorage filtered by the fk_touch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTouchStorage requireOneByKey(string $key) Return the first ChildSpyTouchStorage filtered by the key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTouchStorage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyTouchStorage objects based on current ModelCriteria
 * @method     ChildSpyTouchStorage[]|ObjectCollection findByIdTouchStorage(int $id_touch_storage) Return ChildSpyTouchStorage objects filtered by the id_touch_storage column
 * @method     ChildSpyTouchStorage[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyTouchStorage objects filtered by the fk_locale column
 * @method     ChildSpyTouchStorage[]|ObjectCollection findByFkTouch(int $fk_touch) Return ChildSpyTouchStorage objects filtered by the fk_touch column
 * @method     ChildSpyTouchStorage[]|ObjectCollection findByKey(string $key) Return ChildSpyTouchStorage objects filtered by the key column
 * @method     ChildSpyTouchStorage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyTouchStorageQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyTouchStorageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyTouchStorage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyTouchStorageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyTouchStorageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyTouchStorageQuery) {
            return $criteria;
        }
        $query = new ChildSpyTouchStorageQuery();
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
     * @return ChildSpyTouchStorage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyTouchStorageTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyTouchStorageTableMap::DATABASE_NAME);
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
     * @return ChildSpyTouchStorage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_touch_storage, fk_locale, fk_touch, key FROM spy_touch_storage WHERE id_touch_storage = :p0';
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
            /** @var ChildSpyTouchStorage $obj */
            $obj = new ChildSpyTouchStorage();
            $obj->hydrate($row);
            SpyTouchStorageTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyTouchStorage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_touch_storage column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTouchStorage(1234); // WHERE id_touch_storage = 1234
     * $query->filterByIdTouchStorage(array(12, 34)); // WHERE id_touch_storage IN (12, 34)
     * $query->filterByIdTouchStorage(array('min' => 12)); // WHERE id_touch_storage > 12
     * </code>
     *
     * @param     mixed $idTouchStorage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByIdTouchStorage($idTouchStorage = null, $comparison = null)
    {
        if (is_array($idTouchStorage)) {
            $useMinMax = false;
            if (isset($idTouchStorage['min'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $idTouchStorage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTouchStorage['max'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $idTouchStorage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $idTouchStorage, $comparison);
    }

    /**
     * Filter the query on the fk_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByFkLocale(1234); // WHERE fk_locale = 1234
     * $query->filterByFkLocale(array(12, 34)); // WHERE fk_locale IN (12, 34)
     * $query->filterByFkLocale(array('min' => 12)); // WHERE fk_locale > 12
     * </code>
     *
     * @see       filterByLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the fk_touch column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTouch(1234); // WHERE fk_touch = 1234
     * $query->filterByFkTouch(array(12, 34)); // WHERE fk_touch IN (12, 34)
     * $query->filterByFkTouch(array('min' => 12)); // WHERE fk_touch > 12
     * </code>
     *
     * @see       filterByTouch()
     *
     * @param     mixed $fkTouch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByFkTouch($fkTouch = null, $comparison = null)
    {
        if (is_array($fkTouch)) {
            $useMinMax = false;
            if (isset($fkTouch['min'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_TOUCH, $fkTouch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTouch['max'])) {
                $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_TOUCH, $fkTouch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_FK_TOUCH, $fkTouch, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $key)) {
                $key = str_replace('*', '%', $key);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyTouchStorageTableMap::COL_KEY, $key, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyTouch object
     *
     * @param \Propel\SpyTouch|ObjectCollection $spyTouch The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByTouch($spyTouch, $comparison = null)
    {
        if ($spyTouch instanceof \Propel\SpyTouch) {
            return $this
                ->addUsingAlias(SpyTouchStorageTableMap::COL_FK_TOUCH, $spyTouch->getIdTouch(), $comparison);
        } elseif ($spyTouch instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyTouchStorageTableMap::COL_FK_TOUCH, $spyTouch->toKeyValue('PrimaryKey', 'IdTouch'), $comparison);
        } else {
            throw new PropelException('filterByTouch() only accepts arguments of type \Propel\SpyTouch or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Touch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function joinTouch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Touch');

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
            $this->addJoinObject($join, 'Touch');
        }

        return $this;
    }

    /**
     * Use the Touch relation SpyTouch object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTouchQuery A secondary query class using the current class as primary query
     */
    public function useTouchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTouch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Touch', '\Propel\SpyTouchQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function filterByLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyTouchStorageTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyTouchStorageTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByLocale() only accepts arguments of type \Propel\SpyLocale or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Locale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Locale');

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
            $this->addJoinObject($join, 'Locale');
        }

        return $this;
    }

    /**
     * Use the Locale relation SpyLocale object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocaleQuery A secondary query class using the current class as primary query
     */
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', '\Propel\SpyLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyTouchStorage $spyTouchStorage Object to remove from the list of results
     *
     * @return $this|ChildSpyTouchStorageQuery The current query, for fluid interface
     */
    public function prune($spyTouchStorage = null)
    {
        if ($spyTouchStorage) {
            $this->addUsingAlias(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE, $spyTouchStorage->getIdTouchStorage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_touch_storage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchStorageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyTouchStorageTableMap::clearInstancePool();
            SpyTouchStorageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchStorageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyTouchStorageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyTouchStorageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyTouchStorageTableMap::clearRelatedInstancePool();

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
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function cacheFetch($key)
    {
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function cacheStore($key, $value, $lifetime = 3600)
    {
        throw new PropelException('You must override the cacheContains(), cacheStore(), and cacheFetch() methods to enable query cache');
    }

    public function doSelect(ConnectionInterface $con = null)
    {
        // check that the columns of the main class are already added (if this is the primary ModelCriteria)
        if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
            $this->addSelfSelectColumns();
        }
        $this->configureSelectColumns();

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyTouchStorageTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyTouchStorageTableMap::DATABASE_NAME);

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

} // SpyTouchStorageQuery
