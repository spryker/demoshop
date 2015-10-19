<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductToBundle as ChildSpyProductToBundle;
use Propel\SpyProductToBundleQuery as ChildSpyProductToBundleQuery;
use Propel\Map\SpyProductToBundleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_to_bundle' table.
 *
 *
 *
 * @method     ChildSpyProductToBundleQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpyProductToBundleQuery orderByFkRelatedProduct($order = Criteria::ASC) Order by the fk_related_product column
 *
 * @method     ChildSpyProductToBundleQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpyProductToBundleQuery groupByFkRelatedProduct() Group by the fk_related_product column
 *
 * @method     ChildSpyProductToBundleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductToBundleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductToBundleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductToBundleQuery leftJoinSpyProductRelatedByFkProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductRelatedByFkProduct relation
 * @method     ChildSpyProductToBundleQuery rightJoinSpyProductRelatedByFkProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductRelatedByFkProduct relation
 * @method     ChildSpyProductToBundleQuery innerJoinSpyProductRelatedByFkProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductRelatedByFkProduct relation
 *
 * @method     ChildSpyProductToBundleQuery leftJoinBundleProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the BundleProduct relation
 * @method     ChildSpyProductToBundleQuery rightJoinBundleProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BundleProduct relation
 * @method     ChildSpyProductToBundleQuery innerJoinBundleProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the BundleProduct relation
 *
 * @method     \Propel\SpyProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductToBundle findOne(ConnectionInterface $con = null) Return the first ChildSpyProductToBundle matching the query
 * @method     ChildSpyProductToBundle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductToBundle matching the query, or a new ChildSpyProductToBundle object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductToBundle findOneByFkProduct(int $fk_product) Return the first ChildSpyProductToBundle filtered by the fk_product column
 * @method     ChildSpyProductToBundle findOneByFkRelatedProduct(int $fk_related_product) Return the first ChildSpyProductToBundle filtered by the fk_related_product column *

 * @method     ChildSpyProductToBundle requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductToBundle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductToBundle requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductToBundle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductToBundle requireOneByFkProduct(int $fk_product) Return the first ChildSpyProductToBundle filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductToBundle requireOneByFkRelatedProduct(int $fk_related_product) Return the first ChildSpyProductToBundle filtered by the fk_related_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductToBundle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductToBundle objects based on current ModelCriteria
 * @method     ChildSpyProductToBundle[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyProductToBundle objects filtered by the fk_product column
 * @method     ChildSpyProductToBundle[]|ObjectCollection findByFkRelatedProduct(int $fk_related_product) Return ChildSpyProductToBundle objects filtered by the fk_related_product column
 * @method     ChildSpyProductToBundle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductToBundleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductToBundleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductToBundle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductToBundleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductToBundleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductToBundleQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductToBundleQuery();
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
     * @param array[$fk_product, $fk_related_product] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyProductToBundle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductToBundleTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductToBundleTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductToBundle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `fk_product`, `fk_related_product` FROM `spy_product_to_bundle` WHERE `fk_product` = :p0 AND `fk_related_product` = :p1';
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
            /** @var ChildSpyProductToBundle $obj */
            $obj = new ChildSpyProductToBundle();
            $obj->hydrate($row);
            SpyProductToBundleTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyProductToBundle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyProductToBundleTableMap::COL_FK_PRODUCT, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterBySpyProductRelatedByFkProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_related_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkRelatedProduct(1234); // WHERE fk_related_product = 1234
     * $query->filterByFkRelatedProduct(array(12, 34)); // WHERE fk_related_product IN (12, 34)
     * $query->filterByFkRelatedProduct(array('min' => 12)); // WHERE fk_related_product > 12
     * </code>
     *
     * @see       filterByBundleProduct()
     *
     * @param     mixed $fkRelatedProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterByFkRelatedProduct($fkRelatedProduct = null, $comparison = null)
    {
        if (is_array($fkRelatedProduct)) {
            $useMinMax = false;
            if (isset($fkRelatedProduct['min'])) {
                $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $fkRelatedProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkRelatedProduct['max'])) {
                $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $fkRelatedProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $fkRelatedProduct, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterBySpyProductRelatedByFkProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductToBundleTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductRelatedByFkProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductRelatedByFkProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function joinSpyProductRelatedByFkProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductRelatedByFkProduct');

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
            $this->addJoinObject($join, 'SpyProductRelatedByFkProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProductRelatedByFkProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductRelatedByFkProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductRelatedByFkProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductRelatedByFkProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function filterByBundleProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterByBundleProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BundleProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function joinBundleProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BundleProduct');

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
            $this->addJoinObject($join, 'BundleProduct');
        }

        return $this;
    }

    /**
     * Use the BundleProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useBundleProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBundleProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BundleProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductToBundle $spyProductToBundle Object to remove from the list of results
     *
     * @return $this|ChildSpyProductToBundleQuery The current query, for fluid interface
     */
    public function prune($spyProductToBundle = null)
    {
        if ($spyProductToBundle) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyProductToBundleTableMap::COL_FK_PRODUCT), $spyProductToBundle->getFkProduct(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT), $spyProductToBundle->getFkRelatedProduct(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_to_bundle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductToBundleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductToBundleTableMap::clearInstancePool();
            SpyProductToBundleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductToBundleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductToBundleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductToBundleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductToBundleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyProductToBundleQuery
