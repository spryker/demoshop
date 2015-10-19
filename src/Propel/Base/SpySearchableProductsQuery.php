<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySearchableProducts as ChildSpySearchableProducts;
use Propel\SpySearchableProductsQuery as ChildSpySearchableProductsQuery;
use Propel\Map\SpySearchableProductsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_searchable_products' table.
 *
 *
 *
 * @method     ChildSpySearchableProductsQuery orderBySearchableId($order = Criteria::ASC) Order by the searchable_id column
 * @method     ChildSpySearchableProductsQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpySearchableProductsQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpySearchableProductsQuery orderByIsSearchable($order = Criteria::ASC) Order by the is_searchable column
 *
 * @method     ChildSpySearchableProductsQuery groupBySearchableId() Group by the searchable_id column
 * @method     ChildSpySearchableProductsQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpySearchableProductsQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpySearchableProductsQuery groupByIsSearchable() Group by the is_searchable column
 *
 * @method     ChildSpySearchableProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySearchableProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySearchableProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySearchableProductsQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpySearchableProductsQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpySearchableProductsQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpySearchableProductsQuery leftJoinSpyLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpySearchableProductsQuery rightJoinSpyLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpySearchableProductsQuery innerJoinSpyLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocale relation
 *
 * @method     \Propel\SpyProductQuery|\Propel\SpyLocaleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySearchableProducts findOne(ConnectionInterface $con = null) Return the first ChildSpySearchableProducts matching the query
 * @method     ChildSpySearchableProducts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySearchableProducts matching the query, or a new ChildSpySearchableProducts object populated from the query conditions when no match is found
 *
 * @method     ChildSpySearchableProducts findOneBySearchableId(int $searchable_id) Return the first ChildSpySearchableProducts filtered by the searchable_id column
 * @method     ChildSpySearchableProducts findOneByFkProduct(int $fk_product) Return the first ChildSpySearchableProducts filtered by the fk_product column
 * @method     ChildSpySearchableProducts findOneByFkLocale(int $fk_locale) Return the first ChildSpySearchableProducts filtered by the fk_locale column
 * @method     ChildSpySearchableProducts findOneByIsSearchable(boolean $is_searchable) Return the first ChildSpySearchableProducts filtered by the is_searchable column *

 * @method     ChildSpySearchableProducts requirePk($key, ConnectionInterface $con = null) Return the ChildSpySearchableProducts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchableProducts requireOne(ConnectionInterface $con = null) Return the first ChildSpySearchableProducts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchableProducts requireOneBySearchableId(int $searchable_id) Return the first ChildSpySearchableProducts filtered by the searchable_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchableProducts requireOneByFkProduct(int $fk_product) Return the first ChildSpySearchableProducts filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchableProducts requireOneByFkLocale(int $fk_locale) Return the first ChildSpySearchableProducts filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchableProducts requireOneByIsSearchable(boolean $is_searchable) Return the first ChildSpySearchableProducts filtered by the is_searchable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchableProducts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySearchableProducts objects based on current ModelCriteria
 * @method     ChildSpySearchableProducts[]|ObjectCollection findBySearchableId(int $searchable_id) Return ChildSpySearchableProducts objects filtered by the searchable_id column
 * @method     ChildSpySearchableProducts[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpySearchableProducts objects filtered by the fk_product column
 * @method     ChildSpySearchableProducts[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpySearchableProducts objects filtered by the fk_locale column
 * @method     ChildSpySearchableProducts[]|ObjectCollection findByIsSearchable(boolean $is_searchable) Return ChildSpySearchableProducts objects filtered by the is_searchable column
 * @method     ChildSpySearchableProducts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySearchableProductsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySearchableProductsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySearchableProducts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySearchableProductsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySearchableProductsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySearchableProductsQuery) {
            return $criteria;
        }
        $query = new ChildSpySearchableProductsQuery();
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
     * @return ChildSpySearchableProducts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySearchableProductsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySearchableProductsTableMap::DATABASE_NAME);
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
     * @return ChildSpySearchableProducts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT searchable_id, fk_product, fk_locale, is_searchable FROM spy_searchable_products WHERE searchable_id = :p0';
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
            /** @var ChildSpySearchableProducts $obj */
            $obj = new ChildSpySearchableProducts();
            $obj->hydrate($row);
            SpySearchableProductsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySearchableProducts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the searchable_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySearchableId(1234); // WHERE searchable_id = 1234
     * $query->filterBySearchableId(array(12, 34)); // WHERE searchable_id IN (12, 34)
     * $query->filterBySearchableId(array('min' => 12)); // WHERE searchable_id > 12
     * </code>
     *
     * @param     mixed $searchableId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterBySearchableId($searchableId = null, $comparison = null)
    {
        if (is_array($searchableId)) {
            $useMinMax = false;
            if (isset($searchableId['min'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $searchableId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($searchableId['max'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $searchableId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $searchableId, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product > 12
     * </code>
     *
     * @see       filterBySpyProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
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
     * @see       filterBySpyLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the is_searchable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSearchable(true); // WHERE is_searchable = true
     * $query->filterByIsSearchable('yes'); // WHERE is_searchable = true
     * </code>
     *
     * @param     boolean|string $isSearchable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterByIsSearchable($isSearchable = null, $comparison = null)
    {
        if (is_string($isSearchable)) {
            $isSearchable = in_array(strtolower($isSearchable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpySearchableProductsTableMap::COL_IS_SEARCHABLE, $isSearchable, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpySearchableProductsTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySearchableProductsTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProduct');

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
            $this->addJoinObject($join, 'SpyProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function filterBySpyLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpySearchableProductsTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpySearchableProductsTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterBySpyLocale() only accepts arguments of type \Propel\SpyLocale or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function joinSpyLocale($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocale');

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
            $this->addJoinObject($join, 'SpyLocale');
        }

        return $this;
    }

    /**
     * Use the SpyLocale relation SpyLocale object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocaleQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocaleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocale', '\Propel\SpyLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySearchableProducts $spySearchableProducts Object to remove from the list of results
     *
     * @return $this|ChildSpySearchableProductsQuery The current query, for fluid interface
     */
    public function prune($spySearchableProducts = null)
    {
        if ($spySearchableProducts) {
            $this->addUsingAlias(SpySearchableProductsTableMap::COL_SEARCHABLE_ID, $spySearchableProducts->getSearchableId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_searchable_products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchableProductsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySearchableProductsTableMap::clearInstancePool();
            SpySearchableProductsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchableProductsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySearchableProductsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySearchableProductsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySearchableProductsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpySearchableProductsQuery
