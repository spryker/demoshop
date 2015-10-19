<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductOptionValueTranslation as ChildSpyProductOptionValueTranslation;
use Propel\SpyProductOptionValueTranslationQuery as ChildSpyProductOptionValueTranslationQuery;
use Propel\Map\SpyProductOptionValueTranslationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_option_value_translation' table.
 *
 *
 *
 * @method     ChildSpyProductOptionValueTranslationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyProductOptionValueTranslationQuery orderByFkProductOptionValue($order = Criteria::ASC) Order by the fk_product_option_value column
 * @method     ChildSpyProductOptionValueTranslationQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 *
 * @method     ChildSpyProductOptionValueTranslationQuery groupByName() Group by the name column
 * @method     ChildSpyProductOptionValueTranslationQuery groupByFkProductOptionValue() Group by the fk_product_option_value column
 * @method     ChildSpyProductOptionValueTranslationQuery groupByFkLocale() Group by the fk_locale column
 *
 * @method     ChildSpyProductOptionValueTranslationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductOptionValueTranslationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductOptionValueTranslationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductOptionValueTranslationQuery leftJoinSpyProductOptionValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionValueTranslationQuery rightJoinSpyProductOptionValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValue relation
 * @method     ChildSpyProductOptionValueTranslationQuery innerJoinSpyProductOptionValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValue relation
 *
 * @method     ChildSpyProductOptionValueTranslationQuery leftJoinSpyLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpyProductOptionValueTranslationQuery rightJoinSpyLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpyProductOptionValueTranslationQuery innerJoinSpyLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocale relation
 *
 * @method     \Propel\SpyProductOptionValueQuery|\Propel\SpyLocaleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductOptionValueTranslation findOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueTranslation matching the query
 * @method     ChildSpyProductOptionValueTranslation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueTranslation matching the query, or a new ChildSpyProductOptionValueTranslation object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductOptionValueTranslation findOneByName(string $name) Return the first ChildSpyProductOptionValueTranslation filtered by the name column
 * @method     ChildSpyProductOptionValueTranslation findOneByFkProductOptionValue(int $fk_product_option_value) Return the first ChildSpyProductOptionValueTranslation filtered by the fk_product_option_value column
 * @method     ChildSpyProductOptionValueTranslation findOneByFkLocale(int $fk_locale) Return the first ChildSpyProductOptionValueTranslation filtered by the fk_locale column *

 * @method     ChildSpyProductOptionValueTranslation requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductOptionValueTranslation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueTranslation requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductOptionValueTranslation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueTranslation requireOneByName(string $name) Return the first ChildSpyProductOptionValueTranslation filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueTranslation requireOneByFkProductOptionValue(int $fk_product_option_value) Return the first ChildSpyProductOptionValueTranslation filtered by the fk_product_option_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductOptionValueTranslation requireOneByFkLocale(int $fk_locale) Return the first ChildSpyProductOptionValueTranslation filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductOptionValueTranslation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductOptionValueTranslation objects based on current ModelCriteria
 * @method     ChildSpyProductOptionValueTranslation[]|ObjectCollection findByName(string $name) Return ChildSpyProductOptionValueTranslation objects filtered by the name column
 * @method     ChildSpyProductOptionValueTranslation[]|ObjectCollection findByFkProductOptionValue(int $fk_product_option_value) Return ChildSpyProductOptionValueTranslation objects filtered by the fk_product_option_value column
 * @method     ChildSpyProductOptionValueTranslation[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyProductOptionValueTranslation objects filtered by the fk_locale column
 * @method     ChildSpyProductOptionValueTranslation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductOptionValueTranslationQuery extends ModelCriteria
{

    // query_cache behavior
    protected $queryKey = '';
    protected static $cacheBackend;
                protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductOptionValueTranslationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductOptionValueTranslation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductOptionValueTranslationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductOptionValueTranslationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductOptionValueTranslationQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductOptionValueTranslationQuery();
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
     * @param array[$fk_product_option_value, $fk_locale] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyProductOptionValueTranslation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductOptionValueTranslationTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductOptionValueTranslation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT name, fk_product_option_value, fk_locale FROM spy_product_option_value_translation WHERE fk_product_option_value = :p0 AND fk_locale = :p1';
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
            /** @var ChildSpyProductOptionValueTranslation $obj */
            $obj = new ChildSpyProductOptionValueTranslation();
            $obj->hydrate($row);
            SpyProductOptionValueTranslationTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyProductOptionValueTranslation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fk_product_option_value column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProductOptionValue(1234); // WHERE fk_product_option_value = 1234
     * $query->filterByFkProductOptionValue(array(12, 34)); // WHERE fk_product_option_value IN (12, 34)
     * $query->filterByFkProductOptionValue(array('min' => 12)); // WHERE fk_product_option_value > 12
     * </code>
     *
     * @see       filterBySpyProductOptionValue()
     *
     * @param     mixed $fkProductOptionValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterByFkProductOptionValue($fkProductOptionValue = null, $comparison = null)
    {
        if (is_array($fkProductOptionValue)) {
            $useMinMax = false;
            if (isset($fkProductOptionValue['min'])) {
                $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProductOptionValue['max'])) {
                $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $fkProductOptionValue, $comparison);
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
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValue object
     *
     * @param \Propel\SpyProductOptionValue|ObjectCollection $spyProductOptionValue The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValue($spyProductOptionValue, $comparison = null)
    {
        if ($spyProductOptionValue instanceof \Propel\SpyProductOptionValue) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $spyProductOptionValue->getIdProductOptionValue(), $comparison);
        } elseif ($spyProductOptionValue instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE, $spyProductOptionValue->toKeyValue('PrimaryKey', 'IdProductOptionValue'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductOptionValue() only accepts arguments of type \Propel\SpyProductOptionValue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValue');

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
            $this->addJoinObject($join, 'SpyProductOptionValue');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValue relation SpyProductOptionValue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValue', '\Propel\SpyProductOptionValueQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function filterBySpyLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
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
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function joinSpyLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSpyLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocale', '\Propel\SpyLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductOptionValueTranslation $spyProductOptionValueTranslation Object to remove from the list of results
     *
     * @return $this|ChildSpyProductOptionValueTranslationQuery The current query, for fluid interface
     */
    public function prune($spyProductOptionValueTranslation = null)
    {
        if ($spyProductOptionValueTranslation) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyProductOptionValueTranslationTableMap::COL_FK_PRODUCT_OPTION_VALUE), $spyProductOptionValueTranslation->getFkProductOptionValue(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyProductOptionValueTranslationTableMap::COL_FK_LOCALE), $spyProductOptionValueTranslation->getFkLocale(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_option_value_translation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductOptionValueTranslationTableMap::clearInstancePool();
            SpyProductOptionValueTranslationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductOptionValueTranslationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductOptionValueTranslationTableMap::clearRelatedInstancePool();

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

        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);
        $db = Propel::getServiceContainer()->getAdapter(SpyProductOptionValueTranslationTableMap::DATABASE_NAME);

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

} // SpyProductOptionValueTranslationQuery
