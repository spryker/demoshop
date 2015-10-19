<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyGlossaryKey as ChildSpyGlossaryKey;
use Propel\SpyGlossaryKeyQuery as ChildSpyGlossaryKeyQuery;
use Propel\Map\SpyGlossaryKeyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_glossary_key' table.
 *
 *
 *
 * @method     ChildSpyGlossaryKeyQuery orderByIdGlossaryKey($order = Criteria::ASC) Order by the id_glossary_key column
 * @method     ChildSpyGlossaryKeyQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ChildSpyGlossaryKeyQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildSpyGlossaryKeyQuery groupByIdGlossaryKey() Group by the id_glossary_key column
 * @method     ChildSpyGlossaryKeyQuery groupByKey() Group by the key column
 * @method     ChildSpyGlossaryKeyQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildSpyGlossaryKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyGlossaryKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyGlossaryKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyGlossaryKeyQuery leftJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 * @method     ChildSpyGlossaryKeyQuery rightJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 * @method     ChildSpyGlossaryKeyQuery innerJoinSpyCmsGlossaryKeyMapping($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
 *
 * @method     ChildSpyGlossaryKeyQuery leftJoinSpyGlossaryTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyGlossaryKeyQuery rightJoinSpyGlossaryTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyGlossaryKeyQuery innerJoinSpyGlossaryTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyGlossaryTranslation relation
 *
 * @method     \Propel\SpyCmsGlossaryKeyMappingQuery|\Propel\SpyGlossaryTranslationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyGlossaryKey findOne(ConnectionInterface $con = null) Return the first ChildSpyGlossaryKey matching the query
 * @method     ChildSpyGlossaryKey findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyGlossaryKey matching the query, or a new ChildSpyGlossaryKey object populated from the query conditions when no match is found
 *
 * @method     ChildSpyGlossaryKey findOneByIdGlossaryKey(int $id_glossary_key) Return the first ChildSpyGlossaryKey filtered by the id_glossary_key column
 * @method     ChildSpyGlossaryKey findOneByKey(string $key) Return the first ChildSpyGlossaryKey filtered by the key column
 * @method     ChildSpyGlossaryKey findOneByIsActive(boolean $is_active) Return the first ChildSpyGlossaryKey filtered by the is_active column *

 * @method     ChildSpyGlossaryKey requirePk($key, ConnectionInterface $con = null) Return the ChildSpyGlossaryKey by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyGlossaryKey requireOne(ConnectionInterface $con = null) Return the first ChildSpyGlossaryKey matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyGlossaryKey requireOneByIdGlossaryKey(int $id_glossary_key) Return the first ChildSpyGlossaryKey filtered by the id_glossary_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyGlossaryKey requireOneByKey(string $key) Return the first ChildSpyGlossaryKey filtered by the key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyGlossaryKey requireOneByIsActive(boolean $is_active) Return the first ChildSpyGlossaryKey filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyGlossaryKey[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyGlossaryKey objects based on current ModelCriteria
 * @method     ChildSpyGlossaryKey[]|ObjectCollection findByIdGlossaryKey(int $id_glossary_key) Return ChildSpyGlossaryKey objects filtered by the id_glossary_key column
 * @method     ChildSpyGlossaryKey[]|ObjectCollection findByKey(string $key) Return ChildSpyGlossaryKey objects filtered by the key column
 * @method     ChildSpyGlossaryKey[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyGlossaryKey objects filtered by the is_active column
 * @method     ChildSpyGlossaryKey[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyGlossaryKeyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyGlossaryKeyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyGlossaryKey', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyGlossaryKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyGlossaryKeyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyGlossaryKeyQuery) {
            return $criteria;
        }
        $query = new ChildSpyGlossaryKeyQuery();
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
     * @return ChildSpyGlossaryKey|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyGlossaryKeyTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyGlossaryKeyTableMap::DATABASE_NAME);
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
     * @return ChildSpyGlossaryKey A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_glossary_key`, `key`, `is_active` FROM `spy_glossary_key` WHERE `id_glossary_key` = :p0';
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
            /** @var ChildSpyGlossaryKey $obj */
            $obj = new ChildSpyGlossaryKey();
            $obj->hydrate($row);
            SpyGlossaryKeyTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyGlossaryKey|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_glossary_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryKey(1234); // WHERE id_glossary_key = 1234
     * $query->filterByIdGlossaryKey(array(12, 34)); // WHERE id_glossary_key IN (12, 34)
     * $query->filterByIdGlossaryKey(array('min' => 12)); // WHERE id_glossary_key > 12
     * </code>
     *
     * @param     mixed $idGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryKey($idGlossaryKey = null, $comparison = null)
    {
        if (is_array($idGlossaryKey)) {
            $useMinMax = false;
            if (isset($idGlossaryKey['min'])) {
                $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $idGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryKey['max'])) {
                $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $idGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $idGlossaryKey, $comparison);
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
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_KEY, $key, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCmsGlossaryKeyMapping object
     *
     * @param \Propel\SpyCmsGlossaryKeyMapping|ObjectCollection $spyCmsGlossaryKeyMapping the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterBySpyCmsGlossaryKeyMapping($spyCmsGlossaryKeyMapping, $comparison = null)
    {
        if ($spyCmsGlossaryKeyMapping instanceof \Propel\SpyCmsGlossaryKeyMapping) {
            return $this
                ->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $spyCmsGlossaryKeyMapping->getFkGlossaryKey(), $comparison);
        } elseif ($spyCmsGlossaryKeyMapping instanceof ObjectCollection) {
            return $this
                ->useSpyCmsGlossaryKeyMappingQuery()
                ->filterByPrimaryKeys($spyCmsGlossaryKeyMapping->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyCmsGlossaryKeyMapping() only accepts arguments of type \Propel\SpyCmsGlossaryKeyMapping or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCmsGlossaryKeyMapping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinSpyCmsGlossaryKeyMapping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCmsGlossaryKeyMapping');

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
            $this->addJoinObject($join, 'SpyCmsGlossaryKeyMapping');
        }

        return $this;
    }

    /**
     * Use the SpyCmsGlossaryKeyMapping relation SpyCmsGlossaryKeyMapping object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsGlossaryKeyMappingQuery A secondary query class using the current class as primary query
     */
    public function useSpyCmsGlossaryKeyMappingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCmsGlossaryKeyMapping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCmsGlossaryKeyMapping', '\Propel\SpyCmsGlossaryKeyMappingQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyGlossaryTranslation object
     *
     * @param \Propel\SpyGlossaryTranslation|ObjectCollection $spyGlossaryTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterBySpyGlossaryTranslation($spyGlossaryTranslation, $comparison = null)
    {
        if ($spyGlossaryTranslation instanceof \Propel\SpyGlossaryTranslation) {
            return $this
                ->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $spyGlossaryTranslation->getFkGlossaryKey(), $comparison);
        } elseif ($spyGlossaryTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyGlossaryTranslationQuery()
                ->filterByPrimaryKeys($spyGlossaryTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyGlossaryTranslation() only accepts arguments of type \Propel\SpyGlossaryTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyGlossaryTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinSpyGlossaryTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyGlossaryTranslation');

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
            $this->addJoinObject($join, 'SpyGlossaryTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyGlossaryTranslation relation SpyGlossaryTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyGlossaryTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyGlossaryTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyGlossaryTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyGlossaryTranslation', '\Propel\SpyGlossaryTranslationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyGlossaryKey $spyGlossaryKey Object to remove from the list of results
     *
     * @return $this|ChildSpyGlossaryKeyQuery The current query, for fluid interface
     */
    public function prune($spyGlossaryKey = null)
    {
        if ($spyGlossaryKey) {
            $this->addUsingAlias(SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY, $spyGlossaryKey->getIdGlossaryKey(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_glossary_key table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyGlossaryKeyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyGlossaryKeyTableMap::clearInstancePool();
            SpyGlossaryKeyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyGlossaryKeyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyGlossaryKeyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyGlossaryKeyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyGlossaryKeyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyGlossaryKeyQuery
