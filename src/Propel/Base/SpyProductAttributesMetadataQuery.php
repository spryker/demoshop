<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductAttributesMetadata as ChildSpyProductAttributesMetadata;
use Propel\SpyProductAttributesMetadataQuery as ChildSpyProductAttributesMetadataQuery;
use Propel\Map\SpyProductAttributesMetadataTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_attributes_metadata' table.
 *
 *
 *
 * @method     ChildSpyProductAttributesMetadataQuery orderByIdAttributesMetadata($order = Criteria::ASC) Order by the id_attributes_metadata column
 * @method     ChildSpyProductAttributesMetadataQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ChildSpyProductAttributesMetadataQuery orderByIsEditable($order = Criteria::ASC) Order by the is_editable column
 * @method     ChildSpyProductAttributesMetadataQuery orderByFkType($order = Criteria::ASC) Order by the fk_type column
 *
 * @method     ChildSpyProductAttributesMetadataQuery groupByIdAttributesMetadata() Group by the id_attributes_metadata column
 * @method     ChildSpyProductAttributesMetadataQuery groupByKey() Group by the key column
 * @method     ChildSpyProductAttributesMetadataQuery groupByIsEditable() Group by the is_editable column
 * @method     ChildSpyProductAttributesMetadataQuery groupByFkType() Group by the fk_type column
 *
 * @method     ChildSpyProductAttributesMetadataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductAttributesMetadataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductAttributesMetadataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductAttributesMetadataQuery leftJoinSpyProductAttributeType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductAttributeType relation
 * @method     ChildSpyProductAttributesMetadataQuery rightJoinSpyProductAttributeType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductAttributeType relation
 * @method     ChildSpyProductAttributesMetadataQuery innerJoinSpyProductAttributeType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductAttributeType relation
 *
 * @method     ChildSpyProductAttributesMetadataQuery leftJoinSpyProductSearchAttributesOperation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductSearchAttributesOperation relation
 * @method     ChildSpyProductAttributesMetadataQuery rightJoinSpyProductSearchAttributesOperation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductSearchAttributesOperation relation
 * @method     ChildSpyProductAttributesMetadataQuery innerJoinSpyProductSearchAttributesOperation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductSearchAttributesOperation relation
 *
 * @method     \Propel\SpyProductAttributeTypeQuery|\Propel\SpyProductSearchAttributesOperationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductAttributesMetadata findOne(ConnectionInterface $con = null) Return the first ChildSpyProductAttributesMetadata matching the query
 * @method     ChildSpyProductAttributesMetadata findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductAttributesMetadata matching the query, or a new ChildSpyProductAttributesMetadata object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductAttributesMetadata findOneByIdAttributesMetadata(int $id_attributes_metadata) Return the first ChildSpyProductAttributesMetadata filtered by the id_attributes_metadata column
 * @method     ChildSpyProductAttributesMetadata findOneByKey(string $key) Return the first ChildSpyProductAttributesMetadata filtered by the key column
 * @method     ChildSpyProductAttributesMetadata findOneByIsEditable(boolean $is_editable) Return the first ChildSpyProductAttributesMetadata filtered by the is_editable column
 * @method     ChildSpyProductAttributesMetadata findOneByFkType(int $fk_type) Return the first ChildSpyProductAttributesMetadata filtered by the fk_type column *

 * @method     ChildSpyProductAttributesMetadata requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductAttributesMetadata by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributesMetadata requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductAttributesMetadata matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductAttributesMetadata requireOneByIdAttributesMetadata(int $id_attributes_metadata) Return the first ChildSpyProductAttributesMetadata filtered by the id_attributes_metadata column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributesMetadata requireOneByKey(string $key) Return the first ChildSpyProductAttributesMetadata filtered by the key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributesMetadata requireOneByIsEditable(boolean $is_editable) Return the first ChildSpyProductAttributesMetadata filtered by the is_editable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributesMetadata requireOneByFkType(int $fk_type) Return the first ChildSpyProductAttributesMetadata filtered by the fk_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductAttributesMetadata[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductAttributesMetadata objects based on current ModelCriteria
 * @method     ChildSpyProductAttributesMetadata[]|ObjectCollection findByIdAttributesMetadata(int $id_attributes_metadata) Return ChildSpyProductAttributesMetadata objects filtered by the id_attributes_metadata column
 * @method     ChildSpyProductAttributesMetadata[]|ObjectCollection findByKey(string $key) Return ChildSpyProductAttributesMetadata objects filtered by the key column
 * @method     ChildSpyProductAttributesMetadata[]|ObjectCollection findByIsEditable(boolean $is_editable) Return ChildSpyProductAttributesMetadata objects filtered by the is_editable column
 * @method     ChildSpyProductAttributesMetadata[]|ObjectCollection findByFkType(int $fk_type) Return ChildSpyProductAttributesMetadata objects filtered by the fk_type column
 * @method     ChildSpyProductAttributesMetadata[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductAttributesMetadataQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductAttributesMetadataQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductAttributesMetadata', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductAttributesMetadataQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductAttributesMetadataQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductAttributesMetadataQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductAttributesMetadataQuery();
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
     * @return ChildSpyProductAttributesMetadata|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductAttributesMetadataTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductAttributesMetadata A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_attributes_metadata`, `key`, `is_editable`, `fk_type` FROM `spy_attributes_metadata` WHERE `id_attributes_metadata` = :p0';
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
            /** @var ChildSpyProductAttributesMetadata $obj */
            $obj = new ChildSpyProductAttributesMetadata();
            $obj->hydrate($row);
            SpyProductAttributesMetadataTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductAttributesMetadata|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_attributes_metadata column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAttributesMetadata(1234); // WHERE id_attributes_metadata = 1234
     * $query->filterByIdAttributesMetadata(array(12, 34)); // WHERE id_attributes_metadata IN (12, 34)
     * $query->filterByIdAttributesMetadata(array('min' => 12)); // WHERE id_attributes_metadata > 12
     * </code>
     *
     * @param     mixed $idAttributesMetadata The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByIdAttributesMetadata($idAttributesMetadata = null, $comparison = null)
    {
        if (is_array($idAttributesMetadata)) {
            $useMinMax = false;
            if (isset($idAttributesMetadata['min'])) {
                $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $idAttributesMetadata['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAttributesMetadata['max'])) {
                $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $idAttributesMetadata['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $idAttributesMetadata, $comparison);
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
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_KEY, $key, $comparison);
    }

    /**
     * Filter the query on the is_editable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsEditable(true); // WHERE is_editable = true
     * $query->filterByIsEditable('yes'); // WHERE is_editable = true
     * </code>
     *
     * @param     boolean|string $isEditable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByIsEditable($isEditable = null, $comparison = null)
    {
        if (is_string($isEditable)) {
            $isEditable = in_array(strtolower($isEditable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_IS_EDITABLE, $isEditable, $comparison);
    }

    /**
     * Filter the query on the fk_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkType(1234); // WHERE fk_type = 1234
     * $query->filterByFkType(array(12, 34)); // WHERE fk_type IN (12, 34)
     * $query->filterByFkType(array('min' => 12)); // WHERE fk_type > 12
     * </code>
     *
     * @see       filterBySpyProductAttributeType()
     *
     * @param     mixed $fkType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByFkType($fkType = null, $comparison = null)
    {
        if (is_array($fkType)) {
            $useMinMax = false;
            if (isset($fkType['min'])) {
                $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_FK_TYPE, $fkType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkType['max'])) {
                $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_FK_TYPE, $fkType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_FK_TYPE, $fkType, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductAttributeType object
     *
     * @param \Propel\SpyProductAttributeType|ObjectCollection $spyProductAttributeType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterBySpyProductAttributeType($spyProductAttributeType, $comparison = null)
    {
        if ($spyProductAttributeType instanceof \Propel\SpyProductAttributeType) {
            return $this
                ->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_FK_TYPE, $spyProductAttributeType->getIdType(), $comparison);
        } elseif ($spyProductAttributeType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_FK_TYPE, $spyProductAttributeType->toKeyValue('PrimaryKey', 'IdType'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductAttributeType() only accepts arguments of type \Propel\SpyProductAttributeType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductAttributeType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function joinSpyProductAttributeType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductAttributeType');

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
            $this->addJoinObject($join, 'SpyProductAttributeType');
        }

        return $this;
    }

    /**
     * Use the SpyProductAttributeType relation SpyProductAttributeType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductAttributeTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductAttributeType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductAttributeType', '\Propel\SpyProductAttributeTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductSearchAttributesOperation object
     *
     * @param \Propel\SpyProductSearchAttributesOperation|ObjectCollection $spyProductSearchAttributesOperation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterBySpyProductSearchAttributesOperation($spyProductSearchAttributesOperation, $comparison = null)
    {
        if ($spyProductSearchAttributesOperation instanceof \Propel\SpyProductSearchAttributesOperation) {
            return $this
                ->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $spyProductSearchAttributesOperation->getSourceAttributeId(), $comparison);
        } elseif ($spyProductSearchAttributesOperation instanceof ObjectCollection) {
            return $this
                ->useSpyProductSearchAttributesOperationQuery()
                ->filterByPrimaryKeys($spyProductSearchAttributesOperation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductSearchAttributesOperation() only accepts arguments of type \Propel\SpyProductSearchAttributesOperation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductSearchAttributesOperation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function joinSpyProductSearchAttributesOperation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductSearchAttributesOperation');

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
            $this->addJoinObject($join, 'SpyProductSearchAttributesOperation');
        }

        return $this;
    }

    /**
     * Use the SpyProductSearchAttributesOperation relation SpyProductSearchAttributesOperation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductSearchAttributesOperationQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductSearchAttributesOperationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductSearchAttributesOperation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductSearchAttributesOperation', '\Propel\SpyProductSearchAttributesOperationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductAttributesMetadata $spyProductAttributesMetadata Object to remove from the list of results
     *
     * @return $this|ChildSpyProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function prune($spyProductAttributesMetadata = null)
    {
        if ($spyProductAttributesMetadata) {
            $this->addUsingAlias(SpyProductAttributesMetadataTableMap::COL_ID_ATTRIBUTES_METADATA, $spyProductAttributesMetadata->getIdAttributesMetadata(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_attributes_metadata table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductAttributesMetadataTableMap::clearInstancePool();
            SpyProductAttributesMetadataTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributesMetadataTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductAttributesMetadataTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductAttributesMetadataTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductAttributesMetadataTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyProductAttributesMetadataQuery
