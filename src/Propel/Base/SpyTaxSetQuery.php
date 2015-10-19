<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyTaxSet as ChildSpyTaxSet;
use Propel\SpyTaxSetQuery as ChildSpyTaxSetQuery;
use Propel\Map\SpyTaxSetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_tax_set' table.
 *
 *
 *
 * @method     ChildSpyTaxSetQuery orderByIdTaxSet($order = Criteria::ASC) Order by the id_tax_set column
 * @method     ChildSpyTaxSetQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     ChildSpyTaxSetQuery groupByIdTaxSet() Group by the id_tax_set column
 * @method     ChildSpyTaxSetQuery groupByName() Group by the name column
 *
 * @method     ChildSpyTaxSetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyTaxSetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyTaxSetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyTaxSetQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyTaxSetQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyTaxSetQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     ChildSpyTaxSetQuery leftJoinSpyProductOptionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyTaxSetQuery rightJoinSpyProductOptionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionType relation
 * @method     ChildSpyTaxSetQuery innerJoinSpyProductOptionType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionType relation
 *
 * @method     ChildSpyTaxSetQuery leftJoinShipmentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyTaxSetQuery rightJoinShipmentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentMethods relation
 * @method     ChildSpyTaxSetQuery innerJoinShipmentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentMethods relation
 *
 * @method     ChildSpyTaxSetQuery leftJoinSpyTaxSetTax($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTaxSetTax relation
 * @method     ChildSpyTaxSetQuery rightJoinSpyTaxSetTax($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTaxSetTax relation
 * @method     ChildSpyTaxSetQuery innerJoinSpyTaxSetTax($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTaxSetTax relation
 *
 * @method     \Propel\SpyAbstractProductQuery|\Propel\SpyProductOptionTypeQuery|\Propel\SpyShipmentMethodQuery|\Propel\SpyTaxSetTaxQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyTaxSet findOne(ConnectionInterface $con = null) Return the first ChildSpyTaxSet matching the query
 * @method     ChildSpyTaxSet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyTaxSet matching the query, or a new ChildSpyTaxSet object populated from the query conditions when no match is found
 *
 * @method     ChildSpyTaxSet findOneByIdTaxSet(int $id_tax_set) Return the first ChildSpyTaxSet filtered by the id_tax_set column
 * @method     ChildSpyTaxSet findOneByName(string $name) Return the first ChildSpyTaxSet filtered by the name column *

 * @method     ChildSpyTaxSet requirePk($key, ConnectionInterface $con = null) Return the ChildSpyTaxSet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxSet requireOne(ConnectionInterface $con = null) Return the first ChildSpyTaxSet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxSet requireOneByIdTaxSet(int $id_tax_set) Return the first ChildSpyTaxSet filtered by the id_tax_set column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyTaxSet requireOneByName(string $name) Return the first ChildSpyTaxSet filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyTaxSet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyTaxSet objects based on current ModelCriteria
 * @method     ChildSpyTaxSet[]|ObjectCollection findByIdTaxSet(int $id_tax_set) Return ChildSpyTaxSet objects filtered by the id_tax_set column
 * @method     ChildSpyTaxSet[]|ObjectCollection findByName(string $name) Return ChildSpyTaxSet objects filtered by the name column
 * @method     ChildSpyTaxSet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyTaxSetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyTaxSetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyTaxSet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyTaxSetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyTaxSetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyTaxSetQuery) {
            return $criteria;
        }
        $query = new ChildSpyTaxSetQuery();
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
     * @return ChildSpyTaxSet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyTaxSetTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyTaxSetTableMap::DATABASE_NAME);
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
     * @return ChildSpyTaxSet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_tax_set, name FROM spy_tax_set WHERE id_tax_set = :p0';
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
            /** @var ChildSpyTaxSet $obj */
            $obj = new ChildSpyTaxSet();
            $obj->hydrate($row);
            SpyTaxSetTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyTaxSet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tax_set column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTaxSet(1234); // WHERE id_tax_set = 1234
     * $query->filterByIdTaxSet(array(12, 34)); // WHERE id_tax_set IN (12, 34)
     * $query->filterByIdTaxSet(array('min' => 12)); // WHERE id_tax_set > 12
     * </code>
     *
     * @param     mixed $idTaxSet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterByIdTaxSet($idTaxSet = null, $comparison = null)
    {
        if (is_array($idTaxSet)) {
            $useMinMax = false;
            if (isset($idTaxSet['min'])) {
                $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $idTaxSet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTaxSet['max'])) {
                $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $idTaxSet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $idTaxSet, $comparison);
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
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyTaxSetTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $spyAbstractProduct->getFkTaxSet(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            return $this
                ->useSpyAbstractProductQuery()
                ->filterByPrimaryKeys($spyAbstractProduct->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function joinSpyAbstractProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSpyAbstractProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAbstractProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionType object
     *
     * @param \Propel\SpyProductOptionType|ObjectCollection $spyProductOptionType the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionType($spyProductOptionType, $comparison = null)
    {
        if ($spyProductOptionType instanceof \Propel\SpyProductOptionType) {
            return $this
                ->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $spyProductOptionType->getFkTaxSet(), $comparison);
        } elseif ($spyProductOptionType instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeQuery()
                ->filterByPrimaryKeys($spyProductOptionType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionType() only accepts arguments of type \Propel\SpyProductOptionType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionType');

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
            $this->addJoinObject($join, 'SpyProductOptionType');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionType relation SpyProductOptionType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductOptionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionType', '\Propel\SpyProductOptionTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyShipmentMethod object
     *
     * @param \Propel\SpyShipmentMethod|ObjectCollection $spyShipmentMethod the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterByShipmentMethods($spyShipmentMethod, $comparison = null)
    {
        if ($spyShipmentMethod instanceof \Propel\SpyShipmentMethod) {
            return $this
                ->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $spyShipmentMethod->getFkTaxSet(), $comparison);
        } elseif ($spyShipmentMethod instanceof ObjectCollection) {
            return $this
                ->useShipmentMethodsQuery()
                ->filterByPrimaryKeys($spyShipmentMethod->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipmentMethods() only accepts arguments of type \Propel\SpyShipmentMethod or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipmentMethods relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function joinShipmentMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipmentMethods');

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
            $this->addJoinObject($join, 'ShipmentMethods');
        }

        return $this;
    }

    /**
     * Use the ShipmentMethods relation SpyShipmentMethod object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyShipmentMethodQuery A secondary query class using the current class as primary query
     */
    public function useShipmentMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShipmentMethods($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipmentMethods', '\Propel\SpyShipmentMethodQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTaxSetTax object
     *
     * @param \Propel\SpyTaxSetTax|ObjectCollection $spyTaxSetTax the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterBySpyTaxSetTax($spyTaxSetTax, $comparison = null)
    {
        if ($spyTaxSetTax instanceof \Propel\SpyTaxSetTax) {
            return $this
                ->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $spyTaxSetTax->getFkTaxSet(), $comparison);
        } elseif ($spyTaxSetTax instanceof ObjectCollection) {
            return $this
                ->useSpyTaxSetTaxQuery()
                ->filterByPrimaryKeys($spyTaxSetTax->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyTaxSetTax() only accepts arguments of type \Propel\SpyTaxSetTax or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTaxSetTax relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function joinSpyTaxSetTax($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTaxSetTax');

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
            $this->addJoinObject($join, 'SpyTaxSetTax');
        }

        return $this;
    }

    /**
     * Use the SpyTaxSetTax relation SpyTaxSetTax object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTaxSetTaxQuery A secondary query class using the current class as primary query
     */
    public function useSpyTaxSetTaxQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyTaxSetTax($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTaxSetTax', '\Propel\SpyTaxSetTaxQuery');
    }

    /**
     * Filter the query by a related SpyTaxRate object
     * using the spy_tax_set_tax table as cross reference
     *
     * @param SpyTaxRate $spyTaxRate the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function filterBySpyTaxRate($spyTaxRate, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useSpyTaxSetTaxQuery()
            ->filterBySpyTaxRate($spyTaxRate, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyTaxSet $spyTaxSet Object to remove from the list of results
     *
     * @return $this|ChildSpyTaxSetQuery The current query, for fluid interface
     */
    public function prune($spyTaxSet = null)
    {
        if ($spyTaxSet) {
            $this->addUsingAlias(SpyTaxSetTableMap::COL_ID_TAX_SET, $spyTaxSet->getIdTaxSet(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_tax_set table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxSetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyTaxSetTableMap::clearInstancePool();
            SpyTaxSetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTaxSetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyTaxSetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyTaxSetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyTaxSetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyTaxSetQuery
