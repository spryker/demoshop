<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductSearchAttributesOperation as ChildSpyProductSearchAttributesOperation;
use Propel\SpyProductSearchAttributesOperationQuery as ChildSpyProductSearchAttributesOperationQuery;
use Propel\Map\SpyProductSearchAttributesOperationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_search_attributes_operation' table.
 *
 *
 *
 * @method     ChildSpyProductSearchAttributesOperationQuery orderBySourceAttributeId($order = Criteria::ASC) Order by the source_attribute_id column
 * @method     ChildSpyProductSearchAttributesOperationQuery orderByOperation($order = Criteria::ASC) Order by the operation column
 * @method     ChildSpyProductSearchAttributesOperationQuery orderByTargetField($order = Criteria::ASC) Order by the target_field column
 * @method     ChildSpyProductSearchAttributesOperationQuery orderByWeighting($order = Criteria::ASC) Order by the weighting column
 *
 * @method     ChildSpyProductSearchAttributesOperationQuery groupBySourceAttributeId() Group by the source_attribute_id column
 * @method     ChildSpyProductSearchAttributesOperationQuery groupByOperation() Group by the operation column
 * @method     ChildSpyProductSearchAttributesOperationQuery groupByTargetField() Group by the target_field column
 * @method     ChildSpyProductSearchAttributesOperationQuery groupByWeighting() Group by the weighting column
 *
 * @method     ChildSpyProductSearchAttributesOperationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductSearchAttributesOperationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductSearchAttributesOperationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductSearchAttributesOperationQuery leftJoinSpyProductAttributesMetadata($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductAttributesMetadata relation
 * @method     ChildSpyProductSearchAttributesOperationQuery rightJoinSpyProductAttributesMetadata($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductAttributesMetadata relation
 * @method     ChildSpyProductSearchAttributesOperationQuery innerJoinSpyProductAttributesMetadata($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductAttributesMetadata relation
 *
 * @method     \Propel\SpyProductAttributesMetadataQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductSearchAttributesOperation findOne(ConnectionInterface $con = null) Return the first ChildSpyProductSearchAttributesOperation matching the query
 * @method     ChildSpyProductSearchAttributesOperation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductSearchAttributesOperation matching the query, or a new ChildSpyProductSearchAttributesOperation object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductSearchAttributesOperation findOneBySourceAttributeId(int $source_attribute_id) Return the first ChildSpyProductSearchAttributesOperation filtered by the source_attribute_id column
 * @method     ChildSpyProductSearchAttributesOperation findOneByOperation(string $operation) Return the first ChildSpyProductSearchAttributesOperation filtered by the operation column
 * @method     ChildSpyProductSearchAttributesOperation findOneByTargetField(string $target_field) Return the first ChildSpyProductSearchAttributesOperation filtered by the target_field column
 * @method     ChildSpyProductSearchAttributesOperation findOneByWeighting(int $weighting) Return the first ChildSpyProductSearchAttributesOperation filtered by the weighting column *

 * @method     ChildSpyProductSearchAttributesOperation requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductSearchAttributesOperation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductSearchAttributesOperation requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductSearchAttributesOperation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductSearchAttributesOperation requireOneBySourceAttributeId(int $source_attribute_id) Return the first ChildSpyProductSearchAttributesOperation filtered by the source_attribute_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductSearchAttributesOperation requireOneByOperation(string $operation) Return the first ChildSpyProductSearchAttributesOperation filtered by the operation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductSearchAttributesOperation requireOneByTargetField(string $target_field) Return the first ChildSpyProductSearchAttributesOperation filtered by the target_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductSearchAttributesOperation requireOneByWeighting(int $weighting) Return the first ChildSpyProductSearchAttributesOperation filtered by the weighting column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductSearchAttributesOperation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductSearchAttributesOperation objects based on current ModelCriteria
 * @method     ChildSpyProductSearchAttributesOperation[]|ObjectCollection findBySourceAttributeId(int $source_attribute_id) Return ChildSpyProductSearchAttributesOperation objects filtered by the source_attribute_id column
 * @method     ChildSpyProductSearchAttributesOperation[]|ObjectCollection findByOperation(string $operation) Return ChildSpyProductSearchAttributesOperation objects filtered by the operation column
 * @method     ChildSpyProductSearchAttributesOperation[]|ObjectCollection findByTargetField(string $target_field) Return ChildSpyProductSearchAttributesOperation objects filtered by the target_field column
 * @method     ChildSpyProductSearchAttributesOperation[]|ObjectCollection findByWeighting(int $weighting) Return ChildSpyProductSearchAttributesOperation objects filtered by the weighting column
 * @method     ChildSpyProductSearchAttributesOperation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductSearchAttributesOperationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductSearchAttributesOperationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductSearchAttributesOperation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductSearchAttributesOperationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductSearchAttributesOperationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductSearchAttributesOperationQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductSearchAttributesOperationQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$source_attribute_id, $operation, $target_field] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyProductSearchAttributesOperation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductSearchAttributesOperationTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductSearchAttributesOperationTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductSearchAttributesOperation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT source_attribute_id, operation, target_field, weighting FROM spy_product_search_attributes_operation WHERE source_attribute_id = :p0 AND operation = :p1 AND target_field = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyProductSearchAttributesOperation $obj */
            $obj = new ChildSpyProductSearchAttributesOperation();
            $obj->hydrate($row);
            SpyProductSearchAttributesOperationTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return ChildSpyProductSearchAttributesOperation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_OPERATION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_TARGET_FIELD, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyProductSearchAttributesOperationTableMap::COL_OPERATION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(SpyProductSearchAttributesOperationTableMap::COL_TARGET_FIELD, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the source_attribute_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySourceAttributeId(1234); // WHERE source_attribute_id = 1234
     * $query->filterBySourceAttributeId(array(12, 34)); // WHERE source_attribute_id IN (12, 34)
     * $query->filterBySourceAttributeId(array('min' => 12)); // WHERE source_attribute_id > 12
     * </code>
     *
     * @see       filterBySpyProductAttributesMetadata()
     *
     * @param     mixed $sourceAttributeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterBySourceAttributeId($sourceAttributeId = null, $comparison = null)
    {
        if (is_array($sourceAttributeId)) {
            $useMinMax = false;
            if (isset($sourceAttributeId['min'])) {
                $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $sourceAttributeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourceAttributeId['max'])) {
                $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $sourceAttributeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $sourceAttributeId, $comparison);
    }

    /**
     * Filter the query on the operation column
     *
     * Example usage:
     * <code>
     * $query->filterByOperation('fooValue');   // WHERE operation = 'fooValue'
     * $query->filterByOperation('%fooValue%'); // WHERE operation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByOperation($operation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operation)) {
                $operation = str_replace('*', '%', $operation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_OPERATION, $operation, $comparison);
    }

    /**
     * Filter the query on the target_field column
     *
     * Example usage:
     * <code>
     * $query->filterByTargetField('fooValue');   // WHERE target_field = 'fooValue'
     * $query->filterByTargetField('%fooValue%'); // WHERE target_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $targetField The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByTargetField($targetField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($targetField)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $targetField)) {
                $targetField = str_replace('*', '%', $targetField);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_TARGET_FIELD, $targetField, $comparison);
    }

    /**
     * Filter the query on the weighting column
     *
     * Example usage:
     * <code>
     * $query->filterByWeighting(1234); // WHERE weighting = 1234
     * $query->filterByWeighting(array(12, 34)); // WHERE weighting IN (12, 34)
     * $query->filterByWeighting(array('min' => 12)); // WHERE weighting > 12
     * </code>
     *
     * @param     mixed $weighting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByWeighting($weighting = null, $comparison = null)
    {
        if (is_array($weighting)) {
            $useMinMax = false;
            if (isset($weighting['min'])) {
                $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_WEIGHTING, $weighting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weighting['max'])) {
                $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_WEIGHTING, $weighting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_WEIGHTING, $weighting, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductAttributesMetadata object
     *
     * @param \Propel\SpyProductAttributesMetadata|ObjectCollection $spyProductAttributesMetadata The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterBySpyProductAttributesMetadata($spyProductAttributesMetadata, $comparison = null)
    {
        if ($spyProductAttributesMetadata instanceof \Propel\SpyProductAttributesMetadata) {
            return $this
                ->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $spyProductAttributesMetadata->getIdAttributesMetadata(), $comparison);
        } elseif ($spyProductAttributesMetadata instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID, $spyProductAttributesMetadata->toKeyValue('PrimaryKey', 'IdAttributesMetadata'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductAttributesMetadata() only accepts arguments of type \Propel\SpyProductAttributesMetadata or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductAttributesMetadata relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function joinSpyProductAttributesMetadata($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductAttributesMetadata');

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
            $this->addJoinObject($join, 'SpyProductAttributesMetadata');
        }

        return $this;
    }

    /**
     * Use the SpyProductAttributesMetadata relation SpyProductAttributesMetadata object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductAttributesMetadataQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductAttributesMetadataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductAttributesMetadata($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductAttributesMetadata', '\Propel\SpyProductAttributesMetadataQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductSearchAttributesOperation $spyProductSearchAttributesOperation Object to remove from the list of results
     *
     * @return $this|ChildSpyProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function prune($spyProductSearchAttributesOperation = null)
    {
        if ($spyProductSearchAttributesOperation) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyProductSearchAttributesOperationTableMap::COL_SOURCE_ATTRIBUTE_ID), $spyProductSearchAttributesOperation->getSourceAttributeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyProductSearchAttributesOperationTableMap::COL_OPERATION), $spyProductSearchAttributesOperation->getOperation(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(SpyProductSearchAttributesOperationTableMap::COL_TARGET_FIELD), $spyProductSearchAttributesOperation->getTargetField(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_search_attributes_operation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductSearchAttributesOperationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductSearchAttributesOperationTableMap::clearInstancePool();
            SpyProductSearchAttributesOperationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductSearchAttributesOperationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductSearchAttributesOperationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductSearchAttributesOperationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductSearchAttributesOperationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyProductSearchAttributesOperationQuery
