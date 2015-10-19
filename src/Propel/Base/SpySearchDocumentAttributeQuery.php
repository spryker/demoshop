<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpySearchDocumentAttribute as ChildSpySearchDocumentAttribute;
use Propel\SpySearchDocumentAttributeQuery as ChildSpySearchDocumentAttributeQuery;
use Propel\Map\SpySearchDocumentAttributeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_search_document_attribute' table.
 *
 *
 *
 * @method     ChildSpySearchDocumentAttributeQuery orderByIdSearchDocumentAttribute($order = Criteria::ASC) Order by the id_search_document_attribute column
 * @method     ChildSpySearchDocumentAttributeQuery orderByAttributeName($order = Criteria::ASC) Order by the attribute_name column
 * @method     ChildSpySearchDocumentAttributeQuery orderByAttributeType($order = Criteria::ASC) Order by the attribute_type column
 *
 * @method     ChildSpySearchDocumentAttributeQuery groupByIdSearchDocumentAttribute() Group by the id_search_document_attribute column
 * @method     ChildSpySearchDocumentAttributeQuery groupByAttributeName() Group by the attribute_name column
 * @method     ChildSpySearchDocumentAttributeQuery groupByAttributeType() Group by the attribute_type column
 *
 * @method     ChildSpySearchDocumentAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpySearchDocumentAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpySearchDocumentAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpySearchDocumentAttributeQuery leftJoinSpySearchPageElement($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySearchPageElement relation
 * @method     ChildSpySearchDocumentAttributeQuery rightJoinSpySearchPageElement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySearchPageElement relation
 * @method     ChildSpySearchDocumentAttributeQuery innerJoinSpySearchPageElement($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySearchPageElement relation
 *
 * @method     \Propel\SpySearchPageElementQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpySearchDocumentAttribute findOne(ConnectionInterface $con = null) Return the first ChildSpySearchDocumentAttribute matching the query
 * @method     ChildSpySearchDocumentAttribute findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpySearchDocumentAttribute matching the query, or a new ChildSpySearchDocumentAttribute object populated from the query conditions when no match is found
 *
 * @method     ChildSpySearchDocumentAttribute findOneByIdSearchDocumentAttribute(int $id_search_document_attribute) Return the first ChildSpySearchDocumentAttribute filtered by the id_search_document_attribute column
 * @method     ChildSpySearchDocumentAttribute findOneByAttributeName(string $attribute_name) Return the first ChildSpySearchDocumentAttribute filtered by the attribute_name column
 * @method     ChildSpySearchDocumentAttribute findOneByAttributeType(string $attribute_type) Return the first ChildSpySearchDocumentAttribute filtered by the attribute_type column *

 * @method     ChildSpySearchDocumentAttribute requirePk($key, ConnectionInterface $con = null) Return the ChildSpySearchDocumentAttribute by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchDocumentAttribute requireOne(ConnectionInterface $con = null) Return the first ChildSpySearchDocumentAttribute matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchDocumentAttribute requireOneByIdSearchDocumentAttribute(int $id_search_document_attribute) Return the first ChildSpySearchDocumentAttribute filtered by the id_search_document_attribute column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchDocumentAttribute requireOneByAttributeName(string $attribute_name) Return the first ChildSpySearchDocumentAttribute filtered by the attribute_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpySearchDocumentAttribute requireOneByAttributeType(string $attribute_type) Return the first ChildSpySearchDocumentAttribute filtered by the attribute_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpySearchDocumentAttribute[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpySearchDocumentAttribute objects based on current ModelCriteria
 * @method     ChildSpySearchDocumentAttribute[]|ObjectCollection findByIdSearchDocumentAttribute(int $id_search_document_attribute) Return ChildSpySearchDocumentAttribute objects filtered by the id_search_document_attribute column
 * @method     ChildSpySearchDocumentAttribute[]|ObjectCollection findByAttributeName(string $attribute_name) Return ChildSpySearchDocumentAttribute objects filtered by the attribute_name column
 * @method     ChildSpySearchDocumentAttribute[]|ObjectCollection findByAttributeType(string $attribute_type) Return ChildSpySearchDocumentAttribute objects filtered by the attribute_type column
 * @method     ChildSpySearchDocumentAttribute[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpySearchDocumentAttributeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpySearchDocumentAttributeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpySearchDocumentAttribute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpySearchDocumentAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpySearchDocumentAttributeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpySearchDocumentAttributeQuery) {
            return $criteria;
        }
        $query = new ChildSpySearchDocumentAttributeQuery();
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
     * @return ChildSpySearchDocumentAttribute|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpySearchDocumentAttributeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
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
     * @return ChildSpySearchDocumentAttribute A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_search_document_attribute, attribute_name, attribute_type FROM spy_search_document_attribute WHERE id_search_document_attribute = :p0';
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
            /** @var ChildSpySearchDocumentAttribute $obj */
            $obj = new ChildSpySearchDocumentAttribute();
            $obj->hydrate($row);
            SpySearchDocumentAttributeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpySearchDocumentAttribute|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_search_document_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSearchDocumentAttribute(1234); // WHERE id_search_document_attribute = 1234
     * $query->filterByIdSearchDocumentAttribute(array(12, 34)); // WHERE id_search_document_attribute IN (12, 34)
     * $query->filterByIdSearchDocumentAttribute(array('min' => 12)); // WHERE id_search_document_attribute > 12
     * </code>
     *
     * @param     mixed $idSearchDocumentAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterByIdSearchDocumentAttribute($idSearchDocumentAttribute = null, $comparison = null)
    {
        if (is_array($idSearchDocumentAttribute)) {
            $useMinMax = false;
            if (isset($idSearchDocumentAttribute['min'])) {
                $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $idSearchDocumentAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSearchDocumentAttribute['max'])) {
                $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $idSearchDocumentAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $idSearchDocumentAttribute, $comparison);
    }

    /**
     * Filter the query on the attribute_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributeName('fooValue');   // WHERE attribute_name = 'fooValue'
     * $query->filterByAttributeName('%fooValue%'); // WHERE attribute_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterByAttributeName($attributeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attributeName)) {
                $attributeName = str_replace('*', '%', $attributeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_NAME, $attributeName, $comparison);
    }

    /**
     * Filter the query on the attribute_type column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributeType('fooValue');   // WHERE attribute_type = 'fooValue'
     * $query->filterByAttributeType('%fooValue%'); // WHERE attribute_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributeType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterByAttributeType($attributeType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributeType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attributeType)) {
                $attributeType = str_replace('*', '%', $attributeType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ATTRIBUTE_TYPE, $attributeType, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpySearchPageElement object
     *
     * @param \Propel\SpySearchPageElement|ObjectCollection $spySearchPageElement the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function filterBySpySearchPageElement($spySearchPageElement, $comparison = null)
    {
        if ($spySearchPageElement instanceof \Propel\SpySearchPageElement) {
            return $this
                ->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $spySearchPageElement->getFkSearchDocumentAttribute(), $comparison);
        } elseif ($spySearchPageElement instanceof ObjectCollection) {
            return $this
                ->useSpySearchPageElementQuery()
                ->filterByPrimaryKeys($spySearchPageElement->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySearchPageElement() only accepts arguments of type \Propel\SpySearchPageElement or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySearchPageElement relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function joinSpySearchPageElement($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySearchPageElement');

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
            $this->addJoinObject($join, 'SpySearchPageElement');
        }

        return $this;
    }

    /**
     * Use the SpySearchPageElement relation SpySearchPageElement object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySearchPageElementQuery A secondary query class using the current class as primary query
     */
    public function useSpySearchPageElementQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpySearchPageElement($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySearchPageElement', '\Propel\SpySearchPageElementQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpySearchDocumentAttribute $spySearchDocumentAttribute Object to remove from the list of results
     *
     * @return $this|ChildSpySearchDocumentAttributeQuery The current query, for fluid interface
     */
    public function prune($spySearchDocumentAttribute = null)
    {
        if ($spySearchDocumentAttribute) {
            $this->addUsingAlias(SpySearchDocumentAttributeTableMap::COL_ID_SEARCH_DOCUMENT_ATTRIBUTE, $spySearchDocumentAttribute->getIdSearchDocumentAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_search_document_attribute table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpySearchDocumentAttributeTableMap::clearInstancePool();
            SpySearchDocumentAttributeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySearchDocumentAttributeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpySearchDocumentAttributeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpySearchDocumentAttributeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpySearchDocumentAttributeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpySearchDocumentAttributeQuery
