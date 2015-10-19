<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCmsBlock as ChildSpyCmsBlock;
use Propel\SpyCmsBlockQuery as ChildSpyCmsBlockQuery;
use Propel\Map\SpyCmsBlockTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_cms_block' table.
 *
 *
 *
 * @method     ChildSpyCmsBlockQuery orderByIdCmsBlock($order = Criteria::ASC) Order by the id_cms_block column
 * @method     ChildSpyCmsBlockQuery orderByFkPage($order = Criteria::ASC) Order by the fk_page column
 * @method     ChildSpyCmsBlockQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyCmsBlockQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSpyCmsBlockQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildSpyCmsBlockQuery groupByIdCmsBlock() Group by the id_cms_block column
 * @method     ChildSpyCmsBlockQuery groupByFkPage() Group by the fk_page column
 * @method     ChildSpyCmsBlockQuery groupByName() Group by the name column
 * @method     ChildSpyCmsBlockQuery groupByType() Group by the type column
 * @method     ChildSpyCmsBlockQuery groupByValue() Group by the value column
 *
 * @method     ChildSpyCmsBlockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCmsBlockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCmsBlockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCmsBlockQuery leftJoinSpyCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCmsPage relation
 * @method     ChildSpyCmsBlockQuery rightJoinSpyCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCmsPage relation
 * @method     ChildSpyCmsBlockQuery innerJoinSpyCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCmsPage relation
 *
 * @method     \Propel\SpyCmsPageQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCmsBlock findOne(ConnectionInterface $con = null) Return the first ChildSpyCmsBlock matching the query
 * @method     ChildSpyCmsBlock findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCmsBlock matching the query, or a new ChildSpyCmsBlock object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCmsBlock findOneByIdCmsBlock(int $id_cms_block) Return the first ChildSpyCmsBlock filtered by the id_cms_block column
 * @method     ChildSpyCmsBlock findOneByFkPage(int $fk_page) Return the first ChildSpyCmsBlock filtered by the fk_page column
 * @method     ChildSpyCmsBlock findOneByName(string $name) Return the first ChildSpyCmsBlock filtered by the name column
 * @method     ChildSpyCmsBlock findOneByType(string $type) Return the first ChildSpyCmsBlock filtered by the type column
 * @method     ChildSpyCmsBlock findOneByValue(int $value) Return the first ChildSpyCmsBlock filtered by the value column *

 * @method     ChildSpyCmsBlock requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCmsBlock by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsBlock requireOne(ConnectionInterface $con = null) Return the first ChildSpyCmsBlock matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsBlock requireOneByIdCmsBlock(int $id_cms_block) Return the first ChildSpyCmsBlock filtered by the id_cms_block column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsBlock requireOneByFkPage(int $fk_page) Return the first ChildSpyCmsBlock filtered by the fk_page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsBlock requireOneByName(string $name) Return the first ChildSpyCmsBlock filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsBlock requireOneByType(string $type) Return the first ChildSpyCmsBlock filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCmsBlock requireOneByValue(int $value) Return the first ChildSpyCmsBlock filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCmsBlock[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCmsBlock objects based on current ModelCriteria
 * @method     ChildSpyCmsBlock[]|ObjectCollection findByIdCmsBlock(int $id_cms_block) Return ChildSpyCmsBlock objects filtered by the id_cms_block column
 * @method     ChildSpyCmsBlock[]|ObjectCollection findByFkPage(int $fk_page) Return ChildSpyCmsBlock objects filtered by the fk_page column
 * @method     ChildSpyCmsBlock[]|ObjectCollection findByName(string $name) Return ChildSpyCmsBlock objects filtered by the name column
 * @method     ChildSpyCmsBlock[]|ObjectCollection findByType(string $type) Return ChildSpyCmsBlock objects filtered by the type column
 * @method     ChildSpyCmsBlock[]|ObjectCollection findByValue(int $value) Return ChildSpyCmsBlock objects filtered by the value column
 * @method     ChildSpyCmsBlock[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCmsBlockQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCmsBlockQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCmsBlock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCmsBlockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCmsBlockQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCmsBlockQuery) {
            return $criteria;
        }
        $query = new ChildSpyCmsBlockQuery();
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
     * @return ChildSpyCmsBlock|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCmsBlockTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCmsBlockTableMap::DATABASE_NAME);
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
     * @return ChildSpyCmsBlock A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_cms_block, fk_page, name, type, value FROM spy_cms_block WHERE id_cms_block = :p0';
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
            /** @var ChildSpyCmsBlock $obj */
            $obj = new ChildSpyCmsBlock();
            $obj->hydrate($row);
            SpyCmsBlockTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCmsBlock|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_block column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsBlock(1234); // WHERE id_cms_block = 1234
     * $query->filterByIdCmsBlock(array(12, 34)); // WHERE id_cms_block IN (12, 34)
     * $query->filterByIdCmsBlock(array('min' => 12)); // WHERE id_cms_block > 12
     * </code>
     *
     * @param     mixed $idCmsBlock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByIdCmsBlock($idCmsBlock = null, $comparison = null)
    {
        if (is_array($idCmsBlock)) {
            $useMinMax = false;
            if (isset($idCmsBlock['min'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $idCmsBlock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsBlock['max'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $idCmsBlock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $idCmsBlock, $comparison);
    }

    /**
     * Filter the query on the fk_page column
     *
     * Example usage:
     * <code>
     * $query->filterByFkPage(1234); // WHERE fk_page = 1234
     * $query->filterByFkPage(array(12, 34)); // WHERE fk_page IN (12, 34)
     * $query->filterByFkPage(array('min' => 12)); // WHERE fk_page > 12
     * </code>
     *
     * @see       filterBySpyCmsPage()
     *
     * @param     mixed $fkPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByFkPage($fkPage = null, $comparison = null)
    {
        if (is_array($fkPage)) {
            $useMinMax = false;
            if (isset($fkPage['min'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_FK_PAGE, $fkPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkPage['max'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_FK_PAGE, $fkPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_FK_PAGE, $fkPage, $comparison);
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
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(SpyCmsBlockTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCmsBlockTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCmsPage object
     *
     * @param \Propel\SpyCmsPage|ObjectCollection $spyCmsPage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function filterBySpyCmsPage($spyCmsPage, $comparison = null)
    {
        if ($spyCmsPage instanceof \Propel\SpyCmsPage) {
            return $this
                ->addUsingAlias(SpyCmsBlockTableMap::COL_FK_PAGE, $spyCmsPage->getIdCmsPage(), $comparison);
        } elseif ($spyCmsPage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCmsBlockTableMap::COL_FK_PAGE, $spyCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
        } else {
            throw new PropelException('filterBySpyCmsPage() only accepts arguments of type \Propel\SpyCmsPage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCmsPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function joinSpyCmsPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCmsPage');

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
            $this->addJoinObject($join, 'SpyCmsPage');
        }

        return $this;
    }

    /**
     * Use the SpyCmsPage relation SpyCmsPage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsPageQuery A secondary query class using the current class as primary query
     */
    public function useSpyCmsPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCmsPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCmsPage', '\Propel\SpyCmsPageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCmsBlock $spyCmsBlock Object to remove from the list of results
     *
     * @return $this|ChildSpyCmsBlockQuery The current query, for fluid interface
     */
    public function prune($spyCmsBlock = null)
    {
        if ($spyCmsBlock) {
            $this->addUsingAlias(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, $spyCmsBlock->getIdCmsBlock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_cms_block table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsBlockTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCmsBlockTableMap::clearInstancePool();
            SpyCmsBlockTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsBlockTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCmsBlockTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCmsBlockTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCmsBlockTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyCmsBlockQuery
