<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyWishlist as ChildSpyWishlist;
use Propel\SpyWishlistQuery as ChildSpyWishlistQuery;
use Propel\Map\SpyWishlistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_wishlist' table.
 *
 *
 *
 * @method     ChildSpyWishlistQuery orderByIdWishlist($order = Criteria::ASC) Order by the id_wishlist column
 * @method     ChildSpyWishlistQuery orderByFkCustomer($order = Criteria::ASC) Order by the fk_customer column
 *
 * @method     ChildSpyWishlistQuery groupByIdWishlist() Group by the id_wishlist column
 * @method     ChildSpyWishlistQuery groupByFkCustomer() Group by the fk_customer column
 *
 * @method     ChildSpyWishlistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyWishlistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyWishlistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyWishlistQuery leftJoinSpyCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCustomer relation
 * @method     ChildSpyWishlistQuery rightJoinSpyCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCustomer relation
 * @method     ChildSpyWishlistQuery innerJoinSpyCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCustomer relation
 *
 * @method     ChildSpyWishlistQuery leftJoinSpyWishlistItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyWishlistQuery rightJoinSpyWishlistItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyWishlistItem relation
 * @method     ChildSpyWishlistQuery innerJoinSpyWishlistItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyWishlistItem relation
 *
 * @method     \Propel\SpyCustomerQuery|\Propel\SpyWishlistItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyWishlist findOne(ConnectionInterface $con = null) Return the first ChildSpyWishlist matching the query
 * @method     ChildSpyWishlist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyWishlist matching the query, or a new ChildSpyWishlist object populated from the query conditions when no match is found
 *
 * @method     ChildSpyWishlist findOneByIdWishlist(int $id_wishlist) Return the first ChildSpyWishlist filtered by the id_wishlist column
 * @method     ChildSpyWishlist findOneByFkCustomer(int $fk_customer) Return the first ChildSpyWishlist filtered by the fk_customer column *

 * @method     ChildSpyWishlist requirePk($key, ConnectionInterface $con = null) Return the ChildSpyWishlist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlist requireOne(ConnectionInterface $con = null) Return the first ChildSpyWishlist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyWishlist requireOneByIdWishlist(int $id_wishlist) Return the first ChildSpyWishlist filtered by the id_wishlist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyWishlist requireOneByFkCustomer(int $fk_customer) Return the first ChildSpyWishlist filtered by the fk_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyWishlist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyWishlist objects based on current ModelCriteria
 * @method     ChildSpyWishlist[]|ObjectCollection findByIdWishlist(int $id_wishlist) Return ChildSpyWishlist objects filtered by the id_wishlist column
 * @method     ChildSpyWishlist[]|ObjectCollection findByFkCustomer(int $fk_customer) Return ChildSpyWishlist objects filtered by the fk_customer column
 * @method     ChildSpyWishlist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyWishlistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyWishlistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyWishlist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyWishlistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyWishlistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyWishlistQuery) {
            return $criteria;
        }
        $query = new ChildSpyWishlistQuery();
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
     * @return ChildSpyWishlist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyWishlistTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyWishlistTableMap::DATABASE_NAME);
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
     * @return ChildSpyWishlist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_wishlist, fk_customer FROM spy_wishlist WHERE id_wishlist = :p0';
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
            /** @var ChildSpyWishlist $obj */
            $obj = new ChildSpyWishlist();
            $obj->hydrate($row);
            SpyWishlistTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyWishlist|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_wishlist column
     *
     * Example usage:
     * <code>
     * $query->filterByIdWishlist(1234); // WHERE id_wishlist = 1234
     * $query->filterByIdWishlist(array(12, 34)); // WHERE id_wishlist IN (12, 34)
     * $query->filterByIdWishlist(array('min' => 12)); // WHERE id_wishlist > 12
     * </code>
     *
     * @param     mixed $idWishlist The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterByIdWishlist($idWishlist = null, $comparison = null)
    {
        if (is_array($idWishlist)) {
            $useMinMax = false;
            if (isset($idWishlist['min'])) {
                $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $idWishlist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idWishlist['max'])) {
                $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $idWishlist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $idWishlist, $comparison);
    }

    /**
     * Filter the query on the fk_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCustomer(1234); // WHERE fk_customer = 1234
     * $query->filterByFkCustomer(array(12, 34)); // WHERE fk_customer IN (12, 34)
     * $query->filterByFkCustomer(array('min' => 12)); // WHERE fk_customer > 12
     * </code>
     *
     * @see       filterBySpyCustomer()
     *
     * @param     mixed $fkCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterByFkCustomer($fkCustomer = null, $comparison = null)
    {
        if (is_array($fkCustomer)) {
            $useMinMax = false;
            if (isset($fkCustomer['min'])) {
                $this->addUsingAlias(SpyWishlistTableMap::COL_FK_CUSTOMER, $fkCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCustomer['max'])) {
                $this->addUsingAlias(SpyWishlistTableMap::COL_FK_CUSTOMER, $fkCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyWishlistTableMap::COL_FK_CUSTOMER, $fkCustomer, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCustomer object
     *
     * @param \Propel\SpyCustomer|ObjectCollection $spyCustomer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterBySpyCustomer($spyCustomer, $comparison = null)
    {
        if ($spyCustomer instanceof \Propel\SpyCustomer) {
            return $this
                ->addUsingAlias(SpyWishlistTableMap::COL_FK_CUSTOMER, $spyCustomer->getIdCustomer(), $comparison);
        } elseif ($spyCustomer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyWishlistTableMap::COL_FK_CUSTOMER, $spyCustomer->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterBySpyCustomer() only accepts arguments of type \Propel\SpyCustomer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCustomer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function joinSpyCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCustomer');

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
            $this->addJoinObject($join, 'SpyCustomer');
        }

        return $this;
    }

    /**
     * Use the SpyCustomer relation SpyCustomer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCustomerQuery A secondary query class using the current class as primary query
     */
    public function useSpyCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCustomer', '\Propel\SpyCustomerQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyWishlistItem object
     *
     * @param \Propel\SpyWishlistItem|ObjectCollection $spyWishlistItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function filterBySpyWishlistItem($spyWishlistItem, $comparison = null)
    {
        if ($spyWishlistItem instanceof \Propel\SpyWishlistItem) {
            return $this
                ->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $spyWishlistItem->getFkWishlist(), $comparison);
        } elseif ($spyWishlistItem instanceof ObjectCollection) {
            return $this
                ->useSpyWishlistItemQuery()
                ->filterByPrimaryKeys($spyWishlistItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyWishlistItem() only accepts arguments of type \Propel\SpyWishlistItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyWishlistItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function joinSpyWishlistItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyWishlistItem');

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
            $this->addJoinObject($join, 'SpyWishlistItem');
        }

        return $this;
    }

    /**
     * Use the SpyWishlistItem relation SpyWishlistItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyWishlistItemQuery A secondary query class using the current class as primary query
     */
    public function useSpyWishlistItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyWishlistItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyWishlistItem', '\Propel\SpyWishlistItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyWishlist $spyWishlist Object to remove from the list of results
     *
     * @return $this|ChildSpyWishlistQuery The current query, for fluid interface
     */
    public function prune($spyWishlist = null)
    {
        if ($spyWishlist) {
            $this->addUsingAlias(SpyWishlistTableMap::COL_ID_WISHLIST, $spyWishlist->getIdWishlist(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_wishlist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyWishlistTableMap::clearInstancePool();
            SpyWishlistTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyWishlistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyWishlistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyWishlistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyWishlistQuery
