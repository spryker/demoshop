<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductCategory as ChildSpyProductCategory;
use Propel\SpyProductCategoryQuery as ChildSpyProductCategoryQuery;
use Propel\Map\SpyProductCategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_category' table.
 *
 *
 *
 * @method     ChildSpyProductCategoryQuery orderByIdProductCategory($order = Criteria::ASC) Order by the id_product_category column
 * @method     ChildSpyProductCategoryQuery orderByFkAbstractProduct($order = Criteria::ASC) Order by the fk_abstract_product column
 * @method     ChildSpyProductCategoryQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 *
 * @method     ChildSpyProductCategoryQuery groupByIdProductCategory() Group by the id_product_category column
 * @method     ChildSpyProductCategoryQuery groupByFkAbstractProduct() Group by the fk_abstract_product column
 * @method     ChildSpyProductCategoryQuery groupByFkCategory() Group by the fk_category column
 *
 * @method     ChildSpyProductCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductCategoryQuery leftJoinSpyCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCategory relation
 * @method     ChildSpyProductCategoryQuery rightJoinSpyCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCategory relation
 * @method     ChildSpyProductCategoryQuery innerJoinSpyCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCategory relation
 *
 * @method     ChildSpyProductCategoryQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyProductCategoryQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyProductCategoryQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     \Propel\SpyCategoryQuery|\Propel\SpyAbstractProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductCategory findOne(ConnectionInterface $con = null) Return the first ChildSpyProductCategory matching the query
 * @method     ChildSpyProductCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductCategory matching the query, or a new ChildSpyProductCategory object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductCategory findOneByIdProductCategory(int $id_product_category) Return the first ChildSpyProductCategory filtered by the id_product_category column
 * @method     ChildSpyProductCategory findOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyProductCategory filtered by the fk_abstract_product column
 * @method     ChildSpyProductCategory findOneByFkCategory(int $fk_category) Return the first ChildSpyProductCategory filtered by the fk_category column *

 * @method     ChildSpyProductCategory requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductCategory requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductCategory requireOneByIdProductCategory(int $id_product_category) Return the first ChildSpyProductCategory filtered by the id_product_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductCategory requireOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyProductCategory filtered by the fk_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductCategory requireOneByFkCategory(int $fk_category) Return the first ChildSpyProductCategory filtered by the fk_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductCategory objects based on current ModelCriteria
 * @method     ChildSpyProductCategory[]|ObjectCollection findByIdProductCategory(int $id_product_category) Return ChildSpyProductCategory objects filtered by the id_product_category column
 * @method     ChildSpyProductCategory[]|ObjectCollection findByFkAbstractProduct(int $fk_abstract_product) Return ChildSpyProductCategory objects filtered by the fk_abstract_product column
 * @method     ChildSpyProductCategory[]|ObjectCollection findByFkCategory(int $fk_category) Return ChildSpyProductCategory objects filtered by the fk_category column
 * @method     ChildSpyProductCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductCategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductCategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductCategoryQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductCategoryQuery();
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
     * @return ChildSpyProductCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductCategoryTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductCategoryTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product_category, fk_abstract_product, fk_category FROM spy_product_category WHERE id_product_category = :p0';
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
            /** @var ChildSpyProductCategory $obj */
            $obj = new ChildSpyProductCategory();
            $obj->hydrate($row);
            SpyProductCategoryTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProductCategory(1234); // WHERE id_product_category = 1234
     * $query->filterByIdProductCategory(array(12, 34)); // WHERE id_product_category IN (12, 34)
     * $query->filterByIdProductCategory(array('min' => 12)); // WHERE id_product_category > 12
     * </code>
     *
     * @param     mixed $idProductCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterByIdProductCategory($idProductCategory = null, $comparison = null)
    {
        if (is_array($idProductCategory)) {
            $useMinMax = false;
            if (isset($idProductCategory['min'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $idProductCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProductCategory['max'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $idProductCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $idProductCategory, $comparison);
    }

    /**
     * Filter the query on the fk_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAbstractProduct(1234); // WHERE fk_abstract_product = 1234
     * $query->filterByFkAbstractProduct(array(12, 34)); // WHERE fk_abstract_product IN (12, 34)
     * $query->filterByFkAbstractProduct(array('min' => 12)); // WHERE fk_abstract_product > 12
     * </code>
     *
     * @see       filterBySpyAbstractProduct()
     *
     * @param     mixed $fkAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkAbstractProduct($fkAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkAbstractProduct['min'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAbstractProduct['max'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct, $comparison);
    }

    /**
     * Filter the query on the fk_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategory(1234); // WHERE fk_category = 1234
     * $query->filterByFkCategory(array(12, 34)); // WHERE fk_category IN (12, 34)
     * $query->filterByFkCategory(array('min' => 12)); // WHERE fk_category > 12
     * </code>
     *
     * @see       filterBySpyCategory()
     *
     * @param     mixed $fkCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductCategoryTableMap::COL_FK_CATEGORY, $fkCategory, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategory object
     *
     * @param \Propel\SpyCategory|ObjectCollection $spyCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterBySpyCategory($spyCategory, $comparison = null)
    {
        if ($spyCategory instanceof \Propel\SpyCategory) {
            return $this
                ->addUsingAlias(SpyProductCategoryTableMap::COL_FK_CATEGORY, $spyCategory->getIdCategory(), $comparison);
        } elseif ($spyCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductCategoryTableMap::COL_FK_CATEGORY, $spyCategory->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterBySpyCategory() only accepts arguments of type \Propel\SpyCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function joinSpyCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCategory');

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
            $this->addJoinObject($join, 'SpyCategory');
        }

        return $this;
    }

    /**
     * Use the SpyCategory relation SpyCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryQuery A secondary query class using the current class as primary query
     */
    public function useSpyCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCategory', '\Propel\SpyCategoryQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyAbstractProduct() only accepts arguments of type \Propel\SpyAbstractProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAbstractProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function joinSpyAbstractProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAbstractProduct');

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
            $this->addJoinObject($join, 'SpyAbstractProduct');
        }

        return $this;
    }

    /**
     * Use the SpyAbstractProduct relation SpyAbstractProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyAbstractProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAbstractProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductCategory $spyProductCategory Object to remove from the list of results
     *
     * @return $this|ChildSpyProductCategoryQuery The current query, for fluid interface
     */
    public function prune($spyProductCategory = null)
    {
        if ($spyProductCategory) {
            $this->addUsingAlias(SpyProductCategoryTableMap::COL_ID_PRODUCT_CATEGORY, $spyProductCategory->getIdProductCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductCategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductCategoryTableMap::clearInstancePool();
            SpyProductCategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductCategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductCategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductCategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductCategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyProductCategoryQuery
